<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penyewaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Gaya dasar untuk body halaman */
        body {
            font-family: 'Roboto', sans-serif; /* Mengatur font */
            background-color: #f4f4f4; /* Warna latar belakang halaman */
            margin: 0; /* Menghapus margin default */
            padding: 20px; /* Memberikan padding di sekitar konten */
        }
        .container {
            max-width: 800px; /* Maksimal lebar kontainer */
            margin: auto; /* Mengatur posisi kontainer di tengah */
            background: #fff; /* Warna latar belakang kontainer */
            padding: 20px; /* Padding di dalam kontainer */
            border-radius: 8px; /* Sudut membulat */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan kontainer */
        }
        h1 {
            text-align: center; /* Menyelaraskan teks ke tengah */
            color: #333; /* Warna teks judul */
        }
        .alert {
            padding: 10px; /* Padding untuk alert */
            margin-bottom: 20px; /* Margin bawah alert */
            border-radius: 5px; /* Sudut membulat pada alert */
        }
        .alert-success {
            background-color: #dff0d8; /* Warna latar belakang untuk pesan sukses */
            color: #3c763d; /* Warna teks untuk pesan sukses */
        }
        .alert-danger {
            background-color: #f2dede; /* Warna latar belakang untuk pesan error */
            color: #a94442; /* Warna teks untuk pesan error */
        }
        label {
            display: block; /* Menampilkan label sebagai blok */
            margin: 10px 0 5px; /* Margin untuk label */
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%; /* Lebar input 100% dari kontainer */
            padding: 10px; /* Padding dalam input */
            margin-bottom: 20px; /* Margin bawah input */
            border: 1px solid #ccc; /* Garis batas input */
            border-radius: 4px; /* Sudut membulat pada input */
            box-sizing: border-box; /* Mengatur box-sizing untuk memasukkan padding dan border dalam lebar */
        }
        button {
            background-color: #007bff; /* Warna latar belakang tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Tanpa garis batas */
            padding: 10px 15px; /* Padding dalam tombol */
            border-radius: 5px; /* Sudut membulat pada tombol */
            cursor: pointer; /* Menunjukkan bahwa tombol dapat diklik */
            transition: background-color 0.3s; /* Transisi untuk perubahan warna latar belakang */
        }
        button:hover {
            background-color: #0056b3; /* Warna latar belakang tombol saat dihover */
        }
        .back-button {
            display: inline-block; /* Menampilkan tombol kembali sebagai inline-block */
            margin-top: 20px; /* Margin atas untuk memisahkan tombol dari konten lain */
            background-color: #6c757d; /* Warna tombol kembali */
            color: white; /* Warna teks tombol */
            padding: 10px 15px; /* Padding untuk tombol kembali */
            border-radius: 5px; /* Sudut membulat pada tombol kembali */
            text-decoration: none; /* Menghapus garis bawah pada tautan */
        }
        .back-button:hover {
            background-color: #5a6268; /* Warna latar belakang saat dihover pada tombol kembali */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Penyewaan</h1>
    
        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <!-- Menampilkan pesan error jika ada -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
    
        <!-- Menampilkan error validasi jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Formulir untuk mengedit penyewaan -->
        <form action="{{ route('penyewaan.update', $penyewaan->id_penyewaan) }}" method="POST">
            @csrf
            @method('PUT')
            
            <label>Nama Penyewa:</label>
            <input type="text" name="nama_penyewa" value="{{ old('nama_penyewa', $penyewaan->nama_penyewa) }}" required>

            <label>Alamat:</label>
            <input type="text" name="alamat" value="{{ old('alamat_penyewa', $penyewaan->alamat_penyewa) }}" required>

            <label>No.HP:</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $penyewaan->no_hp) }}" required>

            <label>Tanggal Peminjaman:</label>
            <input type="date" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman', $penyewaan->tanggal_peminjaman) }}" required>

            <!-- Menambahkan dropdown untuk memilih jenis baju -->
            <label>Jenis Baju:</label>
            <select name="jenis_baju" required>
                <option value="">Pilih jenis baju</option>
                <option value="Baju Adat" {{ old('jenis_baju', $penyewaan->jenis_baju) == 'Baju Adat' ? 'selected' : '' }}>Baju Adat</option>
                <option value="Baju Tarian" {{ old('jenis_baju', $penyewaan->jenis_baju) == 'Baju Tarian' ? 'selected' : '' }}>Baju Tarian</option>
            </select>

             <!-- Menambahkan dropdown untuk memilih kategori -->
            <label>Kategori:</label>
            <select name="kategori" required>
                <option value="">Pilih kategori</option>
                <option value="Anak" {{ old('kategori', $penyewaan->kategori) == 'Anak' ? 'selected' : '' }}>Anak</option>
                <option value="Dewasa" {{ old('kategori', $penyewaan->kategori) == 'Dewasa' ? 'selected' : '' }}>Dewasa</option>
                <option value="Orang Tua" {{ old('kategori', $penyewaan->kategori) == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
            </select>

            <button type="submit">Update</button> <!-- Tombol untuk memperbarui data penyewaan -->
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyewaan</title>
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
        .card {
            background: #f8f9fa; /* Warna latar belakang kartu */
            border: 1px solid #ddd; /* Garis batas kartu */
            border-radius: 5px; /* Sudut membulat pada kartu */
            margin: 10px 0; /* Margin vertikal antara kartu */
            padding: 10px; /* Padding dalam kartu */
            transition: transform 0.2s; /* Transisi untuk efek hover */
        }
        .card:hover {
            transform: scale(1.02); /* Efek zoom saat hover pada kartu */
        }
        .card-header {
            font-weight: bold; /* Menebalkan teks header kartu */
            font-size: 1.2em; /* Ukuran font header kartu */
        }
        .details {
            padding: 10px; /* Padding untuk detail penyewaan */
            background: #ffffff; /* Warna latar belakang detail */
            border: 1px solid #ccc; /* Garis batas detail */
            border-radius: 5px; /* Sudut membulat pada detail */
            margin-top: 10px; /* Margin atas untuk memisahkan detail dari kartu */
        }
        .card-footer {
            display: flex; /* Menampilkan footer kartu sebagai flex container */
            justify-content: flex-end; /* Mengatur isi footer ke kanan */
            align-items: center; /* Menyelaraskan item di tengah secara vertikal */
        }
        .view-button,
        .edit-button,
        .delete-button {
            background-color: #007bff; /* Warna tombol untuk aksi */
            color: white; /* Warna teks tombol */
            border: none; /* Tanpa garis batas */
            padding: 5px 10px; /* Padding untuk tombol aksi */
            border-radius: 4px; /* Sudut membulat pada tombol */
            text-decoration: none; /* Menghapus garis bawah pada tautan */
            cursor: pointer; /* Menunjukkan bahwa tombol dapat diklik */
            margin-left: 10px; /* Margin kiri untuk memisahkan tombol */
        }
        .view-button:hover,
        .edit-button:hover,
        .delete-button:hover {
            background-color: #0056b3; /* Warna latar belakang saat dihover */
        }
        .delete-button {
            background-color: #dc3545; /* Warna tombol hapus */
        }
        .delete-button:hover {
            background-color: #c82333; /* Warna latar belakang saat dihover pada tombol hapus */
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
    <script>
        // Fungsi untuk toggle tampilan detail penyewaan
        function toggleDetails(id) {
            var details = document.getElementById("details-" + id);
            // Mengubah display style dari detail penyewaan
            details.style.display = (details.style.display === "none" || details.style.display === "") ? "block" : "none";
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Data Penyewaan</h1>
    
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
        
        <!-- Formulir untuk menambah penyewaan -->
        <form action="{{ route('penyewaan.store') }}" method="POST">
            @csrf
            
            <label>Nama Penyewa:</label>
            <input type="text" name="nama_penyewa" required> <!-- Input untuk nama penyewa -->

            <label>Alamat:</label>
            <input type="text" name="alamat" required> <!-- Input untuk alamat penyewa -->

            <label>No.HP:</label>
            <input type="text" name="no_hp" required> <!-- Input untuk nomor HP penyewa -->

            <label>Tanggal Peminjaman:</label>
            <input type="date" name="tanggal_peminjaman" required> <!-- Input untuk tanggal peminjaman -->

            <!-- Menambahkan dropdown untuk memilih jenis baju -->
            <label>Jenis Baju:</label>
            <select name="jenis_baju" required>
                <option value="">Pilih jenis baju</option>
                <option value="Baju Adat">Baju Adat</option>
                <option value="Baju Tarian">Baju Tarian</option>
            </select>

             <!-- Menambahkan dropdown untuk memilih kategori -->
             <label>Kategori:</label>
             <select name="kategori" required>
                 <option value="">Pilih Kategori</option>
                 <option value="anak">Anak</option>
                 <option value="orang_tua">Orang Tua</option>
                 <option value="dewasa">Dewasa</option>
             </select>
         

            <button type="submit">Simpan</button> <!-- Tombol untuk menyimpan data penyewaan -->
        </form>

        <!-- Menampilkan data penyewaan dalam bentuk kartu -->
        @foreach ($penyewaans as $penyewaan)
            <div class="card">
                <div class="card-header">{{ $penyewaan->nama_penyewa }} - {{ $penyewaan->jenis_baju }}</div>
                <div class="details" id="details-{{ $penyewaan->id_penyewaan }}" style="display: none;">
                    <p><strong>Nama Penyewa:</strong> {{ $penyewaan->nama_penyewa }}</p>
                    <p><strong>Alamat:</strong> {{ $penyewaan->alamat }}</p>
                    <p><strong>No. HP:</strong> {{ $penyewaan->no_hp }}</p>
                    <p><strong>Tanggal Peminjaman:</strong> {{ $penyewaan->tanggal_peminjaman }}</p>
                    <p><strong>Jenis Baju:</strong> {{ $penyewaan->jenis_baju }}</p>
                    <p><strong>Kategori:</strong> {{ $penyewaan->kategori }}</p>
                </div>
                <div class="card-footer">
                    <!-- Tombol untuk melihat detail penyewaan -->
                    <button class="view-button" onclick="toggleDetails({{ $penyewaan->id_penyewaan }})">Lihat Detail</button>
                    <!-- Tautan untuk mengedit penyewaan -->
                    <a class="edit-button" href="{{ route('penyewaan.edit', $penyewaan->id_penyewaan) }}">Edit</a>
                    <!-- Tautan untuk menghapus penyewaan -->
                    <form action="{{ route('penyewaan.destroy', $penyewaan->id_penyewaan) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus penyewaan ini?');">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>

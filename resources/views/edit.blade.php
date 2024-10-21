<!DOCTYPE html>
<html lang="en"> <!-- Baris 1: Mendefinisikan tipe dokumen sebagai HTML -->
<head>
    <meta charset="UTF-8"> <!-- Baris 3: Mengatur karakter encoding sebagai UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Baris 4: Agar tampilan responsif di perangkat mobile -->
    <title>Edit Pelanggan</title> <!-- Baris 5: Judul halaman yang akan ditampilkan di tab browser -->

    <!-- Baris 7-55: Bagian CSS untuk mengatur gaya halaman -->
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Baris 9: Mengatur font untuk halaman */
            background-color: #f3f4f6; /* Baris 10: Mengatur warna latar belakang halaman */
            margin: 0;
            padding: 20px; /* Baris 11: Mengatur padding umum halaman */
        }

        h1 {
            color: #2c3e50; /* Baris 15: Warna judul */
            text-align: center; /* Baris 16: Posisi judul di tengah */
            margin-bottom: 20px;
            font-size: 2.5em; /* Baris 18: Ukuran font untuk judul */
        }

        .container {
            max-width: 800px; /* Baris 22: Lebar maksimal kontainer */
            margin: auto;
            background-color: #ffffff; /* Baris 24: Warna latar belakang konten */
            padding: 30px;
            border-radius: 12px; /* Baris 26: Sudut lebih bulat untuk kontainer */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); /* Baris 27: Memberikan bayangan pada kontainer */
        }

        .alert {
            margin: 20px 0;
            padding: 15px;
            border-radius: 6px;
        }

        .alert-success {
            color: #155724; /* Baris 36: Warna teks untuk pesan sukses */
            background-color: #d4edda; /* Baris 37: Latar belakang pesan sukses */
            border: 1px solid #c3e6cb; /* Baris 38: Border untuk pesan sukses */
        }

        form {
            margin-bottom: 30px;
            background-color: #eef1f5; /* Baris 43: Latar belakang form */
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); /* Baris 46: Memberikan bayangan pada form */
        }

        label {
            display: block;
            margin: 10px 0 5px; /* Baris 50: Memberi jarak antara label dan input */
            font-weight: bold;
            color: #2c3e50; /* Baris 52: Warna teks label */
        }

        input[type="text"], input[type="number"], input[type="email"], select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ced4da;
            border-radius: 6px;
            margin-bottom: 15px;
            background-color: #fff;
            font-size: 1rem;
        }

        input[type="text"]:focus, input[type="number"]:focus, input[type="email"]:focus, select:focus {
            border-color: #007bff; /* Baris 66: Warna border saat input fokus */
        }

        button {
            background-color: #007bff; /* Baris 70: Warna tombol simpan */
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s; /* Baris 75: Efek transisi saat tombol dihover */
            font-size: 1rem;
        }

        button:hover {
            background-color: #0056b3; /* Baris 80: Warna tombol saat dihover */
        }

        .button-container {
            text-align: left; /* Baris 84: Menempatkan tombol di sebelah kiri */
        }

    </style>
</head>
<body>

    <div class="container"> <!-- Baris 92: Membungkus seluruh konten dalam kontainer dengan styling khusus -->
        <h1>Edit Data Pelanggan</h1> <!-- Baris 93: Judul halaman -->

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session('success')) <!-- Baris 95: Mengecek apakah ada session 'success' -->
            <div class="alert alert-success"> <!-- Baris 96: Div untuk pesan sukses -->
                {{ session('success') }} <!-- Baris 97: Menampilkan pesan sukses dari session -->
            </div>
        @endif

        <!-- Form untuk mengedit data pelanggan -->
        <form action="{{ route('pelanggan.update', $pelanggan->id_pelanggan) }}" method="POST"> <!-- Baris 101: Action form mengarah ke route 'pelanggan.update' dengan method POST -->
            @csrf <!-- Baris 102: Menambahkan token CSRF untuk keamanan -->
            @method('PUT') <!-- Baris 103: Mengubah method menjadi PUT untuk update data -->

            <label>Nama:</label> <!-- Baris 104: Label untuk input nama -->
            <input type="text" name="nama" value="{{ $pelanggan->nama }}" required> <!-- Baris 105: Input nama dengan nilai default dari pelanggan -->

            <label>Nomor Telpon:</label> <!-- Baris 107: Label untuk input nomor telepon -->
            <input type="text" name="nomor_telpon" value="{{ $pelanggan->nomor_telpon }}" required> <!-- Baris 108: Input nomor telepon dengan nilai default dari pelanggan -->

            <label>Alamat:</label> <!-- Baris 110: Label untuk input alamat -->
            <input type="text" name="alamat" value="{{ $pelanggan->alamat }}" required> <!-- Baris 111: Input alamat dengan nilai default dari pelanggan -->

            <label>Email:</label> <!-- Baris 113: Label untuk input email -->
            <input type="email" name="email" value="{{ $pelanggan->email }}" required> <!-- Baris 114: Input email dengan nilai default dari pelanggan -->

            <!-- Tombol submit -->
            <div class="button-container"> <!-- Baris 116: Container untuk tombol -->
                <button type="submit">Ubah</button> <!-- Baris 117: Tombol untuk submit form -->
            </div>
        </form>
    </div>
    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Mendefinisikan jenis karakter UTF-8 untuk mendukung berbagai bahasa -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Agar tampilan responsif pada perangkat mobile -->
    <title>Data Pelanggan</title> <!-- Judul halaman -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Mengimpor font Roboto dari Google Fonts -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif; /* Mengatur font untuk seluruh halaman */
            background-color: #f9fafb; /* Latar belakang lebih terang */
            margin: 0;
            padding: 20px;
            color: #333; /* Warna teks utama */
        }

        /* Container */
        .container {
            max-width: 900px; /* Lebar maksimum kontainer */
            margin: 0 auto; /* Menengahkan kontainer */
            background-color: #ffffff; /* Warna latar putih */
            padding: 30px; /* Padding di dalam kontainer */
            border-radius: 12px; /* Sudut kontainer dibulatkan */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
        }

        /* Headers */
        h1, h2 {
            text-align: center; /* Teks rata tengah */
            margin-bottom: 20px; /* Jarak bawah elemen */
            font-weight: 700; /* Membuat teks lebih tebal */
            color: #2c3e50; /* Warna teks */
        }

        /* Alerts */
        .alert {
            margin: 20px 0; /* Jarak vertikal antar elemen */
            padding: 15px; /* Padding di dalam alert */
            border-radius: 6px; /* Sudut lebih bulat */
            font-weight: bold; /* Teks tebal */
            text-align: center; /* Teks rata tengah */
        }

        /* Success Alert */
        .alert-success {
            color: #155724; /* Warna teks hijau gelap untuk pesan sukses */
            background-color: #d4edda; /* Latar belakang hijau muda */
            border: 1px solid #c3e6cb; /* Border hijau terang */
        }

        /* Error Alert */
        .alert-danger {
            color: #721c24; /* Warna teks merah gelap */
            background-color: #f8d7da; /* Latar belakang merah muda */
            border: 1px solid #f5c6cb; /* Border merah terang */
        }

        /* Form Styles */
        form {
            background-color: #eef1f5; /* Latar belakang form */
            padding: 20px; /* Padding di dalam form */
            border-radius: 12px; /* Sudut lebih bulat */
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
            margin-bottom: 40px; /* Jarak bawah form */
        }

        label {
            display: block; /* Agar label ditampilkan dalam baris baru */
            margin: 10px 0 5px; /* Jarak atas dan bawah label */
            font-weight: 500; /* Teks label lebih tebal */
        }

        input[type="text"], input[type="number"], input[type="email"], input[type="password"], select {
            width: 100%; /* Mengatur lebar input sesuai dengan kontainer */
            padding: 12px; /* Padding di dalam input */
            border: 2px solid #ced4da; /* Border abu-abu di sekitar input */
            border-radius: 6px; /* Sudut input lebih bulat */
            margin-bottom: 15px; /* Jarak antar input */
            font-size: 1em; /* Ukuran font normal */
        }

        /* Mengubah warna border saat input difokuskan */
        input:focus, select:focus {
            border-color: #007bff; /* Border biru saat difokuskan */
            outline: none; /* Menghilangkan outline default */
        }

        /* Button Styles */
        button {
            background-color: #007bff; /* Warna latar tombol biru */
            color: white; /* Warna teks putih */
            padding: 12px 18px; /* Padding dalam tombol */
            border: none; /* Menghapus border */
            border-radius: 6px; /* Sudut tombol lebih bulat */
            cursor: pointer; /* Mengubah kursor menjadi tangan saat hover */
            width: auto; /* Mengubah lebar tombol menjadi otomatis */
            font-size: 1.1em; /* Ukuran font sedikit lebih besar */
            margin-top: 10px; /* Jarak atas tombol */
            float: left; /* Mengapungkan tombol ke kanan */
        }

        /* Tombol berubah warna saat di-hover */
        button:hover {
            background-color: #0056b3; /* Warna tombol saat di-hover */
        }

        /* Table Styles */
        table {
            width: 100%; /* Lebar tabel menyesuaikan dengan kontainer */
            border-collapse: collapse; /* Menghilangkan jarak antara border tabel */
            margin-top: 20px; /* Jarak atas tabel */
        }

        /* Header dan Cell Tabel */
        table th, table td {
            padding: 15px; /* Padding di dalam cell tabel */
            border: 1px solid #ddd; /* Border abu-abu di sekitar cell */
            text-align: left; /* Teks rata kiri */
        }

        /* Warna latar belakang header tabel */
        table th {
            background-color: #f8f9fa; /* Warna abu-abu terang */
            font-weight: 700; /* Teks lebih tebal */
        }

        /* Warna latar belakang cell tabel */
        table td {
            background-color: #ffffff; /* Warna putih */
        }

        /* Action Buttons (Edit & Delete) */
        .edit-button, .delete-button {
            display: inline-block; /* Ditampilkan dalam satu baris */
            padding: 6px 12px; /* Padding di dalam tombol */
            border-radius: 4px; /* Sudut tombol lebih bulat */
            text-decoration: none; /* Menghapus garis bawah pada teks link */
            color: white; /* Warna teks putih */
            font-size: 0.9em; /* Ukuran font tombol */
        }

        /* Tombol Edit */
        .edit-button {
            background-color: #007bff; /* Warna biru untuk tombol edit */
            margin-right: 5px; /* Jarak kanan tombol edit */
        }

        .edit-button:hover {
            background-color: #0056b3; /* Warna biru lebih gelap saat di-hover */
        }

        /* Tombol Delete */
        .delete-button {
            background-color: #dc3545; /* Warna merah untuk tombol delete */
            border: none; /* Menghapus border */
            cursor: pointer; /* Mengubah kursor menjadi tangan saat hover */
        }

        .delete-button:hover {
            background-color: #c82333; /* Warna merah lebih gelap saat di-hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Pelanggan</h1>

        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }} <!-- Pesan sukses ditampilkan di sini -->
            </div>
        @endif

        <!-- Menampilkan pesan error -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }} <!-- Pesan error ditampilkan di sini -->
            </div>
        @endif

        <!-- Form Create Pelanggan -->
        <h2></h2>
        <form action="/pelanggan/store" method="POST">
            @csrf <!-- Token CSRF untuk keamanan -->
            <label>Nama:</label>
            <input type="text" name="nama" required>
            <label>Nomor Telpon:</label>
            <input type="text" name="nomor_telpon" required>
            <label>Alamat:</label>
            <input type="text" name="alamat" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <button type="submit">Simpan</button> <!-- Tombol submit -->
        </form>

        <!-- Tabel Daftar Pelanggan -->
        <h2>Data Yang Tersimpan</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nomor Telpon</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Aksi</th> <!-- Kolom untuk tombol aksi (Edit & Delete) -->
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan data pelanggan -->
                @if(isset($pelanggans) && count($pelanggans) > 0)
                    @foreach($pelanggans as $pelanggan)
                        <tr>
                            <td>{{ $pelanggan->nama }}</td>
                            <td>{{ $pelanggan->nomor_telpon }}</td>
                            <td>{{ $pelanggan->alamat }}</td>
                            <td>{{ $pelanggan->email }}</td>
                            <td>
                                <a href="/pelanggan/edit/{{ $pelanggan->id_pelanggan }}" class="edit-button">Edit</a>
                                <form action="{{ route('pelanggan.destroy', $pelanggan->id_pelanggan) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus pelanggan ini?');">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" style="text-align:center;">Data tidak ditemukan.</td> <!-- Pesan jika tidak ada data -->
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>

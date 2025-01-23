<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Lihat Pendaftaran</title>
    <style>
        /* Reset gaya dasar elemen dan pengaturan box model */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        /* Gaya dasar untuk body, background, dan padding */
        body {
            background-color: #F4FAFD; /* Latar belakang biru pastel */
            padding: 0;
        }

            /* Navbar */
 .navbar {
            background-color: #89c4e9;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }
        
        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar a {
            margin-left: 20px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s, opacity 0.3s;
        }

        .navbar a:hover {
            color: #156ba5;
        }

        .navbar a.active {
            color: #156ba5;
            opacity: 0.7;
        }

        .logo-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }

        /* Pengaturan untuk container */
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #EAF6FB; /* Warna biru pastel lembut */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Gaya dasar untuk judul */
        h2 {
            text-align: center;
            color: #4A4A4A;
            margin-bottom: 20px;
            font-size: 32px; /* Ukuran lebih besar untuk judul */
            font-weight: bold;
        }

        /* Gaya tombol kembali */
        .back-button-container {
            margin: 20px auto; /* Margin otomatis untuk pusatkan kontainer */
            display: flex;
            justify-content: flex-start; /* Posisi tombol ke kiri */
            max-width: 1000px; /* Lebar maksimum mengikuti container utama */
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            color: white;
            background-color: #5BC0EB; /* Warna biru untuk tombol */
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #469FC4; /* Warna hover tombol */
        }

        /* Tabel styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border: 1px solid #D9EEF7; /* Batas tabel biru pastel */
            font-size: 14px;
        }

        th {
            background-color: #B5DDEB; /* Header tabel biru pastel */
            color: #4A4A4A;
        }

        tr {
            background-color: #FFFFFF; /* Warna latar belakang putih untuk semua baris */
        }

        tr:hover {
            background-color: #CDEAF5; /* Efek hover baris tabel */
        }

        /* Gaya tombol di dalam tabel */
        .action-buttons a,
        .action-buttons form button {
            display: inline-block;
            padding: 6px 12px;
            margin: 0 4px;
            font-size: 12px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-buttons a {
            background-color: #5BC0EB; /* Warna biru untuk tombol edit */
        }

        .action-buttons a:hover {
            background-color: #469FC4; /* Warna hover tombol edit */
        }

        .action-buttons form button {
            background-color: #F25F5C; /* Warna merah untuk tombol hapus */
        }

        .action-buttons form button:hover {
            background-color: #D94442; /* Warna hover tombol hapus */
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            h2 {
                font-size: 24px;
            }

            .back-button {
                padding: 8px 16px;
                font-size: 12px;
            }

            th, td {
                font-size: 12px;
                padding: 8px;
            }

    
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
            Sanggar Galuh
        </div>
        <div class="nav-links">
            <a href="/dashboard">kembali kehalaman dashboard</a>

        </div>
    </div>
    <!-- Konten Utama -->
    <div class="container">
        <h2>Data Pendaftaran</h2>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Kategori</th>
                    <th>Link File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendaftarans as $pendaftaran)
                <tr>
                    <td>{{ $pendaftaran->nama }}</td>
                    <td>{{ $pendaftaran->email }}</td>
                    <td>{{ $pendaftaran->alamat }}</td>
                    <td>{{ $pendaftaran->no_telepon }}</td>
                    <td>{{ $pendaftaran->kategori }}</td>
                    <td>
                        @if ($pendaftaran->dropbox_link)
                            <a href="{{ $pendaftaran->dropbox_link }}" target="_blank">Lihat File</a>
                        @else
                            Tidak ada file
                        @endif
                    </td>
                    
                    <td class="action-buttons">
                        <a href="/edit-pendaftaran/{{ $pendaftaran->id }}">Edit</a>
                        <form action="/delete-pendaftaran/{{ $pendaftaran->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin dihapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

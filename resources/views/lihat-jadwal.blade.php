<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #F9FBFC;
            color: #4A4A4A;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #4A4A4A;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 40px;
            text-align: center;
        }

        .table {
            width: 70%;
            background-color: #FFFFFF;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
            font-size: 0.95rem;
            border: 1px solid #E3E6E8;
        }

        .table th {
            background-color: #B5DDEB;
            color: #4A4A4A;
            font-weight: bold;
        }

        .table td {
            background-color: #F4FAFD;
            color: #4A4A4A;
        }

        .table tbody tr:hover {
            background-color: #D9EEF7;
        }

        .btn {
            background: linear-gradient(to right, #A2D4E8, #B5DDEB);
            color: #4A4A4A;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            margin: 5px;
        }

        .btn:hover {
            background: linear-gradient(to right, #91CDE4, #A8D8F0);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .table-container {
            overflow-x: auto;
        }

        .navbar {
            background-color: #89c4e9;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            margin-bottom: 30px;
            width: 100%;
            box-sizing: border-box;
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
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
            Sanggar Galuh
        </div>
        <div class="nav-links">
            <a href="/home">Beranda</a>
            <a href="/syarat">Pendaftaran</a>
            <a href="/index">Perengkingan</a>
            <a href="/galeri">Penyewaan</a>
            <a href="/cart">Keranjang</a>
            <a href="/login">Login</a>
        </div>
    </div>

    <h1>Jadwal Latihan Sanggar Galuh</h1>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Nama Tarian</th>
                    <th>Pelatih</th>
                    <th>Anggota</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($akuns as $akun)
                <tr>
                    <td>{{ $akun->tanggal }}</td>
                    <td>{{ $akun->waktu }}</td>
                    <td>{{ $akun->tarian ? $akun->tarian->nama_tari : 'Tidak ada' }}</td>
                    <td>{{ $akun->tarian->pelatih->nama }}</td>
                    <td>{{ $akun->anggota }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

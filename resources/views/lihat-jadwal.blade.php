<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Jadwal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Gaya latar belakang halaman */
        body {
            background-color: #F9FBFC; /* Biru pastel lembut */
            color: #4A4A4A;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
        }

        /* Gaya judul halaman */
        h1 {
            color: #4A4A4A; /* Warna teks utama */
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 40px;
            text-align: center;
        }

        /* Gaya tabel */
        .table {
            width: 100%;
            background-color: #FFFFFF;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
            font-size: 0.95rem;
            border: 1px solid #E3E6E8;
        }

        .table th {
            background-color: #B5DDEB; /* Header tabel biru pastel lebih gelap */
            color: #4A4A4A;
            font-weight: bold;
        }

        .table td {
            background-color: #F4FAFD;
            color: #4A4A4A;
        }

        /* Hover effect untuk tabel */
        .table tbody tr:hover {
            background-color: #D9EEF7; /* Hover biru pastel lebih cerah */
        }

        /* Styling tombol */
        .btn {
            background: linear-gradient(to right, #A2D4E8, #B5DDEB); /* Warna gradien biru pastel */
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
            background: linear-gradient(to right, #91CDE4, #A8D8F0); /* Warna hover tombol lebih cerah */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Responsivitas tabel */
        .table-container {
            overflow-x: auto;
        }

        .table-container table {
            min-width: 900px;
        }

        /* Pusatkan elemen */
        .container {
            max-width: 900px;
            margin: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Jadwal Latihan Sanggar Galuh</h1>
        
        <!-- Tabel untuk menampilkan jadwal latihan -->
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
                        <td>{{ $akun->pelatih }}</td>
                        <td>{{ $akun->anggota }}</td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Kembali ke Dashboard -->
        <div class="text-center">
            <a href="{{ url('/dashboard') }}" class="btn">Kembali ke Dashboard</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

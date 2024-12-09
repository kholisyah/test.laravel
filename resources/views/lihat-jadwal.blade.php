<!-- resources/views/lihat-jadwal.blade.php -->
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
            background-color: #F4FAFD; /* Biru pastel lembut */
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
            background-color: #EAF6FB; /* Warna tabel biru pastel */
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
            font-size: 1rem;
        }

        .table th {
            background-color: #B5DDEB; /* Header tabel biru pastel lebih gelap */
            color: #4A4A4A;
            font-weight: bold;
        }

        .table td {
            background-color: #EAF6FB;
            color: #4A4A4A;
        }

        /* Hover effect untuk tabel */
        .table tbody tr:hover {
            background-color: #D9EEF7; /* Hover biru pastel lebih cerah */
        }

        /* Styling tombol */
        .btn {
            background-color: #B5DDEB; /* Warna biru pastel */
            color: #4A4A4A;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
            margin-top: 20px;
        }

        .btn:hover {
            background-color: #A2D4E8; /* Warna hover tombol lebih gelap */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Jadwal Latihan Sanggar Galuh</h1>
        
        <!-- Tabel untuk menampilkan jadwal latihan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Jenis Tari</th>
                    <th>Pelatih</th>
                    <th>Anggota</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwals as $jadwal)
                <tr>
                    <td>{{ $jadwal->tanggal }}</td>
                    <td>{{ $jadwal->waktu }}</td>
                    <td>{{ $jadwal->jenis_tari }}</td>
                    <td>{{ $jadwal->pelatih }}</td>
                    <td>{{ $jadwal->anggota }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Kembali ke Dashboard -->
        <a href="{{ url('/dashboard') }}" class="btn">Kembali ke Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

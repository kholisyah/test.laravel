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
            background-color: #f1f3f5;
            color: #333;
            font-family: Arial, sans-serif;
        }
        /* Gaya judul halaman */
        h1 {
            color: #007bff;
            font-weight: bold;
            text-transform: uppercase;
        }
        /* Gaya kartu */
        .card {
            border: none;
            border-radius: 12px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .card-body {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
        }
        /* Gaya teks */
        .card h5 {
            font-size: 20px;
            color: #495057;
            margin-bottom: 12px;
            font-weight: 600;
        }
        .card p {
            font-size: 16px;
            color: #6c757d;
            margin: 5px 0;
        }
        .card p strong {
            color: #007bff;
        }
        /* Pengaturan margin */
        .container {
            padding-top: 50px;
            padding-bottom: 50px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Jadwal Latihan Sanggar Galuh</h1>
        <div class="row justify-content-center">
            @foreach ($jadwals as $jadwal)
            <div class="col-md-6 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5>{{ $jadwal->tanggal }} - {{ $jadwal->waktu }}</h5>
                        <p><strong>Jenis Tari:</strong> {{ $jadwal->jenis_tari }}</p>
                        <p><strong>Pelatih:</strong> {{ $jadwal->pelatih }}</p>
                        <p><strong>Anggota:</strong> {{ $jadwal->anggota }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

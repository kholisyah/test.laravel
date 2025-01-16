<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan SAW dan AHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Biru muda */
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

        .container {
            margin-top: 30px;
            background-color: #e7f3ff; /* Biru sangat muda */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #0056b3; /* Biru gelap */
            font-weight: bold;
            text-align: center; /* Center the title */
        }

        .card {
            margin-bottom: 20px;
            border: 1px solid #007bff; /* Biru */
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .card-body {
            padding: 15px;
            background-color: #cce5ff; /* Biru terang */
            text-align: center; /* Center the content inside the card */
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #0056b3; /* Biru gelap */
        }

        .card-text {
            font-size: 1rem;
            color: #003f7f; /* Biru lebih gelap */
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
            <a href="/home">Beranda</a>
            <a href="/syarat">Pendaftaran</a>
            <a href="/lihat-jadwal">Jadwal</a>
            <a href="/penyewaan">Penyewaan</a>
            <a href="/login">Login</a>
        </div>
    </div>

    <div class="container">
        <h1 class="my-4">Rekomendasi Baju Terbaik Sanggar Galuh</h1>
        <div class="row justify-content-center"> <!-- Center the row of cards -->
            @foreach ($results as $index => $result)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Baju Terbaik {{ $index + 1 }}</h5> <!-- Dynamic ranking -->
                            <p class="card-text">{{ $result['nama'] }} - Hasil Perhitungan: <strong>{{ $result['hasil_saw'] }}</strong></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>

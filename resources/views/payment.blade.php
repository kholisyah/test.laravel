<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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

        /* Container styling */
        .container {
            margin-top: 30px;
            background-color: #89c4e9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #fff;
            font-weight: bold;
        }

        /* Button styling */
        .btn-success {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .btn-success:hover {
            background-color: #218838;
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
            <a href="/project">Pendaftaran</a>
            <a href="/login">Jadwal</a>
            <a href="/index">Perengkingan</a>
            <a href="/galeri">Penyewaan</a>
            <a href="/cart">Keranjang</a>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Header -->
        <header class="text-center mb-4">
            <h1>Pembayaran Transaksi</h1>
        </header>

        <!-- Informasi Transaksi -->
        <section class="mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Transaksi</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>ID Transaksi:</strong> {{ $transaksi->id }}</li>
                        <li class="list-group-item"><strong>Total:</strong> Rp. {{ number_format($transaksi->total, 0, ',', '.') }}</li>
                        <li class="list-group-item"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Tombol WhatsApp untuk Pembayaran -->
        <section class="text-center">
            <a 
                href="https://wa.me/6285750274278?text=Halo%20saya%20ingin%20membayar%20transaksi%20ID%20%3A%20{{ $transaksi->id }}%20dengan%20total%20Rp%20{{ number_format($transaksi->total, 0, ',', '.') }}" 
                class="btn btn-success btn-lg" 
                target="_blank">
                Bayar Lewat WhatsApp
            </a>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
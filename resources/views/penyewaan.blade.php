<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyewaan</title>
    <style>
        /* Navbar */
        .navbar {
            background-color: #89c4e9;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            width: 100%;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
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

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding-top: 80px; /* Untuk kompensasi tinggi navbar */
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .baju-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .baju-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .baju-card img {
            width: 100%;
            height: 250px; /* Tinggi gambar lebih besar */
            object-fit: cover; /* Gambar menyesuaikan ukuran tanpa distorsi */
            border-radius: 5px;
        }

        .baju-card h3 {
            font-size: 18px;
            margin-top: 10px;
            color: #333;
        }

        .baju-card p {
            color: #777;
            font-size: 14px;
            margin: 5px 0;
        }

        .baju-card .price {
            font-weight: bold;
            color: #28a745;
        }

        .baju-card button {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }

        .baju-card button:hover {
            background-color: #218838;
        }

        p {
            text-align: center;
        }

        p[style*="color: green;"] {
            color: #28a745 !important;
            font-weight: bold;
        }

        p[style*="color: red;"] {
            color: #dc3545 !important;
            font-weight: bold;
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
            <a href="/index">Perengkingan</a>
            <a href="/penyewaan" class="active">Penyewaan</a>
            <a href="{{ route('cart.index') }}">Keranjang</a>
            <a href="/login">Login</a>
        </div>
    </div>
    <h1>Daftar Baju</h1> 

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <div class="baju-container">
        @foreach($bajus as $baju)
            <div class="baju-card">
                <img src="{{ asset('assets/img/' . $baju->foto) }}" alt="{{ $baju->nama }}">
                <h3>{{ $baju->nama }}</h3>
                <p>Kategori: {{ $baju->kategori }}</p>
                <p>Stok: {{ $baju->stok }}</p>
                <p>Jumlah Aksesoris: {{ $baju->jumlah_aksesoris }}</p>
                <p class="price">Rp {{ number_format($baju->harga_sewa, 0, ',', '.') }}</p>
                <form action="{{ route('penyewaan.addToCart', $baju->id) }}" method="POST">
                    @csrf
                    <input type="number" name="jumlah" value="1" min="1" max="{{ $baju->stok }}" style="width: 60px; text-align: center; margin-bottom: 10px;">
                    <button type="submit">Tambah Ke Keranjang</button>
                </form>                                                          
            </div>
        @endforeach
    </div>
</body>
</html>

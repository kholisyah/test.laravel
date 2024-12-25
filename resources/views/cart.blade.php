<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja Anda</title>
    <style>
        /* Reset CSS */
        body, h1, p, table, th, td, a, form, button, img {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fafafa;
            color: #333;
            padding: 20px;
        }

        a {
            text-decoration: none;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #89c4e9;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            margin-bottom: 30px;
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

        .navbar .nav-links a {
            color: white;
            margin: 0 10px;
            font-weight: bold;
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }

        /* Navbar link active state */
        .navbar .nav-links a.active {
            color: #156ba5;
            
        }

        .navbar .nav-links a:hover {
            color: #156ba5;
           
        }

        /* Header */
        .header {
            background-color: #89c4e9;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
        }

        /* Table */
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-table th, .cart-table td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .cart-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .cart-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .cart-table tr:hover {
            background-color: #f1f1f1;
        }

        /* Buttons */
        .btn {
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            margin-top: 10px;
        }

        .btn-danger {
            background-color: #ff4d4d;
            color: white;
            border: none;
        }

        .btn-danger:hover {
            background-color: #ff3333;
        }

        .btn-success {
            background-color: #89c4e9;
            color: white;
            text-decoration: none;
        }

        .btn-success:hover {
            background-color: #89c4e9;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 50px;
            color: #777;
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
            <a href="home" class="{{ request()->is('home') ? 'active' : '' }}">Beranda</a>
            <a href="project" class="{{ request()->is('project') ? 'active' : '' }}">Pendaftaran</a>
            <a href="login" class="{{ request()->is('login') ? 'active' : '' }}">Jadwal</a>
            <a href="galeri" class="{{ request()->is('galeri') ? 'active' : '' }}">Penyewaan</a>
            <a href="keranjang" class="{{ request()->is('keranjang') ? 'active' : '' }}">Keranjang</a>
            <a href="login" class="{{ request()->is('login') ? 'active' : '' }}">login</a>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <h1>Keranjang Belanja Anda</h1>
    </div>

    <!-- Table Keranjang -->
    <table class="cart-table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Kuantitas</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Perulangan untuk menampilkan item dalam keranjang -->
            @foreach ($cart as $index => $item)
                <tr>
                    <td>{{ $item['product_name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>Rp {{ number_format($item['total'], 0, ',', '.') }}</td>
                    <td>
                        <!-- Form untuk menghapus item dari keranjang -->
                        <form action="{{ route('cart.remove') }}" method="POST" style="display: inline;">
                            @csrf
                            <input type="hidden" name="index" value="{{ $index }}">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Tombol untuk lanjut ke pembayaran -->
    <form action="{{ route('transaksi.storeFromCart') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Proses Transaksi</button>
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
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

        /* Body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #333;
        }

        .success-message {
            color: #28a745;
            font-weight: bold;
        }

        .error-message {
            color: #dc3545;
            font-weight: bold;
        }

        /* Cart Items */
        .cart-items {
            margin-top: 20px;
            list-style-type: none;
            padding: 0;
        }

        .cart-items li {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
        }

        .cart-items li img {
            width: 70px;
            height: auto;
            margin-right: 20px;
            border-radius: 5px;
        }

        .cart-items li p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }

        .cart-items li .price {
            font-weight: bold;
            color: #28a745;
        }

        .cart-items li .quantity {
            color: #777;
        }

        .cart-items li .checkbox {
            margin-right: 20px;
        }

        /* Checkout Button */
        .checkout-btn {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #28a745;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .checkout-btn:hover {
            background-color: #218838;
        }

        /* Empty Cart Message */
        .empty-cart-message {
            text-align: center;
            font-size: 18px;
            color: #888;
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
            <a href="/penyewaan">Penyewaan</a>
            <a href="/cart" class="active">Keranjang</a>
            <a href="/login">Login</a>
        </div>
    </div>

    <h1>Keranjang Anda</h1>

    <!-- Success or Error Messages -->
    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p class="error-message">{{ session('error') }}</p>
    @endif

    <!-- Cart Items -->
    @if(session('cart') && count(session('cart')) > 0)
    <form action="/checkout" method="POST">
        @csrf
        <ul class="cart-items">
            @foreach(session('cart') as $id => $details)
                <li>
                    <input type="checkbox" name="selected_items[]" value="{{ $id }}" class="checkbox">
                    <img src="{{ isset($details['foto']) ? asset('assets/img/' . $details['foto']) : asset('assets/img/default.png') }}" 
                         alt="{{ $details['nama'] ?? 'Item' }}">

                    <div>
                        <p><strong>{{ $details['nama'] ?? 'Tidak Ada Nama' }}</strong></p>
                        <p class="price">Rp {{ number_format($details['harga_sewa'] ?? 0, 0, ',', '.') }}</p>
                        <p class="quantity">Jumlah: {{ $details['jumlah'] ?? 0 }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
        <button type="submit" class="checkout-btn">Checkout</button>
    </form>
    @else
    <p class="empty-cart-message">Keranjang Anda kosong.</p>
    @endif
</body>

</html>

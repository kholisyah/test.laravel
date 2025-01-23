<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            margin-bottom: 20px;
        }

        /* Table */
        .table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        .table th {
            background-color: #89c4e9;
            color: white;
            text-align: center;
            vertical-align: middle;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table img {
            width: 100px;
            height: 100px;
            border-radius: 10px;
        }
        

        /* Messages */
        .success-message {
            color: #28a745;
            font-weight: bold;
            text-align: center;
        }

        .error-message {
            color: #dc3545;
            font-weight: bold;
            text-align: center;
        }

        .empty-cart-message {
            text-align: center;
            font-size: 18px;
            color: #888;
            margin-top: 30px;
        }

        /* Buttons */
        .btn {
            width: 100px;
            font-size: 14px;
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

    <!-- Page Title -->
    <h1>Keranjang Anda</h1>

    <!-- Success or Error Messages -->
    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p class="error-message">{{ session('error') }}</p>
    @endif

    <!-- Cart Items -->
    @if(count($cart) > 0)
        <table class="table table-striped table-primary">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama Baju</th>
                    <th style="text-align: right;">Harga Sewa</th>
                    <th>Jumlah</th>
                    <th style="text-align: right;">Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $carts)
                    <tr>
                        <td>
                            <img 
                                src="{{ isset($carts['foto']) ? asset('assets/img/' . $carts['foto']) : asset('assets/img/default.png') }}" 
                                width="150" 
                                height="150" 
                                alt="{{ $carts['product_name'] ?? 'Tidak Ada Nama' }}"
                                style="border: 2px solid #ddd; border-radius: 5px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);">
                        </td>                                             
                        <td>{{ $carts['product_name'] ?? 'Tidak Ada Nama' }}</td>
                        <td style="text-align: right;">
                            Rp {{ number_format($carts['prices'] ?? 0, 0, ',', '.') }}
                        </td>
                        <td>{{ $carts['quantity'] ?? 0 }}</td>
                        <td style="text-align: right;">
                            Rp {{ number_format(($carts['prices'] ?? 0) * ($carts['quantity'] ?? 1), 0, ',', '.') }}
                        </td>
                        <td>
                            <form 
                                action="{{ route('checkout', $carts['id']) }}" 
                                method="POST" 
                                style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success">CheckOut</button>
                            </form>
                            <form 
                                action="{{ route('cart.delete', $carts['id']) }}" 
                                method="POST" 
                                style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Batalkan</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="empty-cart-message">Keranjang Anda Kosong</p>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

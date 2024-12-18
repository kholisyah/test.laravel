<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja Anda</title>
    <style>
        /* Mengatur ulang margin dan padding */
        body, h1, p, table, th, td, a, form, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #fafafa; /* Latar belakang abu-abu terang */
            color: #333; /* Warna teks */
            padding: 20px;
        }

        /* Header */
        .header {
            background-color: #4CAF50; /* Hijau */
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
        }

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
        }

        .cart-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .cart-table tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 10px 15px;
            font-size: 14px;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
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
            background-color: #28a745;
            color: white;
            text-decoration: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Bagian footer */
        .footer {
            text-align: center;
            margin-top: 50px;
            color: #777;
        }
    </style>
</head>
<body>

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
                        <form action="{{ route('cart.remove') }}" method="POST">
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
    <div class="actions">
        <a href="{{ route('transaksi.create') }}" class="btn btn-success">Lanjutkan ke Pembayaran</a>
    </div>
</body>
</html>

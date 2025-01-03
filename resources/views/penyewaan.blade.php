<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penyewaan</title>
</head>
<body>
    <h1>Daftar Pesanan</h1>
    @if(!empty($pesanan))
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Kuantitas</th>
                <th>Total</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $item)
            <tr>
                <td>{{ $item['product_name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>Rp {{ number_format($item['total'], 0, ',', '.') }}</td>
                <td>{{ $item['category'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Belum ada pesanan di keranjang.</p>
    @endif
    
</body>
</html>

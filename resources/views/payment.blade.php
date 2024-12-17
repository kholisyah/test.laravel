<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <header>
            <h1>Pembayaran Transaksi</h1>
        </header>

        <!-- Menampilkan informasi transaksi -->
        <section>
            <h4>ID Transaksi: {{ $transaksi->id }}</h4>
            <p>Status: {{ $transaksi->status }}</p>
            <p>Total: Rp. {{ number_format($transaksi->total, 0, ',', '.') }}</p>
            <p>Tanggal: {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</p>
        </section>

        <!-- Tombol WhatsApp untuk pembayaran -->
        <section>
            <a href="https://wa.me/6285750274278?text=Halo%20saya%20ingin%20membayar%20transaksi%20ID%20%3A%20{{ $transaksi->id }}%20dengan%20total%20Rp%20{{ number_format($transaksi->total, 0, ',', '.') }}" class="btn btn-success" target="_blank">
                Bayar Lewat WhatsApp
            </a>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

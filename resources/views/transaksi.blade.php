<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Transaksi</title>
    <!-- Bootstrap CSS untuk tampilan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <header>
            <h1>Daftar Transaksi</h1>
        </header>

        <!-- Pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol untuk menambah transaksi -->
        <a href="{{ route('galeri.index') }}" class="btn btn-primary mb-3">kembali ke galeri</a>

        <!-- Tabel Daftar Transaksi -->
        <section>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ $transaksi->status }}</td>
                            <td>{{ number_format($transaksi->total, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                            
                                <!-- Tombol Bayar -->
                               <!-- Tombol Bayar -->
                                @if ($transaksi->status == 'pending')
                                <a href="{{ route('transaksi.payment', $transaksi->id) }}" class="btn btn-success btn-sm">Bayar Lewat WhatsApp</a>
                                @endif

                            
                                <!-- Tombol Hapus -->
                                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <!-- Bootstrap JS (Opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Transaksi</title>
    <!-- Bootstrap CSS -->
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

        /* Header styling */
        header h1 {
            color: #fff;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Table styling */
        .table {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #89c4e9;
            color: #fff;
            text-align: center;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        /* Buttons */
        .btn {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            transform: scale(1.05);
        }

        .btn-warning {
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #d39e00;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .navbar .nav-links {
                flex-direction: column;
                align-items: flex-start;
            }

            .navbar .nav-links a {
                margin-bottom: 5px;
            }
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
            <a href="/login">Login</a>
        </div>
    </div>

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

        <!-- Tabel Daftar Transaksi -->
        <section>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID Transaksi</th>
                        <th scope="col">Total</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksis as $transaksi)
                        <tr>
                            <td>{{ $transaksi->id }}</td>
                            <td>{{ number_format($transaksi->total, 0, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                            <td>
                            
                                <!-- Tombol Bayar -->
                                <a href="{{ route('transaksi.payment', $transaksi->id) }}" class="btn btn-success btn-sm">Bayar Lewat WhatsApp</a>
                            
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
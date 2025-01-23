<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Penyewaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Navbar */
        .navbar {
            background-color: #89c4e9;
            padding: 10px 15px;
            width: 100%;
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
            color: white;
        }

        .navbar .logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav a {
            color: white !important;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 15px;
            text-decoration: none;
            transition: color 0.3s;
        }

        .navbar-nav a:hover {
            color: #156ba5;
        }

        .navbar-nav .active {
            color: #156ba5;
        }

        /* Body styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #F4FAFD;
            margin-top: 70px; /* Memberikan ruang untuk navbar fixed */
            padding: 20px;
        }

        /* Style untuk judul */
        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #4A4A4A;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
        }

        /* Styling tabel */
        .table {
            margin-top: 20px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            background-color: #EAF6FB;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
            font-size: 1rem;
        }

        .table th {
            background-color: #B5DDEB;
            color: #4A4A4A;
        }

        .table td {
            background-color: #ffffff;
            color: #333;
        }

        /* Styling untuk row hover */
        .table tbody tr:hover {
            background-color: #CDEAF5;
        }

        /* Styling tombol */
        .btn {
            background-color: #B5DDEB;
            color: #4A4A4A;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #A2D4E8;
        }

        /* Styling untuk tombol kembali ke dashboard */
        .btn-primary {
            margin-top: 20px;
            display: block;
            width: 200px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="logo">
                <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
                Sanggar Galuh
            </div>
            <div class="navbar-nav ml-auto">
                <a class="nav-link active" href="/dashboard">Kembali ke Dashboard</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h1>Data Penyewaan</h1>

        <!-- Tabel untuk menampilkan data penyewaan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id checkout</th>
                    <th>nama produk</th>
                    <th>jumlah checkout</th>
                    <th>harga satuan</th>
                    <th>total</th>
                    <th>tanggal pesanan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyewaans as $penyewaan)
                    <tr>
                        <td>{{ $penyewaan->id }}</td>
                        <td>{{ $penyewaan->product_name }}</td>
                        <td>{{ $penyewaan->quantity }}</td>
                        <td>{{ $penyewaan->prices }}</td>
                        <td>{{ $penyewaan->total }}</td>
                        <td>{{ date('d M Y', strtotime($penyewaan->created_at)) }}</td>
                        <td>
                            <select name="status" id="status">
                                <option value="pending" {{ $penyewaan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="lunas" {{ $penyewaan->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
                                <option value="dikembalikan" {{ $penyewaan->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            </select>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

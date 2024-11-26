<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Penyewaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style untuk body dan tampilan umum */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        /* Style untuk judul */
        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #007bff;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: bold;
        }

        /* Styling tabel */
        .table {
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
            padding: 15px;
            font-size: 1rem;
        }

        .table th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .table td {
            background-color: #ffffff;
            color: #333;
        }

        /* Styling untuk row hover */
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        /* Styling tombol */
        .btn {
            background-color: #007bff;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
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
    <div class="container">
        <h1>Data Penyewaan</h1>
        
        <!-- Tabel untuk menampilkan data penyewaan -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Penyewa</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Jenis Baju</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penyewaans as $penyewaan)
                <tr>
                    <td>{{ $penyewaan->nama_penyewa }}</td>
                    <td>{{ $penyewaan->alamat }}</td>
                    <td>{{ $penyewaan->no_hp }}</td>
                    <td>{{ $penyewaan->tanggal_peminjaman }}</td>
                    <td>{{ $penyewaan->jenis_baju }}</td>
                    <td>{{ $penyewaan->kategori }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Kembali ke Dashboard -->
    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Lihat Pendaftaran</title>
    <style>
        /* Reset gaya dasar elemen dan pengaturan box model */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        /* Gaya dasar untuk body, background dan padding */
        body {
            background-color: #f0f2f5;
            padding: 20px;
        }

        /* Pengaturan untuk container tabel */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Gaya dasar untuk judul */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Tabel styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #6c63ff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Tombol kembali */
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c63ff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #574bcc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Pendaftaran</h2>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Kategori</th>
                    <th>Biaya Administrasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendaftarans as $pendaftaran)
                <tr>
                    <td>{{ $pendaftaran->nama }}</td>
                    <td>{{ $pendaftaran->email }}</td>
                    <td>{{ $pendaftaran->alamat }}</td>
                    <td>{{ $pendaftaran->no_telepon }}</td>
                    <td>{{ $pendaftaran->kategori }}</td>
                    <td>Rp{{ number_format($pendaftaran->biaya_administrasi, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Kembali ke Dashboard -->
        <a href="{{ url('/dashboard') }}" class="back-button">Kembali ke Dashboard</a>
    </div>
</body>
</html>

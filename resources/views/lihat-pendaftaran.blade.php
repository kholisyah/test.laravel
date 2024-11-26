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

        /* Pengaturan untuk container data */
        .container {
            max-width: 800px;
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

        /* Gaya item data */
        .data-item {
            background-color: #fafafa;
            padding: 20px;
            margin-bottom: 10px; 
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        /* Gaya judul dalam item data */
        .data-item h3 {
            color: #6c63ff;
            margin-bottom: 5px;
        }

        /* Detail data */
        .data-item .detail {
            color: #666;
        }

        /* Tombol kembali */
        .back-button {
            display: inline-block;
            margin-top: 20px;
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

        @foreach ($pendaftarans as $pendaftaran)
        <div class="data-item">
            <h3>{{ $pendaftaran->nama }}</h3>
            <div class="detail">
                <p><strong>Email:</strong> {{ $pendaftaran->email }}</p>
                <p><strong>Alamat:</strong> {{ $pendaftaran->alamat }}</p>
                <p><strong>No Telepon:</strong> {{ $pendaftaran->no_telepon }}</p>
                <p><strong>Kategori:</strong> {{ $pendaftaran->kategori }}</p>
                <p><strong>Biaya Administrasi:</strong> Rp{{ $pendaftaran->biaya_administrasi }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <!-- Kembali ke Dashboard -->
    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
</body>
</html>

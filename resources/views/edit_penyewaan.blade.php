<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penyewaan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f3f4f6; /* Warna latar belakang yang lebih cerah */
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #2c3e50; /* Warna gelap untuk judul */
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em; /* Ukuran font lebih besar */
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: #ffffff; /* Warna putih untuk konten */
            padding: 30px; /* Padding lebih besar */
            border-radius: 12px; /* Sudut lebih bulat */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); /* Bayangan yang lebih dalam */
        }

        .alert {
            margin: 20px 0;
            padding: 15px; /* Padding lebih besar */
            border-radius: 6px; /* Sudut lebih bulat */
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        form {
            margin-bottom: 30px;
            background-color: #eef1f5; /* Latar belakang form */
            padding: 20px;
            border-radius: 12px; /* Sudut lebih bulat */
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); /* Bayangan untuk form */
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #2c3e50;
        }

        input[type="text"], input[type="number"], input[type="date"], select {
            width: 100%; /* Lebar 100% agar kotak sama rata */
            padding: 12px; /* Padding lebih besar */
            border: 2px solid #ced4da; /* Border lebih tebal */
            border-radius: 6px; /* Sudut lebih bulat */
            margin-bottom: 15px; /* Jarak antar input */
            transition: border-color 0.3s; /* Transisi border */
            background-color: #fff;
            font-size: 1rem;
        }

        input[type="text"]:focus, input[type="number"]:focus, input[type="date"]:focus, select:focus {
            border-color: #007bff; /* Warna border saat fokus */
        }

        button {
            background-color: #007bff; /* Ubah warna tombol simpan menjadi biru */
            color: white;
            padding: 12px 18px; /* Padding lebih besar */
            border: none;
            border-radius: 6px; /* Sudut lebih bulat */
            cursor: pointer;
            transition: background-color 0.3s; /* Transisi saat hover */
            font-size: 1rem;
            width: auto; /* Lebar otomatis untuk tombol */
        }

        button:hover {
            background-color: #0056b3; /* Warna saat hover */
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Penyewaan</h1>

        <form action="{{ route('penyewaan.update', $penyewaan->id_penyewaan) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nama Penyewa:</label>
            <input type="text" name="nama_penyewa" value="{{ $penyewaan->nama_penyewa }}" required>

            <label>Durasi Sewa (Hari):</label>
            <input type="number" name="durasi_sewa" value="{{ $penyewaan->durasi_sewa }}" required>

            <label>Tanggal Peminjaman:</label>
            <input type="date" name="tanggal_peminjaman" value="{{ $penyewaan->tanggal_peminjaman }}" required>

            <label>Tanggal Pengembalian:</label>
            <input type="date" name="tanggal_pengembalian" value="{{ $penyewaan->tanggal_pengembalian }}" required>

            <label>Biaya Sewa:</label>
            <input type="number" name="biaya" value="{{ $penyewaan->biaya }}" required>

            <label>Status:</label>
            <select name="status" required>
                <option value="disewa" {{ $penyewaan->status == 'disewa' ? 'selected' : '' }}>Disewa</option>
                <option value="dikembalikan" {{ $penyewaan->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
            </select>

            <button type="submit">Ubah</button>
        </form>
    </div>
</body>
</html>

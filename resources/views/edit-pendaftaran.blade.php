<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data</title>
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
            background-color: #e3f2fd; /* Biru muda untuk latar belakang */
            padding: 20px;
        }

        /* Pengaturan untuk container form edit */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff; /* Putih bersih untuk latar belakang kontainer */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Pengaturan gaya untuk judul */
        h2 {
            text-align: center;
            color: #1565c0; /* Biru tua untuk teks judul */
            margin-bottom: 20px;
        }

        /* Pengaturan tata letak form agar vertikal dengan jarak antar elemen */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Pengaturan input form (text, email, alamat, no telepon, dll.) */
        input[type="text"], input[type="date"], input[type="email"], input[type="tel"], select {
            width: 100%;
            padding: 15px;
            border: 1px solid #90caf9; /* Warna biru muda pada border */
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        /* Pengaturan perubahan warna border ketika input aktif */
        input[type="text"]:focus, input[type="date"]:focus, input[type="email"]:focus, input[type="tel"]:focus, select:focus {
            border-color: #1565c0; /* Biru tua untuk border saat fokus */
        }

        /* Pengaturan gaya tombol submit */
        button {
            padding: 12px 20px;
            background-color: #42a5f5; /* Biru terang untuk tombol */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        /* Efek hover pada tombol */
        button:hover {
            background-color: #1e88e5; /* Biru tua saat hover */
        }

        /* Label tambahan */
        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <!-- Container utama form edit -->
    <div class="container">
        <h2>Edit Pendaftaran</h2>
        <form action="/edit-pendaftaran/{{ $pendaftaran->id }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Input nama -->
            <input type="text" name="nama" value="{{ $pendaftaran->nama }}" required>

            <!-- Input email -->
            <input type="email" name="email" value="{{ $pendaftaran->email }}" required>

            <!-- Ganti input password menjadi alamat -->
            <input type="text" name="alamat" value="{{ $pendaftaran->alamat }}" required>

            <!-- Input nomor telepon -->
            <input type="tel" name="no_telepon" value="{{ $pendaftaran->no_telepon }}" required>

            <!-- Keterangan Kategori -->
            <label for="kategori">Kategori:</label>
            <select name="kategori" id="kategori" required>
                <option value="dewasa" {{ $pendaftaran->kategori == 'dewasa' ? 'selected' : '' }}>Dewasa</option>
                <option value="anak-anak" {{ $pendaftaran->kategori == 'anak-anak' ? 'selected' : '' }}>Anak-anak</option>
            </select>

            <!-- Tombol submit untuk memperbarui data -->
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

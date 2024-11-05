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
            background-color: #f0f2f5;
            padding: 20px;
        }

        /* Pengaturan untuk container form edit */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Pengaturan gaya untuk judul */
        h2 {
            text-align: center;
            color: #333;
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
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        /* Pengaturan perubahan warna border ketika input aktif */
        input[type="text"]:focus, input[type="date"]:focus, input[type="email"]:focus, input[type="tel"]:focus, select:focus {
            border-color: #6c63ff;
        }

        /* Pengaturan gaya tombol submit */
        button {
            padding: 12px 20px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        /* Efek hover pada tombol */
        button:hover {
            background-color: #574bcc;
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
            <input type="text" name="nama" value="{{ $pendaftaran->nama }}">
            
            <!-- Input email -->
            <input type="email" name="email" value="{{ $pendaftaran->email }}">
            
            <!-- Ganti input password menjadi alamat -->
            <input type="text" name="alamat" value="{{ $pendaftaran->alamat }}">
            
            <!-- Input nomor telepon -->
            <input type="tel" name="no_telepon" value="{{ $pendaftaran->no_telepon }}">

            <!-- Keterangan Kategori -->
            <label for="kategori">Kategori: </label>
            <select name="kategori" id="kategori">
                <option value="dewasa" {{ $pendaftaran->kategori == 'dewasa' ? 'selected' : '' }}>Dewasa</option>
                <option value="anak-anak" {{ $pendaftaran->kategori == 'anak-anak' ? 'selected' : '' }}>Anak-anak</option>
            </select>

            <!-- Keterangan Biaya Administrasi -->
            <label for="biaya_administrasi">Biaya Administrasi: </label>
            <select name="biaya_administrasi" id="biaya_administrasi">
                <option value="25000" {{ $pendaftaran->biaya_administrasi == '25000' ? 'selected' : '' }}>25.000</option>
            </select>

            <!-- Tombol submit untuk memperbarui data -->
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

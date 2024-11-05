<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penyewaan</title>
    
    <!-- Link untuk memuat font dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* Style dasar untuk body */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        /* Style untuk container utama */
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style untuk judul halaman */
        h1 {
            text-align: center;
            color: #333;
        }

        /* Style untuk pesan alert */
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        
        /* Pesan sukses dengan warna hijau */
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
        }
        
        /* Pesan error dengan warna merah */
        .alert-danger {
            background-color: #f2dede;
            color: #a94442;
        }

        /* Style untuk label input */
        label {
            display: block;
            margin: 10px 0 5px;
        }

        /* Style untuk input teks, angka, tanggal, dan dropdown */
        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Style untuk tombol utama */
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Efek hover untuk tombol */
        button:hover {
            background-color: #0056b3;
        }

        /* Style untuk opsi baju adat tambahan */
        .baju-adat-options {
            display: none;
        }
    </style>

    <!-- Script JavaScript untuk mengatur tampilan dan interaksi -->
    <script>
        // Fungsi untuk menampilkan opsi baju tarian atau adat
        function showTarianOptions() {
            var jenisBaju = document.getElementById("jenis_baju").value;
            var tarianOptions = document.getElementById("tarian_options");
            var adatOptions = document.getElementById("baju_adat_options");

            if (jenisBaju === "Baju Tarian") {
                tarianOptions.style.display = "block";
                adatOptions.style.display = "none";
            } else if (jenisBaju === "Baju Adat") {
                tarianOptions.style.display = "none";
                adatOptions.style.display = "block";
            } else {
                tarianOptions.style.display = "none";
                adatOptions.style.display = "none";
            }
        }

        // Fungsi untuk mengisi form dengan data yang ada
        function populateForm() {
            showTarianOptions(); // Tampilkan opsi berdasarkan jenis baju yang dipilih
        }

        window.onload = populateForm; // Jalankan fungsi saat halaman dimuat
    </script>
</head>
<body>
    <div class="container">
        <h1>Edit Penyewaan</h1>

        <!-- Pesan sukses jika ada sesi "success" -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Pesan error jika ada sesi "error" -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Daftar error validasi jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk mengedit data penyewaan -->
        <form action="{{ route('penyewaan.update', $penyewaan->id_penyewaan) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Input untuk nama penyewa -->
            <label>Nama Penyewa:</label>
            <input type="text" name="nama_penyewa" value="{{ old('nama_penyewa', $penyewaan->nama_penyewa) }}" required>

            <!-- Input untuk alamat penyewa -->
            <label>Alamat:</label>
            <input type="text" name="alamat" value="{{ old('alamat', $penyewaan->alamat) }}" required>

            <!-- Input untuk nomor HP penyewa -->
            <label>No.HP:</label>
            <input type="text" name="no_hp" value="{{ old('no_hp', $penyewaan->no_hp) }}" required>

            <!-- Input untuk tanggal peminjaman -->
            <label>Tanggal Peminjaman:</label>
            <input type="date" name="tanggal_peminjaman" value="{{ old('tanggal_peminjaman', $penyewaan->tanggal_peminjaman) }}" required>

            <!-- Dropdown untuk memilih jenis baju -->
            <label>Jenis Baju:</label>
            <select name="jenis_baju" id="jenis_baju" required onchange="showTarianOptions()">
                <option value="">Pilih jenis baju</option>
                <option value="Baju Adat" {{ old('jenis_baju', $penyewaan->jenis_baju) == 'Baju Adat' ? 'selected' : '' }}>Baju Adat</option>
                <option value="Baju Tarian" {{ old('jenis_baju', $penyewaan->jenis_baju) == 'Baju Tarian' ? 'selected' : '' }}>Baju Tarian</option>
            </select>

            <!-- Opsi tambahan untuk baju tarian yang muncul saat dipilih -->
            <div id="tarian_options" style="display: {{ old('jenis_baju', $penyewaan->jenis_baju) == 'Baju Tarian' ? 'block' : 'none' }}">
                <label>Jenis Baju Tarian:</label>
                <select name="jenis_baju_tarian">
                    <option value="">Pilih jenis baju tarian</option>
                    <option value="Baju Tarian Dayak" {{ old('jenis_baju_tarian', $penyewaan->jenis_baju_tarian) == 'Baju Tarian Dayak' ? 'selected' : '' }}>Baju Tarian Dayak</option>
                    <option value="Baju Tarian Radap Rahayu" {{ old('jenis_baju_tarian', $penyewaan->jenis_baju_tarian) == 'Baju Tarian Radap Rahayu' ? 'selected' : '' }}>Baju Tarian Radap Rahayu</option>
                    <option value="Baju Tarian Baksa Kembang" {{ old('jenis_baju_tarian', $penyewaan->jenis_baju_tarian) == 'Baju Tarian Baksa Kembang' ? 'selected' : '' }}>Baju Tarian Baksa Kembang</option>
                    <option value="Baju Giring-giring" {{ old('jenis_baju_tarian', $penyewaan->jenis_baju_tarian) == 'Baju Giring-giring' ? 'selected' : '' }}>Baju Tarian Giring-giring</option>
                </select>
            </div>

            <!-- Opsi tambahan untuk baju adat yang muncul saat dipilih -->
            <div id="baju_adat_options" class="baju-adat-options" style="display: {{ old('jenis_baju', $penyewaan->jenis_baju) == 'Baju Adat' ? 'block' : 'none' }}">
                <label>Jenis Baju Adat:</label>
                <select name="jenis_baju_adat">
                    <option value="">Pilih jenis baju adat</option>
                    <option value="Jawa" {{ old('jenis_baju_adat', $penyewaan->jenis_baju_adat) == 'Jawa' ? 'selected' : '' }}>Baju Adat Jawa</option>
                    <option value="Bali" {{ old('jenis_baju_adat', $penyewaan->jenis_baju_adat) == 'Bali' ? 'selected' : '' }}>Baju Adat Bali</option>
                    <option value="NTT" {{ old('jenis_baju_adat', $penyewaan->jenis_baju_adat) == 'NTT' ? 'selected' : '' }}>Baju Adat NTT</option>
                    <option value="Betawi" {{ old('jenis_baju_adat', $penyewaan->jenis_baju_adat) == 'Betawi' ? 'selected' : '' }}>Baju Adat Betawi</option>
                    <option value="Banjar" {{ old('jenis_baju_adat', $penyewaan->jenis_baju_adat) == 'Banjar' ? 'selected' : '' }}>Baju Adat Banjar</option>
                    <option value="Sunda" {{ old('jenis_baju_adat', $penyewaan->jenis_baju_adat) == 'Sunda' ? 'selected' : '' }}>Baju Adat Sunda</option>
                    <option value="Sumsel" {{ old('jenis_baju_adat', $penyewaan->jenis_baju_adat) == 'Sumsel' ? 'selected' : '' }}>Baju Adat Sumsel</option>
                    <option value="Batak" {{ old('jenis_baju_adat', $penyewaan->jenis_baju_adat) == 'Batak' ? 'selected' : '' }}>Baju Adat Batak</option>
                </select>
            </div>

            <!-- Dropdown untuk memilih kategori umur -->
            <label>Kategori:</label>
            <select name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="anak" {{ old('kategori', $penyewaan->kategori) == 'anak' ? 'selected' : '' }}>Anak</option>
                <option value="orang_tua" {{ old('kategori', $penyewaan->kategori) == 'orang_tua' ? 'selected' : '' }}>Orang Tua</option>
                <option value="dewasa" {{ old('kategori', $penyewaan->kategori) == 'dewasa' ? 'selected' : '' }}>Dewasa</option>
            </select>

            <!-- Tombol untuk menyimpan data -->
            <button type="submit">Perbarui</button>
        </form>
    </div>
</body>
</html>

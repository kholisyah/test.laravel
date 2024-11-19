<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penyewaan</title>
    
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

        /* Style untuk kartu data penyewaan */
        .card {
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 10px 0;
            padding: 10px;
            transition: transform 0.2s;
        }

        /* Efek hover pada kartu */
        .card:hover {
            transform: scale(1.02);
        }

        /* Header untuk judul di dalam kartu */
        .card-header {
            font-weight: bold;
            font-size: 1.2em;
        }

        /* Style untuk bagian detail yang muncul saat tombol "Lihat Detail" diklik */
        .details {
            padding: 10px;
            background: #ffffff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
        }

        /* Footer untuk tombol aksi di dalam kartu */
        .card-footer {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        /* Style untuk tombol aksi pada kartu */
        .view-button,
        .edit-button,
        .delete-button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            cursor: pointer;
            margin-left: 10px;
        }

        /* Style khusus untuk tombol hapus */
        .delete-button {
            background-color: #dc3545;
        }

        /* Style untuk opsi baju adat tambahan */
        .baju-adat-options {
            display: none;
        }
    </style>

    <!-- Script JavaScript untuk mengatur tampilan dan interaksi -->
    <script>
        // Fungsi untuk toggle atau menampilkan detail penyewaan
        function toggleDetails(id) {
            var details = document.getElementById("details-" + id);
            details.style.display = (details.style.display === "none" || details.style.display === "") ? "block" : "none";
        }

        // Fungsi untuk menampilkan opsi baju tarian jika jenis baju dipilih sebagai "Baju Tarian"
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
    </script>
</head>
<body>
    <div class="container">
        <h1>Data Penyewaan</h1>

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

        <!-- Form untuk menambah data penyewaan baru -->
        <form action="{{ route('penyewaan.store') }}" method="POST">
            @csrf
            
            <!-- Input untuk nama penyewa -->
            <label>Nama Penyewa:</label>
            <input type="text" name="nama_penyewa" required>

            <!-- Input untuk alamat penyewa -->
            <label>Alamat:</label>
            <input type="text" name="alamat" required>

            <!-- Input untuk nomor HP penyewa -->
            <label>No.HP:</label>
            <input type="text" name="no_hp" required>

            <!-- Input untuk tanggal peminjaman -->
            <label>Tanggal Peminjaman:</label>
            <input type="date" name="tanggal_peminjaman" required>

            <!-- Dropdown untuk memilih jenis baju -->
            <label>Jenis Baju:</label>
            <select name="jenis_baju" id="jenis_baju" required onchange="showTarianOptions()">
                <option value="">Pilih jenis baju</option>
                <option value="Baju Adat">Baju Adat</option>
                <option value="Baju Tarian">Baju Tarian</option>
            </select>

            <!-- Opsi tambahan untuk baju tarian yang muncul saat dipilih -->
            <div id="tarian_options" style="display: none;">
                <label>Jenis Baju Tarian:</label>
                <select name="jenis_baju_tarian">
                    <option value="">Pilih jenis baju tarian</option>
                    <option value="Baju Tarian Dayak">Baju Tarian Dayak</option>
                    <option value="Baju Tarian Radap Rahayu">Baju Tarian Radap Rahayu</option>
                    <option value="Baju Tarian Baksa Kembang">Baju Tarian Baksa Kembang</option>
                    <option value="Baju Giring-giring">Baju Tarian Giring-giring</option>
                </select>
            </div>

            <!-- Opsi tambahan untuk baju adat yang muncul saat dipilih -->
            <div id="baju_adat_options" class="baju-adat-options" style="display: none;">
                <label>Jenis Baju Adat:</label>
                <select name="jenis_baju_adat">
                    <option value="">Pilih jenis baju adat</option>
                    <option value="Jawa">Baju Adat Jawa</option>
                    <option value="Bali">Baju Adat Bali</option>
                    <option value="NTT">Baju Adat NTT</option>
                    <option value="Betawi">Baju Adat Betawi</option>
                    <option value="Banjar">Baju Adat Banjar</option>
                    <option value="Sunda">Baju Adat Sunda</option>
                    <option value="Sumsel">Baju Adat Sumsel</option>
                    <option value="Batak">Baju Adat Batak</option>
                </select>
            </div>

            <!-- Dropdown untuk memilih kategori umur -->
            <label>Kategori:</label>
            <select name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="anak">Anak</option>
                <option value="orang_tua">Orang Tua</option>
                <option value="dewasa">Dewasa</option>
            </select>

            <!-- Tombol untuk menyimpan data -->
            <button type="submit">Simpan</button>
        </form>

        <!-- Daftar penyewaan dalam bentuk kartu -->
        @foreach ($penyewaans as $penyewaan)
            <div class="card">
                <!-- Header kartu yang berisi nama penyewa dan jenis baju -->
                <div class="card-header">{{ $penyewaan->nama_penyewa }} - {{ $penyewaan->jenis_baju }}</div>
                
                <!-- Detail data penyewaan yang dapat ditampilkan atau disembunyikan -->
                <div class="details" id="details-{{ $penyewaan->id_penyewaan }}" style="display: none;">
                    <p><strong>Nama Penyewa:</strong> {{ $penyewaan->nama_penyewa }}</p>
                    <p><strong>Alamat:</strong> {{ $penyewaan->alamat }}</p>
                    <p><strong>No.HP:</strong> {{ $penyewaan->no_hp }}</p>
                    <p><strong>Tanggal Peminjaman:</strong> {{ $penyewaan->tanggal_peminjaman }}</p>
                    <p><strong>Jenis Baju:</strong> {{ $penyewaan->jenis_baju }}</p>
                    <p><strong>Kategori:</strong> {{ $penyewaan->kategori }}</p>
                </div>

                <!-- Footer kartu dengan tombol aksi -->
                <div class="card-footer">
                    <button class="view-button" onclick="toggleDetails({{ $penyewaan->id_penyewaan }})">Lihat Detail</button>
                    <a href="{{ route('penyewaan.edit', $penyewaan->id_penyewaan) }}" class="edit-button">Edit</a>
                    <form action="{{ route('penyewaan.destroy', $penyewaan->id_penyewaan) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>

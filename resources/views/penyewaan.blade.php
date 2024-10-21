<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Menetapkan encoding karakter sebagai UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur tampilan agar responsif di perangkat mobile -->
    <title>Data Penyewaan</title> <!-- Judul halaman yang ditampilkan pada tab browser -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> <!-- Memuat font Google 'Roboto' -->
    <style>
        /* CSS untuk styling halaman */
        body {
            font-family: 'Roboto', sans-serif; /* Mengatur font */
            background-color: #f3f4f6; /* Warna latar belakang halaman */
            margin: 0;
            padding: 20px; /* Jarak dari tepi halaman */
        }

        h1 {
            color: #2c3e50; /* Warna teks untuk judul */
            text-align: center; /* Mengatur teks berada di tengah */
            margin-bottom: 20px;
            font-size: 2.5em; /* Ukuran font judul */
        }

        h2 {
            color: #34495e; /* Warna teks untuk subjudul */
            margin-top: 20px;
            font-size: 1.8em;
        }

        .container {
            max-width: 800px; /* Membatasi lebar maksimum konten */
            margin: auto; /* Mengatur posisi konten di tengah secara horizontal */
            background-color: #ffffff; /* Warna latar belakang container */
            padding: 30px;
            border-radius: 12px; /* Membuat sudut-sudut container melengkung */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); /* Efek bayangan */
        }

        .alert {
            margin: 20px 0;
            padding: 15px;
            border-radius: 6px; /* Membuat sudut alert melengkung */
        }

        .alert-success {
            color: #155724; /* Warna teks hijau untuk pesan sukses */
            background-color: #d4edda; /* Warna latar belakang untuk pesan sukses */
            border: 1px solid #c3e6cb; /* Warna border untuk pesan sukses */
        }

        .alert-danger {
            color: #721c24; /* Warna teks merah untuk pesan error */
            background-color: #f8d7da; /* Warna latar belakang untuk pesan error */
            border: 1px solid #f5c6cb; /* Warna border untuk pesan error */
        }

        form {
            margin-bottom: 30px;
            background-color: #eef1f5;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block; /* Menampilkan label dalam satu baris penuh */
            margin: 10px 0 5px;
        }

        input[type="text"], input[type="number"], input[type="date"], select {
            width: calc(100% - 20px); /* Mengatur lebar input dengan pengurangan 20px */
            padding: 12px;
            border: 2px solid #ced4da; /* Border abu-abu */
            border-radius: 6px;
            margin-bottom: 15px;
            transition: border-color 0.3s; /* Animasi transisi untuk border saat fokus */
        }

        input:focus, select:focus {
            border-color: #007bff; /* Mengubah warna border saat elemen fokus */
        }

        button {
            background-color: #007bff; /* Warna tombol biru */
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s; /* Animasi transisi untuk background saat hover */
        }

        button:hover {
            background-color: #0056b3; /* Warna tombol saat hover */
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 15px 0;
            padding: 15px;
            transition: transform 0.2s; /* Animasi transformasi saat hover */
        }

        .card:hover {
            transform: scale(1.02); /* Efek memperbesar kartu saat hover */
        }

        .card-header {
            font-size: 1.5em; /* Ukuran font header kartu */
            color: #2c3e50;
            margin-bottom: 10px;
            cursor: pointer; /* Menjadikan header dapat diklik */
        }

        .card-body {
            margin-bottom: 10px;
        }

        .card-footer {
            text-align: right; /* Mengatur tombol di bagian kanan footer */
        }

        .edit-button {
            background-color: #007bff; /* Warna tombol edit biru */
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color: #0056b3; /* Warna tombol edit saat hover */
        }

        .delete-button {
            background-color: #dc3545; /* Warna tombol hapus merah */
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-button:hover {
            background-color: #c82333; /* Warna tombol hapus saat hover */
        }

        .details {
            display: none; /* Sembunyikan bagian detail secara default */
            margin-top: 10px;
        }

        .view-button {
            background-color: #007bff; /* Warna tombol view biru */
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .view-button:hover {
            background-color: #0056b3; /* Warna tombol view saat hover */
        }
    </style>
    <script>
        // Fungsi untuk menampilkan atau menyembunyikan detail penyewaan
        function toggleDetails(id) {
            var details = document.getElementById("details-" + id); // Mengambil elemen detail berdasarkan id
            if (details.style.display === "none" || details.style.display === "") {
                details.style.display = "block"; // Menampilkan detail jika tersembunyi
            } else {
                details.style.display = "none"; // Menyembunyikan detail jika sudah tampil
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Data Penyewaan</h1>
    
        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div> <!-- Menampilkan pesan sukses dari session -->
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div> <!-- Menampilkan pesan error dari session -->
        @endif
    
        <!-- Form Create Penyewaan -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> <!-- Menampilkan pesan error validasi -->
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('penyewaan.store') }}" method="POST"> <!-- Form untuk menyimpan data penyewaan -->
            @csrf <!-- Token keamanan CSRF -->
            <label>Nama Penyewa:</label>
            <input type="text" name="nama_penyewa" required> <!-- Input untuk nama penyewa -->
            
            <label>Durasi Sewa (Hari):</label>
            <input type="number" name="durasi_sewa" required> <!-- Input untuk durasi sewa -->
            
            <label>Tanggal Peminjaman:</label>
            <input type="date" name="tanggal_peminjaman" required> <!-- Input untuk tanggal peminjaman -->
            
            <label>Tanggal Pengembalian:</label>
            <input type="date" name="tanggal_pengembalian" required> <!-- Input untuk tanggal pengembalian -->
            
            <label>Biaya Sewa:</label>
            <input type="number" name="biaya" required> <!-- Input untuk biaya sewa -->
            
            <label>Status:</label>
            <select name="status" required> <!-- Dropdown untuk status penyewaan -->
                <option value="disewa">Disewa</option>
                <option value="dikembalikan">Dikembalikan</option>
            </select>
            <button type="submit">Simpan</button> <!-- Tombol simpan -->
        </form>
    
        <h2>Data Yang Tersimpan</h2>
        @if(isset($penyewaans) && count($penyewaans) > 0) <!-- Memeriksa apakah ada data penyewaan -->
            @foreach($penyewaans as $penyewaan) <!-- Mengulangi setiap data penyewaan -->
                <div class="card">
                    <div class="card-header">Penyewaan oleh {{ $penyewaan->nama_penyewa }}</div> <!-- Menampilkan nama penyewa -->
    
                    <div class="details" id="details-{{ $penyewaan->id_penyewaan }}" style="display: none;"> <!-- Bagian detail penyewaan -->
                        <div class="card-body">
                            <p><strong>Durasi Sewa:</strong> {{ $penyewaan->durasi_sewa }} hari</p> <!-- Menampilkan durasi sewa -->
                            <p><strong>Tanggal Peminjaman:</strong> {{ $penyewaan->tanggal_peminjaman }}</p> <!-- Menampilkan tanggal peminjaman -->
                            <p><strong>Tanggal Pengembalian:</strong> {{ $penyewaan->tanggal_pengembalian }}</p> <!-- Menampilkan tanggal pengembalian -->
                            <p><strong>Biaya Sewa:</strong> Rp {{ $penyewaan->biaya }}</p> <!-- Menampilkan biaya sewa -->
                            <p><strong>Status:</strong> {{ $penyewaan->status }}</p> <!-- Menampilkan status penyewaan -->
                        </div>
                    </div>
    
                    <div class="card-footer">
                        <!-- Tombol View dan Edit di sebelah -->
                        <button class="view-button" onclick="toggleDetails({{ $penyewaan->id_penyewaan }})">View</button> <!-- Tombol untuk melihat detail -->
                        <a href="{{ route('penyewaan.edit', $penyewaan->id_penyewaan) }}" class="edit-button">Edit</a> <!-- Link untuk mengedit data penyewaan -->
    
                        <!-- Form delete -->
                        <form action="{{ route('penyewaan.destroy', $penyewaan->id_penyewaan) }}" method="POST" style="display:inline;"> <!-- Form untuk menghapus data penyewaan -->
                            @csrf
                            @method('DELETE') <!-- Metode DELETE untuk menghapus -->
                            <button type="submit" class="delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus data penyewaan ini?');">Hapus</button> <!-- Tombol hapus -->
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>Data tidak ditemukan.</p> <!-- Pesan jika tidak ada data penyewaan -->
        @endif
    </div>    
</body>
</html>

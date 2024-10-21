<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
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

        h2 {
            color: #34495e; /* Warna judul yang lebih lembut */
            margin-top: 20px;
            font-size: 1.8em; /* Ukuran font lebih besar untuk subjudul */
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
        }

        input[type="text"], input[type="number"], select {
            width: calc(100% - 20px);
            padding: 12px; /* Padding lebih besar */
            border: 2px solid #ced4da; /* Border lebih tebal */
            border-radius: 6px; /* Sudut lebih bulat */
            margin-bottom: 15px; /* Jarak antar input */
            transition: border-color 0.3s; /* Transisi border */
        }

        input[type="text"]:focus, input[type="number"]:focus, select:focus {
            border-color: #007bff; /* Warna border saat fokus */
        }

        button {
            background-color: #007bff; /* Mengubah warna tombol simpan menjadi biru */
            color: white;
            padding: 12px 18px; /* Padding lebih besar */
            border: none;
            border-radius: 6px; /* Sudut lebih bulat */
            cursor: pointer;
            transition: background-color 0.3s; /* Transisi saat hover */
        }

        button:hover {
            background-color: #0056b3; /* Warna saat hover */
        }

        .card {
            background-color: #ffffff; /* Latar belakang kartu */
            border-radius: 8px; /* Sudut lebih bulat */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Bayangan kartu */
            margin: 15px 0; /* Margin antar kartu */
            padding: 15px; /* Padding dalam kartu */
            transition: transform 0.2s; /* Efek saat hover */
        }

        .card:hover {
            transform: scale(1.02); /* Efek memperbesar saat hover */
        }

        .card-header {
            font-size: 1.5em; /* Ukuran font untuk header */
            color: #2c3e50; /* Warna teks */
            margin-bottom: 10px; /* Jarak bawah */
        }

        .card-body {
            margin-bottom: 10px; /* Jarak bawah */
            display: none; /* Data tidak ditampilkan secara default */
        }

        .card-footer {
            text-align: right; /* Rata kanan */
        }

        .view-button {
            background-color: transparent; /* Menggunakan background transparan */
            color: #007bff; /* Warna teks biru */
            text-decoration: none; /* Menghilangkan garis bawah */
            padding: 6px 12px; /* Padding tombol */
            border: none; /* Menghilangkan border */
            cursor: pointer; /* Pointer saat hover */
            transition: color 0.3s; /* Transisi warna saat hover */
        }

        .view-button:hover {
            text-decoration: underline; /* Menambahkan garis bawah saat hover */
        }

        .edit-button {
            background-color: #007bff; /* Warna tombol edit */
            color: white;
            padding: 6px 12px; /* Padding untuk tombol edit */
            border-radius: 4px; /* Sudut lebih bulat */
            text-decoration: none;
            transition: background-color 0.3s; /* Transisi latar belakang */
        }

        .edit-button:hover {
            background-color: #0056b3; /* Warna saat hover */
        }

        .delete-button {
            background-color: #dc3545; /* Warna tombol hapus */
            color: white;
            padding: 6px 12px; /* Padding untuk tombol hapus */
            border: none;
            border-radius: 4px; /* Sudut lebih bulat */
            cursor: pointer;
            transition: background-color 0.3s; /* Transisi latar belakang */
        }

        .delete-button:hover {
            background-color: #c82333; /* Warna saat hover */
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Data Barang</h1>

        <!-- Menampilkan pesan sukses -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Form Create Barang -->
        <h2></h2>
        <form action="/barang/store" method="POST">
            @csrf
            <label>Nama Barang:</label>
            <input type="text" name="nama" required>
            
            <label>Kategori:</label>
            <select name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="anak">Anak</option>
                <option value="orang_tua">Orang Tua</option>
                <option value="dewasa">Dewasa</option>
            </select>
            
            <label>Warna:</label>
            <input type="text" name="warna" required>
            
            <label>Harga Sewa:</label>
            <input type="number" name="harga_sewa" required>
            
            <label>Jenis:</label>
            <select name="jenis" required>
                <option value="">Pilih Jenis</option>
                <option value="baju_adat">Baju Adat</option>
                <option value="baju_tarian">Baju Tarian</option>
            </select>
            
            <label>Stok:</label>
            <input type="number" name="stok" required>
            <label>Aksesoris:</label>
            <input type="number" name="aksesoris" required>
            <button type="submit">Simpan</button>
        </form>

        <h2>Data Yang Tersimpan</h2>
        @if(isset($barangs) && count($barangs) > 0)
            @foreach($barangs as $barang)
                <div class="card">
                    <div class="card-header">{{ $barang->nama }}</div>
                    <div class="card-body">
                        <p><strong>Kategori:</strong> {{ $barang->kategori }}</p>
                        <p><strong>Warna:</strong> {{ $barang->warna }}</p>
                        <p><strong>Harga Sewa:</strong> {{ $barang->harga_sewa }}</p>
                        <p><strong>Jenis:</strong> {{ $barang->jenis }}</p>
                        <p><strong>Stok:</strong> {{ $barang->stok }}</p>
                        <p><strong>Jumlah Aksesoris:</strong> {{ $barang->aksesoris }}</p>
                    </div>
                    <div class="card-footer">
                        <button class="view-button" onclick="toggleDetails(this)">View</button>
                        <a href="/barang/edit/{{ $barang->id_barang }}" class="edit-button">Edit</a>
                        <form action="/barang/delete/{{ $barang->id_barang }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?');">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p>Data tidak ditemukan.</p>
        @endif
    </div>

    <script>
        function toggleDetails(button) {
            const cardBody = button.closest('.card').querySelector('.card-body');
            if (cardBody.style.display === 'none' || cardBody.style.display === '') {
                cardBody.style.display = 'block'; // Tampilkan detail
                button.textContent = 'Hide'; // Ganti teks tombol
            } else {
                cardBody.style.display = 'none'; // Sembunyikan detail
                button.textContent = 'View'; // Kembalikan teks tombol
            }
        }
    </script>
</body>
</html>

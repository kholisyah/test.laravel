<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <!-- Menghubungkan font dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <style>
        /* Gaya CSS untuk tampilan halaman */
        body {
            font-family: 'Roboto', sans-serif; /* Menggunakan font Roboto */
            background-color: #f3f4f6; /* Warna latar belakang */
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            /* Memberikan latar belakang putih, padding, border, dan shadow ke container utama */
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        h2 {
            color: #34495e;
            margin-top: 20px;
            font-size: 1.8em;
        }

        .alert {
            margin: 20px 0;
            padding: 15px;
            border-radius: 6px;
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
            background-color: #eef1f5;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="date"], input[type="number"], select {
            width: calc(100% - 20px);
            padding: 12px;
            border: 2px solid #ced4da;
            border-radius: 6px;
            margin-bottom: 15px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #007bff;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 15px 0;
            padding: 15px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card-header {
            font-size: 1.5em;
            color: #2c3e50;
            margin-bottom: 10px;
        }

        .card-body {
            margin-bottom: 10px;
        }

        .card-footer {
            text-align: right;
        }

        .edit-button {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .edit-button:hover {
            background-color: #0056b3;
        }

        .delete-button {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        .details {
            display: none; /* Tersembunyi secara default */
            margin-top: 10px;
        }

        .view-button {
            background-color: #007bff;
            color: white;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .view-button:hover {
            background-color: #0056b3;
        }
    </style>

    <script>
        // Fungsi untuk menampilkan atau menyembunyikan detail transaksi
        function toggleDetails(id) {
            var details = document.getElementById("details-" + id);
            if (details.style.display === "none" || details.style.display === "") {
                details.style.display = "block"; // Tampilkan detail
            } else {
                details.style.display = "none"; // Sembunyikan detail
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Data Transaksi</h1>
    
        <!-- Tampilkan pesan sukses jika ada -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <!-- Tampilkan pesan error jika ada -->
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <!-- Menampilkan error validasi jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!-- Form input untuk transaksi baru -->
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <label>Tanggal Transaksi:</label>
            <input type="date" name="tanggal_transaksi" required>
            
            <label>Total Transaksi:</label>
            <input type="number" name="total_transaksi" required>

            <!-- Dropdown untuk memilih status transaksi -->
            <label>Status Transaksi:</label>
            <select name="status" required>
                <option value="lunas">Lunas</option>
            </select>

            <button type="submit">Simpan</button>
        </form>
    
        <h2>Data Yang Tersimpan</h2>

        <!-- Menampilkan data transaksi yang tersimpan -->
        @if(isset($transaksis) && count($transaksis) > 0)
            @foreach($transaksis as $transaksi)
                <div class="card">
                    <!-- Header kartu yang menampilkan tanggal transaksi -->
                    <div class="card-header">Transaksi pada {{ $transaksi->Tanggal_Transaksi }}</div>
                    
                    <!-- Detail transaksi yang bisa disembunyikan atau ditampilkan -->
                    <div class="details" id="details-{{ $transaksi->Id_Transaksi }}" style="display: none;">
                        <div class="card-body">
                            <p><strong>Total Transaksi:</strong>{{ $transaksi->Total_Transaksi }}</p>
                            <p><strong>Tanggal Transaksi:</strong>{{ $transaksi->Tanggal_Transaksi }}</p>
                            <p><strong>Status:</strong>{{ $transaksi->status }}</p>
                        </div>
                    </div>
    
                    <div class="card-footer">
                        <!-- Tombol View dan Delete berada di satu baris -->
                        <button class="view-button" onclick="toggleDetails({{ $transaksi->Id_Transaksi }})">View</button>
    
                        <!-- Form untuk menghapus transaksi -->
                        <form action="{{ route('transaksi.destroy', $transaksi->Id_Transaksi) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?');">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach    
        @else
            <p>Data tidak ditemukan.</p>
        @endif
    </div>    
</body>
</html>


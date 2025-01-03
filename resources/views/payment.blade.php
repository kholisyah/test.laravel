<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Navbar */
        .navbar {
            background-color: #89c4e9;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }
        
        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar a {
            margin-left: 20px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s, opacity 0.3s;
        }

        .navbar a:hover {
            color: #156ba5;
        }

        .navbar a.active {
            color: #156ba5;
            opacity: 0.7;
        }

        /* Container styling */
        .container {
            margin-top: 30px;
            background-color: #89c4e9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #fff;
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Button styling */
        .btn-success {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
            Sanggar Galuh
        </div>
        <div class="nav-links">
            <a href="/home">Beranda</a>
            <a href="/syarat">Pendaftaran</a>
            <a href="/login">Jadwal</a>
            <a href="/index">Perengkingan</a>
            <a href="/galeri">Penyewaan</a>
            <a href="/cart">Keranjang</a>
            <a href="/login">Login</a>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Header -->
        <header class="text-center mb-4">
            <h1>Pembayaran Transaksi</h1>
        </header>

        <!-- Informasi Transaksi -->
        <section class="mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Transaksi</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Total:</strong> Rp. {{ number_format($transaksi->total, 0, ',', '.') }}</li>
                        <li class="list-group-item"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</li>
                    </ul>
                </div>
            </div> 
        </section>

        <!-- Formulir Informasi Pelanggan -->
        <section class="text-center">
            <form id="waForm">
                <div class="form-group">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" id="nama" name="nama" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="alamat" class="form-label">Alamat:</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="telepon" class="form-label">Nomor Telepon:</label>
                    <input type="text" id="telepon" name="telepon" class="form-control" required>
                </div>
                
                <button type="button" onclick="kirimWA()" class="btn btn-success btn-lg">Bayar Lewat WhatsApp</button>
            </form>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function kirimWA() {
            var nama = document.getElementById('nama').value;
            var alamat = document.getElementById('alamat').value;
            var telepon = document.getElementById('telepon').value;
            
            if (nama === "" || alamat === "" || telepon === "") {
                alert("Harap isi semua field sebelum mengirim!");
                return;
            }
            
        
            var total = "{{ number_format($transaksi->total, 0, ',', '.') }}";
            
            var waLink = "https://api.whatsapp.com/send?phone=6285750274278&text=" + 
                " saya " + nama + 
                " ingin membayar tagihan sebesar Rp. " + total +
                "%0AAlamat: " + alamat + 
                "%0ANomor Telepon: " + telepon;
            
            window.open(waLink, '_blank');
        }
    </script>
</body>
</html>

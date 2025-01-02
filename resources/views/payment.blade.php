<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        .btn-success {
            font-size: 1.2rem;
            font-weight: bold;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .no-box {
            border: none;
            background: none;
            color: #333;
            font-size: 1rem;
            padding: 0;
        }
    </style>
</head>
<body>
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
            <a href="/login">Login</a>
        </div>
    </div>

    <div class="container mt-4">
        <header class="text-center mb-4">
            <h1>Pembayaran Transaksi</h1>
        </header>

        <section class="mb-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Transaksi</h4>
                    <form id="waForm">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Nama:</strong> <span class="no-box" id="nama" contenteditable="true"></span>
                            </li>
                            <li class="list-group-item">
                                <strong>Alamat:</strong> <span class="no-box" id="alamat" contenteditable="true"></span>
                            </li>
                            <li class="list-group-item">
                                <strong>Nomor Telepon:</strong> <span class="no-box" id="telepon" contenteditable="true"></span>
                            </li>
                            <li class="list-group-item"><strong>ID Transaksi:</strong> {{ $transaksi->id }}</li>
                            <li class="list-group-item"><strong>Total:</strong> Rp. {{ number_format($transaksi->total, 0, ',', '.') }}</li>
                            <li class="list-group-item"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</li>
                        </ul>
                    </form>
                </div>
            </div> 
        </section>

        <section class="text-center">
            <button type="button" onclick="kirimWA()" class="btn btn-success btn-lg">Bayar Lewat WhatsApp</button>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function kirimWA() {
            var nama = document.getElementById('nama').innerText.trim();
            var alamat = document.getElementById('alamat').innerText.trim();
            var telepon = document.getElementById('telepon').innerText.trim();

            if (!nama || !alamat || !telepon) {
                alert('Harap isi semua kolom: Nama, Alamat, dan Nomor Telepon.');
                return;
            }
            
            var transaksiId = "{{ $transaksi->id }}";
            var total = "{{ number_format($transaksi->total, 0, ',', '.') }}";
            
            var waLink = "https://api.whatsapp.com/send?phone=6281349931679&text=" + 
                "saya " + nama + 
                " dengan ID Transaksi: " + transaksiId +
                " ingin membayar tagihan sebesar Rp. " + total +
                "%0AAlamat: " + alamat + 
                "%0ANomor Telepon: " + telepon;
            
            window.open(waLink, '_blank');
        }
    </script>
</body>
</html>

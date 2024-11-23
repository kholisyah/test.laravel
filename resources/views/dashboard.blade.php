<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Sanggar Galuh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Mengatur layout dasar */
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #FFDEE9, #B5FFFC);
            font-family: 'Poppins', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            min-width: 240px;
            background-color: #1d3557;
            color: #f1faee;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h4 {
            font-size: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar a {
            display: block;
            color: #f1faee;
            text-decoration: none;
            margin: 10px 0;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s, transform 0.2s;
            font-weight: 500;
        }

        .sidebar a:hover {
            background-color: #457b9d;
            transform: translateX(5px);
        }

        .sidebar a:active {
            background-color: #1d3557;
            transform: translateX(0);
        }

        /* Konten Utama */
        .content {
            flex: 1;
            padding: 30px;
            background-color: #f8f9fa;
        }

        .content h1 {
            font-size: 32px;
            text-align: center;
            margin-bottom: 40px;
            color: #1d3557;
        }

        /* Kartu Dashboard */
        .dashboard-card {
            background: #ffffff;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .dashboard-card h3 {
            color: #1d3557;
            font-size: 24px;
            text-align: center;
        }

        .dashboard-card p {
            font-size: 16px;
            color: #6c757d;
            text-align: center;
            margin-bottom: 20px;
        }

        .dashboard-card a {
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 8px;
            background-color: #457b9d;
            color: #ffffff;
            transition: background-color 0.3s, transform 0.2s;
        }

        .dashboard-card a:hover {
            background-color: #1d3557;
            transform: scale(1.05);
        }

        /* Animasi Tambahan */
        .text-center {
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Dashboard</h4>
        <a href="/dasbord">Profil</a>
        <a href="/project">Pendaftaran</a>
        <a href="/jadwal">Penjadwalan Latihan</a>
        <a href="/penyewaan">Penyewaan</a>
    </div>

   <!-- Konten Utama -->
<div class="content">
    <h1>Dashboard Sanggar Galuh</h1>
    <div class="row">
        <!-- Penjadwalan Latihan -->
        <div class="col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h3>Penjadwalan Latihan</h3>
                    <p>Kelola jadwal latihan tarian di sanggar.</p>
                    <div class="text-center">
                        <a href="/lihat-jadwal">Lihat Jadwal</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lihat Profil -->
        <div class="col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h3>Lihat Profil</h3>
                    <p>lihat informasi mengenai sanggar dan anggota.</p>
                    <div class="text-center">
                        <a href="/lihat-profil">Lihat Profil</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lihat Penyewaan -->
        <div class="col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h3>Lihat Penyewaan</h3>
                    <p>Cek status penyewaan ruang atau fasilitas di sanggar.</p>
                    <div class="text-center">
                        <a href="/lihat-penyewaan">Lihat Penyewaan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Lihat Pendaftaran -->
        <div class="col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">
                    <h3>Lihat Pendaftaran</h3>
                    <p>Lihat daftar pendaftaran yang ada.</p>
                    <div class="text-center">
                        <a href="/lihat-pendaftaran">Lihat Pendaftaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

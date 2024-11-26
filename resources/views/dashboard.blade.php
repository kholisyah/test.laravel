<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sanggar Galuh Pelaihari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Layout dasar */
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #E6F7FF, #CDEFFC);
            font-family: 'Poppins', sans-serif;
            color: #4A4A4A;
        }

        /* Sidebar */
        .sidebar {
            min-width: 240px;
            background-color: #CDEFFC;
            color: #007BBA;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            border-right: 2px solid #8ED2F6;
        }

        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover;
            border: 3px solid #8ED2F6;
        }

        .sidebar h4 {
            font-size: 22px;
            margin-bottom: 20px;
            text-align: center;
            color: #007BBA;
        }

        .sidebar a {
            display: block;
            color: #007BBA;
            text-decoration: none;
            margin: 10px 0;
            padding: 12px;
            border-radius: 8px;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
            font-weight: 500;
            width: 100%;
            text-align: center;
            background-color: #E6F7FF;
        }

        .sidebar a:hover {
            background-color: #8ED2F6;
            transform: translateX(5px);
        }

        /* Konten Utama */
        .content {
            flex: 1;
            padding: 30px;
            background-color: #F4FAFF;
        }

        .content h1 {
            font-size: 34px;
            text-align: center;
            margin-bottom: 40px;
            color: #007BBA;
        }

        /* Kartu Dashboard */
        .dashboard-card {
            background: #FFFFFF;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            height: 100%;
            border: 1px solid #8ED2F6;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .dashboard-card h3 {
            color: #007BBA;
            font-size: 24px;
            text-align: center;
        }

        .dashboard-card p {
            font-size: 16px;
            color: #6A6A6A;
            text-align: center;
            margin-bottom: 20px;
        }

        .dashboard-card a {
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 8px;
            background-color: #8ED2F6;
            color: #FFFFFF;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .dashboard-card a:hover {
            background-color: #007BBA;
            transform: scale(1.05);
        }

        /* Responsivitas */
        @media (max-width: 768px) {
            .sidebar {
                min-width: 200px;
            }

            .content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Logo -->
        <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
        <h4>Sanggar Galuh Pelaihari</h4>

        <!-- Menu -->
        <a href="/lihat-profil">Profil</a>
        <a href="/project">Pendaftaran</a>
        <a href="/jadwal">Penjadwalan</a>
        <a href="/penyewaan">Penyewaan</a>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <h1>Selamat Datang di Sanggar Galuh Pelaihari</h1>
        <div class="row g-4">
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
                        <p>Informasi mengenai sanggar dan anggota.</p>
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
                        <p>Cek daftar penyewaan baju di sanggar.</p>
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

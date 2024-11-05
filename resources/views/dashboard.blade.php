<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Sanggar Galuh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Mengatur layout dashboard */
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: row;
        }
        /* Sidebar di sebelah kiri */
        .sidebar {
            min-width: 200px;
            background-color: #343a40;
            padding: 15px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        /* Konten utama dashboard */
        .content {
            flex: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .dashboard-card {
            margin: 20px 0;
            padding: 15px;
        }
        h1 {
            font-size: 28px;
        }
        h3 {
            font-size: 18px;
        }
    </style>
</head>
<body>

    <!-- Sidebar Kiri -->
    <div class="sidebar">
        <h4 class="text-white">Dashboard</h4>
        <a href="/dasbord">Profil</a>
        <a href="/project">Pendaftaran</a>
        <a href="/jadwal">Penjadwalan Latihan</a>
        <a href="/penyewaan">Penyewaan</a>
       
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <h1 class="text-center">Dashboard Sanggar Galuh</h1>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card dashboard-card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title text-center">Penjadwalan Latihan</h3>
                        <p class="text-center">Kelola jadwal latihan tarian di sanggar.</p>
                        <div class="text-center">
                            <a href="/lihat-jadwal" class="btn btn-primary">Lihat Jadwal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

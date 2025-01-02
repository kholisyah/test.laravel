<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sanggar Galuh Pelaihari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background: linear-gradient(135deg, #156ba5, #89c4e9);
            font-family: 'Poppins', sans-serif;
            color: #4A4A4A;
        }

        .sidebar {
            min-width: 240px;
            background-color: #156ba5;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            border-right: 2px solid #0f4c75;
        }

        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover;
            border: 3px solid #0f4c75;
        }

        .sidebar h4 {
            font-size: 22px;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            margin: 12px 0;
            padding: 12px 0;
            width: 100%;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: background-color 0.3s ease-in-out, transform 0.2s;
        }

        .sidebar a:hover {
            background-color: #0f4c75;
            transform: translateX(8px);
            border-radius: 8px;
        }

        .sidebar .btn-danger {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            width: 100%;
            margin-top: 30px;
            padding: 10px 0;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar .btn-danger:hover {
            background-color: #c0392b;
        }

        .content {
            flex: 1;
            padding: 30px;
            background-color: #ffffff;
        }

        .content h1 {
            font-size: 34px;
            text-align: center;
            margin-bottom: 40px;
            color: #4A4A4A;
        }

        .dashboard-card {
            background: #EAF6FB;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            height: 100%;
            border: 1px solid #B5DDEB;
            text-align: center;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            background: #D9EEF7;
        }

        .dashboard-card h3 {
            color: #4A4A4A;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .dashboard-card p {
            font-size: 16px;
            color: #6B6B6B;
            margin-bottom: 20px;
        }

        .dashboard-card a {
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 8px;
            background-color: #D2ECF5;
            color: #4A4A4A;
            transition: background-color 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .dashboard-card a:hover {
            background-color: #B5DDEB;
            transform: scale(1.05);
        }

    </style>
</head>
<body>
    <div class="sidebar">
        <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
        <h4>Sanggar Galuh Pelaihari</h4>
        <a href="/jadwal"><i class="fas fa-calendar-alt"></i> Penjadwalan</a>
        <a href="/tari"><i class="fas fa-music"></i> Data Tari</a>
        <a href="/pelatih"><i class="fas fa-user-tie"></i> Data Pelatih</a>
<<<<<<< HEAD
=======
        <a href="/pelatih"><i class="fas fa-user-tie"></i> Data Pelatih</a>

>>>>>>> 1b4cca503fb946fa326669b0bc435c0ab1042354
        <form action="{{ route('logout') }}" method="POST" style="width: 100%; text-align: center;">
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>

    <div class="content">
        <h1>Managemen Sanggar Galuh Pelaihari</h1>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h3>Penjadwalan Latihan</h3>
                        <p>Kelola jadwal latihan tarian di sanggar.</p>
                        <a href="/lihat-jadwal">Lihat Jadwal</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h3>Lihat Profil</h3>
                        <p>Informasi mengenai sanggar dan anggota.</p>
                        <a href="/home">Lihat Beranda</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h3>Lihat Penyewaan</h3>
                        <p>Cek daftar penyewaan baju di sanggar.</p>
                        <a href="/lihat-penyewaan">Lihat Penyewaan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card dashboard-card">
                    <div class="card-body">
                        <h3>Lihat Pendaftaran</h3>
                        <p>Lihat daftar pendaftaran yang ada.</p>
                        <a href="/lihat-pendaftaran">Lihat Pendaftaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sanggar Galuh Pelaihari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f6f9;
            font-family: 'Poppins', sans-serif;
            color: #4A4A4A;
        }

        .sidebar {
            min-width: 240px;
            background-color: #156ba5;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 20px auto;
            object-fit: cover;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 8px;
            margin: 5px 0;
        }

        .sidebar a:hover {
            background-color: #0f4c75;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .card {
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
        <h4>Sanggar Galuh Pelaihari</h4>
        <a href="/jadwal"><i class="fas fa-calendar-check"></i> Penjadwalan Latihan</a>
        <a href="/lihat-penyewaan"><i class="fas fa-clipboard-list"></i> Lihat Penyewaan</a>
        <a href="/lihat-pendaftaran"><i class="fas fa-user"></i> Lihat Pendaftaran</a>
        <a href="/tari"><i class="fas fa-book"></i> Data Tari</a>
        <a href="/pelatih"><i class="fas fa-chalkboard-teacher"></i> Data Pelatih</a>
        <form action="{{ route('logout') }}" method="POST" style="width: 100%; text-align: center;">
            @csrf
            <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>

    <div class="content">
        <h1>Managemen Sanggar Galuh Pelaihari</h1>
        
        <!-- Row for cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Total Penyewaan</h5>
                    <p class="fs-4">20</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Total Pendaftaran</h5>
                    <p class="fs-4">10<p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5>Data Pelatih</h5>
                    <p class="fs-4">10</p>
                </div>
            </div>
        </div>

        <!-- Row for chart -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <h5>Grafik Penjadwalan</h5>
                    <canvas id="scheduleChart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data untuk grafik
        const ctx = document.getElementById('scheduleChart').getContext('2d');
        const scheduleChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: 'Jumlah Penjadwalan',
                    data: [12, 19, 3, 5, 2, 3, 10],
                    backgroundColor: 'rgba(21, 107, 165, 0.6)',
                    borderColor: 'rgba(21, 107, 165, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>

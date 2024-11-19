<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Sanggar Galuh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 900px;
            margin-top: 30px;
        }
        .card-header {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
        }
        .card-body {
            font-size: 1.1rem;
            line-height: 1.6;
        }
        .card-body p {
            text-align: justify;
        }
        .card-body ul {
            padding-left: 20px;
            margin-top: 10px;
        }
        .card-body ul li {
            margin-bottom: 12px;
            font-size: 1.1rem;
            line-height: 1.7;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
        }
        .card {
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header.bg-primary {
            background-color: #007bff;
            color: white;
        }
        .card-header.bg-success {
            background-color: #28a745;
            color: white;
        }
        .card-header.bg-warning {
            background-color: #ffc107;
            color: white;
        }
        /* Mengatur margin untuk setiap item Misi */
        .card-body ul li {
            padding-bottom: 15px; /* Memberikan jarak antar item misi */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Profil Sanggar Galuh</h2>

        <!-- Deskripsi Profil Sanggar -->
        <div class="card">
            <div class="card-header bg-primary">
                Deskripsi Profil
            </div>
            <div class="card-body">
                <p>{{ $profil->deskripsi ?? 'Deskripsi mengenai Sanggar Galuh tidak tersedia. Silakan hubungi kami untuk informasi lebih lanjut.' }}</p>
            </div>
        </div>

        <!-- Visi -->
        <div class="card">
            <div class="card-header bg-success">
                Visi Kami
            </div>
            <div class="card-body">
                <p>{{ $profil->visi ?? 'Visi kami adalah menjadi pusat pelatihan seni tari tradisional terkemuka yang tidak hanya melestarikan seni budaya Indonesia, tetapi juga memperkenalkan keindahan seni tari lokal kepada dunia, serta berperan aktif dalam pengembangan seni budaya dengan memberdayakan generasi muda melalui pendidikan seni yang berkualitas.' }}</p>
            </div>
        </div>

        <!-- Misi -->
        <div class="card">
            <div class="card-header bg-warning">
                Misi Kami
            </div>
            <div class="card-body">
                @if ($profil->misi)
                    <ul>
                        @foreach(explode(',', $profil->misi) as $misi)
                            <li>{{ $misi }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Belum ada misi yang tersedia. Namun, kami berkomitmen untuk melestarikan dan memperkenalkan seni tari kepada masyarakat luas.</p>
                @endif
            </div>
        </div>

        <!-- Kembali ke Dashboard -->
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

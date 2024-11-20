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
                <p>{{ $profil->deskripsi ?? 'Sanggar Galuh didirikan pada tahun 2010 oleh Maulida, S.Pd, dengan tujuan untuk melestarikan dan mengembangkan seni tari tradisional Indonesia, khususnya tari-tarian daerah Kalimantan Selatan. Sanggar ini tidak hanya berfokus pada pembelajaran tari, tetapi juga memberikan ruang bagi generasi muda untuk mengenal, mencintai, dan melestarikan budaya lokal. Kami menyediakan berbagai pelatihan untuk berbagai usia, mulai dari anak-anak hingga dewasa, dengan pengajaran yang berbasis pada teknik dan filosofi tari tradisional yang mendalam.' }}</p>
            </div>
        </div>

        <!-- Visi -->
        <div class="card">
            <div class="card-header bg-success">
                Visi Kami
            </div>
            <div class="card-body">
                <p>{{ $profil->visi ?? 'Sanggar Galuh adalah menjadi pusat pelatihan seni tari tradisional terkemuka yang tidak hanya melestarikan seni budaya Indonesia, tetapi juga memperkenalkan keindahan seni tari lokal kepada dunia, serta berperan aktif dalam pengembangan seni budaya dengan memperdayakan generasi muda melalui pendidikan seni yang berkualitas.' }}</p>
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
                    <p>'1. Menyelenggarakan pelatihan seni tari tradisional yang berkualitas, dengan pendekatan yang sesuai dengan perkembangan zaman namun tetap menjaga kelestarian nilai-nilai budaya asli.
                        2. Membuka peluang bagi generasi muda untuk menggali potensi diri dalam bidang seni tari melalui berbagai program pelatihan dan pertunjukan.
                        3. Menjadi media pembelajaran yang mendalam mengenai seni tari tradisional bagi masyarakat luas, baik di tingkat lokal maupun nasional.
                        4. Berperan serta dalam meningkatkan penghargaan dan kecintaan masyarakat terhadap budaya dan seni tari tradisional Indonesia.
                        5. Mengadakan acara dan pertunjukan seni tari untuk mempromosikan hasil karya peserta dan memperkenalkan seni tari kepada publik lebih luas.</p>
                @endif
            </div>
        </div>

        <!-- Kembali ke Dashboard -->
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

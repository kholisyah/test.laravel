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
            background-color: #F4FAFD; /* Latar belakang biru pastel */
        }
        .container {
            max-width: 900px;
            margin-top: 30px;
            background-color: #EAF6FB; /* Warna biru pastel lembut */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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
            background-color: #B5DDEB; /* Tombol biru pastel */
            color: #4A4A4A;
            border: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #A2D4E8; /* Tombol hover lebih gelap */
        }
        .card {
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header.bg-custom {
            background-color: #B5DDEB; /* Header card biru pastel */
            color: #4A4A4A;
        }
        .card-body ul li {
            padding-bottom: 15px; /* Memberikan jarak antar item misi */
        }
        .no-bullet {
            list-style-type: none; /* Menghilangkan bullet */
            padding: 0; /* Menghapus padding kiri default */
            margin: 0; /* Menghapus margin default */
        }

    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Profil Sanggar Galuh</h2>

        <!-- Deskripsi Profil Sanggar -->
        <div class="card">
            <div class="card-header bg-custom">
                Deskripsi Profil
            </div>
            <div class="card-body">
                <p>{{ $profil->deskripsi ?? 'Sanggar Galuh didirikan pada tahun 2010 oleh Maulida, S.Pd, dengan tujuan untuk melestarikan dan mengembangkan seni tari tradisional Indonesia, khususnya tari-tarian daerah Kalimantan Selatan. Sanggar ini tidak hanya berfokus pada pembelajaran tari, tetapi juga memberikan ruang bagi generasi muda untuk mengenal, mencintai, dan melestarikan budaya lokal. Kami menyediakan berbagai pelatihan untuk berbagai usia, mulai dari anak-anak hingga dewasa, dengan pengajaran yang berbasis pada teknik dan filosofi tari tradisional yang mendalam. Sanggar Galuh berlokasi di Komplek Perumahan Hamparan Permai No.68 Blok.4, Desa Atu Atu, depan RTH, samping kolam renang' }}</p>
            </div>
        </div>

        <!-- Visi -->
        <div class="card">
            <div class="card-header bg-custom">
                Visi Kami
            </div>
            <div class="card-body">
                <p>{{ $profil->visi ?? 'Sanggar Galuh adalah menjadi pusat pelatihan seni tari tradisional terkemuka yang tidak hanya melestarikan seni budaya Indonesia, tetapi juga memperkenalkan keindahan seni tari lokal kepada dunia, serta berperan aktif dalam pengembangan seni budaya dengan memperdayakan generasi muda melalui pendidikan seni yang berkualitas.' }}</p>
            </div>
        </div>

        <!-- Misi -->
        <div class="card">
            <div class="card-header bg-custom">
                Misi Kami
            </div>
            <div class="card-body">
                @if ($profil->misi)
                    <ul class="no-bullet">
                        @foreach (explode("\n", $profil->misi) as $misi)
                            @if (trim($misi)) {{-- Abaikan baris kosong --}}
                                <li>{{ trim($misi) }}</li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p>Belum ada data misi.</p>
                @endif
            </div>
        </div>            

        <!-- Kembali ke Dashboard -->
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

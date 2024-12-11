<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeri Baju Adat & Tarian - Sanggar Galuh Pelaihari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Layout Dasar */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F9F9F9;
            margin: 0;
            padding: 0;
        }

        /* Konten Utama */
        .content {
            padding: 40px;
        }

        .content h1 {
            font-size: 36px;
            color: #003366;
            margin-bottom: 40px;
            text-align: center;
        }

        /* Galeri */
        .gallery-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
            transition: transform 0.3s;
            padding: 10px;
        }

        .gallery-card img {
            width: 100%;
            height: auto;
            max-height: 300px; /* Membatasi tinggi maksimal gambar */
            object-fit: cover;
            border-radius: 8px;
        }

        .gallery-card .card-body {
            padding: 15px;
        }

        .gallery-card h3 {
            font-size: 20px;
            color: #003366;
            text-align: center;
            margin-top: 10px;
        }

        .gallery-card p {
            font-size: 14px;
            color: #555;
            text-align: center;
            margin-top: 10px;
        }

        .gallery-card:hover {
            transform: scale(1.05);
        }

        /* Responsivitas */
        @media (max-width: 768px) {
            .gallery-card {
                margin-bottom: 20px;
            }

            .gallery-card img {
                max-height: 200px; /* Mengurangi ukuran gambar pada perangkat lebih kecil */
            }
        }

        /* Hover effect for better visibility */
        .gallery-card img:hover {
            transform: scale(1.1);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <!-- Konten Utama -->
    <div class="content">
        <h1>Baju Adat & Tarian Sanggar Galuh Pelaihari</h1>
        <div class="row">
            <!-- Baju 1 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Baksa Kembang.jpg') }}" alt="Baksa Kembang">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 2 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Radap Rahayu.jpg') }}" alt="Radap Rahayu">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 3 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Giring giring.jpg') }}" alt="Giring giring">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 4 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Dayak.jpg') }}" alt="Dayak Cewe">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 5 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Dayak cowo.jpg') }}" alt="Dayak Cowo">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 6 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju banjar cewe.jpg') }}" alt="Baju Banjar Cewe">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 7 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju banjar cowo.jpg') }}" alt="Baju Banjar Cowo">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 8 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju nanang.jpg') }}" alt="baju nanang">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 9 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/bali cewe.jpg') }}" alt="Bali Cewe">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 10 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/bali.jpg') }}" alt="Bali">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 11 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/batak.jpg') }}" alt="Batak">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 12 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/galuh banjar.jpg') }}" alt="Galuh banjar">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 13 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/jas cewe.jpg') }}" alt="Jas Cewe">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 14 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/jas cowo.jpg') }}" alt="Jas Cowo">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 15 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/jawa cewe.jpg') }}" alt="Jawa Cewe">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 16 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/jawa.jpg') }}" alt="Jawa Cowo">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 17 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Kebaya.jpg') }}" alt="Kebaya KutuBaru">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 18 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/ntt.jpg') }}" alt="Baju Ntt">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 19 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju19.jpg') }}" alt="Baju 19">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <!-- Baju 20 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju20.jpg') }}" alt="Baju 20">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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
        }

        .gallery-card img {
            width: 100%;
            height: auto; /* Mempertahankan rasio gambar */
            max-height: 200px; /* Membatasi tinggi maksimal gambar */
            object-fit: cover;
        }

        .gallery-card .card-body {
            padding: 20px;
        }

        .gallery-card h3 {
            font-size: 22px;
            color: #003366;
            text-align: center;
            margin-top: 10px;
        }

        .gallery-card p {
            font-size: 16px;
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
                max-height: 150px; /* Mengurangi ukuran gambar pada perangkat lebih kecil */
            }
        }
    </style>
</head>
<body>
    <!-- Konten Utama -->
    <div class="content">
        <h1>Galeri Baju Adat & Tarian</h1>
        <div class="row">
            <!-- Baju 1 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Baksa Kembang.jpg') }}" alt="Baksa Kembang">
                    <div class="card-body">
                        <h3>Baju Tarian Baks Kembang</h3>
                        <p>Baju adat untuk acara tradisional dan upacara penting.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 2 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Radap Rahayu.jpg') }}" alt="Radap Rahayu">
                    <div class="card-body">
                        <h3>Baju Adat 2</h3>
                        <p>Baju adat dengan desain khas daerah.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 3 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Dayak.jpg') }}" alt="Dayak">
                    <div class="card-body">
                        <h3>Baju Adat 3</h3>
                        <p>Baju adat untuk perayaan dan acara besar.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 4 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Giring giring.jpg') }}" alt="Giring giring">
                    <div class="card-body">
                        <h3>Baju Adat 4</h3>
                        <p>Baju adat untuk acara keluarga dan pertemuan.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 5 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju5.jpg') }}" alt="Baju 5">
                    <div class="card-body">
                        <h3>Baju Adat 5</h3>
                        <p>Baju adat dengan ornamen khas tradisional.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 6 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju6.jpg') }}" alt="Baju 6">
                    <div class="card-body">
                        <h3>Baju Adat 6</h3>
                        <p>Baju adat dengan sentuhan modern.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 7 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju7.jpg') }}" alt="Baju 7">
                    <div class="card-body">
                        <h3>Baju Adat 7</h3>
                        <p>Baju adat dengan warna cerah dan desain elegan.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 8 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju8.jpg') }}" alt="Baju 8">
                    <div class="card-body">
                        <h3>Baju Adat 8</h3>
                        <p>Baju adat dengan aksesoris khas daerah.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 9 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju9.jpg') }}" alt="Baju 9">
                    <div class="card-body">
                        <h3>Baju Adat 9</h3>
                        <p>Baju adat untuk acara kebudayaan dan kesenian.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 10 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju10.jpg') }}" alt="Baju 10">
                    <div class="card-body">
                        <h3>Baju Adat 10</h3>
                        <p>Baju adat dengan desain yang klasik dan mewah.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 11 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju11.jpg') }}" alt="Baju 11">
                    <div class="card-body">
                        <h3>Baju Adat 11</h3>
                        <p>Baju adat dengan kombinasi warna yang menarik.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 12 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju12.jpg') }}" alt="Baju 12">
                    <div class="card-body">
                        <h3>Baju Adat 12</h3>
                        <p>Baju adat dengan motif yang elegan dan anggun.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 13 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju13.jpg') }}" alt="Baju 13">
                    <div class="card-body">
                        <h3>Baju Adat 13</h3>
                        <p>Baju adat dengan desain simpel namun menarik.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 14 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju14.jpg') }}" alt="Baju 14">
                    <div class="card-body">
                        <h3>Baju Adat 14</h3>
                        <p>Baju adat dengan kesan modern dan elegan.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 15 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju15.jpg') }}" alt="Baju 15">
                    <div class="card-body">
                        <h3>Baju Adat 15</h3>
                        <p>Baju adat untuk acara besar dan formal.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 16 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju16.jpg') }}" alt="Baju 16">
                    <div class="card-body">
                        <h3>Baju Adat 16</h3>
                        <p>Baju adat dengan ornamen berkilau dan cantik.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 17 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju17.jpg') }}" alt="Baju 17">
                    <div class="card-body">
                        <h3>Baju Adat 17</h3>
                        <p>Baju adat dengan gaya tradisional yang khas.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 18 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju18.jpg') }}" alt="Baju 18">
                    <div class="card-body">
                        <h3>Baju Adat 18</h3>
                        <p>Baju adat dengan detail yang sangat menawan.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 19 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju19.jpg') }}" alt="Baju 19">
                    <div class="card-body">
                        <h3>Baju Adat 19</h3>
                        <p>Baju adat dengan aksen bordir tangan yang indah.</p>
                    </div>
                </div>
            </div>

            <!-- Baju 20 -->
            <div class="col-md-4">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju20.jpg') }}" alt="Baju 20">
                    <div class="card-body">
                        <h3>Baju Adat 20</h3>
                        <p>Baju adat yang mewah dan penuh warna.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

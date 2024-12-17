<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Sanggar Galuh</title>
    <style>
        /* Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eef6fb; /* Biru pastel lembut */
            color: #2a3d55; /* Teks utama */
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        h2 {
            color: #3a77a7; /* Judul dengan warna biru pastel */
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #89c4e9; /* Biru pastel navbar */
            color: white;
            padding: 10px 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .navbar a:hover {
            background-color: #6baac8; /* Biru pastel gelap untuk hover */
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 100px 20px;
            background: linear-gradient(to bottom, #89c4e9, #eef6fb); /* Gradien biru pastel */
            color: #2a3d55;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 3em;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .hero button {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #3a77a7; /* Tombol biru pastel */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .hero button:hover {
            background-color: #2f5f83; /* Hover tombol lebih gelap */
        }

        /* Content Section */
        .content {
            padding: 40px 20px;
            max-width: 1200px;
            margin: auto;
        }

        section {
            background-color: #ffffff;
            margin: 20px 0;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        section h2 {
            margin-bottom: 15px;
        }

        section p {
            line-height: 1.8;
            text-align: justify;
        }

        /* Footer */
        .footer {
            background-color: #89c4e9; /* Footer biru pastel */
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="home">Beranda</a>
        <a href="project">Pendaftaran</a>
        <a href="login">Jadwal</a>
        <a href="galeri">Penyewaan</a>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Selamat Datang di Sanggar Galuh</h1>
        <p>Pelajari lebih lanjut tentang budaya dan seni melalui layanan kami.</p>
        <button>Pelajari Lebih Lanjut</button>
    </div>

    <!-- Content -->
    <div class="content">
        <section id="profil">
            <h2>Pendiri Sanggar</h2>
            <p>Sanggar ini didirikan pada tahun 2010 oleh Maulida, S.Pd, seorang pendidik yang berkomitmen melestarikan budaya tari Kalimantan Selatan.</p>
        </section>

        <section id="deskripsi">
            <h2>Deskripsi Sanggar</h2>
            <p>Sanggar Galuh didirikan pada tahun 2010 oleh Maulida, S.Pd, dengan tujuan untuk melestarikan dan mengembangkan seni tari tradisional Indonesia, khususnya tari-tarian daerah Kalimantan Selatan. Sanggar ini tidak hanya berfokus pada pembelajaran tari, tetapi juga memberikan ruang bagi generasi muda untuk mengenal, mencintai, dan melestarikan budaya lokal. Kami menyediakan berbagai pelatihan untuk berbagai usia, mulai dari anak-anak hingga dewasa, dengan pengajaran yang berbasis pada teknik dan filosofi tari tradisional yang mendalam. Sanggar Galuh berlokasi di Komplek Perumahan Hamparan Permai No.68 Blok.4, Desa Atu Atu, depan RTH, samping kolam renang.</p>
        </section>

        <section id="visi-misi">
            <h2>Visi dan Misi</h2>
            <p>
                <strong>Visi:</strong> Sanggar Galuh adalah menjadi pusat pelatihan seni tari tradisional terkemuka yang tidak hanya melestarikan seni budaya Indonesia, tetapi juga memperkenalkan keindahan seni tari lokal kepada dunia.<br><br>
                <strong>Misi:</strong>
                <ol>
                    <li>Menyelenggarakan pelatihan seni tari tradisional berkualitas.</li>
                    <li>Membuka peluang generasi muda untuk menggali potensi dalam seni tari.</li>
                    <li>Menjadi media pembelajaran seni tari tradisional bagi masyarakat luas.</li>
                    <li>Berperan meningkatkan kecintaan terhadap budaya tradisional Indonesia.</li>
                    <li>Mengadakan pertunjukan seni tari untuk mempromosikan hasil karya peserta.</li>
                </ol>
            </p>
        </section>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 Sanggar Galuh Pelaihari. All Rights Reserved.</p>
    </div>

</body>
</html>

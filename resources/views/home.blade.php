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
            background-color: #eef6fb;
            color: #2a3d55;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        h2 {
            color: #3a77a7;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #89c4e9;
            padding: 10px 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-bottom: 2px solid #6baac8;
        }

        .navbar .logo {
            font-size: 1.5em;
            font-weight: bold;
            color: white;
            display: flex;
            align-items: center;
        }

        .navbar .nav-links {
            display: flex;
            gap: 15px;
        }

        .navbar .nav-links a {
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .navbar .nav-links a:hover {
            background-color: #6baac8;
        }

        .logo-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 100px 20px;
            background-image: url('{{ asset('assets/img/home.jpeg') }}'); /* Gambar latar belakang */
            background-size: cover; /* Gambar memenuhi area */
            background-position: center; /* Gambar terpusat */
            color: white; /* Warna teks putih agar kontras */
            position: relative;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Lapisan gelap untuk meningkatkan keterbacaan teks */
            z-index: 1;
        }

        .hero h1, .hero p, .hero button {
            position: relative;
            z-index: 2; /* Membawa teks di atas lapisan gelap */
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
            background-color: #3a77a7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .hero button:hover {
            background-color: #2f5f83;
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
            background-color: #89c4e9;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh" class="logo-circle">
            Sanggar Galuh
        </div>
        <div class="nav-links">
            <a href="home">Beranda</a>
            <a href="project">Pendaftaran</a>
            <a href="login">Jadwal</a>
            <a href="galeri">Penyewaan</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Selamat Datang di Sanggar Galuh</h1>
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
        <p>&copy;Sanggar Galuh Pelaihari</p>
    </div>

</body>
</html>

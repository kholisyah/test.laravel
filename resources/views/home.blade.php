<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
            position: sticky;
            top: 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }

        .hero {
            text-align: center;
            padding: 100px 20px;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1920x1080');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .hero h1 {
            font-size: 3em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            margin-bottom: 40px;
        }

        .hero button {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .hero button:hover {
            background-color: #575757;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .content section {
            margin: 40px 0;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="home">Beranda</a>
        <a href="project">Pendaftaran</a>
        <a href="login">Jadwal</a>
        <a href="galeri">Penyewaan</a>
    </div>

    <div class="hero">
        <h1>Selamat Datang di Sanggar Galuh</h1>
        <p>Pelajari lebih lanjut tentang budaya dan seni melalui layanan kami.</p>
    </div>

    <div class="content">
        <section id="profil">
            <h2>Pendiri Sanggar</h2>
            <p>Lihat jadwal terbaru untuk pelatihan dan acara lainnya.</p>
         </section>

        <section id="pendaftaran">
            <h2>Visi Misi</h2>
            <p>Sanggar Galuh adalah menjadi pusat pelatihan seni tari tradisional terkemuka yang tidak hanya melestarikan seni budaya Indonesia, tetapi juga memperkenalkan keindahan seni tari lokal kepada dunia, serta berperan aktif dalam pengembangan seni budaya dengan memperdayakan generasi muda melalui pendidikan seni yang berkualitas..</p>
            <p>1. Menyelenggarakan pelatihan seni tari tradisional yang berkualitas dengan pendekatan yang sesuai dengan perkembangan zaman namun tetap menjaga kelestarian nilai-nilai budaya asli.
                2. Membuka peluang bagi generasi muda untuk menggali potensi diri dalam bidang seni tari melalui berbagai program pelatihan dan pertunjukan.
                3. Menjadi media pembelajaran yang mendalam mengenai seni tari tradisional bagi masyarakat luas, baik di tingkat lokal maupun nasional.
                4. Berperan serta dalam meningkatkan penghargaan dan kecintaan masyarakat terhadap budaya dan seni tari tradisional Indonesia.
                5. Mengadakan acara dan pertunjukan seni tari untuk mempromosikan hasil karya peserta dan memperkenalkan seni tari kepada publik lebih luas </p>
        </section>

        <section id="pendiri sanggar">
            <h2>Deskripsi sanggar</h2>
            <p>Sanggar Galuh didirikan pada tahun 2010 oleh Maulida, S.Pd, dengan tujuan untuk melestarikan dan mengembangkan seni tari tradisional Indonesia, khususnya tari-tarian daerah Kalimantan Selatan. Sanggar ini tidak hanya berfokus pada pembelajaran tari, tetapi juga memberikan ruang bagi generasi muda untuk mengenal, mencintai, dan melestarikan budaya lokal. Kami menyediakan berbagai pelatihan untuk berbagai usia, mulai dari anak-anak hingga dewasa, dengan pengajaran yang berbasis pada teknik dan filosofi tari tradisional yang mendalam. Sanggar Galuh berlokasi di Komplek Perumahan Hamparan Permai No.68 Blok.4, Desa Atu Atu, depan RTH, samping kolam renang</p>
       
        </section>
    </div>

</body>
</html>

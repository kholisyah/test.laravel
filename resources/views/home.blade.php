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
            background-color: #89c4e9;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }
        
        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar a {
            margin-left: 20px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s, opacity 0.3s;
        }

        .navbar a:hover {
            color: #156ba5;
        }

        .navbar a.active {
            color: #156ba5;
            opacity: 0.7;
        }

        .logo-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 195px 50px;
            background-image: url('{{ asset('assets/img/Baksa Kembang.jpg') }}');
            background-size: cover;
            background-position: center;
            color: white;
            position: relative;
        }

        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero h1, .hero p, .hero button {
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3em;
            font-weight: 600;
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

        /* Founder Section */
        .founder {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .founder img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .founder-info {
            flex: 1;
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
        <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
        Sanggar Galuh
    </div>
    <div class="nav-links">
        <a href="/syarat">Pendaftaran</a>
        <a href="/lihat-jadwal">Jadwal</a>
        <a href="/index">Perengkingan</a>
        <a href="/penyewaan">Penyewaan</a>
        <a href="/login">Login</a>
    </div>
</div>


    <!-- Hero Section -->
    <div class="hero">
        <h1>Selamat Datang di Sanggar Galuh</h1>
        <p>Mengembangkan dan Melestarikan Tari Tradisional Kalimantan Selatan</p>
    </div>

    <!-- Content -->
    <div class="content">
        <section id="profil">
            <h2>Pendiri Sanggar</h2>
            <div class="founder">
                <img src="{{ asset('assets/img/maulida.jpg') }}" alt="Pendiri Sanggar">
                <div class="founder-info">
                    <p><strong>Maulida, S.Pd</strong> adalah pendiri Sanggar Galuh pada tahun 2010. Dengan latar belakang pendidikan seni tari, beliau memiliki visi kuat untuk melestarikan kebudayaan Kalimantan Selatan melalui seni tari. Dedikasi beliau tidak hanya mengajarkan tarian tradisional, tetapi juga membangun ruang kreativitas dan apresiasi seni bagi generasi muda.</p>
                    <p>Melalui bimbingannya, Sanggar Galuh berhasil tampil dalam berbagai acara seni lokal maupun nasional, menjadikan sanggar ini sebagai salah satu pusat seni tari terkemuka di daerah.</p>
                </div>
            </div>
        </section>

        <section id="deskripsi">
            <h2>Deskripsi Sanggar</h2>
            <p>Sanggar Galuh didirikan pada tahun 2010 dengan tujuan untuk melestarikan dan mengembangkan seni tari tradisional Kalimantan Selatan. Kami menyediakan pelatihan profesional dan ruang kreatif bagi semua kalangan usia.</p>
        </section>

        <section id="visi-misi">
            <h2>Visi dan Misi</h2>
            <p>
                <strong>Visi:</strong> Menjadi pusat pelatihan seni tari tradisional yang melestarikan budaya lokal dan memperkenalkannya ke kancah nasional dan internasional.<br>
                <strong>Misi:</strong>
                <ol>
                    <li>Melatih generasi muda mengenal dan mencintai seni tari tradisional.</li>
                    <li>Menyelenggarakan pertunjukan seni berkala.</li>
                    <li>Menjalin kolaborasi untuk pelestarian budaya daerah.</li>
                </ol>
            </p>
        </section>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p> Sanggar Galuh Pelaihari.</p>
    </div>

</body>
</html>

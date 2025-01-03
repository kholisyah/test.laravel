<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Pendaftaran</title>
    <style>
        /* Navbar */
        .navbar {
            background-color: #89c4e9;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
            width: 100%;
            position: relative;
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #E8F0FE;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"], input[type="email"], input[type="tel"], select {
            width: 100%;
            padding: 15px;
            border: 1px solid #AFCBFF;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, select:focus {
            border-color: #7DA3FF;
        }

        button {
            padding: 12px 20px;
            background-color: #4D8BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3B72D3;
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
            <a href="/home">Beranda</a>
            <a href="/lihat-jadwal">Jadwal</a>
            <a href="/index">Perengkingan</a>
            <a href="/galeri">Penyewaan</a>
            <a href="/login">Login</a>
        </div>
    </div>
    <div class="container">
        <h2>Pendaftaran</h2>
        <form id="pendaftaranForm" action="/create-pendaftaran" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="tel" name="no_telepon" placeholder="No Telepon" required>
            <label for="kategori">Kategori: </label>
            <select name="kategori" id="kategori" required>
                <option value="dewasa">Dewasa</option>
                <option value="anak-anak">Anak-anak</option>
            </select>
            <button type="submit">Simpan</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#pendaftaranForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: '/create-pendaftaran',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Data berhasil disimpan!');
                    window.location.href = '/sukses';
                    $('#pendaftaranForm')[0].reset();
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat menyimpan data: ' + error);
                }
            });
        });
    </script>
</body>
</html>

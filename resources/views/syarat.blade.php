<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SanggarGaluh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #E8F0FE;
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

      .container {
        margin-top: 50px;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
      }

      h3 {
        margin-bottom: 20px;
        font-weight: bold;
        color: #333;
      }

      .form-group label {
        font-weight: 500;
        color: #495057;
      }

      .form-control {
        border-radius: 5px;
        border: 1px solid #AFCBFF;
      }

      .form-control:focus {
        border-color: #7DA3FF;
      }

      .btn-primary {
        background-color: #4D8BFF;
        border-color: #4D8BFF;
        color: white;
        transition: background-color 0.3s ease;
      }

      .btn-primary:hover {
        background-color: #3B72D3;
      }

      .btn {
        margin-top: 10px;
      }

      a.btn-primary {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div class="navbar">
      <div class="logo">
          <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
          Sanggar Galuh
      </div>
      <div class="nav-links">
          <a href="/home">Beranda</a>
          <a href="/syarat">Pendaftaran</a>
          <a href="/lihat-jadwal">Jadwal</a>
          <a href="/index">Perengkingan</a>
          <a href="/penyewaan">Penyewaan</a>
          <a href="/cart">Keranjang</a>
          <a href="/login">Login</a>
      </div>
  </div>
    @if ($errors->has('file'))
    <div class="alert alert-danger">
        {{ $errors->first('file') }}
    </div>
@endif

    <div class="container">
        <p><strong>Syarat pendaftaran yang diperlukan sebagai berikut:</strong></p>
        <ul>
            <li>Kartu Keluarga</li>
            <li>Akta</li>
            <li>Pas Foto 3x4</li>
            <li>Ijazah Terakhir/SKHU</li>
            <li>Bukti pembayaran sebesar Rp25.000 ke No rekening (4557 0100 8242 506)</li>
        </ul>
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-3">
              <label for="file">Upload bukti persyaratan disini dalam bentuk 1 File PDF dengan format file (Nama Anda):</label>
              <input type="file" name="file" id="file" class="form-control">
          </div>
      
          <button type="submit" class="btn btn-primary">Selanjutnya</button>
      </form>      
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

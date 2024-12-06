<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SanggarGaluh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background-color: #f8f9fa;
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
        color: #343a40;
      }

      .form-group label {
        font-weight: 500;
        color: #495057;
      }

      .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
      }

      .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease;
      }

      .btn-primary:hover {
        background-color: #0056b3;
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
    <div class="container">
        <h3>Masukkan Berkas Disini</h3>
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group mb-3">
              <label for="file">Upload bukti dan persyaratan disini</label>
              <input type="file" name="file" id="file" class="form-control">
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>      
    </div>
    <a href="{{ url('/project') }}" class="btn btn-primary">Kembali ke Pendaftaran</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

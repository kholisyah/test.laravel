<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Jadwal Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f7;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        h1 {
            font-size: 2rem;
            color: #0056b3;
            margin-bottom: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
        }

        .card-title {
            font-size: 1.5rem;
            color: #0056b3;
            margin-bottom: 15px;
        }

        form input[type="text"],
        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #003f8a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Edit Jadwal Latihan</h1>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Edit Jadwal</h2>
                <form action="/update-posts/{{ $akun->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="text" name="tanggal" id="tanggal" class="form-control" value="{{ $akun->tanggal }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu" class="form-label">Waktu</label>
                        <input type="text" name="waktu" id="waktu" class="form-control" value="{{ $akun->waktu }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tarian_id" class="form-label">Jenis Tarian</label>
                        <select name="tarian_id" id="tarian_id" class="form-control" required>
                            @foreach ($tarians as $tarian)
                                <option value="{{ $tarian->id }}" {{ $akun->tarian_id == $tarian->id ? 'selected' : '' }}>
                                    {{ $tarian->nama_tari }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="pelatih" class="form-label">Pelatih</label>
                        <input type="text" name="pelatih" id="pelatih" class="form-control" value="{{ $akun->pelatih }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="anggota" class="form-label">Anggota</label>
                        <input type="text" name="anggota" id="anggota" class="form-control" value="{{ $akun->anggota }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

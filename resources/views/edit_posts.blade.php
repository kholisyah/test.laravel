<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Jadwal Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Edit Jadwal Latihan</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title text-center">Edit Jadwal</h2>
                <form action="/update-posts/{{ $akun->id }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" value="{{ $akun->tanggal }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="waktu" class="form-label">Waktu</label>
                        <input type="text" name="waktu" class="form-control" value="{{ $akun->waktu }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="jenis_tari" class="form-label">Jenis Tari</label>
                        <input type="text" name="jenis_tari" class="form-control" value="{{ $akun->jenis_tari }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="pelatih" class="form-label">Pelatih</label>
                        <input type="text" name="pelatih" class="form-control" value="{{ $akun->pelatih }}" required>
                    </div>
                    <div class="mb-2">
                        <label for="anggota" class="form-label">Anggota</label>
                        <input type="text" name="anggota" class="form-control" value="{{ $akun->anggota }}" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

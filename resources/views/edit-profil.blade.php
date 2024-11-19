<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Sanggar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1, h2 {
            color: #343a40;
        }
        .card {
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Profil Sanggar</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-body">
                        <h2 class="text-center">Edit Profil</h2>
                        <form id="editProfilForm" action="/update-profil/{{ $profil->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_sanggar" class="form-label">Nama Sanggar</label>
                                <input type="text" class="form-control" id="nama_sanggar" name="nama_sanggar" value="{{ $profil->nama_sanggar }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $profil->alamat }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="latar_belakang" class="form-label">Latar Belakang</label>
                                <textarea class="form-control" id="latar_belakang" name="latar_belakang" required>{{ $profil->latar_belakang }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="kegiatan" class="form-label">Kegiatan</label>
                                <textarea class="form-control" id="kegiatan" name="kegiatan" required>{{ $profil->kegiatan }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="prestasi" class="form-label">Prestasi</label>
                                <textarea class="form-control" id="prestasi" name="prestasi" required>{{ $profil->prestasi }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Update Profil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

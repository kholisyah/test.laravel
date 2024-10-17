<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Sanggar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Profil Sanggar</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ url('/edit-profil', $profil->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_sanggar" class="form-label">Nama Sanggar</label>
                        <input type="text" class="form-control" id="nama_sanggar" name="nama_sanggar" value="{{ old('nama_sanggar', $profil->nama_sanggar) }}">
                        @error('nama_sanggar')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', $profil->alamat) }}">
                        @error('alamat')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="latar_belakang" class="form-label">Latar Belakang</label>
                        <textarea class="form-control" id="latar_belakang" name="latar_belakang">{{ old('latar_belakang', $profil->latar_belakang) }}</textarea>
                        @error('latar_belakang')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">Kegiatan</label>
                        <textarea class="form-control" id="kegiatan" name="kegiatan">{{ old('kegiatan', $profil->kegiatan) }}</textarea>
                        @error('kegiatan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="prestasi" class="form-label">Prestasi</label>
                        <textarea class="form-control" id="prestasi" name="prestasi">{{ old('prestasi', $profil->prestasi) }}</textarea>
                        @error('prestasi')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Mendefinisikan dokumen sebagai HTML5 dengan bahasa Indonesia -->
    <meta charset="UTF-8">
    <!-- Menyesuaikan halaman agar sesuai dengan ukuran layar perangkat -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mengatur kompatibilitas halaman dengan Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Judul halaman yang akan tampil di tab browser -->
    <title>Edit Jadwal</title>
    <!-- Menyertakan CSS Bootstrap dari CDN untuk memperindah tampilan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Membuat container dengan margin top (mt-5) -->
    <div class="container mt-5">
        <!-- Heading judul yang ditempatkan di tengah -->
        <h1 class="text-center">Edit Jadwal</h1>

        <!-- Card yang menampilkan form edit jadwal -->
        <div class="card mt-3">
            <div class="card-body">
                <!-- Form untuk mengedit jadwal yang sudah ada -->
                <form action="/edit-posts/{{ $akun->id }}" method="POST">
                    <!-- Token CSRF untuk keamanan -->
                    @csrf
                    <!-- Mengubah metode form menjadi PUT untuk update data -->
                    @method('PUT')

                    <!-- Input field untuk Tanggal -->
                    <div class="mb-2">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="text" name="tanggal" class="form-control" value="{{ $akun->tanggal }}">
                    </div>

                    <!-- Input field untuk Waktu -->
                    <div class="mb-2">
                        <label for="waktu" class="form-label">Waktu</label>
                        <input type="text" name="waktu" class="form-control" value="{{ $akun->waktu }}">
                    </div>

                    <!-- Input field untuk Jenis Tari -->
                    <div class="mb-2">
                        <label for="jenis_tari" class="form-label">Jenis Tari</label>
                        <input type="text" name="jenis_tari" class="form-control" value="{{ $akun->jenis_tari }}">
                    </div>

                    <!-- Input field untuk Pelatih -->
                    <div class="mb-2">
                        <label for="pelatih" class="form-label">Pelatih</label>
                        <input type="text" name="pelatih" class="form-control" value="{{ $akun->pelatih }}">
                    </div>
                    <div class="mb-2">
                        <label for="anggota" class="form-label">Anggota</label>
                        <input type="text" name="anggota" class="form-control" value="{{ $akun->anggota }}">
                    </div>

                    <!-- Tombol submit untuk mengirimkan perubahan -->
                    <button type="submit" class="btn btn-primary w-100">Ubah</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Menyertakan JavaScript Bootstrap untuk fitur interaktif -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Menyatakan dokumen sebagai HTML5 -->
    <meta charset="UTF-8">
    <!-- Mengatur agar tampilan halaman web sesuai dengan ukuran layar perangkat (responsive) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Memastikan kompatibilitas dengan Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Judul halaman yang akan tampil di tab browser -->
    <title>Jadwal Latihan</title>
    <!-- Menyertakan CSS Bootstrap dari CDN untuk tata letak dan gaya tampilan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Menentukan lebar maksimum container agar tampil lebih kompak dan terpusat */
        .container {
            max-width: 800px;
            margin: auto;
        }
        /* Mengatur padding pada elemen body card agar lebih kecil */
        .card-body {
            padding: 10px;
        }
        /* Mengatur ukuran font pada label form, judul, dan paragraf */
        .form-label, h4, p {
            font-size: 14px;
            margin-bottom: 5px;
        }
        /* Mengatur ukuran dan padding input serta tombol agar lebih kecil */
        input.form-control, button {
            font-size: 14px;
            padding: 8px;
        }
        /* Memberikan jarak antar card */
        .card {
            margin-bottom: 10px;
        }
        /* Mengatur padding pada tombol agar lebih kompak */
        button {
            padding: 5px 10px;
        }
        /* Mengatur ukuran font tombol */
        .btn {
            font-size: 12px;
        }
        /* Mengatur ukuran font untuk judul halaman */
        h1, h2 {
            font-size: 20px;
        }
        /* Mengatur ukuran font untuk judul card */
        .card-title {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <!-- Judul utama halaman dengan teks rata tengah -->
        <h1 class="text-center">PENJADWALAN SANGGAR GALUH</h1>
    
        <!-- Form untuk membuat jadwal latihan baru -->
        <div class="card mt-3">
            <div class="card-body">
                <!-- Judul form di dalam card dengan teks rata tengah -->
                <h2 class="card-title text-center">Jadwal Latihan</h2>
                <!-- Form dengan method POST untuk mengirim data ke "/create-post" -->
                <form action="/create-post" method="POST">
                    <!-- Token CSRF untuk keamanan form -->
                    @csrf
                    <div class="mb-2">
                        <!-- Label untuk input tanggal -->
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <!-- Input untuk memasukkan tanggal -->
                        <input type="text" name="tanggal" class="form-control" placeholder="Masukkan tanggal" required>
                    </div>
                    <div class="mb-2">
                        <!-- Label untuk input waktu -->
                        <label for="waktu" class="form-label">Waktu</label>
                        <!-- Input untuk memasukkan waktu latihan -->
                        <input type="text" name="waktu" class="form-control" placeholder="Masukkan waktu" required>
                    </div>
                    <div class="mb-2">
                        <!-- Label untuk input jenis tari -->
                        <label for="jenis_tari" class="form-label">Jenis Tari</label>
                        <!-- Input untuk memasukkan jenis tari -->
                        <input type="text" name="jenis_tari" class="form-control" placeholder="Masukkan jenis tari" required>
                    </div>
                    <div class="mb-2">
                        <!-- Label untuk input nama pelatih -->
                        <label for="pelatih" class="form-label">Pelatih</label>
                        <!-- Input untuk memasukkan nama pelatih -->
                        <input type="text" name="pelatih" class="form-control" placeholder="Masukkan nama pelatih" required>
                    </div>
                    <div class="mb-2">
                        <!-- Label untuk input nama anggota -->
                        <label for="anggota" class="form-label">Anggota</label>
                        <!-- Input untuk memasukkan nama anggota -->
                        <input type="text" name="anggota" class="form-control" placeholder="Masukkan nama anggota" required>
                    </div>
                    
                    <!-- Tombol submit untuk menyimpan jadwal -->
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Menampilkan daftar jadwal yang sudah ada -->
        <div class="mt-4">
            <!-- Judul bagian untuk menampilkan jadwal -->
            <h2 class="text-center">Jadwal</h2>
            <!-- Looping untuk menampilkan setiap jadwal dari variabel $akuns -->
            @foreach ($akuns as $akun)
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <!-- Menampilkan tanggal dan waktu latihan -->
                        <h4>{{ $akun->tanggal }} - {{ $akun->waktu }}</h4>
                        <!-- Menampilkan jenis tari dan nama pelatih -->
                        <p>Jenis Tari: {{ $akun->jenis_tari }}</p>
                        <p>Pelatih: {{ $akun->pelatih }}</p>
                        <p>Anggota: {{ $akun->anggota }}</p>
                    </div>
                    <div class="d-flex gap-1">
                        <!-- Tombol untuk mengedit jadwal latihan -->
                        <a href="/edit-posts/{{ $akun->id }}" class="btn btn-warning">Edit</a>

                        <!-- Form untuk menghapus jadwal -->
                        <form action="/delete-posts/{{ $akun->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <!-- Tombol hapus dengan konfirmasi sebelum tindakan -->
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Menyertakan JavaScript Bootstrap untuk interaktivitas seperti modal, dropdown, dll -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

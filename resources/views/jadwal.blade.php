<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"> <!-- Mengatur set karakter menjadi UTF-8 agar mendukung teks berbahasa Indonesia -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur viewport untuk memastikan tampilan responsif di perangkat seluler -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- Mengoptimalkan tampilan di Internet Explorer -->
    <title>Jadwal Latihan</title> <!-- Menentukan judul halaman yang ditampilkan di tab browser -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Menghubungkan pustaka Bootstrap untuk gaya dan tata letak yang responsif -->
    <style>
        /* Mengubah warna latar belakang untuk body dan kontainer */
        body {
            background-color: #f0f8ff; /* Latar belakang biru muda */
        }

        .container {
            max-width: 800px; /* Membatasi lebar kontainer utama agar tidak terlalu lebar */
            margin: auto; /* Menempatkan kontainer di tengah halaman */
        }

        .card-body {
            padding: 10px; /* Menambah ruang di dalam body card */
            background-color: #ffffff; /* Warna latar belakang putih untuk card */
        }

        /* Mengubah warna teks untuk label, judul dan paragraf */
        .form-label, h4, p {
            font-size: 14px; /* Mengatur ukuran font untuk label dan teks */
            margin-bottom: 5px; /* Menambahkan jarak di bawah label dan teks */
            color: #333; /* Warna teks gelap */
        }

        /* Menyesuaikan warna untuk input dan tombol */
        input.form-control, button {
            font-size: 14px; /* Mengatur ukuran font untuk input dan tombol */
            padding: 8px; /* Menambah ruang di dalam input dan tombol */
            border: 1px solid #4A90E2; /* Warna border biru */
        }

        button {
            padding: 5px 10px; /* Mengatur padding tombol */
            background-color: #4A90E2; /* Warna latar belakang biru pada tombol */
            color: white; /* Warna teks putih pada tombol */
            border-radius: 4px; /* Sudut tombol yang melengkung */
            border: none; /* Menghilangkan border default tombol */
        }

        /* Menambahkan efek hover pada tombol */
        button:hover {
            background-color: #357ABD; /* Warna tombol saat hover */
        }

        .btn {
            font-size: 12px; /* Mengatur ukuran font tombol */
        }

        /* Mengubah ukuran font untuk judul */
        h1, h2 {
            font-size: 20px; /* Mengatur ukuran font untuk judul utama dan subjudul */
            color: #4A90E2; /* Warna teks biru pada judul */
        }

        /* Mengubah warna untuk judul card */
        .card-title {
            font-size: 16px; /* Mengatur ukuran font untuk judul card */
            color: #4A90E2; /* Warna biru pada judul card */
        }

        /* Menambahkan efek bayangan pada card */
        .card {
            margin-bottom: 10px; /* Menambahkan jarak antara card */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Efek bayangan untuk card */
        }

        /* Menyesuaikan tombol edit dan hapus */
        .btn-warning {
            background-color: #FFB84D; /* Warna tombol edit (kuning lembut) */
            color: white; /* Warna teks putih */
        }

        .btn-warning:hover {
            background-color: #e0a800; /* Warna tombol edit saat hover */
        }

        .btn-danger {
            background-color: #DC3545; /* Warna tombol hapus (merah) */
            color: white; /* Warna teks putih */
        }

        .btn-danger:hover {
            background-color: #c82333; /* Warna tombol hapus saat hover */
        }

        /* Warna khusus untuk tombol "Simpan" */
        .btn-save {
            background-color: #4A90E2; /* Warna biru pada tombol simpan */
            color: white; /* Warna teks putih */
            font-size: 14px; /* Ukuran font tombol */
            border-radius: 5px; /* Sudut tombol yang lebih bulat */
            padding: 10px 20px; /* Padding tombol agar lebih besar */
            border: none; /* Menghilangkan border default tombol */
        }

        .btn-save:hover {
            background-color: #357ABD; /* Warna tombol simpan saat hover */
        }
    </style>
</head>
<body>
    <div class="container mt-3"> <!-- Membuat kontainer utama dengan margin atas -->
        <h1 class="text-center">PENJADWALAN SANGGAR GALUH</h1> <!-- Judul utama halaman -->
        <div class="card mt-3"> <!-- Membuat card untuk formulir input -->
            <div class="card-body"> <!-- Body dari card -->
                <h2 class="card-title text-center">Jadwal Latihan</h2> <!-- Judul card -->
                <form action="/create-post" method="POST" onsubmit="return validateInput()"> <!-- Form untuk menginput data jadwal -->
                    @csrf <!-- Token CSRF untuk keamanan di Laravel -->
                    <div class="mb-2"> <!-- Ruang untuk input tanggal -->
                        <label for="tanggal" class="form-label">Tanggal</label> <!-- Label untuk input tanggal -->
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required> <!-- Input tipe tanggal -->
                    </div>
                    <div class="mb-2"> <!-- Ruang untuk input waktu -->
                        <label for="waktu" class="form-label">Waktu</label> <!-- Label untuk input waktu -->
                        <input type="time" id="waktu" name="waktu" class="form-control" required> <!-- Input tipe waktu -->
                    </div>
                    <div class="mb-2"> <!-- Ruang untuk input jenis tari -->
                        <label for="jenis_tari" class="form-label">Jenis Tari</label> <!-- Label untuk input jenis tari -->
                        <input type="text" name="jenis_tari" class="form-control" placeholder="Masukkan jenis tari" required> <!-- Input untuk memasukkan jenis tari -->
                    </div>
                    <div class="mb-2"> <!-- Ruang untuk input nama pelatih -->
                        <label for="pelatih" class="form-label">Pelatih</label> <!-- Label untuk input pelatih -->
                        <input type="text" name="pelatih" class="form-control" placeholder="Masukkan nama pelatih" required> <!-- Input untuk memasukkan nama pelatih -->
                    </div>
                    <div class="mb-2"> <!-- Ruang untuk input anggota -->
                        <label for="anggota" class="form-label">Anggota</label> <!-- Label untuk input anggota -->
                        <input type="text" id="anggota" name="anggota" class="form-control" placeholder="Masukkan nama anggota" required> <!-- Input untuk memasukkan nama anggota -->
                    </div>
                    <!-- Tombol Simpan dengan kelas baru -->
                    <button type="submit" class="btn btn-save w-100">Simpan</button> <!-- Tombol untuk menyimpan data -->
                </form>
            </div>
        </div>

        <div class="mt-4"> <!-- Ruang untuk menampilkan jadwal -->
            <h2 class="text-center">Jadwal</h2> <!-- Judul untuk bagian jadwal -->
            @foreach ($akuns as $akun) <!-- Melakukan iterasi untuk setiap akun dalam data jadwal -->
            <div class="card shadow-sm"> <!-- Membuat card untuk setiap jadwal -->
                <div class="card-body d-flex justify-content-between align-items-center"> <!-- Body card dengan layout flex -->
                    <div> <!-- Kontainer untuk informasi jadwal -->
                        <h4>{{ $akun->tanggal }} - {{ $akun->waktu }}</h4> <!-- Menampilkan tanggal dan waktu jadwal -->
                        <p>Jenis Tari: {{ $akun->jenis_tari }}</p> <!-- Menampilkan jenis tari -->
                        <p>Pelatih: {{ $akun->pelatih }}</p> <!-- Menampilkan nama pelatih -->
                        <p>Anggota: {{ $akun->anggota }}</p> <!-- Menampilkan anggota yang terdaftar -->
                    </div>
                    <div class="d-flex gap-1"> <!-- Kontainer untuk tombol edit dan hapus -->
                        <a href="/edit-posts/{{ $akun->id }}" class="btn btn-warning">Edit</a> <!-- Tombol untuk mengedit jadwal -->
                        <form action="/delete-posts/{{ $akun->id }}" method="POST" style="display:inline;"> <!-- Form untuk menghapus jadwal -->
                            @csrf <!-- Token CSRF untuk keamanan -->
                            @method('DELETE') <!-- Menentukan metode penghapusan -->
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')">Hapus</button> <!-- Tombol untuk menghapus jadwal dengan konfirmasi -->
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        const jadwal = @json($akuns); // Mendapatkan data jadwal dalam format JSON

        function validateInput() { // Fungsi untuk memvalidasi input sebelum mengirimkan formulir
            const tanggal = document.getElementById('tanggal').value; // Mengambil nilai tanggal
            const waktu = document.getElementById('waktu').value; // Mengambil nilai waktu
            const anggota = document.getElementById('anggota').value; // Mengambil nilai anggota

            for (let i = 0; i < jadwal.length; i++) { // Melakukan iterasi untuk setiap jadwal yang ada
                if (jadwal[i].tanggal === tanggal && jadwal[i].waktu === waktu && jadwal[i].anggota === anggota) { // Memeriksa apakah anggota sudah terdaftar pada tanggal dan waktu ini
                    alert('Anggota sudah terdaftar pada tanggal dan waktu ini.'); // Menampilkan peringatan jika anggota sudah terdaftar
                    return false; // Menghentikan pengiriman formulir
                }
            }
            return true; // Melanjutkan pengiriman formulir jika tidak ada konflik
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> <!-- Menghubungkan pustaka Bootstrap JavaScript untuk interaksi -->
</body>
</html>

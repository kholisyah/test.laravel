<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 800px;
            margin: auto;
        }
        .card-body {
            padding: 10px;
        }
        .form-label, h4, p {
            font-size: 14px;
            margin-bottom: 5px;
        }
        input.form-control, button {
            font-size: 14px;
            padding: 8px;
        }
        .card {
            margin-bottom: 10px;
        }
        button {
            padding: 5px 10px;
        }
        .btn {
            font-size: 12px;
        }
        h1, h2 {
            font-size: 20px;
        }
        .card-title {
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">PENJADWALAN SANGGAR GALUH</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title text-center">Jadwal Latihan</h2>
                <form action="/create-post" method="POST" onsubmit="return validateInput()">
                    @csrf
                    <div class="mb-2">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="waktu" class="form-label">Waktu</label>
                        <input type="time" id="waktu" name="waktu" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="jenis_tari" class="form-label">Jenis Tari</label>
                        <input type="text" name="jenis_tari" class="form-control" placeholder="Masukkan jenis tari" required>
                    </div>
                    <div class="mb-2">
                        <label for="pelatih" class="form-label">Pelatih</label>
                        <input type="text" name="pelatih" class="form-control" placeholder="Masukkan nama pelatih" required>
                    </div>
                    <div class="mb-2">
                        <label for="anggota" class="form-label">Anggota</label>
                        <input type="text" id="anggota" name="anggota" class="form-control" placeholder="Masukkan nama anggota" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>

        <div class="mt-4">
            <h2 class="text-center">Jadwal</h2>
            @foreach ($akuns as $akun)
            <div class="card shadow-sm">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h4>{{ $akun->tanggal }} - {{ $akun->waktu }}</h4>
                        <p>Jenis Tari: {{ $akun->jenis_tari }}</p>
                        <p>Pelatih: {{ $akun->pelatih }}</p>
                        <p>Anggota: {{ $akun->anggota }}</p>
                    </div>
                    <div class="d-flex gap-1">
                        <a href="/edit-posts/{{ $akun->id }}" class="btn btn-warning">Edit</a>
                        <form action="/delete-posts/{{ $akun->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script>
        const jadwal = @json($akuns);

        function validateInput() {
            const tanggal = document.getElementById('tanggal').value;
            const waktu = document.getElementById('waktu').value;
            const anggota = document.getElementById('anggota').value;

            for (let i = 0; i < jadwal.length; i++) {
                if (jadwal[i].tanggal === tanggal && jadwal[i].waktu === waktu && jadwal[i].anggota === anggota) {
                    alert('Anggota sudah terdaftar pada tanggal dan waktu ini.');
                    return false;
                }
            }
            return true;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
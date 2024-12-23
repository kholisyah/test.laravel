<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Style as previously defined */
        body {
            background-color: #f0f8ff;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        .card-body {
            padding: 10px;
            background-color: #ffffff;
        }
        .form-label, h4, p {
            font-size: 14px;
            margin-bottom: 5px;
            color: #333;
        }
        input.form-control, button {
            font-size: 14px;
            padding: 8px;
            border: 1px solid #4A90E2;
        }
        button {
            padding: 5px 10px;
            background-color: #4A90E2;
            color: white;
            border-radius: 4px;
            border: none;
        }
        button:hover {
            background-color: #357ABD;
        }
        .btn {
            font-size: 12px;
        }
        h1, h2 {
            font-size: 20px;
            color: #4A90E2;
        }
        .card-title {
            font-size: 16px;
            color: #4A90E2;
        }
        .card {
            margin-bottom: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-warning {
            background-color: #FFB84D;
            color: white;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #DC3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-save {
            background-color: #4A90E2;
            color: white;
            font-size: 14px;
            border-radius: 5px;
            padding: 10px 20px;
            border: none;
        }
        .btn-save:hover {
            background-color: #357ABD;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">PENJADWALAN SANGGAR GALUH</h1>
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title text-center">Jadwal Latihan</h2>
                <form action="{{ route('create.post') }}" method="POST">
                    @csrf
                    <input type="text" name="tanggal" placeholder="Tanggal" required>
                    <input type="text" name="waktu" placeholder="Waktu" required>
                    <select name="tarian_id">
                        @foreach ($tarians as $tarian)
                            <option value="{{ $tarian->id }}">{{ $tarian->nama_tari }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="pelatih" placeholder="Pelatih" required>
                    <input type="text" name="anggota" placeholder="Anggota" required>
                    
                    <button type="submit">Simpan</button>
                </form>
                          </div>
        </div>

        <div class="container mt-3">
            <h1 class="text-center">Jadwal Latihan</h1>
            
            <!-- Loop untuk menampilkan semua jadwal latihan (Akun) -->
            @foreach ($akuns as $akun)
            <tr>
                <td>{{ $akun->tanggal }}</td>
                <td>{{ $akun->waktu }}</td>
                <td>{{ $akun->tarian ? $akun->tarian->nama_tari : 'Tidak ada' }}</td> <!-- Menampilkan nama tarian -->
                <td>{{ $akun->pelatih }}</td>
                <td>{{ $akun->anggota }}</td>
            </tr>
        
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

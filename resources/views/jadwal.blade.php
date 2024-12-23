<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jadwal Latihan</title>
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

        .btn-warning {
            background-color: #ffc107;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            transition: background-color 0.3s ease;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f8f9fa;
            color: #333;
        }

        .d-flex {
            display: flex;
            gap: 10px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 1.5rem;
            }

            .card-body {
                padding: 15px;
            }

            form button {
                font-size: 0.9rem;
            }

            table th, table td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">PENJADWALAN SANGGAR GALUH</h1>
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Jadwal Latihan</h2>
                <form action="{{ route('create.post') }}" method="POST">
                    @csrf
                    <input type="text" name="tanggal" placeholder="Tanggal" required>
                    <input type="text" name="waktu" placeholder="Waktu" required>
                    <select name="tarian_id">
                        <option value="" selected disabled>pilih tari</option>
                        @foreach ($tarians as $tarian)
                            <option value="{{ $tarian->id }}">{{ $tarian->nama_tari }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="anggota" placeholder="Anggota" required>
                    <button type="submit">Simpan</button>
                </form>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Nama Tarian</th>
                    <th>Pelatih</th>
                    <th>Anggota</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($akuns as $akun)
                <tr>
                    <td>{{ $akun->tanggal }}</td>
                    <td>{{ $akun->waktu }}</td>
                    <td>{{ $akun->tarian ? $akun->tarian->nama_tari : 'Tidak ada' }}</td>
                    <td>{{ $akun->pelatih }}</td>
                    <td>{{ $akun->anggota }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="/edit-posts/{{ $akun->id }}" class="btn btn-warning">Edit</a>
                            <form action="/delete-posts/{{ $akun->id }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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

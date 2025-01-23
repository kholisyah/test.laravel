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
        /* Navbar */
        .navbar {
            background-color: #89c4e9;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }
        
        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar a {
            margin-left: 20px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s, opacity 0.3s;
        }

        .navbar a:hover {
            color: #156ba5;
        }

        .navbar a.active {
            color: #156ba5;
            opacity: 0.7;
        }

        .logo-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
        }

        h1 {
            font-size: 2rem;
            color: #156ba5;
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
            color: #156ba5;
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
            background-color: #156ba5;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #156ba5;
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
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
            Sanggar Galuh
        </div>
        <div class="nav-links">
            <a href="/dashboard">kembali kehalaman dashboard</a>
        </div>
    </div>
    
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center">Jadwal Latihan</h2>
                <form action="{{ route('create.post') }}" method="POST" onsubmit="return validateInput()">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <div class="input-group">
                            <input type="date" id="tanggal" name="tanggal" class="form-control" required>
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="waktu">Waktu</label>
                        <div class="input-group">
                            <input type="time" id="waktu" name="waktu" class="form-control" required>
                            <span class="input-group-text"><i class="fa fa-clock"></i></span>
                        </div>
                    </div>
                    <label for="Nama tari">nama tari</label>
                    <select name="tarian_id">
                        <option value="" selected disabled>pilih tari</option>
                        @foreach ($tarians as $tarian)
                            <option value="{{ $tarian->id }}">{{ $tarian->nama_tari }}</option>
                        @endforeach
                    </select>
                    <label for="Nama anggota">nama anggota</label>
                    <select name="tarian_id">
                        <option value="" selected disabled>pilih anggota</option>
                        @foreach ($pendaftarans as $pendaftaran)
                            <option value="{{ $pendaftaran->id }}">{{ $pendaftaran->nama }}</option>
                        @endforeach
                    </select>
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
                    <td>{{ $tarian->pelatih->nama }}</td>
                    <td>{{ $akun->pendaftaran ? $akun->pendaftaran->nama : 'Tidak ada' }}</td>
                   
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
            const tanggal = document.getElementById('tanggal').value.trim();
            const waktu = document.getElementById('waktu').value.trim();
            const anggota = document.getElementById('anggota').value.trim();

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

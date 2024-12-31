<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Tarian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
        <a href="/home">Beranda</a>
        <a href="/project">Pendaftaran</a>
        <a href="/login">Jadwal</a>
        <a href="/index">Perengkingan</a>
        <a href="/galeri">Penyewaan</a>
        <a href="/cart">Keranjang</a>
        <a href="/login">Login</a>
    </div>
</div>
    <div class="container mt-3">
        <h1 class="text-center">Manajemen Pelatih Sanggar Galuh</h1>

        <!-- Button Tambah Data -->
        <div class="d-flex justify-content-end my-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
        </div>

        <!-- Tabel Daftar Tarian -->
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Daftar Pelatih</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-striped table-bordered mt-3">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>email</th>
                            <th>no hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatihs as $key => $pelatih)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $pelatih->nama }}</td>
                                <td>{{ $pelatih->email }}</td>
                                <td>{{ $pelatih->no_hp }}</td>
                                <td class="text-center">
                                    <!-- Edit Button -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $pelatih->id }}">Edit</button>
                                    
                                    <!-- Delete Form -->
                                    <form action="{{ route('pelatih.destroy', $pelatih->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $pelatih->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $pelatih->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('pelatih.update', $pelatih->id ?? '') }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit pelatih</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                        
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label class="form-label">Nama</label>
                                                    <input type="text" name="nama" class="form-control" value="{{ $pelatih->nama ?? '' }}" placeholder="Masukkan nama" required>
                                                </div>
                                        
                                                <div class="mb-2">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{ $pelatih->email ?? '' }}" placeholder="Masukkan email" required>
                                                </div>
                                        
                                                <div class="mb-2">
                                                    <label class="form-label">Nomor HP</label>
                                                    <input type="text" name="no_hp" class="form-control" value="{{ $pelatih->no_hp ?? '' }}" placeholder="Masukkan no hp" required>
                                                </div>
                                            </div>
                                        
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                        
                                                                                
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pelatih.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah pelatih</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Nama </label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">email</label>
                            <input type="text" name="email" class="form-control" placeholder="Masukkan email" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">no hp</label>
                            <input type="text" name="no hp" class="form-control" placeholder="Masukkan no hp" required>
                        </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Data Baju</title>
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

        form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
            <a href="/dashboard">Kembali ke dashboard</a>
        </div>
    </div>

    <div class="container mt-3">
        <h1 class="text-center">Manajemen Data Baju</h1>

        <div class="d-flex justify-content-end my-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Baju</button>
        </div>

        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Daftar Baju</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-striped table-bordered mt-3">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama Baju</th>
                            <th>Harga</th>
                            <th>Jumlah Aksesoris</th>
                            <th>Jumlah Sewa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bajus as $key => $baju)
                        <tr>    
                            <td>{{ $key + 1 }}</td>
                            <td>
                                @if ($baju->foto)
                                        <img src="{{ asset('storage/' . $baju->foto) }}" alt="{{ $baju->nama_baju }}">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>{{ $baju->nama_baju }}</td>
                            <td>{{ $baju->harga }}</td>
                            <td>{{ $baju->jumlah_aksesoris }}</td>
                            <td>{{ $baju->jumlah_sewa }}</td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $baju->id }}">Edit</button>
                                <form action="{{ route('baju.destroy', $baju->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>                                
                            </td>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editModal{{ $baju->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                         <form action="{{ route('baju.update', $baju->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT') <!-- Menentukan metode PUT untuk pembaruan -->
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Baju</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-2">
                                                <label class="form-label">Foto</label>
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                            
                                            <div class="mb-2">
                                                <label class="form-label">Nama Baju</label>
                                                <input type="text" name="nama_baju" class="form-control" value="{{ $baju->nama_baju }}" required>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Harga</label>
                                                <input type="number" name="harga" class="form-control" value="{{ $baju->harga }}" required>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Jumlah Aksesoris</label>
                                                <input type="number" name="jumlah_aksesoris" class="form-control" value="{{ $baju->jumlah_aksesoris }}" required>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label">Jumlah Sewa</label>
                                                <input type="number" name="jumlah_sewa" class="form-control" value="{{ $baju->jumlah_sewa }}" required>
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('baju.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Baju</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Nama Baju</label>
                            <input type="text" name="nama_baju" id="nama_baju" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" id="harga" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Jumlah Aksesoris</label>
                            <input type="number" name="jumlah_aksesoris" id="jumlah_aksesoris" class="form-control" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Jumlah Sewa</label>
                            <input type="number" name="jumlah_sewa" id="jumlah_sewa" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

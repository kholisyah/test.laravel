<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Baju</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('assets/img/logo_baju.png') }}" alt="Logo Baju">
            Manajemen Baju
        </div>
        <div class="nav-links">
            <a href="/dashboard">Kembali ke Dashboard</a>
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
                            <th>Nama Baju</th>
                            <th>harga</th>
                            <th>jumlah aksesoris</th>
                            <th>jumlah sewa</th>
                            <th>aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bajus ?? [] as $key => $baju)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $baju->nama_baju }}</td>
                            <td>{{ $baju->harga }}</td>
                                <td>{{ $baju->jumlah_aksesoris }}</td>
                                <td>{{ $baju->jumlah_sewa}}</td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $baju->id }}">Edit</button>
                                    
                                    <form action="{{ route('bajus.destroy', $baju->id) }}" method="POST" class="d-inline">
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
                                        <form action="{{ route('bajus.update', $baju->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Baju</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label class="form-label">Nama Baju</label>
                                                    <input type="text" name="nama_baju" class="form-control" value="{{ $baju->nama_baju }}" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Harga</label>
                                                    <input type="text" name="harga" class="form-control" value="{{ $baju->harga }}" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Jumlah Aksesoris</label>
                                                    <input type="number" name="jumlah_aksesoris" class="form-control" value="{{ $baju->jumlah_aksesoris }}" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Jumlah sewa</label>
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
    <div class="modal fade" id="addModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('bajus.store') }}" method="POST">
                    @csrf
                    <label>Nama Baju:</label>
                    <input type="text" name="nama_baju" required>
                
                    <label>Harga:</label>
                    <input type="number" name="harga" required>
                
                    <label>Jumlah Aksesoris:</label>
                    <input type="text" name="jumlah_aksesoris" required>
                
                    <label>Jumlah Sewa:</label>
                    <input type="text" name="jumlah_sewa" required>
                
                    <button type="submit">Submit</button>
                </form>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
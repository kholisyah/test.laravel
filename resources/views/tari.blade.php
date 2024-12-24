<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Tarian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-3">
        <h1 class="text-center">Manajemen Tarian Sanggar Galuh</h1>

        <!-- Button Tambah Data -->
        <div class="d-flex justify-content-end my-3">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Tambah Data</button>
        </div>

        <!-- Tabel Daftar Tarian -->
        <div class="card">
            <div class="card-body">
                <h2 class="text-center">Daftar Tarian</h2>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-striped table-bordered mt-3">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama Tari</th>
                            <th>Pelatih</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tarians as $key => $tarian)
                            <tr>
                                <td class="text-center">{{ $key + 1 }}</td>
                                <td>{{ $tarian->nama_tari }}</td>
                                <td>{{ $tarian->pelatih }}</td>
                                <td>{{ $tarian->kategori }}</td>
                                <td class="text-center">
                                    <!-- Edit Button -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $tarian->id }}">Edit</button>
                                    
                                    <!-- Delete Form -->
                                    <form action="{{ route('tarian.destroy', $tarian->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $tarian->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $tarian->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ route('tarian.update', $tarian->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Tarian</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-2">
                                                    <label class="form-label">Nama Tari</label>
                                                    <input type="text" name="jenis_tari" class="form-control" value="{{ $tarian->nama_tari }}" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Pelatih</label>
                                                    <input type="text" name="pelatih" class="form-control" value="{{ $tarian->pelatih }}" required>
                                                </div>
                                                <div class="mb-2">
                                                    <label class="form-label">Kategori</label>
                                                    <select name="kategori" class="form-control" required>
                                                        <option value="">Pilih Kategori</option>
                                                        <option value="Anak-anak" {{ $tarian->kategori == 'Anak-anak' ? 'selected' : '' }}>Anak-anak</option>
                                                        <option value="Dewasa" {{ $tarian->kategori == 'Dewasa' ? 'selected' : '' }}>Dewasa</option>
                                                    </select>
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
                <form action="{{ route('tarian.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Tarian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label class="form-label">Nama Tari</label>
                            <input type="text" name="jenis_tari" class="form-control" placeholder="Masukkan nama tari" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Pelatih</label>
                            <input type="text" name="pelatih" class="form-control" placeholder="Masukkan nama pelatih" required>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-control" required>
                                <option value="">Pilih Kategori</option>
                                <option value="Anak-anak" {{ $tarian->kategori == 'Anak-anak' ? 'selected' : '' }}>Anak-anak</option>
                                <option value="Dewasa" {{ $tarian->kategori == 'Dewasa' ? 'selected' : '' }}>Dewasa</option>
                            </select>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

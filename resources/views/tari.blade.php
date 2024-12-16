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

        <!-- Form untuk menambah data -->
        <div class="card mt-3">
            <div class="card-body">
                <h2 class="card-title text-center">Tambah Tarian</h2>
                <form action="{{ route('tarian.store') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="jenis_tari" class="form-label">Nama Tari</label>
                        <input type="text" name="jenis_tari" class="form-control" placeholder="Masukkan jenis tari" required>
                    </div>
                    <div class="mb-2">
                        <label for="pelatih" class="form-label">Pelatih</label>
                        <input type="text" name="pelatih" class="form-control" placeholder="Masukkan nama pelatih" required>
                    </div>
                    <div class="mb-2">
                        <label for="kategori" class="form-label">Kategori</label>
                        <input type="text" name="kategori" class="form-control" placeholder="Masukkan kategori tari" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Menampilkan data tarian -->
        <div class="mt-4">
            <h2 class="text-center">Daftar Tarian</h2>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @foreach ($tarians as $tarian)
                <div class="card shadow-sm mb-2">
                    <div class="card-body">
                        <h4>{{ $tarian->nama_tari }}</h4>
                        <p>Pelatih: {{ $tarian->pelatih }}</p>
                        <p>Kategori: {{ $tarian->kategori }}</p>
                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $tarian->id }}">Edit</a>
                        <form action="{{ route('tarian.destroy', $tarian->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>

                <!-- Modal Edit -->
                <div class="modal fade" id="editModal{{ $tarian->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $tarian->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('tarian.update', $tarian->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel{{ $tarian->id }}">Edit Tarian</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-2">
                                        <label for="jenis_tari" class="form-label">Nama Tari</label>
                                        <input type="text" name="jenis_tari" class="form-control" value="{{ $tarian->nama_tari }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="pelatih" class="form-label">Pelatih</label>
                                        <input type="text" name="pelatih" class="form-control" value="{{ $tarian->pelatih }}" required>
                                    </div>
                                    <div class="mb-2">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <input type="text" name="kategori" class="form-control" value="{{ $tarian->kategori }}" required>
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

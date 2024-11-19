<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Sanggar Galuh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Profil Sanggar Galuh</h2>

        <!-- Deskripsi Profil Sanggar -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>Deskripsi</h4>
            </div>
            <div class="card-body">
                <p>{{ $profil->deskripsi ?? 'Deskripsi tidak tersedia' }}</p>
            </div>
        </div>

        <!-- Visi -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h4>Visi</h4>
            </div>
            <div class="card-body">
                <p>{{ $profil->visi ?? 'Visi tidak tersedia' }}</p>
            </div>
        </div>

        <!-- Misi -->
        <div class="card mb-4">
            <div class="card-header bg-warning text-dark">
                <h4>Misi</h4>
            </div>
            <div class="card-body">
                @if ($profil->misi)
                    <ul>
                        @foreach(explode(',', $profil->misi) as $misi)
                            <li>{{ $misi }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Misi tidak tersedia</p>
                @endif
            </div>
        </div>

        <!-- Kembali ke Dashboard -->
        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

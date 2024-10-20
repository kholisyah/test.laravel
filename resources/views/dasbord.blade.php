<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profil Sanggar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<head>
    <!-- Style CSS tambahan -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        h1, h2 {
            color: #343a40;
        }
        .card {
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        #profilList .card-title {
            color: #007bff;
        }
        #profilForm .text-danger {
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Create Profil Sanggar</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Form Profil -->
                <form id="profilForm">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_sanggar" class="form-label">Nama Sanggar</label>
                        <input type="text" class="form-control" id="nama_sanggar" name="nama_sanggar" required>
                        <p class="text-danger" id="error-nama_sanggar"></p>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                        <p class="text-danger" id="error-alamat"></p>
                    </div>
                    <div class="mb-3">
                        <label for="latar_belakang" class="form-label">Latar Belakang</label>
                        <textarea class="form-control" id="latar_belakang" name="latar_belakang" required></textarea>
                        <p class="text-danger" id="error-latar_belakang"></p>
                    </div>
                    <div class="mb-3">
                        <label for="kegiatan" class="form-label">Kegiatan</label>
                        <textarea class="form-control" id="kegiatan" name="kegiatan" required></textarea>
                        <p class="text-danger" id="error-kegiatan"></p>
                    </div>
                    <div class="mb-3">
                        <label for="prestasi" class="form-label">Prestasi</label>
                        <textarea class="form-control" id="prestasi" name="prestasi" required></textarea>
                        <p class="text-danger" id="error-prestasi"></p>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- Tempat menampilkan data yang tersimpan -->
        <div class="mt-5">
            <h2>Data Profil Yang Tersimpan</h2>
            <div id="profilList"></div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#profilForm').on('submit', function(e) {
                e.preventDefault(); // Mencegah reload

                let formData = {
                    _token: $('input[name="_token"]').val(),
                    nama_sanggar: $('#nama_sanggar').val(),
                    alamat: $('#alamat').val(),
                    latar_belakang: $('#latar_belakang').val(),
                    kegiatan: $('#kegiatan').val(),
                    prestasi: $('#prestasi').val(),
                };

                $.ajax({
                    type: 'POST',
                    url: '{{ url("/create-profil") }}',
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        // Kosongkan form setelah sukses submit
                        $('#profilForm')[0].reset();

                        // Tambahkan profil baru ke daftar profil
                        $('#profilList').append(`
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-title">${data.nama_sanggar}</h5>
                                    <p class="card-text"><strong>Alamat:</strong> ${data.alamat}</p>
                                    <p class="card-text"><strong>Latar Belakang:</strong> ${data.latar_belakang}</p>
                                    <p class="card-text"><strong>Kegiatan:</strong> ${data.kegiatan}</p>
                                    <p class="card-text"><strong>Prestasi:</strong> ${data.prestasi}</p>
                                </div>
                            </div>
                        `);
                    },
                    error: function(response) {
                        // Tampilkan error dari validasi Laravel
                        let errors = response.responseJSON.errors;
                        $('#error-nama_sanggar').text(errors.nama_sanggar ? errors.nama_sanggar[0] : '');
                        $('#error-alamat').text(errors.alamat ? errors.alamat[0] : '');
                        $('#error-latar_belakang').text(errors.latar_belakang ? errors.latar_belakang[0] : '');
                        $('#error-kegiatan').text(errors.kegiatan ? errors.kegiatan[0] : '');
                        $('#error-prestasi').text(errors.prestasi ? errors.prestasi[0] : '');
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

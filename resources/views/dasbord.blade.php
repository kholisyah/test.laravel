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
                    <input type="hidden" id="profil_id" name="profil_id">
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
            loadProfilData();

            function loadProfilData() {
                $.get("{{ url('/get-profils') }}", function(data) {
                    $('#profilList').empty();
                    data.forEach(function(profil) {
                        appendProfilToList(profil);
                    });
                });
            }

            function appendProfilToList(profil) {
                $('#profilList').append(`
                    <div class="card mt-3" data-id="${profil.id_profils}">
                        <div class="card-body">
                            <h5 class="card-title">${profil.nama_sanggar}</h5>
                            <p class="card-text"><strong>Alamat:</strong> ${profil.alamat}</p>
                            <p class="card-text"><strong>Latar Belakang:</strong> ${profil.latar_belakang}</p>
                            <p class="card-text"><strong>Kegiatan:</strong> ${profil.kegiatan}</p>
                            <p class="card-text"><strong>Prestasi:</strong> ${profil.prestasi}</p>
                            <button class="btn btn-warning btn-edit">Edit</button>
                            <button class="btn btn-danger btn-delete">Delete</button>
                        </div>
                    </div>
                `);
            }

            $('#profilForm').on('submit', function(e) {
                e.preventDefault();

                let profilId = $('#profil_id').val();
                let url = profilId ? `{{ url('/update-profil') }}/${profilId}` : "{{ url('/create-profil') }}";
                let method = profilId ? 'PUT' : 'POST';

                let formData = {
                    _token: $('input[name="_token"]').val(),
                    nama_sanggar: $('#nama_sanggar').val(),
                    alamat: $('#alamat').val(),
                    latar_belakang: $('#latar_belakang').val(),
                    kegiatan: $('#kegiatan').val(),
                    prestasi: $('#prestasi').val(),
                };

                $.ajax({
                    type: method,
                    url: url,
                    data: formData,
                    dataType: 'json',
                    success: function(data) {
                        if (profilId) {
                            let profilCard = $(`#profilList .card[data-id='${profilId}']`);
                            profilCard.find('.card-title').text(data.nama_sanggar);
                            profilCard.find('.card-text').eq(0).html(`<strong>Alamat:</strong> ${data.alamat}`);
                            profilCard.find('.card-text').eq(1).html(`<strong>Latar Belakang:</strong> ${data.latar_belakang}`);
                            profilCard.find('.card-text').eq(2).html(`<strong>Kegiatan:</strong> ${data.kegiatan}`);
                            profilCard.find('.card-text').eq(3).html(`<strong>Prestasi:</strong> ${data.prestasi}`);
                        } else {
                            appendProfilToList(data);
                        }
                        $('#profilForm')[0].reset();
                        $('#profil_id').val('');
                    },
                    error: function(response) {
                        let errors = response.responseJSON.errors;
                        $('#error-nama_sanggar').text(errors.nama_sanggar ? errors.nama_sanggar[0] : '');
                        $('#error-alamat').text(errors.alamat ? errors.alamat[0] : '');
                        $('#error-latar_belakang').text(errors.latar_belakang ? errors.latar_belakang[0] : '');
                        $('#error-kegiatan').text(errors.kegiatan ? errors.kegiatan[0] : '');
                        $('#error-prestasi').text(errors.prestasi ? errors.prestasi[0] : '');
                    }
                });
            });

            $('#profilList').on('click', '.btn-edit', function() {
                let card = $(this).closest('.card');
                let profilId = card.data('id');

                $('#profil_id').val(profilId);
                $('#nama_sanggar').val(card.find('.card-title').text());
                $('#alamat').val(card.find('.card-text').eq(0).text().replace('Alamat: ', ''));
                $('#latar_belakang').val(card.find('.card-text').eq(1).text().replace('Latar Belakang: ', ''));
                $('#kegiatan').val(card.find('.card-text').eq(2).text().replace('Kegiatan: ', ''));
                $('#prestasi').val(card.find('.card-text').eq(3).text().replace('Prestasi: ', ''));
            });

            $('#profilList').on('click', '.btn-delete', function() {
                let profilId = $(this).closest('.card').data('id');
                
                if (confirm('Yakin ingin menghapus profil ini?')) {
                    $.ajax({
                        type: 'DELETE',
                        url: `{{ url('/delete-profil') }}/${profilId}`,
                        data: { _token: $('input[name="_token"]').val() },
                        success: function() {
                            $(`#profilList .card[data-id='${profilId}']`).remove();
                        }
                    });
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

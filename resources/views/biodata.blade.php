<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Biodata</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .container {
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }
        .form-group label {
            font-weight: bold;
        }
        button {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Isi Biodata</h2>
        <div id="alert" class="alert d-none"></div>
        <form id="biodata-form" method="POST" action="{{ route('galeri.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="no_telp">Nomor Telepon</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>        
    </div>

    <script>
        $(document).ready(function() {
            $('#biodata-form').on('submit', function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),  // menggunakan action form
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        $('#alert').removeClass('d-none alert-danger').addClass('alert-success').text('Biodata berhasil disimpan!');
                        setTimeout(function() {
                            window.location.href = '/galeri';  // pastikan rute ini ada
                        }, 2000);
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessage = 'Gagal menyimpan biodata:\n';

                        $.each(errors, function(key, value) {
                            errorMessage += `- ${value}\n`;
                        });

                        $('#alert').removeClass('d-none alert-success').addClass('alert-danger').text(errorMessage);
                    }
                });
            });
        });
    </script>
</body>
</html>

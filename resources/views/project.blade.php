<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Pendaftaran</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #E8F0FE;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"], input[type="email"], input[type="tel"], select {
            width: 100%;
            padding: 15px;
            border: 1px solid #AFCBFF;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, select:focus {
            border-color: #7DA3FF;
        }

        button {
            padding: 12px 20px;
            background-color: #4D8BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #3B72D3;
        }

        .data-container {
            margin-top: 40px;
        }

        .data-item {
            background-color: #F9FAFB;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .data-item h3 {
            color: #4D8BFF;
            margin-bottom: 5px;
        }

        .data-item .detail {
            display: none;
            color: #666;
        }

        .data-item a {
            color: #4D8BFF;
            text-decoration: none;
            margin-right: 15px;
            font-size: 14px;
            cursor: pointer;
        }

        .data-item a:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            align-items: center;
        }

        .delete-form button {
            background-color: #FF7070;
            padding: 8px 12px;
            border-radius: 5px;
        }

        .delete-form button:hover {
            background-color: #FF4C4C;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pendaftaran</h2>
        <form id="pendaftaranForm" action="/create-pendaftaran" method="POST">
            @csrf
            <input type="text" name="nama" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="alamat" placeholder="Alamat" required>
            <input type="tel" name="no_telepon" placeholder="No Telepon" required>
            <label for="kategori">Kategori: </label>
            <select name="kategori" id="kategori" required>
                <option value="dewasa">Dewasa</option>
                <option value="anak-anak">Anak-anak</option>
            </select>
            <label for="biaya_administrasi">Biaya Administrasi Sebesar:</label>
            <input type="text" name="biaya_administrasi" id="biaya_administrasi" value="25000" readonly>

            <!-- Added description and the link here -->
            <p><strong>Upload Persyaratan</strong></p>
            <a href="{{ url('/syarat') }}" class="btn btn-primary">Klik Disini</a>

            <button type="submit">Simpan</button>
        </form>

        <div class="data-container">
            <h2>Data Pendaftaran Yang Tersimpan</h2>
            @foreach ($pendaftarans as $pendaftaran)
            <div class="data-item">
                <div>
                    <h3>{{ $pendaftaran->nama }}</h3>
                    <div class="detail">
                        <p>Email: {{ $pendaftaran->email }}</p>
                        <p>Alamat: {{ $pendaftaran->alamat }}</p>
                        <p>No Telepon: {{ $pendaftaran->no_telepon }}</p>
                        <p>Kategori: {{ $pendaftaran->kategori }}</p>
                        <p>Biaya Administrasi: Rp{{ $pendaftaran->biaya_administrasi }}</p>
                    </div>
                </div>
                <div class="actions">
                    <a class="view-button">View</a>
                    <a href="/edit-pendaftaran/{{ $pendaftaran->id }}">Edit</a>
                    <form class="delete-form" action="/delete-pendaftaran/{{ $pendaftaran->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin dihapus?')">Hapus</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#pendaftaranForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: '/create-pendaftaran',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Data berhasil disimpan!');
                    $('#pendaftaranForm')[0].reset();
                    const newData = `
                        <div class="data-item">
                            <div>
                                <h3>${response.nama}</h3>
                                <div class="detail" style="display: none;">
                                    <p>Email: ${response.email}</p>
                                    <p>Alamat: ${response.alamat}</p>
                                    <p>No Telepon: ${response.no_telepon}</p>
                                    <p>Kategori: ${response.kategori}</p>
                                    <p>Biaya Administrasi: Rp${response.biaya_administrasi}</p>
                                </div>
                            </div>
                            <div class="actions">
                                <a class="view-button">View</a>
                                <a href="/edit-pendaftaran/${response.id}">Edit</a>
                                <form class="delete-form" action="/delete-pendaftaran/${response.id}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Yakin ingin dihapus?')">Delete</button>
                                </form>
                            </div>
                        </div>`;
                    $('.data-container').append(newData);
                    $('.view-button').last().on('click', function() {
                        $(this).closest('.data-item').find('.detail').slideToggle();
                    });
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat menyimpan data: ' + error);
                }
            });
        });

        $(document).on('click', '.view-button', function() {
            $(this).closest('.data-item').find('.detail').slideToggle();
        });
    </script>
</body>
</html>

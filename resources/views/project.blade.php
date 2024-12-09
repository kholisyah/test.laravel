<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Pendaftaran</title>
    <style>
        /* Reset gaya dasar elemen dan pengaturan box model */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        /* Gaya dasar untuk body, background dan padding */
        body {
            background-color: #EAF6FB;
            padding: 20px;
        }

        /* Pengaturan untuk container form pendaftaran */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #F4FAFD;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Gaya dasar untuk judul */
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Pengaturan tata letak form agar vertikal dengan jarak antar elemen */
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Pengaturan input form */
        input[type="text"], input[type="email"], input[type="tel"], select {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        /* Perubahan warna border ketika input aktif */
        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, select:focus {
            border-color: #B5DDEB;
        }

        /* Gaya tombol submit */
        button {
            padding: 12px 20px;
            background-color: #B5DDEB;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        /* Efek hover pada tombol */
        button:hover {
            background-color: #A2D4E8;
        }

        /* Container untuk menampilkan data yang telah tersimpan */
        .data-container {
            margin-top: 40px;
        }

        /* Gaya item data */
        .data-item {
            background-color: #fafafa;
            padding: 20px;
            margin-bottom: 10px; 
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Gaya judul dalam item data */
        .data-item h3 {
            color: #4A90E2;
            margin-bottom: 5px;
        }

        /* Bagian detail tersembunyi yang akan ditampilkan saat tombol View diklik */
        .data-item .detail {
            display: none;
            color: #666;
        }

        /* Gaya link untuk tombol View dan Edit */
        .data-item a {
            color: #4A90E2;
            text-decoration: none;
            margin-right: 15px;
            font-size: 14px;
            cursor: pointer;
        }

        /* Efek hover pada link */
        .data-item a:hover {
            text-decoration: underline;
        }

        /* Pengaturan tampilan actions yang berisi link dan tombol */
        .actions {
            display: flex;
            align-items: center;
        }

        /* Gaya untuk tombol Delete */
        .delete-form button {
            background-color: #FFAAAA;
            padding: 8px 12px;
            border-radius: 5px;
        }

        /* Efek hover untuk tombol Delete */
        .delete-form button:hover {
            background-color: #FF8A8A;
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
    <a href="{{ url('/syarat') }}" class="btn btn-primary">klik disini</a>
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

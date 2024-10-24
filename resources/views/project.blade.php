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
            background-color: #f0f2f5;
            padding: 20px;
        }

        /* Pengaturan untuk container form pendaftaran */
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
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

        /* Pengaturan input form (text, email, alamat, no telepon, dll.) */
        input[type="text"], input[type="email"], input[type="tel"], select {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            outline: none;
            transition: border 0.3s ease;
        }

        /* Pengaturan perubahan warna border ketika input aktif */
        input[type="text"]:focus, input[type="email"]:focus, input[type="tel"]:focus, select:focus {
            border-color: #6c63ff;
        }

        /* Pengaturan gaya tombol submit */
        button {
            padding: 12px 20px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        /* Efek hover pada tombol */
        button:hover {
            background-color: #574bcc;
        }

        /* Container untuk menampilkan data yang telah tersimpan */
        .data-container {
            margin-top: 40px;
        }

        /* Gaya item data yang ditampilkan */
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
            color: #6c63ff;
            margin-bottom: 5px;
        }

        /* Bagian detail tersembunyi yang akan ditampilkan saat tombol View diklik */
        .data-item .detail {
            display: none;
            color: #666;
        }

        /* Gaya link untuk tombol View dan Edit */
        .data-item a {
            color: #6c63ff;
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
            background-color: #ff6363;
            padding: 8px 12px;
            border-radius: 5px;
        }

        /* Efek hover untuk tombol Delete */
        .delete-form button:hover {
            background-color: #e55d5d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pendaftaran</h2>
        <form id="postForm" action="/create-post" method="POST">
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
            <label for="biaya_administrasi">Biaya Administrasi: </label>
            <select name="biaya_administrasi" id="biaya_administrasi" required>
                <option value="25000">25.000</option>
            </select>
            <button type="submit">Simpan</button>
        </form>

        <div class="data-container">
            <h2>Data Pendaftaran Yang Tersimpan</h2>
            @foreach ($posts as $post)
            <div class="data-item">
                <div>
                    <h3>{{ $post->nama }}</h3>
                    <div class="detail">
                        <p>Email: {{ $post->email }}</p>
                        <p>Alamat: {{ $post->alamat }}</p>
                        <p>No Telepon: {{ $post->no_telepon }}</p>
                        <p>Kategori: {{ $post->kategori }}</p>
                        <p>Biaya Administrasi: Rp{{ $post->biaya_administrasi }}</p>
                    </div>
                </div>
                <div class="actions">
                    <a class="view-button">View</a>
                    <a href="/edit-post/{{ $post->id }}">Edit</a>
                    <form class="delete-form" action="/delete-post/{{ $post->id }}" method="POST">
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
        $('#postForm').on('submit', function(event) {
            event.preventDefault(); // Mencegah reload halaman

            // Kirim data via AJAX
            $.ajax({
                url: '/create-post',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    alert('Data berhasil disimpan!');
                    $('#postForm')[0].reset(); // Reset form

                    // Tambahkan data baru ke tampilan
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
                                <a href="/edit-post/${response.id}">Edit</a>
                                <form class="delete-form" action="/delete-post/${response.id}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" onclick="return confirm('Yakin ingin dihapus?')">Delete</button>
                                </form>
                            </div>
                        </div>`;

                    // Append data baru ke dalam container
                    $('.data-container').append(newData);
                    
                    // Event listener untuk tombol View pada data baru
                    $('.view-button').last().on('click', function() {
                        $(this).closest('.data-item').find('.detail').slideToggle();
                    });
                },
                error: function(xhr, status, error) {
                    alert('Terjadi kesalahan saat menyimpan data: ' + error);
                }
            });
        });

        // Menangani tampilan detail data
        $(document).on('click', '.view-button', function() {
            $(this).closest('.data-item').find('.detail').slideToggle();
        });
    </script>
</body>
</html>

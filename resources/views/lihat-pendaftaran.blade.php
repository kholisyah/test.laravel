<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Lihat Pendaftaran</title>
    <style>
        /* Reset gaya dasar elemen dan pengaturan box model */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        /* Gaya dasar untuk body, background, dan padding */
        body {
            background-color: #F4FAFD; /* Latar belakang biru pastel */
            padding: 0;
        }

        /* Navbar styling */
        .navbar {
            background-color: #B5DDEB; /* Warna biru pastel */
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar a {
            color: #4A4A4A;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: #A2D4E8; /* Warna hover */
        }

        /* Pengaturan untuk container tabel */
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #EAF6FB; /* Warna biru pastel lembut */
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Gaya dasar untuk judul */
        h2 {
            text-align: center;
            color: #4A4A4A;
            margin-bottom: 20px;
            font-size: 24px;
        }

        /* Tabel styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            text-align: left;
            padding: 12px;
            border: 1px solid #D9EEF7; /* Batas tabel biru pastel */
            font-size: 14px;
        }

        th {
            background-color: #B5DDEB; /* Header tabel biru pastel */
            color: #4A4A4A;
        }

        tr:nth-child(even) {
            background-color: #FFFFFF; /* Baris tabel putih */
        }

        tr:nth-child(odd) {
            background-color: #D9EEF7; /* Baris tabel biru pastel terang */
        }

        tr:hover {
            background-color: #CDEAF5; /* Efek hover baris tabel */
        }

        /* Gaya tombol di dalam tabel */
        .action-buttons a,
        .action-buttons form button {
            display: inline-block;
            padding: 6px 12px;
            margin: 0 4px;
            font-size: 12px;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .action-buttons a {
            background-color: #5BC0EB; /* Warna biru untuk tombol edit */
        }

        .action-buttons a:hover {
            background-color: #469FC4; /* Warna hover tombol edit */
        }

        .action-buttons form button {
            background-color: #F25F5C; /* Warna merah untuk tombol hapus */
        }

        .action-buttons form button:hover {
            background-color: #D94442; /* Warna hover tombol hapus */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ url('/dashboard') }}">Kembali ke Dashboard</a>
    </div>

    <!-- Konten Utama -->
    <div class="container">
        <h2>Data Pendaftaran</h2>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Kategori</th>
                    <th>Biaya Administrasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendaftarans as $pendaftaran)
                <tr>
                    <td>{{ $pendaftaran->nama }}</td>
                    <td>{{ $pendaftaran->email }}</td>
                    <td>{{ $pendaftaran->alamat }}</td>
                    <td>{{ $pendaftaran->no_telepon }}</td>
                    <td>{{ $pendaftaran->kategori }}</td>
                    <td>Rp{{ number_format($pendaftaran->biaya_administrasi, 0, ',', '.') }}</td>
                    <td class="action-buttons">
                        <a href="/edit-pendaftaran/{{ $pendaftaran->id }}">Edit</a>
                        <form action="/delete-pendaftaran/{{ $pendaftaran->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin dihapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

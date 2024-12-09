<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Login</title>
    <style>
        /* Reset CSS */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F4FAFD; /* Latar belakang biru pastel */
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #EAF6FB; /* Warna kotak */
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 20px;
        }

        .login-container h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #4A4A4A; /* Warna teks utama */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #D9EEF7; /* Warna batas tabel */
            font-size: 14px;
        }

        table th {
            background: #B5DDEB; /* Warna header tabel */
            color: #4A4A4A;
            font-weight: bold;
        }

        table tbody tr:nth-child(odd) {
            background: #FFFFFF; /* Baris tabel putih */
        }

        table tbody tr:nth-child(even) {
            background: #D9EEF7; /* Baris tabel biru pastel lebih terang */
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .btn {
            padding: 8px 15px;
            font-size: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-edit {
            background: #B5DDEB; /* Warna biru pastel */
            color: #4A4A4A;
        }

        .btn-delete {
            background: #F28D8D; /* Warna merah pastel */
            color: #4A4A4A;
        }

        .btn-edit:hover {
            background: #A2D4E8; /* Warna hover biru pastel lebih gelap */
        }

        .btn-delete:hover {
            background: #E67E7E; /* Warna hover merah pastel lebih gelap */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Daftar Login</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logins as $login)
                <tr>
                    <td>{{ $login->id }}</td>
                    <td>{{ $login->nama }}</td>
                    <td>{{ $login->email }}</td>
                    <td>
                        <div class="action-buttons">
                            <!-- Edit Button -->
                            <a href="{{ route('edit-login', $login->id) }}" class="btn btn-edit">Edit</a>
                            
                            <!-- Delete Button (Form to Delete) -->
                            <form action="{{ route('delete-login', $login->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>        
        <a href="{{ url('/dashboard') }}" class="btn btn-edit" style="margin-top: 20px; display: inline-block; text-align: center;">Kembali ke Dashboard</a>
    </div>
</body>
</html>

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
            background: linear-gradient(135deg, #FFDEE9, #B5FFFC);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 20px;
        }

        .login-container h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        table th {
            background: #7DD3FC;
            color: white;
            font-weight: bold;
        }

        table tbody tr:nth-child(odd) {
            background: #f9f9f9;
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .btn {
            padding: 5px 10px;
            font-size: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background: #38BDF8;
            color: white;
        }

        .btn-delete {
            background: #EF4444;
            color: white;
        }

        .btn-edit:hover {
            background: #0284C7;
        }

        .btn-delete:hover {
            background: #DC2626;
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
        <a href="{{ url('/dashboard') }}" class="btn btn-edit">Kembali ke Dashboard</a>
    </div>
</body>
</html>

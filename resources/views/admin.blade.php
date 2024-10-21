<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Admin</title>
    <!-- Link ke Google Fonts untuk font Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Gaya untuk tampilan keseluruhan body */
        body {
            font-family: 'Roboto', sans-serif; /* Mengatur font utama ke Roboto */
            background-color: #f3f4f6; /* Warna latar belakang abu terang */
            margin: 0;
            padding: 20px;
        }

        /* Gaya untuk heading H1 dan H2 */
        h1, h2 {
            color: #2c3e50; /* Warna teks abu gelap */
            text-align: center; /* Teks di tengah */
        }

        /* Container utama untuk menampung konten */
        .container {
            max-width: 800px; /* Lebar maksimal container */
            margin: auto; /* Meletakkan container di tengah */
            background-color: #ffffff; /* Warna latar container putih */
            padding: 30px;
            border-radius: 12px; /* Sudut border membulat */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); /* Bayangan ringan untuk kesan depth */
        }

        /* Gaya untuk alert box */
        .alert {
            margin: 20px 0;
            padding: 15px;
            border-radius: 6px;
        }

        /* Alert untuk sukses */
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        /* Alert untuk error */
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        /* Gaya untuk form */
        form {
            margin-bottom: 30px;
            background-color: #eef1f5; /* Latar form abu terang */
            padding: 20px;
            border-radius: 12px; /* Sudut form membulat */
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); /* Bayangan ringan untuk form */
        }

        /* Gaya untuk label form */
        label {
            display: block;
            margin: 10px 0 5px;
        }

        /* Gaya untuk input text, email, dan password */
        input[type="text"], input[type="email"], input[type="password"] {
            width: calc(100% - 20px); /* Lebar input penuh */
            padding: 12px;
            border: 2px solid #ced4da; /* Border abu terang */
            border-radius: 6px;
            margin-bottom: 15px;
            transition: border-color 0.3s; /* Animasi pada border saat fokus */
        }

        /* Border input saat fokus */
        input:focus {
            border-color: #007bff;
        }

        /* Gaya untuk tombol submit */
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s; /* Animasi perubahan warna tombol */
        }

        /* Perubahan warna tombol saat hover */
        button:hover {
            background-color: #0056b3;
        }

        /* Gaya untuk tabel admin */
        table {
            width: 100%;
            border-collapse: collapse; /* Menggabungkan border cell */
            margin-top: 20px;
        }

        /* Gaya untuk header dan cell tabel */
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd; /* Border cell */
        }

        /* Background header tabel */
        th {
            background-color: #007bff;
            color: white;
        }

        /* Tombol untuk aksi Edit dan Hapus */
        .btn-warning {
            background-color: #ffc107;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
        }

        /* Tombol Hapus */
        .btn-danger {
            background-color: #dc3545;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Warna hover untuk tombol Edit */
        .btn-warning:hover {
            background-color: #e0a800;
        }

        /* Warna hover untuk tombol Hapus */
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kelola Admin</h1>

        <!-- Tampilkan Pesan Sukses -->
        @if(session('success'))
            <!-- Jika ada pesan sukses, tampilkan di sini -->
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <!-- Form untuk Tambah atau Edit Admin -->
        <form action="{{ isset($adminToEdit) ? route('admin.update', $adminToEdit->Id_Admin) : route('admin.store') }}" method="POST">
            @csrf
            @if (isset($adminToEdit))
                @method('PUT')
            @endif
        
            <!-- Input nama admin -->
            <label>Nama</label>
            <input type="text" name="nama" value="{{ isset($adminToEdit) ? $adminToEdit->nama : old('nama') }}" required>
        
            <!-- Input email admin -->
            <label>Email</label>
            <input type="email" name="email" value="{{ isset($adminToEdit) ? $adminToEdit->email : old('email') }}" required>
        
            <!-- Input password admin -->
            <label>Password</label>
            <input type="password" name="password" {{ isset($adminToEdit) ? '' : 'required' }}>
            @if (isset($adminToEdit))
                <!-- Jika mengedit admin, pesan opsional untuk mengubah password -->
                <small>Kosongkan jika tidak ingin mengubah password.</small>
            @endif
        
            <!-- Tombol untuk menyimpan data admin -->
            <button type="submit">Simpan</button>
        </form>
        
        <!-- Tabel Daftar Admin -->
        <h2>Data Yang Tersimpan</h2>
        @if ($admins->count())
            <!-- Jika ada data admin, tampilkan tabel -->
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Looping data admin yang ada -->
                    @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->Id_Admin }}</td>
                            <td>{{ $admin->nama }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->password }}</td>
                            <td>
                                <!-- Tombol Edit Admin -->
                                <a href="{{ route('admin.edit', $admin->Id_Admin) }}" class="btn btn-warning">Edit</a>

                                <!-- Tombol Hapus Admin -->
                                <form action="{{ route('admin.destroy', $admin->Id_Admin) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus admin ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <!-- Jika tidak ada data admin -->
            <p>Belum ada data admin.</p>
        @endif
    </div>
</body>
</html>


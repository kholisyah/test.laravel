<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
    <!-- Link ke Google Fonts untuk font Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Gaya umum untuk body */
        body {
            font-family: 'Roboto', sans-serif; /* Mengatur font utama ke Roboto */
            background-color: #f3f4f6; /* Warna latar belakang abu terang */
            margin: 0;
            padding: 20px; /* Ruang di sekitar body */
        }

        /* Gaya untuk judul halaman */
        h1, h2 {
            color: #2c3e50; /* Warna teks abu gelap */
            text-align: center; /* Teks di tengah */
        }

        /* Container utama yang membungkus form dan konten lainnya */
        .container {
            max-width: 800px; /* Lebar maksimal container */
            margin: auto; /* Meletakkan container di tengah halaman */
            background-color: #ffffff; /* Warna latar container putih */
            padding: 30px;
            border-radius: 12px; /* Sudut border membulat */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek depth */
        }

        /* Gaya untuk alert (pesan notifikasi) */
        .alert {
            margin: 20px 0;
            padding: 15px;
            border-radius: 6px;
        }

        /* Gaya untuk pesan sukses */
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        /* Gaya untuk pesan error */
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
        }

        /* Gaya untuk form */
        form {
            margin-bottom: 30px;
            background-color: #eef1f5; /* Latar belakang form */
            padding: 20px;
            border-radius: 12px; /* Sudut form membulat */
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1); /* Bayangan form */
        }

        /* Gaya untuk label form */
        label {
            display: block; /* Label tampil sebagai blok */
            margin: 10px 0 5px;
        }

        /* Gaya untuk input text, email, dan password */
        input[type="text"], input[type="email"], input[type="password"] {
            width: calc(100% - 20px); /* Lebar input penuh */
            padding: 12px;
            border: 2px solid #ced4da; /* Border abu terang */
            border-radius: 6px; /* Sudut membulat */
            margin-bottom: 15px;
            transition: border-color 0.3s; /* Animasi perubahan warna border saat fokus */
        }

        /* Gaya border input saat fokus */
        input:focus {
            border-color: #007bff; /* Border berubah menjadi biru saat fokus */
        }

        /* Gaya untuk tombol submit */
        button {
            background-color: #007bff; /* Warna latar biru */
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer; /* Kursor berubah menjadi pointer saat hover */
            transition: background-color 0.3s; /* Animasi perubahan warna tombol */
        }

        /* Perubahan warna tombol saat hover */
        button:hover {
            background-color: #0056b3; /* Warna latar lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Admin</h1>

        <!-- Tampilkan Pesan Sukses -->
        @if(session('success'))
            <!-- Jika ada pesan sukses dari session, tampilkan di sini -->
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form untuk Edit Admin -->
        <form action="{{ route('admin.update', ['admin' => $admin->Id_Admin]) }}" method="POST">
            @csrf <!-- Token CSRF untuk keamanan form -->
            @method('PUT') <!-- Method PUT digunakan untuk update data -->

            <!-- Input nama admin yang akan diubah -->
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="{{ $admin->nama }}" required>

            <!-- Input email admin yang akan diubah -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $admin->email }}" required>

            <!-- Input password (tidak wajib, jika dikosongkan password tidak akan berubah) -->
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
            
            <!-- Tombol untuk menyimpan perubahan -->
            <button type="submit">Ubah</button>
        </form>
    </div>
</body>
</html>

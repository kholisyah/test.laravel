<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
</head>
<body>
    <h1>Profil Pengguna</h1>
    <p>Nama: {{ $user->nama }}</p>
    <p>Email: {{ $user->email }}</p>
    <a href="{{ route('profile.edit', ['id' => $user->id]) }}">Edit</a>
<form action="{{ route('profile.delete', ['id' => $user->id]) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</button>
</form>

</body>
</html>

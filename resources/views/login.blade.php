<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman login</h1>
    <form action="/login" method="POST">
        @csrf
        <input name="nama" type="text" placeholder="Nama" required>
        <input name="password" type="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/login" method="POST">
        @csrf
        <input name="nama" type="text" placeholder="Nama" required>
        <input name="password" type="password" placeholder="Password" required>
        <select name="role" required>
            <option value="user" selected>User</option>
            <option value="admin">Admin</option>
        </select>
        <button type="submit">Login</button>
    </form>
    
      
</body>
</html>
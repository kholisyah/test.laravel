<!DOCTYPE html>
<head>
    <title>REGISTER</title>
</head>
<body>
    <div style="border: 3px solid black;">
    <h1>Halaman Register</h1>
    <form action="/register" method="POST">
        @csrf
        <input name="nama" type="text" placeholder="nama">
        <input name="password" type="password" placeholder="password">
        <label for="role">Role:</label>
            <select name="role" id="role" reuquired>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        <button>Register</button>
    </form>
    </div>
</body>
</html>
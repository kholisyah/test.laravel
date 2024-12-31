<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Container */
        form {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 20px auto;
        }

        form div {
            margin-bottom: 15px;
        }

        /* Input Fields */
        input[type="text"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        select {
            background-color: #fff;
            cursor: pointer;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #007bff;
        }

        /* Button */
        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Additional Styles */
        label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        /* Footer */
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <h1>Register</h1>
        <div>
            <label for="nama">Nama</label>
            <input 
                id="nama" 
                name="nama" 
                type="text" 
                placeholder="Masukkan Nama Anda" 
                required
            >
        </div>
        <div>
            <label for="password">Password</label>
            <input 
                id="password" 
                name="password" 
                type="password" 
                placeholder="Masukkan Password Anda" 
                required
            >
        </div>
        <div>
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div>
            <button type="submit">Register</button>
        </div>
        <footer>
            <p>Sudah punya akun? 
                <a href="/login">Login</a>
            </p>
        </footer>
    </form>
</body>
</html>

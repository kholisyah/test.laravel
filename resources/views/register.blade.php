<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
        }
        .register-container {
            border: 3px solid black;
            padding: 20px;
            max-width: 300px;
            margin: auto;
        }
        .register-container h1 {
            text-align: center;
        }
        .register-container form {
            display: flex;
            flex-direction: column;
        }
        .register-container input {
            margin: 10px 0;
            padding: 8px;
            font-size: 14px;
        }
        .register-container button {
            padding: 10px;
            background-color: black;
            color: white;
            border: none;
            cursor: pointer;
        }
        .register-container button:hover {
            background-color: darkgray;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Halaman Register</h1>
        <form action="/register" method="POST">
            @csrf
            <input name="nama" type="text" placeholder="Nama" required>
            <input name="email" type="email" placeholder="Email" required>
            <input name="password" type="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>        
    </div>
</body>
</html>
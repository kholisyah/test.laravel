<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>
    <style>
        /* Gaya latar belakang */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #FFDEE9, #B5FFFC);
        } 

        /* Kontainer utama */
        .login-container {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-container h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 600;
            color: #333333;
        }

        /* Formulir */
        .login-container form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Input */
        .login-container input {
            padding: 12px;
            border: 2px solid #f0f0f0;
            border-radius: 10px;
            font-size: 16px;
            background: #f9f9f9;
            color: #333;
            transition: 0.3s;
        }

        .login-container input:focus {
            border-color: #7DD3FC;
            background: #ffffff;
            outline: none;
        }

        /* Tombol */
        .login-container button {
            width: 100%;
            padding: 12px;
            background: #7DD3FC;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .login-container button:hover {
            background: #38BDF8;
            transform: translateY(-3px);
        }

        .login-container button:active {
            background: #0284C7;
            transform: translateY(0);
        }

        /* Tautan tambahan */
        .login-container .extra-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }

        .login-container .extra-link a {
            color: #0284C7;
            text-decoration: none;
        }

        .login-container .extra-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Halaman Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input name="nama" type="text" placeholder="Nama" required>
            <input name="password" type="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="extra-link">
            <span>Belum punya akun? <a href="/register">Daftar di sini</a></span>
        </div>
    </div>
</body>
</html>
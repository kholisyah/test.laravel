<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Reset CSS */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #FFDEE9, #B5FFFC);
        }

        .register-container {
            background: #ffffff;
            border-radius: 10px; /* Lebih kecil */
            padding: 20px; /* Mengurangi padding */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 350px; /* Lebar maksimal lebih kecil */
        }

        .register-container h1 {
            text-align: center;
            margin-bottom: 15px;
            font-size: 22px; /* Font lebih kecil */
            font-weight: 600;
            color: #333333;
        }

        .register-container form {
            display: flex;
            flex-direction: column;
            gap: 15px; /* Spasi antar elemen lebih kecil */
        }

        .form-row label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px; /* Font label lebih kecil */
            color: #555;
            font-weight: 500;
        }

        .form-row input {
            width: 100%;
            padding: 10px; /* Input lebih ramping */
            border: 2px solid #f0f0f0;
            border-radius: 5px; /* Border lebih kecil */
            font-size: 14px; /* Font input lebih kecil */
            background: #f9f9f9;
            color: #333;
            transition: 0.3s;
        }

        .form-row input:focus {
            border-color: #7DD3FC;
            background: #ffffff;
            outline: none;
        }

        .form-row .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .register-container button {
            width: 100%;
            padding: 10px; /* Tombol lebih kecil */
            background: #7DD3FC;
            border: none;
            border-radius: 5px; /* Radius lebih kecil */
            color: #fff;
            font-size: 14px; /* Font tombol lebih kecil */
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .register-container button:hover {
            background: #38BDF8;
            transform: translateY(-3px);
        }

        .register-container button:active {
            background: #0284C7;
            transform: translateY(0);
        }

        .register-container .extra-link {
            text-align: center;
            margin-top: 15px;
            font-size: 12px; /* Font keterangan lebih kecil */
            color: #333;
        }

        .register-container .extra-link a {
            color: #0284C7;
            text-decoration: none;
        }

        .register-container .extra-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h1>Halaman Register</h1>
        <form action="/register" method="POST">
            @csrf
            <div class="form-row">
                <label for="nama">Nama:</label>
                <input id="nama" name="nama" type="text" placeholder="Nama" required>
            </div>

            <div class="form-row">
                <label for="email">Email:</label>
                <input id="email" name="email" type="email" placeholder="Email" required>
            </div>

            <div class="form-row">
                <label for="password">Password:</label>
                <input id="password" name="password" type="password" placeholder="Password" required>
            </div>

            <div class="form-row">
                <label for="confirm-password">Konfirmasi Password:</label>
                <input id="confirm-password" name="confirm-password" type="password" placeholder="Konfirmasi Password" required>
            </div>

            <button type="submit">Register</button>
        </form>
        <div class="extra-link">
            <span>Sudah punya akun? <a href="/login">Klik disini</a></span>
        </div>
    </div>
</body>
</html>

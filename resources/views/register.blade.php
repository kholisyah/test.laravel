<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        .register-container {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px 30px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .register-container h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 600;
            color: #333333;
        }

        /* Formulir */
        .register-container form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Kontainer untuk setiap baris input */
        .form-row {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .form-row label {
            flex-basis: 100px;
            font-size: 16px;
            color: #555;
            font-weight: 500;
            text-align: right;
        }

        .form-row input {
            flex-grow: 1;
            padding: 10px;
            border: 2px solid #f0f0f0;
            border-radius: 8px;
            font-size: 16px;
            background: #f9f9f9;
            color: #333;
            transition: 0.3s;
        }

        .form-row input:focus {
            border-color: #7DD3FC;
            background: #ffffff;
            outline: none;
        }

        /* Tombol */
        .register-container button {
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

        .register-container button:hover {
            background: #38BDF8;
            transform: translateY(-3px);
        }

        .register-container button:active {
            background: #0284C7;
            transform: translateY(0);
        }

        /* Tautan tambahan */
        .register-container .extra-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
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
            <label for="nama">Nama:</label>
            <input name="nama" type="text" placeholder="Nama" required>

            <label for="email">Email:</label>
            <input name="email" type="email" placeholder="Email" required>

            <label for="password">Password:</label>
            <input name="password" type="password" placeholder="Password" required>

            <button type="submit">Register</button>
        </form>        
    </div>
</body>
</html>
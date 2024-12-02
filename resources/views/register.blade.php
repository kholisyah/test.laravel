<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* Reset CSS */
        *,
        *::before,
        *::after {
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

        .register-container form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-row {
            position: relative;
        }

        .form-row label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
            color: #555;
            font-weight: 500;
        }

        .form-row input {
            width: 100%;
            padding: 15px;
            border: 2px solid #f0f0f0;
            border-radius: 8px;
            font-size: 18px;
            background: #f9f9f9;
            color: #333;
            transition: 0.3s;
            padding-right: 40px; /* Ruang untuk ikon mata */
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
            font-size: 24px;
            cursor: pointer;
            transition: color 0.3s;
        }

        .form-row .toggle-password:hover {
            color: #0284C7;
        }

        /* Icon Eye Minimalist */
        .form-row .toggle-password svg {
            width: 24px;
            height: 24px;
            fill: #555;
        }

        .form-row .toggle-password:hover svg {
            fill: #0284C7;
        }

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
                <span class="toggle-password" onclick="toggleVisibility('password')">
                    <!-- Ikon Mata Minimalis -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 4C7 4 3.73 8 2 12c1.73 4 5 8 10 8s8.27-4 10-8c-1.73-4-5-8-10-8zm0 14c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                </span>
            </div>

            <div class="form-row">
                <label for="confirm-password">Konfirmasi Password:</label>
                <input id="confirm-password" name="confirm-password" type="password" placeholder="Konfirmasi Password" required>
                <span class="toggle-password" onclick="toggleVisibility('confirm-password')">
                    <!-- Ikon Mata Minimalis -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 4C7 4 3.73 8 2 12c1.73 4 5 8 10 8s8.27-4 10-8c-1.73-4-5-8-10-8zm0 14c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
                </span>
            </div>

            <button type="submit">Register</button>
        </form>
        <div class="extra-link">
            <span>sudah punya akun? <a href="/login">klik disini</a></span>
        </div>
    </div>

    <script>
        function toggleVisibility(inputId) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
            } else {
                input.type = "password";
            }
        }
    </script>
</body>
</html>

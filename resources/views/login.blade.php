<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
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
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input:focus {
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

        /* Footer */
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }

        footer a {
            color: #007bff;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form action="/login" method="POST">
        @csrf
        <h1>Login</h1>
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
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>

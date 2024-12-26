<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Sukses</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #E8F0FE;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #FFFFFF;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        h1 {
            color: #4CAF50;
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        a {
            display: inline-block;
            background-color: #4D8BFF;
            color: white;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 1em;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #3B72D3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pendaftaran Berhasil</h1>
        <p>Terima kasih telah mendaftar!</p>
        <a href="/home">Kembali ke Beranda</a>
    </div>
</body>
</html>

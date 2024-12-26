<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pendaftaran Berhasil</title>
    <style>
        /* Reset dan gaya dasar */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body {
            background-color: #E8F0FE;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h2 {
            color: #4CAF50;
            margin-bottom: 20px;
        }

        p {
            color: #333;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .button-group {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        a {
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            transition: background-color 0.3s ease;
        }

        .btn-dashboard {
            background-color: #4D8BFF;
        }

        .btn-dashboard:hover {
            background-color: #3B72D3;
        }

        .btn-another {
            background-color: #4CAF50;
        }

        .btn-another:hover {
            background-color: #388E3C;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pendaftaran Berhasil!</h2>
        <p>Terima kasih telah mendaftar. Data Anda telah berhasil disimpan.</p>
        <div class="button-group">
            <a href="/dashboard" class="btn-dashboard">Kembali ke Dashboard</a>
            <a href="/pendaftaran" class="btn-another">Buat Pendaftaran Baru</a>
        </div>
    </div>
</body>
</html>

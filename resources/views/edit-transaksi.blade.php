<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        input, select, button {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Transaksi</h1>

        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Input untuk Status -->
    <label for="status">Status Transaksi</label>
    <select name="status" id="status" required>
        <option value="pending" {{ $transaksi->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="lunas" {{ $transaksi->status == 'lunas' ? 'selected' : '' }}>Lunas</option>
    </select>

    <!-- Input untuk Total -->
    <label for="total">Total Transaksi</label>
    <input type="number" name="total" id="total" value="{{ $transaksi->total }}" required>

    <!-- Input untuk Tanggal -->
    <label for="tanggal">Tanggal Transaksi</label>
    <input type="date" name="tanggal" id="tanggal" value="{{ $transaksi->tanggal }}" required>

    <button type="submit">Simpan Perubahan</button>
</form>     
    </div>
</body>
</html>

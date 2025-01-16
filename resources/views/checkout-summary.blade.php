<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Checkout</title>
    <style>
        /* Navbar */
        .navbar {
            background-color: #89c4e9;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: #fff;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 20px;
            font-weight: bold;
        }

        .navbar .logo img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar a {
            margin-left: 20px;
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s, opacity 0.3s;
        }

        .navbar a:hover {
            color: #156ba5;
        }

        .navbar a.active {
            color: #156ba5;
            opacity: 0.7;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        .total {
            font-weight: bold;
            color: #28a745;
        }

        .form-group {
            margin-top: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        .whatsapp-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #25D366;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .whatsapp-btn:hover {
            background-color: #1DA851;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">
            <img src="{{ asset('assets/img/images.jpeg') }}" alt="Logo Sanggar Galuh">
            Sanggar Galuh
        </div>
        <div class="nav-links">
            <a href="/home">Beranda</a>
            <a href="/syarat">Pendaftaran</a>
            <a href="/lihat-jadwal">Jadwal</a>
            <a href="/index">Perengkingan</a>
            <a href="/penyewaan">Penyewaan</a>
            <a href="/cart" class="active">Keranjang</a>
            <a href="/login">Login</a>
        </div>
    </div>

    <h1>Ringkasan Checkout</h1>

    @if($checkoutItems->isEmpty())
        <p>Keranjang Anda kosong atau tidak ada item yang dipilih.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga Sewa</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($checkoutItems as $id => $item)
                    <tr>
                        <td>{{ $id }}</td>
                        <td>{{ $item['nama'] ?? 'Tidak Ada Nama' }}</td>
                        <td>{{ $item['jumlah'] ?? 0 }}</td>
                        <td>Rp {{ number_format($item['harga_sewa'] ?? 0, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format(($item['harga_sewa'] ?? 0) * ($item['jumlah'] ?? 1), 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="total">Total Harga</td>
                    <td class="total">Rp {{ number_format($totalPrice, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        <form id="checkout-form">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda">
                <div id="error-nama" class="error"></div>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" id="alamat" name="alamat" placeholder="Masukkan alamat Anda">
                <div id="error-alamat" class="error"></div>
            </div>

            <div class="form-group">
                <label for="telepon">Nomor Telepon</label>
                <input type="text" id="telepon" name="telepon" placeholder="Masukkan nomor telepon Anda">
                <div id="error-telepon" class="error"></div>
            </div>

            <a 
                href="#" 
                class="whatsapp-btn"
                onclick="validateForm(event, '{{ $totalPrice }}')">
                Bayar via WhatsApp
            </a>
        </form>
    @endif

    <script>
        function validateForm(event, totalPrice) {
            event.preventDefault();

            // Clear previous errors
            document.getElementById('error-nama').innerText = '';
            document.getElementById('error-alamat').innerText = '';
            document.getElementById('error-telepon').innerText = '';

            // Get form values
            const nama = document.getElementById('nama').value.trim();
            const alamat = document.getElementById('alamat').value.trim();
            const telepon = document.getElementById('telepon').value.trim();

            let isValid = true;

            // Validate nama
            if (!nama) {
                document.getElementById('error-nama').innerText = 'Nama harus diisi.';
                isValid = false;
            }

            // Validate alamat
            if (!alamat) {
                document.getElementById('error-alamat').innerText = 'Alamat harus diisi.';
                isValid = false;
            }

            // Validate telepon
            if (!telepon) {
                document.getElementById('error-telepon').innerText = 'Nomor telepon harus diisi.';
                isValid = false;
            }

            if (isValid) {
                const whatsappLink = `https://wa.me/6285750274278?text=Halo%20Sanggar%20Galuh,%20saya%20${encodeURIComponent(nama)}%20ingin%20melakukan%20pembayaran%20dengan%20total%20biaya%20Rp%20${encodeURIComponent(totalPrice)}.%20Alamat:%20${encodeURIComponent(alamat)}.%20Nomor%20Telepon:%20${encodeURIComponent(telepon)}.%20Mohon%20informasi%20lebih%20lanjut.`;
                window.open(whatsappLink, '_blank');
            }
        }
    </script>
</body>

</html>

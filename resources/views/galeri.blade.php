<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeri Baju Adat & Tarian - Sanggar Galuh Pelaihari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Layout Dasar */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F9F9F9;
            margin: 0;
            padding: 0;
        }

        /* Konten Utama */
        .content {
            padding: 40px;
        }

        .content h1 {
            font-size: 36px;
            color: #003366;
            margin-bottom: 40px;
            text-align: center;
        }

        /* Galeri */
        .gallery-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 30px;
            transition: transform 0.3s;
        }

        .gallery-card img {
            width: 100%;
            height: auto;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }

        .gallery-card .card-body {
            padding: 15px;
        }

        .gallery-card h3 {
            font-size: 20px;
            color: #003366;
            text-align: center;
            margin-top: 10px;
        }

        .gallery-card p {
            font-size: 14px;
            color: #555;
            text-align: center;
            margin-top: 10px;
        }

        .gallery-card:hover {
            transform: scale(1.05);
        }
                .quantity-controls {
            display: flex; /* Mengatur elemen menjadi sejajar */
            align-items: center; /* Pusatkan vertikal */
            justify-content: center; /* Pusatkan horizontal */
            gap: 5px; /* Jarak antara elemen */
        }

        .quantity-btn {
            width: 30px; /* Lebar tombol */
            height: 30px; /* Tinggi tombol */
            border: 1px solid #ccc; /* Tambahkan border */
            background-color: #f5f5f5; /* Warna latar */
            cursor: pointer;
            text-align: center;
            font-weight: bold;
        }

        .quantity-input {
            width: 50px; /* Lebar input */
            height: 30px; /* Tinggi input */
            text-align: center; /* Pusatkan teks */
            border: 1px solid #ccc; /* Tambahkan border */
            font-size: 16px; /* Ukuran teks */
        }

    </style>
</head>
<body>

    </div>
    <!-- Konten Utama -->
    <div class="content">
        <h1>Baju Adat & Tarian Sanggar Galuh Pelaihari</h1>

        <div class="container">
            <div class="row">
                <!-- Baju 1 -->
                <div class="col-md-3">
                    <div class="card gallery-card">
                        <img src="{{ asset('assets/img/betawi.webp') }}" alt="Baju Betawi">
                        <div class="card-body">
                            <h3>Baju Betawi</h3>
                            <p>Harga: Rp 70.000</p>
                            <p>Ukuran: Anak-anak, Remaja, Orang Tua</p>
                            <!-- Quantity Controls -->
                            <div class="quantity-controls">
                                <button class="quantity-btn decrease-btn" data-price="70000">-</button>
                                <input type="text" class="quantity-input" value="1" readonly>
                                <button class="quantity-btn increase-btn" data-price="70000">+</button>
                            </div>

                            <!-- Total Harga -->
                            <div class="total-price">Total: Rp 70.000</div>

                            <!-- Formulir Sewa -->
                            <form action="{{ route('transaksi.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="pending">
                                <input type="hidden" name="product_id" value="1">
                                <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                                <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                                <input type="hidden" name="total" class="hidden-total" value="70000">
                                <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Baju 2 -->
                <div class="col-md-3">
                    <div class="card gallery-card">
                        <img src="{{ asset('assets/img/Radap Rahayu.jpg') }}" alt="Radap Rahayu">
                        <div class="card-body">
                            <h3>Radap Rahayu</h3>
                            <p>Harga: Rp 100.000</p>
                            <p>Ukuran: Anak-anak, Remaja, Orang Tua</p>
                            <!-- Quantity Controls -->
                            <div class="quantity-controls">
                                <button class="quantity-btn decrease-btn" data-price="100000">-</button>
                                <input type="text" class="quantity-input" value="1" readonly>
                                <button class="quantity-btn increase-btn" data-price="100000">+</button>
                            </div>

                            <!-- Total Harga -->
                            <div class="total-price">Total: Rp 100.000</div>

                            <!-- Formulir Sewa -->
                            <form action="{{ route('transaksi.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="pending">
                                <input type="hidden" name="product_id" value="1">
                                <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                                <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                                <input type="hidden" name="total" class="hidden-total" value="100000">
                                <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                            </form>
                        </div>
                    </div>
                </div>
            <!-- Baju 3 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Giring giring.jpg') }}" alt="Giring giring">
                    <div class="card-body">
                        <h3>Baju Giring-Giring</h3>
                        <p>Harga: Rp 75.000</p>
                        <p>Ukuran: Anak-anak, Remaja, Orang Tua</p>
                        <!-- Quantity Controls -->
                        <div class="quantity-controls">
                            <button class="quantity-btn decrease-btn" data-price="75000">-</button>
                            <input type="text" class="quantity-input" value="1" readonly>
                            <button class="quantity-btn increase-btn" data-price="75000">+</button>
                        </div>

                        <!-- Total Harga -->
                        <div class="total-price">Total: Rp 75.000</div>

                        <!-- Formulir Sewa -->
                        <form action="{{ route('transaksi.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="pending">
                            <input type="hidden" name="product_id" value="1">
                            <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                            <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                            <input type="hidden" name="total" class="hidden-total" value="75000">
                            <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Baju 4 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Dayak.jpg') }}" alt="Dayak Cewe">
                    <div class="card-body">
                        <h3>Baju Dayak Cewe</h3>
                        <p>Harga: Rp 60.000</p>
                        <p>Ukuran: Anak-anak, Remaja, Orang Tua</p>
                        <!-- Quantity Controls -->
                        <div class="quantity-controls">
                            <button class="quantity-btn decrease-btn" data-price="60000">-</button>
                            <input type="text" class="quantity-input" value="1" readonly>
                            <button class="quantity-btn increase-btn" data-price="60000">+</button>
                        </div>

                        <!-- Total Harga -->
                        <div class="total-price">Total: Rp 60.000</div>

                        <!-- Formulir Sewa -->
                        <form action="{{ route('transaksi.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="pending">
                            <input type="hidden" name="product_id" value="1">
                            <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                            <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                            <input type="hidden" name="total" class="hidden-total" value="60000">
                            <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Baju 5 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Dayak cowo.jpg') }}" alt="Dayak Cowo">
                    <div class="card-body">
                        <h3>Baju Dayak Cowo</h3>
                    <p>Harga: Rp 60.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease-btn" data-price="60000">-</button>
                        <input type="text" class="quantity-input" value="1" readonly>
                        <button class="quantity-btn increase-btn" data-price="60000">+</button>
                    </div>

                    <!-- Total Harga -->
                    <div class="total-price">Total: Rp 60.000</div>

                    <!-- Formulir Sewa -->
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                        <input type="hidden" name="total" class="hidden-total" value="60000">
                        <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Baju 6 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Banjar Cewe.jpg') }}" alt="Baju Banjar Cewe">
                    <div class="card-body">
                        <h3>Baju Adat Banjar Cewe</h3>
                    <p>Harga: Rp 50.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease-btn" data-price="50000">-</button>
                        <input type="text" class="quantity-input" value="1" readonly>
                        <button class="quantity-btn increase-btn" data-price="50000">+</button>
                    </div>

                    <!-- Total Harga -->
                    <div class="total-price">Total: Rp 50.000</div>

                    <!-- Formulir Sewa -->
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                        <input type="hidden" name="total" class="hidden-total" value="50000">
                        <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Baju 7 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/banjarrrr.jpg') }}" alt="Baju Banjar Cowo">
                    <div class="card-body">
                        <h3>Baju Adat Banjar Cowo</h3>
                    <p>Harga: Rp 50.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                   <!-- Quantity Controls -->
                   <div class="quantity-controls">
                    <button class="quantity-btn decrease-btn" data-price="50000">-</button>
                    <input type="text" class="quantity-input" value="1" readonly>
                    <button class="quantity-btn increase-btn" data-price="50000">+</button>
                </div>

                <!-- Total Harga -->
                <div class="total-price">Total: Rp 50.000</div>

                <!-- Formulir Sewa -->
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                    <input type="hidden" name="total" class="hidden-total" value="50000">
                    <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                </form>
                    </div>
                </div>
            </div>

            <!-- Baju 8 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/baju nanang.jpg') }}" alt="baju nanang">
                    <div class="card-body">
                        <h3>Baju Nanang Banjar</h3>
                    <p>Harga: Rp 75.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease-btn" data-price="75000">-</button>
                        <input type="text" class="quantity-input" value="1" readonly>
                        <button class="quantity-btn increase-btn" data-price="75000">+</button>
                    </div>

                    <!-- Total Harga -->
                    <div class="total-price">Total: Rp 75.000</div>

                    <!-- Formulir Sewa -->
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                        <input type="hidden" name="total" class="hidden-total" value="75000">
                        <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Baju 9 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/bali cewe.jpg') }}" alt="Bali Cewe">
                    <div class="card-body">
                        <h3>Baju Adat Bali Cewe</h3>
                    <p>Harga: Rp 60.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease-btn" data-price="60000">-</button>
                        <input type="text" class="quantity-input" value="1" readonly>
                        <button class="quantity-btn increase-btn" data-price="60000">+</button>
                    </div>

                    <!-- Total Harga -->
                    <div class="total-price">Total: Rp 60.000</div>

                    <!-- Formulir Sewa -->
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                        <input type="hidden" name="total" class="hidden-total" value="60000">
                        <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Baju 10 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/bali.jpg') }}" alt="Bali">
                    <div class="card-body">
                        <h3>Baju Adat Bali Cowo</h3>
                    <p>Harga: Rp 60.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease-btn" data-price="60000">-</button>
                        <input type="text" class="quantity-input" value="1" readonly>
                        <button class="quantity-btn increase-btn" data-price="60000">+</button>
                    </div>

                    <!-- Total Harga -->
                    <div class="total-price">Total: Rp 60.000</div>

                    <!-- Formulir Sewa -->
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                        <input type="hidden" name="total" class="hidden-total" value="60000">
                        <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Baju 11 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/batak.jpg') }}" alt="Batak">
                    <div class="card-body">
                        <h3>Baju Adat Batak</h3>
                    <p>Harga: Rp 60.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease-btn" data-price="60000">-</button>
                        <input type="text" class="quantity-input" value="1" readonly>
                        <button class="quantity-btn increase-btn" data-price="60000">+</button>
                    </div>

                    <!-- Total Harga -->
                    <div class="total-price">Total: Rp 60.000</div>

                    <!-- Formulir Sewa -->
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                        <input type="hidden" name="total" class="hidden-total" value="60000">
                        <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Baju 12 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/banjar galuh.jpg') }}" alt="Galuh banjar">
                    <div class="card-body">
                        <h3>Baju Galuh Banjar</h3>
                    <p>Harga: Rp 75.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease-btn" data-price="75000">-</button>
                        <input type="text" class="quantity-input" value="1" readonly>
                        <button class="quantity-btn increase-btn" data-price="75000">+</button>
                    </div>

                    <!-- Total Harga -->
                    <div class="total-price">Total: Rp 75.000</div>

                    <!-- Formulir Sewa -->
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                        <input type="hidden" name="total" class="hidden-total" value="75000">
                        <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Baju 13 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/jas cewe.jpg') }}" alt="Jas Cewe">
                    <div class="card-body">
                        <h3>Jas Cewe</h3>
                    <p>Harga: Rp 50.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                    <div class="quantity-controls">
                        <button class="quantity-btn decrease-btn" data-price="50000">-</button>
                        <input type="text" class="quantity-input" value="1" readonly>
                        <button class="quantity-btn increase-btn" data-price="50000">+</button>
                    </div>

                    <!-- Total Harga -->
                    <div class="total-price">Total: Rp 50.000</div>

                    <!-- Formulir Sewa -->
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="status" value="pending">
                        <input type="hidden" name="product_id" value="1">
                        <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                        <input type="hidden" name="total" class="hidden-total" value="50000">
                        <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                    </form>
                    </div>
                </div>
            </div>

            <!-- Baju 14 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/jas cowo.jpg') }}" alt="Jas Cowo">
                    <div class="card-body">
                        <h3>Jas Cowo</h3>
                    <p>Harga: Rp 50.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                   <!-- Quantity Controls -->
                   <div class="quantity-controls">
                    <button class="quantity-btn decrease-btn" data-price="50000">-</button>
                    <input type="text" class="quantity-input" value="1" readonly>
                    <button class="quantity-btn increase-btn" data-price="50000">+</button>
                </div>

                <!-- Total Harga -->
                <div class="total-price">Total: Rp 50.000</div>

                <!-- Formulir Sewa -->
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                    <input type="hidden" name="total" class="hidden-total" value="50000">
                    <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                </form>
                    </div>
                </div>
            </div>

            <!-- Baju 15 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/jawa cewe.jpg') }}" alt="Jawa Cewe">
                    <div class="card-body">
                        <h3>Baju Adat Jawa Cewe</h3>
                    <p>Harga: Rp 50.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                   <div class="quantity-controls">
                    <button class="quantity-btn decrease-btn" data-price="50000">-</button>
                    <input type="text" class="quantity-input" value="1" readonly>
                    <button class="quantity-btn increase-btn" data-price="50000">+</button>
                </div>

                <!-- Total Harga -->
                <div class="total-price">Total: Rp 50.000</div>

                <!-- Formulir Sewa -->
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                    <input type="hidden" name="total" class="hidden-total" value="50000">
                    <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                </form>
                    </div>
                </div>
            </div>

            <!-- Baju 16 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/jawa.jpg') }}" alt="Jawa Cowo">
                    <div class="card-body">
                        <h3>Baju Adat Jawa Cowo</h3>
                    <p>Harga: Rp 50.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                   <div class="quantity-controls">
                    <button class="quantity-btn decrease-btn" data-price="50000">-</button>
                    <input type="text" class="quantity-input" value="1" readonly>
                    <button class="quantity-btn increase-btn" data-price="50000">+</button>
                </div>

                <!-- Total Harga -->
                <div class="total-price">Total: Rp 50.000</div>

                <!-- Formulir Sewa -->
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                    <input type="hidden" name="total" class="hidden-total" value="50000">
                    <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                </form>
                    </div>
                </div>
            </div>

            <!-- Baju 17 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/Kebaya.jpg') }}" alt="Kebaya KutuBaru">
                    <div class="card-body">
                        <h3>Kebaya KutuBaru</h3>
                    <p>Harga: Rp 60.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                   <div class="quantity-controls">
                    <button class="quantity-btn decrease-btn" data-price="60000">-</button>
                    <input type="text" class="quantity-input" value="1" readonly>
                    <button class="quantity-btn increase-btn" data-price="60000">+</button>
                </div>

                <!-- Total Harga -->
                <div class="total-price">Total: Rp 60.000</div>

                <!-- Formulir Sewa -->
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                    <input type="hidden" name="total" class="hidden-total" value="60000">
                    <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                </form>
                    </div>
                </div>
            </div>

            <!-- Baju 18 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/ntt.jpg') }}" alt="Baju Ntt">
                    <div class="card-body">
                        <h3>Baju Adat NTT</h3>
                    <p>Harga: Rp 70.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                   <!-- Quantity Controls -->
                   <div class="quantity-controls">
                    <button class="quantity-btn decrease-btn" data-price="70000">-</button>
                    <input type="text" class="quantity-input" value="1" readonly>
                    <button class="quantity-btn increase-btn" data-price="70000">+</button>
                </div>

                <!-- Total Harga -->
                <div class="total-price">Total: Rp 70.000</div>

                <!-- Formulir Sewa -->
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                    <input type="hidden" name="total" class="hidden-total" value="70000">
                    <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                </form>
                    </div>
                </div>
            </div>

            <!-- Baju 19 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/sumsel.jpg') }}" alt="Baju Sumsel">
                    <div class="card-body">
                        <h3>Baju Adat Sumsel</h3>
                    <p>Harga: Rp 50.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                   <!-- Quantity Controls -->
                   <div class="quantity-controls">
                    <button class="quantity-btn decrease-btn" data-price="50000">-</button>
                    <input type="text" class="quantity-input" value="1" readonly>
                    <button class="quantity-btn increase-btn" data-price="50000">+</button>
                </div>

                <!-- Total Harga -->
                <div class="total-price">Total: Rp 50.000</div>

                <!-- Formulir Sewa -->
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                    <input type="hidden" name="total" class="hidden-total" value="50000">
                    <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                </form>
                    </div>
                </div>
            </div>

            <!-- Baju 20 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/sunda.jpg') }}" alt="Baju Adat Sunda">
                    <div class="card-body">
                        <h3>Baju sunda</h3>
                    <p>Harga: Rp 50.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <p>Ukuran: Anak-anak, Remaja, Orang Tua</p> <!-- Sesuaikan ukuran dengan ukuran yang tersedia -->
                    <!-- Quantity Controls -->
                   <div class="quantity-controls">
                    <button class="quantity-btn decrease-btn" data-price="50000">-</button>
                    <input type="text" class="quantity-input" value="1" readonly>
                    <button class="quantity-btn increase-btn" data-price="50000">+</button>
                </div>

                <!-- Total Harga -->
                <div class="total-price">Total: Rp 50.000</div>

                <!-- Formulir Sewa -->
                <form action="{{ route('transaksi.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="pending">
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="tanggal" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="quantity" class="hidden-quantity" value="1">
                    <input type="hidden" name="total" class="hidden-total" value="50000">
                    <button type="submit" class="btn btn-success w-100">Sewa disini</button>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Mengatur tombol dan input quantity
        document.querySelectorAll('.gallery-card').forEach(card => {
            const decreaseBtn = card.querySelector('.decrease-btn');
            const increaseBtn = card.querySelector('.increase-btn');
            const quantityInput = card.querySelector('.quantity-input');
            const totalPriceElement = card.querySelector('.total-price');
            const hiddenQuantityInput = card.querySelector('.hidden-quantity');
            const hiddenTotalInput = card.querySelector('.hidden-total');
            const pricePerItem = parseInt(increaseBtn.getAttribute('data-price'), 10);

            // Event untuk tombol +
            increaseBtn.addEventListener('click', () => {
                let quantity = parseInt(quantityInput.value, 10);
                quantity++;
                quantityInput.value = quantity;
                hiddenQuantityInput.value = quantity;

                const totalPrice = quantity * pricePerItem;
                totalPriceElement.textContent = `Total: Rp ${totalPrice.toLocaleString()}`;
                hiddenTotalInput.value = totalPrice;
                decreaseBtn.disabled = false; // Aktifkan tombol -
            });

            // Event untuk tombol -
            decreaseBtn.addEventListener('click', () => {
                let quantity = parseInt(quantityInput.value, 10);
                if (quantity > 1) {
                    quantity--;
                    quantityInput.value = quantity;
                    hiddenQuantityInput.value = quantity;

                    const totalPrice = quantity * pricePerItem;
                    totalPriceElement.textContent = `Total: Rp ${totalPrice.toLocaleString()}`;
                    hiddenTotalInput.value = totalPrice;

                    if (quantity === 1) {
                        decreaseBtn.disabled = true; // Nonaktifkan tombol jika quantity 1
                    }
                }
            });

            // Disable tombol - jika jumlah awal = 1
            decreaseBtn.disabled = parseInt(quantityInput.value, 10) === 1;
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
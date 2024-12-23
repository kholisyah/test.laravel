<!DOCTYPE html>
<html lang="id">
<head>
    <!-- Meta Information -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Galeri Baju Adat & Tarian - Sanggar Galuh Pelaihari</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        /* Layout Dasar */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #d1e8ff, #bdd1f6);
            margin: 0;
            padding: 0;
            color: #333;
        }
    
        /* Konten Utama */
        .content {
            padding: 40px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
    
        .content h1 {
            font-size: 48px;
            color: #ffffff;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.4);
            font-family: 'Montserrat', sans-serif;
        }
    
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

        /* Galeri */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
    
        .gallery-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
    
        .gallery-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }
    
        .gallery-card .card-body {
            padding: 15px;
            text-align: center;
            background: #e8f4ff;
        }
    
        .gallery-card h3 {
            font-size: 20px;
            color: #004aad;
            margin: 10px 0 5px;
            font-weight: 600;
        }
    
        .gallery-card p {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
            line-height: 1.5;
        }
    
        .gallery-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    
        /* Kontrol Kuantitas */
        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }
    
        .quantity-btn {
            width: 35px;
            height: 35px;
            border: none;
            background: #004aad;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.3s ease;
        }
    
        .quantity-btn:hover {
            background: #005dbb;
            transform: scale(1.1);
        }
    
        .quantity-input {
            width: 50px;
            height: 35px;
            text-align: center;
            border: 2px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            background: #f1faff;
            color: #004aad;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    
        /* Layout Responsif */
        @media (max-width: 768px) {
            .content h1 {
                font-size: 28px;
            }
    
            .gallery-card img {
                height: 150px;
            }
    
            .gallery-card h3 {
                font-size: 18px;
            }
    
            .gallery-card p {
                font-size: 13px;
            }
    
            .quantity-btn {
                width: 30px;
                height: 30px;
                font-size: 14px;
            }
    
            .quantity-input {
                width: 45px;
                height: 30px;
            }
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
                <a href="/project">Pendaftaran</a>
                <a href="/login">Jadwal</a>
                <a href="/index">Perengkingan</a>
                <a href="/galeri">Penyewaan</a>
                <a href="/cart">Keranjang</a>
            </div>
        </div>
        

        <!-- Konten Utama -->
        <div class="content">
            <h1>Baju Adat & Tarian</h1>
        </div>
</body>
</html>
        <div class="container">
            <div class="row">
                <!-- Baju 1 -->
                <div class="col-md-3">
                    <div class="card gallery-card">
                        <img src="{{ asset('assets/img/betawi.webp') }}" alt="Baju Betawi">
                        <div class="card-body">
                            <h3>Baju Betawi</h3>
                            <p>Harga: Rp 70.000</p>
                
                            <!-- Dropdown untuk memilih kategori umur -->
                            <label for="kategori_betawi" class="form-label mt-2">Kategori</label>
                            <select name="kategori" id="kategori_betawi" class="form-select">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="anak">Anak</option>
                                <option value="orang_tua">Orang Tua</option>
                                <option value="dewasa">Remaja</option>
                            </select>
                
                            <!-- Quantity Controls -->
                            <div class="card" data-price="70000">
                                <div class="card-body">
                                    <div class="total-price">Total: Rp 70,000</div>
                                </div>
                            </div>
                
                            <!-- Formulir Tambah ke Keranjang -->
                            <form class="ajax-form">
                                @csrf
                                <input type="hidden" name="product_name" value="Baju betawi">
                                <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                                <input type="hidden" name="total" class="total-value" value="70000">
                                <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
                

                <!-- Baju 2 -->
                <div class="col-md-3">
                    <div class="card gallery-card">
                        <img src="{{ asset('assets/img/Radap Rahayuu.jpg') }}" alt="Radap Rahayu">
                        <div class="card-body">
                            <h3>Radap Rahayu</h3>
                            <p>Harga: Rp 100.000</p>
                            <label for="kategori" class="form-label mt-2">Kategori</label>
                            <select name="kategori" id="kategori" class="form-select">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="anak">Anak</option>
                                <option value="orang_tua">Orang Tua</option>
                                <option value="dewasa">Remaja</option>
                            </select>

                            <!-- Quantity Controls -->
                            <div class="card" data-price="100000">
                                <div class="card-body">
                                    <input type="number" class="quantity-input" value="1">
                                    <button class="quantity-btn" data-target=".quantity-input" data-price="100000">+</button>
                                    <button class="quantity-btn" data-target=".quantity-input" data-price="100000">-</button>
                                    <div class="total-price">Total: Rp 100,000</div>
                                </div>
                            </div>

                            <!-- Formulir Tambah ke Keranjang -->
                            <form class="ajax-form">
                                @csrf
                                <input type="hidden" name="product_name" value="Baju Radap Rahayu">
                                <input type="hidden" name="quantity" class="quantity-value" value="1">
                                <input type="hidden" name="total" class="total-value" value="100000">
                                <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                        <label for="kategori" class="form-label mt-2">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="anak">Anak</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="dewasa">Remaja</option>
                        </select>

                        <!-- Quantity Controls -->
                        <div class="card" data-price="75000">
                            <div class="card-body">
                                <input type="number" class="quantity-input" value="1">
                                <button class="quantity-btn" data-target=".quantity-input" data-price="75000">+</button>
                                <button class="quantity-btn" data-target=".quantity-input" data-price="75000">-</button>
                                <div class="total-price">Total: Rp 75,000</div>
                            </div>
                        </div>

                        <!-- Formulir Tambah ke Keranjang -->
                        <form class="ajax-form">
                            @csrf
                            <input type="hidden" name="product_name" value="Baju Giring Giring">
                            <input type="hidden" name="quantity" class="quantity-value" value="1">
                            <input type="hidden" name="total" class="total-value" value="75000">
                            <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                        <label for="kategori" class="form-label mt-2">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="anak">Anak</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="dewasa">Remaja</option>
                        </select>
                        
                       <!-- Quantity Controls -->
                       <div class="card" data-price="60000">
                        <div class="card-body">
                            <input type="number" class="quantity-input" value="1">
                            <button class="quantity-btn" data-target=".quantity-input" data-price="60000">+</button>
                            <button class="quantity-btn" data-target=".quantity-input" data-price="60000">-</button>
                            <div class="total-price">Total: Rp 60,000</div>
                        </div>
                    </div>

                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Dayak Cewe">
                        <input type="hidden" name="quantity" class="quantity-value" value="1">
                        <input type="hidden" name="total" class="total-value" value="60000">
                        <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>
                    
                    <!-- Quantity Controls -->
                    <div class="card" data-price="60000">
                        <div class="card-body">
                            <input type="number" class="quantity-input" value="1">
                            <button class="quantity-btn" data-target=".quantity-input" data-price="60000">+</button>
                            <button class="quantity-btn" data-target=".quantity-input" data-price="60000">-</button>
                            <div class="total-price">Total: Rp 60,000</div>
                        </div>
                    </div>

                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Dayak Cowo">
                        <input type="hidden" name="quantity" class="quantity-value" value="1">
                        <input type="hidden" name="total" class="total-value" value="60000">
                        <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                   <!-- Quantity Controls -->
                   <div class="card" data-price="50000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">-</button>
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>

                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Banjar Cewe">
                    <input type="hidden" name="quantity" class="quantity-value" value="1">
                    <input type="hidden" name="total" class="total-value" value="50000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                   <!-- Quantity Controls -->
                   < <div class="card" data-price="50000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">-</button>
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>

                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Banjar Cowo">
                    <input type="hidden" name="quantity" class="quantity-value" value="1">
                    <input type="hidden" name="total" class="total-value" value="50000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                    <!-- Quantity Controls -->
                    <div class="card" data-price="75000">
                        <div class="card-body">
                            <input type="number" class="quantity-input" value="1">
                            <button class="quantity-btn" data-target=".quantity-input" data-price="75000">+</button>
                            <button class="quantity-btn" data-target=".quantity-input" data-price="75000">-</button>
                            <div class="total-price">Total: Rp 75,000</div>
                        </div>
                    </div>

                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Nanang">
                        <input type="hidden" name="quantity" class="quantity-value" value="1">
                        <input type="hidden" name="total" class="total-value" value="75000">
                        <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                   <!-- Quantity Controls -->
                   <div class="card" data-price="60000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="60000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="60000">-</button>
                        <div class="total-price">Total: Rp 60,000</div>
                    </div>
                </div>

                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Bali Cewe">
                    <input type="hidden" name="quantity" class="quantity-value" value="1">
                    <input type="hidden" name="total" class="total-value" value="60000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>
                    
                    <!-- Quantity Controls -->
                    <div class="card" data-price="60000">
                        <div class="card-body">
                            <input type="number" class="quantity-input" value="1">
                            <button class="quantity-btn" data-target=".quantity-input" data-price="60000">+</button>
                            <button class="quantity-btn" data-target=".quantity-input" data-price="60000">-</button>
                            <div class="total-price">Total: Rp 60,000</div>
                        </div>
                    </div>

                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Adat Bali Cowo">
                        <input type="hidden" name="quantity" class="quantity-value" value="1">
                        <input type="hidden" name="total" class="total-value" value="60000">
                        <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                    <!-- Quantity Controls -->
                    <div class="card" data-price="60000">
                        <div class="card-body">
                            <input type="number" class="quantity-input" value="1">
                            <button class="quantity-btn" data-target=".quantity-input" data-price="60000">+</button>
                            <button class="quantity-btn" data-target=".quantity-input" data-price="60000">-</button>
                            <div class="total-price">Total: Rp 60,000</div>
                        </div>
                    </div>

                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Adat Batak">
                        <input type="hidden" name="quantity" class="quantity-value" value="1">
                        <input type="hidden" name="total" class="total-value" value="60000">
                        <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                   <!-- Quantity Controls -->
                   <div class="card" data-price="75000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="75000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="75000">-</button>
                        <div class="total-price">Total: Rp 75,000</div>
                    </div>
                </div>

                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Galuh Banjar">
                    <input type="hidden" name="quantity" class="quantity-value" value="1">
                    <input type="hidden" name="total" class="total-value" value="75000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                    <!-- Quantity Controls -->
                    <div class="card" data-price="50000">
                        <div class="card-body">
                            <input type="number" class="quantity-input" value="1">
                            <button class="quantity-btn" data-target=".quantity-input" data-price="50000">+</button>
                            <button class="quantity-btn" data-target=".quantity-input" data-price="50000">-</button>
                            <div class="total-price">Total: Rp 50,000</div>
                        </div>
                    </div>

                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Jas Cewe">
                        <input type="hidden" name="quantity" class="quantity-value" value="1">
                        <input type="hidden" name="total" class="total-value" value="50000">
                        <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>
                    
                  <!-- Quantity Controls -->
                  <div class="card" data-price="50000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">-</button>
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>

                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Jas Cowo">
                    <input type="hidden" name="quantity" class="quantity-value" value="1">
                    <input type="hidden" name="total" class="total-value" value="50000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                   <!-- Quantity Controls -->
                   <div class="card" data-price="50000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">-</button>
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat Jawa Cewe">
                    <input type="hidden" name="quantity" class="quantity-value" value="1">
                    <input type="hidden" name="total" class="total-value" value="50000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                  <!-- Quantity Controls -->
                  <div class="card" data-price="50000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">-</button>
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>

                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat Jawa Cowo">
                    <input type="hidden" name="quantity" class="quantity-value" value="1">
                    <input type="hidden" name="total" class="total-value" value="50000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                   <!-- Quantity Controls -->
                   <div class="card" data-price="60000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="60000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="60000">-</button>
                        <div class="total-price">Total: Rp 60,000</div>
                    </div>
                </div>

                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Kebaya KutuBaru">
                    <input type="hidden" name="quantity" class="quantity-value" value="1">
                    <input type="hidden" name="total" class="total-value" value="60000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                  <!-- Quantity Controls -->
                  <div class="card" data-price="70000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="70000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="70000">-</button>
                        <div class="total-price">Total: Rp 70,000</div>
                    </div>
                </div>

                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat NTT">
                    <input type="hidden" name="quantity" class="quantity-value" value="1" >
                    <input type="hidden" name="total" class="total-value" value="70000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
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
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>

                   <!-- Quantity Controls -->
                   <div class="card" data-price="50000">
                    <div class="card-body">
                        <input type="number" class="quantity-input" value="1">
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">+</button>
                        <button class="quantity-btn" data-target=".quantity-input" data-price="50000">-</button>
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>

                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat Sumsel">
                    <input type="hidden" name="quantity" class="quantity-value" value="1">
                    <input type="hidden" name="total" class="total-value" value="50000">
                    <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
                </form>
                    </div>
                </div>
            </div>

            <!-- Baju 20 -->
            <div class="col-md-3">
                <div class="card gallery-card">
                    <img src="{{ asset('assets/img/sunda.jpg') }}" alt="Baju Adat Sunda">
                    <div class="card-body">
                        <h3>Baju Adat Sunda</h3>
                    <p>Harga: Rp 50.000</p> <!-- Sesuaikan harga sesuai dengan harga baju -->
                    <label for="kategori" class="form-label mt-2">Kategori</label>
                    <select name="kategori" id="kategori" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Remaja</option>
                    </select>
                    
                    <!-- Quantity Controls -->
                    <div class="card" data-price="50000">
                        <div class="card-body">
                            <input type="number" class="quantity-input" value="1">
                            <button class="quantity-btn" data-target=".quantity-input" data-price="50000">+</button>
                            <button class="quantity-btn" data-target=".quantity-input" data-price="50000">-</button>
                            <div class="total-price">Total: Rp 100,000</div>
                        </div>
                    </div>

                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Adat Sunda">
                        <input type="hidden" name="quantity" class="quantity-value" value="1">
                        <input type="hidden" name="total" class="total-value" value="50000">
                        <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            const card = this.closest('.gallery-card');
            const productName = card.querySelector('input[name="product_name"]').value;
            const quantityInput = card.querySelector('.quantity-input');
            const quantity = parseInt(quantityInput.value);
            const price = parseInt(card.dataset.price);
            const totalPrice = quantity * price;

            // Kirim data ke server dengan AJAX
            fetch('/cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    product_name: productName,
                    quantity: quantity,
                    total: totalPrice,
                }),
            })
                .then(response => response.json())
                .then(data => {
                    alert('Item berhasil ditambahkan ke keranjang!');
                    // Perbarui tampilan keranjang atau lainnya jika diperlukan
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menambahkan item ke keranjang.');
                });
        });
    });
});

    document.addEventListener('DOMContentLoaded', () => {
        const navLinks = document.querySelectorAll('.navbar a');

        // Tambahkan event listener ke setiap tautan
        navLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                // Hapus kelas aktif dari semua tautan
                navLinks.forEach(link => link.classList.remove('active'));

                // Tambahkan kelas aktif ke tautan yang diklik
                event.target.classList.add('active');
            });
        });

        // Tandai tautan aktif berdasarkan URL saat ini
        const currentPath = window.location.pathname;
        navLinks.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    });
    $(document).ready(function () {
        // Saat tombol Tambahkan ke Keranjang ditekan
        $(document).on('click', '.add-to-cart', function () {
            const form = $(this).closest('.ajax-form'); // Ambil form terkait
            const url = "{{ route('cart.add') }}"; // URL tujuan server
            
            $.ajax({
                url: url,
                method: "POST",
                data: form.serialize(), // Kirim data form
                success: function (response) {
                    alert('Item berhasil ditambahkan ke keranjang!');
                    // Opsional: Update UI keranjang
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan, coba lagi.');
                }
            });
        });
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
    $('.add-to-cart').on('click', function() {
        var quantity = $('.quantity-value').val(); // Mengambil nilai jumlah
        var total = $('.total-value').val(); // Mengambil nilai total
        
        // Menghitung total harga berdasarkan jumlah yang dipilih
        var newTotal = total * quantity;
        
        // Update nilai total di hidden input
        $('.total-value').val(newTotal);

        // Kirimkan form menggunakan AJAX atau metode yang diinginkan
        $.ajax({
            url: 'your_cart_route_here', // Ganti dengan route yang sesuai
            method: 'POST',
            data: {
                _token: $('input[name="_token"]').val(),
                product_name: $('input[name="product_name"]').val(),
                quantity: quantity,
                total: newTotal
            },
            success: function(response) {
                // Handle response (misalnya, menampilkan update di cart)
                console.log(response);
            }
        });
    });
});

        // Fungsi untuk memperbarui jumlah dan total harga
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.quantity-btn');
        
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const isIncrease = this.textContent === '+'; // Periksa apakah tombol '+' atau '-'
                    const targetInput = this.closest('.card').querySelector('.quantity-input'); // Ambil input quantity dalam card yang sama
                    const totalPriceElement = this.closest('.card-body').querySelector('.total-price'); // Total harga di dalam card yang sama
                    const productPrice = parseInt(this.closest('.card').dataset.price); // Ambil harga produk dari data atribut card
        
                    // Ambil nilai saat ini dan lakukan operasi
                    let currentValue = parseInt(targetInput.value);
                    if (isIncrease) {
                        currentValue += 1;
                    } else if (currentValue > 1) { // Pastikan jumlah tidak kurang dari 1
                        currentValue -= 1;
                    }
        
                    // Perbarui nilai di input dan total harga
                    targetInput.value = currentValue;
                    totalPriceElement.textContent = `Total: Rp ${(currentValue * productPrice).toLocaleString()}`;
                });
            });
        });
    </script>
    
    
</body>
</html>
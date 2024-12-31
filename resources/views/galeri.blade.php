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
            <a href="/login">Jadwal</a>
            <a href="/index">Perengkingan</a>
            <a href="/cart">Keranjang</a>
            <a href="/login">Login</a>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="content">
        <h1>Baju Adat & Tarian</h1>
        <div class="container">
            <div class="row">
                <!-- Baju 1 -->
                <div class="col-md-3">
                    <div class="card gallery-card">
                        <img src="{{ asset('assets/img/betawi.webp') }}" alt="Baju Betawi">
                        <div class="card-body">
                            <h3>Baju Betawi</h3>
                            <p>Harga: Rp 70.000</p>

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

                                <!-- Dropdown Kategori -->
                                <label for="kategori_betawi" class="form-label mt-2">Kategori</label>
                                <select name="category" id="kategori_betawi" class="form-select">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="anak">Anak</option>
                                    <option value="orang_tua">Orang Tua</option>
                                    <option value="dewasa">Dewasa</option>
                                </select>

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

                            <!-- Quantity Controls -->
                            <div class="card" data-price="100000">
                                <div class="card-body">
                                    <div class="total-price">Total: Rp 100,000</div>
                                </div>
                            </div>
                
                            <!-- Formulir Tambah ke Keranjang -->
                            <form class="ajax-form">
                                @csrf
                                <input type="hidden" name="product_name" value="Baju Radap Rahayu">
                                <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                                <input type="hidden" name="total" class="total-value" value="100000">

                                <!-- Dropdown Kategori -->
                                <label for="kategori_Radap Rahayu" class="form-label mt-2">Kategori</label>
                                <select name="category" id="kategori_Radap Rahayu" class="form-select">
                                    <option value="" selected disabled>Pilih Kategori</option>
                                    <option value="anak">Anak</option>
                                    <option value="orang_tua">Orang Tua</option>
                                    <option value="dewasa">Dewasa</option>
                                </select>

                                <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang </button>
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

                        <!-- Quantity Controls -->
                        <div class="card" data-price="75000">
                            <div class="card-body">
                                <div class="total-price">Total: Rp 75,000</div>
                            </div>
                        </div>
            
                        <!-- Formulir Tambah ke Keranjang -->
                        <form class="ajax-form">
                            @csrf
                            <input type="hidden" name="product_name" value="Baju Giring-Giring">
                            <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                            <input type="hidden" name="total" class="total-value" value="75000">

                            <!-- Dropdown Kategori -->
                            <label for="kategori_Giring-Giring" class="form-label mt-2">Kategori</label>
                            <select name="category" id="kategori_Giring-Giring" class="form-select">
                                <option value="" selected disabled>Pilih Kategori</option>
                                <option value="anak">Anak</option>
                                <option value="orang_tua">Orang Tua</option>
                                <option value="dewasa">Dewasa</option>
                            </select>

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
                        
                       <!-- Quantity Controls -->
                       <div class="card" data-price="60000">
                        <div class="card-body">
                            <div class="total-price">Total: Rp 60,000</div>
                        </div>
                    </div>
        
                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Dayak Cewe">
                        <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                        <input type="hidden" name="total" class="total-value" value="60000">

                        <!-- Dropdown Kategori -->
                        <label for="kategori_Dayak Cewe" class="form-label mt-2">Kategori</label>
                        <select name="category" id="kategori_Dayak Cewe" class="form-select">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="anak">Anak</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="dewasa">Dewasa</option>
                        </select>

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
                    
                    <!-- Quantity Controls -->
                    <div class="card" data-price="60000">
                        <div class="card-body">
                            <div class="total-price">Total: Rp 60,000</div>
                        </div>
                    </div>
        
                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Dayak Cowo">
                        <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                        <input type="hidden" name="total" class="total-value" value="60000">

                        <!-- Dropdown Kategori -->
                        <label for="kategori_Dayak Cowo" class="form-label mt-2">Kategori</label>
                        <select name="category" id="kategori_Dayak Cowo" class="form-select">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="anak">Anak</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="dewasa">Dewasa</option>
                        </select>

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

                   <!-- Quantity Controls -->
                   <div class="card" data-price="50000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Banjar Cewe">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="50000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_Banjar Cewe" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_Banjar Cewe" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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
    
                   <!-- Quantity Controls -->
                   <div class="card" data-price="50000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat Banjar Cowo">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="50000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_Banjar Cowo" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_Banjar Cowo" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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

                    <!-- Quantity Controls -->
                    <div class="card" data-price="75000">
                        <div class="card-body">
                            <div class="total-price">Total: Rp 75,000</div>
                        </div>
                    </div>
        
                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Nanang Banjar">
                        <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                        <input type="hidden" name="total" class="total-value" value="75000">

                        <!-- Dropdown Kategori -->
                        <label for="kategori_Nanang Banjar" class="form-label mt-2">Kategori</label>
                        <select name="category" id="kategori_Nanang Banjar" class="form-select">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="anak">Anak</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="dewasa">Dewasa</option>
                        </select>

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
            
                   <!-- Quantity Controls -->
                   <div class="card" data-price="60000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 60,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat Bali Cewe">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="60000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_Bali Cewe" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_Bali Cewe" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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
                    
                    <!-- Quantity Controls -->
                    <div class="card" data-price="60000">
                        <div class="card-body">
                            <div class="total-price">Total: Rp 60,000</div>
                        </div>
                    </div>
        
                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Adat Bali Cowo">
                        <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                        <input type="hidden" name="total" class="total-value" value="60000">

                        <!-- Dropdown Kategori -->
                        <label for="kategori_Bali Cowo" class="form-label mt-2">Kategori</label>
                        <select name="category" id="kategori_Bali Cowo" class="form-select">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="anak">Anak</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="dewasa">Dewasa</option>
                        </select>

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

                    <!-- Quantity Controls -->
                    <div class="card" data-price="60000">
                        <div class="card-body">
                            <div class="total-price">Total: Rp 60,000</div>
                        </div>
                    </div>
        
                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Adat Batak">
                        <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                        <input type="hidden" name="total" class="total-value" value="60000">

                        <!-- Dropdown Kategori -->
                        <label for="kategori_Batak" class="form-label mt-2">Kategori</label>
                        <select name="category" id="kategori_Batak" class="form-select">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="anak">Anak</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="dewasa">Dewasa</option>
                        </select>

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
                    
                   <!-- Quantity Controls -->
                   <div class="card" data-price="75000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 75,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Galuh Banjar">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="75000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_Galuh Banjar" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_Galuh Banjar" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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
                    
                    <!-- Quantity Controls -->
                    <div class="card" data-price="50000">
                        <div class="card-body">
                            <div class="total-price">Total: Rp 50,000</div>
                        </div>
                    </div>
        
                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Jas Cewe">
                        <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                        <input type="hidden" name="total" class="total-value" value="50000">

                        <!-- Dropdown Kategori -->
                        <label for="kategori_Jas Cewe" class="form-label mt-2">Kategori</label>
                        <select name="category" id="kategori_Jas Cewe" class="form-select">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="anak">Anak</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="dewasa">Dewasa</option>
                        </select>

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
                   
                  <!-- Quantity Controls -->
                  <div class="card" data-price="50000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Jas Cowo">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="50000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_Jas Cowo" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_Jas Cowo" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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

                   <!-- Quantity Controls -->
                   <div class="card" data-price="50000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat Jawa Cewe">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="50000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_Jawa Cewe" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_Jawa Cewe" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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
                
                  <!-- Quantity Controls -->
                  <div class="card" data-price="50000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat Jawa Cowo">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="50000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_Jawa Cowo" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_Jawa Cowo" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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

                   <!-- Quantity Controls -->
                   <div class="card" data-price="60000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 60,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Kebaya KutuBaru">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="60000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_KutuBaru" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_KutuBaru" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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
                  
                  <!-- Quantity Controls -->
                  <div class="card" data-price="70000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 70,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat NTT">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="70000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_NTT" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_NTT" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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
                    
                   <!-- Quantity Controls -->
                   <div class="card" data-price="50000">
                    <div class="card-body">
                        <div class="total-price">Total: Rp 50,000</div>
                    </div>
                </div>
    
                <!-- Formulir Tambah ke Keranjang -->
                <form class="ajax-form">
                    @csrf
                    <input type="hidden" name="product_name" value="Baju Adat Sumsel">
                    <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                    <input type="hidden" name="total" class="total-value" value="50000">

                    <!-- Dropdown Kategori -->
                    <label for="kategori_Sumsel" class="form-label mt-2">Kategori</label>
                    <select name="category" id="kategori_Sumsel" class="form-select">
                        <option value="" selected disabled>Pilih Kategori</option>
                        <option value="anak">Anak</option>
                        <option value="orang_tua">Orang Tua</option>
                        <option value="dewasa">Dewasa</option>
                    </select>

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
                    
                    <!-- Quantity Controls -->
                    <div class="card" data-price="50000">
                        <div class="card-body">
                            <div class="total-price">Total: Rp 50,000</div>
                        </div>
                    </div>
        
                    <!-- Formulir Tambah ke Keranjang -->
                    <form class="ajax-form">
                        @csrf
                        <input type="hidden" name="product_name" value="Baju Adat Sunda">
                        <input type="number" name="quantity" class="quantity-value" value="1" min="1">
                        <input type="hidden" name="total" class="total-value" value="50000">
    
                        <!-- Dropdown Kategori -->
                        <label for="kategori_Sunda" class="form-label mt-2">Kategori</label>
                        <select name="category" id="kategori_Sunda" class="form-select">
                            <option value="" selected disabled>Pilih Kategori</option>
                            <option value="anak">Anak</option>
                            <option value="orang_tua">Orang Tua</option>
                            <option value="dewasa">Dewasa</option>
                        </select>
    
                        <button type="button" class="btn btn-success add-to-cart">Tambahkan ke Keranjang</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Menambahkan event listener untuk tombol "Add to Cart" di setiap elemen dengan kelas 'add-to-cart'
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function () {
                // Mencari form terdekat di dalam elemen tombol dan mengumpulkan data dari form
                const form = this.closest('form');
                const formData = new FormData(form);
    
                // Debugging: Memastikan kategori terkirim dalam FormData
                console.log('Kategori:', formData.get('category'));
    
                // Mengirim data ke server menggunakan fetch
                fetch('/cart/add', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content // Menyertakan token CSRF untuk keamanan
                    }
                })
                .then(response => response.json())
                .then(data => {
                    alert(data.message); // Menampilkan notifikasi sukses jika data berhasil ditambahkan
                })
                .catch(error => console.error('Error:', error)); // Menampilkan pesan kesalahan jika terjadi error
            });
        });
    
        // Menambahkan event listener untuk tombol "Add to Cart" setelah halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function () {
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
            // Iterasi melalui semua tombol dan menambahkan event listener
            addToCartButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Mengambil informasi produk dari elemen terdekat (gallery card)
                    const card = this.closest('.gallery-card');
                    const productName = card.querySelector('input[name="product_name"]').value;
                    const quantityInput = card.querySelector('.quantity-input');
                    const quantity = parseInt(quantityInput.value); // Mengambil jumlah dari input quantity
                    const price = parseInt(card.dataset.price); // Mengambil harga produk dari atribut data
                    const totalPrice = quantity * price; // Menghitung total harga berdasarkan jumlah dan harga produk
    
                    // Mengirim data ke server menggunakan fetch (AJAX)
                    fetch('/cart', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json', // Mengirim data dalam format JSON
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Token CSRF
                        },
                        body: JSON.stringify({
                            product_name: productName, // Mengirim nama produk
                            quantity: quantity, // Mengirim jumlah produk
                            total: totalPrice, // Mengirim total harga
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert('Item berhasil ditambahkan ke keranjang!'); // Notifikasi bahwa item berhasil ditambahkan
                    window.location.href = '/sukses';
                        // Perbarui tampilan keranjang atau UI lainnya jika diperlukan
                    })
                    .catch(error => {
                        console.error('Error:', error); // Menampilkan pesan kesalahan jika ada masalah dengan request
                        alert('Terjadi kesalahan saat menambahkan item ke keranjang.');
                    });
                });
            });
        });
    
        // Menambahkan event listener untuk tautan navigasi agar dapat menandai tautan aktif
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.navbar a');
    
            // Menambahkan event listener untuk setiap tautan di navbar
            navLinks.forEach(link => {
                link.addEventListener('click', (event) => {
                    // Menghapus kelas aktif dari semua tautan
                    navLinks.forEach(link => link.classList.remove('active'));
    
                    // Menambahkan kelas aktif pada tautan yang diklik
                    event.target.classList.add('active');
                });
            });
    
            // Menandai tautan aktif berdasarkan URL saat ini
            const currentPath = window.location.pathname;
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active'); // Menandai tautan yang sesuai dengan path saat ini
                }
            });
        });
    
        // Menangani event klik pada tombol "Add to Cart" menggunakan jQuery
        $(document).ready(function () {
            // Event listener untuk tombol "Add to Cart"
            $(document).on('click', '.add-to-cart', function () {
                const form = $(this).closest('.ajax-form'); // Mendapatkan form terkait dengan tombol
                const url = "{{ route('cart.add') }}"; // URL tujuan server
    
                // Mengirim data form menggunakan AJAX
                $.ajax({
                    url: url, // Menyertakan URL tujuan
                    method: "POST", // Metode HTTP yang digunakan
                    data: form.serialize(), // Menyertakan data form dalam format URL encoded
                    success: function (response) {
                        alert('Item berhasil ditambahkan ke keranjang!'); // Menampilkan notifikasi sukses
                        // Opsional: Update UI keranjang jika diperlukan
                        window.location.href = '/biodata';
                    },
                    error: function (xhr) {
                        alert('Terjadi kesalahan, coba lagi.'); // Menampilkan pesan kesalahan jika gagal
                    }
                });
            });
        });
    
       
    </script>
    
    
    
</body>
</html>
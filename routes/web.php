<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SawAhpController;
use App\Http\Controllers\TarianController;
use App\Http\Controllers\DropBoxController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LihatProfilController;
use App\Http\Controllers\PendaftaranController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function() {
    return view('dashboard');
});
Route::get('/project', function () {
    return view('project');
});
Route::get('/dasbord', function () {
    return view('dasbord');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/syarat', function () {
    return view('syarat');
});
Route::get('/jadwal', function () {
    return view('jadwal');
});
Route::get('/baju', function () {
    return view('baju');
});

Route::get('/tari', function () {
    return view('tari');
});

// Route untuk menampilkan form login
Route::get('/login', function () {
    return view('login');
})->name('login'); // Pastikan route ini memiliki nama 'login'

// Route untuk memproses login
Route::post('/login', [UserController::class, 'login']);


Route::get('/register', function () {
    return view('register');
});

Route::get('/sukses', function () {
    return view('sukses');
});

Route::get('/result', function () {
    return view('result');
})->name('result');

Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show')->middleware('auth');
// Menampilkan dan mengelola data pengguna
Route::get('/profile/edit/{id}', [UserController::class, 'editProfile'])->name('profile.edit')->middleware('auth');
Route::delete('/profile/delete/{id}', [UserController::class, 'deleteProfile'])->name('profile.delete')->middleware('auth');


// Rute untuk menampilkan semua pendaftaran
Route::get('/project', [PendaftaranController::class, 'index']);

// Rute untuk menambah pendaftaran baru
Route::post('/create-pendaftaran', [PendaftaranController::class, 'createPendaftaran']);

// Rute untuk menampilkan halaman edit pendaftaran
Route::get('/edit-pendaftaran/{pendaftaran}', [PendaftaranController::class, 'showEditScreen']);

// Rute untuk memperbarui pendaftaran
Route::put('/edit-pendaftaran/{pendaftaran}', [PendaftaranController::class, 'actuallyUpdatePendaftaran']);

// Rute untuk menghapus pendaftaran
Route::delete('/delete-pendaftaran/{pendaftaran}', [PendaftaranController::class, 'deletePendaftaran']);




// Route untuk menampilkan jadwal
Route::get('/jadwal', [AkunController::class, 'index'])->name('jadwal');
// Route untuk menyimpan data akun baru
Route::post('/create.post', [AkunController::class, 'createPost'])->name('create.post');
// Rute untuk menampilkan halaman edit (untuk Akun)
Route::get('/edit-posts/{akun}', [AkunController::class, 'showEditScreen']);
Route::put('/edit-posts/{akun}', [AkunController::class, 'actuallyUpdatePost']);
// Rute untuk menghapus akun
Route::delete('/delete-posts/{akun}', [AkunController::class, 'deletePost']);
// Rute untuk halaman edit
Route::get('/edit-posts/{id}', [AkunController::class, 'edit'])->name('edit');
// Rute untuk menyimpan pembaruan data
Route::post('/update-posts/{id}', [AkunController::class, 'update'])->name('update');
// Rute untuk melihat jadwal latihan
Route::get('/lihat-jadwal', [JadwalController::class, 'index'])->name('lihat-jadwal');
Route::post('/jadwal/store', [AkunController::class, 'store'])->name('jadwal.store');

// Menampilkan daftar penyewaan
Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan.index');
// Penjelasan: Mengakses URL /penyewaan akan memanggil metode index di PenyewaanController, yang bertugas untuk menampilkan daftar semua penyewaan. Ini biasanya halaman yang berisi tabel penyewaan yang tersedia.

// Menampilkan form untuk membuat penyewaan baru
Route::get('/penyewaan/create', [PenyewaanController::class, 'create'])->name('penyewaan.create');
// Penjelasan: Mengakses URL /penyewaan/create akan memanggil metode create di PenyewaanController, yang menampilkan halaman form untuk menambahkan penyewaan baru. Pengguna dapat memasukkan data penyewaan di form ini.

// Menyimpan penyewaan baru ke dalam database
Route::post('/penyewaan', [PenyewaanController::class, 'store'])->name('penyewaan.store');
// Penjelasan: Rute ini menangani permintaan POST yang dikirim dari form penyewaan baru. Setelah form disubmit, metode store pada PenyewaanController akan memproses data dan menyimpannya ke database.

// Menampilkan form untuk mengedit penyewaan berdasarkan ID
Route::get('/penyewaan/{id}/edit', [PenyewaanController::class, 'edit'])->name('penyewaan.edit');
// Penjelasan: Rute ini akan memanggil metode edit di PenyewaanController, yang bertugas menampilkan form untuk mengedit penyewaan yang sudah ada. Data penyewaan yang akan diedit akan dimuat berdasarkan ID yang diberikan di URL ({id}).

// Memperbarui data penyewaan di database berdasarkan ID
Route::put('/penyewaan/{id}', [PenyewaanController::class, 'update'])->name('penyewaan.update');
// Penjelasan: Rute ini digunakan untuk memperbarui data penyewaan yang ada. Setelah form edit disubmit, metode update di PenyewaanController akan menyimpan perubahan ke database. ID penyewaan yang diupdate diambil dari URL ({id}).

// Menghapus penyewaan dari database berdasarkan ID
Route::delete('/penyewaan/{id}', [PenyewaanController::class, 'destroy'])->name('penyewaan.destroy');
// Penjelasan: Rute ini digunakan untuk menghapus penyewaan berdasarkan ID. Saat pengguna melakukan aksi hapus, metode destroy di PenyewaanController akan dijalankan untuk menghapus data penyewaan dari database.

// Menampilkan detail penyewaan berdasarkan ID
Route::get('/penyewaan/{id}', [PenyewaanController::class, 'show'])->name('penyewaan.show');
// Penjelasan: Rute ini digunakan untuk menampilkan detail lengkap penyewaan tertentu. Metode show pada PenyewaanController akan menampilkan informasi rinci tentang penyewaan yang dipilih berdasarkan ID yang diberikan di URL ({id}).

//route halaman home
Route::post('/create-akun', [AkunController::class, 'createAkun']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);

//lihat Profil
Route::get('/lihat-profil', [LihatProfilController::class, 'index'])->name('lihat-profil');
Route::get('/profil', [LihatProfilController::class, 'index']);

//lihat-penyewaan
Route::get('/lihat-penyewaan', [PenyewaanController::class, 'lihatPenyewaan'])->name('penyewaan.lihat');

//lihat-pendaftaran
Route::get('/lihat-pendaftaran', [PendaftaranController::class, 'lihatPendaftaran']);

//logout
Route::post('/logout', function () {
    Auth::logout(); // Fungsi bawaan Laravel untuk logout
    return redirect('/login'); // Redirect ke halaman utama atau halaman lain setelah logout
})->name('logout');

//lihat login
Route::get('/lihat-login', [UserController::class, 'index']);
Route::get('/edit-login/{id}', [UserController::class, 'edit'])->name('edit-login');
Route::put('/update-login/{id}', [UserController::class, 'update'])->name('update-login');
Route::delete('/delete-login/{id}', [UserController::class, 'destroy'])->name('delete-login');
Route::get('/lihat-login', [UserController::class, 'index'])->name('lihat-login');

//DropBox
Route::post('upload', [DropBoxController::class, 'uploadFile'])->name('upload');
route::get('/dropbox/create-folder',[DropBoxController::class, 'createFolder']);
Route::get('/dropbox/list-folder', [DropBoxController::class, 'listFolder']);
Route::get('/dropbox/upload-file', [DropBoxController::class, 'uploadFile']);
Route::get('/dropbox/get-temp-link', [DropBoxController::class, 'getTemporaryLink']);
Route::get('/dropbox/move-file', [DropBoxController::class, 'moveFile']);

//galeri
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
// Rute untuk menyimpan biodata
Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');

Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::resource('transaksi', TransaksiController::class);
Route::put('/transaksi/{id}/update-status', [TransaksiController::class, 'updateStatus'])->name('transaksi.updateStatus');
Route::put('/update-transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::get('/payment/{id}', [TransaksiController::class, 'showPaymentPage'])->name('transaksi.payment');

// Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
// Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
// Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::post('/transaksi/store-from-cart', [TransaksiController::class, 'storeFromCart'])->name('transaksi.storeFromCart');
Route::post('/transaksi/from-cart', [TransaksiController::class, 'storeFromCart'])->name('transaksi.storeFromCart');

Route::get('/index', [SawAhpController::class, 'index']);

Route::get('/biodata', [CartController::class, 'showBiodataForm'])->name('biodata.form');
Route::post('/biodata', [CartController::class, 'saveBiodata'])->name('biodata.save');

// Rute untuk menampilkan daftar tarian
Route::get('/tari', [TarianController::class, 'index'])->name('tarian.index');
Route::post('/tari', [TarianController::class, 'store'])->name('tarian.store'); // Menyimpan data baru
Route::put('/tari/{id}', [TarianController::class, 'update'])->name('tarian.update'); // Update data
Route::delete('/tari/{id}', [TarianController::class, 'destroy'])->name('tarian.destroy'); // Hapus data

Route::get('/pelatih', [PelatihController::class, 'index'])->name('pelatih');
 // Halaman utama
Route::post('/pelatih/store', [PelatihController::class, 'store'])->name('pelatih.store'); // Menyimpan data baru
Route::post('/create-post', [PelatihController::class, 'createPost']);
Route::put('/pelatih/{id}', [PelatihController::class, 'update'])->name('pelatih.update'); // Update data
Route::delete('/pelatih/{id}', [PelatihController::class, 'destroy'])->name('pelatih.destroy'); // Hapus data

Route::get('/baju', [BajuController::class, 'index'])->name('baju.index');
Route::post('/baju/store', [BajuController::class, 'store'])->name('baju.store');
Route::delete('/baju/destroy/{baju}', [BajuController::class, 'destroy'])->name('baju.destroy');
Route::put('/baju/update/{id}', [BajuController::class, 'update'])->name('baju.update');

// Route::get('/baju/create', [BajuController::class, 'create'])->name('baju.create');
// Route::resource('bajus', BajuController::class);
// Route::post('/baju/store', [BajuController::class, 'store'])->name('baju.store'); // Menyimpan data baru
// Route::post('/create-post', [BajuController::class, 'createPost']);
// Route::put('/baju/update/{id}', [BajuController::class, 'update'])->name('baju.update'); // Update data
// Route::delete('/baju/destroy/{id}', [BajuController::class, 'destroy'])->name('baju.destroy'); // Hapus data
// Route::post('/baju/store', [BajuController::class, 'store'])->name('bajus.store');
// Route::post('/upload', [BajuController::class, 'upload'])->name('baju.upload');

Route::get('/penyewaan', [PenyewaanController::class, 'lihatPenyewaan'])->name('penyewaan.lihat');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');

Route::post('upload', [DropBoxController::class, 'uploadFile'])->name('upload');

Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan.index');
Route::post('/penyewaan/store', [PenyewaanController::class, 'store'])->name('penyewaan.store');

Route::post('/penyewaan/sewa/{id}', [PenyewaanController::class, 'sewa'])->name('penyewaan.sewa');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/delete/{id}', [CartController::class, 'deleteToCart'])->name('cart.delete');
Route::post('/penyewaan/{id}/add-to-cart', [CartController::class, 'addToCart'])->name('penyewaan.addToCart');

Route::post('/checkout/{id}', [CartController::class, 'checkout'])->name('checkout');
Route::get('/checkout-summary', [CartController::class, 'checkoutSummary'])->name('checkout.summary');

Route::get('/bayar', function () {
    return view('checkout-summary'); 
})->name('bayar');

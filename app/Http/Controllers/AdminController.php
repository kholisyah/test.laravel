<?php

namespace App\Http\Controllers;

use App\Models\Admin; // Model Admin
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan daftar admin
    public function index()
    {
        // Mengambil semua data admin dari database
        $admins = Admin::all(); 
        
        // Mengirimkan data admin ke view untuk ditampilkan
        return view('admin', compact('admins')); 
    }

    // Menyimpan admin baru
    public function store(Request $request)
    {
        // Validasi data yang diinputkan oleh pengguna
        $validatedData = $request->validate([
            'nama' => 'required', // Nama wajib diisi
            'email' => 'required|email', // Email wajib diisi dan harus berupa format email yang valid
            'password' => 'required', // Password wajib diisi
        ]);

        // Simpan data admin baru ke database dengan enkripsi password
        Admin::create([
            'nama' => $validatedData['nama'], // Mengisi nama admin
            'email' => $validatedData['email'], // Mengisi email admin
            'password' => bcrypt($validatedData['password']), // Enkripsi password admin
        ]);

        // Redirect ke halaman daftar admin dan menampilkan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    // Menampilkan form edit admin
    public function edit($id)
    {
        // Mencari admin berdasarkan ID, jika tidak ditemukan akan menampilkan error
        $admin = Admin::findOrFail($id); 
        
        // Mengirimkan data admin ke view untuk di-edit
        return view('edit_admin', compact('admin')); 
    }

    // Memperbarui admin
    public function update(Request $request, $id)
    {
        // Mencari admin berdasarkan ID
        $admin = Admin::findOrFail($id);

        // Validasi data yang diinputkan oleh pengguna
        $request->validate([
            'nama' => 'required|string|max:255', // Nama wajib diisi, maksimal 255 karakter
            'email' => 'required|email|unique:admins,email,' . $admin->Id_Admin, // Email wajib dan harus unik kecuali milik admin yang sedang di-edit
            'password' => 'nullable|string|min:6', // Password bersifat opsional tetapi harus minimal 6 karakter jika diisi
        ]);

        // Mengisi data admin yang akan diperbarui
        $admin->nama = $request->nama;
        $admin->email = $request->email;

        // Jika ada input password, password akan diperbarui
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password); // Enkripsi password baru
        }

        // Simpan perubahan ke database
        $admin->save();

        // Redirect ke halaman daftar admin dan menampilkan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
    }

    // Menghapus admin
    public function destroy($id)
    {
        // Mencari admin berdasarkan ID, jika tidak ditemukan akan menampilkan error
        $admin = Admin::findOrFail($id);
        
        // Hapus data admin dari database
        $admin->delete();

        // Redirect ke halaman daftar admin dan menampilkan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
    }
}


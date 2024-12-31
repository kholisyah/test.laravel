<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Fungsi login
    public function login(Request $request)
    {
        // Validasi input
        $incomingFields = $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah username dan password benar
        if (Auth::attempt(['nama' => $incomingFields['nama'], 'password' => $incomingFields['password']])) {
            // Regenerate session jika login berhasil
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'loginError' => 'nama atau password salah.',
        ])->withInput($request->except('password'));
    }

    // Fungsi logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // Fungsi register
    public function register(Request $request)
    {
        // Validasi input
        $incomingFields = $request->validate([
            'nama' => ['required', 'min:3', 'max:10', 'unique:user,nama'],
            'password' => ['required', 'min:4', 'max:8'],
            'role' => ['required', 'string', 'in:admin,user']
        ]);

        // Enkripsi password
        $incomingFields['password'] = bcrypt($incomingFields['password']);

        // Buat user baru
        $user = User::create($incomingFields);

        if ($user) {
            // Setelah registrasi, arahkan ke halaman login dengan pesan sukses
            return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
        }

        // Jika registrasi gagal
        return back()->withErrors(['registerError' => 'Gagal melakukan registrasi.'])->withInput();
    }
}
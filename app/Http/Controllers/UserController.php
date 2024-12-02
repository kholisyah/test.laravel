<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // login
    public function login(Request $request)
    {
        $incomingFields = $request->validate([
            'nama' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['nama' => $incomingFields['nama'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        
        return back()->withErrors(['login' => 'Login gagal']);
    }
    

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    // register
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'email' => 'required|email|max:255|unique:user', // Pastikan 'user' sesuai dengan tabel Anda
        ]);

        User::create([
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'email' => $request->email,
        ]);
        
        return redirect('/login');
    }

    // Menampilkan semua pengguna
    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    // Mengedit profil pengguna
    public function editProfile($id)
    {
        $user = User::findOrFail($id); // Temukan pengguna berdasarkan ID
        return view('profile.edit', compact('user'));
    }

    // Menghapus profil pengguna
    public function deleteProfile($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}

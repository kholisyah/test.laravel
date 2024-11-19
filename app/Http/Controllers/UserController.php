<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //login
    public function login(Request $request){
        $incomingFields = $request->validate([
            'nama' =>'required',
             'password' =>'required'
        ]);
        if (Auth::attempt(['nama' => $incomingFields['nama'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
        }
        return redirect('/dashboard');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function register(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'email' => 'required|email|max:255|unique:User',
    ]);

    // Simpan data ke database
    User::create([
        'nama' => $request->nama,
        'password' => bcrypt($request->password),
        'email' => $request->email,
    ]);

    return redirect('/')->with('success', 'Registrasi berhasil!');
}
}
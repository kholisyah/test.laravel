<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edit-login', compact('user')); // Tampilkan form edit dengan data pengguna
    }
    
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete(); // Hapus pengguna
        return redirect()->route('lihat-login'); // Kembali ke halaman daftar login setelah penghapusan
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('lihat-login')->with('success', 'Data berhasil diperbarui');
    }

    public function index()
{
    $logins = DB::table('user')->get(); // Ganti 'akun' dengan nama tabel login
    return view('lihat-login', ['logins' => $logins]);
}

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
            'email' => 'required|email|max:255|unique:user',
        ]);
        
        // Simpan data ke database
        User::create([
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'email' => $request->email,
        ]);
        return redirect('/login');
    }
    }
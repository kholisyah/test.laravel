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
    public function register (Request $request) {
        $incomingFields = $request->validate([
            'nama' => ['required', 'min:3', 'max:10'],
            'password' => ['required', 'min:4', 'max:8']
        ]);
        $incomingFields['password'] = bcrypt($incomingFields['password']);
       $user = User::create($incomingFields);
        Auth::login($user);
        return redirect ('/dashboard');
    }
}
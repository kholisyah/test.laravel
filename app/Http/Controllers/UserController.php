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
            'loginname' =>'required',
             'loginpassword' =>'required'
        ]);
        if (Auth::attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->$request->session()->regenerate();
        }
        return redirect('/home');
    }
    public function logout(){
        Auth::logout();
        return redirect('/home');
    }
    public function register (Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4', 'max:8']
        ]);
        $$incomingFields['password'] = bcrypt($incomingFields['password']);
       $user = User::create($incomingFields);
        Auth::login($user);
        return redirect ('/home');
    }
}

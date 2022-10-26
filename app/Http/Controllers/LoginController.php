<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index',[
            "title"=> "Login"
        ]);
    }

    // VALIDASI DATA LOGIN
    // SIMPAN KE SEBUAH VARIABEL BEBAS
    public function login(Request $request){
        $credentials = $request->validate([
            'email'=> 'email:dns|required',
            'password'=>'required'
        ]);
    
        // CEK APAKAH DATA YANG DIINPUT BENAR
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Gagal');

    }

    // FUNGSI UNTUK LOGOUT
    // LIHAT DI DOKUMENTASI LARAVEL, AUTHENTICATION -> LOGOUT
    public function logout(Request $request){
        Auth::logout(); 
        $request->session()->invalidate();    
        $request->session()->regenerateToken();    
        return redirect('/');
    }
}

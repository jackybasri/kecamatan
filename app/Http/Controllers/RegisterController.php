<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
            "title"=> "Register"
        ]);
    }

    // TANGKAP SELURUH INPUTAN USER
    // LAKUKAN VALIDASI DAN TETAPKAN RULE
    // SIMPAN KE VARIABEL (PENAMAAN VARIABEL BEBAS)

    public function store(Request $request){
        $data =$request -> validate([
            'name'=> 'required|max:255',
            'username'=> 'required|min:3|max:255|unique:users',
            'email'=> 'required|email:dns|unique:users',
            'password'=>'required|min:7'
        ]);

        // SETELAH DATA DIVALIDASI, ENKRIPSI PASSWORD
        // $data['password'] = bcrypt($data['password']);
        $data['password']= Hash::make($data['password']);

        User::create($data);

        // $request->session()->flash('status', 'Pendaftaran Berhasil, silakan login');

        // APABILA BERHASIL, REDIRECT KE HALAMAN LOGIN
        return redirect('/login');
    }


}

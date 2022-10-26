<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TambahBeritaController extends Controller
{
    public function create(){
        return view('dashboard.berita.create');
    }
}

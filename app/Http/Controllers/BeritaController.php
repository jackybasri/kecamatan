<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    
    public function index(){

        return view('berita.berita',[
            "title"=> "Berita",

            // PANGGIL MODEL BERITA
            // LATEST : UNTUK MENGURUTKAN DARI YANG TERAKHIR DIPOSTING
            // FILTER : UNTUK MEMANGGIL FUNGSI SCOPEFILTER (QUERY PENCARIAN)
            // PAGINATE : UNTUK MENAMPILKAN ITEM JUMLAH TERTENTU
            "post" =>Berita::where('status_id','1')->where('daerah_id', '1')->latest()->get(),
            "berita"=>Berita::where('status_id','1')->where('daerah_id','1')->latest()->get()
        ]);
    }

    public function show(Berita $post){
        
        return view('berita.berita1',[
            "title"=> "Single Post",
            "post"=> $post,
            
        ]);
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Destinasi_kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('dashboard.destinasi.index',[
            'title'=> 'Destinasi',
            'post'=> Destinasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.destinasi.create',[
            'title'=> 'Destinasi',
            'categories'=> Destinasi_kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDASI DATA YANG DIINPUT USER
        $validatedData = $request->validate([
            'judul' => 'required|max:300',
            'isi'=> 'required',
            'image'=> 'image|file|max:2000',
            'destinasi_kategori_id'=> 'required',
            'slug'=> 'required|unique:destinasis',
            
        ]);

        // JIKA USER MEMASUKKAN FILE GAMBAR
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('gambar-destinasi');
        }
        
        // MASUKKAN USER_ID
        $validatedData['user_id']=auth()->user()->id;        
        $validatedData['daerah_id']=auth()->user()->daerah_id;
        
        // MASUKKAN EXCERPT
        // GUNAKAN FUNGSI str::limit untuk mengambil dari isi berita secara otomatis
        $validatedData['excerpt']=Str::limit(strip_tags($validatedData['isi'], 200));
        
       
        
        // MASUKKAN KE DATABASE
        Destinasi::create($validatedData);
        return redirect('/dashboard')->with('success', 'Berita Berhasil Ditambahkan');
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function show(Destinasi $destinasi)
    {
        return 'jaha';
        return view('destinasi.destinasi1',[
            'title'=> 'Destinasi',
            'post'=> $destinasi::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Destinasi $destinasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destinasi $destinasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destinasi  $destinasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destinasi $destinasi)
    {
        //
    }
}

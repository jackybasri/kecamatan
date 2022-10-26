<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Http\Requests\StoreProfilRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daerah = auth()->user()->daerah->id;
        return view('dashboard.profil.index',[
            'title'=> 'Profil Kecamatan',
            'profils'=> Profil::all(),
            'profil'=> Profil::where('daerah_id',$daerah)->get()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfilRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfilRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(Profil $profil)
    {
        return view('dashboard.profil.show',[
            'title'=> 'Profil',
            'post'=> $profil
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(Profil $profil)
    {
              
        return view('dashboard.profil.edit',[
            'title'=> 'Edit Profil',
            'profil'=> $profil
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfilRequest  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {
       
        $rules = [
            'judul' => 'required|max:300',
            'isi'=> 'required',
            'image'=> 'image|file|max:2000',
            
            
        ];

        if($request->slug != $profil->slug){
            $rules['slug'] = 'required|unique:beritas';
        }

        $validatedData = $request -> validate($rules);


        // UNTUK MENGUPLOAD GAMBAR YANG BARU PADA MENU EDIT
        if($request->file('image')){

            // JIKA ADA GAMBAR YANG LAMA, HAPUS GAMBAR LAMA
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('gambar-profil');
        }

        $validatedData['user_id']=auth()->user()->id;

        
        $validatedData['excerpt']=Str::limit(strip_tags($validatedData['isi'], 200));
      
        Profil::where('id', $profil->id)->update($validatedData);
        return redirect('/dashboard/profil')->with('success', 'Profil Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profil $profil)
    {
        //
    }
}

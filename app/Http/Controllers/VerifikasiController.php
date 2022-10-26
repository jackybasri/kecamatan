<?php
// CONTROLLER UNTUK BERITA DI DASHBOARD MENGGUNAKAN RESOURCE
// TERKONEKSI DENGAN MODEL BERITA
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use App\Models\Status;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VerifikasiController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // QUERY BERITA YANG DIPOST OLEH USER YANG SEDANG LOGIN
        
        return view('dashboard.berita.index',[
            'berita'=> Berita::where('user_id', auth()->user()->id)->get(),
            'posts'=> Berita::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    public function create()
    {
        return view('dashboard.berita.create',[
            'categories'=> Category::all()
        ]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    // UNTUK MENYIMPAN DATA KE DATABASE
     public function store(Request $request)
    {
        

        // VALIDASI DATA YANG DIINPUT USER
        $validatedData = $request->validate([
            'judul' => 'required|max:300',
            'isi'=> 'required',
            'image'=> 'image|file|max:2000',
            'category_id'=> 'required',
            'slug'=> 'required|unique:beritas'
        ]);

        // JIKA USER MEMASUKKAN FILE GAMBAR
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('gambar-berita');
        }
        
        // MASUKKAN USER_ID
        $validatedData['user_id']=auth()->user()->id;

        // MASUKKAN EXCERPT
        // GUNAKAN FUNGSI str::limit untuk mengambil dari isi berita secara otomatis
        $validatedData['excerpt']=Str::limit(strip_tags($validatedData['isi'], 200));
        
        // return $validatedData;
        
        // MASUKKAN KE DATABASE
        Berita::create($validatedData);

        return redirect('/dashboard/berita')->with('success', 'Berita Berhasil Ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //  return $berita;   
         return view('dashboard.berita.show',[
            'title' => 'single',
            'berita'=> $berita
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        return view('dashboard.berita.verif',[
            'title'=> 'Edit Berita',
            'berita'=> $berita,
            'categories'=> Category::all(),
            'status'=> Status::all()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        // $rules = [
        //     'judul' => 'required|max:300',
        //     'isi'=> 'required',
        //     'image'=> 'image|file|max:2000',
        //     'category_id'=> 'required',
        //     // 'status_id'=>'required'
            
        // ];

        // if($request->slug != $berita->slug){
        //     $rules['slug'] = 'required|unique:beritas';
        // }

        // $validatedData = $request -> validate($rules);


        // // UNTUK MENGUPLOAD GAMBAR YANG BARU PADA MENU EDIT
        // if($request->file('image')){

        //     // JIKA ADA GAMBAR YANG LAMA, HAPUS GAMBAR LAMA
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $validatedData['image'] = $request->file('image')->store('gambar-berita');
        // }

        // $validatedData['user_id']=auth()->user()->id;

        
        // $validatedData['excerpt']=Str::limit(strip_tags($validatedData['isi'], 200));
        $validatedData['status_id']=1;
        
        // return $validatedData;
        
        // MASUKKAN KE DATABASE
        Berita::where('id', $berita->id)->update($validatedData);


        return redirect('/dashboard/berita')->with('success', 'Berita Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Berita $berita)
    {
        if($berita->image){
            Storage::delete($berita->image);
        }
        Berita::destroy($berita->id);
        return redirect('/dashboard/berita')->with('success','Berita berhasil dihapus');   
    }

    // public function checkSlug(Request $request){
    //     $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
    //     return response()-> json(['slug'=> $slug]);
    // }

    // public function delete($id){
    //     DB::table('beritas')->where('id', $id)->delete();
    //     return redirect('/dashboard/berita');
    // }
   

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->title);
        return response()->json(['slug' =>$slug]);
    }

    public function verifikasi(Berita $berita)
    {
        $validatedData['status_id']=1;
        
        // return $validatedData;
        
        // MASUKKAN KE DATABASE
        Berita::where('id', $berita->id)->update($validatedData);


        return redirect('/dashboard/berita')->with('success', 'Berita Berhasil Diupdate');
    }
       

}

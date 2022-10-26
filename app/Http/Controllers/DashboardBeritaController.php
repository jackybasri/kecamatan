<?php
// CONTROLLER UNTUK BERITA DI DASHBOARD MENGGUNAKAN RESOURCE
// TERKONEKSI DENGAN MODEL BERITA
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Category;
use App\Models\Status;
use App\Models\Daerah;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardBeritaController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    // UNTUK MENAMPILKAN DAFTAR BERITA
    public function index()
    {
        
        // QUERY BERITA YANG DIPOST OLEH USER YANG SEDANG LOGIN
        $daerah = auth()->user()->daerah['id'];        
        return view('dashboard.berita.index',[          
            'post'=> Berita::whereNot('status_id', 2)->where('daerah_id',$daerah)->orderBy('updated_at','desc')->get(),
            'posts'=> Berita::whereNot('status_id',2)->orderBy('updated_at', 'desc')->get()
        ]);
    }

    // UNTUK MENAMPILKAN BERITA SAYA
    public function index2()
    {
        
        // QUERY BERITA YANG DIPOST OLEH USER YANG SEDANG LOGIN
        $daerah = auth()->user()->daerah['id'];
        return view('dashboard.berita.mypost',[
            'berita'=> Berita::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get(),
            
        ]);
    }

    // UNTUK MENAMPILKAN HALAMAN DASHBOARD
    public function index3()
    {
        
        // QUERY BERITA YANG DIPOST OLEH USER YANG SEDANG LOGIN
        $daerah = auth()->user()->daerah->id;
        return view('dashboard.index',[
            "beritaAll" => Berita::all(),
            "tayangAll"=> Berita::where('status_id',1),
            "terkirimAll"=> Berita::where('status_id',3),
            "tolakAll"=> Berita::where('status_id',5),
            "draftAll"=> Berita::where('status_id',2),
            "revisiAll"=> Berita::where('status_id',4),
            "berita"=> Berita::where('daerah_id',$daerah),
            "tayang"=> Berita::where('daerah_id',$daerah)->where('status_id','1'),
            "terkirim"=> Berita::where('daerah_id',$daerah)->where('status_id','3'),
            "tolak"=> Berita::where('daerah_id',$daerah)->where('status_id','5'),
            "draft"=> Berita::where('daerah_id',$daerah)->where('status_id','2'),
            "revisi"=> Berita::where('daerah_id',$daerah)->where('status_id','4')
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
            'slug'=> 'required|unique:beritas',
            
        ]);

        // JIKA USER MEMASUKKAN FILE GAMBAR
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('gambar-berita');
        }
        
        // MASUKKAN USER_ID
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['daerah_id']=auth()->user()->daerah_id;
        
       

        // MASUKKAN EXCERPT
        // GUNAKAN FUNGSI str::limit untuk mengambil dari isi berita secara otomatis
        $validatedData['excerpt']=Str::limit(strip_tags($validatedData['isi'], 200));
        
       
        
        // MASUKKAN KE DATABASE
        Berita::create($validatedData);

        return redirect('/dashboard/mypost')->with('success', 'Berita Berhasil Ditambahkan');
        
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

    // MEMANGGIL HALAMAN EDIT BERITA
    public function edit(Berita $berita)
    {
        return view('dashboard.berita.edit',[
            'title'=> 'Edit Berita',
            'berita'=> $berita,
            'categories'=> Category::all(),
            'status'=> Status::all()

        ]);
    }

    // MENAMPILKAN HALAMAN FORM REVISI BERITA
    public function alasan(Berita $berita)
    {
        return view('dashboard.berita.revisi',[
            'title'=> 'Edit Berita',
            'berita'=> $berita,
            'categories'=> Category::all(),
            'status'=> Status::all()

        ]);
    }

    // MENAMPILKAN ALASAN REVISI 
    public function alasan2(Berita $berita){
        return view('dashboard.berita.revisi2',[
            'title' => 'Revisi',
            'revisi'=> $berita->revisi
        ]);
    }

    // MENAMPILKAN FORM UNTUK MENOLAK BERITA
    public function reject(Berita $berita)
    {   
        
        return view('dashboard.berita.reject',[
            'title'=> 'Pembatalan Berita',
            'berita'=> $berita,
            'categories'=> Category::all(),
            'status'=> Status::all()

        ]);
    }

    // FUNGSI UNTUK MENGGANTI STATUS BERITA DI DATABASE MENJADI DITOLAK
    public function reject2(Request $request, Berita $berita)
    {
        $rules = [
          'reject'=> 'required'
            
        ];        
        $validatedData = $request -> validate($rules);

        $validatedData['status_id']=5;        
        
        // MASUKKAN KE DATABASE
        Berita::where('id', $berita->id)->update($validatedData);
        return redirect('/dashboard/berita')->with('success', 'Berita Berhasil Diupdate');
    }

    // MENAMPILKAN HALAMAN ALASAN PENOLAKAN
    public function reject3(Berita $berita){
        
        return view('dashboard.berita.reject2',[
            'title' => 'Ditolak',
            'reject'=> $berita->reject
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
        $rules = [
            'judul' => 'required|max:300',
            'isi'=> 'required',
            'image'=> 'image|file|max:2000',
            'category_id'=> 'required',
            
        ];

        if($request->slug != $berita->slug){
            $rules['slug'] = 'required|unique:beritas';
        }

        $validatedData = $request -> validate($rules);


        // UNTUK MENGUPLOAD GAMBAR YANG BARU PADA MENU EDIT
        if($request->file('image')){

            // JIKA ADA GAMBAR YANG LAMA, HAPUS GAMBAR LAMA
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('gambar-berita');
        }

        $validatedData['user_id']=auth()->user()->id;

        
        $validatedData['excerpt']=Str::limit(strip_tags($validatedData['isi'], 200));
      
        Berita::where('id', $berita->id)->update($validatedData);
        return redirect('/dashboard/berita')->with('success', 'Berita Berhasil Diupdate');
    }

    public function update2(Request $request, Berita $berita)
    {
     
        $validatedData['status_id']=1;
       
        Berita::where('id', $berita->id)->update($validatedData);
        return redirect('/dashboard/berita')->with('success', 'Berita Berhasil Diupdate');
    }

    public function kirim(Request $request, Berita $berita)
    {
     
        $validatedData['status_id']=3;
        
        // return $validatedData;
        
        // MASUKKAN KE DATABASE
        Berita::where('id', $berita->id)->update($validatedData);


        return redirect('/dashboard/mypost')->with('success', 'Berita Berhasil Diupdate');
    }
    public function revisi(Request $request, Berita $berita)
    {
        $rules = [           
            'revisi'=> 'required'
            
        ];
        $validatedData = $request -> validate($rules);     
        $validatedData['status_id']=4;      
        
        
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

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Berita::class, 'slug', $request->judul);
        return response()->json(['slug' =>$slug]);
    }

    // UNTUK VERIFIKASI BERITA
    public function verifikasi(Berita $berita)
    {
        $validatedData['status_id']=1;               
        
        
        // MASUKKAN KE DATABASE
        Berita::where('id', $berita->id)->update($validatedData);
        return redirect('/dashboard/berita')->with('success', 'Berita Berhasil Diupdate');
    }
       

}


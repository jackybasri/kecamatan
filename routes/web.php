<?php

use App\Models\User;
use App\Models\Berita;
use App\Models\Profil;
use App\Models\Category;
use App\Models\Destinasi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\DestinasiiController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\TambahBeritaController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\BeritaDashboardController;
use App\Http\Controllers\DashboardBeritaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index1',[
        "title" => "Home",
        'post'=> Berita::whereNot('status_id','2')->orderBy('updated_at','desc')->get(),
        'profil'=> Profil::all()
    ]);
});

Route::get('/home', function () {
    return view('home',["title" => "Home"]);
});

Route::get('/berita', [BeritaController::class,'index']);
Route::resource('/sejarah', SejarahController::class);
Route::resource('/destinasi', DestinasiiController::class);
Route::get('/destinasi/{destinasi:slug}', [DestinasiiController::class,'show']);
Route::resource('dashboard/destinasi',DestinationController::class)->middleware('is_admin');
Route::resource('dashboard/profil', ProfilController::class);

// Route::resource('dashboard/edit', ProfilController::class);
// Route::get('/dashboard/profil', [ProfilController::class,'index']);
// Route::get('/dashboard/profil/{profil:slug}/edit', [ProfilController::class,'edit']);
// Route::post('/dashboard/profil/{profil:slug}', [ProfilController::class,'update'])->middleware('auth');


// HALAMAN LOGIN HANYA BISA DIAKSES OLEH USER YANG BELUM LOGIN (GUEST)
// KASIH NAMA ROUTE LOGIN ->nama('login')
Route::get('/login', [LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class,'login']);
Route::post('/logout', [LoginController::class,'logout']);

// SETELAH LOGIN BERHASIL, ARAHKAN KE HALAMAN DASHBOARD
// HALAMAN DASHBOARD HANYA BISA DIAKSES OLEH USER YANG SUDAH LOGIN (AUTH)
// Route::get('/dashboard', function(){
//     return view('dashboard.index',[
//         "berita" => Berita::all(),
//         "tayang"=> Berita::where('status_id',1),
//         "terkirim"=> Berita::where('status_id',3),
//         "tolak"=> Berita::where('status_id',5),
//         "draft"=> Berita::where('status_id',2),
//         "revisi"=> Berita::where('status_id',4)
//     ]);
// })->middleware('auth');

Route::get('/dashboard', [DashboardBeritaController::class,'index3'])->middleware('auth');

// HALAMAN REGISTER HANYA BISA DIAKSES USER YANG BELUM LOGIN ('guest)
Route::get('/register', [RegisterController::class,'index'])->middleware(('guest'));
Route::post('/register', [RegisterController::class,'store']);

// UNTUK SLUG
// Route::get('/dashboard/berita/checkSlug', [DashboardBeritaController::class, 'checkSlug']);


// ROUTE UNTUK DASHBOARD BERITA CONTROLLER DENGAN RESOURCE
// HANYA BISA DIAKSES OLEH USER YANG SUDAH LOGIN ('auth)
// Route::get('/dashboard/berita', [DashboardBeritaController::class,'delet']);
// Route::get('/dashboard/berita/{post:id}', [DashboardBeritaController::class, 'delete']);


Route::get('/dashboard/news/checkSlug', [DashboardBeritaController::class, 'checkSlug'])->name('slug')->middleware('auth');

// ROUTE UNTUK KIRIM, DELETE, EDIT BERITA
Route::resource('/dashboard/beritas', DashboardBeritaController::class)->middleware('auth');
Route::get('/dashboard/berita/{berita:slug}',[DashboardBeritaController::class, 'show'] )->middleware('auth');
Route::get('/dashboard/berita/',[DashboardBeritaController::class, 'index'] )->middleware('auth');
Route::get('/dashboard/mypost/',[DashboardBeritaController::class, 'index2'] )->middleware('reporter');
Route::get('/dashboard/beritas/create',[DashboardBeritaController::class, 'create'] )->middleware('reporter');
Route::post('/dashboard/berita/{berita:slug}',[DashboardBeritaController::class, 'update'] )->middleware('reporter');
Route::post('/dashboard/publish/{berita:slug}',[DashboardBeritaController::class, 'update2'] )->middleware('verifikator');
Route::post('/dashboard/kirim/{berita:slug}',[DashboardBeritaController::class, 'kirim'] )->middleware('reporter');

// ROUTE UNTUK VERIFIKASI BERITA
Route::post('/dashboard/revisi/{berita:slug}',[DashboardBeritaController::class, 'revisi'] )->middleware('verifikator');
Route::get('/dashboard/revisi/{berita:slug}/edit',[DashboardBeritaController::class, 'alasan'] )->middleware('verifikator');
Route::get('/dashboard/revisi/{berita:slug}/alasan',[DashboardBeritaController::class, 'alasan2'] )->middleware('reporter');
Route::get('/dashboard/reject/{berita:slug}/edit',[DashboardBeritaController::class, 'reject'] )->middleware('verifikator');
Route::get('/dashboard/reject/{berita:slug}/alasan',[DashboardBeritaController::class, 'reject3'] )->middleware('auth');
Route::post('/dashboard/reject/{berita:slug}',[DashboardBeritaController::class, 'reject2'] )->middleware('verifikator');

// UNTUK MENAMBAH KATEGORI
Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')->middleware('is_admin');

// Route::resource('/dashboard/destinasi', DestinasiController::class)->middleware('is_admin');



// UNTUK MENGELOLA USER
Route::resource('/dashboard/users', UserAdminController::class)->middleware('is_admin2');
Route::post('/dashboard/user', [UserAdminController::class, 'store2'])->middleware('is_admin2');

// UNTUK GANTI PASSWORD
Route::get('/dashboard/password',[ChangePassword::class, 'Cpass'])->middleware('auth')->name('change.password');
Route::post('/dashboard/update',[ChangePassword::class, 'change'])->middleware('auth')->name('password.update');




// HALAMAN SINGLE POST
Route::get('/berita/{post:slug}', [BeritaController::class, 'show']);

// MENAMPILKAN SEMUA KATEGORI
Route::get('categories', function(){
    return view('categories',[
        "title" => 'Kategori',
        "categories"=> Category::all()
    ]);
});

// MENAMPILKAN PER KATEGORI BERITA
Route::get('/categories/{category:slug}', function(Category $category){
    return view('berita.berita', 
    [
        "title" => "Kategori : $category->judul",
        "post" => $category->berita->load('category', 'user')
    
    ]
   
);
});

// MENAMPILKAN BERITA PER PENULIS
Route::get('/penulis/{User:username}', function(User $User){
    return view('berita.berita', 
    [
        "title" => "Penulis : $User->name",
        "post" => $User->berita->load('User','Category')
        
    ]
   
);
});




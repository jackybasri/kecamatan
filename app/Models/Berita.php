<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Berita extends Model
{
    use HasFactory;
    use Sluggable;

    // UNTUK MEMBUAT SLUG
    public function sluggable():array
    {
         return [
             'slug' => [
                 'source'=> 'judul'
             ] 
         ];

     }
    
    
    
    protected $guarded = ['id'];

    // UNTUK PENCARIAN BERITA
    public function scopeFilter($query){
         if(request('search')){
           return $query->where('judul','like', '%'. request('search'). '%')
                  ->orWhere('isi','like', '%'. request('search').'%');
        }
    }

    // UNTUK EAGER LOADING
    protected $with = ['category', 'user'];

    // MENGHUBUNGKAN MODEL BERITA DENGAN CATEGORY
    public function Category(){
        return $this->belongsTo(Category::class);
    }

    // MENGHUBUNGKAN MODEL BERITA DENGAN USER
    public function User(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Status(){
        return $this->belongsTo(Status::class);
    }
    public function Daerah(){
        return $this->belongsTo(Daerah::class);
    }

    

    public function getRouteKeyName()
    {
        return 'slug';
    }

    
}

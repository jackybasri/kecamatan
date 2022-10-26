<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    protected $guarded = ['id'];

    use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function Destinasi_kategori(){
        return $this->belongsTo(Destinasi_kategori::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function daerah(){
        return $this->belongsTo(Daerah::class);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Berita;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        Berita::factory(30)->create();

        User::create([
            'name'=> 'Camat',
            'username'=>'camatrengat',
            'email'=> 'camat@rengat.inhukab.go.id',
            'password'=> bcrypt('1234567')
        ]);

        User::create([
            'name'=> 'Admin',
            'username'=> 'adminrengat',
            'email'=> 'admin@rengat.inhukab.go.id',
            'password'=> bcrypt('1234567')
        ]);

        Category::create([
            'judul'=> 'Kriminal',
            'slug'=> 'kriminal',
            
        ]);

        Category::create([
            'judul'=> 'Ekonomi',
            'slug'=> 'ekonomi',
            
        ]);

        Category::create([
            'judul'=> 'Politik',
            'slug'=> 'politik',
            
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}



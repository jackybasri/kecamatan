<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'judul'=>$this->faker->sentence(mt_rand(2,5)),
            'slug'=>$this->faker->slug(),
            'isi' =>$this->faker->paragraphs(mt_rand(5,10)),
            'excerpt'=>$this->faker->paragraph(),
            'user_id'=> 1,
            'category_id'=> 1
        ];
    }
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Category::factory()->create();

        \App\Models\Product::factory()
        ->has(\App\Models\Image::factory()->count(3))
        ->count(3)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ["Youtube", "Books", "Musics", "Movies", "Comics"];

        for ($index = 0; $index < count($categories); $index++) {
            Category::query()->create([
                'name' => $categories[$index],
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'музыка',
            'развлечения',
            'вдохновения',
            'мемы'
        ];

        foreach ($genres as $genre) {
            Genre::query()->create([
                'name' => $genre,
            ]);
        }

    }
}

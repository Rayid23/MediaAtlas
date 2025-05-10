<?php

namespace Database\Seeders;

use App\Models\AuthorContent;
use App\Models\ContentGenres;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            AuthorSeeder::class,
            CategorySeeder::class,
            ContentSeeder::class,
            GenreSeeder::class
        ]);

        for ($index = 0; $index < 10; $index++) {
             ContentGenres::query()->create([
                'content_id' => rand(1, 10),
                'genre_id' => rand(1, 10),
             ]);
        }

        for ($index = 0; $index < 10; $index++) {
             AuthorContent::query()->create([
                'author_id' => rand(1, 10),
                'content_id' => rand(1, 10),
             ]);
        }
    }
}

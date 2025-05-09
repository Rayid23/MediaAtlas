<?php

namespace  Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Authors;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Authors::query()->create([
            "name" => "Евгение Стрекоза",
            "url" => "https://litnet.com/ru/mariya-luneva-u244464"
        ]); //categories:books

        Authors::query()->create([
            'name' => "Enjoykin",
            'url' => 'https://www.youtube.com/@Enjoykin'
        ]); //{musics} categories:video

        Authors::query()->create([
            'name' => 'RomNero',
            'url' => 'https://www.youtube.com/@RomNero',
        ]); // {programming} categories:video

        Authors::query()->create([
            'name' => 'Vlad Mishustin',
            'url' => 'https://www.youtube.com/@fakng-engineer'
        ]); //{programming} categories:video

        Authors::query()->create([
            'name' => 'Hacker School',
            'url' => 'https://www.youtube.com/@hackers666'
        ]); //{hack-programming} categories:video

        Authors::query()->create([
            'name' => 'Kinoman',
            'url' => 'https://www.youtube.com/@KinomanTrailers'
        ]); //{movies trailer} categories:video

        Authors::query()->create([
            "name" => "Мария Лунева",
            "url" => "https://litnet.com/ru/mariya-luneva-u244464"
        ]); //categories:books

        Authors::query()->create([
            "name" => "Амир Сунаев",
            "url" => "https://litnet.com/ru/mariya-luneva-u244464"
        ]); //categories:books

        Authors::query()->create([
            "name" => "Люся Лунева",
            "url" => "https://litnet.com/ru/mariya-luneva-u244464"
        ]); //categories:books

        Authors::query()->create([
            "name" => "Федя Лунеев",
            "url" => "https://litnet.com/ru/mariya-luneva-u244464"
        ]); //categories:books
    }
}

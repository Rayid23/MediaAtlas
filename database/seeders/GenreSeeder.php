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
            "Фантастика",
            "Фэнтези",
            "Приключения",
            "Ужасы",
            "Детектив",
            "Мистика",
            "Научная фантастика",
            "Романтика",
            "Комедия",
            "Драма",
            "Триллер",
            "Исторический роман",
            "Классика",
            "Современная проза",
            "Поэзия",
            "Эссеистика",
            "Научно-популярная литература",
            "Биография",
            "Автобиография",
            "Программирование",
            "Научная литература",
            "Психология",
            "Саморазвитие",
            "Кулинария",
            "Здоровье",
            "Спорт",
            "Путешествия",
            "Искусство",
            "Философия",
            "Социология",
            "Экономика",
            "Политология",
            "История",
            "Литературная критика",
            "Музыка",
            "Кино",
            "Кино Трейлеры"
        ];

        foreach ($genres as $genre) {
            Genre::query()->create([
                'name' => $genre,
            ]);
        }

    }
}

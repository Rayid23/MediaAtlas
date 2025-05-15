<?php

namespace Database\Seeders;

use App\Models\AuthorContent;
use App\Models\ContentGenres;
use App\Models\User;
use App\Models\Content;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Routing\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Madiyor',
            'email' => 'admin@example.com',
            'password' => bcrypt('Mini1212'),
        ]); // Создание пользователя с именем Madiyor и паролем Mini1212

        $this->call([ // Вызов сидеров
            AuthorSeeder::class, // Создание авторов
            CategorySeeder::class, // Создание категорий
            GenreSeeder::class // Создание жанров
        ]);

        Content::create([
            'title' => 'Enjoykin - Стартуем',
            'description' => 'Легендарная музыкаа Enjoykin ))',
            'url' => 'https://www.youtube.com/embed/9u9cJnq4cNk?si=9UfUknUmLlTDUaVU',
            'category_id' => 1
        ]);

        for($i = 1; $i <= 4; $i++){
            ContentGenres::query()->create([
                'content_id' => 1,
                'genre_id' => $i,
            ]);
        }

        AuthorContent::query()->create([
            'author_id' => 2,
            'content_id' => 1,
        ]);
             

        Role::create(['name' => 'super-admin']); // Создание роли супер админа
        Role::create(['name' => 'admin']); // Создание роли админа
        Role::create(['name' => 'moderator']); // Создание роли модератора
        Role::create(['name' => 'user']); // Создание роли пользователя

        $routes = app('router')->getRoutes(); // Получение всех маршрутов

        foreach ($routes as $route) { // Получение всех маршрутов

            $key = $route->getName(); // Получение имени маршрута

            if ($key && !str_starts_with($key,'telescope') && $key !== 'storage.local'){ // Проверка имени маршрута
                $name = ucfirst(str_replace('.', '-', $key)); // Преобразование имени маршрута
                Permission::create(['name' => $name, 'guard_name' => 'web']); // Создание разрешения
            }
        }

        $user = User::query()->first(); // Взятие Первого созданого пользователя

        $user->assignRole('super-admin'); // Назначение роли супер админа
        $user->givePermissionTo(Permission::all()); // Назначение всех прав супер администратору
    }
}

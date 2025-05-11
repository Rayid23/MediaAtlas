<?php

namespace Database\Seeders;

use App\Models\AuthorContent;
use App\Models\ContentGenres;
use App\Models\User;
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
            ContentSeeder::class, // Создание контента
            GenreSeeder::class // Создание жанров
        ]);

        for ($index = 0; $index < 10; $index++) {
             ContentGenres::query()->create([
                'content_id' => rand(1, 10),
                'genre_id' => rand(1, 10),
             ]);
        } // Создание связи между контентом и жанрами

        for ($index = 0; $index < 10; $index++) {
             AuthorContent::query()->create([
                'author_id' => rand(1, 10),
                'content_id' => rand(1, 10),
             ]);
        } // Создание связи между авторами и контентом

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

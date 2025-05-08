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
        Authors::factory(10)->create();
    }
}

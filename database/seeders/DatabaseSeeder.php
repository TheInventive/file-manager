<?php

namespace Database\Seeders;

use App\Models\Category;
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
        //$this->call(UserSeeder::class);
        //$this->call(CategorySeeder::class);
        //$this->call(FilesSeeder::class);
        //$this->call(AccessSeeder::class);

        Category::factory(1)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Files;
use Illuminate\Database\Seeder;

class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Files::factory(10)->create();
    }
}

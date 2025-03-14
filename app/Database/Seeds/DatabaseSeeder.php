<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PrioritySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(SubtaskSeeder::class);
    }
}

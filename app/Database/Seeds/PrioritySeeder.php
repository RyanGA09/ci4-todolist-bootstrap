<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PrioritySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['priority_level' => 1, 'description' => 'Sangat Mendesak', 'created_at' => date('Y-m-d H:i:s')],
            ['priority_level' => 2, 'description' => 'Penting', 'created_at' => date('Y-m-d H:i:s')],
            ['priority_level' => 3, 'description' => 'Sedang', 'created_at' => date('Y-m-d H:i:s')],
            ['priority_level' => 4, 'description' => 'Biasa', 'created_at' => date('Y-m-d H:i:s')],
            ['priority_level' => 5, 'description' => 'Bisa Ditunda', 'created_at' => date('Y-m-d H:i:s')]
        ];

        $this->db->table('priorities')->insertBatch($data);
    }
}

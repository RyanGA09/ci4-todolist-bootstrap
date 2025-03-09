<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Pekerjaan', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Belajar', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Hobi', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Lainnya', 'created_at' => date('Y-m-d H:i:s')]
        ];

        $this->db->table('categories')->insertBatch($data);
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PrioritySeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('priorities');

        // Cek apakah tabel priorities sudah berisi data
        if ($builder->countAllResults() > 0) {
            echo "Priorities table already seeded.\n";
            return;
        }

        $data = [
            ['id' => 1, 'name' => 'Sangat Rendah'],
            ['id' => 2, 'name' => 'Rendah'],
            ['id' => 3, 'name' => 'Menengah'],
            ['id' => 4, 'name' => 'Tinggi'],
            ['id' => 5, 'name' => 'Sangat Tinggi'],
        ];

        $builder->insertBatch($data);
    }

}

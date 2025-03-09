<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'       => 'Menyelesaikan laporan',
                'description' => 'Menyusun laporan keuangan bulanan',
                'due_date'    => '2024-03-15',
                'status'      => 'Belum Selesai',
                'category_id' => 1,
                'created_at'  => date('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Belajar CodeIgniter 4',
                'description' => 'Memahami konsep dasar dan membuat CRUD',
                'due_date'    => '2024-03-20',
                'status'      => 'Belum Selesai',
                'category_id' => 2,
                'created_at'  => date('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Olahraga Pagi',
                'description' => 'Jogging selama 30 menit di taman',
                'due_date'    => '2024-03-10',
                'status'      => 'Selesai',
                'category_id' => 3,
                'created_at'  => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}

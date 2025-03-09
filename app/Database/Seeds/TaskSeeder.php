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
                'due_date'    => '2024-03-15 15:30:00',
                'status'      => 'Not Completed',
                'category_id' => 1,
                'priority_id' => 1, // Sangat Mendesak
                'created_at'  => date('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Belajar CodeIgniter 4',
                'description' => 'Memahami konsep dasar dan membuat CRUD',
                'due_date'    => '2024-03-15 15:30:00',
                'status'      => 'Not Completed',
                'category_id' => 2,
                'priority_id' => 2, // Penting
                'created_at'  => date('Y-m-d H:i:s')
            ],
            [
                'title'       => 'Olahraga Pagi',
                'description' => 'Jogging selama 30 menit di taman',
                'due_date'    => '2024-03-15 15:30:00',
                'status'      => 'Completed',
                'category_id' => 3,
                'priority_id' => 4, // Biasa
                'created_at'  => date('Y-m-d H:i:s')
            ]
        ];

        $this->db->table('tasks')->insertBatch($data);
    }
}

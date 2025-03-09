<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Pastikan tabel priorities memiliki data terlebih dahulu
        $this->call(PrioritySeeder::class);

        $tasks = [
            [
                'title'       => 'Menyelesaikan laporan',
                'description' => 'Menyusun laporan keuangan bulanan',
                'priority'    => 1, // Prioritas tertinggi (Sangat Rendah)
                'created_at'  => date('Y-m-d H:i:s'),
                'due_date'    => date('Y-m-d H:i:s', strtotime('+3 days')), // Tenggat 3 hari
                'status'      => 'Not Completed',
                'category_id' => 1
            ],
            [
                'title'       => 'Belajar CodeIgniter 4',
                'description' => 'Memahami konsep dasar dan membuat CRUD',
                'priority'    => 3, // Prioritas menengah
                'created_at'  => date('Y-m-d H:i:s'),
                'due_date'    => date('Y-m-d H:i:s', strtotime('+7 days')), // Tenggat 7 hari
                'status'      => 'Not Completed',
                'category_id' => 2
            ],
            [
                'title'       => 'Olahraga Pagi',
                'description' => 'Jogging selama 30 menit di taman',
                'priority'    => 5, // Prioritas tertinggi (Sangat Tinggi)
                'created_at'  => date('Y-m-d H:i:s'),
                'due_date'    => date('Y-m-d H:i:s', strtotime('+1 days')), // Tenggat 1 hari
                'status'      => 'Not Completed',
                'category_id' => 3
            ]
        ];

        $this->db->table('tasks')->insertBatch($tasks);
    }
}

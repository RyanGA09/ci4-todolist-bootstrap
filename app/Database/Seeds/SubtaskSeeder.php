<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubtaskSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['task_id' => 1, 'title' => 'Kumpulkan data transaksi', 'status' => 'Not Completed', 'created_at' => date('Y-m-d H:i:s')],
            ['task_id' => 1, 'title' => 'Buat laporan ringkasan', 'status' => 'Not Completed', 'created_at' => date('Y-m-d H:i:s')],
            ['task_id' => 2, 'title' => 'Pelajari dokumentasi CodeIgniter', 'status' => 'Completed', 'created_at' => date('Y-m-d H:i:s')],
            ['task_id' => 2, 'title' => 'Coba buat proyek kecil', 'status' => 'Not Completed', 'created_at' => date('Y-m-d H:i:s')],
            ['task_id' => 3, 'title' => 'Pemanasan sebelum jogging', 'status' => 'Completed', 'created_at' => date('Y-m-d H:i:s')],
        ];

        $this->db->table('subtasks')->insertBatch($data);
    }
}

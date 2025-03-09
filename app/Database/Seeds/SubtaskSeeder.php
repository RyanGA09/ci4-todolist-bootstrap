<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SubtaskSeeder extends Seeder
{
    public function run()
    {
        $subtasks = [
            // Subtasks untuk "Menyelesaikan laporan"
            [
                'task_id' => 1,
                'title' => 'Kumpulkan data keuangan', 
                'status' => 'Completed', 
                'created_at' => date('Y-m-d H:i:s')],
            [
                'task_id' => 1,
                'title' => 'Analisis laporan keuangan', 
                'status' => 'Not Completed', 
                'created_at' => date('Y-m-d H:i:s')],
            
            // Subtasks untuk "Belajar CodeIgniter 4"
            [
                'task_id' => 2,
                'title' => 'Pelajari konsep MVC',
                'status' => 'Completed', 
                'created_at' => date('Y-m-d H:i:s')],
            [
                'task_id' => 2,
                'title' => 'Buat aplikasi CRUD', 
                'status' => 'Not Completed', 
                'created_at' => date('Y-m-d H:i:s')],
            
            // Subtasks untuk "Olahraga Pagi"
            [
                'task_id' => 3, 
                'title' => 'Pemanasan sebelum jogging', 
                'status' => 'Completed', 
                'created_at' => date('Y-m-d H:i:s')],
            [
                'task_id' => 3, 
                'title' => 'Jogging 30 menit', 
                'status' => 'Completed', 
                'created_at' => date('Y-m-d H:i:s')]
        ];

        $this->db->table('subtasks')->insertBatch($subtasks);
    }
}

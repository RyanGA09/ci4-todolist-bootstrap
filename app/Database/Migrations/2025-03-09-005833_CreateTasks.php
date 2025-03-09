<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTasks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT', 
                'auto_increment' => true, 
                'unsigned' => true
            ],
            'title' => [
                'type' => 'VARCHAR', 
                'constraint' => 255, 
                'null' => false
            ],
            'description' => [
                'type' => 'TEXT', 
                'null' => true
            ],
            'due_date' => [
                'type' => 'DATE', 
                'null' => false
            ],
            'status' => [
                'type' => "ENUM('Not Completed', 'Completed')", 
                'default' => 'Not Completed'
            ],
            'category_id' => [
                'type' => 'INT', 
                'null' => true, 
                'unsigned' => true
            ],
            'created_at'  => [
                'type' => 'DATETIME', 
                'null' => true, // Ubah menjadi null agar bisa diisi oleh CodeIgniter
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('tasks');
    }

    public function down()
    {
        $this->forge->dropTable('tasks');
    }
}

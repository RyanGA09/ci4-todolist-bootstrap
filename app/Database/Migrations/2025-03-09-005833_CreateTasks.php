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
            'priority' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'null' => false,
                'default' => 3 // Default prioritas 3 (menengah)
            ],
            'created_at' => [
                'type' => 'DATETIME', 
                'null' => false, 
            ],
            'due_date' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'status' => [
                'type' => "ENUM('Not Completed', 'Completed')", 
                'default' => 'Not Completed'
            ],
            'category_id' => [
                'type' => 'INT', 
                'null' => true, 
                'unsigned' => true
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

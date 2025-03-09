<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSubtasks extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
                'unsigned' => true
            ],
            'task_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'status' => [
                'type' => "ENUM('Not Completed', 'Completed')",
                'default' => 'Not Completed'
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('task_id', 'tasks', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('subtasks');
    }

    public function down()
    {
        $this->forge->dropTable('subtasks');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateTasksAddPriority extends Migration
{
    public function up()
    {
        $this->forge->addColumn('tasks', [
            'priority_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
                'after' => 'category_id'
            ]
        ]);

        $this->forge->addForeignKey('priority_id', 'priorities', 'id', 'CASCADE', 'SET NULL');
    }

    public function down()
    {
        $this->forge->dropForeignKey('tasks', 'tasks_priority_id_foreign');
        $this->forge->dropColumn('tasks', 'priority_id');
    }
}

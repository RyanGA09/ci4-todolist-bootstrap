<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePriorities extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'priority_level' => [
                'type' => 'INT',
                'constraint' => 1,
                'unsigned' => true,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('priorities');
    }

    public function down()
    {
        $this->forge->dropTable('priorities');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePriorities extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => false,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('priorities');

        // Insert default priority levels
        $this->db->query("
            INSERT INTO priorities (id, name) VALUES
            (1, 'Sangat Rendah'),
            (2, 'Rendah'),
            (3, 'Menengah'),
            (4, 'Tinggi'),
            (5, 'Sangat Tinggi')
        ");
    }

    public function down()
    {
        $this->forge->dropTable('priorities');
    }
}

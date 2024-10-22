<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTransportsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, // Phải là UNSIGNED
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'driver_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'vehicle_number' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transports');
    }

    public function down()
    {
        $this->forge->dropTable('transports');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateRoomsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('rooms', [
            'capacity' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'default' => 1, // Sức chứa mặc định là 1 người/phòng
                'after' => 'price',
            ],
            'available_quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'default' => 10, // Số lượng phòng khả dụng mặc định
                'after' => 'capacity',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('rooms', ['capacity', 'available_quantity']);
    }
}

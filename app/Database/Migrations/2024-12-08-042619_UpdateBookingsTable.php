<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateBookingsTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('bookings', [
            'room_quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => false,
                'default' => 1, // Số phòng mặc định là 1
                'after' => 'participants',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('bookings', 'room_quantity');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddQuantityToRooms extends Migration
{
    public function up()
    {
        $this->forge->addColumn('rooms', [
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,  // Bạn có thể tùy chỉnh giá trị mặc định
                'after' => 'price'  // Tùy thuộc vị trí bạn muốn đặt cột này
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('rooms', 'quantity');
    }
}

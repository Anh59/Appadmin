<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageUrlToCustomers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('customers', [
            'image_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true, // Cho phép giá trị null
            ],
        ]);
    }

    public function down()
    {
        // Xóa cột nếu rollback
        $this->forge->dropColumn('customers', 'image_url');
    }
}

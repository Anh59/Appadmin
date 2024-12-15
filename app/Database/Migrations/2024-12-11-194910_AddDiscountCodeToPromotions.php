<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDiscountCodeToPromotions extends Migration
{
    public function up()
    {
        // Thêm các trường mới
        $this->forge->addColumn('promotions', [
            'discount_code' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => false,
            ],
            'discount_value' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => false,
            ],
            'applies_to_all_tours' => [
                'type' => 'BOOLEAN',
                'default' => 0,  // Mặc định là không áp dụng cho tất cả các tour
            ]
        ]);

        // Chỉnh sửa trường tour_id để có thể là NULL khi applies_to_all_tours = 1
        $this->forge->modifyColumn('promotions', [
            'tour_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,  // Allow null when applies_to_all_tours is 1
            ]
        ]);
    }

    public function down()
    {
        // Rollback các thay đổi
        $this->forge->dropColumn('promotions', 'discount_code');
        $this->forge->dropColumn('promotions', 'discount_value');
        $this->forge->dropColumn('promotions', 'applies_to_all_tours');
        $this->forge->modifyColumn('promotions', [
            'tour_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ]
        ]);
    }
}

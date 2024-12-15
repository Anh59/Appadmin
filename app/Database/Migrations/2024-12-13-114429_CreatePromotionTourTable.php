<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePromotionTourTable extends Migration
{
    public function up()
    {
        // Tạo bảng promotion_tour với khóa chính
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'promotion_id' => [
                'type' => 'INT',
                'constraint'     => 11,
                
            ],
            'tour_id' => [
                'type' => 'INT',
                'constraint'     => 11,
                'unsigned' => true,
            ],
        ]);

        // Đảm bảo có khóa chính cho bảng này
        $this->forge->addKey('id', true);

        // Thêm các khóa ngoại
        $this->forge->addForeignKey('promotion_id', 'promotions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tour_id', 'tours', 'id', 'CASCADE', 'CASCADE');

        // Tạo bảng
        $this->forge->createTable('promotion_tour');
    }

    public function down()
    {
        // Xóa bảng promotion_tour
        $this->forge->dropTable('promotion_tour');
    }
}

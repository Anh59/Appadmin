<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RemoveForeignKeyFromPromotions extends Migration
{
    public function up()
    {
        // Xóa khóa ngoại 'tour_id' trong bảng 'promotions'
        $this->forge->dropForeignKey('promotions', 'promotions_tour_id_foreign');
    }

    public function down()
    {
        // Nếu cần rollback, bạn có thể thêm lại khóa ngoại 'tour_id'
        $this->forge->addForeignKey('tour_id', 'tours', 'id', 'CASCADE', 'CASCADE');
    }
}

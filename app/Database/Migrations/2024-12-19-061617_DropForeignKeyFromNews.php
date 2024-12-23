<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropForeignKeyFromNews extends Migration
{
    public function up()
    {
        $this->forge->dropForeignKey('news', 'news_author_id_foreign');
    }

    public function down()
    {
        // Nếu muốn thêm lại khóa ngoại, sử dụng lệnh sau
        $this->forge->addForeignKey('author_id', 'users', 'id', 'CASCADE', 'CASCADE');
    }
}

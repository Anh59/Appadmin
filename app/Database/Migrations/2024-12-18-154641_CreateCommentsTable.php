<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        // Cập nhật bảng 'comments'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'news_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'customer_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'comment' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        
        // Thêm khóa chính và các khóa ngoại
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('news_id', 'news', 'id', 'CASCADE', 'CASCADE');  // Liên kết đến bảng news
        $this->forge->addForeignKey('customer_id', 'customers', 'id', 'CASCADE', 'CASCADE');  // Liên kết đến bảng customers
        $this->forge->createTable('comments');
    }

    public function down()
    {
        $this->forge->dropTable('comments');
    }
}

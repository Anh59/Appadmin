<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRepliesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'consultation_id' => [
                'type' => 'INT',
                'constraint' => 11,
                // Không thêm `unsigned` để phù hợp với bảng consultations
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true, // Phù hợp với bảng users
            ],
            'reply_message' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true); // Khóa chính
        $this->forge->addForeignKey('consultation_id', 'consultations', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('replies');
    }

    public function down()
    {
        $this->forge->dropTable('replies');
    }
}

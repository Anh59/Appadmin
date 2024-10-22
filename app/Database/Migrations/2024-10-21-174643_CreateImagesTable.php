<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateImagesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'unsigned' => true, // Đảm bảo rằng đây là unsigned
                'auto_increment' => true,
            ],
            'tour_id' => [
                'type' => 'INT',
                'unsigned' => true, // Đảm bảo rằng đây là unsigned
            ],
            'image_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
            ],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('tour_id', 'tours', 'id', 'CASCADE', 'CASCADE'); // Đảm bảo tham chiếu chính xác
    
        $this->forge->createTable('images');
    }
    
    public function down()
    {
        $this->forge->dropTable('images');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tour_id' => [
                'type' => 'INT',
                'unsigned' => true, // Đảm bảo đây là unsigned
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'cancellation' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'extra' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'image_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
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
        $this->forge->addForeignKey('tour_id', 'tours', 'id', 'CASCADE', 'CASCADE');
    
        $this->forge->createTable('rooms');
    }
    
    public function down()
    {
        $this->forge->dropTable('rooms');
    }
    
}

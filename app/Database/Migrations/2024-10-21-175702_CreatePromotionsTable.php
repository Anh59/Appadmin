<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePromotionsTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'auto_increment' => true,
        ],
        'tour_id' => [
            'type' => 'INT',
            'unsigned'       => true
        ],
        'promotion_details' => [
            'type' => 'TEXT',
        ],
        'start_date' => [
            'type' => 'DATE',
        ],
        'end_date' => [
            'type' => 'DATE',
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

    $this->forge->createTable('promotions');
}

public function down()
{
    $this->forge->dropTable('promotions');
}

}

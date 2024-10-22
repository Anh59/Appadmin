<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateReviewsTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'auto_increment' => true,
        ],
        'customer_id' => [
            'type' => 'INT',
            'unsigned'       => true
        ],
        'tour_id' => [
            'type' => 'INT',
            'unsigned'       => true
        ],
        'title' => [
            'type' => 'VARCHAR',
            'constraint' => 100,
        ],
        'content' => [
            'type' => 'TEXT',
        ],
        'rating' => [
            'type' => 'INT',
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
    $this->forge->addForeignKey('customer_id', 'customers', 'id', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('tour_id', 'tours', 'id', 'CASCADE', 'CASCADE');

    $this->forge->createTable('reviews');
}

public function down()
{
    $this->forge->dropTable('reviews');
}

}

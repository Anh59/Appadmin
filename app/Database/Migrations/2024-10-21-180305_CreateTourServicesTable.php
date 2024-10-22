<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTourServicesTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'tour_id' => [
            'type' => 'INT',
            'unsigned'       => true
        ],
        'service_id' => [
            'type' => 'INT',
        ],
        'quantity' => [
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

    $this->forge->addForeignKey('tour_id', 'tours', 'id', 'CASCADE', 'CASCADE');
    $this->forge->addForeignKey('service_id', 'services', 'id', 'CASCADE', 'CASCADE');

    $this->forge->createTable('tour_services');
}

public function down()
{
    $this->forge->dropTable('tour_services');
}

}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'customer_id' => [
                'type' => 'INT','unsigned'       => true
            ],
            'tour_id' => [
                'type' => 'INT',
                'unsigned'       => true,
            ],
            'participants' => [
                'type' => 'INT',
            ],
            'booking_date' => [
                'type' => 'DATE',
            ],
            'total_price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
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
        
        $this->forge->createTable('bookings');
    }
    
    public function down()
    {
        $this->forge->dropTable('bookings');
    }
    
}

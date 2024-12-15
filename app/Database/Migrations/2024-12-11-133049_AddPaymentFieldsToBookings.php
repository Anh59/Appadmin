<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPaymentFieldsToBookings extends Migration
{
    public function up()
    {
        $this->forge->addColumn('bookings', [
            'payment_method' => [
                'type' => 'ENUM',
                'constraint' => ['COD', 'PayPal', 'MoMo'],
                'default' => 'COD',
                'null' => false,
            ],
            'payment_status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'completed', 'failed'],
                'default' => 'pending',
                'null' => false,
            ],

        ]);
    }
    
    public function down()
    {
        $this->forge->dropColumn('bookings', ['payment_method', 'payment_status']);
    }
    
}

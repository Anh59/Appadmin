<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPaymentUpdatedAtToBookings extends Migration
{
    public function up()
{
    $this->forge->addColumn('bookings', [
        'payment_updated_at' => [
            'type' => 'DATETIME',
            'null' => true,
        ],
    ]);
}

public function down()
{
    $this->forge->dropColumn('bookings', 'payment_updated_at');
}

}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addtraport extends Migration
{
    public function up()
    {
        $this->forge->addColumn('Transports', [
            'type' => [
                'type'       => 'ENUM',
                'constraint' => ['ô tô', 'xe khách', 'máy bay', 'tàu thủy'],
                'default'    => 'ô tô', // Giá trị mặc định nếu không có gì chọn
            ]
        ]);
    }
    

    public function down()
    {
        //
    }
}

<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TransportSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Xe ô tô',
                'driver_name' => 'Nguyễn Văn A',
                'vehicle_number' => '79A-12345',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // Thêm các phương tiện khác nếu cần
        ];

        $this->db->table('transports')->insertBatch($data);
    }
}

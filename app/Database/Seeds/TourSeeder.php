<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TourSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Tour đến biển Nha Trang',
                'description' => 'Khám phá vẻ đẹp của biển Nha Trang.',
                'start_date' => '2024-12-01',
                'end_date' => '2024-12-05',
                'location' => 'Nha Trang',
                'participants' => 20,
                'price_per_person' => 300000,
                'transport_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // Thêm các tour khác nếu cần
        ];

        $this->db->table('tours')->insertBatch($data);
    }
}

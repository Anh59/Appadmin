<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ImageSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tour_id' => 1,
                'image_url' => 'Home-css/images/offer_1.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // Thêm các hình ảnh khác nếu cần
        ];

        $this->db->table('images')->insertBatch($data);
    }
}

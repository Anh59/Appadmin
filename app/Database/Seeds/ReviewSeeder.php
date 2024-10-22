<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'customer_id' => 1,
                'tour_id' => 1,
                'rating' => 5,
                'title'=>'thật tuyệt vơi ',
                'content' => 'Tour tuyệt vời!',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            // Thêm các đánh giá khác nếu cần
        ];

        $this->db->table('reviews')->insertBatch($data);
    }
}

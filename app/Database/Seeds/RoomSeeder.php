<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Phòng Deluxe',
                'tour_id' => 1,
                'price' => 50000,
                'cancellation'=>'FREE cancellation before 23:59',
                'extra'=>"ăn sáng",
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'image_url'=>'Home-css/images/room_1.jpg',
            ],
            // Thêm các phòng khác nếu cần
        ];

        $this->db->table('rooms')->insertBatch($data);
    }
}

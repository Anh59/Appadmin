<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'name' => 'Admin',
                'description' => 'Administrator group',
            ],
            [
                'name' => 'Nhân viên',
                'description' => 'Staff member group',
            ],
            [
                'name' => 'User',
                'description' => 'Regular user group',
            ],
        ];

        // Sử dụng query builder để chèn dữ liệu
        $this->db->table('groups')->insertBatch($data);
    }
}

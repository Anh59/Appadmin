<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [


            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT), // Mật khẩu được mã hóa
                'group_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'nhanvien',
                'email' => 'nhanvien@gmail.com',
                'password' => password_hash('nhanvien123', PASSWORD_DEFAULT),
                'group_id' => 3,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => password_hash('user123', PASSWORD_DEFAULT),
                'group_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
            ],
            // Thêm các bản ghi khác nếu cần
        ];

        // Sử dụng query builder để chèn dữ liệu
        $this->db->table('users')->insertBatch($data);
    }
}

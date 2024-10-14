<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '15',
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'password' => [
            'type' => 'VARCHAR',
            'constraint' => '255',  // Mật khẩu sẽ được mã hóa nên cần đủ độ dài
            ],
            'otp' => [
                'type' => 'VARCHAR',
                'constraint' => '6',  // OTP dài 6 ký tự
                'null' => true,        // OTP có thể null trước khi gửi
            ],
            'otp_expiration' => [
                'type' => 'TIMESTAMP',
                'null' => true,        // Thời gian hết hạn OTP
            ],
            'is_verified' => [
                'type' => 'BOOLEAN',
                'default' => false,    // Mặc định chưa xác thực
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],

        ]);
        $this->forge->addKey('id', true);  // Thêm khóa chính (primary key)
        $this->forge->createTable('customers');  // Tạo bảng
    }

    public function down()
    {
        //
        $this->forge->dropTable('customers');  // Xóa bảng nếu rollback
    }
}

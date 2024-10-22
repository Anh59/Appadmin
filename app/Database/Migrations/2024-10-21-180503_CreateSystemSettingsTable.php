<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSystemSettingsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'setting_name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'setting_value' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
                'default' => null,
            ],
        ]);
    
        $this->forge->addKey('id', true);
        $this->forge->createTable('system_settings');
    }
    
    public function down()
    {
        $this->forge->dropTable('system_settings');
    }
    
}

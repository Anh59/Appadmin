<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                "id"=>"1",
                "url"=>"Dashborad/table-group",
                "description"=>"create",
            ],
            [
                "id"=>"2",
                "url"=>"Dashborad/table-create",
                "description"=>"delete",
            ],
            [
                "id"=>"3",
                "url"=>"Dashborad/group-edit",
                "description"=>"update",
            ],

        ];
        $this->db->table('roles')->insertBatch($data);
    }
}

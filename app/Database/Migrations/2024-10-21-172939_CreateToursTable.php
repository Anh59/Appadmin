    <?php

    namespace App\Database\Migrations;

    use CodeIgniter\Database\Migration;

    class CreateToursTable extends Migration
    {
        public function up()
        {
            $this->forge->addField([
                'id' => [
                    'type'           => 'INT',
                    'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'name' => [
                    'type'       => 'VARCHAR',
                    'constraint' => 100,
                ],
                'description' => [
                    'type' => 'TEXT',
                    'null' => true,
                ],
                'start_date' => [
                    'type' => 'DATE',
                ],
                'end_date' => [
                    'type' => 'DATE',
                ],
                'location' => [
                    'type' => 'TEXT',
                ],
                'participants' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'null'       => true,
                ],
                'price_per_person' => [
                    'type'       => 'DECIMAL',
                    'constraint' => '10,2',
                ],
                'transport_id' => [
                    'type'       => 'INT',
                    'constraint' => 11,
                    'unsigned'   => true,
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
            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('transport_id', 'transports', 'id', 'CASCADE', 'CASCADE');
            $this->forge->createTable('tours');
        }

        public function down()
        {
            $this->forge->dropTable('tours');
        }
    }

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pages1 extends Migration
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
            'idGroup' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ],
            'metadescription' => [
                'type'       => 'VARCHAR',
                'constraint' => '355',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'namepage' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'nicknamepage' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'tentang' => [
                'type'       => 'TEXT'
            ],
            'tupoksi' => [
                'type'       => 'TEXT'
            ],
            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default'    => 'default'
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('namepage');
        $this->forge->addUniqueKey('nicknamepage');
        $this->forge->createTable('siades_pages1');
    }

    public function down()
    {
        $this->forge->dropTable('siades_pages1');
    }
}

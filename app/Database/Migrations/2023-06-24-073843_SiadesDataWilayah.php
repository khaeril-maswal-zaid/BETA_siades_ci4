<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiadesDataWilayah extends Migration
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
            'dusun' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'rk' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'rt' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kk' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'l' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'p' => [
                'type'       => 'INT',
                'constraint' => '11',
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
        $this->forge->createTable('siades_datawilayah');
    }

    public function down()
    {
        $this->forge->dropTable('siades_datawilayah');
    }
}

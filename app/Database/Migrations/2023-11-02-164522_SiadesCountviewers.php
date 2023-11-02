<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiadesCountviewers extends Migration
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
            'idpage' => [
                'type'       => 'VARCHAR',
                'constraint' => '11',
            ],
            'useradress' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'tanggal' => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'bulan' => [
                'type'       => 'INT',
                'constraint' => '2',
            ],
            'tahun' => [
                'type'       => 'INT',
                'constraint' => '4',
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
        $this->forge->createTable('siades_countviewers');
    }

    public function down()
    {
        $this->forge->dropTable('siades_countviewers');
    }
}

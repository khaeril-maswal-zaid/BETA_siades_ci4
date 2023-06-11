<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiadesKeuangan extends Migration
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
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'subtitle' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '200'
            ],
            'uraian' => [
                'type'       => 'VARCHAR',
                'constraint' => '200'
            ],
            'anggaran' => [
                'type'       => 'VARCHAR',
                'constraint' => '75'
            ],
            'realisasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '75'
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ],
            'update_at' => [
                'type'       => 'DATETIME',
                'null'       => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('siades_keuangan');
    }

    public function down()
    {
        $this->forge->dropTable('siades_keuangan');
    }
}

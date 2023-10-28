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
                'type'       => 'INT',
                'constraint' => '11'
            ],
            'realisasi' => [
                'type'       => 'INT',
                'constraint' => '11'
            ],
            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
                'default'   => 'default'
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
        $this->forge->createTable('siades_keuangan');
    }

    public function down()
    {
        $this->forge->dropTable('siades_keuangan');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiadesIdm extends Migration
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
            'group' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'idm' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'skor' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'kegiatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'nilai' => [
                'type'       => 'VARCHAR',
                'constraint' => '200'
            ],
            'pusat' => [
                'type'       => 'VARCHAR',
                'constraint' => '200'
            ],
            'prov' => [
                'type'       => 'VARCHAR',
                'constraint' => '200'
            ],
            'kab' => [
                'type'       => 'VARCHAR',
                'constraint' => '200'
            ],
            'des' => [
                'type'       => 'VARCHAR',
                'constraint' => '200'
            ],
            'csr' => [
                'type'       => 'VARCHAR',
                'constraint' => '200'
            ],
            'lainnya' => [
                'type'       => 'VARCHAR',
                'constraint' => '200'
            ],
            'tahun' => [
                'type'       => 'INT',
                'constraint' => '4',
                'default'   => '2023'
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
        $this->forge->createTable('siades_idm');
    }

    public function down()
    {
        $this->forge->dropTable('siades_idm');
    }
}

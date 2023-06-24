<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiadesAparaturDesa extends Migration
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
            'diGroup' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'class' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'jabatan' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pendidikan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kontak' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->createTable('siades_personildesa');
    }

    public function down()
    {
        $this->forge->dropTable('siades_personildesa');
    }
}

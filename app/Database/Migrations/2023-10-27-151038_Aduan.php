<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Aduan extends Migration
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
            'nomoraduan' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'nik' => [
                'type'       => 'VARCHAR',
                'constraint' => '16',
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'subject' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'aduan' => [
                'type'       => 'TEXT'
            ],
            'file' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '70',
            ],
            'respon' => [
                'type'       => 'TEXT',
                'default'    => 'Terima kasih atas aduan Anda! Kontribusi Anda sangat berarti bagi kami dalam meningkatkan layanan lebih baik.'
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
        $this->forge->createTable('siades_aduan');
    }

    public function down()
    {
        $this->forge->dropTable('siades_aduan');
    }
}

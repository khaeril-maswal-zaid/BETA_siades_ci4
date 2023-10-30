<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiadesKonfigurasi extends Migration
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
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'label' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'value' => [
                'type'       => 'VARCHAR',
                'constraint' => '255'
            ],
            'more' => [
                'type'       => 'TEXT'
            ],
            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
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
        $this->forge->createTable('siades_konfigurasi');
    }

    public function down()
    {
        $this->forge->dropTable('siades_konfigurasi');
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SiadesDataDesa extends Migration
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
            'val_lk' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'val_pr' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
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
        $this->forge->createTable('siades_datadesa');
    }

    public function down()
    {
        $this->forge->dropTable('siades_datadesa');
    }
}

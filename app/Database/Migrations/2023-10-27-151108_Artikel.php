<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
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
            'time' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'description' => [
                'type'       => 'TEXT'
            ],
            'picture' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'album' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'oleh' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'artikel' => [
                'type'       => 'TEXT',
            ],
            'view' => [
                'type'       => 'INT',
                'constraint' => '5',
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
        $this->forge->createTable('siades_artikel');
    }

    public function down()
    {
        $this->forge->dropTable('siades_artikel');
    }
}

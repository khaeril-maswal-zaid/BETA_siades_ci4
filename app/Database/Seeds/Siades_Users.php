<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Siades_Users extends Seeder
{
    public function run()
    {
        $data = [
            [
                'email' => 'official@wakandaraya.desa.id',
                'username' => 'Default',
                'fullname' => 'Default Admin',
                'image' => 'default.jpg',
                'password_hash' => 'wakandaraya',
                'active' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO user (name, description) VALUES(:name:, :description:)', $data);

        // Using Query Builder
        // $this->db->table('user')->insert($data);

        $this->db->table('users')->insertBatch($data);
        // php spark db:seed Siades_Users
    }
}

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
                'email' => 'muhammadkhaerilzaid@gmail.com',
                'username' => 'alzaid',
                'fullname' => 'Khaeril Maswal Zaid',
                'image' => 'default.jpg',
                'password_hash' => '$2y$10$QiWF8KV5hM5SgEPr8DX86OaJc39nH82EO3312PeCT7pxGZ.kyUCRK',
                'activate_hash' => '55db417df524b6df46b2cb20c0b31304',
                'active' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
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

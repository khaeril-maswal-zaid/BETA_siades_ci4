<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Auth_groupsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => [],
            'description'    => [],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO auth_permissions (name, description) VALUES(:name:, :description:)', $data);

        // Using Query Builder
        $this->db->table('auth_permissions')->insert($data);
    }
}

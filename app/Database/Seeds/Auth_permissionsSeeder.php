<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Auth_permissionsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'name' => ['manager', 'administrator', 'development'],
            'description'    => ['Mengelola keseluruhan Website mulai dari konfigurasi, tampilan hingga mengelola informasi', 'Sebagai pengelola informasi website', 'HANYA UNTUK KHAERIL MASWAL ZAID'],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO auth_groups (name, description) VALUES(:name:, :description:)', $data);

        // Using Query Builder
        $this->db->table('auth_groups')->insert($data);
    }
}

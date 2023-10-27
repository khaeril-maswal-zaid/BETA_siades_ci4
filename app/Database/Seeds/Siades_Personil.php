<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Siades_Personil extends Seeder
{
    public function run()
    {
        $data = [
            [
                'diGroup' => 739,
                'slug' => 'strukturdesa-kmz-165',
                'class' => '',
                'nama' => 'Muhammad Fulan, S.Kmz',
                'jabatan' => 'Kepala Desa',
                'alamat' => 'Default',
                'pendidikan' => 'Default',
                'kontak' => 'Default',
                'foto' => 'default.jpg',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO siades_personildesa (name, description) VALUES(:name:, :description:)', $data);

        // Using Query Builder
        // $this->db->table('siades_personildesa')->insert($data);

        $this->db->table('siades_personildesa')->insertBatch($data);
        // php spark db:seed Siades_Personil
    }
}

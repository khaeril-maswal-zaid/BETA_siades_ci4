<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Siades_Pages1 extends Seeder
{
    public function run()
    {
        $data = [
            [
                'idGroup' => 1,
                'metadescription' => 'Default',
                'slug' => 'bpd-kmz-165',
                'namepage' => 'Badan Permusyawaratan Desa',
                'nicknamepage' => 'BPD',
                'tentang' => 'Default',
                'tupoksi' => 'Default',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'idGroup' => 1,
                'metadescription' => 'Default',
                'slug' => 'lpm-kmz-165',
                'namepage' => 'Lembaga Pemberdayaan Desa',
                'nicknamepage' => 'LPM',
                'tentang' => 'Default',
                'tupoksi' => 'Default',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'idGroup' => 1,
                'metadescription' => 'Default',
                'slug' => 'pkk-kmz-165',
                'namepage' => 'Pembinaan Kesejahteraan Keluarga',
                'nicknamepage' => 'PKK',
                'tentang' => 'Default',
                'tupoksi' => 'Default',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'idGroup' => 1,
                'metadescription' => 'Default',
                'slug' => 'pkk-kmz-165',
                'namepage' => 'Karang Taruna',
                'nicknamepage' => 'Karang Taruna',
                'tentang' => 'Default',
                'tupoksi' => 'Default',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'idGroup' => '',
                'metadescription' => 'Default',
                'slug' => 'visi-misi-desa',
                'namepage' => 'Visi Misi Desa',
                'nicknamepage' => 'Visi Misi',
                'tentang' => 'Default',
                'tupoksi' => 'Default',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO siades_pages1 (name, description) VALUES(:name:, :description:)', $data);

        // Using Query Builder
        // $this->db->table('siades_pages1')->insert($data);

        $this->db->table('siades_pages1')->insertBatch($data);
        // php spark db:seed Siades_Pages1
    }
}

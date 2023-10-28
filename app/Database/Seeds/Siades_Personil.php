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
                'class' => 'active',
                'nama' => 'Muhammad Fulan, S.Kmz',
                'jabatan' => 'Kepala Desa',
                'alamat' => 'Default',
                'pendidikan' => 'Default',
                'kontak' => 'Default',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'diGroup' => 1,
                'slug' => 'bpd-kmz-165',
                'class' => 'active',
                'nama' => 'Muhammad Fulan, S.Kmz',
                'jabatan' => 'Ketua BPD',
                'alamat' => 'Default',
                'pendidikan' => 'Default',
                'kontak' => 'Default',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'diGroup' => 1,
                'slug' => 'lpm-kmz-165',
                'class' => 'active',
                'nama' => 'Muhammad Fulan, S.Kmz',
                'jabatan' => 'Ketua LPM',
                'alamat' => 'Default',
                'pendidikan' => 'Default',
                'kontak' => 'Default',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'diGroup' => 1,
                'slug' => 'pkk-kmz-165',
                'class' => 'active',
                'nama' => 'Siti Fulani, S.Kmz',
                'jabatan' => 'Ketua PKK',
                'alamat' => 'Default',
                'pendidikan' => 'Default',
                'kontak' => 'Default',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'diGroup' => 1,
                'slug' => 'karangtaruna-kmz-165',
                'class' => 'active',
                'nama' => 'Muhammad Fulan, S.Kmz',
                'jabatan' => 'Ketua Karang Taruna',
                'alamat' => 'Default',
                'pendidikan' => 'Default',
                'kontak' => 'Default',
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

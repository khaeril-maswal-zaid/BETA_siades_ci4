<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Siades_datawilayah extends Seeder
{
    public function run()
    {
        $data = [
            [
                'dusun' => 'Wakanda Timur',
                'rk' => '001',
                'rt' => '001',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Timur',
                'rk' => '001',
                'rt' => '002',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Timur',
                'rk' => '002',
                'rt' => '003',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Timur',
                'rk' => '002',
                'rt' => '004',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Timur',
                'rk' => '003',
                'rt' => '005',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Timur',
                'rk' => '003',
                'rt' => '006',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Barat',
                'rk' => '001',
                'rt' => '001',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Barat',
                'rk' => '001',
                'rt' => '002',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Barat',
                'rk' => '002',
                'rt' => '003',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Barat',
                'rk' => '002',
                'rt' => '004',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Barat',
                'rk' => '003',
                'rt' => '005',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Barat',
                'rk' => '003',
                'rt' => '006',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Tengah',
                'rk' => '001',
                'rt' => '002',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Tengah',
                'rk' => '002',
                'rt' => '003',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Tengah',
                'rk' => '002',
                'rt' => '004',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Tengah',
                'rk' => '003',
                'rt' => '005',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Wakanda Tengah',
                'rk' => '003',
                'rt' => '006',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO siades_sdgs (name, description) VALUES(:name:, :description:)', $data);

        // Using Query Builder
        // $this->db->table('siades_datawilayah')->insert($data);

        $this->db->table('siades_datawilayah')->insertBatch($data);
        // php spark db:seed Siades_datawilayah
    }
}

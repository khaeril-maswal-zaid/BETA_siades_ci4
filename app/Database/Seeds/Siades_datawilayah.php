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
                'dusun' => 'Samaenre',
                'rk' => '001',
                'rt' => '001',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Samaenre',
                'rk' => '001',
                'rt' => '002',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Samaenre',
                'rk' => '002',
                'rt' => '003',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Samaenre',
                'rk' => '002',
                'rt' => '004',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Samaenre',
                'rk' => '003',
                'rt' => '005',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Samaenre',
                'rk' => '003',
                'rt' => '006',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Kayu Putih',
                'rk' => '001',
                'rt' => '001',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Kayu Putih',
                'rk' => '001',
                'rt' => '002',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Kayu Putih',
                'rk' => '002',
                'rt' => '003',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Kayu Putih',
                'rk' => '002',
                'rt' => '004',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Kayu Putih',
                'rk' => '003',
                'rt' => '005',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Kayu Putih',
                'rk' => '003',
                'rt' => '006',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Batu Eja',
                'rk' => '001',
                'rt' => '002',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Batu Eja',
                'rk' => '002',
                'rt' => '003',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Batu Eja',
                'rk' => '002',
                'rt' => '004',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Batu Eja',
                'rk' => '003',
                'rt' => '005',
                'kk' => '123',
                'l' => '123',
                'p' => '123',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'dusun' => 'Batu Eja',
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

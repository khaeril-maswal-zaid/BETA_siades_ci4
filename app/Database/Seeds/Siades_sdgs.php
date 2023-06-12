<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Siades_sdgs extends Seeder
{
    public function run()
    {
        $data = [
            [
                'slug' => '',
                'label' => 'Desa Tanpa Kemiskinan',
                'value' => '71.89',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Desa Tanpa Kelaparan',
                'value' => '33.07',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Desa Sehat dan Sejahtera',
                'value' => '80.57',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Pendidikan Desa Berkualitas',
                'value' => '41.17',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Keterlibatan Perempuan Desa',
                'value' => '49.64',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Desa Layak Air Bersih dan Sanitasi',
                'value' => '53.95',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Desa Berenergi Bersih dan Terbarukan',
                'value' => '99.65',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Pertumbuhan Ekonomi Merata',
                'value' => '36.55',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Infrastruktur dan Inovasi Desa Sesuai Kebutuhan',
                'value' => '31.25',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Desa Tanpa Kesanjangan',
                'value' => '33.73',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Kawasan Permukiman Desa Aman dan Nyaman',
                'value' => '31.72',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Konsumsi dan Produksi Desa Sadar Linkungan',
                'value' => '0.00',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Desa Tanggap Perubahan Iklim',
                'value' => '0.00',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Desa Peduli Lingkungan Laut',
                'value' => '50.00',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Desa Peduli Lingkungan Darat',
                'value' => '4.17',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Desa Damai Berkeadilan',
                'value' => '80.19',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Kemitraan Untuk Pembangunan Desa',
                'value' => '82.77',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => '',
                'label' => 'Kelembagaan Desa Dinamis Dan Budaya Adaptif',
                'value' => '58.15',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],

        ];

        // Simple Queries
        // $this->db->query('INSERT INTO siades_sdgs (name, description) VALUES(:name:, :description:)', $data);

        // Using Query Builder
        // $this->db->table('siades_sdgs')->insert($data);

        $this->db->table('siades_sdgs')->insertBatch($data);
        // php spark db:seed Siades_sdgs
    }
}

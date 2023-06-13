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
                'slug' => 'skor-sdgs-1.jpg',
                'label' => 'Desa Tanpa Kemiskinan',
                'value' => '71.89',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-2.jpg',
                'label' => 'Desa Tanpa Kelaparan',
                'value' => '33.07',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-3.jpg',
                'label' => 'Desa Sehat dan Sejahtera',
                'value' => '80.57',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-4.jpg',
                'label' => 'Pendidikan Desa Berkualitas',
                'value' => '41.17',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-5.jpg',
                'label' => 'Keterlibatan Perempuan Desa',
                'value' => '49.64',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-6.jpg',
                'label' => 'Desa Layak Air Bersih dan Sanitasi',
                'value' => '53.95',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-7.jpg',
                'label' => 'Desa Berenergi Bersih dan Terbarukan',
                'value' => '99.65',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-8.jpg',
                'label' => 'Pertumbuhan Ekonomi Merata',
                'value' => '36.55',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-9.jpg',
                'label' => 'Infrastruktur dan Inovasi Desa Sesuai Kebutuhan',
                'value' => '31.25',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-10.jpg',
                'label' => 'Desa Tanpa Kesanjangan',
                'value' => '33.73',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-11.jpg',
                'label' => 'Kawasan Permukiman Desa Aman dan Nyaman',
                'value' => '31.72',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-12.jpg',
                'label' => 'Konsumsi dan Produksi Desa Sadar Linkungan',
                'value' => '0.00',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-13.jpg',
                'label' => 'Desa Tanggap Perubahan Iklim',
                'value' => '0.00',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-14.jpg',
                'label' => 'Desa Peduli Lingkungan Laut',
                'value' => '50.00',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-15.jpg',
                'label' => 'Desa Peduli Lingkungan Darat',
                'value' => '4.17',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-16.jpg',
                'label' => 'Desa Damai Berkeadilan',
                'value' => '80.19',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-17.jpg',
                'label' => 'Kemitraan Untuk Pembangunan Desa',
                'value' => '82.77',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'slug' => 'skor-sdgs-18.jpg',
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

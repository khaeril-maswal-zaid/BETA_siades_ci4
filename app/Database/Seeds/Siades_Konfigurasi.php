<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Siades_Konfigurasi extends Seeder
{
    public function run()
    {
        $data = [
            [
                'slug' => 'media-sosial-kmz-165',
                'label' => 'Telpon',
                'value' => '08123456789',
                'more' => '#',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'slug' => 'media-sosial-kmz-165',
                'label' => 'WhatsApp',
                'value' => '08123456789',
                'more' => '#',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'slug' => 'media-sosial-kmz-165',
                'label' => 'Facebook',
                'value' => 'Desa Wakanda Raya',
                'more' => '#',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'slug' => 'media-sosial-kmz-165',
                'label' => 'Instagram',
                'value' => 'Desa Wakanda Raya',
                'more' => '#',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'slug' => 'media-sosial-kmz-165',
                'label' => 'Email',
                'value' => 'official@wakandaraya.desa.id',
                'more' => '#',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'slug' => 'media-sosial-kmz-165',
                'label' => 'Youtube',
                'value' => 'Desa Berkemajuan',
                'more' => '#',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'slug' => 'alamat-kantor-kmz-165',
                'label' => 'Alamat Kantor',
                'value' => 'Jln. Tani, Dusun Konoha, Desa Wakanda Raya',
                'more' => '#',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'slug' => 'tentang-aplikasi-kmz-165',
                'label' => 'Tentang Aplikasi',
                'value' => 'Merupakan Website Resmi Desa Wakanda Raya serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum.',
                'more' => '#',
                'updated_by' => 'Default',
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO siades_konfigurasi (name, description) VALUES(:name:, :description:)', $data);

        // Using Query Builder
        // $this->db->table('siades_konfigurasi')->insert($data);

        $this->db->table('siades_konfigurasi')->insertBatch($data);
        // php spark db:seed Siades_Konfigurasi
    }
}

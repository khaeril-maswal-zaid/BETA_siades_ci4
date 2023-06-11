<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Siades_keuangan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'PENDAPATAN DESA',
                'subtitle' => 'Transfer',
                'kode' => '4.2.1.01',
                'uraian' => 'Dana Desa',
                'anggaran' => '352.800.000',
                'realisasi' => '352.000800.',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'title' =>  'PENDAPATAN DESA',
                'subtitle' => 'Transfer',
                'kode' => '4.2.2.01',
                'uraian' =>  'Bagian dari Hasil Pajak dan Retribusi Daerah Kabupaten/kota',
                'anggaran' => '352.800.000',
                'realisasi' => '352.800.000',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'title' =>  'PENDAPATAN DESA',
                'subtitle' => 'Transfer',
                'kode' => '4.2.3.01',
                'uraian' =>  'Alokasi Dana Desa',
                'anggaran' => '352.800.000',
                'realisasi' => '352.800.000',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'title' =>  'PENDAPATAN DESA',
                'subtitle' => 'Belanja Pegawai',
                'kode' =>  '4.2.4.01',
                'uraian' =>  'Bantuan Keuangan dari APBD Provinsi',
                'anggaran' => '352.800.000',
                'realisasi' => '352.800.000',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'title' =>  'BELANJA DESA',
                'subtitle' => 'Belanja Pegawai',
                'kode' => '5.1.1.01',
                'uraian' =>  'Penghasilan Tetap Kepala Desa',
                'anggaran' => '352.800.000',
                'realisasi' => '352.800.000',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'title' =>  'BELANJA DESA',
                'subtitle' => 'Belanja Pegawai',
                'kode' => '5.1.1.02',
                'uraian' =>  'Tunjangan Kepala Desa',
                'anggaran' => '352.800.000',
                'realisasi' => '352.800.000',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'title' =>  'BELANJA DESA',
                'subtitle' => 'Belanja Barang dan Jasa',
                'kode' => '5.1.2.01',
                'uraian' =>  'Penghasilan Tetap Perangkat Desa',
                'anggaran' => '352.800.000',
                'realisasi' => '352.800.000',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'title' =>  'BELANJA DESA',
                'subtitle' => 'Belanja Barang dan Jasa',
                'kode' => '5.1.2.02',
                'uraian' =>  'Tunjangan Perangkat Desa',
                'anggaran' => '352.800.000',
                'realisasi' => '352.800.000',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'title' =>  'BELANJA DESA',
                'subtitle' => 'Belanja Barang dan Jasa',
                'kode' => '5.1.3.01',
                'uraian' =>  'Jaminan Kesehatan Kepala Desa',
                'anggaran' => '352.800.000',
                'realisasi' => '352.800.000',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ],
            [
                'title' =>  'BELANJA DESA',
                'subtitle' => 'Belanja Barang dan Jasa',
                'kode' => '5.1.3.02',
                'uraian' =>  'Jaminan Kesehatan Perangkat Desa',
                'anggaran' => '352.800.000',
                'realisasi' => '352.800.000',
                'created_at' => Time::now(),
                'update_at' => Time::now(),
            ]
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO siades_keuangan (name, description) VALUES(:name:, :description:)', $data);

        // Using Query Builder
        // $this->db->table('siades_keuangan')->insert($data);

        $this->db->table('siades_keuangan')->insertBatch($data);
        // php spark db:seed Siades_keuangan
    }
}

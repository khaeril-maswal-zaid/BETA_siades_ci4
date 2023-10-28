<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class Siades_idm extends Seeder
{
    public function run()
    {
        $data = [
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Akses Sarkes",
                "skor" => "5",
                "keterangan" => "Waktu tempuh dari ≤ 30 Menit",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Dokter",
                "skor" => "0",
                "keterangan" => "Jumlah Dokter Tidak ada",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Bidan",
                "skor" => "5",
                "keterangan" => "Jumlah bidan ≥ 1 orang",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Nakes Lain",
                "skor" => "2",
                "keterangan" => "Jumlah tenaga kesehatan lainnya 1 orang",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Tingkat Kepesertaan BPJS",
                "skor" => "2",
                "keterangan" => "Jumlah peserta BPJS/jumlah penduduk antara 0,1 s.d 0,25",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Akses Poskesdes",
                "skor" => "5",
                "keterangan" => "Jarak tempuh menuju Poskesdes = 500 Meter",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Aktivitas Posyandu",
                "skor" => "5",
                "keterangan" => "Jumlah Posyandu aktif 1 bulan sekali/ Jumlah Posyandu &gt; 0,75",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Akses SD/MI",
                "skor" => "5",
                "keterangan" => "Jarak tempuh menuju SD atau MI = 3000 Meter",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Akses SMP/MTS",
                "skor" => "5",
                "keterangan" => "Jarak tempuh menuju SMP atau MTs ≤ 6000 Meter",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Akses SMA/SMK",
                "skor" => "5",
                "keterangan" => "Jarak tempuh menuju SMU atau SMK ≤ 6000 Meter",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Ketersediaan PAUD",
                "skor" => "5",
                "keterangan" => "Jumlah PAUD ≥ 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Ketersediaan PKBM/ Paket ABC",
                "skor" => "1",
                "keterangan" => "Jumlah PKBM atau Paket ABC Tidak ada",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Ketersediaan Kursus",
                "skor" => "5",
                "keterangan" => "Jumlah Pusat Keterampilan atau Kursus ≥ 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Ketersediaan Taman Baca/ Perpus Desa",
                "skor" => "1",
                "keterangan" => "Taman Bacaan Masyarakat atau perpustakaan Desa tidak tersedia",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Kebiasaan Goryong",
                "skor" => "5",
                "keterangan" => "Terdapat Kebiasaan Gotong Royong",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Frekuensi Goryong",
                "skor" => "5",
                "keterangan" => "Frekuensi Gotong Royong &gt; 2",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Ketersediaan Ruang Publik",
                "skor" => "5",
                "keterangan" => "Ruang Publik terdapat didesa",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Kelompok OR",
                "skor" => "3",
                "keterangan" => "Jumlah kelompok kegiatan olahraga antara 4 s.d 5",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Kegiatan OR",
                "skor" => "5",
                "keterangan" => "Jumlah kegiatan olahraga &gt; 7",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Keragaman Agama",
                "skor" => "5",
                "keterangan" => "Jumlah Jenis Agama di Desa &gt; 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Keragaman Bahasa",
                "skor" => "5",
                "keterangan" => "Jumlah Bahasa yang digunakan sehari-hari &gt; 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Keragaman Komunikasi",
                "skor" => "5",
                "keterangan" => "Warga Desa terdiri dari Suku &gt; 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Poskamling",
                "skor" => "5",
                "keterangan" => "Terdapat Pos Keamanan di Desa",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Siskamling",
                "skor" => "5",
                "keterangan" => "Terdapat Sistem Keamanan Lingkungan warga di Desa",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Konflik",
                "skor" => "1",
                "keterangan" => "Terdapat atau ada Konflik di Desa",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor PMKS",
                "skor" => "5",
                "keterangan" => "Jumlah PMKS tidak ada atau 0",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor SLB",
                "skor" => "5",
                "keterangan" => "Jumlah Skor SLB = 0",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Akses Listrik",
                "skor" => "5",
                "keterangan" => "(Jumlah Keluarga Memakai listrik + non Listrik/Jumlah keluarga memakai listrik) ≥ 0,9 )",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Sinyal Tlp",
                "skor" => "5",
                "keterangan" => "Sinyal telepon seluler di Desa Kuat",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Internet Kantor Desa",
                "skor" => "5",
                "keterangan" => "Terdapat fasilitas internet di kantor Desa",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Akses Internet Warga",
                "skor" => "5",
                "keterangan" => "Terdapat Akses internet warga di Desa",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Akses Jamban",
                "skor" => "5",
                "keterangan" => "Warga Desa BAB di Jamban Sendiri",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Sampah",
                "skor" => "5",
                "keterangan" => "Warga desa membuang sampah di Tempat Sampah kemudian diangkut",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Air Minum",
                "skor" => "5",
                "keterangan" => "Sumber air minum berasal dari PAM, Air Ledeng tanpa Meteran",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Sosial (IKS)",
                "idm" => "Skor Air Mandi &amp; Cuci",
                "skor" => "4",
                "keterangan" => "Sumber air mandi dan cuci berasal dari Sumur Bor/pompa, Sumur",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Keragaman Produksi",
                "skor" => "5",
                "keterangan" => "Jumlah Industri Mikro/ Jumlah KK ≥ 0,004",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Pertokoan",
                "skor" => "5",
                "keterangan" => "Jarak ke kelompok pertokoan terdekat ≤ 7 KM",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Pasar",
                "skor" => "3",
                "keterangan" => "(Total KK/jumlah pasar(permanen)) antara 0,001 s.d 250",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Toko/ Warung Kelontong",
                "skor" => "5",
                "keterangan" => "Jumlah Toko dan warung kelontong &gt; 3",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Kedai &amp; Penginapan",
                "skor" => "3",
                "keterangan" => "Jumlah Kedai dan Penginapan = 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor POS &amp; Logistik",
                "skor" => "5",
                "keterangan" => "Jumlah pos dan jasa logistik &gt; 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Bank &amp; BPR",
                "skor" => "5",
                "keterangan" => "Jumlah bank dan BPR &gt; 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Kredit",
                "skor" => "2",
                "keterangan" => "Jumlah fasilitas kredit = 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Lembaga Ekonomi",
                "skor" => "5",
                "keterangan" => "Jumlah koperasi aktif dan BUMDESA &gt; 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Moda Transportasi Umum",
                "skor" => "5",
                "keterangan" => "Transportasi Umum ada dengan trayek tetap",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Keterbukaan Wilayah",
                "skor" => "5",
                "keterangan" => "Jalan di Desa dilalui oleh kendaraan bermotor roda empat atau lebih Sepanjang Tahun",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekonomi (IKE)",
                "idm" => "Skor Kualitas Jalan",
                "skor" => "5",
                "keterangan" => "Jenis permukaan jalan desa Aspal atau beton",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekologi (IKL)",
                "idm" => "Skor Kualitas Lingkungan",
                "skor" => "3",
                "keterangan" => "Pencemaran (air, udara, tanah, limbah disungai) di desa [jumlah pencemaran/4] = 0,5",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekologi (IKL)",
                "idm" => "Skor Rawan Bencana",
                "skor" => "4",
                "keterangan" => "Jenis bencana (longsor, banjir, kebakaran hutan) jenis bencana di desa = 1",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ],
            [
                "group" => "Indeks Ketahanan Ekologi (IKL)",
                "idm" => "Skor Tanggap Bencana",
                "skor" => "0",
                "keterangan" => "Fasilitas mitigasi/tanggap bencana (peringatan dini bencana alam, peringatan dini tsunami, perlengkapan keselamatan, jalur evakuasi) jumlah fasilitas mitigasi / tanggap bencana = 0",
                "created_at" => Time::now(),
                "updated_at" => Time::now()
            ]
        ];

        // Simple Queries
        // $this->db->query("INSERT INTO siades_idm (name, description) VALUES(:name:, :description:)", $data);

        // Using Query Builder
        // $this->db->table("siades_idm")->insert($datad);

        $this->db->table("siades_idm")->insertBatch($data);
        // php spark db:seed Siades_idm
    }
}

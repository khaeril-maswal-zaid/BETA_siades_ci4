<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = 'siades_keuangan';
    protected $useTimestamps = true;
    protected $allowedFields = ['title', 'subtitle', 'kode', 'uraian', 'anggaran', 'realisasi', 'updated_by'];
}

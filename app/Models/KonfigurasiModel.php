<?php

namespace App\Models;

use CodeIgniter\Model;

class KonfigurasiModel extends Model
{
    protected $table = 'siades_konfigurasi';
    protected $useTimestamps = true;
    // protected $allowedFields = ['time', 'slug', 'judul', 'description', 'picture', 'oleh', 'kategori', 'level', 'artikel', 'visit', 'view'];
}

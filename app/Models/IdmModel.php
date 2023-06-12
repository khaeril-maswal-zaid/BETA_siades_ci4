<?php

namespace App\Models;

use CodeIgniter\Model;

class IdmModel extends Model
{
    protected $table = 'siades_idm';
    protected $useTimestamps = true;
    protected $allowedFields = ["group", "idm", "skor", "keterangan", "kegiatan", "nilai", "pusat", "prov", "kab", "des", "csr", "lainnya"];
}

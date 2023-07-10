<?php

namespace App\Models;

use CodeIgniter\Model;

class DataWilayahModel extends Model
{
    protected $table = 'siades_datawilayah';
    protected $useTimestamps = true;
    protected $allowedFields = ['dusun', 'rk', 'rt', 'kk', 'l', 'p'];
}

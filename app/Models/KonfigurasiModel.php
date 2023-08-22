<?php

namespace App\Models;

use CodeIgniter\Model;

class KonfigurasiModel extends Model
{
    protected $table = 'siades_konfigurasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['slug', 'label', 'value', 'more', 'updated_by'];
}

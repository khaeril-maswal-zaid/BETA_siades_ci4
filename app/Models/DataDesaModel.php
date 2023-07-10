<?php

namespace App\Models;

use CodeIgniter\Model;

class DataDesaModel extends Model
{
    protected $table = 'siades_datadesa';
    protected $useTimestamps = true;
    protected $allowedFields = ['slug', 'label', 'val_lk', 'val_pr'];
}

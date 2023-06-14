<?php

namespace App\Models;

use CodeIgniter\Model;

class DataDesaModel extends Model
{
    protected $table = 'siades_datadesa';
    protected $useTimestamps = true;
    protected $allowedFields = ['time', 'slug', 'judul', 'description', 'picture', 'oleh', 'kategori', 'level', 'artikel', 'visit', 'view'];
}

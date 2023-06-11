<?php

namespace App\Models;

use CodeIgniter\Model;

class DataWilayahModel extends Model
{
    protected $table = 'siades_datawilayah';
    protected $useTimestamps = true;
    protected $createdField  = true;
    protected $updatedField   = true;
    protected $allowedFields = ['time', 'slug', 'judul', 'description', 'picture', 'oleh', 'kategori', 'level', 'artikel', 'visit', 'view'];
}

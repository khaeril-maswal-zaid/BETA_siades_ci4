<?php

namespace App\Models;

use CodeIgniter\Model;

class ArtikelModel extends Model
{
    protected $table = 'siades_artikel';
    protected $useTimestamps = true;
    protected $allowedFields = ['time', 'slug', 'judul', 'description', 'picture', 'album', 'oleh', 'artikel', 'visit'];
}

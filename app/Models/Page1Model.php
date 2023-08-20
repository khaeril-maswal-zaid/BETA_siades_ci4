<?php

namespace App\Models;

use CodeIgniter\Model;

class Page1Model extends Model
{
    protected $table = 'siades_pages1';
    protected $useTimestamps = true;
    protected $allowedFields = ['idGroup', 'metadescription', 'slug', 'namepage', 'nicknamepage', 'tentang', 'tupoksi', 'updated_by'];
}

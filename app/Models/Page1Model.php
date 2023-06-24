<?php

namespace App\Models;

use CodeIgniter\Model;

class Page1Model extends Model
{
    protected $table = 'siades_pages1';
    protected $useTimestamps = true;
    protected $allowedFields = ['idGroup', 'metadescription', 'slug', 'namapage', 'nicknamepage', 'tentang', 'tupoksi'];

    public function valuesPages1($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}

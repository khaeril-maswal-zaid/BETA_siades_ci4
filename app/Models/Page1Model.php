<?php

namespace App\Models;

use CodeIgniter\Model;

class Page1Model extends Model
{
    protected $table = 'siades_pages1';
    protected $useTimestamps = true;
    protected $createdField  = true;
    protected $updatedField   = true;
    protected $allowedFields = ['slug', 'metadescription', 'namapage', 'singkatan', 'tentang', 'tupoksi', 'createdField', 'updatedField'];


    public function valuesPages1($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}

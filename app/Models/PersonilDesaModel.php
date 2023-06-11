<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonilDesaModel extends Model
{
    protected $table = 'siades_personildesa';
    protected $useTimestamps = true;
    protected $createdField  = true;
    protected $updatedField   = true;
    // protected $allowedFields = ['slug', 'metadescription', 'namapage', 'singkatan', 'tentang', 'tupoksi', 'createdField', 'updatedField'];


    public function personilAll($slug)
    {
        return $this->where('slug', $slug)->findAll();
    }
}

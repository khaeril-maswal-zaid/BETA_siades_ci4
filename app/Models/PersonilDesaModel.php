<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonilDesaModel extends Model
{
    protected $table = 'siades_personildesa';
    protected $useTimestamps = true;
    protected $allowedFields = ['idGroup', 'slug', 'class', 'nama', 'jabatan', 'alamat', 'pendidikan', 'kontak', 'foto', 'updated_by'];


    public function personilAll($slug)
    {
        return $this->where('slug', $slug)->findAll();
    }
}

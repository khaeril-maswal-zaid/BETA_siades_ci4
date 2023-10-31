<?php

namespace App\Models;

use CodeIgniter\Model;

class Page1Model extends Model
{
    protected $table = 'siades_pages1';
    protected $useTimestamps = true;
    protected $allowedFields = ['idGroup', 'metadescription', 'slug', 'namepage', 'nicknamepage', 'tentang', 'tupoksi', 'updated_by'];

    public function valuesPages1($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    //Untuk yg dari add Personil
    public function addPages($lembaga)
    {
        $this->save([
            'idGrup' => 'Default',
            'metadescription' => 'Default',
            'slug' => url_title($lembaga, '-', true),
            'namepage' => $lembaga,
            'nicknamepage' => $lembaga,
            'tentang' => 'Default',
            'tupoksi' => 'Default',
            'updated_by' => user()->fullname,
        ]);
    }
}

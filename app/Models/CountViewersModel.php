<?php

namespace App\Models;

use CodeIgniter\Model;

class CountViewersModel extends Model
{
    protected $table = 'siades_countviewers';
    protected $useTimestamps = true;
    protected $allowedFields = ['idpage', 'useradress', 'tanggal', 'bulan', 'tahun'];

    public function addViewers($idpage)
    {

        $array = [
            'idpage' => $idpage,
            'useradress' => takeusers(),
            'tanggal' => date('d'),
            'bulan' => date('m'),
            'tahun' => date('Y'),
        ];

        $unique = $this->where($array)->countAllResults();

        if ($unique === 0) {
            $this->save([
                'idpage' => $idpage,
                'useradress' => takeusers(),
                'tanggal' => date('d'),
                'bulan' => date('m'),
                'tahun' => date('Y'),
            ]);
        }
    }
}

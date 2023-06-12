<?php

namespace App\Controllers\Fiturutama;

use App\Controllers\BaseController;
use App\Models\IdmModel;

class Fitur3 extends BaseController
{
    protected $templatelayaout;
    protected $idm;

    public function __construct()
    {
        $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
        $this->idm = new IdmModel();
    }

    public function index()
    {
        $group = $this->idm->select('group')->orderBy('id', 'ASC')->distinct()->findAll();

        $val = [];
        $skorIndexpergrup = [];
        for ($i = 0; $i < count($group); $i++) {

            //val val----------
            $valrow = $this->idm->where('group', $group[$i])->findAll();
            $val[] = $valrow;

            $valskor = $this->idm->select('skor')->where('group', $group[$i])->findAll();

            $rowskor = [];
            foreach ($valskor as  $value) {
                $rowskor[] =  $value['skor'];
            }

            $totalSkorPergrup = array_sum($rowskor);
            $jumlahIndexPergrup = count($valskor);

            //Skor index pergrup = Total Skor Pergrup / (Jumlah index Pergrup + 5)
            $skorIndexpergrup[] = $totalSkorPergrup / ($jumlahIndexPergrup * 5);
        }

        $skorIdmTerkini = number_format(array_sum($skorIndexpergrup) / 3, 4);
        if ($skorIdmTerkini <= 0.4907) {
            $statusIdm = "Sangat Tertinggal";
        } elseif ($skorIdmTerkini <= 0.5989) {
            $statusIdm = "Tertinggal";
        } elseif ($skorIdmTerkini <= 0.7072) {
            $statusIdm = "Berkembang";
        } elseif ($skorIdmTerkini <= 0.8155) {
            $statusIdm = "Maju";
        } else {
            $statusIdm = "Mandiri";
        }


        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => 'IDM ' . LENGKAP,
            'metakeywords' => 'IDM ' . FULLENGKAP . ', IDM Desa  Terbaik,',
            'metadescription' => 'IDM ' . FULLENGKAP,

            'dataidm' => [$group, $val, $skorIndexpergrup],
            'statusIdm' => $statusIdm
        ];

        return view('fiturutama/fitur3', $data);
    }
}

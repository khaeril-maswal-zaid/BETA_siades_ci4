<?php

namespace App\Controllers\Fiturutama;

use App\Controllers\BaseController;
use App\Models\SdgsModel;

class Fitur1 extends BaseController
{
    protected $templatelayaout;
    protected $sdgsmodel;

    public function __construct()
    {
        $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
        $this->sdgsmodel = new SdgsModel();
    }

    public function index($tahun = false)
    {
        if ($tahun == false) {
            $tahun = date('Y');
        }

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => 'SDGS ' . LENGKAP,
            'metakeywords' => 'SDGS ' . FULLENGKAP . ', SDGS Desa  Terbaik,',
            'metadescription' => 'SDGS ' . FULLENGKAP,

            'sdgs' => $this->sdgsmodel->where('tahun', $tahun)->findAll(),
            'tahun' => $tahun,

            'active' => [false, false, false, false, false, false],
        ];

        return view('fiturutama/fitur1', $data);
    }
}

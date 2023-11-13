<?php

namespace App\Controllers\Fiturutama;

use App\Controllers\BaseController;
use App\Models\SdgsModel;
use App\Models\ApiKemendesModel;
use App\Models\KonfigurasiModel;

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

    public function byApi($tahun = null)
    {
        //TAHUN ANTISIPASI NANTI JIKA SUDAH BUTUH TAHAUN DI API NYA
        if ($tahun == false) {
            $tahun = date('Y');
        }

        $konfigurasimodel = new KonfigurasiModel();
        $iddesasdgs = $konfigurasimodel->select('value')->where('slug', 'iddesasdgs-kmz-165')->first()['value'];

        $apikemendes = new ApiKemendesModel;
        $resultapisdgs = $apikemendes->sdgsApi($iddesasdgs);

        if (!$resultapisdgs) {
            $dataN = [
                'templatelayaout' => $this->templatelayaout,

                'title' => 'SDGS ' . LENGKAP,
                'metakeywords' => 'SDGS ' . FULLENGKAP . ', SDGS Desa Terbaik,',
                'metadescription' => 'SDGS ' . FULLENGKAP,

                'tahun' => $tahun,

                'active' => [false, false, false, false, false, false],
            ];

            return view('fiturutama/fitur1-api-null', $dataN);
        }

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => 'SDGS ' . LENGKAP,
            'metakeywords' => 'SDGS ' . FULLENGKAP . ', SDGS Desa Terbaik,',
            'metadescription' => 'SDGS ' . FULLENGKAP,

            'average' => $resultapisdgs['average'],
            'sdgs' => $resultapisdgs['data'],
            'tahun' => $tahun,

            'active' => [false, false, false, false, false, false],
        ];

        return view('fiturutama/fitur1-api', $data);
    }
}

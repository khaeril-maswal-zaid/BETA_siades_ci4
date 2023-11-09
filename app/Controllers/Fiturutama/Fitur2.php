<?php

namespace App\Controllers\Fiturutama;

use App\Controllers\BaseController;
use App\Models\KeuanganModel;


class Fitur2 extends BaseController
{
    protected $templatelayaout;
    protected $keuanganmodel;

    public function __construct()
    {
        $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
        $this->keuanganmodel = new KeuanganModel();
    }

    public function index($tahun = false)
    {
        if ($tahun == false) {
            $tahun = date('Y');
        }

        //Ambil TITLE
        $title = $this->keuanganmodel->select('title')->where('tahun', $tahun)->distinct()->findAll();

        $subtitle = [];
        $values = [];
        for ($i = 0; $i < count($title); $i++) {

            //DATA SUBTITLE----------
            $subtitlerow = $this->keuanganmodel->select(['subtitle'])->where(['title' => $title[$i], 'tahun' => $tahun])->distinct()->findAll();
            $subtitle[] = $subtitlerow;

            $valuesrow = [];
            for ($ii = 0; $ii < count($subtitlerow); $ii++) {

                //DATA values---------
                $valuesrows = $this->keuanganmodel->where(['title' => $title[$i], 'tahun' => $tahun]);
                $valuesrows = $this->keuanganmodel->where(['subtitle' => $subtitlerow[$ii]['subtitle'], 'tahun' => $tahun])->distinct()->findAll();
                $valuesrow[] = $valuesrows;
            }
            $values[] = $valuesrow;
        }

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => 'Keuangan ' . LENGKAP,
            'metakeywords' => 'Keuangan ' . FULLENGKAP . ', Keuangan Desa  Terbaik,',
            'metadescription' => 'Keuangan ' . FULLENGKAP,

            'keuangan' => [$title, $subtitle, $values],
            'tahun' => $tahun,

            'active' => [false, false, false, false, false, false]
        ];

        return view('fiturutama/fitur2', $data);
    }
}

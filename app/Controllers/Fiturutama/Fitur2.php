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

    public function index()
    {
        //Ambil TITLE
        $title = $this->keuanganmodel->select('title')->distinct()->findAll();

        $subtitle = [];
        $values = [];
        for ($i = 0; $i < count($title); $i++) {

            //DATA SUBTITLE----------
            $subtitlerow = $this->keuanganmodel->select(['subtitle'])->where('title', $title[$i])->distinct()->findAll();
            $subtitle[] = $subtitlerow;

            $valuesrow = [];
            for ($ii = 0; $ii < count($subtitlerow); $ii++) {

                //DATA values---------
                $valuesrows = $this->keuanganmodel->where('title', $title[$i]);
                $valuesrows = $this->keuanganmodel->where('subtitle', $subtitlerow[$ii]['subtitle'])->distinct()->findAll();
                $valuesrow[] = $valuesrows;
            }
            $values[] = $valuesrow;
        }

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => 'Keuangan ' . LENGKAP,
            'metakeywords' => 'Keuangan ' . FULLENGKAP . ', Keuangan Desa  Terbaik,',
            'metadescription' => 'Keuangan ' . FULLENGKAP,

            'keuangan' => [$title, $subtitle, $values]
        ];

        return view('fiturutama/fitur2', $data);
    }
}

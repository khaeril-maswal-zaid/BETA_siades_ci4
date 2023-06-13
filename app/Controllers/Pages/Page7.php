<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

use App\Models\AduanModel;

class Page7 extends BaseController
{
    protected $templatelayaout;
    protected $aduanmodel;

    public function __construct()
    {
        $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
        $this->aduanmodel = new AduanModel;
    }

    public function index()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = [false, false, false, false];
        }

        $dataaduan = $this->aduanmodel->orderBy('id', 'DESC')->findAll();

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => 'Layanan Pengaduan ' . LENGKAP,
            'metakeywords' => 'Layanan Pengaduan ' . FULLENGKAP . ', Layanan Pengaduan Desa  Terbaik,',
            'metadescription' => 'Layanan Pengaduan ' . FULLENGKAP,

            'validation' => $validation,
            'dataaduan' =>  array_chunk($dataaduan, 2)
        ];

        session();
        return view('pages/page7', $data);
    }
}

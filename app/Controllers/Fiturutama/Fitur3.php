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
        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => 'IDM ' . LENGKAP,
            'metakeywords' => 'IDM ' . FULLENGKAP . ', IDM Desa  Terbaik,',
            'metadescription' => 'IDM ' . FULLENGKAP,

            'dataidm' => $this->idm->orderBy('id', 'DESC')->findAll()
        ];

        return view('fiturutama/fitur3', $data);
    }
}

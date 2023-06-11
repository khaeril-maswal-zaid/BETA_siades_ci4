<?php

namespace App\Controllers\Fiturutama;

use App\Controllers\BaseController;


class Fitur3 extends BaseController
{
    protected $templatelayaout;

    public function __construct()
    {
        $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
    }

    public function index()
    {

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => 'IDM ' . LENGKAP,
            'metakeywords' => 'IDM ' . FULLENGKAP . ', IDM Desa  Terbaik,',
            'metadescription' => 'IDM ' . FULLENGKAP,
        ];

        return view('fiturutama/fitur3', $data);
    }
}

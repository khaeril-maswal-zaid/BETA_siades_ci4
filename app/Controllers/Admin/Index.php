<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;


class Index extends BaseController
{
    protected $templatelayaout;

    public function __construct()
    {
        $this->templatelayaout = ['layout-admin/header', 'layout-admin/footer'];
    }

    public function index()
    {
        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',
        ];

        return view('admin/index', $data);
    }
}

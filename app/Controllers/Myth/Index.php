<?php

namespace App\Controllers\Myth;

use App\Controllers\BaseController;
use App\Models\AduanModel;

class Index extends BaseController
{
    protected
        $aduanmodel,

        $statusaduan,
        $aduanbelum;

    public function __construct()
    {
        $this->aduanmodel = new AduanModel();

        $this->aduanbelum = $this->aduanmodel->where('status', 'Belum diproses')->countAllResults();
        $this->statusaduan = $this->aduanmodel->select('name, created_at')->where('status', 'Belum diproses')->findAll();
    }

    public function login() // TIDAK SESUAI EKSPESTASI
    {
        $data = [
            'activeheader' => [false, false, false, false, false, false, false],
            'templatelayaout' => ['layout-htmlcodex/header', 'layout-htmlcodex/footer'],

            'metakeywords' => 'Website Desa ' . DESA . ', SIDES Desa Terbaik, Desa terbaik, Website desa terbaik',
            'metadescription' => 'SIDES ' . DESA . ' | Login',
        ];

        return view('myth-auth/login', $data);
    }

    public function gantiPassword()
    {
        $data = [
            'activeheader' => [false, false, false, false, false, false, false],
            'templatelayaout' => ['layout-admin/header', 'layout-admin/footer'],

            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
        ];

        return view('myth-auth/ganti-paswoard', $data);
    }

    public function resetPassword()
    {
        $token = $this->request->getGet('token');

        $data = [
            'activeheader' => [false, false, false, false, false, false, false],

            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => ['layout-admin/header', 'layout-admin/footer'],

            'token' => $token
        ];

        return view('myth-auth/reset-paswoard', $data);
    }
}

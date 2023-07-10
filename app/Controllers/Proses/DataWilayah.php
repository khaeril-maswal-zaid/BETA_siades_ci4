<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\DataWilayahModel;

class DataWilayah extends BaseController
{
    protected $datawilayahmodel;

    public function __construct()
    {
        $this->datawilayahmodel = new DataWilayahModel();
    }

    public function index()
    {
        $this->datawilayahmodel->save([
            'dusun' => $this->request->getVar('dusun'),
            'rk' => $this->request->getVar('rk'),
            'rt' => $this->request->getVar('rt'),
            'kk' => $this->request->getVar('kk'),
            'l' => $this->request->getVar('lk'),
            'p' => $this->request->getVar('pr'),
        ]);

        session()->setFlashdata('AddData', 'Data berhasil ditambahkan');
        return redirect()->to(base_url() . 'admindes/data-desa/data-wilayah');
    }

    public function delete($kolumf, $value)
    {
        $kolum = caesarCipherReverse($kolumf, -7);

        $this->datawilayahmodel->where($kolum, $value)->delete();

        session()->setFlashdata('AddData', 'Data berhasil dihapus');
        return redirect()->to(base_url() . 'admindes/data-desa/data-wilayah');
    }
}

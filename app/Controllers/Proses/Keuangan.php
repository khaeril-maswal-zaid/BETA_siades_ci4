<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\KeuanganModel;

class Keuangan extends BaseController
{
    protected $keuanganmodel;

    public function __construct()
    {
        $this->keuanganmodel = new KeuanganModel();
    }

    public function index()
    {
        if ($this->request->getVar('newsubkategori')) {
            $subtitle = $this->request->getVar('newsubkategori');
        } else {
            $subtitle = $this->request->getVar('subkategori');
        }

        $this->keuanganmodel->save([
            'title' => $this->request->getVar('kategori'),
            'subtitle' => $subtitle,
            'kode' => $this->request->getVar('kode'),
            'uraian' => $this->request->getVar('uraian'),
            'anggaran' => $this->request->getVar('anggaran'),
            'realisasi' => $this->request->getVar('realisasi'),
            'updated_by' => 'BELUM',
        ]);

        session()->setFlashdata('updateData', 'Data berhasil ditambahkan');
        return redirect()->to(base_url() . 'admindes/keuangan-desa');
    }

    public function delete($idDeleteF)
    {
        $idDelete = convertToNumber($idDeleteF);

        $this->keuanganmodel->delete($idDelete);

        session()->setFlashdata('updateData', 'Data berhasil dihapus');
        return redirect()->to(base_url() . 'admindes/keuangan-desa');
    }
}

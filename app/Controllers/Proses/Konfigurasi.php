<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\KonfigurasiModel;

class Konfigurasi extends BaseController
{
    protected $konfigurasimodel;

    public function __construct()
    {
        $this->konfigurasimodel = new KonfigurasiModel();
    }


    public function delete($idDeleteF, $slug)
    {
        $idDelete = convertToNumber($idDeleteF);

        $this->konfigurasimodel->delete($idDelete);

        session()->setFlashdata('updateData', 'Berhasil dihapus');
        return redirect()->to(base_url() . 'admindes/daftar-' . $slug);
    }

    public function add($slug)
    {
        $this->konfigurasimodel->save([
            'slug' => $slug . '-kmz-165',
            'label' => $this->request->getVar('label'),
            'value' => $this->request->getVar('value'),
            'more' => $this->request->getVar('more'),
            'updated_by' => 'Admin'
        ]);

        session()->setFlashdata('updateData', 'Lembaga baru berhasil ditambahkan');
        return redirect()->to(base_url() . 'admindes/daftar-' . $slug);
    }
}

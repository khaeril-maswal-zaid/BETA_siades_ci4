<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\DataDesaModel;

class DataDesa extends BaseController
{
    protected $datadesamodel;

    public function __construct()
    {
        $this->datadesamodel = new DataDesaModel();
    }

    public function index($kelompok)
    {
        $dataquery = $this->datadesamodel->select(['slug', 'label'])->where('slug', $kelompok)->first();

        if (!isset($dataquery)) {
            return view('errors/html/error_404');
        }

        $this->datadesamodel->save([
            'slug' => $kelompok,
            'label' => $this->request->getVar('label'),
            'val_lk' => $this->request->getVar('lk'),
            'val_pr' => $this->request->getVar('pr'),
        ]);

        session()->setFlashdata('AddData', 'Data berhasil ditambahkan');
        return redirect()->to(base_url() . 'admindes/data-desa/' . url_title($kelompok, '-', true));
    }

    public function delete($idDeleteF, $kelompok)
    {
        $idDelete = convertToNumber($idDeleteF);

        $this->datadesamodel->delete($idDelete);

        session()->setFlashdata('AddData', 'Data berhasil dihapus');
        return redirect()->to(base_url() . 'admindes/data-desa/' . url_title($kelompok, '-', true));
    }

    public function addKategori()
    {
        $this->datadesamodel->save([
            'slug' => $this->request->getVar('kategoribaru'),
            'updated_by' => 'Admin'
        ]);

        session()->setFlashdata('updateData', 'Kategori baru berhasil ditambahkan');
        return redirect()->to(base_url() . '/admindes/daftar-kategori-data');
    }
}

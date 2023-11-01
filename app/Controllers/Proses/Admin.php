<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\AdminsModel;

class Admin extends BaseController
{
    protected $useradminmodel;

    public function __construct()
    {
        $this->useradminmodel = new AdminsModel();
    }


    public function updateFoto($idUpdate)
    {
        //
        $idUpdate = convertToNumber($idUpdate);
        $fotoajax = $this->request->getVar('fotopost');

        rename('img/sementarabyajax/' . $fotoajax, 'img/admin/' . $fotoajax);
        $this->useradminmodel->update($idUpdate, [
            'image' => $fotoajax,
            'updated_by' => user()->fullname
        ]);

        session()->setFlashdata('updateData', 'Foto Berhasil diperbarui');
        return redirect()->to(base_url('admindes/myprofil'));
    }
}

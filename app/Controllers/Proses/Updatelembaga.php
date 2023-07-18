<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\Page1Model;

class Updatelembaga extends BaseController
{
    protected $lemabagamodel;

    public function __construct()
    {
        $this->lemabagamodel = new Page1Model();
    }

    public function index($kolumtarget)
    {
        $idUpdate = convertToNumber($kolumtarget);
        $targetColum = caesarCipherReverse($this->request->getVar('kolumtarget'), -7);
        $newvalue = $this->request->getVar('valueupdate');

        $nicknamepage = $this->lemabagamodel->select('nicknamepage')->where('id', $idUpdate)->first();

        // dd($targetColum);

        $this->lemabagamodel->update($idUpdate, [$targetColum => $newvalue]);

        session()->setFlashdata('updateData', 'Data berhasil diperbaharui');
        return redirect()->to(base_url() . 'admindes/' . url_title($nicknamepage['nicknamepage'], '-', true));
    }
}

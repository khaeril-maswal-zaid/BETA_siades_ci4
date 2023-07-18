<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\PersonilDesaModel;

class PersonilDesa extends BaseController
{
    protected $personaildesamodel;

    public function __construct()
    {
        $this->personaildesamodel = new PersonilDesaModel();
    }

    public function index($bakalslug)
    {
        // BELUM ADA VALIDASI
        //KERJA VALIDASI
        $slug = str_replace('-', '',  $bakalslug) . '-kmz-165';
        $fotoajax = $this->request->getVar('fotopost');

        $this->personaildesamodel->save([
            'diGroup' => '1',
            'slug' => $slug,
            'class' => '',
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'jabatan' => $this->request->getVar('jabatan'),
            'pendidikan' => $this->request->getVar('pendidikan'),
            'kontak' => $this->request->getVar('kontak'),
            'foto' => str_replace('-', '',  $bakalslug) . '_' . $fotoajax,
            'updated_by' => 'Admin'
        ]);

        // Meskipun sudah ada validasi untuk menghindari terhpus Folder 'sementarabyajax'
        if (isset($fotoajax)) {
            //Pindahkan file yg dari Ajax ke tempat tujuan
            rename('img/sementarabyajax/' . $fotoajax, 'img/personil/' . $bakalslug . '_' . $fotoajax);
        }

        session()->setFlashdata('updateData', 'Data berhasil ditambahkan');
        return redirect()->to(base_url() . 'admindes/' . $bakalslug);
    }

    public function delete($idDeleteF, $slug)
    {
        $idDelete = convertToNumber($idDeleteF);

        $this->personaildesamodel->delete($idDelete);

        session()->setFlashdata('updateData', 'Data berhasil dihapus');
        return redirect()->to(base_url() . 'admindes/' . $slug);
    }

    public function mianfoto($idUpdateF, $slug)
    {
        $idUpdate = convertToNumber($idUpdateF);

        $this->personaildesamodel->update($idUpdate, ['class' => 'active']);

        session()->setFlashdata('updateData', "Berhasil Menetapkan 'Foto Utama'");
        return redirect()->to(base_url() . 'admindes/' . $slug);
    }
}

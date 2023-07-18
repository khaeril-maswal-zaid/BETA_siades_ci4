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

    public function index($bacaslug)
    {
        // BELUM ADA VALIDASI
        //KERJA VALIDASI

        $bakalslug = str_replace('-', '',  $bacaslug);

        $slug = $bakalslug . '-kmz-165';
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
            'foto' => $bakalslug . '_' . $fotoajax,
            'updated_by' => 'Admin'
        ]);

        // Meskipun sudah ada validasi untuk menghindari terhpus Folder 'sementarabyajax'
        if (isset($fotoajax)) {
            //Pindahkan file yg dari Ajax ke tempat tujuan
            rename('img/sementarabyajax/' . $fotoajax, 'img/personil/' . $bakalslug . '_' . $fotoajax);
        }

        session()->setFlashdata('updateData', 'Data berhasil ditambahkan');
        return redirect()->to(base_url() . 'admindes/' . $bacaslug);
    }

    public function delete($idDeleteF, $slug)
    {
        $idDelete = convertToNumber($idDeleteF);

        $image = $this->personaildesamodel->select('foto')->where('id', $idDelete)->first();

        if ($image['foto'] != '') {
            unlink('img/personil/' . $image['foto']);
        }

        $this->personaildesamodel->delete($idDelete);

        session()->setFlashdata('updateData', 'Data berhasil dihapus');
        return redirect()->to(base_url() . 'admindes/' . $slug);
    }

    public function mianfoto($idUpdateF, $slug)
    {
        $idUpdate = convertToNumber($idUpdateF);

        //Kosongkan dulu baru update yg dipilih
        $this->personaildesamodel->where('slug', str_replace('-', '', $slug) . '-kmz-165')->set('class', '')->update();
        $this->personaildesamodel->update($idUpdate, ['class' => 'active']);

        session()->setFlashdata('updateData', "Berhasil Menetapkan 'Foto Utama'");
        return redirect()->to(base_url() . 'admindes/' . $slug);
    }
}

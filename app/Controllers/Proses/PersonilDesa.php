<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\Page1Model;
use App\Models\PersonilDesaModel;

class PersonilDesa extends BaseController
{
    protected $personaildesamodel;
    protected $tupoksimodel;

    public function __construct()
    {
        $this->personaildesamodel = new PersonilDesaModel();
        $this->tupoksimodel = new Page1Model();
    }

    public function index($bacaslug)
    {
        // BELUM ADA VALIDASI
        //KERJA VALIDASI

        //Validasi------------------------------------
        if (!$this->validate([
            'nama' => 'required',
            'alamat' => 'max_length[200]',
            'jabatan' => 'max_length[200]',
            'pendidikan' => 'max_length[200]',
            'kontak' => 'max_length[200]',
        ])) {

            //Error------------------------------------
            // dd($this->validator->getError('fileaduan'));
            session()->setFlashdata('validation', [
                $this->validator->getError('nama'),
                $this->validator->getError('alamat'),
                $this->validator->getError('jabatan'),
                $this->validator->getError('pendidikan'),
                $this->validator->getError('kontak'),
            ]);
            return redirect()->to(base_url('admindes/struktur-desa'))->withInput();
        }

        $bakalslug = str_replace('-', '',  $bacaslug);

        $slug = $bakalslug . '-kmz-165';
        $fotoajax = $this->request->getVar('fotopost');

        $kemungkinan = $this->tupoksimodel->where('namepage', $this->request->getVar('jabatan'))->countAllResults();
        //Jika Tupoksinya belum ada, tambhakan
        if (!$kemungkinan) {
            $this->tupoksimodel->addPages($this->request->getVar('jabatan'));
        }

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
            'updated_by' => user()->fullname
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

        if ($image['foto'] != '' && file_exists(('img/personil/' . $image['foto']))) {
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

    public function getAjaxOne()
    {
        $idUpdate = convertToNumber($_POST['id']);

        $data = $this->personaildesamodel->where('id', $idUpdate)->first();
        return json_encode($data);
    }

    public function updateFoto($idUpdate, $bacaslug)
    {
        $idUpdate = convertToNumber($idUpdate);

        $bakalslug = str_replace('-', '',  $bacaslug);
        $fotoajax = $this->request->getVar('fotopost');

        if ($fotoajax) {
            rename('img/sementarabyajax/' . $fotoajax, 'img/personil/' . $bakalslug . '_' . $fotoajax);

            $this->personaildesamodel->update($idUpdate, [
                'foto' => $bakalslug . '_' . $fotoajax,
                'updated_by' => user()->fullname
            ]);

            $pesansession = 'Foto berhasil diperbarui';
        } else {
            $pesansession = 'Tidak ada foto diperbarui';
        }

        session()->setFlashdata('updateData', $pesansession);
        return redirect()->to(base_url('admindes/' . $bacaslug));
    }
}

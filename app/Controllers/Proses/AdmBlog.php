<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;

class AdmBlog extends BaseController
{
    protected $artikelmodel;

    public function __construct()
    {
        $this->artikelmodel = new ArtikelModel();
    }

    public function save($idUpdate = null)
    {
        //Cek artikel khusus atau bukan
        if (
            $this->request->getVar('judul') == 'Profil Wilayah' ||
            $this->request->getVar('judul') == 'Sejarah Desa' ||
            $this->request->getVar('judul') == 'Potensi Desa'
        ) {
            $redirect = url_title($this->request->getVar('judul'), '-', true);
        } else {
            $redirect = 'kabar-desa/add';
        }

        //Validasi------------------------------------
        //Jika Artikel khusus (punya id)
        if (!$this->validate([
            'judul' => 'required',
            'imageblog' =>            [
                'rules' => 'max_size[imageblog,510]|is_image[imageblog]|mime_in[imageblog,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Max file 500 kb !',
                    'is_image' => 'Yang anda pilih bukan picture',
                    'mime_in' => 'Yang anda pilih bukan picture',
                ]
            ]
        ]) && $idUpdate) {
            //Error------------------------------------
            session()->setFlashdata('validation', [
                $this->validator->getError('judul'),
                $this->validator->getError('imageblog'),
            ]);

            return redirect()->to(base_url() . 'admindes/' . $redirect)->withInput();
        }
        //Jika Artikel uumum (tidak punya id)
        elseif (!$this->validate([
            'judul' => 'required',
            'imageblog' =>            [
                'rules' => 'uploaded[imageblog]|max_size[imageblog,510]|is_image[imageblog]|mime_in[imageblog,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Imaga wajib diisi !',
                    'max_size' => 'Max file 500 kb !',
                    'is_image' => 'Yang anda pilih bukan picture',
                    'mime_in' => 'Yang anda pilih bukan picture',
                ]
            ]
        ]) && !$idUpdate) {
            //Error------------------------------------
            session()->setFlashdata('validation', [
                $this->validator->getError('judul'),
                $this->validator->getError('imageblog'),
            ]);

            return redirect()->to(base_url() . 'admindes/' . $redirect)->withInput();
        }

        if ($this->request->getVar('oleh') == '' && $this->request->getVar('oleh-lainnya') == '') {
            session()->setFlashdata('val-oleh', true);
            return redirect()->to(base_url() . 'admindes/' . $redirect)->withInput();
        }

        //Cek foto
        if ($this->request->getVar('fotopost')) {
            $picture = $this->request->getVar('fotopost');
        } else {
            $picture = $this->request->getVar('picture');
        }

        //Cek oleh
        if ($this->request->getVar('oleh') != '') {
            $oleh = $this->request->getVar('oleh');
        } else {
            $oleh = $this->request->getVar('oleh-lainnya');
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        // Cari indeks awal tag <p>
        // $start = strpos($this->request->getVar('isinaArtikel'), '<p');

        // // Cari indeks akhir tag </p>
        // $end = strpos($this->request->getVar('isinaArtikel'), '</p>', $start);

        // // Ambil teks di antara tag <p> dan </p>
        // $tagPertama = substr($this->request->getVar('isinaArtikel'), $start, $end - $start);

        //Save Data------------------------------------------
        $this->artikelmodel->save([
            'id' => $idUpdate,
            'time' => time(),
            'slug' => $slug,
            'judul' => $this->request->getVar('judul'),
            'description' => $this->request->getVar('deskripsi'),
            'picture' => $picture,
            'album' => '1', //1 Artinya True
            'oleh' => $oleh,
            'artikel' => $this->request->getVar('isinaArtikel'),
            'visit' => '0'
        ]);


        if ($idUpdate) {
            if ($redirect == 'kabar-desa/add') {
                session()->setFlashdata('addArtikel', 'Data berhasil diperbaharui');
                return redirect()->to(base_url() . 'admindes/kabar-desa/update/' . $slug);
            } else {
                session()->setFlashdata('addArtikel', 'Data berhasil diperbaharui');
                return redirect()->to(base_url() . 'admindes/' . url_title($this->request->getVar('judul'), '-', true));
            }
        } else {
            session()->setFlashdata('addArtikel', 'Data berhasil ditambahkan');
            return redirect()->to(base_url() . 'admindes/kabar-desa');
        }
    }

    public function delete($idF)
    {
        $id = convertToNumber($idF);

        $image = $this->artikelmodel->select('picture')->where('id', $id)->first();

        if (!isset($image)) {
            return view('errors/html/error_404');
        }

        if ($image['picture'] != '') {
            unlink('img/blog/' . $image['picture']);
        }


        $this->artikelmodel->delete($id);

        session()->setFlashdata('addArtikel', 'Data berhasil dihapus');
        return redirect()->to(base_url() . 'admindes/kabar-desa');
    }
}

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
        $judul = $this->request->getVar('judul');

        if ($idUpdate) {
            $urlUpdate = $this->artikelmodel->select('slug')->where('id', $idUpdate)->first()['slug'];
        }

        //Cek artikel khusus atau bukan
        if ($judul == 'Profil Wilayah' ||  $judul == 'Sejarah Desa' || $judul == 'Potensi Desa') {
            $redirect = 'admindes/' . url_title($this->request->getVar('judul'), '-', true);
            $sessionFlash = 'Data berhasil diperbaharui';
            $jenis = 'khusus';
        } elseif ($idUpdate) {
            $redirect = 'admindes/' . 'kabar-desa/update/' . $urlUpdate;
            $sessionFlash = 'Data berhasil diperbaharui';
            $jenis = 'umum';
        } else {
            $redirect = 'admindes/' . 'kabar-desa';
            $sessionFlash = 'Data berhasil ditambahkan';
            $jenis = 'umum';
        }


        if ($idUpdate) {

            $validrol = [
                'judul' => 'required',
                'deskripsi' => 'required',
                'imageblog' => [
                    'rules' => 'max_size[imageblog,510]|is_image[imageblog]|mime_in[imageblog,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Max file 500 kb !',
                        'is_image' => 'Yang anda pilih bukan picture',
                        'mime_in' => 'Yang anda pilih bukan picture',
                    ]
                ]
            ];
        } else {

            $validrol = [
                'judul' => 'required',
                'deskripsi' => 'required',
                'imageblog' =>            [
                    'rules' => 'uploaded[imageblog]|max_size[imageblog,510]|is_image[imageblog]|mime_in[imageblog,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Imaga wajib diisi !',
                        'max_size' => 'Max file 500 kb !',
                        'is_image' => 'Yang anda pilih bukan picture',
                        'mime_in' => 'Yang anda pilih bukan picture',
                    ]
                ]
            ];
        }

        //Validasi------------------------------------
        //Jika Artikel khusus (punya id)
        if (!$this->validate($validrol)) {
            //Error------------------------------------
            session()->setFlashdata('validation', [
                $this->validator->getError('judul'),
                $this->validator->getError('deskripsi'),
                $this->validator->getError('imageblog'),
            ]);

            return redirect()->to(base_url() . $redirect)->withInput();
        }

        //OLEH & OLEH LAINNYA tidak boleh kosong secara bersamaan
        //Tidk dmasukkan di role validation karena boleh ji kosong salah satunya
        if ($this->request->getVar('oleh') == '' && $this->request->getVar('oleh-lainnya') == '') {
            session()->setFlashdata('val-oleh', true);
            return redirect()->to(base_url() . $redirect)->withInput();
        }

        //Cek oleh klw kosong gunkan yg lainnya
        if ($this->request->getVar('oleh') != '') {
            $oleh = $this->request->getVar('oleh');
        } else {
            $oleh = $this->request->getVar('oleh-lainnya');
        }

        //PERBAIKI
        $defaultartikel = '<p class="ck-placeholder" data-placeholder="Ketikkan disini !"><br data-cke-filler="true"></p>';
        if ($this->request->getVar('isinaArtikel') == $defaultartikel) {
            session()->setFlashdata('val-isinaArtikel', true);
            return redirect()->to(base_url() . $redirect)->withInput();
        }

        //Cek foto
        if ($this->request->getVar('fotopost')) {
            $picture = $this->request->getVar('fotopost');

            // Meskipun sudah ada validasi untuk menghindari terhpus Folder 'sementarabyajax'
            if (isset($picture)) {
                //Pindahkan file yg dari Ajax ke tempat tujuan
                rename('img/sementarabyajax/' . $picture, 'img/blog/' . $picture);
            }
        } else {
            $picture = $this->request->getVar('picture');
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        //Save Data------------------------------------------
        $this->artikelmodel->save([
            'id' => $idUpdate,
            'time' => time(),
            'slug' => $slug,
            'judul' => $this->request->getVar('judul'),
            'description' => $this->request->getVar('deskripsi'),
            'picture' => $picture,
            'album' => 1, //1 Artinya True
            'oleh' => $oleh,
            'artikel' => $this->request->getVar('isinaArtikel'),
            'view' => 50,
            'jenis' =>  $jenis
        ]);


        session()->setFlashdata('addArtikel', $sessionFlash);

        //Cek redirect berdasarkan tiga jenis (Add, Edit dan Khusus )
        if ($judul == 'Profil Wilayah' ||  $judul == 'Sejarah Desa' || $judul == 'Potensi Desa') {
            return redirect()->to(base_url() . $redirect);
        } elseif ($idUpdate) {
            return redirect()->to(base_url() . 'admindes/kabar-desa/update/' . $slug);
        } else {
            return redirect()->to(base_url() . $redirect);
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

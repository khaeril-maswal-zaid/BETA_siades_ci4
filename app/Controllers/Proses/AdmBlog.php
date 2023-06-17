<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\AduanModel;

class AdmBlog extends BaseController
{
    protected $aduanmodel;

    public function __construct()
    {
        $this->aduanmodel = new AduanModel();
    }

    public function save()
    {
        //Validasi------------------------------------
        if (!$this->validate([
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
        ])) {

            //Error------------------------------------
            // dd($this->validator->getError('imageblog'));
            session()->setFlashdata('validation', [
                $this->validator->getError('judul'),
                $this->validator->getError('imageblog'),
            ]);
            return redirect()->to(base_url() . 'admindes/profil-desa/profil-wilayah')->withInput();
        }

        if ($this->request->getVar('oleh') == '' && $this->request->getVar('oleh-lainnya') == '') {
            dd('ok');
            session()->setFlashdata('val-oleh', true);
            return redirect()->to(base_url() . 'admindes/profil-desa/profil-wilayah')->withInput();
        }

        // Save Data------------------------------------------
        // $this->aduanmodel->save([
        //     'nik' => $this->request->getVar('nik'),
        //     'name' => $this->request->getVar('name'),
        //     'email' => $this->request->getVar('nik'),
        //     'hp' => $this->request->getVar('hp'),
        //     'subject' => $this->request->getVar('subject'),
        //     'aduan' => $this->request->getVar('pengaduan'),
        //     'file' => $newfilename,
        //     'status' => 'Belum diproses',
        // ]);

        // session()->setFlashdata('pesan', 'Informasi berhasil tersubmit');
        // return redirect()->to(base_url() . 'layanan-pengaduan');
    }
}

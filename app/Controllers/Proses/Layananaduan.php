<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\AduanModel;

class Layananaduan extends BaseController
{
    protected $aduanmodel;

    public function __construct()
    {
        $this->aduanmodel = new AduanModel();
    }

    public function add()
    {
        //Validasi------------------------------------
        if (!$this->validate([
            'name' => 'required',
            'subject' => 'required',
            'pengaduan' => 'required',
            'fileaduan' =>            [
                'rules' => 'max_size[fileaduan,500]|is_image[fileaduan]|mime_in[fileaduan,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Max file 500 kb',
                    'is_image' => 'Yang anda pilih bukan picture',
                    'mime_in' => 'Yang anda pilih bukan picture',
                ]
            ]
        ])) {

            //Error------------------------------------
            // dd($this->validator->getError('fileaduan'));
            session()->setFlashdata('validation', [
                $this->validator->getError('name'),
                $this->validator->getError('subject'),
                $this->validator->getError('pengaduan'),
                $this->validator->getError('fileaduan'),
            ]);
            return redirect()->to(base_url() . 'layanan-pengaduan')->withInput();
        }


        // Unggah Foto ---------------------------------------
        $fileaduan = $this->request->getFile('fileaduan');
        if ($fileaduan->getError() != 4) {
            //buat nama dari nama pembuat aduan + subject aduan
            $newfilename = url_title($this->request->getVar('name') . '_' . $this->request->getVar('subject'), '-', true) . '.' . $fileaduan->getExtension();

            $fileaduan->move('img/aduan', $newfilename);
        } else {
            $newfilename = '';
        }


        // Save Data------------------------------------------
        $this->aduanmodel->save([
            'nik' => $this->request->getVar('nik'),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('nik'),
            'hp' => $this->request->getVar('hp'),
            'subject' => $this->request->getVar('subject'),
            'aduan' => $this->request->getVar('pengaduan'),
            'file' => $newfilename,
            'status' => 'Belum diproses',
        ]);

        session()->setFlashdata('pesan', 'Informasi berhasil tersubmit');
        return redirect()->to(base_url() . 'layanan-pengaduan');
    }

    public function getAjaxTunggal()
    {
        $data = $this->aduanmodel->where('id', $_POST['id'])->first();
        return json_encode($data);
    }
}

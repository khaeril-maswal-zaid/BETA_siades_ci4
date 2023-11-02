<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Libraries\SendByEmail;
use App\Models\AduanModel;

class Layananaduan extends BaseController
{
    protected $aduanmodel;
    protected $sendemail;

    public function __construct()
    {
        $this->aduanmodel = new AduanModel();
        $this->sendemail = new SendByEmail();
    }

    public function add()
    {
        //Validasi------------------------------------
        if (!$this->validate([
            'email' => 'required|valid_email',
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
                $this->validator->getError('email'),
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

        $emailsender = $this->request->getVar('email');
        $nama = $this->request->getVar('name');
        $nomoraduan = date('ymd') . random_string('numeric', 4);
        $subjek = $this->request->getVar('subject');

        // Save Data------------------------------------------
        $this->aduanmodel->save([
            'nomoraduan' => $nomoraduan,
            'nik' => $this->request->getVar('nik'),
            'name' => $nama,
            'email' => $emailsender,
            'hp' => $this->request->getVar('hp'),
            'subject' =>  $subjek,
            'aduan' => $this->request->getVar('pengaduan'),
            'file' => $newfilename,
            'status' => 'Belum diproses',
        ]);

        $this->sendemail->notifAduan([$emailsender, $nama, $nomoraduan, $subjek]);

        session()->setFlashdata('pesan', 'Informasi berhasil tersubmit');
        return redirect()->to(base_url() . 'layanan-pengaduan');
    }

    public function getAjaxTunggal()
    {
        $data = $this->aduanmodel->where('id', $_POST['id'])->first();
        return json_encode($data);
    }

    public function delete($idDeleteF)
    {
        $idDelete = convertToNumber($idDeleteF);

        $image = $this->aduanmodel->select('file')->where('id', $idDelete)->first();

        if (!isset($image)) {
            return view('errors/html/error_404');
        }

        if ($image['file'] != '') {
            unlink('img/aduan/' . $image['file']);
        }

        $this->aduanmodel->delete($idDelete);

        session()->setFlashdata('addArtikel', 'Data berhasil dihapus');
        return redirect()->to(base_url() . 'admindes/aduan-masyarakat');
    }

    public function status($idDeleteF)
    {
        $idDelete = convertToNumber($idDeleteF);

        $this->aduanmodel->update($idDelete, ['status' => 'Selesai diproses']);

        session()->setFlashdata('addArtikel', 'Data berhasil diproses');
        return redirect()->to(base_url() . 'admindes/aduan-masyarakat');
    }

    public function respon($idUpdate)
    {
        $respon = $this->request->getVar('respon');
        $dataaduan = $this->aduanmodel->select(['email', 'name', 'nomoraduan'])->where('id', $idUpdate)->first();

        $this->aduanmodel->update($idUpdate, [
            'status' => 'Sedang diproses',
            'updated_by' => user()->fullname,
            'respon' =>  $respon
        ]);

        $this->sendemail->responAduan([$dataaduan['email'], $dataaduan['name'], $dataaduan['nomoraduan'],  $respon]);

        session()->setFlashdata('addArtikel', 'Data berhasil ditanggapi');
        return redirect()->to(base_url() . 'admindes/aduan-masyarakat');
    }
}

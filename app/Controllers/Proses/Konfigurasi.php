<?php

namespace App\Controllers\Proses;

use App\Controllers\BaseController;
use App\Models\KonfigurasiModel;

class Konfigurasi extends BaseController
{
    protected $konfigurasimodel;

    public function __construct()
    {
        $this->konfigurasimodel = new KonfigurasiModel();
    }


    public function delete($idDeleteF, $slug)
    {
        $idDelete = convertToNumber($idDeleteF);

        $this->konfigurasimodel->delete($idDelete);

        session()->setFlashdata('updateData', 'Berhasil dihapus');
        return redirect()->to(base_url() . 'admindes/daftar-' . $slug);
    }

    public function add($slug)
    {
        //Validasi------------------------------------
        if (!$this->validate([
            'value' => 'max_length[200]|required',
            'label' => 'max_length[200]|required',
            'more' => 'max_length[500]|required',
        ])) {

            //Error------------------------------------
            // dd($this->validator->getError('fileaduan'));
            session()->setFlashdata('validation', [
                $this->validator->getError('value'),
                $this->validator->getError('label'),
                $this->validator->getError('more')
            ]);
            return redirect()->to(base_url('admindes/daftar-' . $slug))->withInput();
        }

        $this->konfigurasimodel->save([
            'slug' => $slug . '-kmz-165',
            'label' => $this->request->getVar('label'),
            'value' => $this->request->getVar('value'),
            'more' => $this->request->getVar('more'),
            'updated_by' =>  user()->fullname
        ]);

        session()->setFlashdata('updateData', 'Lembaga baru berhasil ditambahkan');
        return redirect()->to(base_url('admindes/daftar-' . $slug));
    }

    function updateAplikasi()
    {
        //Validasi------------------------------------
        if (!$this->validate([
            'alamatkantor' => 'max_length[200]|required',
            'tentangaplikasi' => 'max_length[500]|required'
        ])) {

            //Error------------------------------------
            // dd($this->validator->getError('fileaduan'));
            session()->setFlashdata('validation', [
                $this->validator->getError('alamatkantor'),
                $this->validator->getError('tentangaplikasi')
            ]);
            return redirect()->to(base_url('admindes/konf-aplikasi'))->withInput();
        }

        $konfApp = $this->konfigurasimodel->select('id, label')->where('slug', 'tentang-aplikasi-kmz-165')->first();
        $konfAlamat = $this->konfigurasimodel->select('id, label')->where('slug', 'alamat-kantor-kmz-165')->first();

        if ($konfApp['label'] != 'Tentang Aplikasi' && $konfAlamat['label'] != 'Alamat Kantor') {
            session()->setFlashdata('updateData', 'Konfigurasi Aplikasi Gagal diperbarui');
            return redirect()->to(base_url() . 'admindes/konf-aplikasi');
        }

        $this->konfigurasimodel->update($konfApp['id'], [
            'value' => $this->request->getVar('tentangaplikasi')
        ]);

        $this->konfigurasimodel->update($konfAlamat['id'], [
            'value' => $this->request->getVar('alamatkantor')
        ]);

        session()->setFlashdata('updateData', 'Konfigurasi Aplikasi Berhasil diperbarui');
        return redirect()->to(base_url('admindes/konf-aplikasi'));
    }

    public function postPhoto($url, $folder)
    {
        // dd($this->request->getVar());
        $fotoposted = $this->request->getVar('fotopost');
        $idCarousel = $this->request->getVar('idCarousel');

        if ($fotoposted) {
            $this->konfigurasimodel->update($idCarousel, [
                'more' => $fotoposted
            ]);

            //Pindahkan file yg dari Ajax ke tempat tujuan
            rename('img/sementarabyajax/' . $fotoposted, 'img/' . $folder . '/' . $fotoposted);
            return redirect()->to(base_url('admindes/' . $url));
        }

        return redirect()->to(base_url('admindes/' . $url));
    }

    public function addIdDesa($idapi)
    {
        $url = $this->request->getVar('url');

        //Validasi------------------------------------
        if (!$this->validate([
            'iddesa' => 'max_length[10]|min_length[10]|required|numeric'
        ])) {

            //Error------------------------------------
            // dd($this->validator->getError('fileaduan'));
            session()->setFlashdata(
                'validation',
                $this->validator->getError('iddesa')
            );
            return redirect()->to(base_url('admindes/' . $url))->withInput();
        }

        $idapi = convertToNumber($idapi);

        $iddesaidm = $this->request->getVar('iddesa');
        $url = $this->request->getVar('url');

        $this->konfigurasimodel->update($idapi, [
            'value' => $iddesaidm
        ]);

        return redirect()->to(base_url('admindes/' . $url));
    }
}

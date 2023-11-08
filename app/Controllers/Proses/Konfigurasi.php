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
        if ($this->request->getVar('more') != '') {
            $more = $this->request->getVar('more');
        } else {
            $more = '#';
        }

        $this->konfigurasimodel->save([
            'slug' => $slug . '-kmz-165',
            'label' => $this->request->getVar('label'),
            'value' => $this->request->getVar('value'),
            'more' => $more,
            'updated_by' =>  user()->fullname
        ]);

        session()->setFlashdata('updateData', 'Lembaga baru berhasil ditambahkan');
        return redirect()->to(base_url() . 'admindes/daftar-' . $slug);
    }

    function updateAplikasi()
    {
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
        return redirect()->to(base_url() . 'admindes/konf-aplikasi');
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
}

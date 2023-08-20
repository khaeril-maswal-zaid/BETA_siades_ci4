<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AduanModel;
use App\Models\ArtikelModel;
use App\Models\DataDesaModel;
use App\Models\DataWilayahModel;
use App\Models\IdmModel;
use App\Models\KeuanganModel;
use App\Models\KonfigurasiModel;
use App\Models\Page1Model;
use App\Models\PersonilDesaModel;
use App\Models\SdgsModel;


class Index extends BaseController
{
    protected $templatelayaout,
        $artikelmodel,
        $sdgsmodel,
        $idmmodel,
        $keuanganmodel,
        $lembagamodel,
        $personildesa,
        $datadesamodel,
        $datawilyahmodel,
        $aduanmodel,
        $konfigurasimodel;

    public function __construct()
    {
        $this->templatelayaout = ['layout-admin/header', 'layout-admin/footer'];
        $this->artikelmodel = new ArtikelModel();
        $this->sdgsmodel = new SdgsModel();
        $this->idmmodel = new IdmModel();
        $this->keuanganmodel = new KeuanganModel();
        $this->lembagamodel = new Page1Model();
        $this->personildesa = new PersonilDesaModel();
        $this->datadesamodel = new DataDesaModel();
        $this->datawilyahmodel = new DataWilayahModel();
        $this->aduanmodel = new AduanModel();
        $this->konfigurasimodel = new KonfigurasiModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',
        ];

        return view('admin/index', $data);
    }

    public function blog()
    {
        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

            'artikels' => $this->artikelmodel->orderBy('id', 'DESC')->paginate(9, 'siades_bloger'),
            'pager' => $this->artikelmodel->pager,
        ];

        return view('admin/bloger', $data);
    }

    public function blogAdd($slug = null, $label = 'Tambah Artikel', $disabled = false)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = [false, false, false]; // JUMLAH ROLE
        }

        $dataartikel = $this->artikelmodel->where('slug', $slug)->first();

        if ($dataartikel) {
            $label = $dataartikel['judul'];
        } else {
            $label = str_replace("-", " ", $label);
        }


        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

            'dataupdate' => $dataartikel,
            'label' => $label,

            'validation' => $validation,
            'disabled' => $disabled
        ];

        session();
        return view('admin/blogAdd', $data);
    }

    public function sdgs()
    {
        $datasdgs = $this->sdgsmodel->findAll();

        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

            'datasdgs' => $datasdgs
        ];

        return view('admin/sdgs', $data);
    }

    public function idm()
    {
        $group = $this->idmmodel->select('group')->orderBy('id', 'ASC')->distinct()->findAll();

        $val = [];
        $skorIndexpergrup = [];
        for ($i = 0; $i < count($group); $i++) {

            //val val----------
            $valrow = $this->idmmodel->where('group', $group[$i])->findAll();
            $val[] = $valrow;

            $valskor = $this->idmmodel->select('skor')->where('group', $group[$i])->findAll();

            $rowskor = [];
            foreach ($valskor as  $value) {
                $rowskor[] =  $value['skor'];
            }

            $totalSkorPergrup = array_sum($rowskor);
            $jumlahIndexPergrup = count($valskor);

            //Skor index pergrup = Total Skor Pergrup / (Jumlah index Pergrup + 5)
            $skorIndexpergrup[] = $totalSkorPergrup / ($jumlahIndexPergrup * 5);
        }

        $skorIdmTerkini = number_format(array_sum($skorIndexpergrup) / 3, 4);
        if ($skorIdmTerkini <= 0.4907) {
            $statusIdm = "Sangat Tertinggal";
        } elseif ($skorIdmTerkini <= 0.5989) {
            $statusIdm = "Tertinggal";
        } elseif ($skorIdmTerkini <= 0.7072) {
            $statusIdm = "Berkembang";
        } elseif ($skorIdmTerkini <= 0.8155) {
            $statusIdm = "Maju";
        } else {
            $statusIdm = "Mandiri";
        }

        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

            'dataidm' => [$group, $val, $skorIndexpergrup],
            'statusIdm' => $statusIdm
        ];

        return view('admin/idm', $data);
    }

    public function keuangan()
    {
        //Ambil TITLE
        $title = $this->keuanganmodel->select('title')->distinct()->findAll();
        $subtitleAll = $this->keuanganmodel->select('subtitle')->distinct()->findAll();

        $subtitle = [];
        $values = [];
        for ($i = 0; $i < count($title); $i++) {

            //DATA SUBTITLE----------
            $subtitlerow = $this->keuanganmodel->select(['subtitle'])->where('title', $title[$i])->distinct()->findAll();
            $subtitle[] = $subtitlerow;

            $valuesrow = [];
            for ($ii = 0; $ii < count($subtitlerow); $ii++) {

                //DATA values---------
                $valuesrows = $this->keuanganmodel->where('title', $title[$i]);
                $valuesrows = $this->keuanganmodel->where('subtitle', $subtitlerow[$ii]['subtitle'])->distinct()->findAll();
                $valuesrow[] = $valuesrows;
            }
            $values[] = $valuesrow;
        }

        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

            'keuangan' => [$title, $subtitle, $values],
            'subtitleAll' => $subtitleAll,
            'tabeldtb' => $this->keuanganmodel->table,
        ];

        return view('admin/keuangan', $data);
    }

    public function visimisi()
    {
        $visimisimodel = $this->lembagamodel;
        $visimisi = $visimisimodel->select(['tentang', 'tupoksi', 'id'])->where('slug', 'visi-misi-desa')->first();

        if (!isset($visimisi)) {
            return view('errors/html/error_404');
        }

        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',
            'visimisi' => ['visi' => $visimisi['tentang'], 'misi' => $visimisi['tupoksi'], 'idUpdate' => $visimisi['id']]
        ];

        return view('admin/visimisi', $data);
    }

    public function struktur()
    {
        $active = $this->personildesa->select('class')->where('slug', 'strukturdesa-kmz-165');
        $active = $this->personildesa->select('class')->where('class', 'active')->findAll();

        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

            'personildesa' => $this->personildesa->personilAll('strukturdesa-kmz-165'),
            'tabeldtb' => $this->personildesa->table,
            'active' => count($active)
        ];

        return view('admin/struktur', $data);
    }

    public function lembaga($blembaga = null)
    {
        $lembaga = str_replace("-", " ", $blembaga);
        $lembaga = strtolower($lembaga);

        $lembaga = $this->lembagamodel->where('nicknamepage', $lembaga)->first();

        if (!isset($lembaga)) {
            return view('errors/html/error_404');
        }

        $active = $this->personildesa->select('class')->where('slug', $lembaga['slug']);
        $active = $this->personildesa->select('class')->where('class', 'active')->findAll();

        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

            'namalembaga' => $lembaga['namepage'],
            'singkatanlembaga' => $lembaga['nicknamepage'],
            'tentang' => $lembaga['tentang'],
            'tupoksi' => $lembaga['tupoksi'],
            'idlembaga' => $lembaga['id'],

            'personildesa' => $this->personildesa->personilAll($lembaga['slug']),
            'tabeldtb' => $this->personildesa->table,
            'active' => count($active)
        ];

        return view('admin/lembaga', $data);
    }

    public function dataWilayah()
    {
        $dusuns = $this->konfigurasimodel->select('value')->where('slug', 'dusun-kmz-165')->distinct()->findAll();

        $rk = [];
        $rt = [];
        $CdRk = [];
        $value = [];
        $CdRtRk = [];

        //DATA DUSUN----------
        $dusun = $this->datawilyahmodel->select('dusun')->distinct()->findAll();

        for ($i = 0; $i < count($dusun); $i++) {

            //DATA RK----------
            $rkrow = $this->datawilyahmodel->select(['dusun', 'rk'])->where('dusun', $dusun[$i])->distinct()->findAll();
            $rk[] = $rkrow;


            $rtrow = [];
            $CdRtrow = [];
            for ($ii = 0; $ii < count($rkrow); $ii++) {
                //DATA RT---------
                $rtrows = $this->datawilyahmodel->where('dusun', $dusun[$i]);
                $rtrows = $this->datawilyahmodel->where('rk', $rkrow[$ii]['rk'])->distinct()->findAll();
                $rtrow[] = $rtrows;


                //COUNT RT---------
                $CdRtrows = $this->datawilyahmodel->where('dusun', $dusun[$i]);
                $CdRtrows = $this->datawilyahmodel->where('rk', $rkrow[$ii]['rk'])->distinct()->countAllResults();
                $CdRtrow[] = $CdRtrows;
            }
            $rt[] = $rtrow; //DATA RT---------
            $CdRt[] = array_sum($CdRtrow); //COUNT RT---------


            //COUNT RK----------
            $CdRkrow = $this->datawilyahmodel->select(['dusun', 'rk'])->where('dusun', $dusun[$i])->distinct()->countAllResults();
            $CdRk[] = $CdRkrow;


            //Untuk Total PerRK----------
            $valueRk = [];
            for ($ii = 0; $ii < count($rkrow); $ii++) {
                $vLRk = [];
                $vRRk = [];
                $vKkRk = [];
                $valueRowRk = $this->datawilyahmodel->select(['l', 'p', 'kk'])->where('dusun', $dusun[$i]);
                $valueRowRk = $this->datawilyahmodel->select(['l', 'p', 'kk'])->where('rk', $rkrow[$ii]['rk'])->findAll();
                foreach ($valueRowRk as $vlrRk) {
                    $vLRk[] = $vlrRk['l'];
                    $vRRk[] = $vlrRk['p'];
                    $vKkRk[] = $vlrRk['kk'];
                }
                $valueRk[] = [array_sum($vLRk), array_sum($vRRk), array_sum($vKkRk)];
            }
            $CdRtRk[] = $valueRk; //Untuk Total PerRK----------


            //Untuk Total Perdusun----------
            $vL = [];
            $vR = [];
            $vKk = [];
            $valueRow = $this->datawilyahmodel->select(['l', 'p', 'kk'])->where('dusun', $dusun[$i])->findAll();
            $valueRow = $this->datawilyahmodel->select(['l', 'p', 'kk'])->where('dusun', $dusun[$i])->findAll();
            foreach ($valueRow as $vlr) {
                $vL[] = $vlr['l'];
                $vR[] = $vlr['p'];
                $vKk[] = $vlr['kk'];
            }
            $value[] = [array_sum($vL), array_sum($vR), array_sum($vKk)];
        }

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => 'Data Wilayah ' . LENGKAP,
            'metakeywords' => 'Data Wilayah ' . FULLENGKAP . ', Data Wilayah Desa  Terbaik,',
            'metadescription' => 'Data Wilayah ' . FULLENGKAP,

            'datawilayah' => [$dusun, $rk, $rt, $CdRk, $CdRt, $value, $CdRtRk],
            'tabeldtb' => $this->datawilyahmodel->table,
            'dusuns' => $dusuns
        ];

        return view('admin/data-wilayah', $data);
    }

    public function Datadesa($kategori)
    {
        $kategori = str_replace("-", " ", $kategori);
        $kategori = ucwords($kategori);

        $valLkPr = $this->datadesamodel->select(['val_lk', 'val_pr'])->where('slug', $kategori)->findAll();

        if ($valLkPr == null) {
            return view('errors/html/error_404');
        }

        $totalPerdata = [];
        foreach ($valLkPr as $valvalLkPr) {
            $totalPerdata[] = array_sum($valvalLkPr);
        }


        $jkQuery = ['val_lk', 'val_pr'];
        $totalperJk = [];
        for ($i = 0; $i < 2; $i++) {
            $valJk = $this->datadesamodel->select($jkQuery[$i])->where('slug', $kategori)->findAll();

            $rowvalJk = [];
            foreach ($valJk as $Jk) {
                $rowvalJk[] = $Jk[$jkQuery[$i]];
            }

            $totalperJk[] = array_sum($rowvalJk);
        }

        $data = [
            'templatelayaout' => $this->templatelayaout,

            'title' => $kategori . ' ' . LENGKAP,
            'metakeywords' => $kategori . ' ' . FULLENGKAP . ', ' . $kategori . ' Terbaik,',
            'metadescription' => $kategori . ' ' . FULLENGKAP,

            'label' => $kategori,
            'datadesa' => $this->datadesamodel->where('slug', $kategori)->findAll(),
            'totalPerdata' => $totalPerdata,
            'totalJumlah' => array_sum($totalPerdata),
            'totalperjk' => $totalperJk,
            'tabeldtb' => $this->datadesamodel->table
        ];

        return view('admin/data-desa', $data);
    }

    public function aduan()
    {

        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

            'dataaduan' => $this->aduanmodel->orderBy('id', 'DESC')->findAll()
        ];

        return view('admin/aduan', $data);
    }

    public function daftarLembaga()
    {
        $data = [
            'title' => 'Desa ' . DESA,
            'templatelayaout' => $this->templatelayaout,
            'metakeywords' => null,
            'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

            'lembaga' => $this->lembagamodel->where('idGroup', '1')->findAll(),
            'tabeldtb' => $this->lembagamodel->table
        ];

        return view('admin/daftar-lembaga', $data);
    }
}

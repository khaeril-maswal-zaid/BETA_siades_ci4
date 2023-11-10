<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AduanModel;
use App\Models\ApiKemendesModel;
use App\Models\ArtikelModel;
use App\Models\CountViewersModel;
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
        $konfigurasimodel,
        $viewerswebmodel,

        $statusaduan,
        $aduanbelum;

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
        $this->viewerswebmodel = new CountViewersModel();

        $this->aduanbelum = $this->aduanmodel->where('status', 'Belum diproses')->countAllResults();
        $this->statusaduan = $this->aduanmodel->select('name, created_at')->where('status', 'Belum diproses')->findAll();
    }

    public function index()
    {
        $data = [
            'activeheader' => ['active', false, false, false, false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,
            'viewrsbyday' => $this->viewerswebmodel->getDataForDays(15),
            'viewrsbymonth' => $this->viewerswebmodel->getDataForMonths(),
            'viewrsbyyeart' => $this->viewerswebmodel->getDataForYears()
        ];

        return view('admin/index', $data);
    }

    public function blog()
    {
        $artikels = $this->artikelmodel->where('jenis', 'umum')->orderBy('id', 'DESC')->paginate(9, 'siades_bloger');
        $idforviewers = $this->artikelmodel->select('id')->where('jenis', 'umum')->orderBy('id', 'DESC')->paginate(9, 'siades_bloger');
        $data = [
            'activeheader' => [false, 'active', false, false, false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'artikels' => $artikels,
            'pager' => $this->artikelmodel->pager,
            'viewrsbyyeart' => $this->viewerswebmodel->getDataByPagies($idforviewers)
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

        if (!isset($dataartikel) && $slug) {
            return view('errors/html/error_404_admin');
        }

        //klw khusus maka active di ke 3
        if ($disabled == false) {
            $activeheader = [false, 'active', false, false, false, false, false];
        } else {
            $activeheader = [false, false, 'active', false, false, false, false];
        }


        if ($dataartikel) {
            $label = $dataartikel['judul'];
        } else {
            $label = str_replace("-", " ", $label);
        }

        $data = [
            'activeheader' => $activeheader,
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'dataupdate' => $dataartikel,
            'label' => $label,

            'validation' => $validation,
            'disabled' => $disabled
        ];

        session();
        return view('admin/blogAdd', $data);
    }

    public function sdgs($tahun = false)
    {
        if ($tahun == false) {
            $tahun = date('Y');
        }

        $datasdgs = $this->sdgsmodel->where('tahun', $tahun)->findAll();

        $data = [
            'activeheader' => [false, 'active', false, false, false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'datasdgs' => $datasdgs,
            'tahun' => $tahun,
        ];

        return view('admin/sdgs', $data);
    }

    public function sdgsApi($tahun = false)
    {
        if ($tahun == false) {
            $tahun = date('Y');
        }

        $konfigurasimodel = new KonfigurasiModel();
        $iddesasdgs = $konfigurasimodel->select('value')->where('slug', 'iddesasdgs-kmz-165')->first()['value'];

        $apikemendes = new ApiKemendesModel;
        $resultapisdgs = $apikemendes->sdgsApi($iddesasdgs);

        $data = [
            'activeheader' => [false, 'active', false, false, false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'datasdgs' => $resultapisdgs['data'],
            'tahun' => $tahun,

            'idapisdgs' => $this->konfigurasimodel->select(['id', 'value'])->where('slug', 'iddesasdgs-kmz-165')->first()
        ];

        return view('admin/sdgs-api', $data);
    }

    public function idm($tahun = false)
    {
        if ($tahun == false) {
            $tahun = date('Y');
        }

        $group = $this->idmmodel->select('group')->where('tahun', $tahun)->orderBy('id', 'ASC')->distinct()->findAll();

        $val = [];
        $skorIndexpergrup = [];
        for ($i = 0; $i < count($group); $i++) {

            //val val----------
            $valrow = $this->idmmodel->where(['group' => $group[$i], 'tahun' => $tahun])->findAll();
            $val[] = $valrow;

            $valskor = $this->idmmodel->select('skor')->where(['group' => $group[$i], 'tahun' => $tahun])->findAll();

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
            'activeheader' => [false, 'active', false, false, false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'dataidm' => [$group, $val, $skorIndexpergrup],
            'statusIdm' => $statusIdm,
            'tahun' => $tahun,

            'idapiidm' => $this->konfigurasimodel->select(['id', 'value'])->where('slug', 'iddesaidm-kmz-165')->first()
        ];

        return view('admin/idm', $data);
    }

    public function idmApi($tahun = false)
    {
        if ($tahun == false) {
            $tahun = date('Y');
        }

        $iddesaidm = $this->konfigurasimodel->select('value')->where('slug', 'iddesaidm-kmz-165')->first()['value'];

        $apikemendes = new ApiKemendesModel;
        $resultapiidm = $apikemendes->idmApi($iddesaidm, $tahun);

        if ($resultapiidm['status'] == '400') {
            return view('errors/html/error_404_admin');
        }
        $tabelapiidm = $resultapiidm['mapData']['ROW'];

        $data = [
            'activeheader' => [false, 'active', false, false, false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'tabelapiidm' => $tabelapiidm,
            'desaapiidm' => $resultapiidm['mapData']['IDENTITAS'][0]['nama_desa'],
            'tahun' => $tahun,

            'idapiidm' => $this->konfigurasimodel->select(['id', 'value'])->where('slug', 'iddesaidm-kmz-165')->first()
        ];

        return view('admin/idm-api', $data);
    }

    public function keuangan($tahun = false)
    {
        if ($tahun == false) {
            $tahun = date('Y');
        }

        //Ambil TITLE
        $title = $this->keuanganmodel->select('title')->where('tahun', $tahun)->distinct()->findAll();
        $subtitleAll = $this->keuanganmodel->select('subtitle')->where('tahun', $tahun)->distinct()->findAll();

        $subtitle = [];
        $values = [];
        for ($i = 0; $i < count($title); $i++) {

            //DATA SUBTITLE----------
            $subtitlerow = $this->keuanganmodel->select(['subtitle'])->where(['title' => $title[$i], 'tahun' => $tahun])->distinct()->findAll();
            $subtitle[] = $subtitlerow;

            $valuesrow = [];
            for ($ii = 0; $ii < count($subtitlerow); $ii++) {

                //DATA values---------
                $valuesrows = $this->keuanganmodel->where(['title' => $title[$i], 'tahun' => $tahun]);
                $valuesrows = $this->keuanganmodel->where('subtitle', $subtitlerow[$ii]['subtitle'])->distinct()->findAll();
                $valuesrow[] = $valuesrows;
            }
            $values[] = $valuesrow;
        }

        $data = [
            'activeheader' => [false, 'active', false, false, false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'keuangan' => [$title, $subtitle, $values],
            'subtitleAll' => $subtitleAll,
            'tabeldtb' => $this->keuanganmodel->table,
            'tahun' => $tahun,
        ];

        return view('admin/keuangan', $data);
    }

    public function visimisi()
    {
        $visimisimodel = $this->lembagamodel;
        $visimisi = $visimisimodel->select(['tentang', 'tupoksi', 'id'])->where('slug', 'visi-misi-desa')->first();

        if (!isset($visimisi)) {
            return view('errors/html/error_404_admin');
        }

        $data = [
            'activeheader' => [false, false, false, 'active', false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'visimisi' => ['visi' => $visimisi['tentang'], 'misi' => $visimisi['tupoksi'], 'idUpdate' => $visimisi['id']]
        ];

        return view('admin/visimisi', $data);
    }

    public function struktur()
    {
        $active = $this->personildesa->select('class')->where('slug', 'strukturdesa-kmz-165');
        $active = $this->personildesa->select('class')->where('class', 'active')->findAll();

        $data = [
            'activeheader' => [false, false, false, 'active', false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'personildesa' => $this->personildesa->personilAll('strukturdesa-kmz-165'),
            'tabeldtb' => $this->personildesa->table,
            'active' => count($active),
            'image' => $this->konfigurasimodel->select(['more', 'id'])->where('label', 'Struktur')->first()
        ];

        return view('admin/struktur', $data);
    }

    public function tupoksiPersonil($jabatan, $id)
    {
        $jabatan = ucfirst(str_replace("-", " ", $jabatan));
        $tupoksi = $this->lembagamodel->select(['tupoksi', 'id'])->where('namepage', $jabatan)->first();

        //Jika personilnya ada dan Tupoksinya belum ada
        if ($tupoksi == null) {
            $this->lembagamodel->addPages($jabatan);
            $tupoksi = $this->lembagamodel->select(['tupoksi', 'id'])->where('namepage', $jabatan)->first();
        }

        //Jika personil tidak ada
        $personildesa = $this->personildesa->where('id', convertToNumber($id))->first();
        if ($personildesa == null) {
            return view('errors/html/error_404_admin');
        }

        $data = [
            'activeheader' => [false, false, false, 'active', false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'tupoksi' => $tupoksi,
            'jabatan' => $jabatan,
            'personildesa' => $personildesa,
        ];

        return view('admin/tupoksi-personil', $data);
    }

    public function lembaga($sblembaga = null)
    {
        $lembaga = str_replace("-", " ", $sblembaga);
        $lembaga = strtolower($lembaga);

        $lembaga = $this->lembagamodel->where('nicknamepage', $lembaga)->first();

        if (!isset($lembaga)) {
            return view('errors/html/error_404_admin');
        }

        $active = $this->personildesa->select('class')->where('slug', $lembaga['slug']);
        $active = $this->personildesa->select('class')->where('class', 'active')->findAll();

        $data = [
            'activeheader' => $activeheader,
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

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
        $CdRt = [];

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
            'activeheader' => [false, false, false, false, false, 'active', false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

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
            return view('errors/html/error_404_admin');
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

        $datadesa = $this->datadesamodel->where('slug', $kategori)->findAll();

        //Supaya tdak ada string di value LK dan PR KARENA AKAN ERROR di aritmatika %
        foreach ($datadesa as &$subArray) {
            if (!is_numeric($subArray['val_lk'])) {
                $subArray['val_lk'] = 12345;
            }

            if (!is_numeric($subArray['val_pr'])) {
                $subArray['val_pr'] = 1234567;
            }
        }

        $data = [
            'activeheader' => [false, false, false, false, false, 'active', false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'label' => $kategori,
            'datadesa' => $datadesa,
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
            'activeheader' => [false, 'active', false, false, false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'dataaduan' => $this->aduanmodel->orderBy('id', 'DESC')->findAll()
        ];

        return view('admin/aduan', $data);
    }

    public function daftarLembaga()
    {
        $this->lembagamodel->where('idGroup', '1');
        $this->lembagamodel->where('nicknamepage !=', 'bpd');
        $this->lembagamodel->where('nicknamepage !=', 'lpm');
        $this->lembagamodel->where('nicknamepage !=', 'pkk');
        $this->lembagamodel->where('nicknamepage !=', 'karang taruna');

        $daftarlembaga = $this->lembagamodel->findAll();

        $data = [
            'activeheader' => [false, false, false, false, 'active', false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'lembaga' =>  $daftarlembaga,
            'tabeldtb' => $this->lembagamodel->table
        ];

        return view('admin/daftar-lembaga', $data);
    }

    public function daftarData()
    {
        $data = [
            'activeheader' => [false, false, false, false, false, 'active', false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'kategoridata' =>  $this->datadesamodel->select('id, slug, updated_by')->groupBy('slug')->findAll(),
            // 'kategoridata' =>  $this->datadesamodel->select('slug')->distinct()->findAll(),
            'tabeldtb' => $this->datadesamodel->table
        ];

        return view('admin/daftar-kategori-data', $data);
    }

    public function konfMedsos($conf)
    {
        $data = [
            'activeheader' => [false, false, false, false, false, false, 'active'],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'kategoriconf' =>  $this->konfigurasimodel->where('slug', $conf)->findAll(),
            'tabeldtb' => $this->konfigurasimodel->table
        ];

        return view('admin/daftar-conf-medsos', $data);
    }

    public function konfDusun($conf)
    {
        $data = [
            'activeheader' => [false, false, false, false, false, false, 'active'],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'kategoriconf' =>  $this->konfigurasimodel->where('slug', $conf)->findAll(),
            'tabeldtb' => $this->konfigurasimodel->table
        ];

        return view('admin/daftar-conf-dusun', $data);
    }

    public function konfAplikasi()
    {
        $data = [
            'activeheader' => [false, false, false, false, false, false, 'active'],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,

            'konftentang' =>  $this->konfigurasimodel->select('value')->where('slug', 'tentang-aplikasi-kmz-165')->first(),
            'konfalamat' =>  $this->konfigurasimodel->select('value')->where('slug', 'alamat-kantor-kmz-165')->first(),
            'tabeldtb' => $this->konfigurasimodel->table
        ];

        return view('admin/daftar-conf-aplikasi', $data);
    }

    public function profilAdmin()
    {
        $data = [
            'activeheader' => [false, false, false, false, false, false, 'active'],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,
        ];

        return view('admin/profil-admin', $data);
    }

    public function postPhoto()
    {
        $data = [
            'activeheader' => [false, false, false, false, false, false, false],
            'aduanbelum' => $this->aduanbelum,
            'statusaduan' => $this->statusaduan,
            'templatelayaout' => $this->templatelayaout,
            'carousels' => $this->konfigurasimodel->select(['more', 'id'])->where('label', 'Carousel')->findAll(4)
        ];

        return view('admin/konf-carousel', $data);
    }
}

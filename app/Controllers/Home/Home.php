<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;

use App\Models\PersonilDesaModel;
use App\Models\ArtikelModel;
use App\Models\CountViewersModel;
use App\Models\DataWilayahModel;
use App\Models\KonfigurasiModel;

class Home extends BaseController
{
   protected $templatelayaout;
   protected $personildesa;
   protected $artikelmodel;
   protected $datawilayah;
   protected $countviewersmodel;
   protected $konfigurasimodel;

   public function __construct()
   {
      $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
      $this->personildesa = new PersonilDesaModel();
      $this->artikelmodel = new ArtikelModel();
      $this->datawilayah = new DataWilayahModel();
      $this->countviewersmodel = new CountViewersModel();
      $this->konfigurasimodel = new KonfigurasiModel();
   }

   public function index()
   {
      $datawilayah = $this->datawilayah->select(['kk', 'l', 'p'])->findAll();

      $kk = [];
      $lk = [];
      $pr = [];

      foreach ($datawilayah as $val) {
         $kk[] = $val['kk'];
         $lk[] = $val['l'];
         $pr[] = $val['p'];
      }

      $data = [
         'title' => 'Desa ' . DESA,
         'templatelayaout' => $this->templatelayaout,
         'metakeywords' => null,
         'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

         'imagecrausel' => $this->konfigurasimodel->select('more')->where('label', 'Carousel')->findAll(),

         'personildesa' => $this->personildesa->personilAll('strukturdesa-kmz-165'),
         'artikels' => $this->artikelmodel->where('jenis', 'umum')->orderBy('id', 'DESC')->findAll(6),
         'potensi' => $this->artikelmodel->where('slug', 'potensi-desa')->first(),
         'statistik' => ['kk' => array_sum($kk), 'lk' => array_sum($lk), 'pr' => array_sum($pr)],
      ];

      $this->countviewersmodel->addViewers('home');
      return view('home/index', $data);
   }
}

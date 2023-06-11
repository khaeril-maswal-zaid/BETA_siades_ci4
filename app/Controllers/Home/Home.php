<?php

namespace App\Controllers\Home;

use App\Controllers\BaseController;

use App\Models\PersonilDesaModel;
use App\Models\ArtikelModel;

class Home extends BaseController
{
   protected $templatelayaout;
   protected $personildesa;
   protected $artikelmodel;

   public function __construct()
   {
      $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
      $this->personildesa = new PersonilDesaModel;
      $this->artikelmodel = new ArtikelModel();
   }

   public function index()
   {
      $data = [
         'title' => 'Desa ' . DESA,
         'templatelayaout' => $this->templatelayaout,
         'metakeywords' => null,
         'metadescription' => 'Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum',

         'personildesa' => $this->personildesa->personilAll('apdes-kmz-165'),
         'artikels' => $this->artikelmodel->orderBy('id', 'DESC')->findAll(6)
      ];

      return view('home/index', $data);
   }
}

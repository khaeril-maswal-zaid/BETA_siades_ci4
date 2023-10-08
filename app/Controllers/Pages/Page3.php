<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

use App\Models\PersonilDesaModel;
use App\Models\ArtikelModel;

class Page3 extends BaseController
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
         'templatelayaout' => $this->templatelayaout,

         'title' => 'Galeri ' . LENGKAP,
         'metakeywords' => 'Galeri ' . FULLENGKAP . ', Galeri Desa  Terbaik,',
         'metadescription' => 'Galeri ' . FULLENGKAP,

         'artikels' => $this->artikelmodel->orderBy('id', 'DESC')->paginate(9, 'siades_artikel'),
         'pager' => $this->artikelmodel->pager,
         'urutan' => ['first', 'second']
      ];

      return view('pages/page3', $data);
   }
}

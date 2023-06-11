<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

use App\Models\KonfigurasiModel;

class Page5 extends BaseController
{
   protected $templatelayaout;
   protected $konfigurasi;

   public function __construct()
   {
      $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
      $this->konfigurasi = new KonfigurasiModel;
   }

   public function index()
   {
      $data = [
         'templatelayaout' => $this->templatelayaout,

         'title' => 'Galeri ' . LENGKAP,
         'metakeywords' => 'Galeri ' . FULLENGKAP . ', Galeri Desa  Terbaik,',
         'metadescription' => 'Galeri ' . FULLENGKAP,

         'sosmed' => $this->konfigurasi->where('slug', 'sosial-media')->findAll()
      ];

      return view('pages/page5', $data);
   }
}

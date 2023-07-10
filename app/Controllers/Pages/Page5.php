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

         'title' => 'Kontak ' . LENGKAP,
         'metakeywords' => 'Kontak ' . FULLENGKAP . ', Kontak Desa  Terbaik,',
         'metadescription' => 'Kontak ' . FULLENGKAP,

         'sosmed' => $this->konfigurasi->where('slug', 'sosial-media')->findAll()
      ];

      return view('pages/page5', $data);
   }
}

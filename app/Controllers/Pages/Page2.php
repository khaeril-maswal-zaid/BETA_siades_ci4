<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

use App\Models\PersonilDesaModel;
use App\Models\Page1Model;

class Page2 extends BaseController
{
   protected $templatelayaout;
   protected $personildesa;

   public function __construct()
   {
      $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
      $this->personildesa = new PersonilDesaModel;
   }

   public function index()
   {
      $data = [
         'templatelayaout' => $this->templatelayaout,

         'title' => 'Struktur Pemerintahan ' . DESA,
         'metakeywords' => 'Struktur Pemerintahan ' . FULLENGKAP . ', Struktur Pemerintahan Desa Terbaik,',
         'metadescription' => 'Struktur Pemerintahan ' . FULLENGKAP,


         'personildesa' => $this->personildesa->personilAll('apdes-kmz-165')
      ];

      return view('pages/page2', $data);
   }

   public function detail($jabatan, $nama)
   {
      $jabatan = str_replace('-', ' ', $jabatan);
      $nama = str_replace('-', ' ', $nama);

      $personildesa = $this->personildesa->where('nama', $nama);
      $personildesa = $this->personildesa->where('jabatan', $jabatan);
      $personil = $personildesa->first();

      $tupoksilembaga = new Page1Model();
      $tupoksi = $tupoksilembaga->select('tupoksi')->where('namepage', $jabatan)->first()['tupoksi'];


      if (!isset($personil) || !isset($tupoksi)) {
         return view('errors/html/error_404');
      }

      $data = [
         'templatelayaout' => $this->templatelayaout,

         'title' => 'Struktur Pemerintahan' . DESA,
         'metakeywords' => 'Struktur Pemerintahan' . FULLENGKAP . ', ' . $jabatan . ', Struktur Pemerintahan Desa Terbaik,',
         'metadescription' => 'Struktur Pemerintahan ' . FULLENGKAP,


         'detailpersonil' => $personil,
         'tupoksilembaga' => $tupoksi,
      ];

      return view('pages/page2-detail', $data);
   }
}

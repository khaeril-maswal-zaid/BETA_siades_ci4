<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;
use App\Models\KonfigurasiModel;
use App\Models\PersonilDesaModel;
use App\Models\Page1Model;

class Page2 extends BaseController
{
   protected $templatelayaout;
   protected $personildesa;
   protected $konfigurasimodel;

   public function __construct()
   {
      $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
      $this->personildesa = new PersonilDesaModel;
      $this->konfigurasimodel = new KonfigurasiModel();
   }

   public function index()
   {
      $data = [
         'templatelayaout' => $this->templatelayaout,

         'title' => 'Struktur Pemerintahan ' . DESA,
         'metakeywords' => 'Struktur Pemerintahan ' . FULLENGKAP . ', Struktur Pemerintahan Desa Terbaik,',
         'metadescription' => 'Struktur Pemerintahan ' . FULLENGKAP,

         'personildesa' => $this->personildesa->personilAll('strukturdesa-kmz-165'),
         'imageorganiasi' => $this->konfigurasimodel->select('more')->where('slug', 'struktur-organisasi-kmz-165')->first(),

         'active' => [false, false, 'active', false, false, false]
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
      $tupoksi = $tupoksilembaga->select('tupoksi')->where('namepage', $jabatan)->first();

      if (!isset($personil) || !isset($tupoksi['tupoksi'])) {
         return view('errors/html/error_404');
      }

      $data = [
         'templatelayaout' => $this->templatelayaout,

         'title' => 'Struktur Pemerintahan ' . DESA,
         'metakeywords' => 'Struktur Pemerintahan' . FULLENGKAP . ', ' . $jabatan . ', Struktur Pemerintahan Desa Terbaik,',
         'metadescription' => 'Struktur Pemerintahan ' . FULLENGKAP,

         'detailpersonil' => $personil,
         'tupoksilembaga' => $tupoksi['tupoksi'],

         'active' => [false, false, 'active', false, false, false]
      ];

      return view('pages/page2-detail', $data);
   }
}

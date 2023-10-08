<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

use App\Models\PersonilDesaModel;
use App\Models\Page1Model;

class Page6 extends BaseController
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
      $this->personildesa->where('slug', 'strukturdesa-kmz-165');
      $personildesa = $this->personildesa->where('jabatan', 'Kepala Desa')->first();

      $visimisimodel = new Page1Model();
      $visimisi = $visimisimodel->select(['tentang', 'tupoksi'])->where('slug', 'visi-misi-desa')->first();

      if (!isset($personildesa) || !isset($visimisi)) {
         return view('errors/html/error_404');
      }

      $data = [
         'templatelayaout' => $this->templatelayaout,

         'title' => 'Struktur Pemerintahan' . DESA,
         'metakeywords' => 'Struktur Pemerintahan' . FULLENGKAP . ' Visi Misi Desa ',
         'metadescription' => 'Struktur Pemerintahan ' . FULLENGKAP,

         'detailpersonil' => $personildesa,
         'visimisi' => ['visi' => $visimisi['tentang'], 'misi' => $visimisi['tupoksi']]
      ];

      return view('pages/page6', $data);
   }
}

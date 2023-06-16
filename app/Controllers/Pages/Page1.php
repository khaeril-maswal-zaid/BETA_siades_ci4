<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

use App\Models\Page1Model;
use App\Models\PersonilDesaModel;

class Page1 extends BaseController
{
   protected $templatelayaout;
   protected $page1model;
   protected $personildesa;

   public function __construct()
   {
      $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
      $this->page1model = new Page1Model;
      $this->personildesa = new PersonilDesaModel;
   }

   public function index($slug)
   {
      $valuespage = $this->page1model->valuesPages1($slug);

      if (!isset($valuespage)) {
         return view('errors/html/error_404');
      }

      $data = [
         'templatelayaout' => $this->templatelayaout,

         'title' => $valuespage['nicknamepage'] . ' Desa ' . DESA,
         'metakeywords' => $valuespage['namepage'] . ' (' . $valuespage['nicknamepage'] . '), ' . FULLENGKAP . ', ' . $valuespage['nicknamepage'] . ' Desa Terbaik,',
         'metadescription' => $valuespage['metadescription'],

         'namalembaga' => $valuespage['namepage'],
         'singkatanlembaga' => $valuespage['nicknamepage'],
         'tentang' => $valuespage['tentang'],
         'tupoksi' => $valuespage['tupoksi'],

         'personildesa' => $this->personildesa->personilAll($slug)
      ];

      return view('pages/page1', $data);
   }
}

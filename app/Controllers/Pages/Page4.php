<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

use App\Models\DataWilayahModel;

class Page4 extends BaseController
{
   protected $templatelayaout;
   protected $datawilyahmodel;

   public function __construct()
   {
      $this->templatelayaout = ['layout-htmlcodex/header', 'layout-htmlcodex/footer'];
      $this->datawilyahmodel = new DataWilayahModel;
   }

   public function index()
   {

      $rk = [];
      $rt = [];
      $CdRk = [];
      $value = [];
      $CdRtRk = [];

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

      // dd($rt);

      $data = [
         'templatelayaout' => $this->templatelayaout,

         'title' => 'Daya Wilayah ' . LENGKAP,
         'metakeywords' => 'Daya Wilayah ' . FULLENGKAP . ', Daya Wilayah Desa  Terbaik,',
         'metadescription' => 'Daya Wilayah ' . FULLENGKAP,

         'datawilayah' => [$dusun, $rk, $rt, $CdRk, $CdRt, $value, $CdRtRk]
      ];

      return view('pages/page4', $data);
   }
}

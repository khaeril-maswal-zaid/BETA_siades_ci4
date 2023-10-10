<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content'); ?>

<section class="mb-md-4">
   <div class="container-fluid page-header py-5 mb-4 mb-md-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
      <div class="container text-center py-5">
         <h1 class="display-5 text-white mb-3 slideInDown">Situs Resmi</h1>
         <h1 class="display-4 text-white mb-2 slideInDown">Desa <?= DESA ?></h1>
      </div>
   </div>

   <!-- Petunjuk URL Start -->
   <div class="container-xxl">
      <div class="container">
         <div class="alert alert-success py-2" role="alert">
            <a href="/"><i class="bi bi-house-door-fill"></i></a>
            <span class="px-1">/</span>

            <span class="px-1">Statistik</span>
            <span class="px-1">/</span>

            <a href="/data-desa/data-wilayah">Data Wilayah</a>
         </div>
      </div>
   </div>
   <!-- Petunjuk URL Enad -->
</section>


<!-- Features Start -->
<section class="container-xxl py-3">
   <div class="container">

      <h1 class="display-5 text-primary">Data Wilayah</h1>
      <p class="fs-4 d-md-block d-none fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>
      <p class="d-md-none d-block fw-bold text-primary mb-5"><?= LENGKAP ?></p>

      <table class="table table-striped table-bordered">
         <thead>
            <tr class="text-center">
               <th scope="col">#</th>
               <th scope="col" colspan="3">Wilayah/Ketua</th>
               <th scope="col">KK</th>
               <th scope="col">L</th>
               <th scope="col">P</th>
               <th scope="col">L+P</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $iDusun = 0;
            $iNo = 1;
            foreach ($datawilayah[0] as $wilayah1) :
            ?>
               <tr class="#">
                  <th class="text-center align-middle" scope="row" rowspan="<?= $datawilayah[3][$iDusun++] + 1 + $datawilayah[4][$iDusun - 1] ?>"><?= $iNo++ ?></th>
                  <td colspan="3" class="ps-md-5 fw-bold">Dusun <?= $wilayah1['dusun'] ?></td>
                  <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][2] ?></td>
                  <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][0] ?></td>
                  <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][1] ?></td>
                  <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][0] + $datawilayah[5][$iDusun - 1][1] ?></td>
               </tr>

               <?php
               $iRk = 0;
               $noRk = 0;
               foreach ($datawilayah[1][$iDusun - 1] as $wilayah2) :
               ?>
                  <tr class="#">
                     <td class="text-center align-middle" rowspan="<?= count($datawilayah[2][$iDusun - 1][$noRk++]) + 1 ?>"><?= $noRk ?></td>
                     <td class="ps-md-4 fw-bold" colspan="2">RW <?= $wilayah2['rk'] ?></td>
                     <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][2] ?></td>
                     <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][0] ?></td>
                     <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][1] ?></td>
                     <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][0] + $datawilayah[6][$iDusun - 1][$iRk][1] ?></td>
                  </tr>

                  <?php $noRt = 1;
                  foreach ($datawilayah[2][$iDusun - 1][$iRk++] as $wilayah3) : ?>
                     <tr class="#">
                        <td class="text-center"><?= $noRt++ ?></td>
                        <td class="#">RT <?= $wilayah3['rt'] ?></td>
                        <td class="text-center"><?= $wilayah3['kk'] ?></td>
                        <td class="text-center"><?= $wilayah3['l'] ?></td>
                        <td class="text-center"><?= $wilayah3['p'] ?></td>
                        <td class="text-center">
                           <?php
                           $pr = [$wilayah3['p'], $wilayah3['l']];
                           echo array_sum($pr);
                           ?>
                        </td>
                     </tr>
                  <?php endforeach ?>
               <?php endforeach ?>
            <?php endforeach ?>
         </tbody>
      </table>
   </div>
</section>


<?php $this->endSection() ?>
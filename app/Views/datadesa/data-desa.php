<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content'); ?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
   <div class="container text-center py-5">
      <h1 class="display-5 text-white mb-3 slideInDown">Situs Resmi</h1>
      <h1 class="display-4 text-white mb-2 slideInDown">Desa <?= DESA ?></h1>
   </div>
</div>

<!-- Alamat Web Start -->
<div class="container">
   <div class="px-3">
      <div class="alert alert-success py-2" role="alert">
         <a href="/"><i class="bi bi-house-door-fill"></i></a>
         <span class="px-1">/</span>

         <a href="/statistik-desa">Statistik</a>
         <span class="px-1">/</span>

         <span class="text-success">Data Desa</span>
      </div>
   </div>
</div>
<!-- Alamat Web Start -->

<div class="container-fluid py-5">
   <div class="container-md">
      <h1 class="display-5 text-primary"><?= $label ?></h1>
      <p class="fs-5 fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>

      <table class="table table-striped table-bordered">
         <thead>
            <tr class="text-center">
               <th scope="col" rowspan="2" class="align-middle">#</th>
               <th scope="col" rowspan="2" class="align-middle">Kelompok</th>
               <th scope="col" colspan="2">Laki-laki</th>
               <th scope="col" colspan="2">Perempuan</th>
               <th scope="col" colspan="2">Jumlah</th>
            </tr>
            <tr class="text-center">
               <th scope="col">n</th>
               <th scope="col">%</th>
               <th scope="col">n</th>
               <th scope="col">%</th>
               <th scope="col">n</th>
               <th scope="col">%</th>
            </tr>
         </thead>

         <tbody>
            <?php
            $iNo = 1;
            foreach ($datadesa as $val) :
            ?>
               <tr class="#">
                  <td class="text-center"><?= $iNo++ ?></td>
                  <td class="#"><?= $val['label'] ?></td>
                  <td class="text-center"><?= $val['val_lk'] ?></td>
                  <td class="text-center"><?= number_format(($val['val_lk'] / $totalJumlah) * 100, 2) ?> %</td>
                  <td class="text-center"><?= $val['val_pr'] ?></td>
                  <td class="text-center"><?= number_format(($val['val_pr'] / $totalJumlah) * 100, 2) ?> %</td>
                  <td class="text-center"><?= $totalPerdata[$iNo - 2] ?></td>
                  <td class="text-center"><?= number_format(($totalPerdata[$iNo - 2] / $totalJumlah) * 100, 2) ?> %</td>
               </tr>
            <?php endforeach ?>
            <tr class="table-warning">
               <td class="text-center" colspan="2">JUMLAH</td>
               <td class="text-center"><?= $totalperjk[0] ?></td>
               <td class="text-center"><?= number_format(($totalperjk[0] / $totalJumlah) * 100, 2) ?> %</td>
               <td class="text-center"><?= $totalperjk[1] ?></td>
               <td class="text-center"><?= number_format(($totalperjk[1] / $totalJumlah) * 100, 2) ?> %</td>
               <td class="text-center"><?= $totalJumlah ?></td>
               <td class="text-center"><?= number_format(($totalperjk[0] / $totalJumlah) * 100, 2) + number_format(($totalperjk[1] / $totalJumlah) * 100, 2) ?> %</td>
            </tr>
         </tbody>

      </table>

      <figure class="highcharts-figure mt-5">
         <div id="container"></div>
      </figure>

      <div class="close">
         <script src="<?= base_url() ?>highcharts/highcharts.js"></script>
         <script src="<?= base_url() ?>highcharts/highcharts-3d.js"></script>
         <script src="<?= base_url() ?>highcharts/modules/exporting.js"></script>
         <script src="<?= base_url() ?>highcharts/modules/export-data.js"></script>
         <script src="<?= base_url() ?>highcharts/modules/accessibility.js"></script>

         <script type="text/javascript">
            // Data retrieved from https://olympics.com/en/olympic-games/beijing-2022/medals
            Highcharts.chart('container', {
               chart: {
                  type: 'pie',
                  options3d: {
                     enabled: true,
                     alpha: 45
                  }
               },
               title: {
                  text: '<?= $label ?>',
               },
               subtitle: {
                  text: '<?= LENGKAP ?>',
               },
               plotOptions: {
                  pie: {
                     innerSize: 100,
                     depth: 45,
                     allowPointSelect: true,
                     cursor: 'pointer',
                     dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                     }
                  }
               },
               series: [{
                  name: 'Medals',
                  data: [
                     <?php
                     $ii = 0;
                     foreach ($datadesa as $val) {
                        echo "['" . $val['label'] . "', " . $totalPerdata[$ii++] . "],";
                     }
                     ?>
                  ]
               }]
            });
         </script>
      </div>
   </div>
</div>



<?php $this->endSection() ?>
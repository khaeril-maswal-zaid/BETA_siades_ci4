<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content'); ?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
   <div class="container text-center py-5">
      <h1 class="display-5 text-white mb-3 slideInDown">Situs Resmi</h1>
      <h1 class="display-4 text-white mb-2 slideInDown">Desa <?= DESA ?></h1>
   </div>
</div>

<!-- Alamat Web Start -->
<div class="container-fluid">
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

<div class="container">
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

   </table>
</div>



<?php $this->endSection() ?>
<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content');
// dd($datawilayah[1]) 
?>

<section class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
  <div class="container text-center py-5">
    <h1 class="display-5 text-white mb-3 slideInDown">Situs Resmi</h1>
    <h1 class="display-4 text-white mb-2 slideInDown">Desa <?= DESA ?></h1>
  </div>
</section>

<!-- Petunjuk URL Start -->
<section class="container-xxl">
  <div class="container">
    <div class="alert alert-success py-2" role="alert">
      <a href="/"><i class="bi bi-house-door-fill"></i></a>
      <span class="px-1">/</span>
      <span class="px-1">SDGS Desa</span>
    </div>
  </div>
</section>
<!-- Petunjuk URL Enad -->

<!-- Features Start -->
<section class="container-xxl py-3">
  <div class="container">

    <h1 class="display-5 text-primary">SDGS Desa Tahun <?= $tahun ?></h1>
    <p class="fs-4 d-md-block d-none fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>
    <p class="d-md-none d-block fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>

    <div class="text-center mx-auto wow fadeInUp pt-lg-5 pb-lg-3" data-wow-delay="0.1s" style="max-width: 500px;">
      <h1 class="display-5">Skor SDGs Desa</h1>
      <h2 class="mb-5">Tidak Ada Data</h2>
    </div>

  </div>
</section>


<?php $this->endSection() ?>
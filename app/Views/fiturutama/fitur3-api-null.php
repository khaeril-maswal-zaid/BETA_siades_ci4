<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content'); ?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
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

      <span class="px-1">IDM Desa</span>
    </div>
  </div>
</div>
<!-- Petunjuk URL Enad -->

<!-- Features Start -->
<section class="container-xxl py-3">
  <div class="container">

    <h1 class="display-5 text-primary">IDM Desa Tahun <?= $tahun ?></h1>
    <p class="fs-4 d-md-block d-none fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>
    <p class="d-md-none d-block fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>

    <ul class="nav nav-tabs mb-5">
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y')) ? 'active' : ''; ?>" href="/status-idm/"><?= date('Y') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y') - 1) ? 'active' : ''; ?>" href="/status-idm/<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y') - 2) ? 'active' : ''; ?>" href="/status-idm/<?= date('Y') - 2 ?>"><?= date('Y') - 2 ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y') - 3) ? 'active' : ''; ?>" href="/status-idm/<?= date('Y') - 3 ?>"><?= date('Y') - 3 ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y') - 4) ? 'active' : ''; ?>" href="/status-idm/<?= date('Y') - 4 ?>"><?= date('Y') - 4 ?></a>
      </li>
    </ul>

    <div class="text-center mx-auto wow fadeInUp pt-lg-5 pb-lg-3" data-wow-delay="0.1s" style="max-width: 500px;">
      <h1 class="display-5">IDM Desa <?= $tahun ?></h1>
      <h2 class="mb-5">Tidak Ada Data</h2>
    </div>
  </div>
</section>

<?php $this->endSection() ?>
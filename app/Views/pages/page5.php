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

        <a href="/kontak-desa">Kontak Desa</a>
      </div>
    </div>
  </div>
  <!-- Petunjuk URL Enad -->
</section>


<!-- Features Start -->
<section class="container-xxl py-3">
  <div class="container">

    <div class="row g-5 align-items-center">
      <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">

        <h1 class="display-5 text-primary">Kontak Kami !</h1>
        <p class="fs-4 d-md-block d-none fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>
        <p class="d-md-none d-block fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>

        <div class="row mb-3">
          <?php foreach ($sosmed as $value) : ?>
            <div class="col-3">
              <h5 class="kontak-area"><?= $value['label'] ?></h5>
            </div>
            <div class="col-9">
              <h5 class="kontak-area">: <a href="<?= $value['more'] ?>"><?= $value['value'] ?></a></h5>
            </div>
          <?php endforeach ?>
        </div>

        <div class="aduan-area">
          <p class="mb-4">Kami sangat menghargai setiap masukan dan aduan dari Masyarakat. Jika Anda memiliki aduan atau keluhan yang perlu disampaikan kepada kami, silakan kunjungi laman Layanan Pengaduan!</p>
          <a class="btn btn-primary py-3 px-4" href="/layanan-pengaduan">Layanan Pengaduan</a>
        </div>
      </div>
      <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
        <h2 class="display-6 text-primary mb-3">Peta Desa <?= DESA ?></h2>

        <div class="border border-3 border-success rounded">
          <iframe src="<?= LINKMAPS ?>" width="100%" height="450" style="border: 0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</section>


<?php $this->endSection() ?>
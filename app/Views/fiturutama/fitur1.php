<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content');
// dd($datawilayah[1]) 
?>

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

      <span class="text-success">SDGS</span>
    </div>
  </div>
</div>
<!-- Alamat Web Start -->


<div class="container-xxl py-5">
  <div class="container">
    <h1 class="display-5 text-primary">Status SDGS</h1>
    <p class="fs-5 fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>

    <div class="row">
      <?php $no = 1; // Semesntara
      foreach ($sdgs as $value) : ?>
        <div class="col-md-2 col-sm-4 wow fadeInUp" data-wow-delay="0.1s">
          <div class="card mb-3 shadow bg-light border border-success rounded-3">
            <img src="/img/sdgs/skor-sdgs-<?= $no++ ?>.jpg" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <p class="card-text">Skor Nilai</p>
              <h5 class="card-title">43.64</h5>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>

  </div>
</div>


<?php $this->endSection() ?>
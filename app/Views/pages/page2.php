<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content') ?>

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

         <a href="/struktur-pemerintahan">Struktur Pemerintahan</a>
         <span class="px-1">/</span>

         <span class="text-success">Album</span>
      </div>
   </div>
</div>
<!-- Alamat Web Start -->

<!-- Aparat Start -->
<div class="container-fluid py-5">
   <h1 class="display-5 text-primary">Struktur Pemerintahan</h1>
   <p class="fs-5 fw-bold text-primary mb-5"><?= LENGKAP ?></p>

   <div class="row g-5 px-4">
      <div class="col-lg-5 wow fadeInUp mt-3 px-lg-0 px-3" data-wow-delay="0.1s">
         <div class="card border-success mb-3">
            <div class="card-header bg-light">Struktur Organisasi</div>
            <div class="card-body text-success px-4">
               <img src="/img/personil/struktur.jpg" alt="" class="img-fluid" />
            </div>
         </div>
      </div>

      <div class="col-lg-7 wow fadeInUp mt-3" data-wow-delay="0.1s">
         <div class="row">

            <?php foreach ($personildesa as $personil) : ?>
               <div class="col-md-4 mb-3 col-sm-6 px-lg-1 px-2">
                  <div class="wow fadeInUp bg-light p-3 pb-2 border-success border-4 border-start position-sticky" data-wow-delay="0.5s" style="top: 7rem">
                     <p class="fs-5 fw-bold text-primary"><?= $personil['nama'] ?></p>
                     <div class="team-item rounded wow fadeInUp mb-2" data-wow-delay="0.1s">
                        <img class="img-fluid" src="/img/personil/<?= $personil['foto'] ?>" alt="" />
                        <div class="team-text bottom-0 mb-3">
                           <h5 class="mb-0"><?= $personil['nama'] ?></h5>
                           <span><?= $personil['jabatan'] ?></span>
                           <div class="d-flex team-social mt-3">
                              <a class="btn btn-lg-square rounded-circle mx-2" href="/img/personil/<?= $personil['foto'] ?>" data-lightbox="aparatur"><i class="fa fa-eye"></i></a>
                              <a class="btn btn-lg-square rounded-circle mx-2" href="/struktur-pemerintahan/<?= url_title($personil['jabatan'], '-', true) ?>/<?= url_title($personil['nama'], '-', true) ?>"><i class="fa fa-link"></i></a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endforeach ?>
         </div>
      </div>
   </div>
</div>
<!-- Aparat End -->

<?php $this->endSection() ?>
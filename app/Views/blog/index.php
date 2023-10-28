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

            <a href="#">Informasi</a>
            <span class="px-1">/</span>

            <span class="text-success">Kabar Desa</span>
         </div>
      </div>
   </div>
   <!-- Petunjuk URL Enad -->
</section>

<!-- Features Start -->
<section class="container-xxl py-5">
   <div class="container">
      <div class="row g-5">
         <div class="col-lg-8 wow fadeInUp mt-2" data-wow-delay="0.1s">
            <img src="/img/blog/<?= $dataartikel['picture'] ?>" alt="<?= $dataartikel['picture'] ?>" class="mb-2 img-fluid w-100" style="object-fit: cover" />

            <div class="d-flex mb-lg-3 mb-3" style="font-size: 77%">
               <div class="align-items-center">
                  <img class="rounded-circle me-0" src="/img/admin/<?= $fotoadmin ?>" width="20" height="20" alt="<?= $fotoadmin ?>" />
                  <span class="m-1"><?= $dataartikel['oleh'] ?></span>
               </div>
               <div class="d-flex align-items-center">
                  <span class="ms-2"><i class="far fa-eye mr-2"></i> <?= $dataartikel['view'] ?></span>
               </div>
            </div>

            <h1 class="display-6 mb-lg-1 mb-2 text-uppercase">
               <?= $dataartikel['judul'] ?>
            </h1>

            <div class="mb-4" style="font-size: 77%">
               <span class="btn btn-primary btn-sm fw-semi-bold rounded-0 p-0 px-1 me-2">KABAR DESA</span>
               <span class="text-body">07 Maret 2023</span>
            </div>

            <div class="mb-4">
               <?= $dataartikel['artikel'] ?>
            </div>
         </div>
         <div class="col-lg-4 px-4 ps-lg-0 mt-lg-2">
            <div class="wow fadeInUp bg-light p-3 border-success border-4 border-start position-sticky" data-wow-delay="0.5s" style="top: 7rem">
               <!-- <div class="border-start ps-4"> -->
               <p class="fs-5 fw-bold text-primary">Aparatur Desa</p>
               <div class="carousel slide" id="aparatur-carousel" data-bs-ride="carousel">
                  <div class="carousel-inner">
                     <?php foreach ($personildesa as $personil) : ?>
                        <div class="carousel-item <?php if ($personil['class'] == 'active') echo $personil['class'] ?>" data-wow-delay="0.1s">
                           <div class="team-item rounded">
                              <img class="img-fluid" src="/img/personil/<?= $personil['foto'] ?>" alt="<?= $personil['nama'] ?>" />
                              <div class="team-text bottom-0 mb-3">
                                 <h5 class="mb-0"><?= $personil['nama'] ?></h5>
                                 <span><?= $personil['jabatan'] ?></span>
                                 <div class="d-flex team-social mt-3">
                                    <a class="btn btn-lg-square rounded-circle mx-2" href="/img/personil/team-1.jpg" data-lightbox="aparatur"><i class="fa fa-eye"></i></a>
                                    <a class="btn btn-lg-square rounded-circle mx-2" href="/struktur-pemerintahan/<?= url_title($personil['jabatan'], '-', true) ?>/<?= url_title($personil['nama'], '-', true) ?>"><i class="fa fa-link"></i></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php endforeach ?>
                  </div>

                  <button class="carousel-control-prev" type="button" data-bs-target="#aparatur-carousel" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#aparatur-carousel" data-bs-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="visually-hidden">Next</span>
                  </button>
               </div>
               <!-- </div> -->
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Features End -->


<?php $this->endSection() ?>
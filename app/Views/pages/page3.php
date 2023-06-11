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

<!-- Projects Start -->
<div class="container-xxl py-5">
   <div class="container">
      <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
         <p class="fs-5 fw-bold text-primary">Our Projects</p>
         <h1 class="display-5 mb-5">Some Of Our Wonderful Projects</h1>
      </div>
      <div class="row wow fadeInUp" data-wow-delay="0.3s">
         <div class="col-12 text-center">
            <ul class="list-inline rounded mb-5" id="portfolio-flters">
               <li class="mx-2 active" data-filter="*">All</li>
               <li class="mx-2" data-filter=".first">Complete Projects</li>
               <li class="mx-2" data-filter=".second">Ongoing Projects</li>
            </ul>
         </div>
      </div>
      <div class="row portfolio-containerX mb-3 ">

         <?php
         $i = count($artikels);
         foreach ($artikels as $artikel) : ?>
            <div class="col-lg-4 col-md-6 portfolio-item mb-3 <? $urutan[$i-- % 2] ?> wow fadeInUp" data-wow-delay="0.1s">
               <div class="portfolio-inner rounded" style="height: 15em;">
                  <img class="img-fluid h-100 w-100" src="/img/blog/<?= $artikel['picture'] ?>" alt="" style="object-fit: cover;">

                  <div class="portfolio-text px-3">
                     <h5 class="text-white text-center mb-4"><?= $artikel['judul'] ?></h5>
                     <div class="d-flex">
                        <a class="btn btn-lg-square rounded-circle mx-2" href="/img/blog/<?= $artikel['picture'] ?>" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-lg-square rounded-circle mx-2" href="/<?= $artikel['slug'] ?>/<?= $artikel['time'] ?>"><i class="fa fa-link"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         <?php endforeach ?>

      </div>
      <!-- //pagination CI4 -->
      <?= $pager->links('siades_artikel', 'newtemplate') ?>
   </div>
</div>
<!-- Projects End -->

<?php $this->endSection() ?>
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
            <span class="text-success">Visi Misi Desa</span>
         </div>
      </div>
   </div>
   <!-- Alamat Web Start -->
</section>

<!-- Features Start -->
<section class="container-xxl py-3">
   <div class="container">
      <div class="mb-5">
         <h1 class="display-5 text-primary">Visi Misi Desa</h1>

         <p class="fs-4 d-md-block d-none fw-bold text-primary mb-0"><?= FULLENGKAP ?></p>
         <p class="d-md-none d-block fw-bold text-primary mb-0"><?= LENGKAP ?></p>
      </div>

      <div class="row g-5 mt-1">
         <div class="col-lg-4 px-4 pe-lg-0 mt-2">
            <div class="wow fadeInUp bg-light p-3 pb-2 border-success border-4 border-start position-sticky" data-wow-delay="0.5s" style="top: 7rem">
               <p class="fs-5 fw-bold text-primary"><?= $detailpersonil['jabatan'] ?></p>
               <div class="team-item rounded wow fadeInUp mb-2" data-wow-delay="0.1s">
                  <img class="img-fluid" src="/img/personil/<?= $detailpersonil['foto'] ?>" alt="<?= $detailpersonil['nama'] ?>" />
                  <div class="team-text bottom-0 mb-3">
                     <h5 class="mb-0"><?= $detailpersonil['nama'] ?></h5>
                     <span><?= $detailpersonil['jabatan'] ?></span>
                     <div class="d-flex team-social mt-3">
                        <a class="btn btn-lg-square rounded-circle mx-2" href="/img/personil/<?= $detailpersonil['foto'] ?>" data-lightbox="aparatur"><i class="fa fa-eye"></i></a>
                        <a class="btn btn-lg-square rounded-circle mx-2" href="<?= generateWhatsappLink($detailpersonil['kontak'], $detailpersonil['nama']) ?>" target="_blank"><i class="fa fa-phone"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-lg-8 wow fadeInUp mt-lg-2" data-wow-delay="0.1s">
            <div class="card border-success mb-3">
               <div class="card-header bg-light">Biodata</div>
               <div class="card-body text-success px-4">
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">Jabatan</th>
                           <th scope="col">:</th>
                           <th scope="col"><?= $detailpersonil['jabatan'] ?></th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>Nama</td>
                           <td>:</td>
                           <td><?= $detailpersonil['nama'] ?></td>
                        </tr>
                        <tr>
                           <td>Alamat</td>
                           <td>:</td>
                           <td><?= $detailpersonil['alamat'] ?></td>
                        </tr>
                        <tr>
                           <td>pendidikan</td>
                           <td>:</td>
                           <td><?= $detailpersonil['pendidikan'] ?></td>
                        </tr>
                        <tr>
                           <td>No Hp (WhatsApp)</td>
                           <td>:</td>
                           <td><?= $detailpersonil['kontak'] ?></td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>

            <div class="card border-success mb-3">
               <div class="card-header bg-light">
                  Visi Desa
               </div>
               <div class="card-body"><?= $visimisi['visi'] ?></div>
            </div>
            <div class="card border-success mb-3">
               <div class="card-header bg-light">
                  Misi Desa
               </div>
               <div class="card-body"><?= $visimisi['misi'] ?></div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Features End -->

<?php $this->endSection() ?>
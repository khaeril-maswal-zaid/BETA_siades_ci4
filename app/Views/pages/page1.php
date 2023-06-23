<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content') ?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
   <div class="container text-center py-5">
      <h1 class="display-5 text-white mb-3 slideInDown">Situs Resmi</h1>
      <h1 class="display-4 text-white mb-2 slideInDown">Desa <?= DESA ?></h1>
   </div>
</div>

<!-- Petunjuk URL Start -->
<section class="container px-4 px-lg-2">
   <div class="alert alert-success py-2" role="alert">
      <a href="#"><i class="bi bi-house-door-fill"></i></a>
      <span class="px-1">/</span>

      <a href="#">Lembaga</a>
      <span class="px-1">/</span>

      <a href="#"><?= $singkatanlembaga ?></a>
   </div>
</section>
<!-- Petunjuk URL Enad -->

<!-- Features Start -->
<section class="container-xxl py-5">
   <div class="container">

      <h1 class="display-5 text-primary"><?= $namalembaga ?></h1>
      <p class="fs-5 fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>

      <div class="row g-5 mt-4">
         <div class="col-lg-4 px-4 pe-lg-0 mt-2">
            <div class="wow fadeInUp bg-light p-3 pb-2 border-success border-4 border-start position-sticky" data-wow-delay="0.5s" style="top: 6rem">
               <p class="fs-5 fw-bold text-primary">Personil <?= $singkatanlembaga ?></p>
               <div class="carousel slide mb-2" id="aparatur-carousel" data-bs-ride="carousel">
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
                                    <a class="btn btn-lg-square rounded-circle mx-2" href="/struktur-desa"><i class="fa fa-link"></i></a>
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

               <div class="d-flex" style="font-size: 70%">
                  <div class="align-items-center">
                     <img class="rounded-circle me-0" src="/img/team-1.jpg" width="25" height="25" alt="" />
                     <span class="m-1">Official Pintu Peradaban</span>
                  </div>
                  <div class="d-flex align-items-center">
                     <span class="ms-3"><i class="far fa-eye mr-2"></i>181</span>
                     <span class="ms-3"><i class="far fa-solid fa-user mr-2"></i>133</span>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-lg-8 wow fadeInUp mt-lg-2" data-wow-delay="0.1s">
            <main>
               <div class="card border-success mb-3">
                  <div class="card-header bg-light">Kepengurusan <?= $singkatanlembaga ?></div>
                  <div class="card-body text-success overflow-auto">
                     <table class="table table-striped">
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Jabatan</th>
                              <th scope="col">Alamat</th>
                              <th scope="col">Pendidikan</th>
                              <th scope="col">Kontak</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $no = 1;
                           foreach ($personildesa as $personil) : ?>
                              <tr>
                                 <th scope="row"><?= $no++ ?></th>
                                 <td><?= $personil['nama'] ?></td>
                                 <td><?= $personil['jabatan'] ?></td>
                                 <td><?= $personil['alamat'] ?></td>
                                 <td><?= $personil['pendidikan'] ?></td>
                                 <td><?= $personil['kontak'] ?></td>
                              </tr>
                           <?php endforeach ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class="card border-success mb-3">
                  <div class="card-header bg-light">Profil <?= $singkatanlembaga ?></div>
                  <div class="card-body text-success">
                     <?= $tentang ?>
                  </div>
               </div>
               <div class="card border-success mb-3">
                  <div class="card-header bg-light">Tugas Pokok & Fungsi <?= $singkatanlembaga ?></div>
                  <div class="card-body text-success"> <?= $tupoksi ?></div>
               </div>
            </main>
         </div>
      </div>
   </div>
</section>
<!-- Features End -->

<?php $this->endSection() ?>
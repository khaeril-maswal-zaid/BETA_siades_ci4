<!-- Topbar Start -->
<div class="container-fluid bg-dark text-light px-0 py-2">
   <div class="row gx-0 d-none d-lg-flex">
      <div class="col-lg-7 px-5 text-start">
         <div class="h-100 d-inline-flex align-items-center me-4">
            <a href="/admindes">
               <span class="fa fa-phone-alt me-2"></span>
               <span><?= TELPON ?></span>
            </a>
         </div>
         <div class="h-100 d-inline-flex align-items-center">
            <span class="far fa-envelope me-2"></span>
            <span><?= EMAIL ?></span>
         </div>
      </div>
      <div class="col-lg-5 px-5 text-end">
         <div class="h-100 d-inline-flex align-items-center mx-n2">
            <a class="btn btn-link text-light pe-2" href=""><i class="fa fa-globe"></i></a>
            <span>Kabupaten <?= KAB ?></span>
         </div>
      </div>
   </div>
</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand-md bg-white navbar-light sticky-top p-0">
   <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <h1 class="m-0">Desa <?= DESA ?></h1>
   </a>
   <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
         <a href="/" class="nav-item nav-link active">Beranda</a>

         <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Profil</a>
            <div class="dropdown-menu bg-light m-0">
               <a href="/profil-wilayah" class="dropdown-item">Profil Wilayah</a>
               <a href="/sejarah-desa" class="dropdown-item">Sejarah Desa</a>
               <a href="/galeri-desa" class="dropdown-item">Galeri Desa</a>
            </div>
         </div>
         <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pemerintahan</a>
            <div class="dropdown-menu bg-light m-0">
               <a href="/badan-permusyawaratan-desa" class="dropdown-item">Badan Permusyawaratan Desa (BPD)</a>
               <a href="/visi-misi-desa" class="dropdown-item">Visi Misi Desa</a>
               <a href="/struktur-pemerintahan" class="dropdown-item">Struktur Pemerintahan</a>
            </div>
         </div>
         <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kelembagaan</a>
            <div class="dropdown-menu bg-light m-0">

               <?php foreach (LEMABAGADESA as $lemabaga) : ?>
                  <?php

                  if ($lemabaga['namepage'] !=  $lemabaga['nicknamepage']) {
                     echo '<a href="/' . url_title($lemabaga['namepage'], '-', true) . '" class="dropdown-item">' . $lemabaga['namepage'] . ' (' . $lemabaga['nicknamepage'] . ')</a>';
                  } else {
                     echo '<a href="/' . url_title($lemabaga['namepage'], '-', true) . '" class="dropdown-item">' . $lemabaga['namepage'] . '</a>';
                  } ?>

               <?php endforeach ?>

            </div>
         </div>
         <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Data</a>
            <div class="dropdown-menu bg-light m-0">
               <a href="/data-desa/data-wilayah" class="dropdown-item">Data Wilayah</a>

               <?php foreach (KATEGORIDATADESA as $kategori) : ?>
                  <a href="/data-desa/<?= url_title($kategori['slug'], '-', true) ?>" class="dropdown-item"><?= $kategori['slug'] ?></a>
               <?php endforeach ?>

            </div>
         </div>
      </div>
      <a href="/kontak-desa" class="btn btn-primary py-4 px-md-4 rounded-0 d-none d-md-block">Kontak kami<i class="fa fa-arrow-right ms-3"></i></a>
      <a href="/kontak-desa" class="btn btn-primary rounded d-block d-md-none m-3 mb-5 py-2" style="max-height: 45px !important">Kontak kami<i class="fa fa-arrow-right ms-3"></i></a>
   </div>
</nav>
<!-- Navbar End -->
<div class="container-fluid position-relative bg-white d-flex p-0">
   <!-- Spinner Start -->
   <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
         <span class="sr-only">Loading...</span>
      </div>
   </div>
   <!-- Spinner End -->


   <!-- Sidebar Start -->
   <div class="sidebar pe-4 pb-3">
      <nav class="navbar bg-light navbar-light">
         <a href="/admindes" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary text-uppercase"><?= DESA ?></h3>
         </a>
         <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
               <img class="rounded-circle" src="/img/admin/<?= user()->image ?>" alt="<?= user()->image ?>" style="width: 40px; height: 40px;">
               <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
               <h6 class="mb-0"><?= batasiKarakter(user()->fullname, 13); ?>...</h6>
               <span>Admin</span>
            </div>
         </div>
         <div class="navbar-nav w-100">
            <a href="/admindes" class="nav-item nav-link <?= $activeheader[0] ?>"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle <?= $activeheader[1] ?>" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Informasi Publik</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="/admindes/kabar-desa" class="dropdown-item">Kabar Desa</a>
                  <a href="/admindes/keuangan-desa" class="dropdown-item">Keuangan Desa</a>
                  <a href="/admindes/status-idm" class="dropdown-item">Status IDM</a>
                  <a href="/admindes/status-sdgs" class="dropdown-item">Status SDGs</a>
                  <a href="/admindes/aduan-masyarakat" class="dropdown-item">Aduan Masyarakat</a>
               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle <?= $activeheader[2] ?>" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Profil Desa</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="/admindes/profil-wilayah" class="dropdown-item">Profil Wilayah</a>
                  <a href="/admindes/sejarah-desa" class="dropdown-item">Sejarah Desa</a>
                  <!-- <a href="masih-belum" class="dropdown-item">Galeri Desa</a> -->
                  <a href="/admindes/potensi-desa" class="dropdown-item">Potensi Desa</a>
               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle <?= $activeheader[3] ?>" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pemerintahan</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="/admindes/bpd" class="dropdown-item">BPD</a>
                  <a href="/admindes/visi-misi" class="dropdown-item">Visi Misi</a>
                  <a href="/admindes/struktur-desa" class="dropdown-item">Struktur Desa</a>
               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle <?= $activeheader[4] ?>" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Kelembagaan</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="/admindes/lpm" class="dropdown-item">LPM</a>
                  <a href="/admindes/pkk" class="dropdown-item">PKK</a>
                  <a href="/admindes/karang-taruna" class="dropdown-item">Karang Taruna</a>
                  <?php foreach (LEMABAGADESA as $lemabaga) : ?>
                     <a href="/admindes/<?= url_title($lemabaga['nicknamepage'], '-', true) ?>" class="dropdown-item"><?= $lemabaga['nicknamepage'] ?></a>
                  <?php endforeach ?>

                  <a href="/admindes/daftar-lembaga" class="dropdown-item bg-warning">Tambah Lembaga</a>
               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle <?= $activeheader[5] ?>" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Data Desa</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="/admindes/data-desa/data-wilayah" class="dropdown-item">Data Wilayah</a>

                  <?php foreach (KATEGORIDATADESA as $kategori) : ?>
                     <a href="/admindes/data-desa/<?= url_title($kategori['slug'], '-', true) ?>" class="dropdown-item"><?= $kategori['slug'] ?></a>
                  <?php endforeach ?>

                  <a href="/admindes/daftar-kategori-data" class="dropdown-item bg-warning">Tambah Kategori Data</a>
               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle <?= $activeheader[6] ?>" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Konfigurasi SID</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="/admindes/daftar-dusun" class="dropdown-item">Dusun</a>
                  <a href="/admindes/daftar-media-sosial" class="dropdown-item">Media Sosial</a>
                  <a href="/admindes/konf-aplikasi" class="dropdown-item">Aplikasi</a>
                  <a href="/admindes/konf-carousel" class="dropdown-item">Carousel</a>
               </div>
            </div>

         </div>
      </nav>
   </div>
   <!-- Sidebar End -->


   <!-- Content Start -->
   <div class="content">
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
         <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
            <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
         </a>
         <a href="#" class="sidebar-toggler flex-shrink-0">
            <i class="fa fa-bars"></i>
         </a>
         <form class="d-none d-md-flex ms-4">
            <input class="form-control border-0" type="search" placeholder="Search">
         </form>
         <div class="navbar-nav align-items-center ms-auto">
            <div class="nav-item dropdown">
               <a href="<?= base_url('mail') ?>" class="nav-link">
                  <i class="fa fa-envelope me-lg-2"></i>
                  <span class="d-none d-lg-inline-flex">Message</span>
               </a>
            </div>

            <div class="nav-item dropdown">

               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <i class="fa fa-bell me-lg-2">
                     <?= ($aduanbelum) ?
                        '<span class="position-absolute translate-middle badge rounded-pill bg-danger">
                        ' . $aduanbelum . '
                           <span class="visually-hidden">KMZ Alzaid</span>
                        </span>' : ''
                     ?>
                  </i>
                  <span class="d-none d-lg-inline-flex">Notificatin</span>
               </a>
               <!-- <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0"> -->
               <div class="dropdown-menu dropdown-menu-end bg-light shadow m-0">

                  <?php foreach ($statusaduan as $aduans) : ?>
                     <a href="/admindes/aduan-masyarakat" class="dropdown-item">
                        <h6 class="fw-normal mb-0"><?= $aduans['name'] ?> mengirimkan aduan</h6>
                        <small><?= $aduans['created_at'] ?></small>
                     </a>
                     <hr class="dropdown-divider">
                  <?php endforeach ?>
                  <!-- <a href="#" class="dropdown-item text-center">See all notifications</a> -->
               </div>
            </div>
            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <img class="rounded-circle me-lg-2" src="/img/admin/<?= user()->image ?>" alt="<?= user()->image ?>" style="width: 40px; height: 40px;">
                  <span class="d-none d-lg-inline-flex"><?= user()->fullname ?></span>
               </a>
               <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                  <a href="/admindes/myprofil" class="dropdown-item">My Profile</a>
                  <!-- <a href="#" class="dropdown-item">Settings</a> -->
                  <a href="<?= base_url('logout') ?>" class="dropdown-item">Log Out</a>
               </div>
            </div>
         </div>
      </nav>
      <!-- Navbar End -->
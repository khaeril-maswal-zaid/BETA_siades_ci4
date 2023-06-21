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
               <img class="rounded-circle" src="/img/admin/testimonial-1.jpg" alt="" style="width: 40px; height: 40px;">
               <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
               <h6 class="mb-0">Jhon Doe</h6>
               <span>Admin</span>
            </div>
         </div>
         <div class="navbar-nav w-100">
            <a href="/admindes" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Informasi Publik</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="/admindes/kabar-desa" class="dropdown-item">Kabar Desa</a>
                  <a href="/admindes/keuangan-desa" class="dropdown-item">Keuangan Desa</a>
                  <a href="/admindes/status-idm" class="dropdown-item">Status IDM</a>
                  <a href="/admindes/status-sdgs" class="dropdown-item">Status SDGs</a>
                  <a href="/admindes/" class="dropdown-item">Aduan Masyarakat</a>
               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Profil Desa</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="/admindes/profil-desa/profil-wilayah" class="dropdown-item">Profil Wilayah</a>
                  <a href="signup.html" class="dropdown-item">Sejarah Desa</a>
                  <a href="404.html" class="dropdown-item">Galeri Desa</a>
                  <a href="blank.html" class="dropdown-item">Potensi Desa</a>
               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pemerintahan</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="signin.html" class="dropdown-item">BPD</a>
                  <a href="signup.html" class="dropdown-item">Visi Misi</a>
                  <a href="404.html" class="dropdown-item">Struktur Desa</a>
               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Kelembagaan</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <?php foreach (LEMABAGADESA as $lemabaga) : ?>
                     <a href="signin.html" class="dropdown-item"><?= $lemabaga['nicknamepage'] ?></a>
                  <?php endforeach ?>

                  <a href="404.html" class="dropdown-item">Tambah Lembaga</a>
               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Data Desa</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="signin.html" class="dropdown-item">Data Wilayah</a>

                  <?php foreach (KATEGORIDATADESA as $kategori) : ?>
                     <a href="signin.html" class="dropdown-item"><?= $kategori['slug'] ?></a>
                  <?php endforeach ?>

               </div>
            </div>

            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Konfigurasi SID</a>
               <div class="dropdown-menu bg-transparent border-0">
                  <a href="signin.html" class="dropdown-item">Belum</a>
               </div>
            </div>

            <!-- <a href="widget.html" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a> -->

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
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <i class="fa fa-envelope me-lg-2"></i>
                  <span class="d-none d-lg-inline-flex">Message</span>
               </a>
               <div class="dropdown-menu dropdown-menu-end bg-light shadow m-0">
                  <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="/img/admin/testimonial-1.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="ms-2">
                           <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                           <small>15 minutes ago</small>
                        </div>
                     </div>
                  </a>
                  <hr class="dropdown-divider">
                  <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="/img/admin/testimonial-1.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="ms-2">
                           <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                           <small>15 minutes ago</small>
                        </div>
                     </div>
                  </a>
                  <hr class="dropdown-divider">
                  <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="/img/admin/testimonial-1.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="ms-2">
                           <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                           <small>15 minutes ago</small>
                        </div>
                     </div>
                  </a>
                  <hr class="dropdown-divider">
                  <a href="#" class="dropdown-item text-center">See all message</a>
               </div>
            </div>
            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <i class="fa fa-bell me-lg-2"></i>
                  <span class="d-none d-lg-inline-flex">Notificatin</span>
               </a>
               <!-- <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0"> -->
               <div class="dropdown-menu dropdown-menu-end bg-light shadow m-0">
                  <a href="#" class="dropdown-item">
                     <h6 class="fw-normal mb-0">Profile updated</h6>
                     <small>15 minutes ago</small>
                  </a>
                  <hr class="dropdown-divider">
                  <a href="#" class="dropdown-item">
                     <h6 class="fw-normal mb-0">New user added</h6>
                     <small>15 minutes ago</small>
                  </a>
                  <hr class="dropdown-divider">
                  <a href="#" class="dropdown-item">
                     <h6 class="fw-normal mb-0">Password changed</h6>
                     <small>15 minutes ago</small>
                  </a>
                  <hr class="dropdown-divider">
                  <a href="#" class="dropdown-item text-center">See all notifications</a>
               </div>
            </div>
            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                  <img class="rounded-circle me-lg-2" src="/img/admin/testimonial-1.jpg" alt="" style="width: 40px; height: 40px;">
                  <span class="d-none d-lg-inline-flex">John Doe</span>
               </a>
               <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                  <a href="#" class="dropdown-item">My Profile</a>
                  <a href="#" class="dropdown-item">Settings</a>
                  <a href="#" class="dropdown-item">Log Out</a>
               </div>
            </div>
         </div>
      </nav>
      <!-- Navbar End -->
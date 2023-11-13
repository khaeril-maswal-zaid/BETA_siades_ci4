<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>SID Admin - Login</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="Sistem Informasi Desa, SID, Website Desa Terbaik" name="keywords" />
   <meta content="Sistem Informasi Desa, SID, Website Desa Terbaik" name="description" />

   <!-- Favicon -->
   <link href="<?= base_url('img/assets/icon.png') ?>" rel="icon" />

   <!-- Google Web Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
   <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet" />

   <!-- Icon Font Stylesheet -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

   <!-- Libraries Stylesheet -->
   <link href="<?= base_url() ?>lib/animate/animate.min.css" rel="stylesheet" />
   <link href="<?= base_url() ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
   <link href="<?= base_url() ?>lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

   <!-- Customized Bootstrap Stylesheet -->
   <link href="<?= base_url() ?>css/bootstrap.min.css" rel="stylesheet" />

   <!-- Template Stylesheet -->
   <link href="<?= base_url() ?>css/style.css" rel="stylesheet" />

   <!-- Highcharts Stylesheet -->
   <link href="<?= base_url() ?>css/highcharts.css" rel="stylesheet" />

   <!-- Tambahan Stylesheet -->
   <link href="<?= base_url() ?>css/kmz_style.css" rel="stylesheet" />
</head>

<body>
   <!-- Navbar Start -->
   <nav class="navbar navbar-expand-md bg-white navbar-light sticky-top p-0">
      <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
         <h1 class="m-0">Admin SiDesa</h1>
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

               </div>
            </div>
            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pemerintahan</a>
               <div class="dropdown-menu bg-light m-0">

               </div>
            </div>
            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kelembagaan</a>
               <div class="dropdown-menu bg-light m-0">

               </div>
            </div>
            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Data</a>
               <div class="dropdown-menu bg-light m-0">

               </div>
            </div>
         </div>
         <a href="/kontak-desa" class="btn btn-primary py-4 px-md-4 rounded-0 d-none d-md-block">Kontak kami<i class="fa fa-arrow-right ms-3"></i></a>
         <a href="/kontak-desa" class="btn btn-primary rounded d-block d-md-none m-3 mb-5 py-2" style="max-height: 45px !important">Kontak kami<i class="fa fa-arrow-right ms-3"></i></a>
      </div>
   </nav>

   <!-- Spinner Start -->
   <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem"></div>
   </div>
   <!-- Spinner End -->

   <?= $this->renderSection('content') ?>

   <!-- Back to Top -->
   <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

   <!-- JavaScript Libraries -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="<?= base_url() ?>lib/wow/wow.min.js"></script>
   <script src="<?= base_url() ?>lib/easing/easing.min.js"></script>
   <script src="<?= base_url() ?>lib/waypoints/waypoints.min.js"></script>
   <script src="<?= base_url() ?>lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="<?= base_url() ?>lib/counterup/counterup.min.js"></script>
   <script src="<?= base_url() ?>lib/parallax/parallax.min.js"></script>
   <script src="<?= base_url() ?>lib/isotope/isotope.pkgd.min.js"></script>
   <script src="<?= base_url() ?>lib/lightbox/js/lightbox.min.js"></script>

   <!-- JavaScript Highcharts -->
   <!-- DIPASANG LANGSUNG DI VIEWNYA -->

   <!-- Template Javascript -->
   <script src="<?= base_url() ?>js/main.js"></script>
   <script src="<?= base_url() ?>js/kmz_script.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= 'Desa ' . DESA ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

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
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem"></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <span class="fa fa-phone-alt me-2"></span>
                    <span><?= TELPON ?></span>
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
                <a href="/" class="nav-item nav-link">Beranda</a>

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
                        <a class="dropdown-item" href="/lembaga-pemberdayaan-desa">Lembaga Pemberdayaan Desa (LPM)</a>
                        <a class="dropdown-item" href="/pembinaan-kesejahteraan-keluarga">Pemberdayaan Kesejahteraan Keluarga (PKK)</a>
                        <a class="dropdown-item" href="/karang-taruna">Karang Taruna</a>

                        <?php foreach (LEMABAGADESA as $lemabaga) : ?>
                            <?php

                            if ($lemabaga['namepage'] !=  $lemabaga['nicknamepage']) {
                                echo '<a href="/lembaga/' . url_title($lemabaga['namepage'], '-', true) . '" class="dropdown-item">' . $lemabaga['namepage'] . ' (' . $lemabaga['nicknamepage'] . ')</a>';
                            } else {
                                echo '<a href="/lembaga/' . url_title($lemabaga['namepage'], '-', true) . '" class="dropdown-item">' . $lemabaga['namepage'] . '</a>';
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

    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
                    <h1 class="display-1">404</h1>
                    <h1 class="mb-4">Page Not Found</h1>
                    <p class="mb-4">Maaf, halaman yang Anda cari tidak ada di situs web kami! Silahkan kembali ke beranda kami atau coba gunakan pencarian!</p>
                    <a class="btn btn-primary py-3 px-4" href="/">Kembali Ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-3 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6">
                    <h4 class="text-white mb-4">Tentang</h4>
                    <p><?= TENTANGAPLIKASI ?></p>
                </div>
                <div class="col-lg-4 col-md-6 px-4 px-lg-0">
                    <h4 class="text-white mb-4">Kontak</h4>
                    <p class="mb-2">
                        <i class="fa fa-map-marker-alt me-3"></i><?= ALAMATKAONTOR ?>
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-phone-alt me-3"></i><?= TELPON . ", " . WHATSAPP ?>
                    </p>
                    <p class="mb-2">
                        <i class="fa fa-envelope me-3"></i><?= EMAIL ?>
                    </p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="<?= LINKINSTAGRAM ?>"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="<?= LINKFACEBOOK ?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href="<?= LINKYOUTUBE ?>"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Layanan</h4>
                    <a class="btn btn-link" href="/admindes">Admin</a>
                    <a class="btn btn-link" href="#">Direktori</a>

                    <p class="btn btn-link">Penelusuran</p>
                    <div class="position-relative w-100">
                        <input class="form-control bg-light border-light w-100 py-3 ps-4 pe-5" type="text" />
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                            Cari
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Desa <?= DESA ?></a>, All
                    Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By
                    <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

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

    <!-- Template Javascript -->
    <script src="<?= base_url() ?>js/main.js"></script>
</body>

</html>
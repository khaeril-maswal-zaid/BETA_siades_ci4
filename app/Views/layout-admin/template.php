<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Admin Sidaes | <?= user()->fullname ?></title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="Website Desa <?= DESA ?>, Desa terbaik, Website desa terbaik, <?= DESA ?>" name="keywords">
   <meta content="Website Resmi Desa Pakubalaho serta merupakan platform online yang dirancang secara khusus untuk memberikan kemudahan dalam berkomunikasi dan bertukar informasi antara pemerintah desa, warga desa, dan masyarakat umum" name="description">

   <!-- Favicon -->
   <link href="<?= base_url('img/assets/icon.png') ?>" rel="icon" />

   <!-- Google Web Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

   <!-- Icon Font Stylesheet -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link href="<?= base_url() ?>admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="<?= base_url() ?>admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

   <!-- Customized Bootstrap Stylesheet -->
   <link href="<?= base_url() ?>admin/css/bootstrap.min.css" rel="stylesheet">

   <!-- Template Stylesheet -->
   <link href="<?= base_url() ?>admin/css/style.css" rel="stylesheet">
   <link href="<?= base_url() ?>admin/css/kmz_style_admin.css" rel="stylesheet">
</head>

<body>

   <?= $this->include($templatelayaout[0]) ?>
   <?= $this->renderSection('content') ?>
   <?= $this->include($templatelayaout[1]) ?>


   <!-- JavaScript Libraries -->
   <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   <script src="<?= base_url() ?>admin/lib/chart/chart.min.js"></script>
   <script src="<?= base_url() ?>admin/lib/easing/easing.min.js"></script>
   <script src="<?= base_url() ?>admin/lib/waypoints/waypoints.min.js"></script>
   <script src="<?= base_url() ?>admin/lib/owlcarousel/owl.carousel.min.js"></script>
   <script src="<?= base_url() ?>admin/lib/tempusdominus/js/moment.min.js"></script>
   <script src="<?= base_url() ?>admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
   <script src="<?= base_url() ?>admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

   <!-- Template Javascript -->
   <script src="<?= base_url() ?>admin/js/kmz_script_admin.js"></script>
   <script src="<?= base_url() ?>js/kmz_script.js"></script>
   <script src="<?= base_url() ?>admin/js/main.js"></script>
</body>

</html>
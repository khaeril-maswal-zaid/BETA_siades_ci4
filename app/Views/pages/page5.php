<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content');
// dd($datawilayah[1]) 
?>

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

      <span class="text-success">Kontak Kami</span>
    </div>
  </div>
</div>
<!-- Alamat Web Start -->


<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5 align-items-center">
      <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
        <h1 class="display-5 text-primary">Kontak Kami !</h1>
        <p class="fs-5 fw-bold text-primary mb-4">Desa <?= DESA ?></p>
        <div class="row mb-3">
          <?php foreach ($sosmed as $value) : ?>
            <div class="col-3">
              <h5><?= $value['label'] ?></h5>
            </div>
            <div class="col-9">
              <h5>: <?= $value['value'] ?></h5>
            </div>
          <?php endforeach ?>
        </div>
        <div class="aduan-area">
          <p class="mb-4">Kami sangat menghargai setiap masukan dan aduan dari Masyarakat. Jika Anda memiliki aduan atau keluhan yang perlu disampaikan kepada kami, silakan kunjungi laman Layanan Pengaduan!</p>
          <a class="btn btn-primary py-3 px-4" href="/layanan-pengaduan">Layanan Pengaduan</a>
        </div>
      </div>
      <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
        <h2 class="display-6 text-primary mb-3">Peta Desa <?= DESA ?></h2>

        <div class="border border-3 border-success rounded">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12428.04460640446!2d120.41324731012118!3d-5.488315148052575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbc0972e26dcbb5%3A0x32c1c4177d63233d!2sPakubalaho%2C%20Kec.%20Bonto%20Tiro%2C%20Kabupaten%20Bulukumba%2C%20Sulawesi%20Selatan!5e0!3m2!1sid!2sid!4v1684291021556!5m2!1sid!2sid" width="100%" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $this->endSection() ?>
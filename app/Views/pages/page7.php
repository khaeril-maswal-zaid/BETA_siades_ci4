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

        <a href="/kontak-desa">Layanan Pengaduan</a>
      </div>
    </div>
  </div>
  <!-- Petunjuk URL Enad -->
</section>


<!-- Features Start -->
<section class="container-xxl py-3">
  <div class="container">

    <h1 class="display-5 text-primary">Layanan Pengaduan</h1>
    <p class="fs-4 d-md-block d-none fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>
    <p class="d-md-none d-block fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>

    <div class="row">
      <div class="col-md-5 wow fadeInUp" data-wow-delay="0.1s">

        <?php if (session()->getFlashdata('pesan')) : ?>
          <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
          </svg>
          <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
              <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
              <?= session()->getFlashdata('pesan') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        <?php endif ?>

        <form action="/post-layanan-pengaduan" method="post" enctype="multipart/form-data">
          <?= csrf_field() ?>
          <input type="hidden" name="nomoraduan" value="<?= date('ymd') . random_string('numeric', 4) ?>">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input value="<?= old('email') ?>" autofocus name="email" type="email" class="form-control <?= ($validation[0]) ? 'is-invalid' : ''; ?>" id="email" placeholder="Email Anda">
                <label for="email">Email*</label>
                <div class="invalid-feedback">
                  Email wajib diisi & Valid Email
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating">
                <input value="<?= old('nik') ?>" name="nik" type="text" class="form-control" id="nik" placeholder="NIK Anda" maxlength="16">
                <label for="nik">NIK</label>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating">
                <input value="<?= old('name') ?>" name="name" type="text" class="form-control <?= ($validation[1]) ? 'is-invalid' : ''; ?>" id="name" placeholder="Nama Anda">
                <label for="name">Nama*</label>
                <div class="invalid-feedback">
                  Nama wajib diisi & tidak lebih 150 karakter
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-floating">
                <input value="<?= old('hp') ?>" name="hp" type="text" class="form-control" id="hp" placeholder="No Hp Anda">
                <label for="hp">No Hp</label>
              </div>
            </div>

            <div class="col-12">
              <div class="form-floating">
                <input value="<?= old('subject') ?>" name="subject" type="text" class="form-control <?= ($validation[2]) ? 'is-invalid' : ''; ?>" id="subject" placeholder="Subject">
                <label for="subject">Subjek*</label>
                <div class="invalid-feedback">
                  Subjek wajib diisi & tidak lebih 200 karakter
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea name="pengaduan" class="form-control <?= ($validation[3]) ? 'is-invalid' : ''; ?>" id="message" style="height: 200px"><?= old('pengaduan') ?></textarea>
                <label for="message">Isi Pengaduan*</label>
                <div class="invalid-feedback">
                  Isi Pengaduan wajib diisi & tidak lebih 1000 karakter
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floatingX">
                <label for="file" class="form-label">File Lampiran (jpg, jpeg, png)</label>
                <input value="<?= old('fileaduan') ?>" name="fileaduan" type="file" class="form-control <?= ($validation[4]) ? 'is-invalid' : ''; ?>" id="file" placeholder="Subject">
                <div class="invalid-feedback">
                  <?= ($validation[3]) ? $validation[3] : ''; ?>
                </div>
              </div>
            </div>
            <div class="col-12 mb-5">
              <div class="d-grid gap-2">
                <button class="btn btn-primary d-block d-md-none" type="submit">Kirim Aduan</button>
              </div>
              <button class="btn btn-primary py-3 px-4 d-none d-md-block" type="submit">Kirim Aduan</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-7 border border-2 border-success rounded wow fadeInUp" data-wow-delay="0.5s">
        <div class="p-4">
          <h2 class="text-primary mb-0">Riwayat Pengaduan:</h2>

          <div class="owl-carousel testimonial-carousel">

            <?php foreach ($dataaduan as $aduan) : ?>
              <div class="testimonial-item">

                <?php foreach ($aduan as $value) : ?>
                  <div class="mt-4 border rounded p-3 bg-light">
                    <h4><?= $value['name'] ?></h4>
                    <div class="#">
                      <span class="fw-bold">Subjek: <?= $value['subject'] ?></span>
                      <?php if ($value['file']) : ?>
                        <span id="file" class="badge rounded-pill bg-danger">File<span class="visually-hidden">unread messages</span></span>
                      <?php endif ?>
                    </div>

                    <div class="overflow-hidden mb-2 mt-1" style="height: 5.7em;">
                      <p class="fs-5"><?= $value['aduan'] ?></p>
                    </div>
                    <button data-id="<?= $value['id'] ?>" class="btn btn-warning btn-sm modelAduan" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      Selengkapnya
                    </button>
                  </div>
                <?php endforeach ?>

              </div>
            <?php endforeach ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal -->
<section class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">LAYANAN PENGADUAN</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-light">
        <div class="row">
          <div class="col-md-7">
            <div class="card">
              <div class="card-header">
                <span id="nama">Khaeril Maswal Zaid</span>
                <span id="status" class="badge bg-secondary float-end">Aman diproses</span>
              </div>
              <div class="card-body">
                <div id="lampiran" style="height: 13em;" class="overflow-hidden mb-3">
                  <img src="/imgc/aduan/default.jpg" alt="default" class="">
                </div>
                <h5 id="subjectm" class="card-title">Subjek: Penawaran Domain Website Desa</h5>
                <p id="aduan" class="card-text">Kami senang dapat menyediakan layanan domain website desa untuk memperkuat kehadiran online dan mempromosikan potensi dan informasi penting dari Desa Wakanda Raya</p>
              </div>
            </div>
          </div>

          <div class="col-md-5">
            <div class="card">
              <div class="card-header">
                <span id="nama">Respon</span>
              </div>
              <div class="card-body">
                <h5 id="noaduan" class="card-title">No. Aduan: 7777777777</h5>
                <p id="respon" class="card-text">
                  Respon Balik dari admin
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



<?php $this->endSection() ?>
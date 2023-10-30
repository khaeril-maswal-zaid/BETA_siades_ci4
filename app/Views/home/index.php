<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content'); ?>

<!-- Carousel Start -->
<section class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="/img/assets/carousel-1.jpg" alt="Image" />
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <h1 class="display-6 text-white mb-5 animated slideInDown">
                                    Website Resmi <br />
                                    <?= LENGKAP ?>
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="/img/assets/carousel-2.jpg" alt="Image" />
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <h1 class="display-6 text-white mb-5 animated slideInDown">
                                    Pintu Informasi Desa <br />
                                    Transparan, Terpercaya dan Terkini
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<!-- Carousel End -->

<!-- Fitur Utama Start -->
<section class="container-fluid top-feature pb-lg-4 pt-lg-0">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5 portfolio-inner" style="min-height: 160px">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" fill="#198754" class="bi bi-cash-stack" viewBox="0 0 16 16">
                                <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1H1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4z" />
                                <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V5zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2H3z" />
                            </svg>
                        </div>
                        <div class="ps-3">
                            <h4>Keuangan Desa</h4>
                            <span>Membangun kesejahteraan melalui informasi yang jelas</span>
                        </div>
                    </div>
                    <div class="portfolio-text">
                        <h4 class="text-white mb-2 mt-5">Selengkapnya...</h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="/keuangan-dasa"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5 portfolio-inner" style="min-height: 160px">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                            <svg xmlns="http://www.w3.org/2000/svg" height="20" fill="#198754" class="bi bi-building-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z" />
                                <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v6.5a.5.5 0 0 1-1 0V1H3v14h3v-2.5a.5.5 0 0 1 .5-.5H8v4H3a1 1 0 0 1-1-1V1Z" />
                                <path d="M4.5 2a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm-6 3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm3 0a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z" />
                            </svg>
                        </div>
                        <div class="ps-3">
                            <h4>Status IDM</h4>
                            <span>Afirmasi, integrasi, dan sinergi pembangunan </span>
                        </div>
                    </div>
                    <div class="portfolio-text">
                        <h4 class="text-white mb-2 mt-5">Selengkapnya...</h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="/status-idm"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white shadow d-flex align-items-center h-100 px-5 portfolio-inner" style="min-height: 160px">
                    <div class="d-flex">
                        <div class="flex-shrink-0 btn-lg-square rounded-circle bg-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" fill="#198754" class="bi bi-gear-wide" viewBox="0 0 16 16">
                                <path d="M8.932.727c-.243-.97-1.62-.97-1.864 0l-.071.286a.96.96 0 0 1-1.622.434l-.205-.211c-.695-.719-1.888-.03-1.613.931l.08.284a.96.96 0 0 1-1.186 1.187l-.284-.081c-.96-.275-1.65.918-.931 1.613l.211.205a.96.96 0 0 1-.434 1.622l-.286.071c-.97.243-.97 1.62 0 1.864l.286.071a.96.96 0 0 1 .434 1.622l-.211.205c-.719.695-.03 1.888.931 1.613l.284-.08a.96.96 0 0 1 1.187 1.187l-.081.283c-.275.96.918 1.65 1.613.931l.205-.211a.96.96 0 0 1 1.622.434l.071.286c.243.97 1.62.97 1.864 0l.071-.286a.96.96 0 0 1 1.622-.434l.205.211c.695.719 1.888.03 1.613-.931l-.08-.284a.96.96 0 0 1 1.187-1.187l.283.081c.96.275 1.65-.918.931-1.613l-.211-.205a.96.96 0 0 1 .434-1.622l.286-.071c.97-.243.97-1.62 0-1.864l-.286-.071a.96.96 0 0 1-.434-1.622l.211-.205c.719-.695.03-1.888-.931-1.613l-.284.08a.96.96 0 0 1-1.187-1.186l.081-.284c.275-.96-.918-1.65-1.613-.931l-.205.211a.96.96 0 0 1-1.622-.434L8.932.727zM8 12.997a4.998 4.998 0 1 1 0-9.995 4.998 4.998 0 0 1 0 9.996z" />
                            </svg>
                        </div>
                        <div class="ps-3">
                            <h4>Stasus SDGS</h4>
                            <span>Penanganan keluhan dan masukan masyarakat</span>
                        </div>
                    </div>
                    <div class="portfolio-text">
                        <h4 class="text-white mb-2 mt-5">Selengkapnya...</h4>
                        <div class="d-flex">
                            <a class="btn btn-lg-square rounded-circle mx-2" href="/sdgs-desa"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fitur Utama End -->

<!-- Jadwal Sholat -->
<section class="container pb-3 pb-lg-4 mb-3">
    <div class="row">
        <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
            <div class="py-4 ps-3 bg-success mb-2 rounded">
                <h6 class="fw-bold text-white">
                    <i class="bi bi-clock pe-2"></i> Jadwal Sholat Kab. Bulukumba
                </h6>
                <i class="bi bi-calendar-date text-white pe-2"></i>
                <span class="fst-italic text-white">Selasa, 17 Oktober 2023</span>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="row px-2">
                <div class="col-4 col-lg-2 mb-2 wow fadeInDown px-1" data-wow-delay="0.3s">
                    <div class="rounded shadow py-2 text-center border border-success">
                        <span class="text-sm tracking-widest capitalize text-primary">
                            <img src="img/assets/moon.png" alt="Imsak" width="37" /><span>Imsak</span>
                        </span>

                        <h3 class="card-subtitle mt-2 mb-1">04:34</h3>
                    </div>
                </div>
                <div class="col-4 col-lg-2 mb-2 wow fadeInDown px-1" data-wow-delay="0.3s">
                    <div class="rounded shadow py-2 text-center border border-success">
                        <span class="text-sm tracking-widest capitalize text-primary">
                            <img src="img/assets/moon.png" alt="Subuh" width="37" /><span>Subuh</span>
                        </span>

                        <h3 class="card-subtitle mt-2 mb-1">04:34</h3>
                    </div>
                </div>
                <div class="col-4 col-lg-2 mb-2 wow fadeInDown px-1" data-wow-delay="0.3s">
                    <div class="rounded shadow py-2 text-center border border-success">
                        <span class="text-sm tracking-widest capitalize text-primary">
                            <img src="img/assets/moon.png" alt="Isyah" width="37" /><span>Isyah</span>
                        </span>

                        <h3 class="card-subtitle mt-2 mb-1">04:34</h3>
                    </div>
                </div>
                <div class="col-4 col-lg-2 mb-2 wow fadeInDown px-1" data-wow-delay="0.3s">
                    <div class="rounded shadow py-2 text-center border border-success">
                        <span class="text-sm tracking-widest capitalize text-primary">
                            <img src="img/assets/moon.png" alt="Zhuhur" width="37" /><span>Zhuhur
                            </span>
                        </span>

                        <h3 class="card-subtitle mt-2 mb-1">04:34</h3>
                    </div>
                </div>
                <div class="col-4 col-lg-2 mb-2 wow fadeInDown px-1" data-wow-delay="0.3s">
                    <div class="rounded shadow py-2 text-center border border-success">
                        <span class="text-sm tracking-widest capitalize text-primary">
                            <img src="img/assets/moon.png" alt="Ashar" width="37" /><span>Ashar</span>
                        </span>

                        <h3 class="card-subtitle mt-2 mb-1">04:34</h3>
                    </div>
                </div>
                <div class="col-4 col-lg-2 mb-2 wow fadeInDown px-1" data-wow-delay="0.3s">
                    <div class="rounded shadow py-2 text-center border border-success">
                        <span class="text-sm tracking-widest capitalize text-primary">
                            <img src="img/assets/moon.png" alt="Maghrib" width="37" /><span style="font-size: 80%">Maghrib</span>
                        </span>

                        <h3 class="card-subtitle mt-2 mb-1">04:34</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Jadwal Sholat End-->

<!-- <hr class="d-block d-lg-none my-auto wow fadeIn" data-wow-delay="0.3s" style="max-width: 87%; margin: 0px auto"/> -->

<!-- Potensi Start -->
<section class="container-xxl pt-3 pb-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-md-8 col-lg-9">
                <div class="row">
                    <div class="col-lg-4 col-sm-5 col-md-12 wow fadeInUp mb-3" data-wow-delay="0.1s">
                        <img class="img-fluid rounded d-none d-sm-block d-md-none d-lg-block" data-wow-delay="0.1s" src="img/blog/<?= $potensi['picture'] ?>" />
                        <img class="img-fluid rounded d-block d-md-block d-sm-none d-lg-none" data-wow-delay="0.1s" src="img/blog/<?= $potensi['picture'] ?>" />
                    </div>

                    <div class="col-lg-8 col-sm-7 col-md-12 wow fadeInUp ps-lg-2 pe-lg-4 mh-100" data-wow-delay="0.3s">
                        <h1 class="display-4 text-primary mb-2">
                            Potensi Desa <?= DESA ?>
                        </h1>
                        <h3 class="-"><?= $potensi['judul'] ?></h3>
                        <p class="mb-4 overflow-hidden">
                            <?= batasiKarakter($potensi['description'], 457) ?>
                            BUAT DESKRIPSINYA DENGAN MAKSIMAL 457 + CONTOH JUDUL "Potensi Limbah Kulit Jagung"
                        </p>
                        <a class="btn btn-primary btn-sm py-2 px-3" href="/potensi-desa">Selengkapnya...</a>
                    </div>
                </div>
            </div>

            <!-- <hr class="d-block d-lg-none" style="max-width: 95%; margin: 0px auto;" data-wow-delay="0.5s"> -->

            <div class="col-md-4 col-lg-3 px-0">
                <div class="wow fadeInUp bg-light p-3 border-start position-sticky" data-wow-delay="0.5s" style="top: 6rem">
                    <!-- <div class="border-start ps-4"> -->
                    <p class="fs-5 fw-bold text-primary">
                        <a href="/struktur-pemerintahan">Aparatur Desa</a>
                    </p>
                    <div class="carousel slide" id="aparatur-carousel" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            <?php foreach ($personildesa as $personil) : ?>
                                <div class="carousel-item <?php if ($personil['class'] == 'active') echo $personil['class'] ?>" data-wow-delay="0.1s">
                                    <div class="team-item rounded">
                                        <img class="img-fluid" src="/img/personil/<?= $personil['foto'] ?>" alt="<?= $personil['nama'] ?>" />
                                        <div class="team-text bottom-0 mb-3">
                                            <h5 class="mb-0"><?= $personil['nama'] ?></h5>
                                            <span><?= $personil['jabatan'] ?></span>
                                            <div class="d-flex team-social mt-3">
                                                <a class="btn btn-lg-square rounded-circle mx-2" href="/img/personil/<?= $personil['foto'] ?>" data-lightbox="aparatur"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-lg-square rounded-circle mx-2" href="/struktur-pemerintahan/<?= url_title($personil['jabatan'], '-', true) ?>/<?= strtolower(str_replace(' ', '-', $personil['nama'])) ?>"><i class="fa fa-link"></i></a>
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
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Potensi End -->

<!-- Facts Start -->
<section class="container-fluid facts my-5 py-5" data-parallax="scroll" data-image-src="/img/assets/carousel-1.jpg">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="display-4 text-white" data-toggle="counter-up"><?= $statistik['lk'] ?></h1>
                <span class="fs-5 fw-semi-bold text-light">Penduduk Laki-Laki</span>
            </div>
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                <h1 class="display-4 text-white" data-toggle="counter-up"><?= $statistik['pr'] ?></h1>
                <span class="fs-5 fw-semi-bold text-light">Penduduk Perempuan</span>
            </div>
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                <h1 class="display-4 text-white" data-toggle="counter-up"><?= $statistik['lk'] + $statistik['pr'] ?></h1>
                <span class="fs-5 fw-semi-bold text-light">Jumlah Penduduk</span>
            </div>
            <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                <h1 class="display-4 text-white" data-toggle="counter-up"><?= $statistik['kk'] ?></h1>
                <span class="fs-5 fw-semi-bold text-light">Jumlah Keluarga</span>
            </div>
        </div>
    </div>
</section>
<!-- Facts End -->

<!-- Berita Start -->
<section class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
            <p class="fs-5 fw-bold text-primary"><?= dateIna_helper() ?></p>
            <h1 class="display-5 mb-5">Kabar Desa Terkini</h1>
        </div>
        <div class="row g-4">

            <?php foreach ($artikels as $artikel) : ?>
                <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded d-flex h-100">
                        <div class="service-img rounded">
                            <img class="img-fluid" src="/img/blog/<?= $artikel['picture'] ?>" alt="<?= $artikel['picture'] ?>" />
                        </div>
                        <div class="service-text rounded p-5 w-100">
                            <div class="btn-square rounded-circle mx-auto mb-3">
                                <img class="img-fluid" src="img/assets/icon-6.png" alt="Icon" />
                            </div>
                            <h4 class="mb-4">
                                <?= $artikel['judul'] ?>
                            </h4>
                            <a class="btn btn-sm" href="/<?= $artikel['slug'] . '/' . $artikel['time'] ?>"><i class="fa fa-plus text-primary me-2"></i>Read More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</section>
<!-- Berita End -->

<!-- Maps dan Flayer Start -->
<section class="container-xxl p-lg-5 bg-light mt-4">
    <!-- <div class="container"> -->
    <div class="row align-items-centerX">
        <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-5 text-primary mb-3">Peta Desa <?= DESA ?></h1>

            <div class="overflowhidden border border-3 border-success rounded">
                <iframe src="<?= LINKMAPS ?>" width="100%" height="450" style="border: 0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="col-lg-4 px-3 pt-4 px-lg-0 wow fadeInDown" data-wow-delay="0.1s">
            <div class="bg-primary mt-5 p-5 rounded">
                <h2 class="text-white">Layanan Pengaduan</h2>
                <h4 class="text-white pb-2">Desa <?= DESA ?></h4>

                <div class="aduan-area mt-4 pe-4">
                    <p class="mb-5 text-white">Kami sangat menghargai setiap masukan dan aduan dari Masyarakat. Jika Anda memiliki aduan atau keluhan yang perlu disampaikan kepada kami, silakan kunjungi laman Layanan Pengaduan!</p>
                    <a class="btn btn-warning py-3 px-4" href="/layanan-pengaduan">Layanan Pengaduan</a>
                </div>
            </div>

            <!-- <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <div class="row g-4">
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="text-center rounded p-2" style="box-shadow: 0 0 45px rgba(0, 0, 0, 0.08)">
                                <a href="/img/flayer/flayer-1.jpg" data-lightbox="flayer">
                                    <img class="img-fluid" src="/img/flayer/flayer-1.jpg" alt="" />
                                </a>
                            </div>
                        </div>
                        <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                            <div class="text-center rounded p-2" style="box-shadow: 0 0 45px rgba(0, 0, 0, 0.08)">
                                <a href="/img/flayer/flayer-2.jpg" data-lightbox="flayer">
                                    <img class="img-fluid" src="/img/flayer/flayer-2.jpg" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                    <div class="text-center rounded p-2" style="box-shadow: 0 0 45px rgba(0, 0, 0, 0.08)">
                        <a href="/img/flayer/flayer-3.jpg" data-lightbox="flayer">
                            <img class="img-fluid" src="/img/flayer/flayer-3.jpg" alt="" />
                        </a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- </div> -->
</section>
<!-- Maps dan Flayer End -->

<?php $this->endSection() ?>
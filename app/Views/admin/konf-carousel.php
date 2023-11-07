<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table">Carousel SIDES <?= DESA ?></h1>
        </div>
    </div>

    <?php if (session()->getFlashdata('updateData')) : ?>
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
                <?= session()->getFlashdata('updateData') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <?php foreach ($carousels as $key =>  $value) : ?>
        <div class="card border-primary mb-3">
            <div class="card-header bg-primary text-white">
                <span class="d-inline text-white fs-5">Image Carousel <?= $key + 1 ?></span>
                <button type="button" class="float-end btn btn-warning btn-sm button-ganti" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-bakal-name-image="carousel-<?= $key + 1 ?>" data-id-carousel="<?= $value['id'] ?>" data-img="<?= $value['more'] ?>">Ganti</button>
            </div>
            <div class="card-body">
                <img src="/img/assets/<?= $value['more'] ?>" class="img-fluid img-thumbnail" alt="Carousel <?= $key + 1 ?>">
            </div>
        </div>
    <?php endforeach ?>
</main>

<!-- Modal Add -->
<form action="/adm-proses/update-carousel" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog parent-control-post-foto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Struktur Pemerintahan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="W-100 uploaded mb-2">
                        <img src="<?= "/img/assets/carousel-default.jpg"; ?>" id="csimg" class="img-thumbnail img-fluid" alt="default">
                    </div>

                    <div class="">
                        <input class="form-control form-control-sm imgtarget" id="vwImgtarget" type="file">
                        <input type="hidden" value="carousel" class="labelimgajax">
                        <input type="hidden" value="carousel" id="idCarousel">
                    </div>

                    <div class="alert alert-danger d-none pesan-error mt-3" role="alert">
                        BUG dev.by KMZ
                    </div>

                    <div class="position-absolute start-0 end-0 top-0 text-center bg-white" id="blockspinner" style="height: 100%;">
                        <div class="spinner-border text-info position-relative top-50" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="subnit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->endSection() ?>
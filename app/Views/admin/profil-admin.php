<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table">Profil Admin SIDES <?= DESA ?></h1>
            <!-- Karena diusahakan ambil data di API -->
            <!-- <button class="btn btn-success">Tambah Data</button> -->
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

    <div class="row">
        <div class="col-md-4">
            <form action="/adm-proses/update-foto/<?= convertToLetter(user_id()) ?>" method="post">
                <?= csrf_field() ?>

                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white">
                        <span class="d-inline text-white fs-5">Foto Admin</span>
                        <button type="submit" class="float-end btn btn-warning btn-sm update-data">Submit</button>
                    </div>
                    <div class="card-body parent-control-post-foto">
                        <div class="uploaded mb-3">
                            <img src="/img/admin/<?= user()->image ?>" alt="<?= user()->image ?>" class="img-fluid">
                        </div>

                        <div class="alert alert-danger d-none pesan-error mb-3" role="alert">
                            BUG dev.by KMZ
                        </div>

                        <div class="-">
                            <input type="hidden" class="labelimgajax" value="<?= user()->fullname ?>">
                            <input class="form-control form-control-sm imgtarget" id="formFileSm" type="file">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8">
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white">
                    <span class="d-inline text-white fs-5">Informasi Admin</span>
                </div>
                <div class="card-body">
                    <table class="table" data-tabelsiades="<?= caesarCipherReverse('users'); ?>" id="<?= url_title('Profil Admin SIDES ' . DESA, '-', true) ?>">
                        <thead>
                            <tr>
                                <th scope="col">Email</th>
                                <th scope="col">:</th>
                                <th scope="col"><?= user()->email ?></th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter(user_id()) ?>" data-colum="<?= caesarCipherReverse('fullname'); ?>"><?= user()->fullname ?></td>
                                <td class="text-center"><span class="badge bg-secondary">Double Clik "Nama" for Edit</span></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td>Terverifikasi</td>
                                <td class="text-center"><a href="/forgot" class="btn btn-sm btn-primary">Edit</a></td>
                            </tr>
                            <tr>
                                <td>Amanah Sides</td>
                                <td>:</td>
                                <td><? ?></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</main>

<?php $this->endSection() ?>
<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table">Ubah Paswoard SIDES <?= DESA ?></h1>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <span class="text-white fs-5">Masukkan Email Anda</span>
                </div>
                <div class="card-body">
                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <!-- <p><?= lang('Auth.enterEmailForInstructions') ?></p> -->

                    <form action="<?= url_to('forgot') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                            <label for="email">Email address</label>

                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">Kirim Permintaan</button>
                    </form>
                </div>
                <div class="p-3">
                    <p class="form-label">Sudah punya token? Klik tombol di bawah!</p>
                    <a href="/reset-password" class="btn btn-warning">Input Token</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">
                    <span class="text-white fs-5">Informasi</span>
                </div>
                <div class="card-body">


                </div>
            </div>
        </div>
    </div>

</main>

<?php $this->endSection() ?>
<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table">Reset Paswoard SIDES <?= DESA ?></h1>
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

                    <!-- <p><?= lang('Auth.enterCodeEmailPassword') ?></p> -->

                    <form action="<?= url_to('reset-password') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control <?php if (session('errors.token')) : ?>is-invalid<?php endif ?>" name="token" placeholder="<?= lang('Auth.token') ?>" value="<?= old('token', $token ?? '') ?>">
                            <label for="token"><?= lang('Auth.token') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.token') ?>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                            <label for="email"><?= lang('Auth.email') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <br>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="true">
                            <label for="password"><?= lang('Auth.newPassword') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.password') ?>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="true">
                            <label for="pass_confirm"><?= lang('Auth.newPasswordRepeat') ?></label>
                            <div class="invalid-feedback">
                                <?= session('errors.pass_confirm') ?>
                            </div>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-success btn-block"><?= lang('Auth.resetPassword') ?></button>
                    </form>
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
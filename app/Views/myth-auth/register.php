<?php $this->extend('myth-auth/template') ?>
<?php $this->section('content'); ?>

<!-- Quote Start -->
<div class="container-fluid py-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="bg-light rounded p-4 p-sm-5 wow fadeInUp border border-success" data-wow-delay="0.1s">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h2 class="display-5 mb-5"><?= lang('Auth.register') ?></h2>
                    </div>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= url_to('register') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="row g-3">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control border-0 <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" name="email">
                                    <label for="email"><?= lang('Auth.email') ?></label>
                                    <!-- <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small> -->
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="teks" class="form-control border-0 <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" id="username">
                                    <label for="username"><?= lang('Auth.username') ?></label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control border-0 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" name="password" placeholder="<?= lang('Auth.password') ?>" value="<?= old('password') ?>" id="password">
                                    <label for="password"><?= lang('Auth.password') ?></label>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control border-0 <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" name="pass_confirm" placeholder="<?= lang('Auth.repeatPassword') ?>" value="<?= old('pass_confirm') ?>" id="pass_confirm">
                                    <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                </div>
                            </div>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary py-3 px-4" type="submit"><?= lang('Auth.register') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quote End -->


<?php $this->endSection() ?>
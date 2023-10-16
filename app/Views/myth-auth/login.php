<?php $this->extend('myth-auth/template') ?>
<?php $this->section('content'); ?>

<!-- Quote Start -->
<div class="container-fluid py-5">
    <div class="container"> 
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="bg-light rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.1s">

                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h2 class="display-5 mb-5"><?= lang('Auth.loginTitle') ?></h2>
                    </div>

                    <?= view('Myth\Auth\Views\_message_block') ?>

                    <form action="<?= url_to('login') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="row g-3">

                            <?php if ($config->validFields === ['email']) : ?>
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" id="login" placeholder="<?= lang('Auth.email') ?>">
                                        <label for="login"><?= lang('Auth.email') ?></label>

                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                </div>

                            <?php else : ?>
                                <div class="col-sm-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0 <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" id="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                        <label for="login"><?= lang('Auth.emailOrUsername') ?></label>

                                        <div class="invalid-feedback">
                                            <?= session('errors.login') ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <div class="col-sm-12">
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control border-0 <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="<?= lang('Auth.password') ?>">
                                    <label for="password"><?= lang('Auth.password') ?></label>

                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>
                            </div>

                            <?php if ($config->allowRemembering) : ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                                        <?= lang('Auth.rememberMe') ?>
                                    </label>
                                </div>
                            <?php endif; ?>

                            <div class="col-12 text-center">
                                <button class="btn btn-primary px-4" type="submit">Login</button>
                            </div>
                        </div>
                    </form>

                    <div class="mt-4">
                        <?php if ($config->allowRegistration) : ?>
                            <p><a href="<?= url_to('register') ?> "><?= lang('Auth.needAnAccount') ?></a></p>
                        <?php endif; ?>
                        <?php if ($config->activeResetter) : ?>
                            <p><a href="<?= url_to('forgot') ?>"><?= lang('Auth.forgotYourPassword') ?></a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quote End -->

<?php $this->endSection() ?>
<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table">Konfigurasi Apliaksi SID</h1>
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

    <form action="/adm-proses/update-aplikasi" method="post">
        <?= csrf_field() ?>

        <div class="card border-primary mb-3">

            <div class="card-header bg-primary text-white">
                <span class="d-inline text-white fs-5">Infomasi Dasar Aplikasi</span>
                <button type="submit" class="float-end btn btn-warning btn-sm update-data">Submit</button>
            </div>

            <div class="m-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input name="alamatkantor" type="teks" class="form-control <?= ($validation[0]) ? 'is-invalid' : ''; ?>" id="floatingInput4" value="<?= (old('alamatkantor')) ? old('alamatkantor') : $konfalamat['value']; ?>">
                            <label for="floatingInput4">Alamat Kantor</label>
                            <div class="invalid-feedback">
                                Alamat Kantor wajib diisi dan tidak boleh lebih 200 karakter
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="teks" class="form-control" id="floatingInput1" readonly value="<?= DESA ?>">
                            <label for="floatingInput1">Desa</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="teks" class="form-control" id="floatingInput2" readonly value="<?= KEC ?>">
                            <label for="floatingInput2">Kecamatan</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating mb-3">
                            <input type="teks" class="form-control" id="floatingInput3" readonly value="<?= KAB ?>">
                            <label for="floatingInput3">Kabupaten</label>
                        </div>
                    </div>

                </div>

                <div class="form-floating">
                    <textarea name="tentangaplikasi" class="form-control <?= ($validation[1]) ? 'is-invalid' : ''; ?>" id="floatingTextarea2" style="height: 200px; resize:vertical" maxlength="300"><?= (old('tentangaplikasi')) ? old('tentangaplikasi') : $konftentang['value']; ?></textarea>
                    <label for="floatingTextarea2">Tentang Aplikasi</label>
                    <div class="invalid-feedback">
                        Tentang Aplikasi wajib diisi dan tidak boleh lebih 500 karakter
                    </div>
                </div>
            </div>
        </div>
    </form>



</main>

<?php $this->endSection() ?>
<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table">Daftar Media Sosial</h1>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data
            </button>

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


    <table class="table table-striped table-bordered" id="daftar-media-sosial" data-tabelsiades="<?= caesarCipherReverse($tabeldtb); ?>">
        <thead>
            <tr class="text-center">
                <th>Aksi</th>
                <th>No</th>
                <th>Media Sosial</th>
                <th>Nama Akun</th>
                <th>Link</th>
                <th>Updated By</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $iNo = 1;
            foreach ($kategoriconf as $val) :
            ?>
                <tr class="#">
                    <td class="text-center">
                        <?php if ($val['label'] == 'Telpon' || $val['label'] == 'WhatsApp' || $val['label'] == 'Facebook' || $val['label'] == 'Instagram' || $val['label'] == 'Email' || $val['label'] == 'Youtube') { ?>
                            <button type="" class="btn btn-sm btn-secondary" onclick="return alert('<?= $val['label'] ?> Tidak Dapat dihapus')">Hapus</button>
                        <?php } else { ?>
                            <form action="/adm-proses/delete-conf/<?= convertToLetter($val['id']) ?>/media-sosial" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau menghapus ?')">Hapus</button>
                            </form>
                        <?php } ?>
                    </td>
                    <td class="text-center"><?= $iNo++ ?></td>
                    <td><?= $val['label'] ?></td>
                    <td class="edit-dbClick" data-id="<?= convertToLetter($val['id']) ?>" data-colum="<?= caesarCipherReverse('value'); ?>"><?= $val['value'] ?></td>
                    <td class="edit-dbClick" data-id="<?= convertToLetter($val['id']) ?>" data-colum="<?= caesarCipherReverse('more'); ?>"><?= $val['more'] ?></td>
                    <td><?= $val['updated_by'] ?></td>
                </tr>
            <?php endforeach ?>
            <tr class="table-warning">
            </tr>
        </tbody>
    </table>
</main>

<!-- Modal -->
<form action="/adm-proses/add-media-sosial" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Media Sosial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input autocomplete="off" type="text" class="form-control <?= ($validation[1]) ? 'is-invalid' : ''; ?>" id="aa" placeholder="Media Sosial" name="label" value="<?= old('label') ?>">
                        <label for="aa">Media Sosial</label>
                        <div class="invalid-feedback">
                            Medsos wajib diisi dan tidak boleh lebih 200 karakter
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input autocomplete="off" type="text" class="form-control <?= ($validation[0]) ? 'is-invalid' : ''; ?>" id="bb" placeholder="Nama Akun" name="value" value="<?= old('value') ?>">
                        <label for="bb">Nama Akun</label>
                        <div class="invalid-feedback">
                            Nama Akun wajib diisi dan tidak boleh lebih 200 karakter
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input autocomplete="off" type="text" class="form-control <?= ($validation[2]) ? 'is-invalid' : ''; ?>" id="cc" placeholder="Link Akun" name="more" value="<?= old('more') ?>">
                        <label for="cc">Link Akun</label>
                        <div class="invalid-feedback">
                            Link Akun wajib diisi dan tidak boleh lebih 500 karakter
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="subnit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->endSection() ?>
<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h4 id-table">Struktur Desa <?= DESA ?></h1>
            <button class="btn btn-sm btn-success">Tambah Data</button>
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

    <table class="table table-striped table-bordered" id="<?= url_title('Struktur Desa  ' . DESA, '-', true) ?>" data-tabelsiades="<?= caesarCipherReverse($tabeldtb) ?>">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Aksi</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Alamat</th>
                <th scope="col">Pendidikan</th>
                <th scope="col">Kontak</th>
                <th scope="col">Update By</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $iNo = 1;
            foreach ($personildesa as $personil) :
            ?>
                <tr class="#">
                    <td><?= $iNo++ ?></td>
                    <td>
                        <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a href="#" class="dropdown-item">View</a></li>
                            <li><a href="#" class="dropdown-item">Hapus</a></li>
                        </ul>
                    </td>
                    <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('nama'); ?>"><?= $personil['nama'] ?></td>
                    <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('jabatan'); ?>"><?= $personil['jabatan'] ?></td>
                    <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('alamat'); ?>"><?= $personil['alamat'] ?></td>
                    <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('pendidikan'); ?>"><?= $personil['pendidikan'] ?></td>
                    <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('kontak'); ?>"><?= $personil['kontak'] ?></td>
                    <td><?= $personil['updated_by'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php $this->endSection() ?>
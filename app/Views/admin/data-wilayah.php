<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table">Data Wilayah <?= DESA ?></h1>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                Tambah Data
            </button>
        </div>
    </div>

    <?php if (session()->getFlashdata('AddData')) : ?>
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
                <?= session()->getFlashdata('AddData') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>


    <table class="table table-striped table-bordered" id="<?= url_title('Data Wilayah ' . DESA, '-', true) ?>" data-tabelsiades="<?= caesarCipherReverse($tabeldtb) ?>">
        <thead>
            <tr class=" text-center">
                <th scope="col">#</th>
                <th scope="col" colspan="3">Wilayah/Ketua</th>
                <th scope="col">KK</th>
                <th scope="col">L</th>
                <th scope="col">P</th>
                <th scope="col">L+P</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $iDusun = 0;
            $iNo = 1;
            foreach ($datawilayah[0] as $wilayah1) :
            ?>
                <tr class="#">
                    <th class="text-center align-middle" scope="row" rowspan="<?= $datawilayah[3][$iDusun++] + 1 + $datawilayah[4][$iDusun - 1] ?>"><?= $iNo++ ?></th>
                    <td colspan="3" class="ps-md-5 fw-bold"><?= $wilayah1['dusun'] ?></td>
                    <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][2] ?></td>
                    <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][0] ?></td>
                    <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][1] ?></td>
                    <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][0] + $datawilayah[5][$iDusun - 1][1] ?></td>
                    <td class="text-center">
                        <form action="/adm-proses/delete-datawilayah/<?= caesarCipherReverse('dusun'); ?>/<?= $wilayah1['dusun'] ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-dark btn-sm" onclick="return confirm('Yakin mau menghapus Se-Dusun ?')">Hapus</button>
                        </form>
                    </td>
                </tr>

                <?php
                $iRk = 0;
                $noRk = 0;
                foreach ($datawilayah[1][$iDusun - 1] as $wilayah2) :
                ?>
                    <tr class="#">
                        <td class="text-center align-middle" rowspan="<?= count($datawilayah[2][$iDusun - 1][$noRk++]) + 1 ?>"><?= $noRk ?></td>
                        <td class="ps-md-4 fw-bold" colspan="2"><?= $wilayah2['rk'] ?></td>
                        <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][2] ?></td>
                        <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][0] ?></td>
                        <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][1] ?></td>
                        <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][0] + $datawilayah[6][$iDusun - 1][$iRk][1] ?></td>
                        <td class="text-center">
                            <form action="/adm-proses/delete-datawilayah/<?= caesarCipherReverse('rk'); ?>/<?= $wilayah2['rk'] ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau menghapus Se-RW ?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                    <?php $noRt = 1;
                    foreach ($datawilayah[2][$iDusun - 1][$iRk++] as $wilayah3) : ?>
                        <tr class="#">
                            <td class="text-center"><?= $noRt++ ?></td>
                            <td class="edit-dbClick" data-id="<?= convertToLetter($wilayah3['id']) ?>" data-colum="<?= caesarCipherReverse('rt'); ?>"><?= $wilayah3['rt'] ?></td>
                            <td class="text-center edit-dbClick" data-id="<?= convertToLetter($wilayah3['id']) ?>" data-colum="<?= caesarCipherReverse('kk'); ?>"><?= $wilayah3['kk'] ?></td>
                            <td class="text-center edit-dbClick" data-id="<?= convertToLetter($wilayah3['id']) ?>" data-colum="<?= caesarCipherReverse('l'); ?>"><?= $wilayah3['l'] ?></td>
                            <td class="text-center edit-dbClick" data-id="<?= convertToLetter($wilayah3['id']) ?>" data-colum="<?= caesarCipherReverse('p'); ?>"><?= $wilayah3['p'] ?></td>
                            <td class="text-center">
                                <?php
                                $pr = [$wilayah3['p'], $wilayah3['l']];
                                echo array_sum($pr);
                                ?>
                            </td>
                            <td class="text-center">
                                <form action="/adm-proses/delete-datawilayah/<?= caesarCipherReverse('id'); ?>/<?= $wilayah3['id'] ?>" method="post">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Yakin mau menghapus ?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<!-- Modal -->
<form action="/adm-proses/add-datawilayah/" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Wilayah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <select class="form-select mb-3" aria-label="Default select example" name="dusun">
                        <option selected value="">Pilih Dusun</option>
                        <?php foreach ($dusuns as $value) : ?>
                            <option value="Dusun <?= $value['value'] ?>">Dusun <?= $value['value'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="form-floating mb-3">
                        <input autocomplete="off" value="RW 000" type="text" class="form-control" id="aas" placeholder="RK" name="rk">
                        <label for="aas">RW</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input autocomplete="off" type="text" value="RT 000" class="form-control" id="aav" placeholder="RT" name="rt">
                        <label for="aav">RT</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="number" class="form-control" id="bb" placeholder="Jumlah Kepala Keluarga" name="kk">
                        <label for="bb">Jumlah Kepala Keluarga</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="number" class="form-control" id="bb" placeholder="Jumlah Laki-laki" name="lk">
                        <label for="bb">Jumlah Laki-laki</label>
                    </div>
                    <div class="form-floating">
                        <input autocomplete="off" type="number" class="form-control" id="cc" placeholder="Jumlah Perempuan" name="pr">
                        <label for="cc">Jumlah Perempuan</label>
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
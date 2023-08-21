<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table"><?= $label ?></h1>

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


    <table class="table table-striped table-bordered" id="<?= url_title($label, '-',  true) ?>" data-tabelsiades="<?= caesarCipherReverse($tabeldtb); ?>">
        <thead>
            <tr class="text-center">
                <th scope="col" rowspan="2" class="align-middle">#</th>
                <th scope="col" rowspan="2" class="align-middle">Aksi</th>
                <th scope="col" rowspan="2" class="align-middle">Kelompok</th>
                <th scope="col" colspan="2">Laki-laki</th>
                <th scope="col" colspan="2">Perempuan</th>
                <th scope="col" colspan="2">Jumlah</th>
            </tr>
            <tr class="text-center">
                <th>n</th>
                <th>%</th>
                <th>n</th>
                <th>%</th>
                <th>n</th>
                <th>%</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $iNo = 1;
            foreach ($datadesa as $val) :
            ?>
                <tr class="#">
                    <td class="text-center"><?= $iNo++ ?></td>
                    <td class="text-center">
                        <form action="/adm-proses/delete-datadesa/<?= convertToLetter($val['id']) . '/' . $val['slug'] ?>" method="post">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau menghapus ?')">Hapus</button>
                        </form>
                    </td>
                    <td class="edit-dbClick" data-id="<?= convertToLetter($val['id']) ?>" data-colum="<?= caesarCipherReverse('label'); ?>"><?= $val['label'] ?></td>
                    <td class="text-center edit-dbClick" data-id="<?= convertToLetter($val['id']) ?>" data-colum="<?= caesarCipherReverse('val_lk'); ?>"><?= $val['val_lk'] ?></td>
                    <td class="text-center"><?= number_format(($val['val_lk'] / $totalJumlah) * 100, 2) ?> %</td>
                    <td class="text-center edit-dbClick" data-id="<?= convertToLetter($val['id']) ?>" data-colum="<?= caesarCipherReverse('val_pr'); ?>"><?= $val['val_pr'] ?></td>
                    <td class="text-center"><?= number_format(($val['val_pr'] / $totalJumlah) * 100, 2) ?> %</td>
                    <td class="text-center"><?= $totalPerdata[$iNo - 2] ?></td>
                    <td class="text-center"><?= number_format(($totalPerdata[$iNo - 2] / $totalJumlah) * 100, 2) ?> %</td>
                </tr>
            <?php endforeach ?>
            <tr class="table-warning">
                <td class="text-center" colspan="3">JUMLAH</td>
                <td class="text-center"><?= $totalperjk[0] ?></td>
                <td class="text-center"><?= number_format(($totalperjk[0] / $totalJumlah) * 100, 2) ?> %</td>
                <td class="text-center"><?= $totalperjk[1] ?></td>
                <td class="text-center"><?= number_format(($totalperjk[1] / $totalJumlah) * 100, 2) ?> %</td>
                <td class="text-center"><?= $totalJumlah ?></td>
                <td class="text-center"><?= number_format(($totalperjk[0] / $totalJumlah) * 100, 2) + number_format(($totalperjk[1] / $totalJumlah) * 100, 2) ?> %</td>
            </tr>
        </tbody>

    </table>

    <figure class="highcharts-figure mt-5">
        <div id="container"></div>
    </figure>
</main>

<!-- Modal -->
<form action="/adm-proses/add-datadesa/<?= $val['slug'] ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah <?= $label ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input autocomplete="off" type="text" class="form-control" id="aa" placeholder="Kelompok Data" name="label">
                        <label for="aa">Kelompok Data</label>
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
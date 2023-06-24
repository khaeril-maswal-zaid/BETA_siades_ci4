<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3"><?= $label ?></h1>

            <a href="#" class="btn btn-sm btn-success">Tambah Data</a>

        </div>
    </div>

    <table class="table table-striped table-bordered" id="<?= url_title($label, '-',  true) ?>" data-tabelsiades="<?= caesarCipherReverse($tabeldtb); ?>">
        <thead>
            <tr class="text-center">
                <th scope="col" rowspan="2" class="align-middle">#</th>
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
                    <td class="#"><?= $val['label'] ?></td>
                    <td class="text-center edit-dbClick" data-id="<?= convertToLetter($val['id']) ?>" data-colum="<?= caesarCipherReverse('val_lk'); ?>"><?= $val['val_lk'] ?></td>
                    <td class="text-center"><?= number_format(($val['val_lk'] / $totalJumlah) * 100, 2) ?> %</td>
                    <td class="text-center edit-dbClick" data-id="<?= convertToLetter($val['id']) ?>" data-colum="<?= caesarCipherReverse('val_pr'); ?>"><?= $val['val_pr'] ?></td>
                    <td class="text-center"><?= number_format(($val['val_pr'] / $totalJumlah) * 100, 2) ?> %</td>
                    <td class="text-center"><?= $totalPerdata[$iNo - 2] ?></td>
                    <td class="text-center"><?= number_format(($totalPerdata[$iNo - 2] / $totalJumlah) * 100, 2) ?> %</td>
                </tr>
            <?php endforeach ?>
            <tr class="table-warning">
                <td class="text-center" colspan="2">JUMLAH</td>
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

<?php $this->endSection() ?>
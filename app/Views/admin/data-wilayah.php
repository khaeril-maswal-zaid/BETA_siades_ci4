<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3">Data Wilayah <?= DESA ?></h1>
        </div>
    </div>

    <table class="table table-striped table-bordered" id="<?= url_title('Data Wilayah ' . DESA, '-', true) ?>">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col" colspan="3">Wilayah/Ketua</th>
                <th scope="col">KK</th>
                <th scope="col">L</th>
                <th scope="col">P</th>
                <th scope="col">L+P</th>
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
                    <td colspan="3" class="ps-md-5 fw-bold">Dusun <?= $wilayah1['dusun'] ?></td>
                    <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][0] ?></td>
                    <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][1] ?></td>
                    <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][0] + $datawilayah[5][$iDusun - 1][1] ?></td>
                    <td class="fw-bold text-center"><?= $datawilayah[5][$iDusun - 1][2] ?></td>
                </tr>

                <?php
                $iRk = 0;
                $noRk = 0;
                foreach ($datawilayah[1][$iDusun - 1] as $wilayah2) :
                ?>
                    <tr class="#">
                        <td class="text-center align-middle" rowspan="<?= count($datawilayah[2][$iDusun - 1][$noRk++]) + 1 ?>"><?= $noRk ?></td>
                        <td class="ps-md-4 fw-bold" colspan="2">RW <?= $wilayah2['rk'] ?></td>
                        <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][0] ?></td>
                        <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][1] ?></td>
                        <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][0] + $datawilayah[6][$iDusun - 1][$iRk][1] ?></td>
                        <td class="fw-bold text-center"><?= $datawilayah[6][$iDusun - 1][$iRk][2] ?></td>
                    </tr>

                    <?php $noRt = 1;
                    foreach ($datawilayah[2][$iDusun - 1][$iRk++] as $wilayah3) : ?>
                        <tr class="#">
                            <td class="text-center"><?= $noRt++ ?></td>
                            <td class="#">RT <?= $wilayah3['rt'] ?></td>
                            <td class="text-center edit-dbClick"><?= $wilayah3['kk'] ?></td>
                            <td class="text-center edit-dbClick"><?= $wilayah3['l'] ?></td>
                            <td class="text-center edit-dbClick"><?= $wilayah3['p'] ?></td>
                            <td class="text-center">
                                <?php
                                $pr = [$wilayah3['p'], $wilayah3['l']];
                                echo array_sum($pr);
                                ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php $this->endSection() ?>
<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3">Keuangan Desa <?= DESA ?></h1>
            <button class="btn btn-success">Tambah Data</button>
        </div>
    </div>

    <div class="container-fluid bg-light p-4 rounded">
        <?php $iTit = 0;
        foreach ($keuangan[0] as $value0) :
        ?>
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white"><?= $value0['title'] ?></div>
                <div class="card-body">

                    <?php $iSub = 0;
                    foreach ($keuangan[1][$iTit++] as $value1) :
                    ?>
                        <h5 class="card-title"><?= $value1['subtitle'] ?></h5>
                        <table class="table table-striped table-bordered mb-4" id="<?= url_title('Keuangan Desa ' . DESA, '-', true) ?>">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col" style="width: 122px;">#</th>
                                    <th class="text-center" scope="col" style="width: 550px;">Uraian</th>
                                    <th class="text-center" scope="col">Angaran (Rp)</th>
                                    <th class="text-center" scope="col">Realisasi (Rp)</th>
                                    <th class="text-center" scope="col">Lebih/Kurang (Rp)</th>
                                    <th class="text-center" scope="col">Update By</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $iVal = 0;
                                foreach ($keuangan[2][$iTit - 1][$iSub++] as $value2) :
                                ?>
                                    <tr>
                                        <td class="text-center" scope="row"><?= $value2['kode'] ?></th>
                                        <td><?= $value2['uraian'] ?></td>
                                        <td class="text-center"><?= number_format($value2['anggaran'], 0, ',', '.') ?></td>
                                        <td class="text-center"><?= number_format($value2['realisasi'], 0, ',', '.') ?></td>
                                        <td class="text-center"><?= number_format($value2['anggaran'] - $value2['realisasi'], 0, ',', '.') ?></td>
                                        <td><?= $value2['updated_by'] ?></td>
                                    </tr>
                                <?php endforeach ?>

                            </tbody>
                        </table>
                    <?php endforeach ?>

                </div>
            </div>
        <?php endforeach ?>
    </div>

</main>

<?php $this->endSection() ?>
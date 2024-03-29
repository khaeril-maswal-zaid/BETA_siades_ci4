<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3">Status IMD Desa <?= DESA ?></h1>

            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Id Desa</button>
        </div>
    </div>

    <ul class="nav nav-tabs my-4">
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y')) ? 'active' : ''; ?>" href="/admindes/status-idm"><?= date('Y') ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 1) ? 'active' : ''; ?>" href="/admindes/status-idm/<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 2) ? 'active' : ''; ?>" href="/admindes/status-idm/<?= date('Y') - 2 ?>"><?= date('Y') - 2 ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 3) ? 'active' : ''; ?>" href="/admindes/status-idm/<?= date('Y') - 3 ?>"><?= date('Y') - 3 ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 4) ? 'active' : ''; ?>" href="/admindes/status-idm/<?= date('Y') - 4 ?>"><?= date('Y') - 4 ?></a>
        </li>
    </ul>

    <div class="container-fluid bg-light px-0 rounded">
        <div class="overflow-auto" style="max-height: 500px;">
            <table class="table table-striped table-bordered table-info" style="font-size: 75%;" id="<?= url_title('Status IMD Desa ' . DESA, '-', true) ?>">
                <thead>
                    <tr class="table-warning">
                        <th rowspan="2" class="align-middle text-center">No</th>
                        <th rowspan="2" class="align-middle text-center">Indikator IDM</th>
                        <th rowspan="2" class="align-middle text-center">Skor</th>
                        <th rowspan="2" class="align-middle text-center">Keterangan</th>
                        <th rowspan="2" nowrap class="align-middle text-center">Kegiatan Yang Dapat Dilakukan</th>
                        <th rowspan="2" nowrap class="align-middle text-center">+ Nilai</th>
                        <th colspan="6" class="text-center">Yang Dapat Melaksanakan Kehiatan</th>
                    </tr>
                    <tr class="table-warning">
                        <th>Pusat</th>
                        <th>Provensi</th>
                        <th>Kabupaten</th>
                        <th>Desa</th>
                        <th>CSR</th>
                        <th>Lainnya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tabelapiidm as $idm) : ?>
                        <tr class="<?= (!isset($idm['NO'])) ? 'table-dark' : ''; ?>">
                            <td class="align-middle"><?= $idm['NO'] ?></td>
                            <td class="align-middle" style="min-width: 170px"> <?= $idm['INDIKATOR'] ?> </td>
                            <td class="align-middle"> <?= $idm['SKOR'] ?> </td>
                            <td class="align-middle" style="min-width: 200px"> <?= $idm['KETERANGAN'] ?> </td>
                            <td class="align-middle" style="min-width: 200px"> <?= $idm['KEGIATAN'] ?> </td>
                            <td class="align-middle"> <?= $idm['NILAI'] ?> </td>
                            <td class="align-middle"> <?= $idm['PUSAT'] ?> </td>
                            <td class="align-middle"> <?= $idm['PROV'] ?> </td>
                            <td class="align-middle"> <?= $idm['KAB'] ?> </td>
                            <td class="align-middle"> <?= $idm['DESA'] ?> </td>
                            <td class="align-middle"> <?= $idm['CSR'] ?> </td>
                            <td class="align-middle"> <?= $idm['LAINNYA'] ?> </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>


<!-- Modal -->
<form action="/adm-proses/get-iddesa/<?= convertToLetter($idapiidm['id']) ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="url" value="status-idm">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Get Id Desa ~ IDM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control <?= ($validation) ? 'is-invalid' : ''; ?>" id="iddesa" placeholder="iddesa" name="iddesa" value="<?= (old('iddesa')) ? old('iddesa') : $idapiidm['value']; ?>">
                        <label for="iddesa">Id Desa</label>
                        <div class="invalid-feedback">
                            Id Desa wajib diisi, mesti 10 karakter dan numeric
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input autocomplete="off" disabled type="text" value="<?= $desaapiidm ?>" class="form-control" id="aav">
                        <label for="aav">Nama Desa</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->endSection() ?>
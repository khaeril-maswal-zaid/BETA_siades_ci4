<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table">Keuangan Desa <?= DESA ?></h1>
            <button type="button" class="btn btn-sm btn-success float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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

    <ul class="nav nav-tabs my-4">
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y')) ? 'active' : ''; ?>" href="/admindes/keuangan-desa"><?= date('Y') ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 1) ? 'active' : ''; ?>" href="/admindes/keuangan-desa/<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 2) ? 'active' : ''; ?>" href="/admindes/keuangan-desa/<?= date('Y') - 2 ?>"><?= date('Y') - 2 ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 3) ? 'active' : ''; ?>" href="/admindes/keuangan-desa/<?= date('Y') - 3 ?>"><?= date('Y') - 3 ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 4) ? 'active' : ''; ?>" href="/admindes/keuangan-desa/<?= date('Y') - 4 ?>"><?= date('Y') - 4 ?></a>
        </li>
    </ul>

    <div id="<?= url_title('Keuangan Desa ' . DESA, '-', true) ?>" data-tabelsiades="<?= caesarCipherReverse($tabeldtb); ?>">

        <?php $iTit = 0;
        foreach ($keuangan[0] as $value0) :
        ?>
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white"><?= $value0['title'] ?></div>
                <div class="card-body">

                    <?php $iSub = 0;
                    foreach ($keuangan[1][$iTit++] as $value1) :
                    ?>
                        <h6 class="card-title"><?= $value1['subtitle'] ?></h6>
                        <table style="font-size: 80%!important;" class="table table-striped table-bordered mb-4">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2" class="text-center align-middle">Aksi</th>
                                    <th class="text-center align-middle" scope="col" style="width: 122px;">#</th>
                                    <th class="text-center align-middle" scope="col" style="width: 550px;">Uraian</th>
                                    <th class="text-center align-middle" scope="col">Angaran (Rp)</th>
                                    <th class="text-center align-middle" scope="col">Realisasi (Rp)</th>
                                    <th class="text-center align-middle" scope="col">Lebih/Kurang (Rp)</th>
                                    <th class="text-center align-middle" scope="col">Added By</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $iVal = 0;
                                foreach ($keuangan[2][$iTit - 1][$iSub++] as $value2) :
                                ?>
                                    <tr>
                                        <td class="text-center">
                                            <form action="/adm-proses/delete-keuangan/<?= convertToLetter($value2['id']) ?>" method="post">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau menghapus ?')">Hapus</button>
                                            </form>
                                        </td>
                                        <td class="text-center align-middle" scope="row"><?= $value2['kode'] ?></th>
                                        <td class="align-middle edit-dbClick" data-id="<?= convertToLetter($value2['id']) ?>" data-colum="<?= caesarCipherReverse('uraian'); ?>"><?= $value2['uraian'] ?></td>
                                        <td class="text-center align-middle edit-dbClick" data-id="<?= convertToLetter($value2['id']) ?>" data-colum="<?= caesarCipherReverse('anggaran'); ?>"><?= number_format($value2['anggaran'], 0, ',', '.') ?></td>
                                        <td class="text-center align-middle edit-dbClick" data-id="<?= convertToLetter($value2['id']) ?>" data-colum="<?= caesarCipherReverse('realisasi'); ?>"><?= number_format($value2['realisasi'], 0, ',', '.') ?></td>
                                        <td class="text-center align-middle"><?= number_format($value2['anggaran'] - $value2['realisasi'], 0, ',', '.') ?></td>
                                        <td class="align-middle" nowrap><?= $value2['updated_by'] ?></td>
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

<!-- Modal -->
<form action="/adm-proses/add-keuangan" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="tahun" value="<?= $tahun ?>">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Keuangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <select name="kategori" class="form-select" id="kategoriselect" aria-label="Floating label select example">
                                    <option value="" selected>Pilih</option>
                                    <option value="PENDAPATAN DESA">PENDAPATAN DESA</option>
                                    <option value="BELANJA DESA">BELANJA DESA</option>
                                    <option value="PEMBIAYAAN DESA">PEMBIAYAAN DESA </option>
                                </select>
                                <label for="kategoriselect">Kategori</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <select name="subkategori" class="form-select" id="olehselect" aria-label="Floating label select example">
                                    <option value="null" selected>Pilih</option>
                                    <?php foreach ($subtitleAll as $suball) : ?>
                                        <option value="<?= $suball['subtitle'] ?>"><?= $suball['subtitle'] ?></option>
                                    <?php endforeach ?>
                                    <option value="">lainnya</option>
                                </select>
                                <label for="olehselect">Sub Kategori</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-floating mb-2">
                        <input autocomplete="off" disabled type="text" class="form-control" id="penuliscustom" placeholder="Sub Kategori" name="newsubkategori">
                        <label for="penuliscustom">Sub Kategori Baru</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control" id="aav" placeholder="Kode" name="kode">
                        <label for="aav">Kode</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control" id="bb" placeholder="Uraian" name="uraian">
                        <label for="bb">Uraian</label>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input autocomplete="off" type="number" class="form-control" id="cc" placeholder="Anggaran" name="anggaran">
                                <label for="cc">Anggaran</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-2">
                                <input autocomplete="off" type="number" class="form-control" id="ccx" placeholder="Realisasi" name="realisasi">
                                <label for="ccx">Realisasi</label>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-danger d-none" role="alert" id="pesan-error">
                        BUG dev.by KMZ
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
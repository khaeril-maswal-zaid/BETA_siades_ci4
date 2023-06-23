<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3"><?= $singkatanlembaga . ' ' . DESA ?></h1>
        </div>
    </div>

    <div class="container-fluid bg-light p-4 rounded border">
        <div>
            <div class="card border-primary mb-3">
                <div class="card-header text-white bg-primary">Kepengurusan <?= $singkatanlembaga ?>
                    <button class="btn btn-warning btn-sm float-end">Tambah Data</button>
                </div>
                <div class="card-body overflow-auto">
                    <table class="table table-striped" id="<?= url_title($singkatanlembaga . ' ' . DESA, '-', true) ?>">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Aksi</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Pendidikan</th>
                                <th scope="col">Kontak</th>
                                <th scope="col">Updated By</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($personildesa as $personil) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <th><a href="#" class="btn btn-sm btn-danger" onclick="confirm('Yakin mau menghapus?')">Hapus</a></th>
                                    <td><?= $personil['nama'] ?></td>
                                    <td><?= $personil['jabatan'] ?></td>
                                    <td><?= $personil['alamat'] ?></td>
                                    <td><?= $personil['pendidikan'] ?></td>
                                    <td><?= $personil['kontak'] ?></td>
                                    <td><?= $personil['updated_by'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white">Profil <?= $singkatanlembaga ?>
                    <a href="#" class="float-end btn btn-warning btn-sm">Edit</a>
                </div>
                <div class="card-body">
                    <?= $tentang ?>
                </div>
            </div>
            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white">Tugas Pokok & Fungsi <?= $singkatanlembaga ?>
                    <a href="#" class="float-end btn btn-warning btn-sm">Edit</a>
                </div>
                <div class="card-body"> <?= $tupoksi ?></div>
            </div>
        </div>
    </div>

</main>

<?php $this->endSection() ?>
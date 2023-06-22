<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Kabar Desa</h1>

            <a href="/admindes/profil-desa/add" class="btn btn-sm btn-success">Tambah Artikel</a>

        </div>
    </div>

    <div class="container-fluid bg-light border p-4 rounded">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Aksi</th>
                        <th scope="col" class="text-center">Tanggal/Waktu</th>
                        <th scope="col" class="text-center">Judul</th>
                        <th scope="col" class="text-center">Oleh</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($artikels as $artikel) : ?>
                        <tr>
                            <td class="align-middle"><?= $no++ ?></td>
                            <td class="align-middle">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <li><a href="/<?= $artikel['slug'] . '/' . $artikel['time'] ?>" class="dropdown-item" target="_blank">View</a></li>
                                        <li><a href="/admindes/profil-desa/<?= $artikel['slug'] ?>" class="dropdown-item">Edit</a></li>
                                        <li><a href="#" class="dropdown-item">Hapus</a></li>
                                        <li><a href="#" class="dropdown-item" target="_blank">Share WA</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td class="align-middle"><?= $artikel['created_at'] ?></td>
                            <td class="align-middle"><?= $artikel['judul'] ?></td>
                            <td class="align-middle" nowrap><?= $artikel['oleh'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <!-- //pagination CI4 -->
        <?= $pager->links('siades_bloger', 'newtemplate') ?>
    </div>
</main>

<?php $this->endSection() ?>
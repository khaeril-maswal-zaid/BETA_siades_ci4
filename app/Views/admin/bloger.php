<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h2">Kabar Desa</h1>

            <a href="/admindes/kabar-desa/add" class="btn btn-sm btn-success">Tambah Artikel</a>
        </div>
    </div>

    <?php if (session()->getFlashdata('addArtikel')) : ?>
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
                <?= session()->getFlashdata('addArtikel') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>


    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Aksi</th>
                    <th scope="col" class="text-center">Tanggal/Waktu</th>
                    <th scope="col" class="text-center">Judul</th>
                    <th scope="col" class="text-center">Viewers</th>
                    <th scope="col" class="text-center">Oleh</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($artikels as $key => $artikel) : ?>
                    <tr style="font-size: 85%;">
                        <td class="align-middle"><?= $no++ ?></td>
                        <td class="align-middle">
                            <div class="btn-group" role="group">
                                <button style="font-size: 87%!important;" id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="font-size: 90%!important;">
                                    <li><a href="/<?= $artikel['slug'] . '/' . $artikel['time'] ?>" class="dropdown-item" target="_blank">View</a></li>
                                    <li><a href="/admindes/kabar-desa/update/<?= $artikel['slug'] ?>" class="dropdown-item">Edit</a></li>
                                    <li>
                                        <form action="/adm-proses/blog-delete/<?= convertToLetter($artikel['id']) ?>" method="post">
                                            <?= csrf_field() ?>
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Yakin mau menghapus ?')">Hapus</button>
                                        </form>
                                    </li>
                                    <li><a href="<?= generetWaShareAdmin(user()->username, '*' . $artikel['judul'] . '*%0A%0A Selengkapnya di,.. ' . base_url($artikel['slug'] . '/' . $artikel['time'])) ?>" class="dropdown-item" target="_blank">Share WA</a></li>
                                </ul>
                            </div>
                        </td>
                        <td class="align-middle" nowrap><?= $artikel['updated_at'] ?></td>
                        <td class="align-middle"><?= $artikel['judul'] ?></td>
                        <td class="align-middle"><?= $viewrsbyyeart[$key] ?></td>
                        <td class="align-middle" nowrap><?= $artikel['oleh'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <!-- //pagination CI4 -->
    <?= $pager->links('siades_bloger', 'newtemplate') ?>
</main>

<?php $this->endSection() ?>
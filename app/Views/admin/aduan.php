<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3">Layanan Aduan</h1>
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

    <table class="table table-striped table-bordered" id="<?= url_title('Layanan Aduan', '-',  true) ?>">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Aksi</th>
                <th scope="col">Nama</th>
                <th scope="col">Subjek</th>
                <th scope="col">NIK</th>
                <th scope="col">No Hp</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($dataaduan as $aduan) : ?>
                <tr style="font-size: 85%;">
                    <td><?= $no++ ?></td>
                    <td>
                        <button style="font-size: 87%;" id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                            <?= ($aduan['file']) ?
                                '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                F
                                <span class="visually-hidden">KMZ Alzaid</span>
                            </span>' : ''
                            ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="font-size: 90%;">
                            <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></li>
                            <form action="/adm-proses/aduan-delete/<?= $aduan['id'] ?>" method="post">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="dropdown-item" onclick="return confirm('Yakin mau menghapus ?')">Hapus</button>
                            </form>
                        </ul>
                    </td>
                    <td><?= $aduan['name'] ?></td>
                    <td><?= $aduan['subject'] ?></td>
                    <td><?= $aduan['nik'] ?></td>
                    <td><?= $aduan['hp'] ?></td>
                    <td><?= $aduan['status'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</main>

<?php $this->endSection() ?>
<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3">Layanan Aduan</h1>
        </div>
    </div>

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
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <button id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a></li>
                            <li><a href="#" class="dropdown-item" onclick="confirm('Yakin mau menghapus?')">Hapus</a></li>
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
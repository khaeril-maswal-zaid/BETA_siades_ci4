<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h4 id-table" data-bakalslug="struktur-desa">Struktur Desa <?= DESA ?></h1>
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

    <?php if ($active != 1) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                'Foto Utama' belum diatur dengan benar !
            </div>
        </div>
    <?php endif ?>

    <div class="row">
        <div class="col-md-4">
            <form action="/adm-proses/update-struktur" method="post">
                <?= csrf_field() ?>

                <div class="card parent-control-post-foto">
                    <div class="uploaded">
                        <img src="/img/personil/<?= $image['more'] ?>" class="card-img-top mb-0" alt="Struktur Organisasi">
                    </div>
                    <div class="card-body">
                        <div class="">
                            <div class="alert alert-danger d-none pesan-error" role="alert">
                                BUG dev.by KMZ
                            </div>

                            <div class="row">
                                <div class="col-9 pe-0">
                                    <input class="form-control form-control-sm imgtarget" id="str" type="file">
                                    <input type="hidden" value="struktur-organisasi" class="labelimgajax">
                                    <input type="hidden" value="<?= $image['id'] ?>" id="idCarousel" name="idCarousel">
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-sm btn-warning">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 overflow-auto">
            <div style="min-width: 1000px; max-height: 100px;">
                <table class="table table-striped table-bordered" id="<?= url_title('Struktur Desa  ' . DESA, '-', true) ?>" data-tabelsiades="<?= caesarCipherReverse($tabeldtb) ?>">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Pendidikan</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Added By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $iNo = 1;
                        foreach ($personildesa as $personil) :
                        ?>
                            <tr class="#">
                                <td><?= $iNo++ ?></td>
                                <td>
                                    <button style="font-size: 87%;" id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                        <?= ($personil['class']) ?
                                            '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                M
                                                <span class="visually-hidden">KMZ Alzaid</span>
                                            </span>' : ''
                                        ?>
                                    </button>

                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="font-size: 90%!important;">
                                        <li>
                                            <button type="button" data-id="<?= convertToLetter($personil['id']) ?>" class="dropdown-item viewStruktur" data-bs-toggle="modal" data-bs-target="#staticBackdropView">
                                                View
                                            </button>
                                        </li>
                                        <li>
                                            <a href="/admindes/tupoksi/<?= strtolower(str_replace(' ', '-', $personil['jabatan'])) . '/' . convertToLetter($personil['id']) ?>" class="dropdown-item viewStruktur">Set Tupoksi</a>
                                        </li>
                                        <li>
                                            <form action="/adm-proses/mainfoto-lembaga/<?= convertToLetter($personil['id']) ?>/struktur-desa" method="post">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="dropdown-item">Set Foto Utama</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="/adm-proses/delete-struktur/<?= convertToLetter($personil['id']) ?>" method="post">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Yakin mau menghapus ?')">Hapus</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('nama'); ?>"><?= $personil['nama'] ?></td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('jabatan'); ?>"><?= $personil['jabatan'] ?></td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('alamat'); ?>"><?= $personil['alamat'] ?></td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('pendidikan'); ?>"><?= $personil['pendidikan'] ?></td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('kontak'); ?>"><?= $personil['kontak'] ?></td>
                                <td><?= $personil['updated_by'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Modal Add -->
<form action="/adm-proses/add-struktur" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog parent-control-post-foto">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Struktur Pemerintahan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control labelimgajax <?= ($validation[0]) ? 'is-invalid' : ''; ?>" id="aad2" placeholder="nama" name="nama" value="<?= old('nama') ?>">
                        <label for="aad2">Nama*</label>
                        <div class="invalid-feedback">
                            Nama Wajib di Isi
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control <?= ($validation[1]) ? 'is-invalid' : ''; ?>" id="bb" placeholder="Alamat" name="alamat" value="<?= old('alamat') ?>">
                        <label for="bb">Alamat</label>
                        <div class="invalid-feedback">
                            Alamat tidak boleh lebih 200 karakter
                        </div>
                    </div>
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control <?= ($validation[2]) ? 'is-invalid' : ''; ?>" id="aav" placeholder="Jabatan" name="jabatan" value="<?= old('jabatan') ?>">
                        <label for="aav">Jabatan</label>
                        <div class="invalid-feedback">
                            Jabatan tidak boleh lebih 200 karakter
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-2">
                                <input autocomplete="off" type="text" class="form-control <?= ($validation[3]) ? 'is-invalid' : ''; ?>" id="bb" placeholder="Pendidikan" name="pendidikan" value="<?= old('pendidikan') ?>">
                                <label for="bb">Pendidikan</label>
                                <div class="invalid-feedback">
                                    Pendidikan tidak boleh lebih 200 karakter
                                </div>
                            </div>
                            <div class="form-floating mb-2">
                                <input autocomplete="off" type="text" class="form-control <?= ($validation[4]) ? 'is-invalid' : ''; ?>" id="cc" placeholder="Kontak" name="kontak" value="<?= old('kontak') ?>">
                                <label for="cc">Kontak</label>
                                <div class="invalid-feedback">
                                    Kontak tidak boleh lebih 200 karakter
                                </div>
                            </div>

                            <div class="mb-3">
                                <input class="form-control form-control-sm imgtarget" id="vwImgtarget" type="file">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="W-100 uploaded">
                                <img src="<?= "/img/assets/image-default.jpg"; ?>" class="img-thumbnail img-fluid" alt="default">
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-danger d-none pesan-error" role="alert">
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


<!-- Modal View-->
<form action="/dariAjax" method="post" id="vwForm">
    <?= csrf_field() ?>
    <div class="modal fade" id="staticBackdropView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog parent-control-post-foto" style="max-width: 700px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeView"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="uploaded">
                                        <img src="/img/personil/default.jpg" class="card-img-top img-fluid vwFoto" alt="kmz" id="vwFoto">
                                    </div>
                                    <div class="alert alert-danger d-none pesan-error m-0 mt-2" role="alert">
                                        BUG dev.by KMZ
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-5">
                                            <ul class="ps-3">
                                                <li class="mb-2">Nama </li>
                                                <li class="mb-2">Jabatan </li>
                                                <li class="mb-2">Alamat </li>
                                                <li class="mb-2">Pendidikan</li>
                                                <li class="mb-2">Kontak</li>
                                                <li class="mb-2 fst-italic">Updated By</li>
                                                <li class="mb-2 fst-italic">Updated Date</li>
                                            </ul>
                                        </div>
                                        <div class="col-7">
                                            <span id="vwNama" class="mb-2 d-block">: Khaeril Maswal Zaid </span>
                                            <span id="vwJabatan" class="mb-2 d-block">: Presiden RI </span>
                                            <span id="vwAlamat" class="mb-2 d-block">: Dusun Samaenre </span>
                                            <span id="vwPendidikan" class="mb-2 d-block">: Sarjana 1</span>
                                            <span id="vwKontak" class="mb-2 d-block">: +62 853-4365-2494</span>
                                            <span id="vwBy" class="mb-2 d-block fst-italic">: Admin</span>
                                            <span id="vwDate" class="mb-2 d-block fst-italic">: 1234567</span>
                                        </div>
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input name="imageblog" type="file" class="form-control imgtarget" id="aabc">
                                        <label for="aabc">Foto</label>
                                    </div>
                                </div>
                            </div>

                            <div class="position-absolute start-0 end-0 top-0 text-center bg-white" id="blockspinner" style="height: 100%;">
                                <div class="spinner-border text-info position-relative top-50" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="nama" value="dariAjax" class="labelimgajax" id="labelimgajax">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>


<?php $this->endSection() ?>
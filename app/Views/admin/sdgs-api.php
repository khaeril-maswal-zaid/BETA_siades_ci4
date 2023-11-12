<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
   <div class="container-fluid bg-light px-4 rounded">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
         <h1 class="h3">Status SDGs Desa <?= DESA ?></h1>

         <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Id Desa</button>
      </div>
   </div>

   <div class="container-fluid bg-light p-4 rounded">
      <table class="table table-striped table-bordered table-info" id="<?= url_title('Status SDGs Desa ' . DESA, '-', true) ?>">
         <thead>
            <tr class="text-center table-warning">
               <th scope="col">#</th>
               <th scope="col">Label Data</th>
               <th scope="col">Value Data</th>
            </tr>
         </thead>

         <tbody>
            <?php $no = 1;
            foreach ($datasdgs as $sdgs) : ?>
               <tr class="#">
                  <td class="text-center"><?= $no++ ?></td>
                  <td class=""><?= $sdgs['title'] ?></td>
                  <td class="text-center"><?= $sdgs['score'] ?></td>
               </tr>
            <?php endforeach ?>
         </tbody>
      </table>
   </div>

</main>

<!-- Modal -->
<form action="/adm-proses/get-iddesa/<?= convertToLetter($idapisdgs['id']) ?>" method="post">
   <?= csrf_field() ?>
   <input type="hidden" name="url" value="status-sdgs">
   <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="staticBackdropLabel">Get Id Desa ~ SDGS</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

               <div class="form-floating mb-2">
                  <input autocomplete="off" type="text" class="form-control <?= ($validation) ? 'is-invalid' : ''; ?>" id="iddesa" placeholder="iddesa" name="iddesa" value="<?= (old('iddesa')) ? old('iddesa') : $idapisdgs['value']; ?>">
                  <label for="iddesa">Id Desa</label>
                  <div class="invalid-feedback">
                     Id Desa wajib diisi, mesti 10 karakter dan numeric
                  </div>
               </div>
               <div class="form-floating mb-2">
                  <input autocomplete="off" disabled type="text" class="form-control" id="aav">
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
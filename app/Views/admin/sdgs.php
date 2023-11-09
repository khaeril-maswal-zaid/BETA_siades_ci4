<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
   <div class="container-fluid bg-light px-4 rounded">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
         <h1 class="h3">Status SDGs Desa <?= DESA ?></h1>
         <!-- Karena diusahakan ambil data di API -->
         <!-- <button class="btn btn-success">Tambah Data</button> -->
      </div>
   </div>

   <ul class="nav nav-tabs my-4">
      <li class="nav-item">
         <a class="nav-link <?= ($tahun == date('Y')) ? 'active' : ''; ?>" href="/admindes/status-sdgs"><?= date('Y') ?></a>
      </li>
      <li class="nav-item">
         <a class="nav-link <?= ($tahun == date('Y') - 1) ? 'active' : ''; ?>" href="/admindes/status-sdgs/<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?></a>
      </li>
      <li class="nav-item">
         <a class="nav-link <?= ($tahun == date('Y') - 2) ? 'active' : ''; ?>" href="/admindes/status-sdgs/<?= date('Y') - 2 ?>"><?= date('Y') - 2 ?></a>
      </li>
      <li class="nav-item">
         <a class="nav-link <?= ($tahun == date('Y') - 3) ? 'active' : ''; ?>" href="/admindes/status-sdgs/<?= date('Y') - 3 ?>"><?= date('Y') - 3 ?></a>
      </li>
      <li class="nav-item">
         <a class="nav-link <?= ($tahun == date('Y') - 4) ? 'active' : ''; ?>" href="/admindes/status-sdgs/<?= date('Y') - 4 ?>"><?= date('Y') - 4 ?></a>
      </li>
   </ul>

   <div class="container-fluid bg-light p-4 rounded">
      <table class="table table-striped table-bordered table-info" id="<?= url_title('Status SDGs Desa ' . DESA, '-', true) ?>">
         <thead>
            <tr class="text-center table-warning">
               <th scope="col">#</th>
               <th scope="col">Label Data</th>
               <th scope="col">Value Data</th>
               <th scope="col">Update By</th>
            </tr>
         </thead>

         <tbody>
            <?php $no = 1;
            foreach ($datasdgs as $sdgs) : ?>
               <tr class="#">
                  <td class="text-center"><?= $no++ ?></td>
                  <td class=""><?= $sdgs['label'] ?></td>
                  <td class="text-center"><?= $sdgs['value'] ?></td>
                  <td class=""><?= $sdgs['updated_by'] ?></td>
               </tr>
            <?php endforeach ?>
         </tbody>
      </table>
   </div>

</main>

<?php $this->endSection() ?>
<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content'); ?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
  <div class="container text-center py-5">
    <h1 class="display-5 text-white mb-3 slideInDown">Situs Resmi</h1>
    <h1 class="display-4 text-white mb-2 slideInDown">Desa <?= DESA ?></h1>
  </div>
</div>

<!-- Alamat Web Start -->
<div class="container-fluid">
  <div class="px-3">
    <div class="alert alert-success py-2" role="alert">
      <a href="/"><i class="bi bi-house-door-fill"></i></a>
      <span class="px-1">/</span>
      <span class="text-success">Fitur Utama</span>

      <span class="px-1">/</span>
      <span class="text-success">Keuangan Desa</span>
    </div>
  </div>
</div>
<!-- Alamat Web Start -->

<div class="container-xxl py-5">
  <div class="container">
    <div class="mb-5">
      <h1 class="display-5 text-primary">Keuangan Desa</h1>
      <p class="fs-5 fw-bold text-primary"><?= FULLENGKAP ?></p>
    </div>

    <?php $iTit = 0;
    foreach ($keuangan[0] as $value0) :
    ?>
      <div class="card border-primary mb-3">
        <div class="card-header bg-primary text-white"><?= $value0['title'] ?></div>
        <div class="card-body">

          <?php $iSub = 0;
          foreach ($keuangan[1][$iTit++] as $value1) :
          ?>
            <h5 class="card-title"><?= $value1['subtitle'] ?></h5>
            <table class="table table-striped table-bordered mb-4">
              <thead>
                <tr>
                  <th class="text-center" scope="col" style="width: 122px;">#</th>
                  <th class="text-center" scope="col" style="width: 550px;">Uraian</th>
                  <th class="text-center" scope="col">Angaran (Rp)</th>
                  <th class="text-center" scope="col">Realisasi (Rp)</th>
                  <th class="text-center" scope="col">Lebih/Kurang (Rp)</th>
                </tr>
              </thead>
              <tbody>

                <?php $iVal = 0;
                foreach ($keuangan[2][$iTit - 1][$iSub++] as $value2) :
                ?>
                  <tr>
                    <th class="text-center" scope="row"><?= $value2['kode'] ?></th>
                    <td><?= $value2['uraian'] ?></td>
                    <td class="text-center"><?= number_format($value2['anggaran'], 0, ',', '.') ?></td>
                    <td class="text-center"><?= number_format($value2['realisasi'], 0, ',', '.') ?></td>
                    <td class="text-center"><?= number_format($value2['anggaran'] - $value2['realisasi'], 0, ',', '.') ?></td>
                  </tr>
                <?php endforeach ?>

              </tbody>
            </table>
          <?php endforeach ?>

        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>


<?php $this->endSection() ?>
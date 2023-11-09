<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content'); ?>

<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
  <div class="container text-center py-5">
    <h1 class="display-5 text-white mb-3 slideInDown">Situs Resmi</h1>
    <h1 class="display-4 text-white mb-2 slideInDown">Desa <?= DESA ?></h1>
  </div>
</div>

<!-- Petunjuk URL Start -->
<div class="container-xxl">
  <div class="container">
    <div class="alert alert-success py-2" role="alert">
      <a href="/"><i class="bi bi-house-door-fill"></i></a>
      <span class="px-1">/</span>

      <span class="px-1">IDM Desa</span>
    </div>
  </div>
</div>
<!-- Petunjuk URL Enad -->

<!-- Features Start -->
<section class="container-xxl py-3">
  <div class="container">

    <h1 class="display-5 text-primary">IDM Desa Tahun <?= $tahun ?></h1>
    <p class="fs-4 d-md-block d-none fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>
    <p class="d-md-none d-block fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>

    <ul class="nav nav-tabs mb-5">
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y')) ? 'active' : ''; ?>" href="/status-idm/"><?= date('Y') ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y') - 1) ? 'active' : ''; ?>" href="/status-idm/<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y') - 2) ? 'active' : ''; ?>" href="/status-idm/<?= date('Y') - 2 ?>"><?= date('Y') - 2 ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y') - 3) ? 'active' : ''; ?>" href="/status-idm/<?= date('Y') - 3 ?>"><?= date('Y') - 3 ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($tahun == date('Y') - 4) ? 'active' : ''; ?>" href="/status-idm/<?= date('Y') - 4 ?>"><?= date('Y') - 4 ?></a>
      </li>
    </ul>

    <!-- Isi Disini -->
    <div class="row mb-5 g-5">
      <div class="col-md-6 ">
        <div class="row">
          <div class="col-sm-6 mb-3 wow fadeInUp" data-wow-delay="0.3s">
            <div class="card text-white bg-secondary  mb-2 h-100">
              <div class="card-header">SKOR IDM TERKINI</div>
              <div class="card-body  position-relative me-2">
                <h1 class="text-white mt-3">

                  <?php
                  $skorIdmTerkini = number_format(array_sum($dataidm[2]) / 3, 4);
                  echo $skorIdmTerkini
                  ?>

                </h1>
                <i class="bi bi-graph-up position-absolute bottom-0 end-0" style="font-size: 4em;"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-3 wow fadeInUp" data-wow-delay="0.5s">
            <div class="card text-white bg-warning mb-2 h-100">
              <div class="card-header">STATUS IDM</div>
              <div class="card-body  position-relative me-2">
                <h2 class="text-white mt-3 text-uppercase"><?= $statusIdm ?></h2>
                <i class="bi bi-pin-angle-fill position-absolute bottom-0 end-0" style="font-size: 4em;"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-3 wow fadeInDown" data-wow-delay="0.5s">
            <div class="card text-white bg-danger mb-2 h-100">
              <div class="card-header">SKOR MINIMAL</div>
              <div class="card-body  position-relative me-2">
                <h1 class="text-white mt-3">0.1234</h1>
                <i class="bi bi-calendar-event position-absolute bottom-0 end-0" style="font-size: 4em;"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-3 wow fadeInDown" data-wow-delay="0.3s">
            <div class="card text-white bg-primary mb-2 h-100">
              <div class="card-header">TARGET STATUS</div>
              <div class="card-body position-relative me-2">
                <h2 class="text-white mt-3">MANDIRI</h2>
                <i class="bi bi-clipboard-data position-absolute bottom-0 end-0" style="font-size: 4em;"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <figure class="highcharts-figure my-0">
          <div id="container"></div>
        </figure>

        <div class="close">
          <script src="<?= base_url() ?>highcharts/highcharts.js"></script>
          <script src="<?= base_url() ?>highcharts/modules/variable-pie.js"></script>
          <script src="<?= base_url() ?>highcharts/modules/exporting.js"></script>
          <script src="<?= base_url() ?>highcharts/modules/export-data.js"></script>
          <script src="<?= base_url() ?>highcharts/modules/accessibility.js"></script>

          <script type="text/javascript">
            // Data retrieved from https://worldpopulationreview.com/country-rankings/countries-by-density
            Highcharts.chart('container', {
              chart: {
                type: 'variablepie'
              },
              title: {
                text: 'Indeks Desa Membangun (IDM)'
              },
              subtitle: {
                text: 'SKOR : IKS, IKE, IKL'
              },
              tooltip: {
                headerFormat: '',
                pointFormat: '<span style="color:{point.color};">\u25CF</span> <b> {point.z}</b><br/><br/>' +
                  'Skor : <b>{point.y}</b><br/>' +
                  'Persentase : <b>{point.percentage:.1f} %</b><br/>'
              },
              series: [{
                minPointSize: 100,
                innerSize: '20%',
                zMin: 0,
                name: 'countries',
                borderRadius: 5,
                data: [
                  <?php
                  $pattern = "/\((.*?)\)/"; // Pola regex untuk mencari teks di dalam tanda kurung
                  $matches = array();

                  $patternl = "/\s*\([^)]+\)/"; // Pola regex untuk mencocokkan teks di dalam tanda kurung dan teks sekitarnya
                  $replacement = ""; // Mengganti teks yang cocok dengan string kosong

                  $iValc = 0;

                  foreach ($dataidm[0] as $idmc) :
                  ?> {
                      name: `<?php
                              preg_match($pattern, $idmc['group'], $matches);
                              echo  $matches[1];
                              ?>`,
                      y: <?= $dataidm[2][$iValc++] ?>,
                      z: `<?php
                          $hasil = preg_replace($patternl, $replacement, $idmc['group']);
                          echo $hasil;
                          ?>`
                    },
                  <?php endforeach ?>
                ],
                colors: [
                  '#4caefe',
                  '#23e274',
                  '#cfeb1a',
                ]
              }]
            });
          </script>
        </div>
      </div>
    </div>

    <div class="overflow-auto">
      <table class="table table-striped table-bordered" style="font-size: 75%;">
        <thead>
          <tr>
            <th rowspan="2" class="align-middle text-center">No</th>
            <th rowspan="2" class="align-middle text-center">Indikator IDM</th>
            <th rowspan="2" class="align-middle text-center">Skor</th>
            <th rowspan="2" class="align-middle text-center">Keterangan</th>
            <th rowspan="2" nowrap class="align-middle text-center">Kegiatan Yang Dapat Dilakukan</th>
            <th rowspan="2" nowrap class="align-middle text-center">+ Nilai</th>
            <th colspan="6" class="text-center">Yang Dapat Melaksanakan Kegiatan</th>
          </tr>
          <tr>
            <th>Pusat</th>
            <th>Provensi</th>
            <th>Kabupaten</th>
            <th>Desa</th>
            <th>CSR</th>
            <th>Lainnya</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $no = 1;
          $iVal = 0;
          foreach ($dataidm[0] as $idm0) :
            foreach ($dataidm[1][$iVal++] as $idm1) : ?>
              <tr>
                <td><?= $no++ ?></td>
                <td style="min-width: 170px"> <?= $idm1['idm'] ?> </td>
                <td> <?= $idm1['skor'] ?> </td>
                <td style="min-width: 200px"> <?= $idm1['keterangan'] ?> </td>
                <td style="min-width: 200px"> <?= $idm1['kegiatan'] ?> </td>
                <td> <?= $idm1['nilai'] ?> </td>
                <td> <?= $idm1['pusat'] ?> </td>
                <td> <?= $idm1['prov'] ?> </td>
                <td> <?= $idm1['kab'] ?> </td>
                <td> <?= $idm1['des'] ?> </td>
                <td> <?= $idm1['csr'] ?> </td>
                <td> <?= $idm1['lainnya'] ?> </td>
              </tr>
            <?php endforeach; ?>
            <tr class="table-primary">
              <td colspan="3" class="text-center fw-bold"><?= $idm0['group'] ?></td>
              <td colspan="9" class=" fw-bold"><?= $dataidm[2][$iVal - 1] ?></td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</section>

<?php $this->endSection() ?>
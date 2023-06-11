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
      <span class="text-success">Status IDM</span>
    </div>
  </div>
</div>
<!-- Alamat Web Start -->

<div class="container-xxl py-5">
  <div class="container">
    <div class="mb-5">
      <h1 class="display-5 text-primary">Status IDM</h1>
      <p class="fs-5 fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>
    </div>

    <!-- Isi Disini -->
    <div class="row mb-5">
      <div class="col-md-6 ">
        <div class="row">
          <div class="col-sm-6 mb-3 wow fadeInUp" data-wow-delay="0.3s">
            <div class="card text-white bg-secondary  mb-2 h-100">
              <div class="card-header">SKOR IDM TERKINI</div>
              <div class="card-body  position-relative me-2">
                <h1 class="text-white mt-3">0.1657</h1>
                <i class="bi bi-graph-up position-absolute bottom-0 end-0" style="font-size: 4em;"></i>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-3 wow fadeInUp" data-wow-delay="0.5s">
            <div class="card text-white bg-warning mb-2 h-100">
              <div class="card-header">STATUS IDM</div>
              <div class="card-body  position-relative me-2">
                <h1 class="text-white mt-3">MAJU</h1>
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
        <figure class="highcharts-figure">
          <div id="container"></div>
        </figure>

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
              text: 'Countries compared by population density and total area, 2022.',
              align: 'left'
            },
            tooltip: {
              headerFormat: '',
              pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> {point.name}</b><br/>' +
                'Area (square km): <b>{point.y}</b><br/>' +
                'Population density (people per square km): <b>{point.z}</b><br/>'
            },
            series: [{
              minPointSize: 10,
              innerSize: '20%',
              zMin: 0,
              name: 'countries',
              borderRadius: 5,
              data: [{
                name: 'Spain',
                y: 505992,
                z: 92
              }, {
                name: 'France',
                y: 551695,
                z: 119
              }, {
                name: 'Poland',
                y: 312679,
                z: 121
              }, {
                name: 'Czech Republic',
                y: 78865,
                z: 136
              }, {
                name: 'Italy',
                y: 301336,
                z: 200
              }, {
                name: 'Switzerland',
                y: 41284,
                z: 213
              }, {
                name: 'Germany',
                y: 357114,
                z: 235
              }],
              colors: [
                '#4caefe',
                '#3dc3e8',
                '#2dd9db',
                '#1feeaf',
                '#0ff3a0',
                '#00e887',
                '#23e274'
              ]
            }]
          });
        </script>
      </div>
    </div>

    <div class="overflow-auto">
      <table class="table table-striped table-bordered" style="font-size: 75%;">
        <thead>
          <tr>
            <th rowspan="2" class="padat">No</th>
            <th rowspan="2">Indikator IDM</th>
            <th rowspan="2">Skor</th>
            <th rowspan="2">Keterangan</th>
            <th rowspan="2" nowrap>Kegiatan Yang Dapat Dilakukan</th>
            <th rowspan="2">+ Nilai</th>
            <th colspan="6" class="text-center">Yang Dapat Melaksanakan Kehiatan</th>
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
          <tr>
            <td nowrap>5</td>
            <td style="min-width: 170px">Skor Tingkat Kepesertaan BPJS</td>
            <td nowrap>2</td>
            <td style="min-width: 200px">Jumlah peserta BPJS/jumlah penduduk antara 0,1 s.d 0,25</td>
            <td style="min-width: 200px">Fasilitasi kepesertaan BPJS warga Desa hingga &gt; 75%</td>
            <td nowrap>0.00571429</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap>DINKES</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap></td>
          </tr>
          <tr>
            <td nowrap>5</td>
            <td style="min-width: 170px">Skor Tingkat Kepesertaan BPJS</td>
            <td nowrap>2</td>
            <td style="min-width: 200px">Jumlah peserta BPJS/jumlah penduduk antara 0,1 s.d 0,25</td>
            <td style="min-width: 200px">Fasilitasi kepesertaan BPJS warga Desa hingga &gt; 75%</td>
            <td nowrap>0.00571429</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap>DINKES</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap></td>
          </tr>
          <tr>
            <td nowrap>5</td>
            <td style="min-width: 170px">Skor Tingkat Kepesertaan BPJS</td>
            <td nowrap>2</td>
            <td style="min-width: 200px">Jumlah peserta BPJS/jumlah penduduk antara 0,1 s.d 0,25</td>
            <td style="min-width: 200px">Fasilitasi kepesertaan BPJS warga Desa hingga &gt; 75%</td>
            <td nowrap>0.00571429</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap>DINKES</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap></td>
          </tr>
          <tr>
            <td nowrap>5</td>
            <td style="min-width: 170px">Skor Tingkat Kepesertaan BPJS</td>
            <td nowrap>2</td>
            <td style="min-width: 200px">Jumlah peserta BPJS/jumlah penduduk antara 0,1 s.d 0,25</td>
            <td style="min-width: 200px">Fasilitasi kepesertaan BPJS warga Desa hingga &gt; 75%</td>
            <td nowrap>0.00571429</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap>DINKES</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap></td>
          </tr>
          <tr>
            <td nowrap>5</td>
            <td style="min-width: 170px">Skor Tingkat Kepesertaan BPJS</td>
            <td nowrap>2</td>
            <td style="min-width: 200px">Jumlah peserta BPJS/jumlah penduduk antara 0,1 s.d 0,25</td>
            <td style="min-width: 200px">Fasilitasi kepesertaan BPJS warga Desa hingga &gt; 75%</td>
            <td nowrap>0.00571429</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap>DINKES</td>
            <td nowrap></td>
            <td nowrap></td>
            <td nowrap></td>
          </tr>

        </tbody>
      </table>
    </div>
  </div>



  <?php $this->endSection() ?>
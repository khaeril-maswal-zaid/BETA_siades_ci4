<?php $this->extend('layout-htmlcodex/template') ?>
<?php $this->section('content');
// dd($datawilayah[1]) 
?>

<section class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
  <div class="container text-center py-5">
    <h1 class="display-5 text-white mb-3 slideInDown">Situs Resmi</h1>
    <h1 class="display-4 text-white mb-2 slideInDown">Desa <?= DESA ?></h1>
  </div>
</section>

<!-- Petunjuk URL Start -->
<section class="container-xxl">
  <div class="container">
    <div class="alert alert-success py-2" role="alert">
      <a href="/"><i class="bi bi-house-door-fill"></i></a>
      <span class="px-1">/</span>
      <span class="px-1">SDGS Desa</span>
    </div>
  </div>
</section>
<!-- Petunjuk URL Enad -->

<!-- Features Start -->
<section class="container-xxl py-3">
  <div class="container">

    <h1 class="display-5 text-primary">SDGS Desa Tahun <?= $tahun ?></h1>
    <p class="fs-4 d-md-block d-none fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>
    <p class="d-md-none d-block fw-bold text-primary mb-5"><?= FULLENGKAP ?></p>

    <div class="text-center mx-auto wow fadeInUp pt-lg-5 pb-lg-3" data-wow-delay="0.1s" style="max-width: 500px;">
      <h1 class="display-5">Skor SDGs Desa</h1>
      <h2 class="mb-5"><?= $average ?></h2>
    </div>

    <div class="row g-5">
      <?php foreach ($sdgs as $value) : ?>
        <div class="col-md-2 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="card mb-3 shadow bg-light border border-success rounded-3">
            <img src="/img/sdgs/skor-sdgs-<?= $value['goals'] ?>.jpg" class="card-img-top" alt="<?= $value['title'] ?>">
            <div class="card-body text-center">
              <p class="card-text mb-2">Skor Nilai</p>
              <h4 class="card-title"><?= $value['score'] ?></h4>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>

    <div class="chart-line mt-5">
      <figure class="highcharts-figure">
        <div id="container"></div>

      </figure>

      <div class="close">
        <script src="<?= base_url() ?>highcharts/highcharts.js"></script>
        <script src="<?= base_url() ?>highcharts/modules/variable-pie.js"></script>
        <script src="<?= base_url() ?>highcharts/modules/exporting.js"></script>
        <script src="<?= base_url() ?>highcharts/modules/export-data.js"></script>
        <script src="<?= base_url() ?>highcharts/modules/accessibility.js"></script>

        <script type="text/javascript">
          Highcharts.chart('container', {
            chart: {
              type: 'column'
            },
            title: {
              text: 'Skor 18 Goals SDGs Desa'
            },
            subtitle: {
              text: '<?= LENGKAP ?>'
            },
            xAxis: {
              type: 'category',
              labels: {
                rotation: -45,
                style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
                }
              }
            },
            yAxis: {
              min: 0,
              title: {
                text: 'Skor Nilai'
              }
            },
            legend: {
              enabled: false
            },
            tooltip: {
              pointFormat: 'Skor Nilai: <b>{point.y:.1f}</b>'
            },
            series: [{
              name: 'Population',
              // colors: [
              //   '#9b20d9', '#9215ac', '#861ec9', '#7a17e6', '#7010f9', '#691af3',
              //   '#6225ed', '#5b30e7', '#533be1', '#4c46db', '#4551d5', '#3e5ccf',
              //   '#3667c9', '#2f72c3', '#277dbd', '#1f88b7', '#1693b1', '#0a9eaa',
              //   '#03c69b', '#00f194'
              // ],
              colorByPoint: true,
              groupPadding: 0,
              data: [
                <?php foreach ($sdgs as $value) {
                  echo '["' . $value['title'] . '",' . $value['score'] . '],';
                } ?>
              ],
              dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
                }
              }
            }]
          });
        </script>
      </div>
    </div>

  </div>
</section>


<?php $this->endSection() ?>
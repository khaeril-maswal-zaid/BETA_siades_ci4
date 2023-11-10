<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3">Status IMD Desa <?= DESA ?></h1>
            <!-- Karena diusahakan ambil data di API -->
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Get Id Desa</button>
        </div>
    </div>

    <ul class="nav nav-tabs my-4">
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y')) ? 'active' : ''; ?>" href="/admindes/status-idm"><?= date('Y') ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 1) ? 'active' : ''; ?>" href="/admindes/status-idm/<?= date('Y') - 1 ?>"><?= date('Y') - 1 ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 2) ? 'active' : ''; ?>" href="/admindes/status-idm/<?= date('Y') - 2 ?>"><?= date('Y') - 2 ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 3) ? 'active' : ''; ?>" href="/admindes/status-idm/<?= date('Y') - 3 ?>"><?= date('Y') - 3 ?></a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($tahun == date('Y') - 4) ? 'active' : ''; ?>" href="/admindes/status-idm/<?= date('Y') - 4 ?>"><?= date('Y') - 4 ?></a>
        </li>
    </ul>

    <div class="container-fluid bg-light p-4 rounded">
        <!-- Isi Disini -->
        <div class="row mb-5">
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-sm-6 mb-3 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="card text-white bg-secondary  mb-2 h-100">
                            <div class="card-header">SKOR IDM TERKINI</div>
                            <div class="card-body  position-relative me-2">
                                <h1 class="text-white mt-3"><?= $skorIdmTerkini ?></h1>
                                <!-- <i class="bi bi-graph-up position-absolute bottom-0 end-0" style="font-size: 4em;"></i> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="card text-white bg-warning mb-2 h-100">
                            <div class="card-header">STATUS IDM</div>
                            <div class="card-body  position-relative me-2">
                                <h2 class="text-white mt-3 text-uppercase"><?= $statusIdm ?></h2>
                                <!-- <i class="bi bi-pin-angle-fill position-absolute bottom-0 end-0" style="font-size: 4em;"></i> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 wow fadeInDown" data-wow-delay="0.5s">
                        <div class="card text-white bg-danger mb-2 h-100">
                            <div class="card-header">SKOR MINIMAL</div>
                            <div class="card-body  position-relative me-2">
                                <h1 class="text-white mt-3">0.1234</h1>
                                <!-- <i class="bi bi-calendar-event position-absolute bottom-0 end-0" style="font-size: 4em;"></i> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3 wow fadeInDown" data-wow-delay="0.3s">
                        <div class="card text-white bg-primary mb-2 h-100">
                            <div class="card-header">TARGET STATUS</div>
                            <div class="card-body position-relative me-2">
                                <h2 class="text-white mt-3">MANDIRI</h2>
                                <!-- <i class="bi bi-clipboard-data position-absolute bottom-0 end-0" style="font-size: 4em;"></i> -->
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

        <div class="overflow-auto" style="max-height: 500px;">
            <table class="table table-striped table-bordered" style="font-size: 75%;" id="<?= url_title('Status IMD Desa ' . DESA, '-', true) ?>">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle text-center">No</th>
                        <th rowspan="2" class="align-middle text-center">Indikator IDM</th>
                        <th rowspan="2" class="align-middle text-center">Skor</th>
                        <th rowspan="2" class="align-middle text-center">Keterangan</th>
                        <th rowspan="2" nowrap class="align-middle text-center">Kegiatan Yang Dapat Dilakukan</th>
                        <th rowspan="2" nowrap class="align-middle text-center">+ Nilai</th>
                        <th colspan="6" class="text-center">Yang Dapat Melaksanakan Kehiatan</th>
                        <th rowspan="2" class="align-middle text-center">Update By</th>
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
                                <td> <?= $idm1['updated_by'] ?> </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr class="table-primary">
                            <td colspan="3" class="text-center fw-bold"><?= $idm0['group'] ?></td>
                            <td colspan="10" class=" fw-bold"><?= $dataidm[2][$iVal - 1] ?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</main>


<!-- Modal -->
<form action="/adm-proses/get-iddesa/<?= convertToLetter($idapiidm['id']) ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="url" value="status-idm">
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Get Id Desa ~ IDM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control" id="iddesaidm" placeholder="iddesaidm" name="iddesaidm" value="<?= $idapiidm['value'] ?>">
                        <label for="iddesaidm">Id Desa</label>
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
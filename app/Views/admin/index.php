<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <figure class="highcharts-figure my-0">
            <div id="getByDay"></div>
        </figure>

        <div class="close">
            <script src="<?= base_url() ?>highcharts/highcharts.js"></script>
            <script src="<?= base_url() ?>highcharts/modules/series-label.js"></script>
            <script src="<?= base_url() ?>highcharts/modules/exporting.js"></script>
            <script src="<?= base_url() ?>highcharts/modules/export-data.js"></script>
            <script src="<?= base_url() ?>highcharts/modules/accessibility.js"></script>

            <script type="text/javascript">
                Highcharts.chart('getByDay', {

                    title: {
                        text: 'Pengunjung Website 15 Hari Terakhir',
                        align: 'left'
                    },

                    subtitle: {
                        text: 'Hitungan berdasarkan deteksi IP Address, Browser dan Time',
                        align: 'left'
                    },

                    yAxis: {
                        title: {
                            text: 'Total pengunjung Harian'
                        }
                    },

                    xAxis: {
                        categories: [<?php
                                        foreach ($viewrsbyday[1] as $vDay) {
                                            echo "'" . $vDay . "',";
                                        }
                                        ?>]

                    },

                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            // pointStart: 2010
                        }
                    },

                    series: [{
                        name: 'Pengunjung Harian',
                        data: [<?php
                                foreach ($viewrsbyday[0] as $vDay) {
                                    echo $vDay . ',';
                                }
                                ?>]
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });
            </script>
        </div>
    </div>

    <div class="bg-light text-center rounded p-4">
        <figure class="highcharts-figure my-0">
            <div id="getByMonth"></div>
        </figure>

        <div class="close">
            <script type="text/javascript">
                Highcharts.chart('getByMonth', {

                    title: {
                        text: 'Pengunjung Website Setahun Terakhir',
                        align: 'left'
                    },

                    subtitle: {
                        text: 'Hitungan berdasarkan deteksi IP Address, Browser dan Time',
                        align: 'left'
                    },

                    yAxis: {
                        title: {
                            text: 'Total pengunjung Bulanan'
                        }
                    },

                    xAxis: {
                        categories: [<?php
                                        foreach ($viewrsbymonth[1] as $vDay) {
                                            echo "'" . $vDay . "',";
                                        }
                                        ?>]

                    },

                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            // pointStart: 2010
                        }
                    },

                    series: [{
                        name: 'Pengunjung Tahunan',
                        data: [<?php
                                foreach ($viewrsbymonth[0] as $vDay) {
                                    echo $vDay . ',';
                                }
                                ?>]
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });
            </script>
        </div>
    </div>

    <div class="bg-light text-center rounded p-4">

        <figure class="highcharts-figure my-0">
            <div id="getByYeart"></div>
        </figure>

        <div class="close">
            <script type="text/javascript">
                Highcharts.chart('getByYeart', {

                    title: {
                        text: 'Pengunjung Website 5 Tahun Terakhir',
                        align: 'left'
                    },

                    subtitle: {
                        text: 'Hitungan berdasarkan deteksi IP Address, Browser dan Time',
                        align: 'left'
                    },

                    yAxis: {
                        title: {
                            text: 'Total pengunjung Tahunan'
                        }
                    },

                    xAxis: {
                        categories: [<?php
                                        foreach ($viewrsbyyeart[1] as $vDay) {
                                            echo "'" . $vDay . "',";
                                        }
                                        ?>]

                    },

                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },

                    plotOptions: {
                        series: {
                            label: {
                                connectorAllowed: false
                            },
                            // pointStart: 2010
                        }
                    },

                    series: [{
                        name: 'Pengunjung Tahunan',
                        data: [<?php
                                foreach ($viewrsbyyeart[0] as $vDay) {
                                    echo $vDay . ',';
                                }
                                ?>]
                    }],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                });
            </script>
        </div>
    </div>
</div>
<!-- Recent Sales End -->


<?php $this->endSection() ?>
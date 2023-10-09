<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <div class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            <?= $this->fungsi->count_pasien() ?>
                        </h3>

                        <p>PASIEN</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users   "></i>
                    </div>
                    <a href="<?= base_url('pasien') ?>" class="small-box-footer">Info Lebih Lanjut<i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>
                            <?= $this->fungsi->count_dokter() ?>
                        </h3>

                        <p>DOKTER</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-md"></i>
                    </div>
                    <a href="<?= base_url('dokter') ?>" class="small-box-footer">Info Lebih Lanjut <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>
                            <?= $this->fungsi->count_pendaftaran() ?>
                        </h3>

                        <p>PENDAFTARAN</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= base_url('pendaftaran/terdaftar') ?>" class="small-box-footer">Indo Lebih Lanjut<i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>
                            <?= $this->fungsi->count_poliklinik() ?>
                        </h3>

                        <p>POLIKLINIK</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-stethoscope"></i>
                    </div>
                    <a href="<?= base_url('poliklinik') ?>" class="small-box-footer">Info Lebih Lanjut<i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-7 ">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">PENDAFTARAN</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart">
                            <canvas id="lineChart" style="height: 202px;"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
            <section class="col-lg-5">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">DATA DOKTER</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding" style="height: 220px;">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Dokter</th>
                                <th class="text-center">Spesialis</th>
                                <th class="text-center">Poliklinik</th>
                            </tr>
                            <?php $no = 1; ?>
                            <?php foreach ($dokter as $d): ?>
                                <tr>
                                    <th class="text-center">
                                        <?= $no ?>
                                    </th>
                                    <td class="text-center">
                                        <?= $d['dokter'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $d['spesialis'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $d['poliklinik'] ?>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
            <section class="col-lg-9 ">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">DATA PASIEN</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding" style="height: 140px;">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">NIK</th>
                                <th class="text-center">Nama Pasien</th>
                                <th class="text-center">Jenis Kelamin</th>
                                <th class="text-center">Nomor Telpon</th>
                            </tr>
                            <?php $no = 1; ?>
                            <?php foreach ($pasien as $psn): ?>
                                <tr>
                                    <th class="text-center">
                                        <?= $no ?>
                                    </th>
                                    <td class="text-center">
                                        <?= $psn['nik'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $psn['nama'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $psn['jenis_kelamin'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $psn['nomor_telpon'] ?>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
            <section class="col-lg-3">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">DATA POLIKLINIK</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding" style="height: 140px;">
                        <table class="table table-striped">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Poliklinik</th>
                            </tr>
                            <?php $no = 1; ?>
                            <?php foreach ($poliklinik as $p): ?>
                                <tr>
                                    <th class="text-center">
                                        <?= $no ?>
                                    </th>
                                    <td class="text-center">
                                        <?= $p['nama'] ?>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    function getDataForLineChart() {
        $.ajax({
            url: '<?= base_url('dashboard/getRegistrationsByMonth') ?>',
            dataType: 'json',
            method: 'get',
            success: function (data) {
                // Memproses data untuk mengelompokkan berdasarkan tahun
                var groupedData = groupDataByYear(data);

                // Memanggil fungsi untuk membuat grafik setelah data diterima
                createLineChart(groupedData);
            }
        });
    }

    // Fungsi untuk mengelompokkan data berdasarkan tahun
    function groupDataByYear(data) {
        var groupedData = {};
        data.forEach(function (item) {
            var year = item.tahun.toString();
            if (!groupedData[year]) {
                groupedData[year] = [];
            }
            groupedData[year].push(item);
        });
        return groupedData;
    }

    // Fungsi untuk membuat grafik line chart
    function createLineChart(data) {
        var ctx = document.getElementById('lineChart').getContext('2d');
        var datasets = [];

        // Loop melalui data yang telah dikelompokkan berdasarkan tahun
        for (var year in data) {
            var yearData = data[year];
            var labels = [];
            var values = [];

            // Mengisi array labels dan values dengan data yang diterima untuk tahun tertentu
            yearData.forEach(function (item) {
                labels.push(item.tahun + '-' + item.bulan);
                values.push(item.jumlah_pendaftaran);
            });

            datasets.push({
                label: 'Tahun ' + year,
                borderColor: getRandomColor(), // Menghasilkan warna acak (anda bisa mengganti ini sesuai kebutuhan)
                backgroundColor: 'rgba(0, 0, 255, 0.2)',
                pointBackgroundColor: 'blue',
                pointRadius: 4,
                pointHoverRadius: 8,
                data: values
            });
        }

        var lineChartData = {
            labels: labels,
            datasets: datasets
        };

        var lineChartOptions = {
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Jumlah Pendaftaran'
                    }
                }
            }
        };

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: lineChartData,
            options: lineChartOptions
        });
    }

    // Fungsi untuk menghasilkan warna acak (opsional)
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Memanggil fungsi untuk mengambil data dan membuat grafik saat halaman dimuat
    $(document).ready(function () {
        getDataForLineChart();
    });
</script>
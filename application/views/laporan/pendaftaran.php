<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Laporan
            <small>Pendaftaran</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Laporan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pendaftaran </h3>
                <hr>
                <div class="row">
                    <div class="col-md-1">
                        <a href="<?= base_url('laporan/cetakpendaftaran')?>"
                            class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</a>
                    </div>
                    <form action="<?= base_url('laporan/pendaftaran') ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-1 control-label">Cari Tanggal</label>
                            <div class="col-md-2">
                                <input type="date" class="form-control" name="start_date">
                            </div>
                            <p class="col-xs-1 control-label">s/d</p>
                            <div class="col-md-2">
                                <input type="date" class="form-control" name="end_date">
                            </div>
                            <label class="col-sm-1 control-label">Jenis Pasien</label>
                            <div class="col-md-2">
                                <select name="jenis_pasien" id="" class="form-control">
                                    <option value="">-pilih-</option>
                                    <option value="1">Umum</option>
                                    <option value="2">BPJS</option>
                                </select>
                            </div>
                            <button type="close" class="btn btn-default">Reset</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                                Filter</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="box-body table-resposive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NO RM</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Pasien</th>
                            <th>Dokter</th>
                            <th>Poliklinik</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pendaftaran as $pdf): ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $pdf['no_rm'] ?>
                                </td>
                                <td>
                                    <?= $pdf['pasien'] ?>
                                </td>
                                <td>
                                    <?= $pdf['jenis_pasien'] == 1 ? "Umum" : "BPJS"; ?>
                                </td>
                                <td>
                                    <?= $pdf['dokter'] ?>
                                </td>
                                <td>
                                    <?= $pdf['poliklinik'] ?>
                                </td>
                                <td>
                                    <?= $pdf['tanggal_pendaftaran'] ?>
                                </td>
                                <td>
                                    <?= $pdf['waktu_pendaftaran'] ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('pendaftaran/delet/') ?><?= $pdf['id_pendaftaran'] ?>"
                                        class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

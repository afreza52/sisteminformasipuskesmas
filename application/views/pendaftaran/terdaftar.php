<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pendaftaran
            <small>Terdaftar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pendaftaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Terdaftar </h3>
                <div class="pull-right">
                    <a href="<?= base_url('pendaftaran/daftarbaru') ?>" class="btn btn-primary btn-xs btn-flat">
                        <i class="fa fa-plus"></i> Daftar
                    </a>
                </div>
                <hr>
                <a href="" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="box-body table-resposive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NO RM</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Pasien</th>
                            <th>Dokter</th>
                            <th>Poliklinik</th>
                            <th>Tanggal</th>
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
                                    <a href="" data-toggle="modal"
                                        data-target="#pendaftaranModal<?= $pdf['id_pendaftaran'] ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> Detail</a>
                                    <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
<?php foreach ($pendaftaran as $pdf): ?>
    <div class="modal fade bd-example-modal-lg" id="pendaftaranModal<?= $pdf['id_pendaftaran'] ?>" tabindex="-1"
        role="dialog" aria-labelledby="pendaftaranModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pendaftaranModalLabel">Detail Pendaftaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td>NO RM</td>
                                        <td>
                                            <?= $pdf['no_rm'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NIK</td>
                                        <td>
                                            <?= $pdf['nik'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Pasien</td>
                                        <td>
                                            <?= $pdf['pasien'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>
                                            <?= $pdf['jenis_kelamin'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Telpon</td>
                                        <td>
                                            <?= $pdf['nomor_telpon'] ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td>Alamat</td>
                                        <td>
                                            <?= $pdf['alamat'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Poliklinik</td>
                                        <td>
                                            <?= $pdf['poliklinik'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Dokter</td>
                                        <td>
                                            <?= $pdf['dokter'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Pasien</td>
                                        <td>
                                            <?= $pdf['jenis_pasien'] == 1 ? "Umum" : "BPJS"; ?>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
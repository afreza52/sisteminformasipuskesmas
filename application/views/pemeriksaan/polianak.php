<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pemeriksaan
            <small>Poli Anak</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pemeriksaan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?= $this->session->flashdata('message2'); ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pemeriksaan Di Poliklinik Anak</h3>
                <?= form_error('pemeriksaan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <hr> <a href="" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="box-body table-resposive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Pendaftaran</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Tanggal Pendaftaran</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pemeriksaan as $p): ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $p['id_pendaftaran']; ?>
                                </td>
                                <td>
                                    <?= $p['pasien']; ?>
                                </td>
                                <td>
                                    <?= $p['dokter']; ?>
                                </td>
                                <td>
                                    <?= $p['tanggal_pendaftaran']; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p['status'] == 1): ?>
                                        <a class="btn btn-xs btn-success btn-blink">
                                            Sudah Diperiksa
                                        </a>
                                    <?php elseif ($p['status'] == 2): ?>
                                        <a class="btn btn-xs btn-danger btn-blink">
                                            Belum Diperiksa
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('periksamedis/'); ?><?= $p['id_pemeriksaan']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-stethoscope"></i>Periksa</a>
                                    <a href="<?= base_url('pemeriksaan/delet/'); ?><?= $p['id_pemeriksaan']; ?>"
                                        class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                                    <a href="<?= base_url('obat/cetakresep/'); ?><?= $p['id_pemeriksaan']; ?>"
                                        class="btn btn-xs btn-warning"><i class="fa fa-print"></i> Resep</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
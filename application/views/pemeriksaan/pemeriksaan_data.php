<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pemeriksaan
            <small>Pemeriksaan</small>
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
                <h3 class="box-title">Data Pemeriksaan</h3>
                <?= form_error('pemeriksaan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <hr> <a href="" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="box-body table-resposive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Pemeriksaan</th>
                            <th>Pasien</th>
                            <th>Dokter</th>
                            <th>Poliklinik</th>
                            <th>Tindakan</th>
                            <th>Diagnosa</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Aksi</th>
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
                                    <?= $p['id_pemeriksaan']; ?>
                                </td>
                                <td>
                                    <?= $p['pasien']; ?>
                                </td>
                                <td>
                                    <?= $p['dokter']; ?>
                                </td>
                                <td>
                                    <?= $p['poliklinik']; ?>
                                </td>
                                <td>
                                    <?= $p['tindakan']; ?>
                                </td>
                                <td>
                                    <?= $p['diagnosa']; ?>
                                </td>
                                <td>
                                    <?= $p['tanggal_pemeriksaan']; ?>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal"
                                        data-target="#editpemeriksaanModal<?= $p['id_pemeriksaan']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('pemeriksaan/delet/'); ?><?= $p['id_pemeriksaan']; ?>"
                                        class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                                    <a href="<?= base_url('pemeriksaan/detail/'); ?><?= $p['id_pemeriksaan']; ?>"
                                        class="btn btn-xs btn-danger"><i class="fa fa-eye"></i></a>
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

<?php foreach ($pemeriksaan as $o): ?>
    <div class="modal fade" id="editpemeriksaanModal<?= $o['id_pemeriksaan'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editpemeriksaanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editpemeriksaanModalLabel">Ubah pemeriksaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pemeriksaan/edit/'); ?><?= $o['id_pemeriksaan']; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_pemeriksaan" name="nama_pemeriksaan"
                                value="<?= $o['nama_pemeriksaan'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="stok" value="<?= $o['stok'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
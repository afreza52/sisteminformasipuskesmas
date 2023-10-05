<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Obat
            <small>Obat yang tersedia</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Obat</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Obat</h3>
                <?= form_error('obat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message2'); ?>
                <div class="pull-right">
                    <a href="" class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#newobatModal">
                        <i class="fa fa-user-plus"></i> Tambah
                    </a>
                </div>
                <hr>
            </div>
            <div class="box-body table-resposive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Obat</th>
                            <th>Stok</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($obat as $o): ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $o['nama']; ?>
                                </td>
                                <td>
                                    <?= $o['stok']; ?>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#editobatModal<?= $o['id_obat']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('obat/delet/'); ?><?= $o['id_obat']; ?>"
                                        class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
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
<div class="modal fade" id="newobatModal" tabindex="-1" role="dialog" aria-labelledby="newobatModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="newobatModalLabel">Tambah obat Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('obat'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama obat">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="stok" placeholder="Stok obat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($obat as $o): ?>
    <div class="modal fade" id="editobatModal<?= $o['id_obat'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editobatModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editobatModalLabel">Ubah obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('obat/edit/'); ?><?= $o['id_obat']; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" value="<?= $o['nama'] ?>">
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
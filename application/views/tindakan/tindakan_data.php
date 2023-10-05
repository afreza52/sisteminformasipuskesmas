<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Tindakan
            <small>Tindakan  </small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Tindakan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Tindakan  </h3>
                <?= form_error('tindakan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message2'); ?>
                <div class="pull-right">
                    <a href="" class="btn btn-primary btn-xs btn-flat" data-toggle="modal"
                        data-target="#newtindakanModal">
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
                            <th>Kode Tindakan</th>
                            <th>Nama Tindakan</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($tindakan as $t): ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $t['kode']; ?>
                                </td>
                                <td>
                                    <?= $t['nama']; ?>
                                </td>
                                <td>
                                    <?= $t['deskripsi']; ?>
                                </td>
                                <td>
                                    Rp.<?= $t['harga']; ?>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#edittindakanModal<?= $t['id_tindakan']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('tindakan/delet/'); ?><?= $t['id_tindakan']; ?>"
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
<div class="modal fade" id="newtindakanModal" tabindex="-1" role="dialog" aria-labelledby="newtindakanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="newtindakanModalLabel">Tambah tindakan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('tindakan'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode_tindakan" name="kode_tindakan"
                            placeholder="Kode tindakan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="tindakan" placeholder="Nama Tindakan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="harga" placeholder="Harga">
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
<?php foreach ($tindakan as $t): ?>
    <div class="modal fade" id="edittindakanModal<?= $t['id_tindakan'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="edittindakanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edittindakanModalLabel">Ubah tindakan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('tindakan/edit/'); ?><?= $t['id_tindakan']; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control"  name="kode_tindakan"
                                placeholder="Kode tindakan" value="<?= $t['kode'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="tindakan" placeholder="Nama Tindakan"
                                value="<?= $t['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi"
                                value="<?= $t['deskripsi'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="harga" placeholder="Harga"
                                value="<?= $t['harga'] ?>">
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
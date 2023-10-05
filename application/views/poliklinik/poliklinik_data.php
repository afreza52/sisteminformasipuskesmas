<div class="content-wrapper">
    <section class="content-header">
        <h1>
            poliklinik
            <small>poliklinik yang Tersedia</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">poliklinik</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data poliklinik</h3>
                <?= form_error('poliklinik', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message3'); ?>
                <div class="pull-right">
                    <a href="" class="btn btn-primary btn-xs btn-flat" data-toggle="modal"
                        data-target="#newPoliklinikModal">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <hr>
            </div>
            <div class="box-body table-resposive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama poliklinik</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($poliklinik as $pol): ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $pol['nama']; ?>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal"
                                        data-target="#editPoliklinikModal<?= $pol['id_poliklinik']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('poliklinik/delet/'); ?><?= $pol['id_poliklinik']; ?>"
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
<div class="modal fade" id="newPoliklinikModal" tabindex="-1" role="dialog" aria-labelledby="newPoliklinikModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPoliklinikModalLabel">Tambah Poliklinik Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('poliklinik'); ?>" method="post">
                <div class="modal-body">
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Poliklinik">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($poliklinik as $pol): ?>
    <div class="modal fade" id="editPoliklinikModal<?= $pol['id_poliklinik'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editPoliklinikModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editPoliklinikModalLabel">Ubah Poliklinik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('poliklinik/edit/'); ?><?= $pol['id_poliklinik']; ?>" method="post">
                    <div class="modal-body">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $pol['nama'] ?>">
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
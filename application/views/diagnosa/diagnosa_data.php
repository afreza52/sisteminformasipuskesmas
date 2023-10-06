<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Diagnosa
            <small>Diagnosa Penyakit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">diagnosa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?= $this->session->flashdata('message2'); ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Diagnosa Penyakit</h3>
                <?= form_error('diagnosa', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <div class="pull-right">
                    <a href="" class="btn btn-primary btn-xs btn-flat" data-toggle="modal"
                        data-target="#newdiagnosaModal">
                        <i class="fa fa-user-plus"></i> Tambah
                    </a>
                </div>
                <hr> <a href="" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <div class="box-body table-resposive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode diagnosa</th>
                            <th>Nama Penyakit</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($diagnosa as $d): ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $d['kode']; ?>
                                </td>
                                <td>
                                    <?= $d['nama']; ?>
                                </td>
                                <td>
                                    <?= $d['deskripsi']; ?>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#editdiagnosaModal<?= $d['id_diagnosa']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('diagnosa/delet/'); ?><?= $d['id_diagnosa']; ?>"
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
<div class="modal fade" id="newdiagnosaModal" tabindex="-1" role="dialog" aria-labelledby="newdiagnosaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="newdiagnosaModalLabel">Tambah diagnosa</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('diagnosa'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="kode_diagnosa" name="kode_diagnosa"
                            placeholder="Kode Diagnosa">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="penyakit" placeholder="Nama Penyakit">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
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
<?php foreach ($diagnosa as $d): ?>
    <div class="modal fade" id="editdiagnosaModal<?= $d['id_diagnosa'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editdiagnosaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editdiagnosaModalLabel">Ubah diagnosa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('diagnosa/edit/'); ?><?= $d['id_diagnosa']; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" name="kode_diagnosa" placeholder="Kode Diagnosa"
                                value="<?= $d['kode'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="penyakit" placeholder="Nama Penyakit"
                                value="<?= $d['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="deskripsi" placeholder="Deskripsi"
                                value="<?= $d['deskripsi'] ?>">
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
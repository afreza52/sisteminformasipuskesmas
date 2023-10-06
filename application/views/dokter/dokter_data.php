<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dokter
            <small>Dokter yang Bekerja</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Dokter</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?= $this->session->flashdata('message2'); ?>
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Dokter</h3>
                <?= form_error('dokter', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <div class="pull-right">
                    <a href="" class="btn btn-primary btn-xs btn-flat" data-toggle="modal"
                        data-target="#newDokterModal">
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
                            <th>Nama Dokter</th>
                            <th>Spesialis</th>
                            <th>No Telpon</th>
                            <th>Poliklinik</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($dokter as $dok): ?>
                            <tr>
                                <th scope="row">
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $dok['nama']; ?>
                                </td>
                                <td>
                                    <?= $dok['spesialis']; ?>
                                </td>
                                <td>
                                    <?= $dok['nomor_telpon']; ?>
                                </td>
                                <td>
                                    <?= $dok['poliklinik']; ?>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#editdokterModal<?= $dok['id_dokter']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('dokter/delet/'); ?><?= $dok['id_dokter']; ?>"
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
<div class="modal fade" id="newDokterModal" tabindex="-1" role="dialog" aria-labelledby="newDokterModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="newDokterModalLabel">Tambah Dokter Baru</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('dokter'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Dokter">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="spesialis" name="spesialis" placeholder="Spesialis">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon"
                            placeholder="No Telpon">
                    </div>
                    <div class="form-group">
                        <select name="id_poliklinik" id="id_poliklinik" class="form-control">
                            <option value="">Pilih Polikklinik</option>
                            <?php foreach ($poliklinik as $p): ?>
                                <option value="<?= $p['id_poliklinik']; ?>">
                                    <?= $p['nama']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
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
<?php foreach ($dokter as $dok): ?>
    <div class="modal fade" id="editdokterModal<?= $dok['id_dokter'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editdokterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editdokterModalLabel">Ubah dokter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dokter/edit/'); ?><?= $dok['id_dokter']; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $dok['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="spesialis" name="spesialis"
                                value="<?= $dok['spesialis'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nomor_telpon" name="nomor_telpon"
                                value="<?= $dok['nomor_telpon'] ?>">
                        </div>
                        <div class="form-group">
                            <select name="id_poliklinik" id="id_poliklinik" class="form-control">
                                <option value="">Pilih Poliklinik</option>
                                <?php foreach ($poliklinik as $pol): ?>
                                    <?php if ($pol['id_poliklinik'] == $dok['id_poliklinik']): ?>
                                        <option value="<?= $pol['id_poliklinik']; ?>" selected>
                                            <?= $pol['nama']; ?>
                                        </option>
                                    <?php else: ?>
                                        <option value="<?= $pol['id_poliklinik']; ?>">
                                            <?= $pol['nama']; ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
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
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pasien
            <small>Pasien yang mendaftar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pasien</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pasien</h3>
                <?= $this->session->flashdata('message2'); ?>
                <hr>
            </div>
            <div class="box-body table-resposive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>NO RM</th>
                            <th>NIK</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>No telpon</th>
                            <th>Jenis Kelamin</th>
                            <th>Jenis Pasien</th>
                            <th>Tanggal Lahir</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pasien as $p): ?>
                            <tr>
                                <td>
                                    <?= $p['nomor_rekam_medis'] ?>
                                </td>
                                <td>
                                    <?= $p['nik'] ?>
                                </td>
                                <td>
                                    <?= $p['nama'] ?>
                                </td>
                                <td>
                                    <?= $p['alamat'] ?>
                                </td>
                                <td>
                                    <?= $p['nomor_telpon']; ?>
                                </td>
                                <td>
                                    <?= $p['jenis_kelamin']; ?>
                                </td>
                                <td>
                                    <?= $p['jenis_pasien']== 1 ? "Umum" : "BPJS"; ?>
                                </td>
                                <td>
                                    <?= $p['tanggal_lahir']; ?>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#editPasienModal<?= $p['id_pasien']; ?>"
                                        class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('pasien/delete/') ?><?= $p['id_pasien'] ?>"
                                        class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php foreach ($pasien as $p): ?>
    <div class="modal fade" id="editPasienModal<?= $p['id_pasien'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editPasienModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editPasienModalLabel">Ubah Data Pasien</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('pasien/edit/'); ?><?= $p['id_pasien'] ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">NIK Pasien</label>

                            <input type="text" name="nik" class="form-control" value="<?= $p['nik'] ?>" required>

                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Pasien</label>
                            <input type="text" name="nama" class="form-control" value="<?= $p['nama'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" required>
                                <option value="Laki-laki" <?= ($p['jenis_kelamin'] == 'Laki-laki') ? 'selected' : ''; ?>>
                                    Laki-laki</option>
                                <option value="Perempuan" <?= ($p['jenis_kelamin'] == 'Perempuan') ? 'selected' : ''; ?>>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir Pasien</label>
                            <input type="date" name="tanggal_lahir" value="<?= $p['tanggal_lahir'] ?>" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat Pasien</label>
                            <textarea class="form-control" rows="4" name="alamat" required><?= $p['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor Telpon</label>
                            <input type="text" name="nomor_telpon" class="form-control" value="<?= $p['nomor_telpon'] ?>"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor Telpon</label>
                            <select class="form-control" name="jenis_pasien" required>
                                <option value="">-PILIH-</option>
                                <option value="1">Umum</option>
                                <option value="2">BPJS</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="close" class="btn btn-xs btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-xs btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
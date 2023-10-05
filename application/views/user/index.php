<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Users
            <small>Pengguna</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Users</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pengguna</h3>
                <?= $this->session->flashdata('message2'); ?>
                <div class="pull-right">
                    <a href="" class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#newuserModal">
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
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Alamat</th>
                            <th>No telpon</th>
                            <th>Role</th>
                            <th>Dibuat</th>
                            <th class="text-center" width=80px>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($user as $u): ?>
                            <tr>
                                <th>
                                    <?= $no; ?>
                                </th>
                                <td>
                                    <?= $u['nama'] ?>
                                </td>
                                <td>
                                    <?= $u['username'] ?>
                                </td>
                                <td>
                                    <?= $u['alamat'] ?>
                                </td>
                                <td>
                                    <?= $u['no_hp']; ?>
                                </td>
                                <td>
                                    <?= $u['role'] == 1 ? "Admin" : ($u['role'] == 2 ? "Petugas" : "Dokter"); ?>
                                </td>
                                <td>
                                    <?= $u['dibuat']; ?>
                                </td>
                                <td class="text-center">
                                    <a href="" data-toggle="modal" data-target="#edituserModal<?= $u['id_user']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('user/delete/') ?><?= $u['id_user'] ?>"
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
<div class="modal fade" id="newuserModal" tabindex="-1" role="dialog" aria-labelledby="newuserModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="newuserModalLabel">Tambah User / Pengguna</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="body">
                <form action="<?= base_url('user'); ?>" method="post">
                    <div class="container-fluit">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            value="<?= set_value('fullname'); ?>">
                                        <?= form_error('username', '<small class="text-danger mp-0">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Role</label>
                                        <select name="role" class="form-control">
                                            <option value="1">Admin</option>
                                            <option value="2">Petugas</option>
                                            <option value="3">Dokter</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nomor Telpon</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                            <input type="text" name="no_hp" class="form-control">
                                            <?= form_error('no_hp', '<small class="text-danger mp-0">', '</small>'); ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" name="nama" class="form-control">
                                        <?= form_error('nama', '<small class="text-danger mp-0">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Konfirmasi Password</label>
                                        <input type="password" name="passkonf" class="form-control">
                                        <?= form_error('passkonf', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Alamat</label>
                                        <textarea class="form-control" rows="4" name="alamat"></textarea>
                                    </div>
                                </div>
                            </div>
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
</div>
<?php foreach ($user as $p): ?>
    <div class="modal fade" id="edituserModal<?= $p['id_user'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="edituserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="edituserModalLabel">Ubah Data User / Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('user/edit/'); ?><?= $p['id_user'] ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Tanggal Diubah</label>
                            <input type="datetime" name="diperbarui" class="form-control" value="<?= date('Y-m-d H:i:s') ?>"
                                timezone="Asia/Jakarta" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" name="username1" class="form-control" value="<?= $p['username'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $p['nama'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Password </label>
                            <div class="col-6">
                                <input type="password" name="password" class="form-control"
                                    value="<?= $this->input->post('password'); ?>">
                                <?= form_error('password', '<small class="text-danger mp-0">', '</small>'); ?>
                            </div>
                            <label for="">Password Confrmation</label>
                            <div class="col-6">
                                <input type="password" name="passkonf" class="form-control"
                                    value="<?= $this->input->post('passkonf'); ?>">
                                <?= form_error('passkonf', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Role</label>
                            <select name="role1" class="form-control">
                                <?php
                                $selectedAdmin = ($p['role'] == 1) ? "selected" : "";
                                $selectedPetugas = ($p['role'] == 2) ? "selected" : "";
                                $selectedDokter = ($p['role'] == 3) ? "selected" : "";
                                ?>
                                <option value="1" <?= $selectedAdmin; ?>>Admin</option>
                                <option value="2" <?= $selectedPetugas; ?>>Petugas</option>
                                <option value="3" <?= $selectedDokter; ?>>Dokter</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <textarea class="form-control" rows="2" name="alamat" required><?= $p['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nomor Telpon</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <input type="text" name="no_hp" class="form-control" value="<?= $p['no_hp'] ?>">
                            </div>
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
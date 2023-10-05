<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Transaksi
            <small>Pembayaran</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Transaksi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Pembayaran Yang Sudah Lunas</h3>
                <?= form_error('Pembayaran', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

                <?= $this->session->flashdata('message2'); ?>
                <hr>
            </div>
            <div class="box-body table-resposive">
                <table class="table table-bordered table-striped" id="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID Pemeriksaan</th>
                            <th>Pasien</th>
                            <th>Metode Pembayaran</th>
                            <th>Total Biaya</th>
                            <th>Total Bayar</th>
                            <th>Diskon</th>
                            <th>Kembalian</th>
                            <th class="text-center">Status</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pembayaran as $p): ?>
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
                                    <?= $p['metode_pembayaran']; ?>
                                </td>
                                <td>
                                   Rp. <?= $p['total_biaya']; ?>
                                </td>
                                <td>
                                Rp. <?= $p['total_bayar']; ?>
                                </td>
                                <td>
                                Rp. <?= $p['diskon']; ?>
                                </td>
                                <td>
                                Rp. <?= $p['kembalian']; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($p['status'] == 2): ?>
                                        <a class="btn btn-xs btn-success btn-blink">
                                            Lunas
                                        </a>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $p['tanggal_pembayaran']; ?>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal"
                                        data-target="#editPembayaranModal<?= $p['id_pembayaran']; ?>"
                                        class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('Pembayaran/delet/'); ?><?= $p['id_pembayaran']; ?>"
                                        class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                                    <a href="<?= base_url('Pembayaran/detail/'); ?><?= $p['id_pembayaran']; ?>"
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

<?php foreach ($pembayaran as $o): ?>
    <div class="modal fade" id="editPembayaranModal<?= $o['id_pembayaran'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editPembayaranModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="editPembayaranModalLabel">Ubah Pembayaran</h3>
                </div>
                <form action="<?= base_url('Pembayaran/edit/'); ?><?= $o['id_pembayaran']; ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_Pembayaran" name="nama_Pembayaran"
                                value="<?= $o['nama_Pembayaran'] ?>">
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
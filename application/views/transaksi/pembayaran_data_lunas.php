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

<?php foreach ($pembayaran as $p): ?>
    <div class="modal fade" id="editPembayaranModal<?= $p['id_pembayaran'] ?>" tabindex="-1" role="dialog"
        aria-labelledby="editPembayaranModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title" id="editPembayaranModalLabel">Transaksi</h3>
                </div>
                <form action="<?= base_url('transaksi/bayar/'); ?><?= $p['id_pembayaran']; ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <label for="metode" class="control-label">Cara Bayar</label>
                                    <select name="metode" class="form-control">
                                        <?php
                                        $TU = ($p['metode_pembayaran'] == "Tunai") ? "selected" : "";
                                        $TR = ($p['metode_pembayaran'] == "Tranfer") ? "selected" : "";
                                        $B = ($p['metode_pembayaran'] == "BPJS") ? "selected" : "";
                                        ?>
                                        <option value="">---</option>
                                        <option value="Tunai" <?=$TU;?>>Tunai</option>
                                        <option value="Transfer" <?=$TR;?>>Transfer</option>
                                        <option value="BPJS" <?=$B;?>>BPJS</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="total_biaya" class="control-label">Total Biaya</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>Rp.</i>
                                        </div>
                                        <input type="text" name="total_biaya" id="total_biaya<?= $p['id_pembayaran'] ?>"
                                            class="form-control" value="<?= $p['total_biaya'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="diskon" class="control-label">Diskon</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>Rp.</i>
                                        </div>
                                        <input type="text" name="diskon" id="diskon<?= $p['id_pembayaran'] ?>"
                                            class="form-control" value="<?= $p['diskon'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="total_bayar" class="control-label">Total Bayar</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>Rp.</i>
                                        </div>
                                        <input type="text" name="total_bayar" id="total_bayar<?= $p['id_pembayaran'] ?>"
                                            class="form-control"  value="<?= $p['total_bayar'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="kembalian" class="control-label">Kembalian</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i>Rp.</i>
                                        </div>
                                        <input type="text" name="kembalian" id="kembalian<?= $p['id_pembayaran'] ?>"
                                            class="form-control" value="<?= $p['kembalian'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-dollar"></i> Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script>
    // Fungsi untuk menghitung kembalian
    function hitungKembalian(id_pembayaran) {
        // Ambil nilai total bayar, total biaya, dan diskon dari elemen input
        var totalBayarElement = document.getElementById('total_bayar' + id_pembayaran);
        var totalBiayaElement = document.getElementById('total_biaya' + id_pembayaran);
        var diskonElement = document.getElementById('diskon' + id_pembayaran);
        var kembalianElement = document.getElementById('kembalian' + id_pembayaran);

        // Ubah nilai elemen menjadi angka (float)
        var totalBayar = parseFloat(totalBayarElement.value);
        var totalBiaya = parseFloat(totalBiayaElement.value);
        var diskon = parseFloat(diskonElement.value);

        // Hitung kembalian
        var kembalian = totalBayar - (totalBiaya - diskon);

        // Tampilkan kembalian pada elemen input kembalian
        kembalianElement.value = kembalian;
    }

    // Panggil fungsi hitungKembalian saat nilai total bayar, total biaya, atau diskon berubah
    <?php foreach ($pembayaran as $p): ?>
        ['total_bayar', 'total_biaya', 'diskon'].forEach(function (element) {
            var elem = document.getElementById(element + '<?= $p['id_pembayaran'] ?>');
            elem.addEventListener('input', function () {
                hitungKembalian(<?= $p['id_pembayaran'] ?>);
            });
        });
    <?php endforeach; ?>

</script>
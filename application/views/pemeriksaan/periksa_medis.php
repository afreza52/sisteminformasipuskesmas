<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Pemeriksaan Medis
            <small>Periksa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pemeriksaan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Pemeriksaan Medis</h3>
                <?= $this->session->flashdata('message2'); ?>
                <hr>
                <a href="<?= base_url('umum') ?>" class="btn btn-sm btn-primary">Poli Umum </a>
                <a href="<?= base_url('gigi') ?>" class="btn btn-sm btn-primary">Poli Gigi</a>
                <a href="<?= base_url('anak') ?>" class="btn btn-sm btn-primary">Poli Anak</a>
                <a href="<?= base_url('mata') ?>" class="btn btn-sm btn-primary">Poli Mata</a>
                <a href="<?= base_url('lansia') ?>" class="btn btn-sm btn-primary">Poli Lansia</a>
                <a href="<?= base_url('KIA_MTBS_KB') ?>" class="btn btn-sm btn-primary">Poli KIA-MTBS-KB</a>
                <a href="<?= base_url('gizi') ?>" class="btn btn-sm btn-primary">Poli Gizi</a>
            </div>

            <div class="body">
                <?php foreach ($periksamedis as $p): ?>
                    <form action="" method="post">
                        <div class="container-fluit">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="modal-body">
                                        <div class="form-group">

                                            <input type="hidden" name="id_pemeriksaan" id="id_pemeriksaan"
                                                class="form-control" value="<?= $p['id_pemeriksaan'] ?>" readonly>

                                            <label class="control-label">ID Pendaftaran</label>
                                            <input type="text" name="id_pendaftaran" id="id_pendaftaran"
                                                class="form-control" value="<?= $p['id_pendaftaran'] ?>" readonly>

                                            <label class="control-label">Nama Pasien</label>
                                            <input type="text" value="<?= $p['pasien'] ?>" name="pasien"
                                                class="form-control" readonly>

                                            <label class="control-label">Nama Dokter</label>
                                            <input type="text" value="<?= $p['dokter'] ?>" class="form-control" readonly>

                                            <label class="control-label">Poliklinik</label>
                                            <input type="text" value="<?= $p['poliklinik'] ?>" class="form-control"
                                                readonly>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label">Diagnosa</label>
                                            <select class="form-control" id="id_diagnosa">
                                                <option value="">-PILIH-</option>
                                                <?php foreach ($diagnosa as $d): ?>
                                                    <option value="<?= $d['id_diagnosa'] ?>">
                                                        <?= $d['nama'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                                            <label class="control-label">Tindakan</label>
                                            <select class="form-control" id="id_tindakan">
                                                <option value="">-PILIH-</option>
                                                <?php foreach ($tindakan as $t): ?>
                                                    <option value="<?= $t['id_tindakan'] ?>">
                                                        <?= $t['nama'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                                            <label class="control-label">Catatan</label>
                                            <textarea class="form-control" rows="4" id="catatan"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label class="control-label">Nama Obat</label>
                                            <select class="form-control" id="obat">
                                                <option value="">-PILIH-</option>
                                                <?php foreach ($obat as $o): ?>
                                                    <option value="<?= $o['nama'] ?>">
                                                        <?= $o['nama'] ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>

                                            <label class="control-label">Qty</label>
                                            <input type="number" id="qty" class="form-control">

                                            <label class="control-label">Satuan</label>
                                            <select class="form-control" id="satuan">
                                                <option value="">-PILIH-</option>
                                                <option value="Kapsul">Kapsul</option>
                                                <option value="Ampul">Ampul</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Sirup">Sirup</option>
                                                <option value="Salep">Salep</option>
                                            </select>


                                            <label class="control-label">Aturan Pakai</label>
                                            <select class="form-control" id="aturan">
                                                <option value="">---</option>
                                                <option value="1 x 1 sebelum makan">1 x 1 Sebelum Makan</option>
                                                <option value="1 x 1 setelah makan">1 x 1 Setelah Makan</option>
                                                <option value="2 x 1 sebelum makan">2 x 1 Sebelum Makan</option>
                                                <option value="2 x 1 setelah makan">2 x 1 Setelah Makan</option>
                                                <option value="3 x 1 sebelum makan">3 x 1 Sebelum Makan</option>
                                                <option value="3 x 1 setelah makan">3 x 1 Setelah Makan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" id="tambahobat" class="btn btn-xs btn-primary"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-widget">
                                        <div class="bok-header">
                                            <h4 class="text-center">Resep Obat</h4>
                                        </div>
                                        <div class="box-body table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="3%">No</th>
                                                        <th width="25%">Nama obat</th>
                                                        <th width="3%">Qty</th>
                                                        <th width="10%">Satuan</th>
                                                        <th width="30%">Aturan Pakai</th>
                                                        <th width="14%">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="resepobat">
                                                    <tr class="none">
                                                        <td colspan="6" class="text-center  ">Tidak ada Obat</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="close" class="btn btn-xs btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Batal</button>
                            <button type="submit" class="btn btn-xs btn-primary" id="simpan"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-update">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Ubah Obat</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Nama Obat</label>
                    <select class="form-control" id="update_obat" name="obat">
                        <option value="">-PILIH-</option>
                        <?php foreach ($obat as $o): ?>
                            <option value="<?= $o['nama'] ?>">
                                <?= $o['nama'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <label class="control-label">Qty</label>
                    <input type="number" name="qty" id="update_qty" class="form-control">

                    <label class="control-label">Satuan</label>
                    <select name="satuan" class="form-control" id="update_satuan">
                        <option value="">-PILIH-</option>
                        <option value="Kapsul">Kapsul</option>
                        <option value="Ampul">Ampul</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Sirup">Sirup</option>
                        <option value="Salep">Salep</option>
                    </select>


                    <label class="control-label">Aturan Pakai</label>
                    <select class="form-control" name="aturan" id="update_aturan">
                        <option value="">---</option>
                        <option value="1 x 1 sebelum makan">1 x 1 Sebelum Makan</option>
                        <option value="1 x 1 setelah makan">1 x 1 Setelah Makan</option>
                        <option value="2 x 1 sebelum makan">2 x 1 Sebelum Makan</option>
                        <option value="2 x 1 setelah makan">2 x 1 Setelah Makan</option>
                        <option value="3 x 1 sebelum makan">3 x 1 Sebelum Makan</option>
                        <option value="3 x 1 setelah makan">3 x 1 Setelah Makan</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" id="updateobat" class="btn btn-flat btn-sm btn-success"><i
                            class="fa fa-save"></i>
                        Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
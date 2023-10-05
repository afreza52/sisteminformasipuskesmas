<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pendaftaran
            <small>Daftar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="#">Pendaftaran</a></li>
            <li class="active">Daftar</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Pasien Baru</h3>
                <?= $this->session->flashdata('message2'); ?>
                <div class="box-tools pull-right">
                    <a href="<?= base_url('pendaftaran/daftarlama'); ?>" class="btn btn-xs btn-primary">Pasien Lama</a>
                </div>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" action="<?= base_url('pendaftaran/daftarbaru') ?>" method="POST">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Tanggal Pendaftaran</label>
                                <div class="col-sm-8">
                                    <input type="datetime" name="tanggal_pendaftaran" id="tanggal_pendaftaran"
                                        class="form-control" value="<?= date('Y-m-d H:i:s') ?>" timezone="Asia/Jakarta"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">No RM</label>
                                <div class="col-sm-8">
                                    <input type="text" name="no_rm" class="form-control" value="<?=$norm?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">NIK Pasien</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nik" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Pasien</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_pasien" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Lahir Pasien</label>
                                <div class="col-sm-8">
                                    <input type="date" name="tanggal_lahir" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Alamat Pasien</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" rows="4" name="alamat" required placeholder="Jl. Raya Makam No.5 RT 01 / RW 05
Kecamatan Rembang, Kabupaten Purbalingga , Jawa Tengah  
Kodepos 53356"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nomor Telpon</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nomor_telpon" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Poliklinik</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="poliklinik" name="id_poliklinik" required>
                                        <option value="">-PILIH-</option>
                                        <?php foreach ($poliklinik as $pol): ?>
                                            <option value="<?= $pol['id_poliklinik'] ?>">
                                                <?= $pol['nama'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Dokter</label>
                                <div class="col-sm-8">
                                    <select class="form-control" id="dokter" name="id_dokter" required>
                                        <option value="">-PILIH-</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis Pasien</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="jenis_pasien" required>
                                        <option value="">-PILIH-</option>
                                        <option value="1">Umum</option>
                                        <option value="2">BPJS</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="close" class="btn btn-default">Batal</button>
                    <button type="submit" class="btn btn-info pull-right">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.box -->

        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<script>
 function isiPilihanDokter() {
    const poliklinikSelect = $("#poliklinik");
    const dokterSelect = $("#dokter");
    const selectedPoliklinikId = poliklinikSelect.val();

    dokterSelect.empty();// Kosongkan pilihan dokter saat ini


    $.ajax({
        url: "<?= base_url('pendaftaran/getDokterByPoliklinik') ?>", // Sesuaikan dengan URL controller Anda
        method: "POST",
        data: { id_poliklinik: selectedPoliklinikId },
        success: function (response) {
            const dokter = JSON.parse(response);

            // Isi ulang pilihan dokter sesuai dengan data yang diterima dari server
            dokter.forEach(function (dokter) {
                dokterSelect.append(new Option(dokter.dokter, dokter.id_dokter));
            });
        },
        error: function () {
            console.error("Gagal mengambil data dokter.");
        }
    });
}

// Panggil fungsi isiPilihanDokter saat halaman dimuat ulang dan ketika pemilihan poliklinik berubah
$(document).ready(function () {
    isiPilihanDokter();
    $("#poliklinik").change(isiPilihanDokter);
});

</script>

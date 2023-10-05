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

        <!-- /.box -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Pasien Lama</h3>
                <?= $this->session->flashdata('message2'); ?>
                <div class="box-tools pull-right">
                    <div class="box-tools pull-right">
                        <a href="<?= base_url('pendaftaran/daftarbaru'); ?>" class="btn btn-xs btn-primary">Pasien
                            Baru</a>
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" action="<?= base_url('pendaftaran/daftarlama') ?>" method="POST" role="form">
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
                                    <input type="text" name="no_rm" id="nomor_rekam_medis" class="form-control"
                                        onkeyup="Pasien()" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">NIK Pasien</label>
                                <div class="col-sm-8">
                                    <input type="text" id="nik" name="nik" class="form-control" readonly required>
                                    <input type="hidden" name="id_pasien" id="id_pasien">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nama Pasien</label>
                                <div class="col-sm-8">
                                    <input type="text" id="nama_pasien" name="nama_pasien" required class="form-control"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <input type="text" id="jenis_kelamin" name="jenis_kelamin" class="form-control"
                                        required readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tanggal Lahir Pasien</label>
                                <div class="col-sm-8">
                                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                                        class="form-control" readonly>
                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Alamat Pasien</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="alamat" name="alamat" required readonly
                                        rows="4"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Nomor Telpon</label>
                                <div class="col-sm-8">
                                    <input type="text" id="nomor_telpon" name="nomor_telpon" class="form-control"
                                        readonly>
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
                                    <select class="form-control" id="jenis_pasien" name="jenis_pasien" required>
                                        <option value="">-PILIH-</option>
                                        <option value="1" <?php if (1)
                                            echo "selected"; ?>>Umum</option>
                                        <option value="2" <?php if (2)
                                            echo "selected"; ?>>BPJS</option>
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

    function Pasien() {
        var iddd = $("#nomor_rekam_medis").val()
        if (iddd == '') {
            $('#nik').val('');
            $('#nama_pasien').val('');
            $('#tanggal_lahir').val('');
            $('#alamat').val('');
            $('#nomor_telpon').val('');
            $('#jenis_kelamin').val('');
            $('#jenis_pasien').val('');
        }
        $.ajax({
            url: "<?= base_url('pendaftaran/caripasien') ?>",
            type: "GET",
            dataType: "json",
            data: {
                id: $('#nomor_rekam_medis').val()
            },
            success: function (hasil) {
                if (!hasil || hasil.val == 0 || hasil.val == 2) {
                    $('#nik').val('');
                    $('#nama_pasien').val('');
                    $('#tanggal_lahir').val('');
                    $('#alamat').val('');
                    $('#nomor_telpon').val('');
                    $('#jenis_kelamin').val('');
                    $('#jenis_pasien').val('');
                    $('#id_pasien').val('');
                } else {
                    $('#nik').val(hasil.data.nik);
                    $('#nama_pasien').val(hasil.data.nama);
                    $('#tanggal_lahir').val(hasil.data.tanggal_lahir);
                    $('#alamat').val(hasil.data.alamat);
                    $('#nomor_telpon').val(hasil.data.nomor_telpon);
                    $('#jenis_kelamin').val(hasil.data.jenis_kelamin);
                    $('#jenis_pasien').val(hasil.data.jenis_pasien);
                    $('#id_pasien').val(hasil.data.id_pasien);
                }
            }
        });
    }

</script>
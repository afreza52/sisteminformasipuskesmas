<h2 class="center">Pendaftaran</h2>
<div class="serch">
    <form action="<?= base_url('laporan/cetakpendaftaran') ?>" method="post" class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-1 control-label">Cari Tanggal</label>
            <div class="col-md-2">
                <input type="date" class="form-control" name="start_date">
            </div>
            <p class="col-xs-1 control-label">s/d</p>
            <div class="col-md-2">
                <input type="date" class="form-control" name="end_date">
            </div>
            <label class="col-sm-1 control-label">Jenis Pasien</label>
            <div class="col-md-2">
                <select name="jenis_pasien" id="" class="form-control">
                    <option value="">-pilih-</option>
                    <option value="1">Umum</option>
                    <option value="2">BPJS</option>
                </select>
            </div>
            <button type="close" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>
                Filter</button>
        </div>

    </form>
</div>
<table class="medication-list ">
    <thead>
        <tr>
            <th>NO RM</th>
            <th>Nama Pasien</th>
            <th>Jenis Pasien</th>
            <th>Dokter</th>
            <th>Poliklinik</th>
            <th>Tanggal</th>
            <th>Waktu</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pendaftaran as $pdf): ?>
            <tr>
                <td>
                    <?= $pdf['no_rm'] ?>
                </td>
                <td>
                    <?= $pdf['pasien'] ?>
                </td>
                <td>
                    <?= $pdf['jenis_pasien'] == 1 ? "Umum" : "BPJS"; ?>
                </td>
                <td>
                    <?= $pdf['dokter'] ?>
                </td>
                <td>
                    <?= $pdf['poliklinik'] ?>
                </td>
                <td>
                    <?= $pdf['tanggal_pendaftaran'] ?>
                </td>
                <td>
                    <?= $pdf['waktu_pendaftaran'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
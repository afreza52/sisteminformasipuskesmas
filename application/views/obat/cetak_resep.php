<h2 class="center">Resep Obat</h2>
<?php foreach ($cetakresep as $ro): ?>
    <div class="patient-info">
        <p>Nama Pasien:
            <?= $ro['nama'] ?>
        </p>
        <p>Tanggal Lahir:
            <?= $ro['tanggal_lahir'] ?>
        </p>
        <p>Alamat:
            <?= $ro['alamat'] ?>
        </p>
    </div>
<?php endforeach; ?>

<table class="medication-list ">
    <thead>
        <tr>
            <th>Nama Obat</th>
            <th>Jumlah</th>
            <th>Aturan Minum</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($resep as $r): ?>
            <tr>
                <td>
                    <?= $r['obat'] ?>
                </td>
                <td>
                    <?= $r['jumlah'] ?>
                    <?= $r['satuan'] ?>
                </td>
                <td><?=$r['aturan_pakai']?></td>
            </tr>
        <?php endforeach; ?> <!-- Tambahkan obat-obatan lainnya di sini -->
    </tbody>
</table>
<?php foreach ($cetakresep as $cr): ?>
    <div class="signature">
        <p>Resep ini dikeluarkan oleh :
            <?= $cr['dokter'] ?>
        </p>
        <p>Tanggal Waktu :
            <?= $cr['tanggal_resep'] ?>
        </p>
    </div>
    </div>
<?php endforeach; ?>
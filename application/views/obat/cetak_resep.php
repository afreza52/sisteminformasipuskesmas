<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Obat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .patient-info {
            margin-bottom: 20px;
        }

        .medication-list {
            border-collapse: collapse;
            width: 100%;
        }

        .medication-list th,
        .medication-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .medication-list th {
            background-color: #f2f2f2;
        }

        .signature {
            margin-top: 20px;
        }

        .signature p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Resep Obat</h1>
        </div>

        <div class="patient-info">
            <p>Nama Pasien: <?=$r['pasien']?></p>
            <p>Tanggal Lahir: 01-Jan-1980</p>
            <p>Alamat: Jl. Contoh No. 123, Kota Contoh</p>
        </div>

        <table class="medication-list">
            <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Jumlah</th>
                    <th>Aturan Minum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($resep as $r):?>
                <tr>
                    <td><?=$r['obat']?></td>
                    <td><?=$r['jumlah']?></td>
                    <td>Sesudah makan, 2 kali sehari</td>
                </tr>
               <?php endforeach;?> <!-- Tambahkan obat-obatan lainnya di sini -->
            </tbody>
        </table>

        <div class="signature">
            <p>Resep ini dikeluarkan oleh: Dr. Contoh Dokter</p>
            <p>Tanggal: 05-Okt-2023</p>
        </div>
    </div>
</body>
</html>

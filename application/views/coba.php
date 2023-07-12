<h1>
    <div align="center">DAFTAR KARYAWAN TERBAIK</div>
</h1>
<h3>
    <div align="center">DAFTAR KARYAWAN TERBAIK MENURUT DIREKTUR</div>
</h3>
<div align="center">
    <table cellspacing="0" border='1' align="center">
        <thead>
            <tr>
                <th style="padding: 10px;">No</th>
                <th style="padding: 10px;">Nama Karyawan</th>
                <th style="padding: 10px;">Posisi</th>
                <th style="padding: 10px;">Kedekatan Relatif</th>
                <th style="padding: 10px;">Tanggal Pemilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($pegawai as $data) : ?>
                <?php if ($no <= 3) { ?>
                    <tr>
                        <td style="padding: 10px; text-align: right;"><?= $no++; ?>.</td>
                        <td style="padding: 10px;"><?= wordwrap($data['nama_pegawai'], 30, "<br />>\n", true); ?></td>
                        <td style="padding: 10px;"><?= wordwrap($data['posisi_id'], 30, "<br />", true); ?></td>
                        <td style="padding: 10px; text-align: right;"><?= $data['kedekatan_relatif'] ?></td>
                        <td style="padding: 10px; text-align: right;"><?= $data['tanggal_pemilihan'] ?></td>
                    </tr>
                <?php } ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<h3>
    <div face="Times New Roman" align="center">DAFTAR KARYAWAN TERBAIK MENURUT TOPSIS</div>
</h3>
<div align="center">
    <table cellspacing="0" border='1' align="center">
        <thead>
            <tr>
                <th style="padding: 10px;">No</th>
                <th style="padding: 10px;">Nama Karyawan</th>
                <th style="padding: 10px;">Separasi Ideal Positif</th>
                <th style="padding: 10px;">Separasi Ideal Negatif</th>
                <th style="padding: 10px;">Kedekatan Relatif</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($bokrit as $data) { ?>
                <?php if ($no <= 3) { ?>
                    <tr>
                        <td style="padding: 10px;"><?= $no++; ?></td>
                        <td style="padding: 10px;"><?= wordwrap($data['nama_pegawai'], 30, "<br />\n", true); ?></td>
                        <td style="padding: 10px; text-align: right;">
                            <?= $data['hitung_separasi_positif']; ?>
                        </td>
                        <td style="padding: 10px; text-align: right;">
                            <?= $data['hitung_separasi_negatif']; ?>
                        </td>
                        <td style="padding: 10px; text-align: right;">
                            <?php echo $d = $data['hitung_kedekatan_relatif']; ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
</div>
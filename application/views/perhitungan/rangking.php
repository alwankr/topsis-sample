<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Peringkat Sementara</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Separasi Ideal Positif</th>
                            <th>Separasi Ideal Negatif</th>
                            <th>Kedekatan Relatif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($bokrit as $data) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama_pegawai'] ?></td>
                                <td>
                                    <?= $data['hitung_separasi_positif']; ?>
                                </td>
                                <td>
                                    <?= $data['hitung_separasi_negatif']; ?>
                                </td>
                                <td>
                                    <?php echo $d = $data['hitung_kedekatan_relatif']; ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
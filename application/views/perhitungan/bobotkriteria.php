<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bobot Kriteria</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2" style="padding-bottom: 38px;">No</th>
                            <th rowspan="2" style="padding-bottom: 38px;">Nama Karyawan</th>
                            <th colspan="3">Performance</th>
                            <th colspan="3">Capacity</th>
                        </tr>
                        <tr>
                            <th>KPI</th>
                            <th>Rekam Jejak</th>
                            <th>Penghargaan</th>
                            <th>Assestment</th>
                            <th>Feedback</th>
                            <th>Learning Ability</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($bokrit as $data) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama_pegawai'] ?></td>
                                <td><?= $data['bokrit_kpi'] ?></td>
                                <td><?= $data['bokrit_rejak'] ?></td>
                                <td><?= $data['bokrit_penghargaan'] ?></td>
                                <td><?= $data['bokrit_assestment'] ?></td>
                                <td><?= $data['bokrit_feedback'] ?></td>
                                <td><?= $data['bokrit_leab'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Pembagi Keputusan</th>
                            <td><?= $akar['kpi'] ?></td>
                            <td><?= $akar['rejak'] ?></td>
                            <td><?= $akar['penghargaan'] ?></td>
                            <td><?= $akar['assestment'] ?></td>
                            <td><?= $akar['feedback'] ?></td>
                            <td><?= $akar['leab'] ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
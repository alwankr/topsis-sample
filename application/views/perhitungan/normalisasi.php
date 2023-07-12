<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Normalisasi</h6>
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
                                <td><?= substr($data['bokrit_kpi'] / $akar['kpi'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_rejak'] / $akar['rejak'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_penghargaan'] / $akar['penghargaan'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_assestment'] / $akar['assestment'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_feedback'] / $akar['feedback'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_leab'] / $akar['leab'], 0, 5) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Bobot Referensi</th>
                            <td><?= $rata['kpi'] ?></td>
                            <td><?= $rata['rejak'] ?></td>
                            <td><?= $rata['penghargaan'] ?></td>
                            <td><?= $rata['assestment'] ?></td>
                            <td><?= $rata['feedback'] ?></td>
                            <td><?= $rata['leab'] ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
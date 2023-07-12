<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Matriks Terbobot</h6>
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
                                <td><?= substr($data['bokrit_kpi'] * $rata['kpi'] / $akar['kpi'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_rejak'] * $rata['rejak'] / $akar['rejak'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_penghargaan'] * $rata['penghargaan'] / $akar['penghargaan'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_assestment'] * $rata['assestment'] / $akar['assestment'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_feedback'] * $rata['feedback'] / $akar['feedback'], 0, 5) ?></td>
                                <td><?= substr($data['bokrit_leab'] * $rata['leab'] / $akar['leab'], 0, 5) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Solusi Ideal Positif</th>
                            <td><?= $si['positif']['positifkpi'] ?></td>
                            <td><?= $si['positif']['positifrejak'] ?></td>
                            <td><?= $si['positif']['positifpenghargaan'] ?></td>
                            <td><?= $si['positif']['positifassestment'] ?></td>
                            <td><?= $si['positif']['positiffeedback'] ?></td>
                            <td><?= $si['positif']['positifleab'] ?></td>
                        </tr>
                        <tr>
                            <th colspan="2">Solusi Ideal Negatif</th>
                            <td><?= $si['negatif']['negatifkpi'] ?></td>
                            <td><?= $si['negatif']['negatifrejak'] ?></td>
                            <td><?= $si['negatif']['negatifpenghargaan'] ?></td>
                            <td><?= $si['negatif']['negatifassestment'] ?></td>
                            <td><?= $si['negatif']['negatiffeedback'] ?></td>
                            <td><?= $si['negatif']['negatifleab'] ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i></i>
            </button>
            <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th colspan="3">Performance</th>
                            <th colspan="3">Capacity</th>
                        </tr>
                        <tr>
                            <th></th>
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
                        <?php foreach ($detail as $row) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['kpi'] ?></td>
                                <td><?= $row['rekam_jejak'] ?></td>
                                <td><?= $row['penghargaan'] ?></td>
                                <td><?= $row['assestment'] ?></td>
                                <td><?= $row['feedback'] ?></td>
                                <td><?= $row['leab'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
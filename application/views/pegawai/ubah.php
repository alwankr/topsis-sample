<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Halaman Edit</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        <form action="<?= base_url('pegawai/ubah') ?>" method="post">
                            <div class="form-group">
                                <label>Nama Pegawai</label>
                                <input type="hidden" name="id" value="<?= $ubah['id_pegawai'] ?>">
                                <input type="text" name="nama" class="form-control" required value="<?= $ubah['nama_pegawai'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Posisi</label>
                                <select name="posisi" class="form-control">
                                    <?php foreach ($posisi as $row) { ?>
                                        <?php if ($row['id_posisi'] == $ubah['posisi_id']) { ?>
                                            <option selected value="<?= $row['id_posisi'] ?>"><?= $row['nama_posisi'] ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $row['id_posisi'] ?>"><?= $row['nama_posisi'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>KPI</label>
                                <input type="number" name="kpi" class="form-control" required value="<?= $ubah['kpi'] ?>" max="100">
                            </div>
                            <div class="form-group">
                                <label>Rekam Jejak</label>
                                <input type="number" name="rekam_jejak" class="form-control" required value="<?= $ubah['rekam_jejak'] ?>" max="10">
                            </div>
                            <div class="form-group">
                                <label>Penghargaan</label>
                                <input type="number" name="penghargaan" class="form-control" required value="<?= $ubah['penghargaan'] ?>" max="15">
                            </div>
                            <div class="form-group">
                                <label>Assestment</label>
                                <input type="number" name="assestment" class="form-control" required value="<?= $ubah['assestment'] ?>" max="100">
                            </div>
                            <div class="form-group">
                                <label>Feedback</label>
                                <input type="number" name="feedback" class="form-control" required value="<?= $ubah['feedback'] ?>" max="20">
                            </div>
                            <div class="form-group">
                                <label>Learning Ability</label>
                                <input type="number" name="leab" class="form-control" required value="<?= $ubah['leab'] ?>" max="10">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                <a href="<?= base_url('pegawai') ?>" class="btn btn-outline-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
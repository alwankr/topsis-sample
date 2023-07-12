<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if ($this->session->flashdata('pesan')) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?= $this->session->flashdata('pesan'); ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Karyawan Terbaik</h6>
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
                            <th>Pilih Karyawan</th>
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
                                <td>
                                    <a href="<?= base_url('karyawanpilihan/karyawanpilihan/' . $d . '/' . $data['pegawai_id']) ?>" class="btn btn-circle btn-outline-primary"><i class="fas fa-fw fa-check"></i></i></a></a>
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
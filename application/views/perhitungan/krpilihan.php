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
            <button type="button" class="btn btn-primary float-right" onclick="document.location = '<?php echo base_url(); ?>karyawanpilihan/testpdf';">
                <i class=" fas fa-print"></i></i>
            </button>
            <h6 class="m-0 font-weight-bold text-primary">Karyawan Terbaik Pilihan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Karyawan</th>
                            <th>Posisi</th>
                            <th>Kedekatan Relatif</th>
                            <th>Tanggal Pemilihan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($pegawai as $data) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama_pegawai'] ?></td>
                                <td><?= $data['posisi_id'] ?></td>
                                <td><?= $data['kedekatan_relatif'] ?></td>
                                <td><?= $data['tanggal_pemilihan'] ?></td>
                                <td>
                                    <a href="<?= base_url('karyawanpilihan/detail/' . $data['pegawai_id']) ?>" class="btn btn-circle btn-outline-primary"><i class="fas fa-eye"></i></a>
                                    <a href="<?= base_url('karyawanpilihan/hapus/' . $data['pegawai_id']) ?>" onclick="return confirm('Apa Anda Yakin ?')" class="btn btn-outline-danger"><i class="fas fa-sm fa-trash"></i></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
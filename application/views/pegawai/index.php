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
			<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
				<i class="fas fa-plus"></i></i>
			</button>
			<h6 class="m-0 font-weight-bold text-primary">Data Karyawan</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Karyawan</th>
							<th>Posisi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						<?php foreach ($pegawai as $row) { ?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $row['nama_pegawai'] ?></td>
								<td><?= $row['nama_posisi'] ?></td>
								<td>
									<a href="<?= base_url('pegawai/hapus/' . $row['id_pegawai']) ?>" onclick="return confirm('Apa Anda Yakin ?')" class="btn btn-outline-danger"><i class="fas fa-sm fa-trash"></i></i></a>
									<a href="<?= base_url('pegawai/ubah/' . $row['id_pegawai']) ?>" class="btn btn-outline-primary"><i class="fas fa-sm fa-edit"></i></i></a>
									<a href="<?= base_url('pegawai/detail/' . $row['id_pegawai']) ?>" class="btn btn-outline-success"><i class="fas fa-sm fa-eye"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('pegawai') ?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" name="nama" placeholder="Nama Pegawai" required class="form-control">
					</div>
					<div class="form-group">
						<select name="posisi" class="form-control">
							<?php foreach ($posisi as $row) { ?>
								<option value="<?= $row['id_posisi'] ?>"><?= $row['nama_posisi'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>
		</div>
	</div>
</div>
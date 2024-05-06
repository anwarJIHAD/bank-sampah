<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Halaman Data Pegawai</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<script src="myJs.js"></script>
	<script>

	</script>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<!-- /.card-header -->
						<?php if ($user1) { ?>
							<div class="card-header">
								<a href="<?= base_url('Admin/admin/tambah/') ?>"
									class="btn btn-secondary float-left">TAMBAHKAN PEGAWAI</a>
							</div>
						<?php } ?>

						<div class="card-body">
							<?= $this->session->flashdata('message'); ?>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>NO</th>
										<th>Foto</th>
										<th>NIP</th>
										<th>Nama Lengkap</th>
										<th>Status Pegawai</th>
										<th>Pangkat</th>
										<th>Jenis Jabatan</th>

										<?php if ($user1) { ?>
											<th>Status Akun</th>
										<?php } ?>
										<th>Password</th>

										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($user1 as $us): ?>
										<tr>
											<td>
												<?= $i; ?>.
											</td>
											<td><img src="<?= base_url('assets/img/pegawai/') . $us['gambar']; ?>"
													style="width: 100px;" class="img-thumbnail"></td>
											<td>
												<?= $us['NIP']; ?>
											</td>
											<td>
												<?= $us['nama']; ?>
											</td>
											<td>
												<?= $us['role']; ?>
											</td>
											<td>
												<?= $us['pangkat']; ?>
											</td>
											<td>
												<?= $us['jenis_jabatan']; ?>
											</td>
											<?php if ($user1[0]['status_user2'] == 'Aktif') { ?>
												<td>
													<?= $us['status_user'];
													if ($us['status_user'] == 'aktif') { ?>
														<br> <button style="padding: 0; border: none; background: none;"><a
																onclick="noaktif(<?php echo $us['NIP'] ?>)"
																class="badge badge-danger">Non
																Aktifkan
																Akun</a></button>
														<?php
													} else { ?>
														<br> <button style="padding: 0; border: none; background: none;"><a
																onclick="aktif_user(<?php echo $us['NIP'] ?>)"
																class="badge badge-success">Aktifkan Akun</a></button>
														<?php
													}
													?>

												</td>
											<?php } ?>


											<td>
												********<br>
												<button style="padding: 0; border: none; background: none;"><a
														onclick="reset(<?php echo $us['NIP'] ?>)"
														class="badge badge-warning">Reset
														Password</a></button>

												<!-- <a href="<?= base_url('Admin/Akses/resetpw/') . $us['NIP']; ?>"
													class="badge badge-warning">Reset
													Password</a> -->
											</td>
											<!-- <td><?= $us['jabatan']; ?></td>
										<td><?= $us['unit_kerja']; ?></td> -->
											<!-- <td><?= $us['pendidikan_terakhir']; ?></td>
										<td><?= $us['status_aktif']; ?></td>
										<td><?= $us['pin_presensi']; ?></td>
										<td><?= $us['tgl_akhir']; ?></td> -->

											<td>
												<?php if ($us['status_user2'] == 'Aktif') { ?>
													<a href="<?= base_url('Admin/Admin/NonAktif/') . $us['NIP']; ?>"
														class="badge badge-danger">Non Aktifkan User</a>
												<?php } else if ($us['status_user2'] == 'Non-Aktif') { ?>
														<a href="<?= base_url('Admin/Admin/Aktif/') . $us['NIP']; ?>"
															class="badge badge-success"> Aktifkan User</a>
												<?php } ?>
												<a href="<?= base_url('Admin/Admin/edit/') . $us['NIP']; ?>"
													class="badge badge-warning">Edit</a>
												<a href="<?= base_url('Admin/Admin/detail/') . $us['NIP']; ?>"
													class="badge badge-info">Detail</a>
												<a type="button" class="badge badge-primary" data-bs-toggle="modal"
													data-bs-target="#akses<?= $us['NIP']; ?>">Akses</a>
											</td>
										</tr>
										<?php $i++; ?>
									<?php endforeach; ?>
									</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Modal -->
<?php foreach ($user1 as $us): ?>
	<div class="modal fade" id="akses<?= $us['NIP']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
		aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="staticBackdropLabel">Beri Hak Akses Pada Pegawai</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="<?= base_url('Admin/Akses/akses/') . $us['NIP']; ?>" method="POST"
					enctype="multipart/form-data">
					<div class="modal-body">

						<div class="input-group" style="margin-top:10px;">
							<div class="input-group-text">
								<input class="form-check-input mt-0" type="checkbox" value="pkln" name="akses[]"
									aria-label="Checkbox for following text input" <?php if ($us['pkln'] == 'yes') {
										?>
										checked <?php
									} ?>>
							</div>
							<input type="text" class="form-control" value="data pencari kerja luar negeri"
								aria-label="Text input with checkbox" readonly>
						</div>
						<div class="input-group" style="margin-top:10px;">
							<div class="input-group-text">
								<input class="form-check-input mt-0" type="checkbox" value="penempatan" name="akses[]"
									aria-label="Checkbox for following text input" <?php if ($us['penempatan'] == 'yes') {
										?>
										checked <?php
									} ?>>
							</div>
							<input type="text" class="form-control" value="data penempatan"
								aria-label="Text input with checkbox" readonly>
						</div>
						<div class="input-group" style="margin-top:10px;">
							<div class="input-group-text">
								<input class="form-check-input mt-0" type="checkbox" value="kasus" name="akses[]"
									aria-label="Checkbox for following text input" <?php if ($us['kasus'] == 'yes') {
										?>
										checked <?php
									} ?>>
							</div>
							<input type="text" class="form-control" value="data kasus" aria-label="Text input with checkbox"
								readonly>
						</div>
						<div class="input-group" style="margin-top:10px;">
							<div class="input-group-text">
								<input class="form-check-input mt-0" type="checkbox" value="pencegahan" name="akses[]"
									aria-label="Checkbox for following text input" <?php if ($us['pencegahan'] == 'yes') {
										?>
										checked <?php
									} ?>>
							</div>
							<input type="text" class="form-control" value="data pencegahan penempatan ilegal PMI"
								aria-label="Text input with checkbox" readonly>
						</div>
						<div class="input-group" style="margin-top:10px;">
							<div class="input-group-text">
								<input class="form-check-input mt-0" type="checkbox" value="pemulangan" name="akses[]"
									aria-label="Checkbox for following text input" <?php if ($us['pemulangan'] == 'yes') {
										?>
										checked <?php
									} ?>>
							</div>
							<input type="text" class="form-control" value="data pemulangan PMI"
								aria-label="Text input with checkbox" readonly>
						</div>
						<div class="input-group" style="margin-top:10px;">
							<div class="input-group-text">
								<input class="form-check-input mt-0" type="checkbox" value="template" name="akses[]"
									aria-label="Checkbox for following text input" <?php if ($us['template'] == 'yes') {
										?>
										checked <?php
									} ?>>
							</div>
							<input type="text" class="form-control" value="laporan sesuai template"
								aria-label="Text input with checkbox" readonly>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Kirim</button>
					</div>
				</form>

			</div>
		</div>
	</div>
<?php endforeach; ?>

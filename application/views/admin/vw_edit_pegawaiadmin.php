<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="h3 mb-4 text-gray-800">
						<?php echo $judul; ?>
					</h1>
				</div>
				<div class="col-sm-6">

				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="card card-secondary">
						<div class="card-header">
							<h3 class="card-title">Profile</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->

						<form action="" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="NIP" value="<?= $user1['NIP']; ?>">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputText">Nama Lengkap</label>
									<input type="text" class="form-control" value="<?= $user1['nama']; ?>" name="nama"
										placeholder="Nama Lengkap">
									<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="exampleInputText">Status Pegawai</label>
									<!-- <input type="text" class="form-control" value="<?= $user1['role']; ?>"
										name="status_pegawai" placeholder="Status Pegawai"> -->
									<select name="status_pegawai" id="status_pegawai" class="form-control"
										selected="<?= $user1['status_pegawai']; ?>" placeholder="status_pegawai"
										aria-readonly="">
										<option value="">-----pilih Status Pegawai-----</option>
										<option value="PNS" <?php if ($user1['role'] == "PNS")
											echo 'selected = "selected"'; ?>>
											pns
										</option>

										<option value="PPNPN" <?php if ($user1['role'] == "PPNPN")
											echo 'selected = "selected"'; ?>>
											ppnpn</option>
									</select>

									<?= form_error('status_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class="form-group">
									<label for="exampleInputText">pangkat/golongan</label><br>
									<select name="pangkat" id="pangkat" class="form-control"
										placeholder="Jenis Jabatan">
										<option value="">-----pilih jenis jabatan-----</option>
										<?php foreach ($golongan as $golong): ?>
											<!-- Gunakan echo untuk nilai atribut dan periksa jika itu harus dipilih -->
											<option value="<?= htmlspecialchars($golong['golongan']); ?>" <?php if ($golong['golongan'] == $user1['pangkat'])
												  echo 'selected="selected"'; ?>>
												<?= htmlspecialchars($golong['golongan']); ?>
											</option>
										<?php endforeach; ?>
									</select>
									<?= form_error('pangkat', '<small class="text-danger pl-3">', '</small>'); ?>

								</div>

								<div class="form-group">
									<label for="exampleInputText">Jenis Jabatan</label><br>
									<select name="jenis_jabatan" id="jenis_jabatan" class="form-control"
										selected="<?= $user1['jenis_jabatan']; ?>" placeholder="Jenis Jabatan">
										<option value="">-----pilih jenis jabatan-----</option>
										<option value="struktural" <?php if ($user1['jenis_jabatan'] == "struktural")
											echo 'selected = "selected"'; ?>>
											struktural
										</option>
										<option value="pelaksana" <?php if ($user1['jenis_jabatan'] == "pelaksana")
											echo 'selected = "selected"'; ?>>
											pelaksana</option>
										<option value="fungsional" <?php if ($user1['jenis_jabatan'] == "fungsional")
											echo 'selected = "selected"'; ?>>
											fungsional</option>
									</select>
									<?= form_error('jenis_jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="exampleInputText">Jabatan</label>
									<input type="text" class="form-control" value="<?= $user1['jabatan']; ?>"
										name="jabatan" placeholder="Jabatan">
									<?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>

								<div class="form-group">
									<label for="exampleInputText">Pendidikan Terakhir</label><br>
									<select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control"
										placeholder="Pendidikan Terakhir">
										<option value="">-----pilih Pendidikan Terakhir-----</option>
										<?php foreach ($pendidikan as $study): ?>
											<!-- Gunakan echo untuk nilai atribut dan periksa jika itu harus dipilih -->
											<option value="<?= htmlspecialchars($study['nama']); ?>" <?php if ($study['nama'] == $user1['pendidikan_terakhir'])
												  echo 'selected="selected"'; ?>>
												<?= htmlspecialchars($study['nama']); ?>
											</option>
										<?php endforeach; ?>
									</select>
									<!-- <?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?> -->

								</div>

								
								<div class="form-group">
									<label for="exampleInputText">email</label>
									<input type="text" class="form-control" value="<?= $user1['email']; ?>" name="email"
										placeholder="email">
								</div>
								<div class="form-group">
									<label for="exampleInputText">no_hp</label>
									<input type="text" class="form-control" value="<?= $user1['no_hp']; ?>" name="no_hp"
										placeholder="no_hp">
									<?= form_error('no_hp', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="exampleInputText">Masa Kerja</label>
									<input type="date" class="form-control" value="<?= $user1['masa_kerja']; ?>"
										name="masa_kerja" placeholder="Masa Kerja">
								</div>

								<div class="form-group">
									<label for="exampleInputText">Terakhir KGB</label>
									<input type="date" class="form-control" value="<?= $user1['tgl_akhir']; ?>"
										name="tgl_akhir" placeholder="Tanggal Terakhir Naik Pangkat">
								</div>
								<div class="form-group">
									<label for="exampleInputFile">Foto Profile</label>
									<div class="custom-file">
										<input type="file" name="gambar" class="custom-file-input" id="gambar">
										<label for="gambar" class="custom-file-label">Choose File</label>
									</div>
								</div>

								<a href="<?= base_url('Admin/Admin/') ?>" class="btn btn-secondary float-left">Tutup</a>
								<button type="submit" name="edit" class="btn btn-secondary float-right">Edit
									Profile</button>

						</form>
					</div>

				</div>

			</div>
	</section>
</div>

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
							<h3 class="card-title">Tambah Pegawai</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->

						<form action="" method="POST" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label for="nama">Nama Lengkap</label>
									<input type="text" name="nama" value="<?= set_value('nama'); ?>"
										class="form-control" id="nama" placeholder="Masukkan Nama Lengkap">
									<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="jenis_kelamin">Jenis Kelamin</label>
									<select name="jenis_kelamin" id="jenis_kelamin" class="form-control"
										placeholder="Jenis Jabatan">
										<option value="">-----pilih jenis Kelamin-----</option>
										<option value="laki-laki">
											Laki-Laki
										</option>
										<option value="perempuan">
											Perempuan
										</option>
									</select>
									<?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>

								</div>
								<div class="form-group">
									<label for="tgl_lahir">Tanggal Lahir</label>
									<input type="date" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>"
										class="form-control" id="tgl_lahir" placeholder="Masukkan Tanggal Keluar">
								</div>
								<div class="form-group">
									<label for="tgl_pengangkatan">Tanggal Pengangkatan PNS</label>
									<input type="date" name="tgl_pengangkatan"
										value="<?= set_value('tgl_pengangkatan'); ?>" class="form-control"
										id="tgl_pengangkatan" placeholder="Masukkan Tanggal Keluar">
								</div>
								<div class="form-group">
									<label for="no_urut">No urut Pegawai</label>
									<input type="text" name="no_urut" value="<?= set_value('no_urut'); ?>"
										class="form-control" id="no_urut"
										placeholder="Masukkan no_urut dengan kombinasi 3 angka">
									<?= form_error('no_urut', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="email">email</label>
									<input type="mail" name="email" value="<?= set_value('email'); ?>"
										class="form-control" id="email" placeholder="Masukkan email">
									<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="form-group">
									<label for="status_pegawai">Status Pegawai</label>
									<select name="status_pegawai" id="status_pegawai" class="form-control"
										placeholder="Jenis Jabatan">
										<option value="">-----pilih jenis jabatan-----</option>
										<option value="PNS">
											PNS/P3K
										</option>
										<option value="PPNPN">
											PPNPN
										</option>
									</select>
								</div>
								<!-- <div class="form-group">
									<label for="password1">Password</label>
									<input type="password" name="password1" value="<?= set_value('password1'); ?>"
										class="form-control" id="password1" placeholder="Masukkan Password">
								</div>
								<div class="form-group">
									<label for="password2">Ulangi Password</label>
									<input type="password" name="password2" value="<?= set_value('password2'); ?>"
										class="form-control" id="password2" placeholder="Ulangi Password">
								</div> -->
								<a href="<?= base_url('Admin/admin') ?>" class="btn btn-secondary float-left">Tutup</a>
								<button type="submit" name="tambah" class="btn btn-secondary float-right">Tambah
									Data</button>
						</form>
					</div>
				</div>
			</div>
	</section>
</div>

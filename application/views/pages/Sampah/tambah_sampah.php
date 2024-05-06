<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> <a class="text-muted fw-light" href="<?= base_url('C_Sampah') ?>">Sampah/</a>
		Tambah</h4>
	<!-- Basic Layout -->
	<div class="row">
		<div class="col-xl">
			<div class="card mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="mb-0">Tambah Sampah</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" class="form-control" name="kategori" id="basic-default-fullname"
								value="<?= set_value('kategori'); ?>" placeholder="JMasukkan kategori Lengkap" />
							<label for="basic-default-fullname">kategori Sampah</label>
							<?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" class="form-control" name="harga_nasabah" id="basic-default-company"
								value="<?= set_value('harga_nasabah'); ?>" placeholder="Masukkan harga nasabah" />
							<label for="basic-default-company">Harga Nasabah</label>
							<?= form_error('harga_nasabah', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" id="basic-default-phone" name="harga_unit"
								class="form-control phone-mask" value="<?= set_value('harga_unit'); ?>"
								placeholder="Masukkan Nomor Telp" />
							<label for="basic-default-phone">Harga Unit</label>
							<?= form_error('harga_unit', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						
						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>
				</div>
			</div>
		</div>
		<!-- Merged -->

	</div>
</div>
<!-- / Content -->

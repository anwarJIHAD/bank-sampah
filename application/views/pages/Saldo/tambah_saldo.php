<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> <a class="text-muted fw-light" href="<?= base_url('C_Saldo') ?>">Penarikan Saldo/</a>
		Tambah</h4>
	<!-- Basic Layout -->
	<div class="row">
		<div class="col-xl">
			<div class="card mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="mb-0">Tambah Penarikan Saldo</h5>
				</div>
				<div class="card-body">
				<form action="" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id_nasabah" id="" value="<?= $id_nasabah ?>">
						<div class="form-floating form-floating-outline mb-4">
							<input type="datetime-local" class="form-control" name="tanggal" id="basic-default-fullname"
								value="<?= set_value('tanggal'); ?>" placeholder="JMasukkan tanggal Lengkap" />
							<label for="basic-default-fullname">Tanggil Penarikan</label>
							<?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" class="form-control" name="nominal" id="basic-default-company"
								value="<?= set_value('nominal'); ?>" placeholder="Masukkan nominal" />
							<label for="basic-default-company">nominal</label>
							<?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" id="basic-default-phone" name="keterangan" class="form-control phone-mask"
								value="<?= set_value('keterangan'); ?>" placeholder="Masukkan Nomor Telp" />
							<label for="basic-default-phone">Keterangan</label>
							<?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
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

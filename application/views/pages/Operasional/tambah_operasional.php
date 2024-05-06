<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> <a class="text-muted fw-light"
			href="<?= base_url('C_Operasional') ?>">Operasional/</a>
		Tambah</h4>
	<!-- Basic Layout -->
	<div class="row">
		<div class="col-xl">
			<div class="card mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="mb-0">Tambah Operasional</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-floating form-floating-outline mb-4">
							<input type="datetime-local" class="form-control" name="tgl" id="basic-default-fullname"
								value="<?= set_value('tgl'); ?>" placeholder="Masukkan tanggal pengeluaran" />
							<label for="basic-default-fullname">Tanggal Pengeluaran Operasional</label>
							<?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
							<div class="form-floating form-floating-outline mb-4">
								<textarea type="text" class="form-control" name="keterangan" id="basic-default-company"
									 placeholder="Masukkan keterangan"><?= set_value('keterangan'); ?></textarea>
								<label for="basic-default-company">Keterangan</label>
								<?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" id="basic-default-phone" name="harga" class="form-control phone-mask"
								value="<?= set_value('harga'); ?>" placeholder="Masukkan Harga" />
							<label for="basic-default-phone">Harga</label>
							<?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
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

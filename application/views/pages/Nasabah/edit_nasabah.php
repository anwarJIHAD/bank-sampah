<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> <a class="text-muted fw-light" href="<?= base_url('C_Nasabah') ?>">Nasabah/</a>
		Edit</h4>
	<!-- Basic Layout -->
	<div class="row">
		<div class="col-xl">
			<div class="card mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="mb-0">Edit Nasabah</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" class="form-control" name="nama" id="basic-default-fullname"
								value="<?= $Nasabah['nama']; ?>" placeholder="JMasukkan Nama Lengkap" />
							<label for="basic-default-fullname">Nama Nasabah</label>
							<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" class="form-control" name="Alamat" id="basic-default-company"
							value="<?= $Nasabah['alamat']; ?>" placeholder="Masukkan Alamat" />
							<label for="basic-default-company">Alamat</label>
							<?= form_error('Alamat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" id="basic-default-phone" name="No_tlp" class="form-control phone-mask"
							value="<?= $Nasabah['no_tlp']; ?>" placeholder="Masukkan Nomor Telp" />
							<label for="basic-default-phone">Nomor Telpon</label>
							<?= form_error('No_tlp', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input id="basic-default-message" value="<?= $Nasabah['saldo']; ?> "class="form-control"
								name="saldo" placeholder="Masukkan Saldo Nasabah" style="height: 60px" />
							<label for="basic-default-message">Saldo</label>
							<?= form_error('saldo', '<small class="text-danger pl-3">', '</small>'); ?>
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

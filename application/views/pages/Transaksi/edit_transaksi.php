<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> <a class="text-muted fw-light" href="<?= base_url('C_Transaksi') ?>">Transaksi/</a>
		Edit</h4>
	<!-- Basic Layout -->
	<div class="row">
		<div class="col-xl">
			<div class="card mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="mb-0">Edit Transaksi</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="tgl" id="" value="<?= $Transaksi['tanggal_transaksi']; ?>">
						<input type="hidden" name="id_nasabah" id="" value="<?= $Transaksi['id_nasabah']; ?>">
						<div class="form-floating form-floating-outline mb-4">
							<select name="kategori" id="kategori" class="form-control" placeholder="Kategori">
								<?php foreach ($sampah as $us): ?>
									<!-- Gunakan echo untuk nilai atribut dan periksa jika itu harus dipilih -->
									<option value="<?= htmlspecialchars($us['id_sampah']); ?>" <?php if ($us['id_sampah'] == $Transaksi['id_sampah'])
										  echo 'selected="selected"'; ?>>
										<?= htmlspecialchars($us['kategori']); ?>
									</option>
								<?php endforeach; ?>
							</select>
							<label for="basic-default-fullname">Jenis Sampah</label>
							<?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" class="form-control harga" id='harga' name="harga/kg"
								id="basic-default-company" value="<?= $Transaksi['harga/kg']; ?>"
								placeholder="Masukkan harga nasabah" />
							<label for="basic-default-company">Harga/kg</label>
							<?= form_error('harga/kg', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" id="berat" name="berat" class="form-control phone-mask berat"
								value="<?= $Transaksi['berat_sampah']; ?>" placeholder="Masukkan Nomor Telp" />
							<label for="basic-default-phone">berat_sampah</label>
							<?= form_error('berat', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" id="basic-default-phone" name="pendapatan"
								class="form-control phone-mask total_h" value="<?= $Transaksi['pendapatan']; ?>"
								placeholder="Masukkan Nomor Telp" readonly />
							<label for="basic-default-phone">pendapatan</label>
						</div>

						<button type="submit" class="btn btn-primary">Simpan</button>
					</form>

				</div>
			</div>
		</div>
		<!-- Merged -->

	</div>
</div>

<script>
	$(document).on('keyup', '.row #berat', function () {

		var berat = parseFloat($(this).val()) || 0;
		var parentRow = $(this).closest('.row'); // Dapatkan elemen .row terdekat
		var input_total = parentRow.find('.total_h'); // Cari 
		var input_harga = parentRow.find('.harga').val() || 0; // Cari 
		console.log(input_harga);
		var total = input_harga * berat;
		input_total.val(total);
		// hitungTotalHarga();

	});
	$(document).on('keyup', '.row #harga', function () {

		var berat = parseFloat($(this).val()) || 0;
		var parentRow = $(this).closest('.row'); // Dapatkan elemen .row terdekat
		var input_total = parentRow.find('.total_h'); // Cari 
		var input_harga = parentRow.find('.berat').val() || 0; // Cari 
		console.log(input_harga);
		var total = input_harga * berat;
		input_total.val(total);
		// hitungTotalHarga();

	});
</script>

<!-- / Content -->

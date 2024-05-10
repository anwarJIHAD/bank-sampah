<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> <a class="text-muted fw-light" href="<?= base_url('C_Saldo') ?>">Penarikan Saldo/</a>
		Edit</h4>
	<!-- Basic Layout -->
	<div class="row">
		<div class="col-xl">
			<div class="card mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="mb-0">Edit Penarikan Saldo</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="tgl" id="" value="<?= $Saldo['id_penarikan']; ?>">
						<input type="hidden" name="id_nasabah" id="" value="<?= $Saldo['id_nasabah']; ?>">
						
						<div class="form-floating form-floating-outline mb-4">
							<input type="datetime-local" class="form-control tanggal" id='tanggal' name="tanggal"
								id="basic-default-company" value="<?= $Saldo['tanggal_penarikan']; ?>"
								placeholder="Masukkan Penarikan saldo" />
							<label for="basic-default-company">Tanggal Penarikan</label>
							<?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" id="nominal" name="nominal" class="form-control phone-mask nominal"
								value="<?= $Saldo['nominal']; ?>" placeholder="masukkan nominal" />
							<label for="basic-default-phone">Nominal Penarikan</label>
							<?= form_error('nominal', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" id="basic-default-phone" name="keterangan"
								class="form-control phone-mask total_h" value="<?= $Saldo['keterangan']; ?>"
								placeholder="Masukkan keterangan" />
							<label for="basic-default-phone">keterangan</label>
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

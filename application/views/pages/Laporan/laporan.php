<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> <a class="text-muted fw-light" href="<?= base_url('C_Nasabah') ?>"></a>
		Laporan</h4>
	<!-- Basic Layout -->
	<div class="row">
		<div class="col-xl">
			<div class="card mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="mb-0">Export Laporan</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-floating form-floating-outline mb-4">
							<select name="jenis_data" id="jenis_data" class="form-control" placeholder="jenis_data">
								<option value="">---pilih jenis data---</option>
								<option value="Transaksi Nasabah" <?= set_select('jenis_data', 'Transaksi Nasabah'); ?>>
									Transaksi Nasabah</option>
								<option value="Transaksi Penjualan" <?= set_select('jenis_data', 'Transaksi Penjualan'); ?>>Transaksi Penjualan</option>
								<option value="Debit Kredit Nasabah" <?= set_select('jenis_data', 'Debit Kredit Nasabah'); ?>>Debit Kredit Nasabah</option>
								<option value="Jurnal Akuntasi" <?= set_select('jenis_data', 'Jurnal Akuntasi'); ?>>
									Jurnal Akuntasi</option>
								<option value="Operasional" <?= set_select('jenis_data', 'Operasional'); ?>>Operasional
								</option>
							</select>
							<label for="jenis_data">Jenis Data</label>
							<?= form_error('jenis_data', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>

						<!-- Dropdown yang akan muncul/hidden -->
						<div class="form-floating form-floating-outline mb-4" id="dropdown_nasabah"
							style="display:none;">
							<select name="nama_nasabah" id="nama_nasabah" class="form-control"
								placeholder="nama_nasabah">
								<option value="">semua</option>
								<?php foreach ($nasabah as $us): ?>
									<!-- Menggunakan set_value() untuk memeriksa dan menandai opsi yang dipilih -->
									<?= set_select('nama_nasabah', $us['id_nasabah'], (set_value('nama_nasabah') == $us['id_nasabah'])); ?>>
									<option value="<?= htmlspecialchars($us['id_nasabah']); ?>">
										<?= htmlspecialchars($us['nama']); ?>
									</option>
								<?php endforeach; ?>
							</select>
							<label for="nama_nasabah">Nasabah</label>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<select name="rentang_waktu" id="rentang_waktu" class="form-control"
								placeholder="rentang_waktu">
								<option value="">---Rentang Waktu---</option>
								<option value="semua" <?= set_select('rentang_waktu', 'semua'); ?>>
									Semua</option>
								<option value="pilih waktu" <?= set_select('rentang_waktu', 'pilih waktu'); ?>>pilih
									waktu</option>
								</option>
							</select>
							<label for="rentang_waktu">Rentang Waktu</label>
							<?= form_error('rentang_waktu', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div id="tanggal" style="display:none;">
							<div class="form-floating form-floating-outline mb-4">
								<input type="date" class="form-control" name="tanggal_mulai" id="basic-default-company"
									value="<?= set_value('tanggal_mulai'); ?>" placeholder="Masukkan tanggal_mulai" />
								<label for="basic-default-company">Tanggal Mulai</label>
							</div>
							<div class="form-floating form-floating-outline mb-4">
								<input type="date" id="basic-default-phone" name="tanggal_selesai"
									class="form-control phone-mask" value="<?= set_value('tanggal_selesai'); ?>"
									placeholder="Masukkan tanggal selesai" />
								<label for="basic-default-phone">Tanggal Selesai</label>
							</div>
						</div>

						<!-- <div class="form-floating form-floating-outline mb-4">
							<select name="format" id="format" class="form-control" placeholder="format">
								<option value="">---Pilih Format---</option>
								<option value="PDF">PDF</option>
								<option value="Excel">Excel</option>
							</select>
							<label for="basic-default-message">format</label>
							<?= form_error('format', '<small class="text-danger pl-3">', '</small>'); ?>
						</div> -->
						<button type="submit" class="btn btn-warning">EXPORT PDF</button>
					</form>
				</div>
			</div>
		</div>
		<!-- Merged -->

	</div>
</div>
<!-- / Content -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
	crossorigin="anonymous"></script>
<script>
	$(document).ready(function () {
		$("#jenis_data").change(function () {
			var selectedValue = $(this).val();
			if (selectedValue === 'Transaksi Nasabah' || selectedValue === 'Debit Kredit Nasabah') {
				$("#dropdown_nasabah").show();
			} else {
				$("#dropdown_nasabah").hide();
			}
		});
		$("#rentang_waktu").change(function () {
			var selectedValue = $(this).val();
			if (selectedValue === 'semua' || selectedValue === '') {
				$("#tanggal").hide();
			} else {
				$("#tanggal").show();
			}
		});
	});
</script>

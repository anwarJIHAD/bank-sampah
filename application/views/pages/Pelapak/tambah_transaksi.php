<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> <a class="text-muted fw-light" href="<?= base_url('C_Penjualan') ?>">Penjualan
			Pelapak/</a><a class="text-muted fw-light"
			href="<?= base_url('C_Penjualan/detail/' . $id_pelapak) ?>">Detail/</a>Tambah Transaksi</h4>
	<!-- Basic Layout -->
	<div class="row">
		<div class="col-xl">
			<div class="card mb-4">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="mb-0">Tambah Penjualan</h5>
				</div>
				<div class="card-body">
					<form action="" method="POST" enctype="multipart/form-data">
						<div class="form-floating form-floating-outline mb-4">
							<input type="hidden" name="id_pelapak" value="<?= $pelapak['id_pelapak'] ?>">
							<input type="text" class="form-control" name="nama" id="basic-default-company"
								value="<?= $pelapak['nama'] ?>" placeholder="Masukkan harga pelapak" readonly />
							<label for="basic-default-company">Nama pelapak</label>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="datetime-local" class="form-control" name="tgl" id="basic-default-fullname"
								value="<?= set_value('tgl'); ?>" placeholder="Masukkan tgl Lengkap" />
							<label for="basic-default-fullname">Tanggal Transaksi</label>
							<?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<div class="form-group row">
								<label for="inputtgl"
									class="col-sm-12 col-form-label text-center basic-default-company">
									Masukkan Jenis Sampah!</label>
							</div>
							<hr>
							<div class='tambah_form'>
								<div class="row col-sm-12 ml-4" style="margin-top:20px; ">
									<div class="form-group row col-sm-1"
										style="background-color:#C4FAF8; padding:10px; margin-left:20px; width: 90%; border-radius: 15px;">

										<label for="inputName" class="col-sm-2 col-form-label"
											style="margin-right:-70px;">Jenis Sampah:</label>
										<div class="col-sm-2">
											<select name="jenis_sampah[]" id="Psearch" class="form-control"
												placeholder="Jenis Jabatan">
												<option value="">--pilih jenis --</option>
												<?php foreach ($sampah as $us): ?>
													<!-- Menggunakan set_value() untuk memeriksa dan menandai opsi yang dipilih -->
													<option value="<?= htmlspecialchars($us['id_sampah']); ?>"
														<?= set_select('jenis_sampah[]', $us['id_sampah'], (set_value('jenis_sampah[]') == $us['id_sampah'])); ?>>
														<?= htmlspecialchars($us['kategori']); ?>
													</option>
												<?php endforeach; ?>
											</select>

											<?= form_error('jenis_sampah[]', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>

										<label for="inputdaerah" class="col-sm-2 col-form-label"
											style="margin-right:-70px;">Berat Sampah</label>
										<div class="col-sm-2">
											<input type="text" class="form-control berat" id="berat" name="berat[]"
												placeholder="berat sampah" value="<?= set_value('berat[]'); ?>">
											<?= form_error('berat[]', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<label for="inputdaerah" class="col-sm-2 col-form-label"
											style="margin-right:-70px;">Harga</label>
										<div class="col-sm-2">
											<input type="text" class="form-control harga" id="harga" name="harga[]"
												placeholder="Harga">
										</div>
										<label for="inputdaerah" class="col-sm col-form-label"
											style="margin-right:-70px;">Total</label>
										<div class="col-sm-2">
											<input type="text" class="form-control total_h" id="total_h"
												name="total_h[]" placeholder="total" readonly>
										</div>
									</div>
									<a onclick="tambah_baris()" class="custom-li btn btn-success">
										<i class="menu-icon tf-icons mdi mdi-plus " style='color:white;'></i>
									</a>
								</div>
							</div>
						</div>
						<div class="form-floating form-floating-outline mb-4">
							<input type="text" id="total_harga" name="total_harga" id="total_harga"
								class="form-control phone-mask" value="<?= set_value('total_harga'); ?>"
								placeholder="Masukkan Nomor Telp" readonly />
							<label for="basic-default-phone">Total pendapatan</label>
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
<script>
	$(document).ready(function () {
		hitungTotalHarga();
	});
	function hitungTotalHarga() {
		var totalHarga = 0;  // inisialisasi total harga sebagai 0

		// Iterasi setiap elemen input dengan kelas 'harga'
		$('.total_h').each(function () {
			var harga = parseFloat($(this).val()) || 0;  // mengambil nilai, konversi ke float, dan gunakan 0 jika tidak valid
			totalHarga += harga;  // tambahkan ke total
		});

		// Tampilkan atau gunakan totalHarga sesuai kebutuhan
		console.log("Total Harga: " + totalHarga);  // Contoh: log ke console
		// Anda juga bisa men-set nilai ini ke suatu elemen di HTML
		$('#total_harga').val(totalHarga.toFixed(2));  // Misalkan Anda memiliki input dengan id 'total_harga'
	}

	// $(document).on('change', '.row #Psearch', function () {

	// 	var search = $(this).val();
	// 	var parentRow = $(this).closest('.row'); // Dapatkan elemen .row terdekat
	// 	var input_harga = parentRow.find('.harga'); // Cari dropdown stasiun di dalam baris tersebut
	// 	var input_total = $('#total_harga').val() || "0";
	// 	$.ajax({
	// 		url: "<?= base_url(); ?>C_Transaksi/harga",
	// 		method: "POST",
	// 		data: {
	// 			id: search
	// 		},
	// 		success: function (data) {
	// 			input_harga.val(data);
	// 			hitungTotalHarga();
	// 			// data = parseFloat(data) || 0;
	// 			// input_total = parseFloat(input_total);
	// 			// let total = input_total + data;
	// 			// $('#total_harga').val(total);

	// 		}
	// 	})
	// });
	$(document).on('keyup', '.row #berat', function () {

		var berat = parseFloat($(this).val()) || 0;
		var parentRow = $(this).closest('.row'); // Dapatkan elemen .row terdekat
		var input_total = parentRow.find('.total_h'); // Cari 
		var input_harga = parentRow.find('.harga').val() || 0; // Cari 
		console.log(input_harga);
		var total = input_harga * berat;
		input_total.val(total);
		hitungTotalHarga();

	});
	$(document).on('keyup', '.row #harga', function () {

		var harga = parseFloat($(this).val()) || 0;
		var parentRow = $(this).closest('.row'); // Dapatkan elemen .row terdekat
		var input_total = parentRow.find('.total_h'); // Cari 
		var input_berat = parentRow.find('.berat').val() || 0; // Cari 
		console.log(input_berat);
		var total = input_berat * harga;
		input_total.val(total);
		hitungTotalHarga();

	});
	function hapus_baris() {
		$(document).on('click', '.action-delete_baris', function () {
			$(this).closest('.row').remove();
			hitungTotalHarga();

		})
	}
	function tambah_baris() {
		let temp_html = `<div class="row col-sm-12 ml-4" style="margin-top:20px; ">
									<div class="form-group row col-sm-1"
										style="background-color:#C4FAF8; padding:10px; margin-left:20px; width: 90%; border-radius: 15px;">

										<label for="inputName" class="col-sm-2 col-form-label"
											style="margin-right:-70px;">Jenis Sampah:</label>
										<div class="col-sm-2">
											<select name="jenis_sampah[]" id="Psearch" class="form-control"
												value="<?= set_value('jenis_sampah[]'); ?>" placeholder="Jenis Jabatan">
												<option value="">--pilih jenis --</option>
												<?php foreach ($sampah as $us): ?>
																			<!-- Gunakan echo untuk nilai atribut dan periksa jika itu harus dipilih -->
																			<option value="<?= htmlspecialchars($us['id_sampah']); ?>">
																				<?= htmlspecialchars($us['kategori']); ?>
																			</option>
												<?php endforeach; ?>

											</select>

											<?= form_error('jenis_sampah[]', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>

										<label for="inputdaerah" class="col-sm-2 col-form-label"
											style="margin-right:-70px;">Berat Sampah</label>
										<div class="col-sm-2">
											<input type="text" class="form-control berat" id="berat" name="berat[]"
												value="<?= set_value('berat[]'); ?>" placeholder="berat sampah">
											<?= form_error('berat[]', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<label for="inputdaerah" class="col-sm-2 col-form-label"
											style="margin-right:-70px;">Harga</label>
										<div class="col-sm-2">
											<input type="text" class="form-control harga" id="harga" name="harga[]"
												value="<?= set_value('harga[]'); ?>" placeholder="Harga">
										</div>
										<label for="inputdaerah" class="col-sm col-form-label"
											style="margin-right:-70px;">Total</label>
										<div class="col-sm-2">
											<input type="text" class="form-control total_h" id="total_h"
												name="total_h[]" value="<?= set_value('total_h[]'); ?>"
												placeholder="total" readonly>
										</div>
									</div>


									<a onclick="hapus_baris()" class="custom-li btn btn-danger">
										<i class="menu-icon tf-icons mdi mdi-minus action-delete_baris" style='color:white;'></i>
									</a>

									<!-- <button><i class="icon-plus-sign-alt"></i>tambah baris</button> -->
								</div>`;
		$('.tambah_form').append(temp_html);

	}



</script>

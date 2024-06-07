<!-- Content -->
<script>
	$(document).ready(function () {
		var debitElement = document.getElementById("totalDebit");
		var kreditElement = document.getElementById("keuntungan1");
		var operasional = document.getElementById("operasional");
		var totaltransaksi = document.getElementById("totaltransaksi");

		// Format angka menjadi rupiah
		debitElement.innerHTML = formatRupiah(debitElement.innerHTML);
		kreditElement.innerHTML = formatRupiah(kreditElement.innerHTML);
		operasional.innerHTML = formatRupiah(operasional.innerHTML);
		totaltransaksi.innerHTML = formatRupiah(totaltransaksi.innerHTML);
	});

	function formatRupiah(angka) {
		var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
			split = number_string.split(','),
			sisa = split[0].length % 3,
			rupiah = split[0].substr(0, sisa),
			ribuan = split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang diinput sudah menjadi angka ribuan
		if (ribuan) {
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
		return 'Rp. ' + rupiah;
	}
</script>
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="py-1 mb-3"><span class="text-muted fw-light"></span>Dashboard</h4>

	<div class="row gy-4">
		<!-- Congratulations card -->

		<!--/ Congratulations card -->

		<!-- Transactions -->
		<div class="col-lg-12">
			<div class="card">

				<div class="card-body">
					<div class="row justify-content-center">
						<div class="col-md-8 text-center">
							<h3 class="fw-light custom-line-height">Selamat Datang di Sistem Informasi Bank Sampah
								<br>Raziq Damai Bersih Kelurahan Lembah Damai
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--/ Transactions -->
		<div class="col-xl-6 col-md-6">
			<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h5 class="card-title m-0 me-2">Total Keuntungan</h5>
				</div>
				<div class="card-body">
					<div class="mb-3 mt-md-3 mb-md-5">
						<div class="d-flex align-items-center text-danger"><?php if ($debit < $kredit) {
							echo ' Minus ' ?>
							<?php } ?>
							<h2 class="mb-0" id="keuntungan1"><?= $debit - $kredit ?>
							</h2>

						</div>
						<small class="mt-1">Dihitung dari jumlah (penjualan pelapak -transaksi nasabah -
							Operasional)</small>
					</div>

					<ul class="p-0 m-0">
						<li class="d-flex mb-4 pb-md-2">
							<div class="avatar flex-shrink-0 me-3">
								<img src="<?= base_url('assets/') ?>assets/img/icons/misc/zipcar.png" alt="zipcar"
									class="rounded" />
							</div>
							<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
								<div class="me-2">
									<h6 class="mb-0">Uang Hasil Penjualan ke pelapak</h6>
									<small>dihitung dari jumlah Penjualan ke pelapak</small>
								</div>
								<div>
									<span class="text-success ms-2 fw-medium">
										<i class="mdi mdi-menu-up mdi-24px"></i>
										<strong id="totalDebit"><?= $debit ?></strong>
									</span>
									<div class="progress bg-label-primary" style="height: 4px">
										<div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</li>
						<li class="d-flex mb-4 pb-md-2">
							<div class="avatar flex-shrink-0 me-3">
								<img src="<?= base_url('assets/') ?>assets/img/icons/misc/bitbank.png" alt="bitbank"
									class="rounded">
							</div>
							<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
								<div class="me-2">
									<h6 class="mb-0">Pengeluaran ke Nasabah</h6>
									<small>dihitung dari jumlah transaksi nasabah</small>
								</div>
								<div>
									<span class="text-danger ms-2 fw-medium">
										<i class="mdi mdi-menu-up mdi-24px"></i>
										<strong id="totaltransaksi"><?= $kredit - $operasional ?></strong>
									</span>
									<div class="progress bg-label-primary" style="height: 4px">
										<div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</li>
						<li class="d-flex mb-md-3">
							<div class="avatar flex-shrink-0 me-3">
								<img src="<?= base_url('assets/') ?>assets/img/icons/misc/aviato.png" alt="aviato"
									class="rounded" />
							</div>
							<div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
								<div class="me-2">
									<h6 class="mb-0">Biaya Operasional</h6>
									<small>Dihitung dari pengeluaran untuk operasional</small>
								</div>
								<div>
									<span class="text-danger ms-2 fw-medium">
										<i class="mdi mdi-menu-up mdi-24px"></i>
										<strong id="operasional"><?= $operasional ?></strong>
									</span>
									<div class="progress bg-label-primary" style="height: 4px">
										<div class="progress-bar bg-primary" style="width: 75%" role="progressbar"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!--/ Total Earnings -->

		<!-- Four Cards -->
		<div class="col-xl-4 col-md-6">
			<div class="row gy-4">
				<div class="col-sm-6">
					<div class="card h-100">

						<div class="card-body mt-mg-1">
							<h6 class="mb-2">Jumlah Nasabah</h6>
							<div class="d-flex flex-wrap align-items-center justify-content-center p-5">
								<h4 class="mb-0 me-2"><?= $nasabah ?></h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card h-100">

						<div class="card-body mt-mg-1">
							<h6 class="mb-2">Jumlah Kategori Sampah</h6>
							<div class="d-flex flex-wrap align-items-center justify-content-center p-5">
								<h4 class="mb-0 me-2"><?= $sampah ?></h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card h-100">

						<div class="card-body mt-mg-1">
							<h6 class="mb-2">Jumlah pelapak</h6>
							<div class="d-flex flex-wrap align-items-center justify-content-center p-5">
								<h4 class="mb-0 me-2"><?= $jumlah_pelapak ?></h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="card h-100">

						<div class="card-body mt-mg-1">
							<h6 class="mb-2">Jumlah Transaksi Nasabah</h6>
							<div class="d-flex flex-wrap align-items-center justify-content-center p-5">
								<h4 class="mb-0 me-2"><?= $transaksi_nasabah ?></h4>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="col-sm-6">
					<div class="card h-100">

						<div class="card-body mt-mg-1">
							<h6 class="mb-2">Jumlah Penjualan ke- Pelapak</h6>
							<div class="d-flex flex-wrap align-items-center justify-content-center p-5">
								<h4 class="mb-0 me-2"><?= $transaksi_pelapak ?></h4>
							</div>
						</div>
					</div>
				</div> -->
				<!-- <div class="col-sm-6">
					<div class="card h-100">
						<div class="card-header pb-0">
							<h4 class="mb-0">2,856</h4>
						</div>
						<div class="card-body">
							<div id="sessionsColumnChart" class="mb-3"></div>
							<h6 class="text-center mb-0">Sessions</h6>
						</div>
					</div>
				</div> -->
				<!--/ Sessions chart -->
			</div>
		</div>
		<!-- Weekly Overview Chart -->
		<div class="col-xl-6 col-md-6">
			<div class="card">
				<div class="card-header">
					<div class="d-flex justify-content-between">
						<h5 class="mb-1">Transaksi Nasabah per Bulan</h5>
						<div class="dropdown">
							<div class="input-group">
								<select style="width:20%;" id="search_transaksinasabah" name="keyword"
									class="form-control" value="<?= set_value('keyword'); ?>">
									<option class='text-center dropdown-toggle' value="">Semua</option>
									<?php foreach ($tahun as $p): ?>
										<option value="<?= $p; ?>">
											<?= $p; ?>
										</option>
									<?php endforeach; ?>>

								</select>
							</div>

						</div>
					</div>
				</div>
				<div class="card-body">
					<div id="weeklyOverviewChart"></div>

				</div>
			</div>
		</div>
		<div class="col-xl-6 col-md-6">
			<div class="card">
				<div class="card-header">
					<div class="d-flex justify-content-between">
						<h5 class="mb-1">Penjualan ke Pelapak per Bulan</h5>
						<div class="dropdown">
							<div class="input-group">
								<select style="width:20%;" id="search_transaksipelapak" name="keyword"
									class="form-control" value="<?= set_value('keyword'); ?>">
									<option class='text-center dropdown-toggle' value="">Semua</option>
									<?php foreach ($tahun as $p): ?>
										<option value="<?= $p; ?>">
											<?= $p; ?>
										</option>
									<?php endforeach; ?>>

								</select>
							</div>

						</div>
					</div>
				</div>
				<div class="card-body">
					<div id="chartPelapak"></div>

				</div>
			</div>
		</div>

		<!--/ Weekly Overview Chart -->


		<!-- Data Tables -->
		<!-- 5 Transaksi Nasabah terakhir -->
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h5 class="card-title m-0 me-2">5 History Transaksi Nasabah Terakhir</h5>

				</div>
				<div class="table-responsive">
					<table class="table">
						<thead class="table-light">
							<tr>
								<th class="text-truncate">No</th>
								<th class="text-truncate">Nama Nasabah</th>
								<th class="text-truncate">Tanggal Transaksi</th>
								<th class="text-truncate">Jenis Sampah</th>
								<th class="text-truncate">Berat</th>
								<th class="text-truncate">Pengeluaran</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							<?php foreach ($top5_nasabah as $us): ?>

								<tr>
									<td class="text-truncate"><?= $no; ?>.</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="avatar avatar-sm me-3">
												<img src="<?= base_url('assets/') ?>assets/img/avatars/1.png" alt="Avatar"
													class="rounded-circle" />
											</div>
											<div>
												<h6 class="mb-0 text-truncate"><?= $us['nama']; ?></h6>
												<small class="text-truncate"><?= $us['no_tlp']; ?></small>
											</div>
										</div>
									</td>
									<td class="text-truncate"><?= $us['tanggal_transaksi']; ?></td>
									<td class="text-truncate"><?= $us['kategori']; ?></td>
									<td class="text-truncate"><?= $us['berat_sampah']; ?></td>
									<td class="text-truncate"><?= $us['pendapatan']; ?></td>

								</tr>
								<?php $no++; ?>
							<?php endforeach; ?>


						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--/ Data Tables -->

		<!-- 5 Transaksi Pelapak terakhir -->
		<!-- <div class="col-12">
			<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h5 class="card-title m-0 me-2">5 History Transaski Ke- Pelapak Terakhir</h5>

				</div>
				<div class="table-responsive">
					<table class="table">
						<thead class="table-light">
							<tr>
								<th class="text-truncate">No</th>
								<th class="text-truncate">Nama Nasabah</th>
								<th class="text-truncate">Tanggal Transaksi</th>
								<th class="text-truncate">Jenis Sampah</th>
								<th class="text-truncate">Berat</th>
								<th class="text-truncate">Pendapatan</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1; ?>
							<?php foreach ($top5_Pelapak as $us): ?>

								<tr>
									<td class="text-truncate"><?= $no; ?>.</td>
									<td>
										<div class="d-flex align-items-center">
											<div class="avatar avatar-sm me-3">
												<img src="<?= base_url('assets/') ?>assets/img/avatars/1.png" alt="Avatar"
													class="rounded-circle" />
											</div>
											<div>
												<h6 class="mb-0 text-truncate"><?= $us['nama']; ?></h6>
												<small class="text-truncate"><?= $us['no_tlp']; ?></small>
											</div>
										</div>
									</td>
									<td class="text-truncate"><?= $us['tanggal_transaksi']; ?></td>
									<td class="text-truncate"><?= $us['kategori']; ?></td>
									<td class="text-truncate"><?= $us['berat_sampah']; ?></td>
									<td class="text-truncate"><span
											class="badge rounded-pill bg-label-primary me-1">RP.<?= $us['pendapatan']; ?></span>
									</td>

								</tr>
								<?php $no++; ?>
							<?php endforeach; ?>

						</tbody>
					</table>
				</div>
			</div>
		</div> -->
		<!--/ Data Tables -->
	</div>
</div>
<!-- / Content -->

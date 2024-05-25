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
							<button class="btn p-0" type="button" id="weeklyOverviewDropdown" data-bs-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="mdi mdi-dots-vertical mdi-24px"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="weeklyOverviewDropdown">
								<a class="dropdown-item" href="javascript:void(0);">Refresh</a>
								<a class="dropdown-item" href="javascript:void(0);">Share</a>
								<a class="dropdown-item" href="javascript:void(0);">Update</a>
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
						<h5 class="mb-1">Penjualan Ke Pelapak per Bulan</h5>
						<div class="dropdown">
							<button class="btn p-0" type="button" id="weeklyOverviewDropdown" data-bs-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="mdi mdi-dots-vertical mdi-24px"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-end" aria-labelledby="weeklyOverviewDropdown">
								<a class="dropdown-item" href="javascript:void(0);">Refresh</a>
								<a class="dropdown-item" href="javascript:void(0);">Share</a>
								<a class="dropdown-item" href="javascript:void(0);">Update</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div id="weeklyOverviewChart"></div>

				</div>
			</div>
		</div>
		<!--/ Weekly Overview Chart -->


		<!-- Data Tables -->
		<div class="col-12">
			<div class="card">
				<div class="card-header d-flex align-items-center justify-content-between">
					<h5 class="card-title m-0 me-2">History Transaksi Terakhir</h5>

				</div>
				<div class="table-responsive">
					<table class="table">
						<thead class="table-light">
							<tr>
								<th class="text-truncate">User</th>
								<th class="text-truncate">Email</th>
								<th class="text-truncate">Role</th>
								<th class="text-truncate">Age</th>
								<th class="text-truncate">Salary</th>
								<th class="text-truncate">Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="avatar avatar-sm me-3">
											<img src="<?= base_url('assets/') ?>assets/img/avatars/1.png" alt="Avatar"
												class="rounded-circle" />
										</div>
										<div>
											<h6 class="mb-0 text-truncate">Jordan Stevenson</h6>
											<small class="text-truncate">@amiccoo</small>
										</div>
									</div>
								</td>
								<td class="text-truncate">susanna.Lind57@gmail.com</td>
								<td class="text-truncate">
									<i class="mdi mdi-laptop mdi-24px text-danger me-1"></i> Admin
								</td>
								<td class="text-truncate">24</td>
								<td class="text-truncate">34500$</td>
								<td><span class="badge bg-label-warning rounded-pill">Pending</span>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="avatar avatar-sm me-3">
											<img src="<?= base_url('assets/') ?>assets/img/avatars/3.png" alt="Avatar"
												class="rounded-circle" />
										</div>
										<div>
											<h6 class="mb-0 text-truncate">Benedetto Rossiter</h6>
											<small class="text-truncate">@brossiter15</small>
										</div>
									</div>
								</td>
								<td class="text-truncate">estelle.Bailey10@gmail.com</td>
								<td class="text-truncate">
									<i class="mdi mdi-pencil-outline text-info mdi-24px me-1"></i>
									Editor
								</td>
								<td class="text-truncate">29</td>
								<td class="text-truncate">64500$</td>
								<td><span class="badge bg-label-success rounded-pill">Active</span>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="avatar avatar-sm me-3">
											<img src="<?= base_url('assets/') ?>assets/img/avatars/2.png" alt="Avatar"
												class="rounded-circle" />
										</div>
										<div>
											<h6 class="mb-0 text-truncate">Bentlee Emblin</h6>
											<small class="text-truncate">@bemblinf</small>
										</div>
									</div>
								</td>
								<td class="text-truncate">milo86@hotmail.com</td>
								<td class="text-truncate">
									<i class="mdi mdi-cog-outline text-warning mdi-24px me-1"></i>
									Author
								</td>
								<td class="text-truncate">44</td>
								<td class="text-truncate">94500$</td>
								<td><span class="badge bg-label-success rounded-pill">Active</span>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="avatar avatar-sm me-3">
											<img src="<?= base_url('assets/') ?>assets/img/avatars/5.png" alt="Avatar"
												class="rounded-circle" />
										</div>
										<div>
											<h6 class="mb-0 text-truncate">Bertha Biner</h6>
											<small class="text-truncate">@bbinerh</small>
										</div>
									</div>
								</td>
								<td class="text-truncate">lonnie35@hotmail.com</td>
								<td class="text-truncate">
									<i class="mdi mdi-pencil-outline text-info mdi-24px me-1"></i>
									Editor
								</td>
								<td class="text-truncate">19</td>
								<td class="text-truncate">4500$</td>
								<td><span class="badge bg-label-warning rounded-pill">Pending</span>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="avatar avatar-sm me-3">
											<img src="<?= base_url('assets/') ?>assets/img/avatars/4.png" alt="Avatar"
												class="rounded-circle" />
										</div>
										<div>
											<h6 class="mb-0 text-truncate">Beverlie Krabbe</h6>
											<small class="text-truncate">@bkrabbe1d</small>
										</div>
									</div>
								</td>
								<td class="text-truncate">ahmad_Collins@yahoo.com</td>
								<td class="text-truncate">
									<i class="mdi mdi-chart-donut mdi-24px text-success me-1"></i>
									Maintainer
								</td>
								<td class="text-truncate">22</td>
								<td class="text-truncate">10500$</td>
								<td><span class="badge bg-label-success rounded-pill">Active</span>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="avatar avatar-sm me-3">
											<img src="<?= base_url('assets/') ?>assets/img/avatars/7.png" alt="Avatar"
												class="rounded-circle" />
										</div>
										<div>
											<h6 class="mb-0 text-truncate">Bradan Rosebotham</h6>
											<small class="text-truncate">@brosebothamz</small>
										</div>
									</div>
								</td>
								<td class="text-truncate">tillman.Gleason68@hotmail.com</td>
								<td class="text-truncate">
									<i class="mdi mdi-pencil-outline text-info mdi-24px me-1"></i>
									Editor
								</td>
								<td class="text-truncate">50</td>
								<td class="text-truncate">99500$</td>
								<td><span class="badge bg-label-warning rounded-pill">Pending</span>
								</td>
							</tr>
							<tr>
								<td>
									<div class="d-flex align-items-center">
										<div class="avatar avatar-sm me-3">
											<img src="<?= base_url('assets/') ?>assets/img/avatars/6.png" alt="Avatar"
												class="rounded-circle" />
										</div>
										<div>
											<h6 class="mb-0 text-truncate">Bree Kilday</h6>
											<small class="text-truncate">@bkildayr</small>
										</div>
									</div>
								</td>
								<td class="text-truncate">otho21@gmail.com</td>
								<td class="text-truncate">
									<i class="mdi mdi-account-outline mdi-24px text-primary me-1"></i>
									Subscriber
								</td>
								<td class="text-truncate">23</td>
								<td class="text-truncate">23500$</td>
								<td><span class="badge bg-label-success rounded-pill">Active</span>
								</td>
							</tr>
							<tr class="border-transparent">
								<td>
									<div class="d-flex align-items-center">
										<div class="avatar avatar-sm me-3">
											<img src="<?= base_url('assets/') ?>assets/img/avatars/1.png" alt="Avatar"
												class="rounded-circle" />
										</div>
										<div>
											<h6 class="mb-0 text-truncate">Breena Gallemore</h6>
											<small class="text-truncate">@bgallemore6</small>
										</div>
									</div>
								</td>
								<td class="text-truncate">florencio.Little@hotmail.com</td>
								<td class="text-truncate">
									<i class="mdi mdi-account-outline mdi-24px text-primary me-1"></i>
									Subscriber
								</td>
								<td class="text-truncate">33</td>
								<td class="text-truncate">20500$</td>
								<td><span class="badge bg-label-secondary rounded-pill">Inactive</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!--/ Data Tables -->
	</div>
</div>
<!-- / Content -->

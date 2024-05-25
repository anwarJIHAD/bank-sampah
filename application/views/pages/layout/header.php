<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
	data-assets-path="<?= base_url('assets/') ?>assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>Bank Sampah</title>

	<meta name="description" content="" />
	<style>
		body {
			padding-top: 20px;
		}

		.custom-line-height {
			line-height: 1.3;
			/* Atur sesuai kebutuhan */
		}
	</style>
	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>assets/img/favicon/favicon.ico" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
		rel="stylesheet" />

	<link rel="stylesheet" href="<?= base_url('assets/') ?>assets/vendor/fonts/materialdesignicons.css" />

	<!-- Menu waves for no-customizer fix -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>assets/vendor/libs/node-waves/node-waves.css" />

	<!-- Core CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>assets/vendor/css/core.css"
		class="template-customizer-core-css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>assets/vendor/css/theme-default.css"
		class="template-customizer-theme-css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>assets/css/demo.css" />

	<!-- Vendors CSS -->
	<link rel="stylesheet"
		href="<?= base_url('assets/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
	<link rel="stylesheet" href="<?= base_url('assets/') ?>assets/vendor/libs/apex-charts/apex-charts.css" />

	<!-- Page CSS -->

	<!-- Helpers -->
	<script src="<?= base_url('assets/') ?>assets/vendor/js/helpers.js"></script>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="<?= base_url('assets/') ?>assets/js/config.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js"
		integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script>
		function edit(id, jenis) {
			let kategori = jenis;
			console.log(kategori);
			let href; // Mendeklarasikan href di luar blok if dan else
			if (jenis == 'nasabah') {
				href = "<?= base_url('C_Nasabah/edit/') ?>" + id; // Mengassign href tanpa let di sini
			} else if (jenis == 'sampah') {
				href = "<?= base_url('C_Sampah/edit/') ?>" + id;
			} else if (jenis == 'pelapak') {
				href = "<?= base_url('C_Penjualan/edit_pelapak/') ?>" + id;
			} else if (jenis == 'Operasional') {
				href = "<?= base_url('C_Operasional/edit/') ?>" + id;
			}
			else if (jenis == 'saldo') {
				href = "<?= base_url('C_Saldo/edit/') ?>" + id;
			} else {
				// Mengassign href tanpa let di sini
			}

			Swal.fire({
				title: "Edit Data",
				text: "Silahkan klik tombol Edit untuk melakukan perubahan data!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#ffc107",
				cancelButtonColor: "#d33",
				confirmButtonText: "Edit",
			}).then((result) => {
				if (result.value) {
					document.location.href = href;
				}
			});
		}
		function hapus(id, jenis) {
			// console.log(jenis);
			let href; // Mendeklarasikan href di luar blok if dan else
			if (jenis == 'nasabah') {
				href = "<?= base_url('C_Nasabah/hapus/') ?>" + id;
			} else if (jenis == 'sampah') {
				href = "<?= base_url('C_Sampah/hapus/') ?>" + id;
			}
			else if (jenis == 'pelapak') {
				href = "<?= base_url('C_Penjualan/hapus_pelapak/') ?>" + id;
			} else if (jenis == 'Operasional') {
				href = "<?= base_url('C_Operasional/hapus/') ?>" + id;
			} else if (jenis == 'saldo') {
				// href = "<?= base_url('C_Nasabah/hapus/') ?>" + id;
			} else {
				href = "<?= base_url('C_Saldo/hapus/') ?>" + id + '/' + jenis;
			}

			Swal.fire({
				title: "Hapus Data?",
				text: "Silahkan klik tombol Edit untuk melakukan perubahan data!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Ya, hapus data!",
			}).then((result) => {
				if (result.value) {
					document.location.href = href;
				}
			});
		}
		function hapus2(tgl, id_nasabah, jenis) {
			// console.log(jenis);
			let href; // Mendeklarasikan href di luar blok if dan else
			if (jenis == 'nasabah') {
				href = "<?= base_url('C_Transaksi/hapus/') ?>" + tgl + "/" + id_nasabah; // Mengassign href tanpa let di sini
			} else if (jenis == 'pelapak') {
				href = "<?= base_url('C_Penjualan/hapus/') ?>" + tgl + "/" + id_nasabah; // Mengassign href tanpa let di sini
			}
			else {

			}


			Swal.fire({
				title: "Hapus Data?",
				text: "Silahkan klik tombol Hapus untuk melakukan penghapusan data!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				confirmButtonText: "Ya, hapus data!",
			}).then((result) => {
				if (result.value) {
					document.location.href = href;
				}
			});
		}
	</script>
	<style>
		.d-flex.flex-column {
			display: flex;
			flex-direction: column;
			align-items: start;
			/* Menjaga agar item-item di dalamnya rata kiri */
		}

		.card-header {
			width: 100%;
			/* Memastikan header memenuhi lebar kontainernya */
		}

		.custom-li {
			width: auto;
			/* Otomatis sesuai konten */
			height: 20px;
			/* Tinggi disesuaikan */
			margin-top: 20px;
			margin-left: 20px;
			/* Margin atas */
			color: white;
			/* Warna teks */
			padding: 0 5px;
			/* Padding kiri dan kanan agar tidak terlalu sempit */
			display: inline-flex;
			/* Gunakan flex agar konten (ikon) di tengah */
			align-items: center;
			/* Align items vertically */
			justify-content: center;
			/* Center content horizontally */
		}
	</style>
</head>

<body>
	<!-- Layout wrapper -->
	<div class="layout-wrapper layout-content-navbar">
		<div class="layout-container">
			<!-- Menu -->

			<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme"
				style="background-color: #fff!important;">
				<div class="app-brand demo">
					<a href="index.html" class="app-brand-link">
						<span class="app-brand-logo demo me-1">
							<span style="color: var(--bs-primary)">
								<svg width="30" height="24" viewBox="0 0 250 196" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M12.3002 1.25469L56.655 28.6432C59.0349 30.1128 60.4839 32.711 60.4839 35.5089V160.63C60.4839 163.468 58.9941 166.097 56.5603 167.553L12.2055 194.107C8.3836 196.395 3.43136 195.15 1.14435 191.327C0.395485 190.075 0 188.643 0 187.184V8.12039C0 3.66447 3.61061 0.0522461 8.06452 0.0522461C9.56056 0.0522461 11.0271 0.468577 12.3002 1.25469Z"
										fill="currentColor" />
									<path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
										d="M0 65.2656L60.4839 99.9629V133.979L0 65.2656Z" fill="black" />
									<path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
										d="M0 65.2656L60.4839 99.0795V119.859L0 65.2656Z" fill="black" />
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M237.71 1.22393L193.355 28.5207C190.97 29.9889 189.516 32.5905 189.516 35.3927V160.631C189.516 163.469 191.006 166.098 193.44 167.555L237.794 194.108C241.616 196.396 246.569 195.151 248.856 191.328C249.605 190.076 250 188.644 250 187.185V8.09597C250 3.64006 246.389 0.027832 241.935 0.027832C240.444 0.027832 238.981 0.441882 237.71 1.22393Z"
										fill="currentColor" />
									<path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
										d="M250 65.2656L189.516 99.8897V135.006L250 65.2656Z" fill="black" />
									<path opacity="0.077704" fill-rule="evenodd" clip-rule="evenodd"
										d="M250 65.2656L189.516 99.0497V120.886L250 65.2656Z" fill="black" />
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
										fill="currentColor" />
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M12.2787 1.18923L125 70.3075V136.87L0 65.2465V8.06814C0 3.61223 3.61061 0 8.06452 0C9.552 0 11.0105 0.411583 12.2787 1.18923Z"
										fill="white" fill-opacity="0.15" />
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
										fill="currentColor" />
									<path fill-rule="evenodd" clip-rule="evenodd"
										d="M237.721 1.18923L125 70.3075V136.87L250 65.2465V8.06814C250 3.61223 246.389 0 241.935 0C240.448 0 238.99 0.411583 237.721 1.18923Z"
										fill="white" fill-opacity="0.3" />
								</svg>
							</span>
						</span>
						<span class="app-brand-text demo menu-text fw-semibold ms-2">Bank Sampah</span>
					</a>

					<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
						<i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
					</a>
				</div>

				<div class="menu-inner-shadow"></div>

				<ul class="menu-inner py-1">
					<!-- Dashboard -->
					<li class="menu-item Open">
						<a href="<?= base_url('C_Dashboard/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-home-outline"></i>
							<div data-i18n="Icons">Dashboard</div>
						</a>
					</li>

					<!-- Nasabah -->
					<li class="menu-item Open">
						<a href="<?= base_url('C_Nasabah/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-account-star"></i>
							<div data-i18n="Icons">Nasabah</div>
						</a>
					</li>

					<!-- Transaksi Nasabah -->
					<li class="menu-item Open">
						<a href="<?= base_url('C_Transaksi/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-currency-usd"></i>
							<div data-i18n="Icons">Transaksi Nasabah</div>
						</a>
					</li>

					<!-- Penjualan Pelapak -->
					<li class="menu-item Open">
						<a href="<?= base_url('pelapak/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-cash-multiple"></i>
							<div data-i18n="Icons">Penjualan Pelapak</div>
						</a>
					</li>

					<!-- Kategori Sampah -->
					<li class="menu-item Open">
						<a href="<?= base_url('C_Sampah/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-delete-variant"></i>
							<div data-i18n="Icons">Kategori Sampah</div>
						</a>
					</li>

					<!-- Operasional -->
					<li class="menu-item Open">
						<a href="<?= base_url('operasional/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-account-key-outline"></i>
							<div data-i18n="Icons">Operasional</div>
						</a>
					</li>

					<!-- Dashboard -->
					<li class="menu-item Open">
						<a href="<?= base_url('C_Saldo/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-cash-plus"></i>
							<div data-i18n="Icons">Penarikan Saldo</div>
						</a>
					</li>


					<!-- Dashboard -->
					<li class="menu-item Open">
						<a href="<?= base_url('C_Akuntasi/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-approximately-equal-box"></i>
							<div data-i18n="Icons">Jurnal Akuntasi</div>
						</a>
					</li>


					<!-- Forms & Tables -->

					<!-- Forms -->
					<!-- <li class="menu-item">
						<a href="javascript:void(0);" class="menu-link menu-toggle">
							<i class="menu-icon tf-icons mdi mdi-form-select"></i>
							<div data-i18n="Form Elements">Form Elements</div>
						</a>
						<ul class="menu-sub">
							<li class="menu-item">
								<a href="forms-basic-inputs.html" class="menu-link">
									<div data-i18n="Basic Inputs">Basic Inputs</div>
								</a>
							</li>
							<li class="menu-item">
								<a href="forms-input-groups.html" class="menu-link">
									<div data-i18n="Input groups">Input groups</div>
								</a>
							</li>
						</ul>
					</li> -->
				</ul>
			</aside>
			<!-- / Menu -->

			<!-- Layout container -->
			<div class="layout-page">
				<!-- Navbar -->

				<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme fixed-top"
					id="layout-navbar" style="background-color:#fff!important; border-radius: 0.375rem;">
					<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
						<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
							<i class="mdi mdi-menu mdi-24px"></i>
						</a>
					</div>

					<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
						<!-- Search -->
						<div class="navbar-nav align-items-center">
							<div class="nav-item d-flex align-items-center">

								<div class="p-2 ml-2">Hallo, <?php echo $this->session->userdata('login_type') ?></div>
							</div>
						</div>
						<!-- /Search -->

						<ul class="navbar-nav flex-row align-items-center ms-auto">
							<!-- Place this tag where you want the button to render. -->
							<!-- User -->
							<li class="nav-item navbar-dropdown dropdown-user dropdown">
								<a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
									data-bs-toggle="dropdown">
									<div class="avatar avatar-online">
										<img src="<?= base_url('assets/') ?>assets/img/avatars/1.png" alt
											class="w-px-40 h-auto rounded-circle p-1" />
									</div>
								</a>
								<ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
									<li>
										<a class="dropdown-item pb-2 mb-1" href="#">
											<div class="d-flex align-items-center">
												<div class="flex-shrink-0 me-2 pe-1">
													<div class="avatar avatar-online">
														<img src="<?= base_url('assets/') ?>assets/img/avatars/1.png"
															alt class="w-px-40 h-auto rounded-circle" />
													</div>
												</div>
												<div class="flex-grow-1">
													<h6 class="mb-0">John Doe</h6>
													<small class="text-muted">Admin</small>
												</div>
											</div>
										</a>
									</li>
									<li>
										<div class="dropdown-divider my-1"></div>
									</li>

									<li>
										<div class="dropdown-divider my-1"></div>
									</li>
									<li>
										<a class="dropdown-item" href="<?= base_url('Auth/logout') ?>">
											<i class="mdi mdi-power me-1 mdi-20px"></i>
											<span class="align-middle">Log Out</span>
										</a>
									</li>
								</ul>
							</li>
							<!--/ User -->
						</ul>
					</div>
				</nav>

				<!-- / Navbar -->

				<!-- Content wrapper -->
				<div class="content-wrapper">

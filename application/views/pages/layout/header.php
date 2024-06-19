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
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>assets/img/favicon/logo1.ico" />


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
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
		rel="stylesheet">

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

		.navbar {
			width: 100%;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			z-index: 1030;
			/* Ensure the navbar is above other content */
			background-color: #fff !important;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		.navbar-nav .nav-link {
			padding: 0.5rem 1rem;
		}

		.avatar-online img {
			border: 2px solid #4caf50;
		}

		/* Ensuring full width */
		.navbar-container {
			width: 100%;
			padding: 0 15px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}

		.layout-navbar {
			background-color: #4AC7D5 !important;

		}

		.app-brand {
			background-color: #4AC7D5 !important;
		}

		.menu-inner {
			background-color: #CAD3DB !important;
		}

		.datang {
			background-color: transparent !important;
			font-family: 'Montserrat', sans-serif;
			font-weight: 700;
			/* Bold */
			text-stroke: 2px #000000;
			/* Stroke width and color */
			text-shadow: 2px 2px 4px #000000;
			/* Shadow offset, blur radius, and color */
		}

		.datang::before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			background-image: url('<?= base_url('assets/') ?>assets/img/ttd/background-dashboard.jpeg') !important;
			background-color: rgba(0, 0, 0, 0.5) !important;
			/* Ganti dengan path gambar Anda */
			background-size: cover;
			background-position: center;
			# opacity: 0.3;
			/* Set opacity ke 30% */
			z-index: -1;
			/* Pastikan gambar berada di belakang konten */
		}
		.logo {
		object-fit: cover;
		mix-blend-mode: darken;
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
					<a href="#" class="app-brand-link">
						<div class="logo">
							<img src="<?= base_url('assets/') ?>assets/img/ttd/logo1.jpeg" alt="" width="80">
						</div>
						<span class="app-brand-text demo menu-text fw-semibold ms-2 text-black">Raziq Damai</span>
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
						<a href="<?= base_url('C_DebitKredit/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-chart-scatter-plot-hexbin"></i>
							<div data-i18n="Icons">Debit Kredit Nasabah</div>
						</a>
					</li>

					<!-- Dashboard -->
					<li class="menu-item Open">
						<a href="<?= base_url('C_Akuntasi/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-approximately-equal-box"></i>
							<div data-i18n="Icons">Jurnal Akuntasi</div>
						</a>
					</li>

					<li class="menu-item Open">
						<a href="<?= base_url('C_Laporan/') ?>" class="menu-link">
							<i class="menu-icon tf-icons mdi mdi-vector-curve"></i>
							<div data-i18n="Icons">Export Laporan</div>
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

				<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
					id="layout-navbar">
					<div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
						<a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
							<i class="mdi mdi-menu mdi-24px"></i>
						</a>
					</div>

					<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
						<ul class="navbar-nav flex-row align-items-center ms-auto">
							<div class="navbar-nav align-items-end">
								<div class="nav-item d-flex align-items-end">
									<div class="p-1 ml-2 text-white">Hallo, <?php echo $this->session->userdata('login_type') ?>
									</div>
								</div>
							</div>
							<!-- Place this tag where you want the button to render. -->
							<!-- User -->
							<li class="nav-item navbar-dropdown dropdown-user dropdown p-4">
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
				<div class="content-wrapper" style="margin-top: 80px;">

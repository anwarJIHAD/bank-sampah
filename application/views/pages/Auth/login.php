<!DOCTYPE html>


<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default"
	data-assets-path="<?= base_url('assets/') ?>assets/" data-template="vertical-menu-template-free">

<head>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

	<title>LOGIN - Bank Sampah</title>


	<meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
	<meta name="keywords"
		content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
	<!-- Canonical SEO -->
	<!-- <link rel="canonical" href="https://themeselection.com/item/materio-bootstrap-html-admin-template/"> -->



	<!-- Favicon -->
	<link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>assets/img/favicon/logo1.ico" />

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
		rel="stylesheet">


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


	<!-- Page CSS -->
	<!-- Page -->
	<link rel="stylesheet" href="<?= base_url('assets/') ?>assets/vendor/css/pages/page-auth.css">

	<!-- Helpers -->
	<script src="<?= base_url('assets/') ?>assets/vendor/js/helpers.js"></script>
	<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
	<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
	<script src="<?= base_url('assets/') ?>assets/js/config.js"></script>

</head>
<style>
	/* Flexbox container */
	.flex-container {
		display: flex;
		height: 100vh;
	}

	/* Sidebar section */
	.flex-sidebar {
		flex: 3;
		display: flex;
		align-items: center;
		justify-content: center;
		background-color: #4AC7D5;
		/* Optional: Background color for the sidebar */
	}

	/* Login section */
	.flex-login {
		flex: 3;
		display: flex;
		align-items: center;
		justify-content: center;
		background-color: #4AC7D5;
		/* Optional: Background color for the login section */
	}

	/* .flex-container::before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background-image: url('<?= base_url('assets/') ?>assets/img/ttd/background2.jpeg');
		/* Ganti dengan path gambar Anda */
		background-size: cover;
		background-position: center;#
		opacity: 0.9;
		/* Set opacity ke 30% */
		z-index: -1;
		/* Pastikan gambar berada di belakang konten */
	} */

	/* Centering the login card */
	.authentication-inner {
		width: 100%;
		max-width: 400px;

	}

	.authentication-outer {
		
		width: 100%;
		max-width: 400px;
		color: #fff;
		/* height: 50px; */
	}

	.logo {
		object-fit: cover;
		mix-blend-mode: darken;
	}

	.putih {
		color: #fff;
	}
</style>

<body>



	<!-- Content -->

	<div class="flex-container">
		<div class="flex-sidebar">
			<!-- Content for the sidebar (if any) -->
			<div class="authentication-outer container-p-y">
				<!-- <div class="logo">
					<img src="<?= base_url('assets/') ?>assets/img/ttd/logo1.jpeg" alt="" width="300">
				</div> -->
				<h3 class="putih">Bank Sampah</h3>
				<h1 class="putih">Raziq Damai Bersih</h1>
				<h3 class="putih">Kelurahan Lembah Damai</h3>
			</div>
		</div>
		<div class="flex-login">
			<div class="authentication-wrapper authentication-basic container-p-y">
				<div class="authentication-inner py-4">
					<!-- Login -->
					<div class="card p-5">
						<!-- Logo -->
						<div class="app-brand justify-content-center">
							<a href="#" class="app-brand-link gap-2">
								<span class="app-brand-logo demo">
									<img src="<?= base_url('assets/') ?>assets/img/ttd/logo1.jpeg" alt="" width="100">
								</span>
							</a>
						</div>
						<div class="app-brand justify-content-center">
							<h4 class="mb-2">LOGIN</h4>
						</div>
						<!-- /Logo -->
						<div class="card-body">
							<!-- <p class="mb-4">SILAHKAN LOGIN</p> -->
							<?= $this->session->flashdata('message'); ?>
							<form action="<?= base_url('auth') ?>" class="mb-3" method="post">
								<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
								<div class="form-floating form-floating-outline mb-3">
									<input type="text" class="form-control" id="username" name="username"
										placeholder="Enter your username" autofocus>
									<label for="username">Username</label>
								</div>
								<?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
								<div class="mb-3">
									<div class="form-password-toggle">
										<div class="input-group input-group-merge">
											<div class="form-floating form-floating-outline">
												<input type="password" id="password" class="form-control"
													name="password"
													placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
													aria-describedby="password" />
												<label for="password">Password</label>
											</div>
											<span class="input-group-text cursor-pointer"><i
													class="mdi mdi-eye-off-outline"></i></span>
										</div>
									</div>
								</div>
								<div class="mb-3">
									<button class="btn d-grid w-100" style="background-color:#4AC7D5; color:#fff;"
										type="submit">Masuk</button>
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- / Content -->





	<!-- Core JS -->
	<!-- build:js assets/vendor/js/core.js -->
	<script src="<?= base_url('assets/') ?>assets/vendor/libs/jquery/jquery.js"></script>
	<script src="<?= base_url('assets/') ?>assets/vendor/libs/popper/popper.js"></script>
	<script src="<?= base_url('assets/') ?>assets/vendor/js/bootstrap.js"></script>
	<script src="<?= base_url('assets/') ?>assets/vendor/libs/node-waves/node-waves.js"></script>
	<script src="<?= base_url('assets/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
	<script src="<?= base_url('assets/') ?>assets/vendor/js/menu.js"></script>

	<!-- endbuild -->

	<!-- Vendors JS -->



	<!-- Main JS -->
	<script src="<?= base_url('assets/') ?>assets/js/main.js"></script>


	<!-- Page JS -->



	<!-- Place this tag in your head or just before your close body tag. -->
	<script async defer src="https://buttons.github.io/buttons.js"></script>

</body>

</html>

<!-- beautify ignore:end -->

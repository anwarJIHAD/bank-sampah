<!DOCTYPE html>

<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('base_url')) {
	function base_url()
	{
		return 	'http://' . @$_SERVER['SERVER_NAME'] . ':' . @$_SERVER['SERVER_PORT'] . (@$_SERVER['SERVER_NAME'] == 'localhost' ? preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])) : '') . '/';
	}
}

?>

<html lang="en">

<!-- begin::Head -->

<head>
	<meta charset="utf-8" />
	<title>404</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
			},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Web font -->

	<!--begin::Base Styles -->
	<link href="<?= base_url() ?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?= base_url() ?>assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="<?= base_url() ?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

	<!--RTL version:<link href="<?= base_url() ?>assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

	<!--end::Base Styles -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/app/media/img/logos/favicon.png" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

	<!-- begin:: Page -->
	<div class="m-grid m-grid--hor m-grid--root m-page">
		<div class="m-grid__item m-grid__item--fluid m-grid m-error-4">
			<div class="row">
				<div class="col-md-4">
					<div class="m-error_container">
						<h1 class="m-error_number">
							404
						</h1>
						<p class="m-error_title">
							ERROR
						</p>
						<p class="m-error_description">
							Nothing left to do here.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- end:: Page -->

	<!--begin::Base Scripts -->
	<script src="<?= base_url() ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="<?= base_url() ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

	<!--end::Base Scripts -->
</body>

<!-- end::Body -->

</html>
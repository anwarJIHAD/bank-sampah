<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
	<div class="container-xxl">
		<div class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
			<div class="text-body mb-2 mb-md-0">
				©
				<script>
					document.write(new Date().getFullYear());
				</script>
				, made with <span class="text-danger"><i class="tf-icons mdi mdi-heart"></i></span>
				by
				<a href="https://themeselection.com" target="_blank" class="footer-link fw-medium">ThemeSelection</a>
			</div>

		</div>
	</div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->



<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= base_url('assets/') ?>assets/vendor/libs/jquery/jquery.js"></script>
<script src="<?= base_url('assets/') ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?= base_url('assets/') ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?= base_url('assets/') ?>assets/vendor/libs/node-waves/node-waves.js"></script>
<script src="<?= base_url('assets/') ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url('assets/') ?>assets/vendor/js/menu.js"></script>
<script>
	function getBadgeTexts() {
		console.log("getBadgeTexts called"); // Log untuk debugging
		$('#resultMain td .badge').each(function () {
			var text = $(this).text().replace('RP.', '').replace("'", ''); // Menghapus "RP." dan "'" dari teks
			console.log("Original text:", text); // Log untuk debugging
			var number = parseFloat(text.replace(/,/g, '')); // Menghapus koma dan mengubah teks menjadi angka

			if (!isNaN(number)) { // Pastikan number adalah angka
				const rupiah = new Intl.NumberFormat("id-ID", {
					style: "currency",
					currency: "IDR",
					maximumFractionDigits: 0,
				}).format(number);

				console.log("Formatted text:", rupiah); // Log untuk debugging
				$(this).text(rupiah); // Memasukkan kembali hasil format Rupiah ke dalam elemen <span>
			} else {
				console.log("Not a number:", text); // Log untuk debugging
			}
		});
	}
	function getBadgeTexts2() {
		console.log("getBadgeTexts2 called"); // Log untuk debugging
		$('#resultMain td p').each(function () {
			var text = $(this).text().replace('RP.', '').replace("'", ''); // Menghapus "RP." dan "'" dari teks
			console.log("Original text:", text); // Log untuk debugging
			var number = parseFloat(text.replace(/,/g, '')); // Menghapus koma dan mengubah teks menjadi angka
			
			if (!isNaN(number)) { // Pastikan number adalah angka
				const rupiah = new Intl.NumberFormat("id-ID", {
					style: "currency",
					currency: "IDR",
					maximumFractionDigits: 0,
				}).format(number);

				console.log("Formatted text:", rupiah); // Log untuk debugging
				$(this).text(rupiah); // Memasukkan kembali hasil format Rupiah ke dalam elemen <span>
			} else {
				console.log("Not a number:", text); // Log untuk debugging
			}
		});
	}
</script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="<?= base_url('assets/') ?>assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="<?= base_url('assets/') ?>assets/js/main.js"></script>

<!-- Page JS -->
<script src="<?= base_url('assets/') ?>assets/js/dashboards-analytics.js"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>

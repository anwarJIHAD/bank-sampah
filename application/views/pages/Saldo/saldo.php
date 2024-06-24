<!-- Bootstrap Table with Header - Light -->
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="py-1 mb-3"><span class="text-muted fw-light"></span> Penarikan Saldo</h4>
	<div class="card">
		<div class="row">

		</div>
		<div class="d-flex align-items-center justify-content-between">
			<h5 class="card-header">Halaman Penarikan Saldo</h5>
			<div class="card-header d-flex flex-row justify-content-end gap-3">
				<div class="input-group " style="width:100px"><input type="text" class="form-control" name="keyword"
						id="posSearch" placeholder="search..">
				</div>

				<!-- <a href="<?= base_url('C_Saldo/tambah') ?>" class="btn btn-primary">
					<i class="menu-icon tf-icons mdi mdi-plus"></i>
					<div style="font-size:10px;">Tambah Penarikan</div>
				</a> -->

			</div>

		</div>

		<div class="table-responsive text-nowrap">
			<?= $this->session->flashdata('message'); ?>

			<table class="table">
				<thead class="table-light">
					<tr>
						<th>No</th>
						<th>Nama Nasabah</th>
						<th>jumlah penarikan</th>
						<th>Sisa saldo</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0 text-left" id="resultMain">

			</table>
		</div>
	</div>
</div>
<!-- Bootstrap Table with Header - Light -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
	crossorigin="anonymous"></script>
<script>
	$(document).ready(function () {
		load_data();
		function load_data(query) {
			$.ajax({
				url: "<?= base_url(); ?>C_Saldo/fetch",
				method: "POST",
				data: {
					query: query
				},
				success: function (data) {
					$('#resultMain').html(data);
					getBadgeTexts();
				}
			})
		}

		$('#posSearch').on("keyup", function () {
			$('#Psearch').val('');
			var search = $(this).val();
			if (search != '') {
				load_data(search);
			} else {
				load_data();
			}
		});
		$("#Psearch").change(function () {
			$('#posSearch').val('');
			var search = $(this).val();

			if (search != '') {
				load_data(search);
				console.log(search)
			} else {
				load_data();
			}
		});

	});
</script>

<!-- Bootstrap Table with Header - Light -->
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="fw-bold py-3 mb-4"> <a class="text-muted fw-light" href="<?= base_url('C_Transaksi') ?>">Transaksi/</a>
		Detail</h4>
	<div class="card">
		<div class="row">

		</div>
		<h5 class="card-header">Halaman Detail Transaksi Nasabah <h6 style="margin-left:20px;">Nama Nasabah :
				<?= $nasabah['nama'] ?>
			</h6>
		</h5>
		<div class="d-flex align-items-center justify-content-between">

			<div class="card-header d-flex flex-row justify-content-end gap-3">
				<div class="input-group " style="width:100px"><input type="text" class="form-control" name="keyword"
						id="posSearch" placeholder="search..">
				</div>

				<a href="<?= base_url('C_Transaksi/tambah/' . $id_nasabah) ?>" class="btn btn-primary">
					<i class="menu-icon tf-icons mdi mdi-plus"></i>
					<div style="font-size:10px;">Tambah Transaksi</div>
				</a>

			</div>

		</div>

		<div class="table-responsive text-nowrap">
			<?= $this->session->flashdata('message'); ?>

			<table class="table">
				<thead class="table-light">
					<tr>
						<th>No</th>
						<th>Tanggal Transaksi</th>
						<th>Jumlah Jenis Sampah</th>
						<th>Total Berat Sampah(kg)</th>
						<th>Total Pendapatan</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0 text-left" id="resultMain">

				</tbody>
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
				url: "<?= base_url(); ?>C_Transaksi/fetch_detail/" + <?= $id_nasabah ?>,
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

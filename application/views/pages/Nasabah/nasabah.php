<!-- Bootstrap Table with Header - Light -->
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="py-1 mb-3"><span class="text-muted fw-light"></span> Nasabah</h4>
	<div class="card">
		<div class="row">

		</div>
		<div class="d-flex align-items-center justify-content-between">
			<h5 class="card-header">Halaman Nasabah</h5>
			<div class="card-header d-flex flex-row justify-content-end gap-3">
				<div class="input-group " style="width:100px"><input type="text" class="form-control" name="keyword"
						id="posSearch" placeholder="search..">
				</div>

				<a href="<?= base_url('C_Nasabah/tambah') ?>" class="btn btn-primary">
					<i class="menu-icon tf-icons mdi mdi-plus"></i>
					<div style="font-size:10px;">Tambah Nasabah</div>
				</a>

			</div>

		</div>

		<div class="table-responsive text-nowrap">
			<?= $this->session->flashdata('message'); ?>

			<table class="table">
				<thead class="table-light">
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Nomor Telpon</th>
						<th>Saldo (RP)</th>
						<th class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody class="table-border-bottom-0 text-left" id="resultMain">
					<?php $i = 1; ?>
					<!-- <?php foreach ($Nasabah as $us): ?>
						<tr>
							<td class="small">
								<?= $i ?>
							</td>
							<td><?= $us['nama']; ?></td>
							<td><?= $us['alamat']; ?></td>
							<td><?= $us['no_tlp']; ?></td>
							<td><span class="badge rounded-pill bg-label-primary me-1">RP.<?= $us['saldo']; ?></span></td>
							<td class="text-center">
								<button style="padding: 0; border: none; background: none;"><a
										onclick="edit(<?php echo $us['id_nasabah']; ?>,'nasabah')"
										class="btn btn-sm btn-outline-warning text"
										style="color:#ffc107; font-size:10px;">Non
										Edit</a></button>
								<button style="padding: 0; border: none; background: none;"><a
										onclick="hapus(<?php echo $us['id_nasabah']; ?>,'nasabah')"
										class="btn btn-sm btn-outline-danger text-danger"
										style=" font-size:10px;">hapus</a></button>



							</td>

						</tr>

					</tbody>
					<?php $i++; ?>
				<?php endforeach; ?> -->
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
				url: "<?= base_url(); ?>C_Nasabah/fetch",
				method: "POST",
				data: {
					query: query
				},
				success: function (data) {
					$('#resultMain').html(data);
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

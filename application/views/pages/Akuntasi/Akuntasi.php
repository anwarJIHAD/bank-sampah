<!-- Bootstrap Table with Header - Light -->
<div class="container-xxl flex-grow-1 container-p-y">
	<h4 class="py-1 mb-3"><span class="text-muted fw-light"></span> Jurnal Akuntasi</h4>
	<div class="card">
		<div class="row">

		</div>

		<h5 class="card-header">Halaman Jurnal Akuntasi
			<h6 style="margin-left:20px;">Total Pemasukan (Debit) :
				<span id="totalDebit"><?= $debit ?></span>
			</h6>
			<h6 style="margin-left:20px;">Total Pengeluaran (Kredit):
				<span id="totalKredit"><?= $kredit ?></span>
			</h6>
		</h5>
		<div class="d-flex align-items-center justify-content-between">

			<div class="card-header d-flex flex-row justify-content-end gap-3">
				<div class="input-group " style="width:100px"><input type="text" class="form-control" name="keyword"
						id="posSearch" placeholder="search..">
				</div>
			</div>

		</div>


		<div class="table-responsive text-nowrap">
			<?= $this->session->flashdata('message'); ?>

			<table class="table">
				<thead class="table-light">
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Keterangan</th>
						<th>Debit</th>
						<th>Kredit</th>
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
		var debitElement = document.getElementById("totalDebit");
		var kreditElement = document.getElementById("totalKredit");

		// Format angka menjadi rupiah
		debitElement.innerHTML = formatRupiah(debitElement.innerHTML);
		kreditElement.innerHTML = formatRupiah(kreditElement.innerHTML);
		function load_data(query) {
			$.ajax({
				url: "<?= base_url(); ?>C_Akuntasi/fetch",
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
		return 'Rp' + rupiah;
	}
</script>

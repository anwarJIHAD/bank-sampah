<?php
function formatRupiah($angka)
{
	return '' . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<script>
		$(document).ready(function () {
			var total = document.getElementById("total");

			// Format angka menjadi rupiah
			total.innerHTML = formatRupiah(total.innerHTML);

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
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 20px;
		}

		header,
		footer {
			text-align: center;
			padding: 10px 0;
		}

		header {
			border-bottom: 2px solid #000;
			display: flex;
			align-items: center;
			justify-content: center;
			gap: 20px;
			/* Menambahkan jarak antara gambar dan teks */
		}

		footer {
			border-top: 2px solid #000;
			position: fixed;
			bottom: 0px;
			width: 100%;
		}

		h1,
		h2,
		h3 {
			margin: 0;
			padding: 5px 0;
		}

		.content {
			margin: 10px 0 500px 0;
		}

		table {
			width: 100%;
			border-collapse: collapse;
			margin-bottom: 20px;
		}

		table,
		th,
		td {
			border: 1px solid #000;
		}

		th,
		td {
			padding: 10px;
			text-align: left;
		}

		.footer-text {
			font-size: 0.8em;
			color: #777;
		}

		.logo {
			width: 80px;
			height: auto;
		}

		.signature-container {
			text-align: right;
			margin-top: 40px;
		}

		.signature {
			display: inline-block;
			text-align: center;
			margin-top: 10px;
		}

		.signature img {
			width: 100px;
			height: auto;
			margin-left: 600px;
			margin-right: 0;
		}

		.right-align {
			text-align: right;
		}
	</style>
</head>

<body>
	<header class="header-container">
		<div class="grid-item item1">
			<img src="<?= base_url('assets/') ?>assets/img/ttd/logo.jpeg" alt="Logo" class="logo">
		</div>
		<div class="grid-item item2">
			<div class="header-text">
				<h1>Bank Sampah Raziq Damai Bersih</h1>
				<p>Jalan Umban Sari No 1, Kota Pekanbaru, Riau</p>
			</div>
		</div>
	</header>

	<div class="content">
		<h2>Laporan <?php echo $priode ?></h2>
		<p>Periode: <?php echo $priode ?></p>
		<h3>Data Jurnal Akuntasi</h3>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Keterangan</th>
					<th>Harga</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php $total = 0; ?>
				<?php foreach ($transaksi as $us): ?>
					<tr>
						<td><?= $no; ?></td>
						<td><?= $us['tanggal_pengeluaran']; ?></td>
						<td><?= $us['keterangan']; ?></td>
						<td class="right-align">Rp.<?= formatRupiah($us['harga']); ?></td>
						<?php $total += $us['harga']; ?>

					</tr>
					<?php $no++; ?>
				<?php endforeach; ?>
				<tr>
					<td colspan="3" style="text-align: center;  font-weight: bold;">TOTAL</td>
					<td>Rp.<?php echo formatRupiah($total) ?></td>

				</tr>
			</tbody>
		</table>

		<div class="signature-container">
			<p>Atas Nama</p>

			<img src="<?= base_url('assets/') ?>assets/img/ttd/ttd_pimpinan1.jpeg" alt="Tanda Tangan" style="width:70px;">
			<p>Azniwati</p>

		</div>
	</div>

	<footer>
		<p class="footer-text">Laporan ini dihasilkan oleh sistem pada <?= date('d-m-Y'); ?></p>
	</footer>
</body>

</html>

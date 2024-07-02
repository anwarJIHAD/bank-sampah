<?php
function formatRupiah($angka)
{
    return '' . number_format($angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
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
		<?php if ($nama_nasabah != '') { ?>
			<p>Nama Nasabah: <?php echo $nama_nasabah['nama'] ?></p>
		<?php } ?>

		<h3>Data Transaksi</h3>
		<table>
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal Transaksi</th>
					<th>Nama Nasabah</th>
					<th>Jenis Sampah</th>
					<th>Berat Sampah</th>
					<th>Harga/kg</th>
					<th>Pendapatan</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; ?>
				<?php foreach ($transaksi as $us): ?>
					<tr>
						<td><?= $no; ?></td>
						<td><?= $us['tanggal_transaksi']; ?></td>
						<td><?= $us['nama']; ?></td>
						<td><?= $us['kategori']; ?></td>
						<td><?= $us['berat_sampah']; ?></td>
						<td>Rp.<?= formatRupiah($us['harga/kg']); ?></td>
						<td class="right-align">Rp.<?= formatRupiah($us['pendapatan']); ?></td>
					</tr>
					<?php $no++; ?>
				<?php endforeach; ?>
				<tr>
					<td colspan="6" style="text-align: center;  font-weight: bold;">TOTAL TRANSAKSI</td>
					<td class="right-align">Rp.<?= formatRupiah($total_trans) ?></td>
				</tr>
			</tbody>
		</table>

		<div class="signature-container">
			<p>Atas Nama</p>

			<img src="<?= base_url('assets/') ?>assets/img/ttd/ttd2.jpg" alt="Tanda Tangan" style="width:70px;">
			<p>Prof. Dr Sarah Azizah, S.Tr. Kom</p>

		</div>
	</div>

	<footer>
		<p class="footer-text">Laporan ini dihasilkan oleh sistem pada <?= date('d-m-Y'); ?></p>
	</footer>
</body>

</html>

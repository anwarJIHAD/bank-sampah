<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Halaman Berkas</h1>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">

						<div class="card-body">
							<?= $this->session->flashdata('message'); ?>
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>no</th>
										<th>NIP</th>
										<th>Nama Pegawai</th>
										<th>Jumlah Berkas</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1; ?>
									<?php foreach ($user1 as $us): ?>
										<tr>
											<td>
												<?= $i ?>
											</td>
											<td>
												<?= $us['NIP']; ?>
											</td>
											<td>
												<?= $us['nama']; ?>
											</td>
											<td>
												<?= $us['jumlah_berkas']; ?>
											</td>
											<td>
												<a href="<?= base_url('Admin/Admin/detail_berkas/') . $us['NIP']; ?>"
													class="badge badge-primary">Detail</a>
											</td>
										</tr>
										<?php $i++; ?>
									<?php endforeach; ?>
									</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
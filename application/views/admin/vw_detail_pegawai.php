<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Profile</h1>
				</div>
				<div class="col-sm-6">

				</div>
			</div>
		</div><!-- /.container-fluid -->
		<?= $this->session->flashdata('message'); ?>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">

					<!-- Profile Image -->
					<div class="card card-primary card-outline">
						<div class="card-body box-profile">
							<div class="text-center">
								<img class="profile-user-img img-fluid img-circle"
									src="<?= base_url('assets/img/pegawai/') . $user1['gambar']; ?>"
									alt="User profile picture">
							</div>

							<h3 class="profile-username text-center">
								<?= $user1['nama']; ?>
							</h3>

							<p class="text-muted text-center">
								<?= $user1['jabatan']; ?>
							</p>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->


					<!-- About Me Box -->
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">About Me</h3>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<strong><i class="fas fa-book mr-1"></i> Pendidikan Terakhir</strong>

							<p class="text-muted">
								<?= $user1['pendidikan_terakhir']; ?>
							</p>

							<hr>
							<strong><i class="fas fa-chalkboard-teacher mr-1"></i> Jenis Jabatan</strong>

							<p class="text-muted">
								<?= $user1['jenis_jabatan']; ?>
							</p>

							<hr>
							<strong><i class="fas fa-chalkboard-teacher mr-1"></i> Jabatan</strong>

							<p class="text-muted">
								<?= $user1['jabatan']; ?>
							</p>

							<hr>


						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.card -->
				<!-- /.col -->

				<div class="col-md-9">
					<div class="card">
						<div class="card-header p-2">
							<ul class="nav nav-pills">
								<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data
										Diri</a></li>
								<!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Berkas</a>
								</li> -->

							</ul>
						</div><!-- /.card-header -->
						<div class="card-body">
							<div class="tab-content">
								<div class="active tab-pane" id="activity">
									<!-- Post -->
									<div class="card-body">
										<strong><i class="far fa-address-card mr-1"></i> NIP</strong>

										<p class="text-muted">
											<?= $user1['NIP']; ?>
										</p>

										<hr>

										<strong><i class="far fa-address-book mr-1"></i> Status Pegawai</strong>

										<p class="text-muted">
											<?= $user1['role']; ?>
										</p>

										<hr>

										<strong><i class="fas fa-user-tie mr-1"></i> Pangkat/Golongan</strong>

										<p class="text-muted">
											<?= $user1['pangkat']; ?>
										</p>

										<hr>

										<strong><i class="far fa-building mr-1"></i> NO HP</strong>

										<p class="text-muted">
											<?= $user1['no_hp']; ?>
										</p>

										<hr>
										<strong><i class="far fa-building mr-1"></i>Email</strong>

										<p class="text-muted">
											<?= $user1['email']; ?>
										</p>

										<hr>

										<strong><i class="fas fa-bullhorn mr-1"></i> masa kerja</strong>
										<input type="hidden" id="bb" value="<?= $user1['masa_kerja']; ?>">
										<div class="masa_kerja">

										</div>
										<p class="text-muted" hid></p>

										<hr>

										<strong><i class="far fa-calendar-alt mr-1"></i> Terakhir KGB</strong>

										<p class="text-muted">
											<?= $user1['tgl_akhir']; ?>
										</p>

										<hr>
										<a href="<?= base_url('Admin/Admin/') ?>"
											class="btn btn-secondary float-right">Kembali</a>





									</div>
									<!-- /.post -->
								</div>
								<!-- /.tab-pane -->
								<div class="tab-pane" id="timeline">
									<!-- The timeline -->

									<div class="card">
										<!-- /.card-header -->
										<div class="card-header">

										</div>
										<div class="card-body">
											<table id="example2" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>NO</th>
														<th>Keterangan</th>
														<th>file</th>
													</tr>
												</thead>
												<tbody>
													<?php $i = 1; ?>
													<?php foreach ($pangkat as $us): ?>
														<tr>
															<td>
																<?= $i; ?>.
															</td>
															<td>
																<?= $us['keterangan']; ?>
															</td>
															<td>
																<a
																	href="<?php echo base_url() . 'assets/img/pegawai/' . $us['file']; ?>"><i
																		class="fa fa-download" aria-hidden="true"></i></a>
															</td>

														</tr>
														<?php $i++; ?>
													<?php endforeach; ?>
													</tfoot>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
									<!-- /.card -->
								</div>
								<!-- /.tab-pane -->



								<!-- /.tab-pane -->
							</div>
							<!-- /.tab-content -->
						</div><!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
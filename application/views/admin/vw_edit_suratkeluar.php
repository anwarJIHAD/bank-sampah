<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800">
                        <?php echo $judul; ?>
                    </h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Surat Keluar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="NIP" value="<?= $user['NIP']; ?>">
                            <input type="hidden" name="id" value="<?= $surat_keluar['id']; ?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_surat">Nomor Surat</label>
                                    <input type="text" name="no_surat" value="<?= $surat_keluar['no_surat']; ?>"
                                        class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat">
                                    <?= form_error('no_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_keluar">Tanggal Keluar</label>
                                    <input type="date" name="tgl_keluar" value="<?= $surat_keluar['tgl_keluar']; ?>"
                                        class="form-control" id="tgl_keluar" placeholder="Masukkan Tanggal Keluar">
                                    <?= form_error('tgl_keluar', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="pengirim">Tujuan</label>
                                    <input type="text" name="pengirim" value="<?= $surat_keluar['tujuan']; ?>"
                                        class="form-control" id="pengirim" placeholder="Masukkan Pengirim">
                                    <?= form_error('pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" name="perihal" value="<?= $surat_keluar['perihal']; ?>"
                                        class="form-control" id="perihal" placeholder="Masukkan Perihal">
                                    <?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Surat</label>
                                    <div class="custom-file">
                                        <input type="file" name="surat" class="custom-file-input" id="surat">
                                        <label for="surat" class="custom-file-label">Choose File</label>
                                    </div>
                                </div>
                                <a href="<?= base_url('Admin/admin/surat_keluar') ?>"
                                    class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="edit" class="btn btn-secondary float-right">Edit
                                    Data</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
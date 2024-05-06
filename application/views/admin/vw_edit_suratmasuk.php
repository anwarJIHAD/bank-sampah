<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $judul; ?></h1>
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
                            <h3 class="card-title">Surat Masuk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="NIP" value="<?= $user['NIP']; ?>">
                            <input type="hidden" name="id" value="<?= $surat_masuk['id'];?>">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="no_surat">Nomor Surat</label>
                                    <input type="text" name="no_surat" value="<?= $surat_masuk['no_surat']; ?>" class="form-control" id="no_surat" placeholder="Masukkan Nomor Surat">
                                    <?= form_error('no_surat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_kirim">Tanggal Kirim</label>
                                    <input type="date" name="tgl_kirim" value="<?= $surat_masuk['tgl_kirim']; ?>" class="form-control" id="tgl_kirim" placeholder="Masukkan Tanggal Kirim">
                                    <?= form_error('tgl_kirim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_terima">Tanggal Terima</label>
                                    <input type="date" name="tgl_terima" value="<?= $surat_masuk['tgl_terima']; ?>" class="form-control" id="tgl_terima" placeholder="Masukkan Tanggal Terima">
                                    <?= form_error('tgl_terima', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="pengirim">Pengirim</label>
                                    <input type="text" name="pengirim" value="<?= $surat_masuk['pengirim']; ?>" class="form-control" id="pengirim" placeholder="Masukkan Pengirim">
                                    <?= form_error('pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="perihal">Perihal</label>
                                    <input type="text" name="perihal" value="<?= $surat_masuk['perihal']; ?>" class="form-control" id="perihal" placeholder="Masukkan Perihal">
                                    <?= form_error('perihal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Surat</label>
                                    <div class="custom-file">
                                        <input type="file" name="surat" class="custom-file-input" id="surat">
                                        <label for="surat" class="custom-file-label">Choose File</label>
                                    </div>
                                </div>
                                <a href="<?= base_url('Admin/admin/surat_masuk') ?>" class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="edit" class="btn btn-secondary float-right">Edit Data</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>
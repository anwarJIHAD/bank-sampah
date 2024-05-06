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
                            <h3 class="card-title">Edit Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_pmi">nama pmi</label>
                                    <input type="text" name="nama_pmi" value="<?= $kasus['nama_pmi'] ?>"
                                        class="form-control" id="nama_pmi" placeholder="Masukkan nama_pmi">
                                    <?= form_error('nama_pmi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="jenis_kelamin">jenis kelamin</label></br>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="">--------------pilih jenis kelamin------------</option>
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="perempuan">perempuan</option>
                                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div> -->

                                <div class="form-group">
                                    <label for="tgl_pengaduan">Tanggal Pengaduan</label>
                                    <input type="date" name="tgl_pengaduan" value="<?= $kasus['tgl_pengaduan'] ?>"
                                        class="form-control" id="tgl_pengaduan" placeholder="Masukkan Tanggal Terima">
                                    <?= form_error('tgl_pengaduan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="no_paspor">Nomor Paspor</label>
                                    <input type="text" name="no_paspor" value="<?= $kasus['no_paspor'] ?>"
                                        class="form-control" id="no_paspor" placeholder="Masukkan no_paspor">
                                    <?= form_error('no_paspor', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">alamat</label>
                                    <input type="text" name="alamat" value="<?= $kasus['alamat'] ?>"
                                        class="form-control" id="alamat" placeholder="Masukkan alamat">
                                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="negara_penempatan">Negara Penempatan</label>
                                    <input type="text" name="negara_penempatan"
                                        value="<?= $kasus['negara_penempatan'] ?>" class="form-control"
                                        id="negara_penempatan" placeholder="Masukkan negara_penempatan">
                                    <?= form_error('negara_penempatan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kasus">Jenis Kasus</label></br>
                                    <input type="text" name="jenis_kasus" value="<?= $kasus['jenis_kasus'] ?>"
                                        class="form-control" id="jenis_kasus" placeholder="Masukkan jenis_kasus">
                                    <?= form_error('jenis_kasus', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="p3mi">P3MI</label>
                                    <input type="text" name="p3mi" value="<?= $kasus['p3mi'] ?>" class="form-control"
                                        id="p3mi" placeholder="Masukkan p3mi">
                                    <?= form_error('p3mi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="uraian_kasus">Uraian Kasus</label>
                                    <input type="text" name="uraian_kasus" value="<?= $kasus['uraian_kasus'] ?>"
                                        class="form-control" id="uraian_kasus" placeholder="Masukkan uraian_kasus">
                                    <?= form_error('uraian_kasus', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="penyelesaian">penyelesaian</label>
                                    <input type="text" name="penyelesaian" value="<?= $kasus['penyelesaian'] ?>"
                                        class="form-control" id="penyelesaian" placeholder="Masukkan penyelesaian">
                                    <?= form_error('penyelesaian', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" value="<?= $kasus['keterangan'] ?>"
                                        class="form-control" id="keterangan" placeholder="Masukkan keterangan">
                                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <a href="<?= base_url('Admin/Kasus') ?>" class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="edit" class="btn btn-secondary float-right">Edit Data
                                    Kasus</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div> --
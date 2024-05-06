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
                            <h3 class="card-title">Tambah Data</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" value="<?= set_value('nama'); ?>"
                                        class="form-control" id="nama" placeholder="Masukkan Nama">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">jenis kelamin</label></br>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                        <option value="">--------------pilih jenis kelamin------------</option>
                                        <option value="laki-laki">laki-laki</option>
                                        <option value="perempuan">perempuan</option>
                                        <?= form_error('jenis_kelamin', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="usia">usia</label>
                                    <input type="number" name="usia" value="<?= set_value('usia'); ?>"
                                        class="form-control" id="usia" placeholder="Masukkan Tanggal Terima">
                                    <?= form_error('usia', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="daerah_asal">Daerah Asal</label>
                                    <input type="text" name="daerah_asal" value="<?= set_value('daerah_asal'); ?>"
                                        class="form-control" id="daerah_asal" placeholder="Masukkan daerah_asal">
                                    <?= form_error('daerah_asal', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label></br>
                                    <select name="pendidikan" id="pendidikan" class="form-control">
                                        <option value="">--------------pilih Pendidikan terakhir------------</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="SARJANA 1">SARJANA 1</option>
                                        <option value="SARJANA 2">SARJANA 1</option>
                                        <?= form_error('pendidikan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="negara_tujuan">Negara Tujuan</label>
                                    <input type="text" name="negara_tujuan" value="<?= set_value('negara_tujuan'); ?>"
                                        class="form-control" id="negara_tujuan" placeholder="Masukkan negara_tujuan">
                                    <?= form_error('negara_tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="sektor_pekerjaan">Sektor Pekerjaan</label></br>
                                    <input type="text" name="sektor_pekerjaan"
                                        value="<?= set_value('sektor_pekerjaan'); ?>" class="form-control"
                                        id="sektor_pekerjaan" placeholder="Masukkan sektor_pekerjaan">
                                    <?= form_error('sektor_pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="no_kontak">Nomor Kontak</label>
                                    <input type="number" name="no_kontak" value="<?= set_value('no_kontak'); ?>"
                                        class="form-control" id="no_kontak" placeholder="Masukkan no_kontak">
                                    <?= form_error('no_kontak', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="informasi">Informasi yang diperlukan</label>
                                    <input type="text" name="informasi" value="<?= set_value('informasi'); ?>"
                                        class="form-control" id="informasi" placeholder="Masukkan informasi">
                                    <?= form_error('informasi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" value="<?= set_value('ket'); ?>"
                                        class="form-control" id="keterangan" placeholder="Masukkan keterangan">
                                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <a href="<?= base_url('Admin/Pkln') ?>" class="btn btn-secondary float-left">Tutup</a>
                                <button type="submit" name="tambah" class="btn btn-secondary float-right">Tambah Data
                                    Pencari Kerja</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div> --
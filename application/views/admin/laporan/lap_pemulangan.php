<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center" style=''>
                    <center>
                        <h1>Laporan Pemulangan PMI</h1>
                    </center>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-header">
                            <!-- <a href="<?= base_url('Admin/Admin//tambahSKeluar/') . $user['NIP']; ?>"
                                class="btn btn-secondary float-left">TAMBAHKAN DATA</a>
                            <div class="btn-group" id='pdf' style="margin-left:1400px;">
                                <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false"><i class='fa fa-download'></i>
                                    Export
                                </button>
                                <ul class="dropdown-menu" id='dropdowns'>
                                    <li><a class="dropdown-item bg-warning" style='text-align: center; margin:auto;'
                                            id='dropdown' href="<?= base_url('Admin/Export/suratkeluar/') ?>"><i
                                                class='fa fa-download'></i>PDF</a>
                                    </li>
                                    <li><a class="dropdown-item bg-success align-text-center" id='dropdown'
                                            style='margin:5px auto 5px auto ; text-align: center; '
                                            href="<?= base_url('Admin/Pmi_ilegal/export/') ?>"><i
                                                class='fa fa-download'></i>EXCEL</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>

                        <div class="card-body">
                            <?= $this->session->flashdata('message'); ?>
                            <center>
                                <table id="example1" class="table table-bordered table-striped"
                                    style="margin-left:auto;margin-right:auto;" border='1'>
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>

                                            <th>Negara Penempatan</th>
                                            <th>Tanggal Kedatangan </th>
                                            <th>Jenis Kepulangan</th>
                                            <th>Alamat</th>
                                            <th>Provinsi</th>
                                            <th>TPI/Debarkasi</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="resultMain">
                                        <?php $i = 1; ?>
                                        <?php foreach ($surat_masuk as $us): ?>
                                            <tr>
                                                <td>
                                                    <?= $i; ?>.
                                                </td>
                                                <td>
                                                    <?= $us['nama']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['jenis_kelamin']; ?>
                                                </td>


                                                <td>
                                                    <?= $us['negara_penempatan']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['tgl_datang']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['jenis_pulang']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['alamat']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['provinsi']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['debarkas']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['ket']; ?>
                                                </td>

                                            
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                        </tfoot>
                                </table>
                        </div>
                        </center>
                        <!-- /.card-body -->
                    </div>
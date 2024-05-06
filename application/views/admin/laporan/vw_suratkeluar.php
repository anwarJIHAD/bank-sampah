<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 text-center" style=''>
                    <center>
                        <h1>Laporan Agenda Surat Keluar</h1>
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

                        <div class="card-body" style='margin-left:175px;'>
                            <?= $this->session->flashdata('message'); ?>
                            <center>
                                <table id="example1" class="table table-bordered table-striped" border='1'>
                                    <thead>
                                        <tr>
                                            <th>NO</th>

                                            <th>Nomor Surat</th>
                                            <th>Tanggal Keluar</th>
                                            <th>tujuan</th>
                                            <th>Perihal</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($surat_keluar as $us): ?>
                                            <tr>
                                                <td>
                                                    <?= $i; ?>.
                                                </td>

                                                <td>
                                                    <?= $us['no_surat']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['tgl_keluar']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['tujuan']; ?>
                                                </td>
                                                <td>
                                                    <?= $us['perihal']; ?>
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
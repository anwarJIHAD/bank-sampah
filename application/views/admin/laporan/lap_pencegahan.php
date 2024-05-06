<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: '1px solid black;'
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 text-center" style=''>
                        <center>
                            <h1>Laporan Pencegahan PMI Ilegal</h1>
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
                                        style="margin-left:auto;margin-right:auto;" border='1px'>
                                        <thead>
                                            <tr align="center">
                                                <td colspan="6">Pelaksana</td>
                                                <td colspan="3">Korban</td>
                                                <td colspan="1">Pelaku</td>
                                                <td colspan="2">Informasi tambahan</td>

                                            </tr>
                                            <tr style='background-color:#B0E0E6;'>
                                                <th width="2%">NO</th>
                                                <th width="8%">PELAKSANA</th>
                                                <th width="5%">TANGGAL PELAKSANAAN</th>
                                                <th width="10%">TKP</th>
                                                <th width="2%">KRONOLOGI PENCEGAHAN</th>
                                                <th width="2%">LOKASI SHELTER</th>
                                                <th width="6%">NAMA</th>
                                                <th width="6%">DAERAH ASAL PMI</th>
                                                <th width="6%">NEGARA TUJUAN</th>
                                                <th width="6%">NAMA(PERAN)</th>
                                                <th width="8%">INSTANSI PENINDAK LANJUT</th>
                                                <th>Keterangan</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($pelaksana as $us): ?>
                                                <tr>
                                                    <td>
                                                        <?= $i; ?>.
                                                    </td>
                                                    <td>
                                                        <?= $us['nama_pelaksana']; ?>
                                                    </td>

                                                    <td>
                                                        <?= $us['tgl_pelaksanaan']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $us['TKP']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $us['kronologi_Pencegahan']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $us['lokasi_shelter']; ?>
                                                    </td>
                                                    <td colspan="3">
                                                        <table width="100%" border="0.5 solid black">
                                                            <?php
                                                            $did = $us['tgl_pelaksanaan'];
                                                            // var_dump($did);
                                                            // die;
                                                            $korban = $this->Ilegal_model->getbytgl($did);
                                                            $pelaku = $this->Pelaku_model->get_Pelaku1($did);

                                                            // $sql = "SELECT pmi_pendukung.id_pendukung, pmi_ilegal.* from pmi_pendukung INNER JOIN pmi_ilegal on pmi_pendukung.id_pendukung = pmi_ilegal.id_pendukung WHERE pmi_pendukung.id_pendukung = '$did'";
                                                            // $query = $this->db->query($sql);
                                                        
                                                            if ($korban != 0) {
                                                                $no = 0;
                                                                foreach ($korban as $row2): ?>

                                                                    <tr style="padding:100px;">
                                                                        <td style=' border: 1px solid black;
                                                                            word-wrap: break-word;
                                                                            max-width: 30px;'>
                                                                            <?php echo $row2['nama']; ?>
                                                                        </td>
                                                                        <td style=' border: 1px solid black;
                                                                            word-wrap: break-word;
                                                                            max-width: 49px;'>
                                                                            <?php echo $row2['daerah_asal_pmi']; ?>
                                                                        </td>
                                                                        <td style=' border: 1px solid black;
                                                                            word-wrap: break-word;
                                                                            max-width: 45px;'>
                                                                            <?php echo $row2['negara_tujuan'];
                                                                            ; ?>
                                                                        </td>
                                                                    </tr>

                                                                <?php endforeach;
                                                            } ?>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <table width="100%" border="0.5">
                                                            <?php
                                                            $did = $us['tgl_pelaksanaan'];
                                                            $sql = "SELECT pelaku.* from detail_ilegal INNER JOIN pelaku on detail_ilegal.id_pelaku = pelaku.id_pelaku WHERE detail_ilegal.tgl_pelaksanaan = '$did'";
                                                            $query = $this->db->query($sql);
                                                            // var_dump($query->num_rows());
                                                            // die;
                                                            if ($query->num_rows() > 0) {
                                                                foreach ($query->result() as $row2):
                                                                    // var_dump($row2['nama_pelaku']);
                                                                    // die;
                                                                    ?>

                                                                    <tr>
                                                                        <td style=' border: 1px solid black;
                                                                            word-wrap: break-word;
                                                                            max-width: 30px;'>
                                                                            <?php echo $row2->nama_pelaku ?>(
                                                                            <?php echo $row2->peran; ?> )
                                                                        </td>


                                                                    </tr>

                                                                    <?php
                                                                endforeach;
                                                            } ?>
                                                        </table>
                                                    </td>
                                                    <td>
                                                        <?= $us['instansi_penindaklanjut']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $us['keterangan']; ?>
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
</body>

</html>
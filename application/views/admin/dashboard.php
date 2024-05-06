<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <?php echo $judul ?>
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                <?php echo $jumlah_pegawai ?>
                            </h3>

                            <p>Pegawai</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= base_url('Admin/Admin') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?php echo $jumlah_berkas ?>
                                <!-- <sup style="font-size: 20px">%</sup> -->
                            </h3>

                            <p>Berkas</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= base_url('Admin/Admin/pangkat') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                <?php echo $jumlah_surat ?>
                            </h3>

                            <p>Agenda Surat Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= base_url('Admin/Admin/surat_keluar') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <?php echo $jumlah_penempatan ?>
                            </h3>

                            <p>PMI Penempatan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?= base_url('Admin/Pmi_penempatan') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>

            <!-- baris ke 2 -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>
                                <?php echo $jumlah_pkln ?>
                            </h3>

                            <p>Pencarian Kerja Luar Negeri</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?= base_url('Admin/Pkln') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>
                                <?php echo $jumlah_kasus ?>
                                <!-- <sup style="font-size: 20px">%</sup> -->
                            </h3>

                            <p>Kasus</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?= base_url('Admin/kasus') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>
                                <?php echo $jumlah_pencegahan ?>
                            </h3>

                            <p>Pencegahan PMI Ilegal</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?= base_url('Admin/Pmi_ilegal') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>
                                <?php echo $jumlah_pemulangan ?>
                            </h3>

                            <p>PMI Pemulangan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?= base_url('Admin/Pmi') ?>" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Grafik Data PMI</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">

                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <canvas id="myChart" height="200"></canvas>

                                <!-- <canvas id="visitors-chart"></canvas> -->
                            </div>


                        </div>
                    </div>
                    <!-- /.card -->
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>

                        var jumlah_penempatan = <?php echo $jumlah_penempatan ?>;
                        var jumlah_pkln = <?php echo $jumlah_pkln ?>;
                        var jumlah_kasus = <?php echo $jumlah_kasus ?>;
                        var jumlah_pencegahan = <?php echo $jumlah_pencegahan ?>;
                        var jumlah_pemulangan = <?php echo $jumlah_pemulangan ?>;
                        var dataX1 = ['Data PMI'];
                        var dataX2 = ['PMI Penempatan', 'Pencarian Kerja Luar Negeri', 'Kasus PMI', 'Pencegahan PMI Ilegal', 'PMI Pemulangan'];
                        var dataY1 = [jumlah_penempatan, jumlah_pkln, jumlah_kasus, jumlah_pencegahan, jumlah_pemulangan];
                        // Inisialisasi grafik
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: dataX1, // Menggunakan dataX1 sebagai label
                                datasets: [{
                                    label: 'PMI Penempatan',
                                    data: [{ x: dataX1[0], y: dataY1[0] }],
                                    backgroundColor: 'rgba(222, 38, 38, 0.9)',
                                    borderColor: 'rgba(0, 128, 0, 1)',
                                    borderWidth: 1
                                }, {
                                    label: 'Pencarian Kerja PMI Luar Negeri',
                                    data: [{ x: dataX1[0], y: dataY1[1] }],
                                    backgroundColor: 'rgba(16, 204, 224, 0.9)',
                                    borderColor: 'rgba(0, 128, 0, 1)',
                                    borderWidth: 1
                                }, {
                                    label: 'Kasus PMI',
                                    data: [{ x: dataX1[0], y: dataY1[2] }],
                                    backgroundColor: 'rgba(16, 224, 26, 0.9)',
                                    borderColor: 'rgba(0, 128, 0, 1)',
                                    borderWidth: 1
                                }, {
                                    label: 'Pencegahan PMI Ilegal',
                                    data: [{ x: dataX1[0], y: dataY1[3] }],
                                    backgroundColor: 'rgba(224, 207, 16, 0.9)',
                                    borderColor: 'rgba(0, 128, 0, 1)',
                                    borderWidth: 1
                                }, {
                                    label: 'PMI Pemulangan',
                                    data: [{ x: dataX1[0], y: dataY1[4] }],
                                    backgroundColor: 'rgba(224, 16, 54, 0.9)',
                                    borderColor: 'rgba(224, 16, 54, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    x: {
                                        type: 'category', // Menggunakan skala kategori untuk label bulan
                                        position: 'bottom'
                                    },
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>

                </div>
                <!-- /.col-md-6 -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Pemulangan PMI</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex- flex-row-reverse col-sm-4 ml-auto">
                                <div class="input-group">
                                    <select style="width:20%;" id="Psearch" name="keyword" class="form-control"
                                        value="<?= set_value('pelaksana'); ?>">
                                        <option class='text-center dropdown-toggle' value="">pilih Tahun</option>
                                        <?php foreach ($tahun as $p): ?>
                                            <option value="<?= $p; ?>">
                                                <?= $p; ?>
                                            </option>
                                        <?php endforeach; ?>>

                                    </select>
                                </div>
                                <p class="d-flex flex-column">

                                </p>
                                <p class="ml-auto d-flex flex-column text-right">

                                    <span class="text-muted"></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <div class='coba'>
                                    <canvas id="myChart2" height='163'></canvas>

                                </div>

                                <!-- <canvas id="visitors-chart"></canvas> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Penempatan PMI</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex- flex-row-reverse col-sm-4 ml-auto">
                                <div class="input-group">
                                    <select style="width:20%;" id="Psearch1" name="keyword" class="form-control"
                                        value="<?= set_value('pelaksana'); ?>">
                                        <option class='text-center dropdown-toggle' value="">pilih Tahun</option>
                                        <?php foreach ($tahun as $p): ?>
                                            <option value="<?= $p; ?>">
                                                <?= $p; ?>
                                            </option>
                                        <?php endforeach; ?>>

                                    </select>
                                </div>
                                <p class="d-flex flex-column">

                                </p>
                                <p class="ml-auto d-flex flex-column text-right">

                                    <span class="text-muted"></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <div class='coba3'>
                                    <canvas id="myChart3" height='163'></canvas>

                                </div>

                                <!-- <canvas id="visitors-chart"></canvas> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Pencari Kerja Luar Negeri</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex- flex-row-reverse col-sm-4 ml-auto">
                                <div class="input-group">
                                    <select style="width:20%;" id="Psearch4" name="keyword" class="form-control"
                                        value="<?= set_value('pelaksana'); ?>">
                                        <option class='text-center dropdown-toggle' value="">pilih Jenis Kelamin
                                        </option>
                                        <?php foreach ($jk as $p): ?>
                                            <option value="<?= $p; ?>">
                                                <?= $p; ?>
                                            </option>
                                        <?php endforeach; ?>>

                                    </select>
                                </div>
                                <p class="d-flex flex-column">

                                </p>
                                <p class="ml-auto d-flex flex-column text-right">

                                    <span class="text-muted"></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <div class='coba4'>
                                    <canvas id="myChart4" height='163'></canvas>

                                </div>

                                <!-- <canvas id="visitors-chart"></canvas> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Kasus PMI</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex- flex-row-reverse col-sm-4 ml-auto">
                                <div class="input-group">
                                    <select style="width:20%;" id="Psearch5" name="keyword" class="form-control"
                                        value="<?= set_value('pelaksana'); ?>">
                                        <option class='text-center dropdown-toggle' value="">pilih Tahun Pengaduan
                                        </option>
                                        <?php foreach ($tahun as $p): ?>
                                            <option value="<?= $p; ?>">
                                                <?= $p; ?>
                                            </option>
                                        <?php endforeach; ?>>

                                    </select>
                                </div>
                                <p class="d-flex flex-column">

                                </p>
                                <p class="ml-auto d-flex flex-column text-right">

                                    <span class="text-muted"></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <div class='coba5'>
                                    <canvas id="myChart5" height='163'></canvas>

                                </div>

                                <!-- <canvas id="visitors-chart"></canvas> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Korban PMI Ilegal</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex- flex-row-reverse col-sm-4 ml-auto">
                                <div class="input-group">
                                <select style="width:20%;" id="Psearch6" name="keyword" class="form-control"
                                        value="<?= set_value('pelaksana'); ?>">
                                        <option class='text-center dropdown-toggle' value="">pilih Tahun Pelaksanaan
                                        </option>
                                        <?php foreach ($tahun as $p): ?>
                                            <option value="<?= $p; ?>">
                                                <?= $p; ?>
                                            </option>
                                        <?php endforeach; ?>>

                                    </select>
                                </div>
                                <p class="d-flex flex-column">

                                </p>
                                <p class="ml-auto d-flex flex-column text-right">

                                    <span class="text-muted"></span>
                                </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                                <div class='coba6'>
                                    <canvas id="myChart6" height='163'></canvas>

                                </div>

                                <!-- <canvas id="visitors-chart"></canvas> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->
            </div>



        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        var tahun = ''
        $.ajax({
            url: '<?php echo base_url('Admin/Admin/pemulanganbytahun/'); ?>',
            type: 'GET',
            data: { tahun: tahun },
            dataType: 'json',
            success: function (response) {

                // Tampilkan data yang diterima dari server
                var month_1 = response['month_1']
                var month_2 = response['month_2']
                var month_3 = response['month_3']
                var month_4 = response['month_4']
                var month_5 = response['month_5']
                var month_6 = response['month_6']
                var month_7 = response['month_7']
                var month_8 = response['month_8']
                var month_9 = response['month_9']
                var month_10 = response['month_10']
                var month_11 = response['month_11']
                var month_12 = response['month_12']

                var dataX1 = ['January', 'February', 'March', 'April', 'May', 'June', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var dataY1 = [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12];

                var ctx = document.getElementById('myChart2').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dataX1, // Menggunakan dataX1 sebagai label
                        datasets: [{
                            label: 'PMI Pemulangan',
                            data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }, { x: dataX1[6], y: dataY1[6] }, { x: dataX1[7], y: dataY1[7] }, { x: dataX1[8], y: dataY1[8] }, { x: dataX1[9], y: dataY1[9] }, { x: dataX1[10], y: dataY1[10] }, { x: dataX1[11], y: dataY1[11] }, { x: dataX1[11], y: dataY1[11] }],
                            backgroundColor: 'rgba(222, 38, 38, 0.9)',
                            borderColor: 'rgba(0, 128, 0, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category', // Menggunakan skala kategori untuk label bulan
                                position: 'bottom'
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });


                // Lakukan apa pun yang Anda inginkan dengan data
            },
            error: function (xhr, textStatus, errorThrown) {
                if (xhr.status === 500) {
                    // Kesalahan server internal, tampilkan pesan kesalahan
                    alert('Terjadi kesalahan saat mengambil data1: ');
                } else {
                    // Kesalahan lainnya, tampilkan pesan kesalahan umum
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            }
        });



        $('#Psearch').change(function () {
            $("canvas#myChart2").remove();
            $("div.coba").append('<canvas id="myChart2" height="163"></canvas>');
            var tahun = $(this).val().toLowerCase();
            $.ajax({
                url: '<?php echo base_url('Admin/Admin/pemulanganbytahun/'); ?>',
                type: 'GET',
                data: { tahun: tahun },
                dataType: 'json',
                success: function (response) {

                    // Tampilkan data yang diterima dari server
                    var month_1 = response['month_1']
                    var month_2 = response['month_2']
                    var month_3 = response['month_3']
                    var month_4 = response['month_4']
                    var month_5 = response['month_5']
                    var month_6 = response['month_6']
                    var month_7 = response['month_7']
                    var month_8 = response['month_8']
                    var month_9 = response['month_9']
                    var month_10 = response['month_10']
                    var month_11 = response['month_11']
                    var month_12 = response['month_12']

                    var dataX1 = ['January', 'February', 'March', 'April', 'May', 'June', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var dataY1 = [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12];

                    var ctx = document.getElementById('myChart2').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: dataX1, // Menggunakan dataX1 sebagai label
                            datasets: [{
                                label: 'PMI Penempatan',
                                data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }, { x: dataX1[6], y: dataY1[6] }, { x: dataX1[7], y: dataY1[7] }, { x: dataX1[8], y: dataY1[8] }, { x: dataX1[9], y: dataY1[9] }, { x: dataX1[10], y: dataY1[10] }, { x: dataX1[11], y: dataY1[11] }, { x: dataX1[11], y: dataY1[11] }],
                                backgroundColor: 'rgba(222, 38, 38, 0.9)',
                                borderColor: 'rgba(0, 128, 0, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    type: 'category', // Menggunakan skala kategori untuk label bulan
                                    position: 'bottom'
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });


                },
                error: function (xhr, textStatus, errorThrown) {
                    if (xhr.status === 500) {
                        // Kesalahan server internal, tampilkan pesan kesalahan
                        alert('Terjadi kesalahan saat mengambil data1: ');
                    } else {
                        // Kesalahan lainnya, tampilkan pesan kesalahan umum
                        alert('Terjadi kesalahan saat mengambil data.');
                    }
                }
            });
        })



        //chart pmi penempatan

        $.ajax({
            url: '<?php echo base_url('Admin/Admin/penempatanbytahun/'); ?>',
            type: 'GET',
            data: { tahun: tahun },
            dataType: 'json',
            success: function (response) {

                // Tampilkan data yang diterima dari server
                var month_1 = response['month_1']
                var month_2 = response['month_2']
                var month_3 = response['month_3']
                var month_4 = response['month_4']
                var month_5 = response['month_5']
                var month_6 = response['month_6']
                var month_7 = response['month_7']
                var month_8 = response['month_8']
                var month_9 = response['month_9']
                var month_10 = response['month_10']
                var month_11 = response['month_11']
                var month_12 = response['month_12']

                var dataX1 = ['January', 'February', 'March', 'April', 'May', 'June', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var dataY1 = [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12];

                var ctx = document.getElementById('myChart3').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dataX1, // Menggunakan dataX1 sebagai label
                        datasets: [{
                            label: 'PMI Penempatan',
                            data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }, { x: dataX1[6], y: dataY1[6] }, { x: dataX1[7], y: dataY1[7] }, { x: dataX1[8], y: dataY1[8] }, { x: dataX1[9], y: dataY1[9] }, { x: dataX1[10], y: dataY1[10] }, { x: dataX1[11], y: dataY1[11] }, { x: dataX1[11], y: dataY1[11] }],
                            backgroundColor: 'rgba(222, 38, 38, 0.9)',
                            borderColor: 'rgba(0, 128, 0, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category', // Menggunakan skala kategori untuk label bulan
                                position: 'bottom'
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });


                // Lakukan apa pun yang Anda inginkan dengan data
            },
            error: function (xhr, textStatus, errorThrown) {
                if (xhr.status === 500) {
                    // Kesalahan server internal, tampilkan pesan kesalahan
                    alert('Terjadi kesalahan saat mengambil data1: ');
                } else {
                    // Kesalahan lainnya, tampilkan pesan kesalahan umum
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            }
        });
        $('#Psearch1').change(function () {
            $("canvas#myChart3").remove();
            $("div.coba3").append('<canvas id="myChart3" height="163"></canvas>');
            var tahun = $(this).val().toLowerCase();
            $.ajax({
                url: '<?php echo base_url('Admin/Admin/penempatanbytahun/'); ?>',
                type: 'GET',
                data: { tahun: tahun },
                dataType: 'json',
                success: function (response) {

                    // Tampilkan data yang diterima dari server
                    var month_1 = response['month_1']
                    var month_2 = response['month_2']
                    var month_3 = response['month_3']
                    var month_4 = response['month_4']
                    var month_5 = response['month_5']
                    var month_6 = response['month_6']
                    var month_7 = response['month_7']
                    var month_8 = response['month_8']
                    var month_9 = response['month_9']
                    var month_10 = response['month_10']
                    var month_11 = response['month_11']
                    var month_12 = response['month_12']

                    var dataX1 = ['January', 'February', 'March', 'April', 'May', 'June', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var dataY1 = [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12];

                    var ctx = document.getElementById('myChart3').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: dataX1, // Menggunakan dataX1 sebagai label
                            datasets: [{
                                label: 'PMI Penempatan',
                                data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }, { x: dataX1[6], y: dataY1[6] }, { x: dataX1[7], y: dataY1[7] }, { x: dataX1[8], y: dataY1[8] }, { x: dataX1[9], y: dataY1[9] }, { x: dataX1[10], y: dataY1[10] }, { x: dataX1[11], y: dataY1[11] }, { x: dataX1[11], y: dataY1[11] }],
                                backgroundColor: 'rgba(222, 38, 38, 0.9)',
                                borderColor: 'rgba(0, 128, 0, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    type: 'category', // Menggunakan skala kategori untuk label bulan
                                    position: 'bottom'
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });


                },
                error: function (xhr, textStatus, errorThrown) {
                    if (xhr.status === 500) {
                        // Kesalahan server internal, tampilkan pesan kesalahan
                        alert('Terjadi kesalahan saat mengambil data1: ');
                    } else {
                        // Kesalahan lainnya, tampilkan pesan kesalahan umum
                        alert('Terjadi kesalahan saat mengambil data.');
                    }
                }
            });
        })

        // chart pencari kerja luar negeri
        $.ajax({
            url: '<?php echo base_url('Admin/Admin/pklnbyedu/'); ?>',
            type: 'GET',
            data: {},
            dataType: 'json',
            success: function (response) {
                // Tampilkan data yang diterima dari server
                var month_1 = response['month_1']
                var month_2 = response['month_2']
                var month_3 = response['month_3']
                var month_4 = response['month_4']
                var month_5 = response['month_5']


                var dataX1 = ['SD', 'SMP', 'SMA', 'SARJANA 1', 'SARJANA 2'];
                var dataY1 = [month_1, month_2, month_3, month_4, month_5];

                var ctx = document.getElementById('myChart4').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dataX1, // Menggunakan dataX1 sebagai label
                        datasets: [{
                            label: 'Pencari Kerja Luar Negeri',
                            data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }],
                            backgroundColor: 'rgba(222, 38, 38, 0.9)',
                            borderColor: 'rgba(0, 128, 0, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category', // Menggunakan skala kategori untuk label bulan
                                position: 'bottom'
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });


                // Lakukan apa pun yang Anda inginkan dengan data
            },
            error: function (xhr, textStatus, errorThrown) {
                if (xhr.status === 500) {
                    // Kesalahan server internal, tampilkan pesan kesalahan
                    alert('Terjadi kesalahan saat mengambil data1: ');
                } else {
                    // Kesalahan lainnya, tampilkan pesan kesalahan umum
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            }
        });
        $('#Psearch4').change(function () {
            $("canvas#myChart4").remove();
            $("div.coba4").append('<canvas id="myChart4" height="163"></canvas>');
            var jenis_kelamin = $(this).val().toLowerCase();
            $.ajax({
                url: '<?php echo base_url('Admin/Admin/pklnbyedu/'); ?>',
                type: 'GET',
                data: { jenis_kelamin: jenis_kelamin },
                dataType: 'json',
                success: function (response) {

                    // Tampilkan data yang diterima dari server
                    var month_1 = response['month_1']
                    var month_2 = response['month_2']
                    var month_3 = response['month_3']
                    var month_4 = response['month_4']
                    var month_5 = response['month_5']
                    var month_6 = response['month_6']


                    var dataX1 = ['SD', 'SMP', 'SMA', 'SARJANA 1', 'SARJANA 2'];
                    var dataY1 = [month_1, month_2, month_3, month_4, month_5];

                    var ctx = document.getElementById('myChart4').getContext('2d');

                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: dataX1, // Menggunakan dataX1 sebagai label
                            datasets: [{
                                label: 'Pencari Kerja Luar Negeri',
                                data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }],
                                backgroundColor: 'rgba(222, 38, 38, 0.9)',
                                borderColor: 'rgba(0, 128, 0, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    type: 'category', // Menggunakan skala kategori untuk label bulan
                                    position: 'bottom'
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });


                    // Lakukan apa pun yang Anda inginkan dengan data
                },
                error: function (xhr, textStatus, errorThrown) {
                    if (xhr.status === 500) {
                        // Kesalahan server internal, tampilkan pesan kesalahan
                        alert('Terjadi kesalahan saat mengambil data1: ');
                    } else {
                        // Kesalahan lainnya, tampilkan pesan kesalahan umum
                        alert('Terjadi kesalahan saat mengambil data.');
                    }
                }
            });
        })


        //chart kasus pmi
        $.ajax({
            url: '<?php echo base_url('Admin/Admin/kasusbytahun/'); ?>',
            type: 'GET',
            data: { tahun: tahun },
            dataType: 'json',
            success: function (response) {
                // Tampilkan data yang diterima dari server
                var month_1 = response['month_1']
                var month_2 = response['month_2']
                var month_3 = response['month_3']
                var month_4 = response['month_4']
                var month_5 = response['month_5']
                var month_6 = response['month_6']
                var month_7 = response['month_7']
                var month_8 = response['month_8']
                var month_9 = response['month_9']
                var month_10 = response['month_10']
                var month_11 = response['month_11']
                var month_12 = response['month_12']

                var dataX1 = ['January', 'February', 'March', 'April', 'May', 'June', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var dataY1 = [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12];

                var ctx = document.getElementById('myChart5').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dataX1, // Menggunakan dataX1 sebagai label
                        datasets: [{
                            label: 'PMI Penempatan',
                            data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }, { x: dataX1[6], y: dataY1[6] }, { x: dataX1[7], y: dataY1[7] }, { x: dataX1[8], y: dataY1[8] }, { x: dataX1[9], y: dataY1[9] }, { x: dataX1[10], y: dataY1[10] }, { x: dataX1[11], y: dataY1[11] }, { x: dataX1[11], y: dataY1[11] }],
                            backgroundColor: 'rgba(222, 38, 38, 0.9)',
                            borderColor: 'rgba(0, 128, 0, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category', // Menggunakan skala kategori untuk label bulan
                                position: 'bottom'
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });


                // Lakukan apa pun yang Anda inginkan dengan data
            },
            error: function (xhr, textStatus, errorThrown) {
                if (xhr.status === 500) {
                    // Kesalahan server internal, tampilkan pesan kesalahan
                    alert('Terjadi kesalahan saat mengambil data1: ');
                } else {
                    // Kesalahan lainnya, tampilkan pesan kesalahan umum
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            }
        });
        $('#Psearch5').change(function () {
            $("canvas#myChart5").remove();
            $("div.coba5").append('<canvas id="myChart5" height="163"></canvas>');
            var tahun = $(this).val().toLowerCase();
            $.ajax({
                url: '<?php echo base_url('Admin/Admin/kasusbytahun/'); ?>',
                type: 'GET',
                data: { tahun: tahun },
                dataType: 'json',
                success: function (response) {

                    // Tampilkan data yang diterima dari server
                    var month_1 = response['month_1']
                    var month_2 = response['month_2']
                    var month_3 = response['month_3']
                    var month_4 = response['month_4']
                    var month_5 = response['month_5']
                    var month_6 = response['month_6']
                    var month_7 = response['month_7']
                    var month_8 = response['month_8']
                    var month_9 = response['month_9']
                    var month_10 = response['month_10']
                    var month_11 = response['month_11']
                    var month_12 = response['month_12']

                    var dataX1 = ['January', 'February', 'March', 'April', 'May', 'June', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var dataY1 = [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12];

                    var ctx = document.getElementById('myChart5').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: dataX1, // Menggunakan dataX1 sebagai label
                            datasets: [{
                                label: 'PMI Penempatan',
                                data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }, { x: dataX1[6], y: dataY1[6] }, { x: dataX1[7], y: dataY1[7] }, { x: dataX1[8], y: dataY1[8] }, { x: dataX1[9], y: dataY1[9] }, { x: dataX1[10], y: dataY1[10] }, { x: dataX1[11], y: dataY1[11] }, { x: dataX1[11], y: dataY1[11] }],
                                backgroundColor: 'rgba(222, 38, 38, 0.9)',
                                borderColor: 'rgba(0, 128, 0, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    type: 'category', // Menggunakan skala kategori untuk label bulan
                                    position: 'bottom'
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });


                },
                error: function (xhr, textStatus, errorThrown) {
                    if (xhr.status === 500) {
                        // Kesalahan server internal, tampilkan pesan kesalahan
                        alert('Terjadi kesalahan saat mengambil data1: ');
                    } else {
                        // Kesalahan lainnya, tampilkan pesan kesalahan umum
                        alert('Terjadi kesalahan saat mengambil data.');
                    }
                }
            });
        })

        //chart pencegahan PMI Ilegal
        $.ajax({
            url: '<?php echo base_url('Admin/Admin/ilegalbytahun/'); ?>',
            type: 'GET',
            data: { tahun: tahun },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                // Tampilkan data yang diterima dari server
                var month_1 = response['month_1']
                var month_2 = response['month_2']
                var month_3 = response['month_3']
                var month_4 = response['month_4']
                var month_5 = response['month_5']
                var month_6 = response['month_6']
                var month_7 = response['month_7']
                var month_8 = response['month_8']
                var month_9 = response['month_9']
                var month_10 = response['month_10']
                var month_11 = response['month_11']
                var month_12 = response['month_12']

                var dataX1 = ['January', 'February', 'March', 'April', 'May', 'June', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var dataY1 = [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12];

                var ctx = document.getElementById('myChart6').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: dataX1, // Menggunakan dataX1 sebagai label
                        datasets: [{
                            label: 'Pencegahan PMI Ilegal',
                            data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }, { x: dataX1[6], y: dataY1[6] }, { x: dataX1[7], y: dataY1[7] }, { x: dataX1[8], y: dataY1[8] }, { x: dataX1[9], y: dataY1[9] }, { x: dataX1[10], y: dataY1[10] }, { x: dataX1[11], y: dataY1[11] }, { x: dataX1[11], y: dataY1[11] }],
                            backgroundColor: 'rgba(222, 38, 38, 0.9)',
                            borderColor: 'rgba(0, 128, 0, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category', // Menggunakan skala kategori untuk label bulan
                                position: 'bottom'
                            },
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });


                // Lakukan apa pun yang Anda inginkan dengan data
            },
            error: function (xhr, textStatus, errorThrown) {
                if (xhr.status === 500) {
                    // Kesalahan server internal, tampilkan pesan kesalahan
                    alert('Terjadi kesalahan saat mengambil data1: ');
                } else {
                    // Kesalahan lainnya, tampilkan pesan kesalahan umum
                    alert('Terjadi kesalahan saat mengambil data.');
                }
            }
        });
        $('#Psearch6').change(function () {
            $("canvas#myChart6").remove();
            $("div.coba6").append('<canvas id="myChart6" height="163"></canvas>');
            var tahun = $(this).val().toLowerCase();
            $.ajax({
                url: '<?php echo base_url('Admin/Admin/ilegalbytahun/'); ?>',
                type: 'GET',
                data: { tahun: tahun },
                dataType: 'json',
                success: function (response) {

                    // Tampilkan data yang diterima dari server
                    var month_1 = response['month_1']
                    var month_2 = response['month_2']
                    var month_3 = response['month_3']
                    var month_4 = response['month_4']
                    var month_5 = response['month_5']
                    var month_6 = response['month_6']
                    var month_7 = response['month_7']
                    var month_8 = response['month_8']
                    var month_9 = response['month_9']
                    var month_10 = response['month_10']
                    var month_11 = response['month_11']
                    var month_12 = response['month_12']

                    var dataX1 = ['January', 'February', 'March', 'April', 'May', 'June', 'juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var dataY1 = [month_1, month_2, month_3, month_4, month_5, month_6, month_7, month_8, month_9, month_10, month_11, month_12];

                    var ctx = document.getElementById('myChart6').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: dataX1, // Menggunakan dataX1 sebagai label
                            datasets: [{
                                label: 'Korban PMI Ilegal',
                                data: [{ x: dataX1[0], y: dataY1[0] }, { x: dataX1[1], y: dataY1[1] }, { x: dataX1[2], y: dataY1[2] }, { x: dataX1[3], y: dataY1[3] }, { x: dataX1[4], y: dataY1[4] }, { x: dataX1[5], y: dataY1[5] }, { x: dataX1[6], y: dataY1[6] }, { x: dataX1[7], y: dataY1[7] }, { x: dataX1[8], y: dataY1[8] }, { x: dataX1[9], y: dataY1[9] }, { x: dataX1[10], y: dataY1[10] }, { x: dataX1[11], y: dataY1[11] }, { x: dataX1[11], y: dataY1[11] }],
                                backgroundColor: 'rgba(222, 38, 38, 0.9)',
                                borderColor: 'rgba(0, 128, 0, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    type: 'category', // Menggunakan skala kategori untuk label bulan
                                    position: 'bottom'
                                },
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });


                },
                error: function (xhr, textStatus, errorThrown) {
                    if (xhr.status === 500) {
                        // Kesalahan server internal, tampilkan pesan kesalahan
                        alert('Terjadi kesalahan saat mengambil data1: ');
                    } else {
                        // Kesalahan lainnya, tampilkan pesan kesalahan umum
                        alert('Terjadi kesalahan saat mengambil data.');
                    }
                }
            });
        })



    });
</script>
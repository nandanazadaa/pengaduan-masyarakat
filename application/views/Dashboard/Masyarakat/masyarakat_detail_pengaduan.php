<div class="page-wrapper" style="background-color:#BA9868;">

    <!-- PAGE CONTAINER-->
    <div class="page-container" style="background-color:#BA9868;">
        <div class="wrapper">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">Penganduan</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Dashboard v1</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <br>
                        <!-- Kategori -->
                        <?php foreach ($joinpengaduan2 as $d) { ?>

                            <div class="row">
                                <!-- detail pengaduan -->
                                <div class="col-xl-6">
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-dark">Detail Pengaduan</h3>
                                        </div>
                                        <div class="card-body">
                                            <h5>tanggal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<?= $d['tgl_pengaduan'] ?></h5>
                                            <hr style="background-color: black;">
                                            <h5>kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<?= $d['kategori'] ?></ph5>
                                            <hr style="background-color: black;"">
                                            <h5>subkategori &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<?= $d['sub_kategori'] ?></h5>
                                            <hr style="background-color: black;">
                                            <h5>Isi Laporan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?= $d['isi_laporan'] ?></h5>
                                            <hr style="background-color: black;">
                                            <h5 >status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<?= $d['status'] ?></h5>
                                            <hr style="background-color: black;">
                                            <br>
                                        </div>
                                    </div>
                                </div>

                                <!-- gambar detail pengaduan -->
                                <div class="col-xl-6">
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <h3 class="m-0 font-weight-bold text-dark">Gambar laporan</h3>
                                        </div>
                                        <div class="card-body">
                                            <img src="<?= base_url('assets/img/') . $d['foto'] ?>" style="height:285px; ">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <!-- Riwayat -->
                    <!-- Riwayat -->
                    <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                            <div class="d-flex align-item-center">
                                <h3 class="m-0 font-weight-bold text-dark">Riwayat Laporan Pengaduan</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr role="row">
                                            <th width="10%">No</th>
                                            <th width="20%">Tanggal</th>
                                            <th>Tanggapan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Tanggapan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php $i = 1 ?>
                                        <?php foreach ($tanggapan as $t) :?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $t['tgl_tanggapan'] ?></td>
                                                <td><?= $t['tanggapan'] ?></td>
                                            </tr>
                                            <?php $i++;
                                    endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    </div>
                    <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        </section>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © Nandana Zada Abiproya. All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</div>
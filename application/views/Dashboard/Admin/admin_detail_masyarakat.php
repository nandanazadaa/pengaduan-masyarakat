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
                <br>
                <br>
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Laporan Anda</h3>
                                
                            </div>
                            <br>
                            <a href="<?= base_url('Admin/laporan_pdf') ?>" type="submit" class="btn " style="background-color:#BA9868; color:white; width:100px; margin-left:30px;"><i class="fa fa-print"></i> Print</a>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelapor</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Laporan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($pengaduanaapa as $al) : ?>
                                        <tr>                     
                                            <td><?= $i ?></td>
                                            <td><?= $al['nama'] ?></td>
                                            <td><?= $al['tgl_pengaduan']; ?></td>
                                            <td><?= $al['kategori'] ?></td>
                                            <td><?= $al['isi_laporan'] ?></td>
                                            <!-- <td><img src="<?php echo base_url() . '/assets/img/' . $al['foto']; ?>" width="100"></td> -->
                                            <td>
                                            <a href="<?= base_url('Admin/tindakan_pengaduan/') . $al['id_pengaduan'] ?>" type="submit" class="
                                                <?php if ($al['status'] == 'segera') {
                                                    echo 'btn btn-dark';
                                                } else if ($al['status'] == 'proses') {
                                                    echo 'btn btn-warning';
                                                } else {
                                                    echo 'btn btn-success';
                                                } ?> btn-sm"><?= $al['status'] ?>
                                            </a>
                                        </td>
                                            
                                        </tr>
                                    <?php $i++;
                                    endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelapor</th>
                                            <th>Tanggal</th>
                                            <th>Kategori</th>
                                            <th>Laporan</th>
                                            <th>Status</th>
                                        </tr>
                                        
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
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
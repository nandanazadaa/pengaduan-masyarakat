<div class="page-wrapper" style="background-color:#BA9868;">

    <!-- PAGE CONTAINER-->
    <div class="page-container" style="background-color:#BA9868;">
        <div class="wrapper">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header" >
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
                                <h3 class="card-title">Data Laporan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr role="row">
                                            <th width="5%">No</th>
                                            <th>Pelapor</th>
                                            <th>Tanggal</th>
                                            <th>kategori</th>
                                            <th width='40%'>Isi</th>
                                            <th width='8%'>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Pelapor</th>
                                            <th>Tanggal</th>
                                            <th>kategori</th>
                                            <th>Isi</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $c = 0;
                                        foreach ($pengaduanaapa as $p) {
                                            $c = $c + 1; ?>
                                            <tr>
                                                <td><?= $c ?></td>
                                                <td><?= $p['nama'] ?></td>
                                                <td><?= $p['tgl_pengaduan'] ?></td>
                                                <td><?= $p['kategori'] ?></td>
                                                <td><?= $p['isi_laporan'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('Petugas/tindakan_pengaduan/') . $p['id_pengaduan'] ?>" type="submit" class="
                                                <?php if ($p['status'] == 'segera') {
                                                    echo 'btn btn-dark';
                                                } else if ($p['status'] == 'proses') {
                                                    echo 'btn btn-warning';
                                                } else {
                                                    echo 'btn btn-success';
                                                } ?> btn-sm"><?= $p['status'] ?>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
        </div>
    </div>
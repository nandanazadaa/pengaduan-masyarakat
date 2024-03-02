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
                                <h1 class="m-0">Detail Pegad</h1>
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
                        <h1 class="m-0" style="color:white;">Detail Pegaduan</h1>
                        <br>
                        <br>
                                            <!-- detail pengaduan -->
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-dark">Pengaduan</h3>
                        </div>
                        <div class="card-body">
                            <?php foreach ($pengaduan as $p) { ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="">Pelapor</label>
                                        <input type="text" class="form-control" value="<?= $p['nama'] ?>" disabled>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="">Tangal</label>
                                        <input type="text" class="form-control" value="<?= $p['tgl_pengaduan'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mt-3">
                                        <label for="">Kategori</label>
                                        <input type="text" class="form-control" value="<?= $p['kategori'] ?>" disabled>
                                    </div>
                                    <div class="col-lg-6 mt-3 mb-3">
                                        <label for="">Sub Kategori</label>
                                        <input type="text" class="form-control" value="<?= $p['sub_kategori'] ?>" disabled>
                                    </div>
                                </div>
                                <label for="">Isi Pengaduan</label>
                                <textarea type="text" class="form-control" disabled><?= $p['isi_laporan'] ?></textarea>
                            <?php } ?>
                        </div>
                    </div>



                    <div class="card shadow mb-4 mt-4">
                        <div class="card-header py-3">
                            <div class="d-flex align-item-center">
                                <div class="d-flex align-item-center">
                                    <h3 class="m-0 font-weight-bold text-dark mt-1">Data Pengaduan</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= $this->session->flashdata('tindakan') ?>
                            <?php foreach ($pengaduan as $p) { ?>
                                <a type="sumbit" class="
                                <?php
                                if ($p['status'] == 'segera') {
                                    echo 'btn  btn-sm mb-3';
                                } else if ($p['status'] == 'proses') {
                                    echo 'btn  btn-sm mb-3';
                                } else {
                                    echo '';
                                }
                                ?>
                                " data-toggle="modal" data-target="#tanggapi<?= $p['id_pengaduan'] ?>" style="color: white; background-color:#BA9868;">
                                    <?php
                                    if ($p['status'] == 'segera') {
                                        echo '<i class="fa fa-plus fa-sm"></i> Tanggapi';
                                    } else if ($p['status'] == 'proses') {
                                        echo '<i class="fa fa-plus fa-sm"></i> Tanggapi';
                                    } else {
                                        echo '';
                                    }
                                    ?>
                                </a>
                            <?php } ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr role="row">
                                            <th width="10%">No</th>
                                            <th width="20%">Tanggal</th>
                                            <th>Tanggapan</th>
                                            <th>Petugas</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Tanggapan</th>
                                            <th>Petugas</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $c = 0;
                                        foreach ($tanggapan as $t) {
                                            $c = $c + 1; ?>
                                            <tr>
                                                <td><?= $c ?></td>
                                                <td><?= $t['tgl_tanggapan'] ?></td>
                                                <td><?= $t['tanggapan'] ?></td>
                                                <td><?= $t['nama_petugas'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
                </section>

                <!-- tanggapan Modal-->
                <?php foreach ($pengaduan as $p) { ?>
                    <div class="modal fade" id="tanggapi<?= $p['id_pengaduan'] ?>" tabindex="-1" role="dialog" aria-labelledby="tanggapi" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tanggapi">Respon Tanggapan</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('Admin/add_tindakanpengaduan/') . $p['id_pengaduan'] ?>" method="post">
                                        <div class="mt-3">
                                            <label for="">Tanggal Tanggapan</label>
                                            <input type="date" name="tgl_tanggapan" id="tgl_tanggapan" class="form-control" value="<?= date('Y-m-d') ?>" disabled>
                                        </div>
                                        <div class="mt-3">
                                            <label for="">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option selected>-Pilih-</option>
                                                <option>Proses</option>
                                                <option>Selesai</option>
                                            </select>
                                        </div>
                                        <div class="mt-3">
                                            <label for="">Respon Tanggapan</label>
                                            <textarea type="text" name="tanggapan" id="tanggapan" class="form-control"></textarea>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
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
                                <h3 class="card-title">Data Masyarakat</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <?= $this->session->flashdata('masyarakat') ?>
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php $i = 1 ?>
                                    <?php foreach ($masyarakat as $mk) : ?>
                                        <tr>
                                            <th><?= $i ?></th>
                                            <td><?= $mk['nik'] ?></td>
                                            <td><?= $mk['nama'] ?></td>
                                            <td><?= $mk['no_telp'] ?></td>
                                            <td><button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $mk['id'] ?>"><i class="fa fa-edit"></i>Edit</button>
                                                    <a href="<?= base_url('Admin/ban_masyarakat/') . $mk['id'] ?>" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-ban"></i>Suspend</a>
                                                    <a href="<?= base_url('Admin/delete_masyarakat/') . $mk['id'] ?>" type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-trash" ></i>Hapus</a></td>
                                        </tr>
                                        <?php $i++;
                            endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <?php foreach ($masyarakat as $mk) { ?>
                    <div class="modal fade" id="edit<?= $mk['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="edit">Edit Data Masyarakat</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('Admin/edit_masyarakat/') . $mk['id'] ?>" method="post">
                                        <div class="row">
                                            <div class="col-lg-6 mt-3">
                                                <label for="">Nama</label>
                                                <input type="text" class="form-control" name="nama" id="nama" value="<?= $mk['nama'] ?>">

                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label for="">Username</label>
                                                <input type="text" class="form-control" name="username" id="username" value="<?= $mk['username'] ?>">
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <label for="">NIK</label>
                                            <input type="number" class="form-control" name="nik" id="nik" value="<?= $mk['nik'] ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 mt-3">
                                                <label for="">Telepon</label>
                                                <input type="number" class="form-control" name="no_telp" id="telp" value="<?= $mk['no_telp'] ?>">
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                <label for="">Password</label>
                                                <input type="password" class="form-control" name="password" id="password">
                                            </div>
                                        </div>
                                        <div class="form-check mt-3">
                                            <input class="form-check-input" type="radio" name="active" id="active">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Aktifasi Akun
                                            </label>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Update</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
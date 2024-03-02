
<div class="page-wrapper"style="background-color:#BA9868;">

<!-- PAGE CONTAINER-->
<div class="page-container"style="background-color:#BA9868;">
    <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Petugas</h1>
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
                        <h3 class="card-title">Data Petugas</h3>
                        <a type="sumbit" href="" class="btn btn-primary btn-round  btn-sm" style="margin-left: 85%;" data-toggle="modal" data-target="#tambahpetugas"><i class="fa fa-plus fa-sm"></i>Tambah Petugas</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <?= $this->session->flashdata('petugas') ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($petugas as $al) : ?>
                                <tr>
                                    <input type="hidden" name="nik" value="<? $al['username'] ?>">
                                    <input type="hidden" name="nama" value="<? $al['nama'] ?>">
                                    <input type="hidden" name="telepon" value="<? $al['no_telp'] ?>">
                                    <input type="hidden" name="status" value="<? $al['status'] ?>">
                                    <td><?= $i ?></td>
                                    <td><?= $al['username'] ?></td>
                                    <td><?= $al['nama_petugas'] ?></td>
                                    <td><?= $al['no_telp'] ?></td>
                                    <td><?= $al['level'] ?></td>
                                    <td>
                                    <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editpetugas<?=$al['id_petugas']?>"><i class="fa fa-edit"></i>Edit</button>
                                                <a href="<?=base_url('Admin/ban_petugas/').$al['id_petugas']?>" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-ban"></i>Suspend</a>
                                                <a href="<?=base_url('Admin/delete_petugas/').$al['id_petugas']?>" type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Apakah Anda Yakin?');"><i class="fa fa-trash"></i>Hapus</a>
                                    </td>
                                </tr>
                            <?php $i++;
                            endforeach ?>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>


                    <!-- TAMBAH PETUGAS-->
                <div class="modal fade" id="tambahpetugas" tabindex="-1" role="dialog" aria-labelledby="tambahpetugas" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahpetugas">Tambah Data Petugas</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('Admin/add_petugas_register')?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Telepon</label>
                                                <input type="number" class="form-control" id="telepon" name="no_telp" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Level</label>
                                                <select name="level" id="level" class="form-control">
                                                    <option selected value="">- Pilih -</option>
                                                    <option>Admin</option>
                                                    <option>Petugas</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                     <!-- EDIT PETUGAS-->
                <?php foreach($petugas as $al) { ?>
                <div class="modal fade" id="editpetugas<?=$al['id_petugas']?>" tabindex="-1" role="dialog" aria-labelledby="editpetugas" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editpetugas">Edit Data Petugas</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?=base_url('Admin/edit_petugas/').$al['id_petugas']?>" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" value="<?=$al['username']?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="<?=$al['nama_petugas']?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Telepon</label>
                                                <input type="number" class="form-control" id="telepon" name="no_telp" aria-describedby="emailHelp" value="<?=$al['no_telp']?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Level</label>
                                                <select name="level" id="level" class="form-control">
                                                    <option selected value="<?=$al['level']?>"><?=$al['level']?></option>
                                                    <option>Admin</option>
                                                    <option>Petugas</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
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
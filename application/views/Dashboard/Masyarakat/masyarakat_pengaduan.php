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
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal1"><i class="fas fa-plus"></i>Tambah</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                            <?= $this->session->flashdata('pengaduan') ?>
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
                                    <?php foreach ($joinpengaduan as $al) : ?>
                                        <tr>                     
                                            <td><?= $i ?></td>
                                            <td><?= $al['nama'] ?></td>
                                            <td><?= $al['tgl_pengaduan']; ?></td>
                                            <td><?= $al['kategori'] ?></td>
                                            <td><?= $al['isi_laporan'] ?></td>
                                            <!-- <td><img src="<?php echo base_url() . '/assets/img/' . $al['foto']; ?>" width="100"></td> -->
                                            <td>
                                            <a href="<?= base_url('Masyarakat/masyarakat_detail_pengaduan/') . $al['id_pengaduan'] ?>" class="
                                                    btn <?php if ($al['status'] == 'segera') {
                                                            echo "btn-dark";
                                                        } else if ($al['status'] == "proses") {
                                                            echo 'btn-warning';
                                                        } else {
                                                            echo 'btn-success';
                                                        } ?> btn-block btn-xs btn-sm"> <?= $al['status'] ?> </a>
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
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Ajukan Pengaduan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:#BA9868;">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?php echo base_url('Masyarakat/add_masyarakat_pengaduan') ?>" method="post" enctype="multipart/form-data">
                                                            <input type="hidden" value="<?= $user['nik'] ?>" name="nik">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">Pilih Kategori</label>
                                                                <select class="form-select form-control" name="kategori" id="kategori">
                                                                    <option selected>- Pilih -</option>
                                                                    <?php foreach ($kategori as $k) { ?>
                                                                        <option value="<?= $k['id_kategori'] ?>"><?= $k['kategori'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                            <label class="form-label">Pilih Sub Kategori</label>
                                                            <select class="form-select form-control" name="sub_kategori" id="sub_kategori">
                                                                <option selected>- Pilih -</option>
                                                            
                                                            </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Tanggal</label>
                                                                <input type="date" class="form-control" name="tgl_pengaduan" id="tgl_pengaduan" placeholder="date"
                                                                
                                                                disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Foto</label>
                                                                <input type="file" class="form-control-file" id="exampleInputPassword1" placeholder="date" name="foto">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Isi Laporan Pengaduan</label>
                                                                <textarea class="form-control" id="isi_laporan" name="isi_laporan" rows="6"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
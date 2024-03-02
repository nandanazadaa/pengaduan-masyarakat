        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block" style="background-color:#93764D;">

            <div class="logo"  style="background-color:#BA9868;">
                <a href="#">
                    <img src="<?= base_url('assets/') ?>img/logo.png" style="width: 300px; height:60px;" />
                </a>
            </div>

            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">

                        <!-- Admin -->

                            <li class="nav-header" style="color: white;">Dashboard</li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="<?= base_url('Admin/') ?>" style="color: white;">
                                    <i class="fas fa-igloo" style="color: white;"></i>Dashboard</a>
                            </li>
                            <hr style="background-color: white;">
                            <li class="nav-header" style="color: white;">Masterdata</li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="<?= base_url('Admin/admin_kategori') ?>" style="color: white;">
                                <i class="fas fa-archive" style="color: white;"></i>Kategori</a>
                            </li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="<?= base_url('Admin/admin_masyarakat') ?>" style="color: white;">
                                <i class="fas fa-users" style="color: white;"></i>Masyarakat</a>
                            </li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="<?= base_url('Admin/admin_petugas') ?>" style="color: white;">
                                <i class="fas fa-user-edit" style="color:white;"></i>Petugas</a>
                            </li>
                            <hr style="background-color: white;">
                            <li class="nav-header" style="color: white;">Pengaduan</li>
                            <li class="active has-sub">
                                <a class="js-arrow" href="<?= base_url('Admin/admin_detail') ?>" style="color: white;">
                                <i class="fas fa-book" style="color: white;"></i>Pengaduan</a>
                            </li>
                            <hr style="background-color: white;">
                            <li class="active has-sub">
                                <a class="js-arrow" href="<?= base_url('Auth/admin_logout') ?>" style="color: white;">
                                    <i class="fas fa-sign-out-alt" style="color: white;"></i>Logout</a>
                            </li>
                        
                        <!-- End Admin -->
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- END MENU SIDEBAR-->
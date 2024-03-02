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

                        <!-- Masyarakat -->
                        
                            <li class="active has-sub">
                                <a class="js-arrow" href="<?= base_url('Masyarakat/') ?>" style="color: white;">
                                    <i class="fas fa-igloo" style="color: white;"></i>Dashboard</a>
                            </li>
                            <hr style="background-color: white;">
                            <li class="active has-sub">
                                <a class="js-arrow" href="<?= base_url('Masyarakat/masyarakat_pengaduan') ?>" style="color: white;">
                                    <i class="fas fa-clipboard" style="color: white;"></i>Pengaduan</a>
                            </li>
                            <hr style="background-color: white;">
                            <li class="active has-sub">
                                <a class="js-arrow" href="<?= base_url('Auth/logout') ?>" style="color: white;">
                                    <i class="fas fa-sign-out-alt" style="color: white;"></i>Logout</a>
                            </li>
                        

                        <!-- End Masyarakat -->
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- END MENU SIDEBAR-->
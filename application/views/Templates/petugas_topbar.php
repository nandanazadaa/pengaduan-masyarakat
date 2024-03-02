            <!-- HEADER DESKTOP-->
            <header class="header-desktop"  style="background-color:#93764D;;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">                               
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                              
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?= base_url('assets/')?>img/propil.png"  />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#" style="color:white;"><?= $user['username']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?= base_url('assets/')?>img/propil.png" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?= $user['username']; ?></a>
                                                    </h5>
                                                    <span class="email">Telepon : <?= $user['no_telp']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?= base_url('Petugas/petugas_profile')?>">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>  
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?= base_url('auth/admin_logout')?>">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
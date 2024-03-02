        <!-- PAGE CONTAINER-->
        <div class="page-container" style="background-color:#BA9868;">
          <!-- MAIN CONTENT-->
          <div class="main-content">
            <div class="section__content section__content--p30">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-12">
                    <div class="overview-wrap">
                      <h2 class="title-1" style="color: white;">Dashboard</h2>
                    </div>
                  </div>
                </div>
                <div class="row m-t-25">
                  <div class="col-sm-6 col-lg-4">
                    <div class="overview-item " style="background: linear-gradient(0deg, rgba(220,202,172,1) 0%, rgba(134,102,61,1) 31%, rgba(134,102,61,1) 90%);">
                      <div class="overview__inner">
                        <div class="overview-box clearfix">
                          <div class="icon">
                            <i class="fas fa-clipboard"></i>
                          </div>
                          <div class="text">
                            <h2>Pengaduan</h2>
                            <h1 style="color: white;"><?= $bar_graph['jumlah_pengaduan'] ?></h1>
                          </div>
                        </div>
                        <div class="overview-chart">
                          <canvas id=""></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-4">
                    <div class="overview-item " style="background: linear-gradient(0deg, rgba(220,202,172,1) 0%, rgba(134,102,61,1) 31%, rgba(134,102,61,1) 90%);">
                      <div class="overview__inner">
                        <div class="overview-box clearfix">
                          <div class="icon">
                            <i class="fas fa-clock"></i>
                          </div>
                          <div class="text">
                            <h2>Proses</h2>
                            <h1 style="color: white;"><?= $bar_graph['jumlah_proses'] ?></h1>
                          </div>
                        </div>
                        <div class="overview-chart">
                          <canvas id=""></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-lg-4">
                    <div class="overview-item   " style="background: linear-gradient(0deg, rgba(220,202,172,1) 0%, rgba(134,102,61,1) 31%, rgba(134,102,61,1) 90%); ">
                      <div class="overview__inner">
                        <div class="overview-box clearfix">
                          <div class="icon">
                            <i class="fas fa-clipboard-check"></i>
                          </div>
                          <div class="text">
                            <h2>Selesai</h2>
                            <h1 style="color: white;"><?= $bar_graph['jumlah_selesai'] ?></h1>
                          </div>
                        </div>
                        <div class="overview-chart">
                          <canvas id=""></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
        </div>
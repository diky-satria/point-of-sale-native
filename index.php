<?php 
  
  session_start();
  include 'koneksi.php';
  include 'kodepj.php';

  $kodepj = $kodes;

  if(!isset($_SESSION['pengguna'])){
    header('location:login.php');
  }

 ?>

 <?php include 'header.php'; ?>
  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php 

    $pengguna = $_SESSION['pengguna'];

   ?>

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-cart-arrow-down"></i>
        </div>
        <div class="sidebar-brand-text mx-3">POS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <?php 

        if($_SESSION['pengguna']['role'] == 'admin'){

       ?>

      <!-- Heading -->
      <div class="sidebar-heading">
        <span>admin</span>
      </div>  

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=dashboard">
          <i class="fas fa-fw fa-user"></i>
          <span>dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <?php } ?>


      <!-- Heading -->
      <div class="sidebar-heading">
        <span>Kasir</span>
      </div> 

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=barang">
          <i class="fas fa-fw fa-user"></i>
          <span>barang</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=pengguna">
          <i class="fas fa-fw fa-user"></i>
          <span>pengguna</span></a>
      </li>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php?halaman=penjualan&kodepj=<?php echo $kodepj ?>">
          <i class="fas fa-fw fa-user"></i>
          <span>penjualan</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#laporan">
          <i class="fas fa-fw fa-user"></i>
          <span>laporan</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="" data-toggle="modal" data-target="#logout">
          <i class="fas fa-fw fa-table"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $pengguna['nama'] ?></span>
                <img class="img-profile rounded-circle" src="fotoPengguna/<?php echo $pengguna['foto'] ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?halaman=profil">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- <pre>
             <?php //print_r($_SESSION['pengguna']); ?>
            </pre> -->

            <?php 

              if(isset($_GET['halaman'])){
                if($_GET['halaman'] == 'dashboard'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'dashboard.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'barang'){
                  include 'barang.php';
                }
                if($_GET['halaman'] == 'pengguna'){
                  include 'pengguna.php';
                }
                if($_GET['halaman'] == 'penjualan'){
                  include 'penjualan.php';
                }
                if($_GET['halaman'] == 'laporan'){
                  include 'laporan.php';
                }
                if($_GET['halaman'] == 'tambahBarang'){
                  include 'tambahBarang.php';
                }
                if($_GET['halaman'] == 'ubahBarang'){
                  include 'ubahBarang.php';
                }
                if($_GET['halaman'] == 'hapusBarang'){
                  include 'hapusBarang.php';
                }
                if($_GET['halaman'] == 'tambahPengguna'){
                  include 'tambahPengguna.php';
                }
                if($_GET['halaman'] == 'ubahPengguna'){
                  include 'ubahPengguna.php';
                }
                if($_GET['halaman'] == 'hapusPengguna'){
                  include 'hapusPengguna.php';
                }
                if($_GET['halaman'] == 'profil'){
                  include 'profil.php';
                }
                if($_GET['halaman'] == 'hapusPembelian'){
                  include 'hapusPembelian.php';
                }
                if($_GET['halaman'] == 'pembelian'){
                  include 'pembelian.php';
                }
                if($_GET['halaman'] == 'tambah_penjualan'){
                  include 'tambah_penjualan.php';
                }
                if($_GET['halaman'] == 'kurang_penjualan'){
                  include 'kurang_penjualan.php';
                }
              }

             ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

 <?php 

    include 'footer.php';

  ?> 
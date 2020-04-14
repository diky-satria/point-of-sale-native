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

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Barang</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?halaman=cek_barang">Cek Barang</a>
            <a class="collapse-item" href="index.php?halaman=barang_masuk">Barang Masuk</a>
            <a class="collapse-item" href="index.php?halaman=riwayat_barang_masuk">Riwayat Barang Masuk</a>
          </div>
        </div>
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
                if($_GET['halaman'] == 'admin_pengguna'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'admin_pengguna.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'ubahPengguna'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'ubahPengguna.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'hapusPengguna'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'hapusPengguna.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'tambahPengguna'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'tambahPengguna.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'penjualan_collapse'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'penjualan_collapse.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'kembalikan_collapse'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'kembalikan_collapse.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'supplier'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'supplier.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'tambah_supplier'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'tambah_supplier.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'hapus_supplier'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'hapus_supplier.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'ubah_supplier'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'ubah_supplier.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'diskon'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'diskon.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'admin_barang'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'admin_barang.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'tambahBarang'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'tambahBarang.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'ubahBarang'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'ubahBarang.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'hapusBarang'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'hapusBarang.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'admin_barang_masuk'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'admin_barang_masuk.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'ubah_barang_masuk'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'ubah_barang_masuk.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'konfirmasi_barang_masuk'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'konfirmasi_barang_masuk.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'barang_masuk_terkonfirmasi'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'barang_masuk_terkonfirmasi.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'hapus_barang_masuk_terkonfirmasi'){
                  if($_SESSION['pengguna']['role'] == 'admin'){
                    include 'hapus_barang_masuk_terkonfirmasi.php';  
                  }else{
                    include 'penjualan.php';
                  }
                }
                if($_GET['halaman'] == 'barang_masuk'){
                  include 'barang_masuk.php';
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
                if($_GET['halaman'] == 'cek_barang'){
                  include 'cek_barang.php';
                }
                if($_GET['halaman'] == 'riwayat_barang_masuk'){
                  include 'riwayat_barang_masuk.php';
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
<?php 

	if($_SESSION['pengguna']['role'] != 'admin'){
		header('location:index.php?halaman=penjualan');
	}

	// penjualan hari ini
	$date = date('Y-m-d');
	$penjualan_hari_ini = 0;
	$sql_penjualan_hari_ini = $koneksi->query("SELECT * FROM pembelian WHERE tanggal_pembelian = '$date'");
	while($data_penjualan_hari_ini = $sql_penjualan_hari_ini->fetch_assoc()){

		$penjualan_hari_ini = $penjualan_hari_ini + $data_penjualan_hari_ini['subtotal'];

	}

	// jumlah pengguna dan crud
	$sql_pengguna = $koneksi->query("SELECT * FROM pengguna");
	$data_pengguna = $sql_pengguna->num_rows;

	//penjualan collapse
	$sql_collapse = $koneksi->query("SELECT * FROM penjualan WHERE status = 'collapse'");
	$data_collapse = $sql_collapse->num_rows;

	//supplier
	$sql_supplier = $koneksi->query("SELECT * FROM supplier");
	$data_supplier = $sql_supplier->num_rows;

	//diskon
	$sql_diskon = $koneksi->query("SELECT * FROM diskon WHERE id_diskon = 1");
	$data_diskon = $sql_diskon->fetch_assoc();

	//barang 
	$sql_barang = $koneksi->query("SELECT * FROM barang");
	$data_barang = $sql_barang->num_rows;

	//barang_masuk
	$sql_barang_masuk = $koneksi->query("SELECT * FROM barang_masuk WHERE status='masuk'");
	$data_barang_masuk = $sql_barang_masuk->num_rows;

	//barang_masuk_terkonfirmasi
	$barang_masuk_terkonfirmasi = $koneksi->query("SELECT * FROM barang_masuk WHERE status='terkonfirmasi'");
	$data_barang_masuk_terkonfirmasi = $barang_masuk_terkonfirmasi->num_rows;

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Dashboard</h4>

<!-- Content Row -->
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
	  <div class="card border-left-secondary shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Penjualan Hari Ini</div>
	          <div class="h3 mb-0 font-weight-bold text-gray-800">Rp. <?php echo number_format($penjualan_hari_ini) ?></div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-comments-dollar fa-2x text-gray-300"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
	  <a href="index.php?halaman=admin_barang" style="text-decoration:none;">
	  <div class="card border-left-secondary shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Barang</div>
	          <div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo $data_barang ?></div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-calendar fa-2x text-gray-300"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	  </a>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
	  <a href="index.php?halaman=admin_pengguna" style="text-decoration:none;">
	  <div class="card border-left-secondary shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Pengguna</div>
	          <div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo $data_pengguna ?></div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-users fa-2x text-gray-300"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	  </a>
	</div>


	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
	<a href="index.php?halaman=supplier" style="text-decoration:none;">
	  <div class="card border-left-secondary shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Supplier</div>
	          <div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo $data_supplier ?></div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-truck-moving fa-2x text-gray-300"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	</a>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
	<a href="index.php?halaman=penjualan_collapse" style="text-decoration:none;">
	  <div class="card border-left-danger shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Penjualan Collapse</div>
	          <div class="h3 mb-0 font-weight-bold text-danger"><?php echo $data_collapse ?></div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-recycle fa-2x text-gray-300"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	</a>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
	<a href="index.php?halaman=diskon" style="text-decoration:none;">
	  <div class="card border-left-secondary shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Diskon</div>
	          <div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo $data_diskon['diskon'] ?>%</div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-percent fa-2x text-gray-300"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	</a>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
	<a href="index.php?halaman=admin_barang_masuk" style="text-decoration:none;">
	  <div class="card border-left-secondary shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Barang Masuk</div>
	          <div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo $data_barang_masuk ?></div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-dolly fa-2x text-gray-300"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	</a>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
	<a href="index.php?halaman=barang_masuk_terkonfirmasi" style="text-decoration:none;">
	  <div class="card border-left-secondary shadow h-100 py-2">
	    <div class="card-body">
	      <div class="row no-gutters align-items-center">
	        <div class="col mr-2">
	          <div class="text-xs font-weight-bold text-gray-800 text-uppercase mb-1">Riwayat Barang Masuk </div>
	          <div class="h3 mb-0 font-weight-bold text-gray-800"><?php echo $data_barang_masuk_terkonfirmasi; ?></div>
	        </div>
	        <div class="col-auto">
	          <i class="fas fa-history fa-2x text-gray-300"></i>
	        </div>
	      </div>
	    </div>
	  </div>
	</a>
	</div>

</div>
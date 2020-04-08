<?php 

	if($_SESSION['pengguna']['role'] != 'admin'){
		header('location:index.php?halaman=penjualan');
	}


 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Dashboard</h4>
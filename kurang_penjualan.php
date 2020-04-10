<?php 

	$kode_penjualan = $_GET['kode_penjualan'];
	$kode_barcode = $_GET['kode_barcode'];
	$id = $_GET['id'];

	$sql_get = $koneksi->query("SELECT * FROM penjualan 
								JOIN barang ON penjualan.kode_barcode=barang.kode_barcode
								WHERE penjualan.id_penjualan_barang='$id'");
	$data = $sql_get->fetch_assoc();
	$nama = $data['nama_barang'];
	$jumlah = $data['jumlah'];

	if($jumlah <= 1){
		?>

		<script type="text/javascript">
		alert('Barang yang ingin dibeli tidak boleh kosong');
		window.location.href="index.php?halaman=penjualan&kodepj=<?php echo $kode_penjualan ?>";
		</script>

		<?php
	}else{

		$sql = $koneksi->query("UPDATE penjualan SET jumlah=(jumlah-1) WHERE id_penjualan_barang='$id'");
		$sql3 = $koneksi->query("UPDATE penjualan SET total=(jumlah*harga) WHERE id_penjualan_barang='$id'");
		$sql_barang = $koneksi->query("UPDATE barang SET stok=(stok+1) WHERE kode_barcode='$kode_barcode'");
		
		?>

		<script type="text/javascript">
		alert('<?php echo $nama ?> berhasil dikurangkan');
		window.location.href="index.php?halaman=penjualan&kodepj=<?php echo $kode_penjualan ?>";
		</script>

		<?php
		
	}

 ?>
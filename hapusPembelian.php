<?php 

	include 'koneksi.php';

	$id = $_GET['id'];
	$barcode = $_GET['barcode'];
	$kodepj = $_GET['kodepj'];

	$koneksi->query("DELETE FROM penjualan_barang WHERE kode_penjualan = '$kodepj' AND kode_barcode = '$barcode'");
	?>
	<script type="text/javascript">
	alert('Barang berhasil dihapus');
	window.location.href="index.php?halaman=penjualan&kodepj=<?php echo $kodepj ?>";
	</script>
	<?php

 ?>
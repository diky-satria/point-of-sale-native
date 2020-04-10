<?php 

	include 'koneksi.php';

	$id = $_GET['id'];
	$barcode = $_GET['barcode'];
	$kodepj = $_GET['kodepj'];
	$jumlah = $_GET['jumlah'];

	$sql2 = $koneksi->query("UPDATE barang SET stok=(stok+$jumlah) WHERE kode_barcode='$barcode'");
	$sql= $koneksi->query("DELETE FROM penjualan WHERE id_penjualan_barang = '$id'");

	if($sql2 || $sql){

	?>

	<script type="text/javascript">
	window.location.href="index.php?halaman=penjualan&kodepj=<?php echo $kodepj; ?>";
	</script>

	<?php
}
 ?>
<?php 

	$id = $_GET['id'];
	$jumlah = $_GET['jumlah'];
	$barcode = $_GET['barcode'];

	$sql = $koneksi->query("UPDATE barang SET stok=(stok+$jumlah) WHERE kode_barcode='$barcode'");

	$sql2 = $koneksi->query("DELETE FROM penjualan WHERE id_penjualan_barang = '$id'");

	if($sql || $sql2){

	?>

	<script type="text/javascript">
	window.location.href="index.php?halaman=penjualan_collapse";
	</script>

	<?php
}
 ?>
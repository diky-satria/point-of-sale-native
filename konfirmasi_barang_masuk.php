<?php 

	$id = $_GET['id'];
	$jumlah = $_GET['jumlah'];
	$kode = $_GET['kode'];

	$sql = $koneksi->query("UPDATE barang SET stok=(stok+$jumlah) WHERE kode_barcode='$kode'");
	$sql2 = $koneksi->query("UPDATE barang_masuk SET status='terkonfirmasi' WHERE id_barang_masuk='$id'");

	if($sql || $sql2){
		?>

		<script type="text/javascript">
		alert('Berhasil konfirmasi');
		window.location.href="index.php?halaman=admin_barang_masuk";
		</script>

		<?php
	}

 ?>
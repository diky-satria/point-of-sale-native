<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("DELETE FROM barang WHERE id_barang = '$id'");

	if($sql){
		?>

		<script type="text/javascript">
		alert('Data barang berhasil dihapus');
		window.location.href="index.php?halaman=admin_barang";
		</script>

		<?php
	}else{
		?>

		<script type="text/javascript">
		alert('Data barang gagal dihapus');
		window.location.href="index.php?halaman=admin_barang";
		</script>

		<?php
	}

 ?>
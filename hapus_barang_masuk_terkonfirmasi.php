<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("DELETE FROM barang_masuk WHERE id_barang_masuk='$id'");

	if($sql){
		?>

		<script type="text/javascript">
		alert('Berhasil menghapus');
		window.location.href="index.php?halaman=barang_masuk_terkonfirmasi";
		</script>

		<?php
	}

 ?>
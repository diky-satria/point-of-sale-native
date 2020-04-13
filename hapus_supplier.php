<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("DELETE FROM supplier WHERE id_supplier = '$id'");

	if($sql){
		?>

		<script type="text/javascript">
		alert('Supplier berhasil dihapus');
		window.location.href="index.php?halaman=supplier";
		</script>

		<?php
	}

 ?>
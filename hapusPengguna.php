<?php 

	$id = $_GET['id'];

	$sql = $koneksi->query("DELETE FROM pengguna WHERE id_pengguna = '$id'");

	if($sql){
		?>
		<script type="text/javascript">
		alert('pengguna berhasil dihapus');
		window.location.href="index.php?halaman=admin_pengguna";
		</script>
		<?php 
	}else{
		?>
		<script type="text/javascript">
		alert('pengguna gagal dihapus');
		window.location.href="index.php?halaman=admin_pengguna";
		</script>
		<?php 
	}

 ?>
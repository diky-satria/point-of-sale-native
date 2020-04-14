<?php 

	$sql = $koneksi->query("SELECT * FROM diskon WHERE id_diskon = 1");
	$data = $sql->fetch_assoc();

 ?>
<div class="row">
	<div class="col-md-2">
		<!-- Page Heading -->
		<h4 class="mb-4 text-gray-800 float-left">Diskon</h4>
	</div>
	<div class="col-md-2">
		<a href="index.php?halaman=dashboard" class="btn btn-sm btn-dark mb-3 float-right">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<form method="post">
					<div class="form-group">
						<label>Diskon</label>
						<input type="number" min="0" name="diskon" value="<?php echo $data['diskon'] ?>" class="form-control">
					</div>			
					<button type="submit" name="ubah" class="btn btn-sm btn-success btn-block">ubah</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 

	if(isset($_POST['ubah'])){

		$diskon = $_POST['diskon'];

		$sql_ubah = $koneksi->query("UPDATE diskon SET diskon='$diskon' WHERE id_diskon=1");

		if($sql_ubah){
			?>

			<script type="text/javascript">
			alert("Diskon diubah");
			window.location.href="index.php?halaman=dashboard";
			</script>

			<?php
		}

	}

 ?>
<?php 
	
	include 'koneksi.php';
	$id = $_GET['id'];

	$sql_supplier = $koneksi->query("SELECT * FROM supplier WHERE id_supplier = '$id'");
	$data_sup = $sql_supplier->fetch_assoc();

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Ubah Supplier</h4>

<div class="row">
	<div class="col-md">

		<a href="index.php?halaman=supplier" class="btn btn-sm btn-dark mb-3">Kembali</a>

		<div class="card">
		  <div class="card-body">

		  	<form method="post">
			  	<div class="row">
				  <div class="col-md">
					  <div class="form-group">
					  	<label>Nama</label>
					  	<input type="text" name="nama" class="form-control" value="<?php echo $data_sup['nama_supplier'] ?>" required>
					  </div>
					  <div class="form-group">
					  	<label>Email</label>
					  	<input type="text" name="email" class="form-control" value="<?php echo $data_sup['email_supplier'] ?>" required>
					  </div>
					  <div class="form-group">
					  	<label>Telepon</label>
					  	<input type="text" name="telepon" class="form-control" value="<?php echo $data_sup['telepon_supplier'] ?>" required>
					  </div>
					  <div class="form-group">
					  	<label>Alamat</label>
					  	<textarea class="form-control" name="alamat" required rows="3"><?php echo $data_sup['alamat_supplier'] ?></textarea>
					  </div>
				   </div>
			    </div>
			    <div class="row">
			    	<div class="col-md">
			    		<button type="submit" name="ubah" class="btn btn-block btn-sm btn-primary">ubah</button>
			    	</div>
			    </div>
		 	 </form>

		  </div>
		</div>	
	</div>
</div>
<?php 

	if(isset($_POST['ubah'])){

		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$telepon = $_POST['telepon'];
		$alamat = $_POST['alamat'];

		$sql = $koneksi->query("UPDATE supplier SET nama_supplier='$nama', email_supplier='$email', alamat_supplier='$alamat', telepon_supplier='$telepon' WHERE id_supplier = '$id'");

		if($sql){
			?>

			<script type="text/javascript">
			alert('Supplier berhasil diubah');
			window.location.href="index.php?halaman=supplier";
			</script>

			<?php
		}

	}

 ?>
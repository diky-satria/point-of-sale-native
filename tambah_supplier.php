<?php 
	
	include 'koneksi.php';

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Tambah Supplier</h4>

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
					  	<input type="text" name="nama" class="form-control" required>
					  </div>
					  <div class="form-group">
					  	<label>Email</label>
					  	<input type="text" name="email" class="form-control" required>
					  </div>
					  <div class="form-group">
					  	<label>Telepon</label>
					  	<input type="text" name="telepon" class="form-control" required>
					  </div>
					  <div class="form-group">
					  	<label>Alamat</label>
					  	<textarea class="form-control" name="alamat" required rows="3"></textarea>
					  </div>
				   </div>
			    </div>
			    <div class="row">
			    	<div class="col-md">
			    		<button type="submit" name="tambah" class="btn btn-block btn-sm btn-primary">Tambah</button>
			    	</div>
			    </div>
		 	 </form>

		  </div>
		</div>	
	</div>
</div>
<?php 

	if(isset($_POST['tambah'])){

		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$telepon = $_POST['telepon'];
		$alamat = $_POST['alamat'];
		$date = date('Y-m-d');

		$sql = $koneksi->query("INSERT INTO supplier (nama_supplier, email_supplier, alamat_supplier, telepon_supplier, tanggal_daftar) VALUES ('$nama', '$email', '$alamat', '$telepon', '$date')");

		if($sql){
			?>

			<script type="text/javascript">
			alert('Supplier berhasil ditambahkan');
			window.location.href="index.php?halaman=supplier";
			</script>

			<?php
		}

	}

 ?>
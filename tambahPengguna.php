<?php 
	
	include 'koneksi.php';

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Tambah Pengguna</h4>

<div class="row">
	<div class="col-md">

		<a href="index.php?halaman=pengguna" class="btn btn-sm btn-dark mb-3">Kembali</a>

		<div class="card">
		  <div class="card-body">

		  	<form method="post" enctype="multipart/form-data">
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
					  	<label>Password</label>
					  	<input type="password" name="password" class="form-control" required>
					  </div>
					  <div class="form-group">
					  	<label>Role</label>
					  	<select class="form-control" name="role" required>
					  		<option disabled selected>-- PILIH --</option>
					  		<option value="admin">Admin</option>
					  		<option value="kasir">Kasir</option>
					  	</select>
					  </div>
					  <div class="form-group">
					  	<label>Foto</label>
					  	<input type="file" name="foto" class="form-control">
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
		$password = $_POST['password'];
		$role = $_POST['role'];
		$date = date('Y-m-d');

		$foto = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];

		move_uploaded_file($lokasi, 'fotoPengguna/'.$foto);

		if($foto){

			$sql = $koneksi->query("INSERT INTO pengguna (nama, email, password, role, foto, tanggal_daftar) VALUES ('$nama', '$email', '$password', '$role', '$foto', '$date')");

			?>

			<script type="text/javascript">
			alert('Pengguna berhasil ditambahkan');
			window.location.href="index.php?halaman=pengguna";
			</script>

			<?php
			
		}else{

			$sql = $koneksi->query("INSERT INTO pengguna (nama, email, password, role, foto, tanggal_daftar) VALUES ('$nama', '$email', '$password', '$role', 'dadu.png', '$date')");

			?>

			<script type="text/javascript">
			alert('Pengguna berhasil ditambahkan');
			window.location.href="index.php?halaman=pengguna";
			</script>

			<?php

		}


	}

 ?>
<?php 
	
	include 'koneksi.php';
	$id = $_GET['id'];
	$sql = $koneksi->query("SELECT * FROM pengguna WHERE id_pengguna = '$id'");
	$data = $sql->fetch_assoc();
	$role = $data['role'];

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Ubah Pengguna</h4>

<div class="row">
	<div class="col-md">

		<a href="index.php?halaman=admin_pengguna" class="btn btn-sm btn-dark mb-3">Kembali</a>

		<div class="card">
		  <div class="card-body">

		  	<form method="post" enctype="multipart/form-data">
			  	<div class="row">
				  <div class="col-md">
				  	<div class="form-group">
					  	<label>Nama</label>
					  	<input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>" required>
					  </div>
					  <div class="form-group">
					  	<label>Email</label>
					  	<input type="text" name="email" class="form-control" value="<?php echo $data['email'] ?>" required readonly>
					  </div>
					  <div class="form-group">
					  	<label>Role</label>
					  	<select class="form-control" name="role" required>
					  		<option disabled selected>-- PILIH --</option>
					  		<option value="admin" <?php if($role == 'admin'){ echo 'selected'; } ?>>Admin</option>
					  		<option value="kasir" <?php if($role == 'kasir'){ echo 'selected'; } ?> >Kasir</option>
					  	</select>
					  </div>
					  <div class="form-group">
					  	<img src="fotoPengguna/<?php echo $data['foto'] ?>" width="80">
					  </div>
					  <div class="form-group">
					  	<label>Ubah Foto</label>
					  	<input type="file" name="foto" class="form-control">
					  </div>
				   </div>
			    </div>
			    <div class="row">
			    	<div class="col-md">
			    		<button type="submit" name="ubah" class="btn btn-block btn-sm btn-primary">Ubah</button>
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
		$role = $_POST['role'];

		$foto = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];

		move_uploaded_file($lokasi, 'fotoPengguna/'.$foto);

		$foto_lama = $data['foto'];



		if($foto){

			$sql2 = $koneksi->query("UPDATE pengguna SET nama='$nama', role='$role', foto='$foto' WHERE id_pengguna = '$id'");

			if($foto_lama != 'dadu.png'){
				unlink('fotoPengguna/'.$foto_lama);

			}
			?>

			<script type="text/javascript">
			alert('pengguna berhasil diubah');
			window.location.href="index.php?halaman=admin_pengguna";
			</script>

			<?php
		}else{

			$sql2 = $koneksi->query("UPDATE pengguna SET nama='$nama', role='$role' WHERE id_pengguna = '$id'");

			?>

			<script type="text/javascript">
			alert('pengguna berhasil diubah');
			window.location.href="index.php?halaman=admin_pengguna";
			</script>

			<?php

		}

	}

 ?>
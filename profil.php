<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Profil</h4>

<div class="card">
	
	<div class="card-body">
		<div class="row">
			<div class="col-md-3">
				<img src="fotoPengguna/<?php echo $pengguna['foto'] ?>" class="img-thumbnail">
			</div>
			<div class="col-md-9">
				<table class="table">
					<tbody>
						<tr>
							<th>Nama</th>
							<td>:</td>
							<td><?php echo $pengguna['nama'] ?></td>
						</tr>
						<tr>
							<th>Email</th>
							<td>:</td>
							<td><?php echo $pengguna['email'] ?></td>
						</tr>
						<tr>
							<th>Tanggal Terdaftar</th>
							<td>:</td>
							<td><?php echo date('Y-M-d', strtotime($pengguna['tanggal_daftar'])) ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<form method="post" enctype="multipart/form-data">
		<div class="row mt-1">
			<div class="col-md-3">
				<input type="file" name="foto" class="form-control">
			</div>
			<div class="col-md-9"></div>
		</div>
		<div class="row mt-1">
			<div class="col-md-3">
				<button type="submit" name="ubah" class="btn btn-sm btn-primary btn-block" name="lanjutkan">Lanjutkan</button>
			</div>
			<div class="col-md-9"></div>
		</div>
	</form>
	</div>
</div>	

<?php 

	if(isset($_POST['ubah'])){

		$foto = $_FILES['foto']['name'];
		$lokasi = $_FILES['foto']['tmp_name'];

		$foto_lama = $pengguna['foto'];
		$id_pengguna = $pengguna['id_pengguna'];

		move_uploaded_file($lokasi, 'fotoPengguna/'.$foto);
			

		if($foto){

			$koneksi->query("UPDATE pengguna SET foto='$foto' WHERE id_pengguna='$id_pengguna'");
			
			if($foto_lama != 'dadu.png'){
				unlink('fotoPengguna/'.$foto_lama);
			}

		?>

		<script type="text/javascript">
		alert('profil berhasil diubah');
		window.location.href="index.php?halaman=penjualan";
		</script>

		<?php

			
	}
}

 ?>
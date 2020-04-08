<?php 
	
	include 'koneksi.php';

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Tambah Barang</h4>

<div class="row">
	<div class="col-md">

		<a href="index.php?halaman=barang" class="btn btn-sm btn-dark mb-3">Kembali</a>

		<div class="card">
		  <div class="card-body">

		  	<form method="post">
			  	<div class="row">
				  <div class="col-md-6">
				  	<div class="form-group">
					  	<label>Kode Barcode</label>
					  	<input type="text" name="barcode" class="form-control" required>
					  </div>
					  <div class="form-group">
					  	<label>Nama Barang</label>
					  	<input type="text" name="nama_barang" class="form-control" required>
					  </div>
					  <div class="form-group">
					  	<label>Satuan</label>
					  	<select class="form-control" name="satuan" required>
					  		<option disabled selected>-- PILIH --</option>
					  		<option value="pack">Pack</option>
					  		<option value="pcs">Pcs</option>
					  		<option value="lusin">Lusin</option>
					  	</select>
					  </div>
					  <div class="form-group">
					  	<label>Stok</label>
					  	<input type="number" name="stok" class="form-control" required>
					  </div>
				   </div>
			    	<div class="col-md-6">
			    		<div class="form-group">
						  	<label>Harga Beli</label>
						  	<input type="number" onkeyup="sum()" id="harga_beli" name="harga_beli" class="form-control" required>
						  </div>
						  <div class="form-group">
						  	<label>Harga Jual</label>
						  	<input type="number" onkeyup="sum()" id="harga_jual" name="harga_jual" class="form-control" required>
						  </div>
						  <div class="form-group">
						  	<label>Untung</label>
						  	<input type="number" value="0" id="untung" name="untung" class="form-control" readonly>
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

		$barcode = $_POST['barcode'];
		$nama_barang = $_POST['nama_barang'];
		$satuan = $_POST['satuan'];
		$stok = $_POST['stok'];
		$harga_beli = $_POST['harga_beli'];
		$harga_jual = $_POST['harga_jual'];
		$untung = $_POST['untung'];

		$sql = $koneksi->query("INSERT INTO barang (kode_barcode, nama_barang, satuan, stok, harga_beli, harga_jual, untung) VALUES ('$barcode','$nama_barang','$satuan','$stok','$harga_beli','$harga_jual','$untung')");

		if($sql){
			?>

			<script type="text/javascript">
			alert('Barang berhasil ditambahkan');
			window.location.href="index.php?halaman=barang";
			</script>

			<?php
		}else{
			?>

			<script type="text/javascript">
			alert('Barang gagal ditambahkan');
			window.location.href="index.php?halaman=tambahBarang";
			</script>

			<?php
		}

	}

 ?>
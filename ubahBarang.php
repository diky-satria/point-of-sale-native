<?php 
	
	include 'koneksi.php';
	$id = $_GET['id'];

	$get = $koneksi->query("SELECT * FROM barang JOIN supplier ON 
							barang.supplier=supplier.id_supplier WHERE id_barang = '$id'");
	$data = $get->fetch_assoc();

	$satuan = $data['satuan'];
	$supplier = $data['supplier'];

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Ubah Barang</h4>

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
					  	<input type="text" name="barcode" class="form-control" value="<?php echo $data['kode_barcode'] ?>" required>
					  </div>
					  <div class="form-group">
					  	<label>Nama Barang</label>
					  	<input type="text" name="nama_barang" class="form-control" value="<?php echo $data['nama_barang'] ?>" required>
					  </div>
					  <div class="form-group">
					  	<label>Satuan</label>
					  	<select class="form-control" name="satuan" required>
					  		<option disabled selected>-- PILIH --</option>
					  		<option value="pack" <?php if($satuan == 'pack'){ echo 'selected'; } ?>>Pack</option>
					  		<option value="pcs" <?php if($satuan == 'pcs'){ echo 'selected'; } ?>>Pcs</option>
					  		<option value="lusin" <?php if($satuan == 'lusin'){ echo 'selected'; } ?>>Lusin</option>
					  	</select>
					  </div>
					  <div class="form-group">
					  	<label>Stok</label>
					  	<input type="number" name="stok" class="form-control" value="<?php echo $data['stok'] ?>" required>
					  </div>
				   </div>
			    	<div class="col-md-6">
			    		<div class="form-group">
					  	<label>Supplier</label>
					  	<select class="form-control" name="supplier" required>
					  		<option disabled selected>-- PILIH --</option>
					  		<?php 
					  			$sql_supplier = $koneksi->query("SELECT * FROM supplier");
					  			while($data_supplier = $sql_supplier->fetch_assoc()){
					  		 ?>
					  		<option value="<?php echo $data_supplier['id_supplier'] ?>" <?php if($supplier == $data_supplier['id_supplier']){ echo 'selected'; } ?>><?php echo $data_supplier['nama_supplier'] ?></option>
					  		<?php } ?>
					  	</select>
					  </div>
			    		<div class="form-group">
						  	<label>Harga Beli</label>
						  	<input type="number" onkeyup="sum()" id="harga_beli" name="harga_beli" class="form-control" value="<?php echo $data['harga_beli'] ?>" required>
						  </div>
						  <div class="form-group">
						  	<label>Harga Jual</label>
						  	<input type="number" onkeyup="sum()" id="harga_jual" name="harga_jual" class="form-control" value="<?php echo $data['harga_jual'] ?>" required>
						  </div>
						  <div class="form-group">
						  	<label>Untung</label>
						  	<input type="number"  value="<?php echo $data['untung'] ?>" id="untung" name="untung" class="form-control" readonly>
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

	$barcode = $_POST['barcode'];
	$nama_barang = $_POST['nama_barang'];
	$satuan = $_POST['satuan'];
	$stok = $_POST['stok'];
	$harga_beli = $_POST['harga_beli'];
	$harga_jual = $_POST['harga_jual'];
	$untung = $_POST['untung'];
	$supplier = $_POST['supplier'];

	$sql = $koneksi->query("UPDATE barang SET kode_barcode='$barcode', nama_barang='$nama_barang', satuan='$satuan', stok='$stok', supplier='$supplier', harga_beli='$harga_beli', harga_jual='$harga_jual', untung='$untung' WHERE id_barang = '$id'");

	if($sql){
		?>

		<script type="text/javascript">
		alert('Barang berhasil diubah');
		window.location.href="index.php?halaman=barang";
		</script>

		<?php
	}else{
		?>

		<script type="text/javascript">
		alert('Barang gagal diubah');
		window.location.href="index.php?halaman=tambahBarang";
		</script>

		<?php
	}

}

?>
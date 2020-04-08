<?php 

	error_reporting(0);
	$kodepj = $_GET['kodepj'];

 ?>
<div class="container">

	<form method="post">
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<input type="text" name="kodepj" class="form-control" value="<?php echo $kodepj ?>" readonly>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<input type="text" name="barcode" class="form-control" autofocus="">
				</div>
			</div>
			<div class="col-md-2">
				<button type="submit" name="tambahkan" class="btn btn-primary">Tambahkan</button>
			</div>
			<div class="col-md-6">
				<div class="form-group float-right">
					<input type="text" name="nama_pelanggan" class="form-control" placeholder="nama pembeli">
				</div>
			</div>
		</div>
	</form>

	<?php 

		if(isset($_POST['tambahkan'])){

			$kodepj2 = $_POST['kodepj'];
			$barcode = $_POST['barcode'];

			$sql = $koneksi->query("SELECT * FROM barang WHERE kode_barcode = '$barcode'");
			$data = $sql->fetch_assoc();
			$kode_barcode = $data['kode_barcode'];
			$harga = $data['harga_jual'];
			$jumlah = 1;
			$total = $harga * $jumlah;


			$sql_stok = $koneksi->query("SELECT * FROM barang WHERE kode_barcode='$barcode'");
			while($stok = $sql_stok->fetch_assoc()){
				$stok_barang = $stok['stok'];

				if($stok_barang == 0){
					?>

					<script type="text/javascript">
					alert('Stok barang sedang kosong !');
					window.location.href="index.php?halaman=penjualan&kodepj=<?php echo $kodepj ?>";
					</script>

					<?php
				}else{

					$_SESSION['penjualan'] = $kodepj;
					$koneksi->query("INSERT INTO penjualan_barang (kode_penjualan, kode_barcode, harga, jumlah, total) VALUES ('$kodepj2','$kode_barcode','$harga','$jumlah','$total')");

					$koneksi->query("UPDATE barang SET stok=(stok-1) WHERE kode_barcode = '$kode_barcode'");

				}

			}

		}

	 ?>

	<pre>
		<?php //print_r($data); ?>
	</pre>
	<?php if(isset($_SESSION['penjualan'])){ ?>
	<div class="row">
		<div class="col-md">
			<div class="card bg-gray">
				<div class="card-body">
					<h4 class="mb-4 text-gray-800">Data Penjualan</h4>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Barcode</th>
								<th>Nama Barang</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Sub-Total</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>

							<?php 

								$no =1;
								$sql_penjualan = $koneksi->query("SELECT * FROM penjualan_barang
																JOIN barang ON penjualan_barang.kode_barcode=barang.kode_barcode WHERE kode_penjualan = '$kodepj'");
								while($tampil = $sql_penjualan->fetch_assoc()){

							 ?>

							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $tampil['kode_barcode'] ?></td>
								<td><?php echo $tampil['nama_barang'] ?></td>
								<td><?php echo number_format($tampil['harga']) ?></td>
								<td><?php echo $tampil['jumlah'] ?></td>
								<td><?php echo number_format($tampil['total']) ?></td>
								<td>
									<a onclick="return confirm('Lanjutkan >>>')" href="hapusPembelian.php?id=<?php echo $tampil['id_penjualan_barang'] ?>&barcode=<?php echo $tampil['kode_barcode'] ?>&kodepj=<?php echo $tampil['kode_penjualan'] ?>" class="btn btn-sm btn-danger">Hapus</a>
								</td>
							</tr>

							<?php 
								
								$total_bayar = $total_bayar + $tampil['total']; 
							?>

							<?php } ?>

							<tr>
								<th colspan="5">Total</th>
								<td>
									<input type="text" name="total" class="form-control" value="<?php echo number_format($total_bayar) ?>">
								</td>
								<td>
									<button type="submit" class="btn btn-sm btn-primary">Cetak Struk</button>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php } ?>
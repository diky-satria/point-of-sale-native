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

					$koneksi->query("INSERT INTO penjualan (kode_penjualan, kode_barcode, harga, jumlah, total) VALUES ('$kodepj2','$barcode','$harga','$jumlah','$total')");

					$koneksi->query("UPDATE barang SET stok=(stok-1) WHERE kode_barcode = '$kode_barcode'");

				}

			}

		}

	 ?>

	<pre>
		<?php //print_r($data); ?>
	</pre>
	
	<div class="row">
		<div class="col-md">
			<div class="card bg-gray mb-3">
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
								$sql_penjualan = $koneksi->query("SELECT * FROM penjualan
																JOIN barang ON penjualan.kode_barcode=barang.kode_barcode WHERE kode_penjualan = '$kodepj'");
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
									<a onclick="return confirm('Lanjutkan >>>')" class="btn btn-sm btn-danger" href="index.php?halaman=hapusPembelian&id=<?php echo $tampil['id_penjualan_barang'] ?>&kodepj=<?php echo $tampil['kode_penjualan'] ?>&jumlah=<?php echo $tampil['jumlah'] ?>&barcode=<?php echo $data['kode_barcode'] ?>">Hapus</a>
								</td>
							</tr>

							<?php 
								
								$total_bayar = $total_bayar + $tampil['total']; 
								$diskon = $total_bayar * 10 / 100;
								$totalsemua = $total_bayar - $diskon;
							?>

							<?php } ?>

							<form method="post">

							<input type="hidden" name="kodekode" value=<?php echo $kodepj ?>>
							<tr>
								<th colspan="5" style="text-align:right;">Total</th>
								<td>
									<input type="text" name="total" id="total" class="form-control" value="<?php echo $total_bayar ?>" readonly>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Diskon</th>
								<td>
									<input type="text" value="10%" name="diskon" class="form-control" readonly>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Potongan Diskon</th>
								<td>
									<input type="text" value="<?php echo $diskon ?>" name="p_diskon" class="form-control" readonly>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Sub Total</th>
								<td>
									<input type="text" value="<?php echo $totalsemua ?>" onkeyup="hitung()"  name="sub_total" id="sub_total" class="form-control" readonly>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Bayar</th>
								<td>
									<input type="number" id="bayar" onkeyup="hitung()" name="bayar" class="form-control">
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Pembeli</th>
								<td>
									<input type="text" id="pembeli" name="pembeli" class="form-control">
								</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="5"></td>
								<td>
									<button type="submit" id="cetak" name="cetak" class="btn btn-block btn-primary">Bayar</button>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Kembali</th>
								<td>
									<input type="text" id="kembali" name="kembali" class="form-control" readonly>
								</td>
								<td></td>
							</tr>

							</form>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 

	if(isset($_POST['cetak'])){

		$kodekode = $_POST['kodekode'];
		$pembeli = $_POST['pembeli'];
		$total = $_POST['total'];
		$diskon = $_POST['diskon'];
		$p_diskon = $_POST['p_diskon'];
		$sub_total = $_POST['sub_total'];
		$bayar = $_POST['bayar'];
		$kembali = $_POST['kembali'];

		$sql_cetak = $koneksi->query("INSERT INTO pembelian (kode_penjualan,pembeli,total,diskon,potongan_diskon,subtotal,bayar,kembali) VALUES ('$kodepj','$pembeli','$total','$diskon','$p_diskon','$sub_total','$bayar','$kembali')");
		?>
		<script type="text/javascript">
		window.location.href="index.php?halaman=pembelian&kodepj=<?php echo $kodekode ?>";
		</script>
		<?php

	}

 ?>
<?php 

	$kode = $_GET['kodepj'];
	$sql_pembelian = $koneksi->query("SELECT * FROM pembelian WHERE kode_penjualan = '$kode'");
	$data = $sql_pembelian->fetch_assoc();
	$kode_penjualan = $data['kode_penjualan'];

 ?>
<div class="container">
	
	<div class="row">
		<div class="col-md">
			<div class="card bg-gray mb-3">
				<div class="card-body">
					<h4 class="mb-4 text-gray-800">Data Pembelian</h4>

					<div class="row">
						<div class="col-md-4">
							<table class="table table-sm">
								<tr>
									<td>Tanggal</td>
									<td>:</td>
									<td><?php echo date('d-M-Y', strtotime($data['tanggal_pembelian'])) ?></td>
								</tr>
								<tr>
									<td>Kode</td>
									<td>:</td>
									<td><?php echo $data['kode_penjualan'] ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-4">
							
						</div>
						<div class="col-md-4">
							<table class="table table-sm">
								<tr>
									<td>Kasir</td>
									<td>:</td>
									<td><?php echo $data['kasir'] ?></td>
								</tr>
								<tr>
									<td>Pembeli</td>
									<td>:</td>
									<td><?php echo $data['pembeli'] ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Barcode</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th>Jumlah</th>
										<th>Sub-Total</th>
										
									</tr>
								</thead>
								<tbody>

									<?php 

										$no=1;
										$sql_penjualan = $koneksi->query("SELECT * FROM penjualan JOIN barang ON penjualan.kode_barcode=barang.kode_barcode WHERE penjualan.kode_penjualan = '$kode_penjualan'");
										while($data2 = $sql_penjualan->fetch_assoc()){

									 ?>

									<tr>
										<td><?php echo $no++ ?></td>
										<td><?php echo $data2['kode_barcode'] ?></td>
										<td><?php echo $data2['nama_barang'] ?></td>
										<td><?php echo number_format($data2['harga']) ?></td>
										<td><?php echo $data2['jumlah'] ?></td>
										<td><?php echo number_format($data2['total']) ?></td>
										
									</tr>

									<?php } ?>

									<form method="post">

									<tr>
										<th colspan="5" style="text-align:right;">Total</th>
										<td>
											<input type="text" name="total" id="total" class="form-control" value="<?php echo number_format($data['total']) ?>" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Diskon</th>
										<td>
											<input type="text" value="<?php echo $data['diskon'] ?>" name="diskon" class="form-control" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Potongan Diskon</th>
										<td>
											<input type="text" value="<?php echo number_format($data['potongan_diskon']) ?>" name="p_diskon" class="form-control" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Sub Total</th>
										<td>
											<input type="text" value="<?php echo number_format($data['subtotal']) ?>"   name="sub_total" id="sub_total" class="form-control" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Bayar</th>
										<td>
											<input type="text" id="bayar" name="bayar" class="form-control" value="<?php echo number_format($data['bayar']) ?>" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<td colspan="5"></td>
										<td>
											<a href="laporan/cetak_struk.php?kode_penjualan=<?php echo $kode ?>" target="_blank" class="btn btn-block btn-success">Cetak Struk</a>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Kembali</th>
										<td>
											<input type="text" id="kembali" name="kembali" class="form-control" value="<?php echo number_format($data['kembali']) ?>" readonly>
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
	</div>
</div>
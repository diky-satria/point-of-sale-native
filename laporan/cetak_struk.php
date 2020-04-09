<?php

require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();


include '../koneksi.php';
$kode = $_GET['kode_penjualan'];
$sql_pembelian = $koneksi->query("SELECT * FROM pembelian WHERE kode_penjualan = '$kode'");
$data = $sql_pembelian->fetch_assoc();
$kode_penjualan = $data['kode_penjualan'];

$html = '<div class="container">
	
		<div class="row">
			<div class="col-md">
				<div class="card bg-gray mb-3">
					<div class="card-body">
						<h3 class="mb-4 text-gray-800">Data Pembelian</h3>

						<div class="row">
							<div class="col-md-4">
								<table class="table">
									<tr>
										<td>Tanggal</td>
										<td>:</td>
										<td>'.$data['tanggal_pembelian'].'</td>
								</tr>
							</table>
						</div>
						<div class="col-md-4">
							<table class="table">
								<tr>
									<td>Kode &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>:</td>
									<td>'.$data['kode_penjualan'].'</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-md-4">
							<table class="table">
								<tr>
									<td>Pembeli</td>
									<td>:</td>
									<td>'.$data['pembeli'].'</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<table border="1" cellspacing="0" cellpadding="7" style="margin-top:20px;">
								<thead>
									<tr>
										<th style="width:50px;">No</th>
										<th style="width:150px;">Kode Barcode</th>
										<th style="width:150px;">Nama Barang</th>
										<th style="width:150px;">Harga</th>
										<th>Jumlah</th>
										<th style="width:150px;">Sub-Total</th>
										
									</tr>
								</thead>
								<tbody>';

							

								$no=1;
								$sql_penjualan = $koneksi->query("SELECT * FROM penjualan JOIN barang ON penjualan.kode_barcode=barang.kode_barcode WHERE penjualan.kode_penjualan = '$kode_penjualan'");
								while($data2 = $sql_penjualan->fetch_assoc()){

						$html .='<tr>
									<td>'.$no++.'</td>
									<td>'.$data2['kode_barcode'].'</td>
									<td>'.$data2['nama_barang'].'</td>
									<td>'.number_format($data2['harga']).'</td>
									<td>'.$data2['jumlah'].'</td>
									<td>'.number_format($data2['total']).'</td>
									
								</tr>';

							}

						
								$html .='
								</tbody>
							</table>
							
							<table border="0" cellspacing="0" cellpadding="5" style="margin-left:410px;">
								<thead>
									<tr>
										<td colspan="5" style="text-align:right;">Total</td>
										<td>:</td>
										<td>'.number_format($data['total']).'</td>
									<tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="5" style="text-align:right;">Diskon</td>
										<td>:</td>
										<td>'.$data['diskon'].'</td>
									</tr>
									<tr>
										<td colspan="5" style="text-align:right;">Potongan diskon</td>
										<td>:</td>
										<td>'.number_format($data['potongan_diskon']).'</td>
									</tr>
									<tr>
										<td colspan="5" style="text-align:right;"><b>Sub-Total</b></td>
										<td><b>:</b></td>
										<td><b>'.number_format($data['subtotal']).'</b></td>
									</tr>
									<tr>
										<td colspan="5" style="text-align:right;">Bayar</td>
										<td>:</td>
										<td>'.number_format($data['bayar']).'</td>
									</tr>
									<tr>
										<td colspan="5" style="text-align:right;">Kembali</td>
										<td>:</td>
										<td>'.number_format($data['kembali']).'</td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>';


$mpdf->WriteHTML($html);
$mpdf->Output('struk.pdf', \Mpdf\Output\Destination::INLINE);
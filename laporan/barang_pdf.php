<?php

require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

include '../koneksi.php';


$html = '
	
	<h2 class="mb-4 text-gray-800" style="text-align:center;">Data Barang</h2>

	<p>Tanggal : '.date('d-M-Y').'</p>

	<table border="1" cellspacing="0" cellpadding="6" style="width:100%">
	    <thead>
	        <tr>
	            <th>No</th>
	            <th>Barcode</th>
	            <th>Nama Barang</th>
	            <th>Satuan</th>
	            <th>Stok</th>
	            <th>Supplier</th>
	            <th>Harga Beli</th>
	            <th>Harga Jual</th>
	            <th>Untung</th>
	        </tr>
	    </thead>
	    <tbody>';

	    	$no=1;
	    	$sql = $koneksi->query("SELECT * FROM barang JOIN supplier ON 
	                                barang.supplier=supplier.id_supplier");
	    	while($data = $sql->fetch_assoc()){

   $html .='<tr>
	        	<td>'.$no++.'</td>
	            <td>'.$data['kode_barcode'].'</td>
	            <td>'.$data['nama_barang'].'</td>
	            <td>'.$data['satuan'].'</td>
	            <td>'.$data['stok'].'</td>
	            <td>'.$data['nama_supplier'].'</td>
	            <td>'.number_format($data['harga_beli']).'</td>
	            <td>'.number_format($data['harga_jual']).'</td>
	            <td>'.number_format($data['untung']).'</td>
	        </tr>';

	        }
	    $html .='</tbody>
	</table>

	';

$mpdf->WriteHTML($html);
$mpdf->Output('laporan_barang.pdf', \Mpdf\Output\Destination::INLINE);

?>
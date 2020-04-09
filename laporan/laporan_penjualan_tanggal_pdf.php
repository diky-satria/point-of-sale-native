<?php

require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

include '../koneksi.php';
$tglm = $_GET['tglm'];
$tgla = $_GET['tgla'];

$html = '

<h4 style="text-align:center;">Laporan penjualan dari <b style="color:red;"><i>'.$tglm.'</i></b> sampai <b style="color:red;"><i>'.$tgla.'</i></b></h4>

<table border="1" cellspacing="0" cellpadding="5" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Penjualan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pembelian</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>';

            $total = 0;
            $no =1;
            $sql = $koneksi->query("SELECT * FROM pembelian WHERE tanggal_pembelian between '$tglm' AND '$tgla'");
            while($data = $sql->fetch_assoc()){

        $html .='<tr>
            <td>'.$no++.'</td>
            <td>'.$data['kode_penjualan'].'</td>
            <td>
            	'.$data['pembeli'].'</td>
            <td>'.date('d-M-Y', strtotime($data['tanggal_pembelian'])).'</td>
            <td>'.number_format($data['subtotal']).'</td>
        </tr>';

            $total = $total+$data['subtotal'];
}

        $html .='<tr>
            <th colspan="4">Total</th>
            <td><b>'.number_format($total).'</b></td>
        </tr>

    </tbody>
</table>';


$mpdf->WriteHTML($html);
$mpdf->Output('laporan_penjualan_pertanggal.pdf', \Mpdf\Output\Destination::INLINE);

?>
<?php 
	
	include 'koneksi.php';

    $tglm = '-';
    $tgla = '-';

    if(isset($_POST['cari'])){

        $tglm = $_POST['tglm'];
        $tgla = $_POST['tgla'];

    }

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Laporan penjualan dari <b style="color:red;"><i><?php echo $tglm ?></i></b> sampai <b style="color:red;"><i><?php echo $tgla  ?></i></b></h4>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Penjualan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pembelian</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>

        <?php 

            $total = 0;
            $no =1;
            $sql = $koneksi->query("SELECT * FROM pembelian WHERE tanggal_pembelian between '$tglm' AND '$tgla'");
            while($data = $sql->fetch_assoc()){

         ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['kode_penjualan'] ?></td>
            <td>
            <?php if($data['pembeli'] == null){
                echo '---';
                }else{
                echo $data['pembeli'];
                } ?>
            </td>
            <td><?php echo date('d-M-Y', strtotime($data['tanggal_pembelian'])) ?></td>
            <td><?php echo number_format($data['subtotal']) ?></td>
        </tr>
        <?php 


            $total = $total+$data['subtotal'];

         ?>

        <?php } ?>
        <tr>
            <th colspan="4"><center>Total</center></th>
            <td><b><?php echo number_format($total) ?></b></td>
        </tr>

    </tbody>
</table>

<a target="_blank" href="laporan/laporan_penjualan_tanggal_pdf.php?tglm=<?php echo $tglm ?>&tgla=<?php echo $tgla ?>" class="btn btn-primary btn-sm">ExportToPdf</a>
<a href="laporan/laporan_penjualan_tanggal_exel.php?tglm=<?php echo $tglm ?>&tgla=<?php echo $tgla ?>" class="btn btn-secondary btn-sm">ExportToExel</a>
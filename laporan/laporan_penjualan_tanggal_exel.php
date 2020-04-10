<?php 

	include '../koneksi.php';

	$filename = "laporan_penjualan_pertanggal-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename= '$filename'");
	header("content-type: application/vdn.mc-exel");

 ?>

 <?php 
	
	$tglm = $_GET['tglm'];
	$tgla = $_GET['tgla'];

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
            <td colspan="4"></td>
            <td><b><?php echo number_format($total) ?></b></td>
        </tr>

    </tbody>
</table>
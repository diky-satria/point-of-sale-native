<?php 

	include '../koneksi.php';

	$filename = "laporan_barang-(".date('d-m-Y').").xls";

	header("content-disposition: attachment; filename= '$filename'");
	header("content-type: application/vdn.mc-exel");

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Data Barang</h4>

<table id="example" class="table table-striped table-bordered" style="width:100%">
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
    <tbody>

    <?php 

    	$no=1;
    	$sql = $koneksi->query("SELECT * FROM barang JOIN supplier ON 
                                barang.supplier=supplier.id_supplier");
    	while($data = $sql->fetch_assoc()){

     ?>

        <tr>
        	<td><?php echo $no++ ?></td>
            <td><?php echo $data['kode_barcode'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo $data['satuan'] ?></td>
            <td><?php echo $data['stok'] ?></td>
            <td><?php echo $data['nama_supplier'] ?></td>
            <td><?php echo number_format($data['harga_beli']) ?></td>
            <td><?php echo number_format($data['harga_jual']) ?></td>
            <td><?php echo number_format($data['untung']) ?></td>
        </tr>

        <?php } ?>
    </tbody>
</table>
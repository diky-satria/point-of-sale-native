<?php 
	
	include 'koneksi.php';

 ?>
<div class="row">
    <div class="col-md-6">
        <!-- Page Heading -->
        <h4 class="mb-4 text-gray-800 float-left">Data Barang</h4>
    </div>
    <div class="col-md-6">
        <a href="index.php?halaman=dashboard" class="btn btn-sm btn-dark mb-3 float-right">Kembali</a>
    </div>
</div>

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
            <th>Opsi</th>
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
            <td>
            	<a href="index.php?halaman=ubahBarang&id=<?php echo $data['id_barang'] ?>" class="btn btn-sm btn-success">ubah</a>
            	<a href="index.php?halaman=hapusBarang&id=<?php echo $data['id_barang'] ?>" onclick="return confirm('yakin ingin menghapus ?')" class="btn btn-sm btn-danger">hapus</a>
            </td>
        </tr>

        <?php } ?>
    </tbody>
</table>

<div class="row mt-3 mb-3">
    <div class="col-md-6">
        <a href="index.php?halaman=tambahBarang" class="btn btn-sm btn-primary">Tambah</a>    
    </div>
    <div class="col-md-6">
        <a href="laporan/barang_pdf.php" target="_blank" class="btn btn-sm btn-primary float-right ml-1">ExportToPdf</a>
        <a href="laporan/barang_exel.php" class="btn btn-sm btn-secondary float-right">ExportToExel</a>
    </div>
</div>
<?php 
	
	include 'koneksi.php';

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
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Untung</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>

    <?php 

    	$no=1;
    	$sql = $koneksi->query("SELECT * FROM barang");
    	while($data = $sql->fetch_assoc()){

     ?>

        <tr>
        	<td><?php echo $no++ ?></td>
            <td><?php echo $data['kode_barcode'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo $data['satuan'] ?></td>
            <td><?php echo $data['stok'] ?></td>
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

<a href="index.php?halaman=tambahBarang" class="btn btn-sm btn-primary">Tambah</a>
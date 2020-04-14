<?php 
	
	include 'koneksi.php';

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-danger">Penjualan Collapse</h4>

<a href="index.php?halaman=dashboard" class="btn btn-sm btn-dark mb-3">Kembali</a>

<table class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Penjualan</th>
            <th>Tanggal</th>
            <th>Barcode</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Kasir</th>
            <th>Collapse</th>
        </tr>
    </thead>
    <tbody>

        <?php 

            $no =1;
            $sql = $koneksi->query("SELECT * FROM penjualan
            					   JOIN barang ON penjualan.kode_barcode=barang.kode_barcode
									WHERE penjualan.status = 'collapse'");
            while($data = $sql->fetch_assoc()){

         ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['kode_penjualan'] ?></td>
            <td><?php echo $data['tanggal_input'] ?></td>
            <td><?php echo $data['kode_barcode'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo $data['jumlah'] ?></td>
            <td><?php echo $data['kasir'] ?></td>
            <td>
            	<a onclick="return confirm('Lanjutkan >>>')" href="index.php?halaman=kembalikan_collapse&id=<?php echo $data['id_penjualan_barang'] ?>&jumlah=<?php echo $data['jumlah'] ?>&barcode=<?php echo $data['kode_barcode'] ?>" class="btn btn-sm btn-danger">Kembalikan</a>
            </td>
        </tr>

        <?php } ?>

    </tbody>
</table>
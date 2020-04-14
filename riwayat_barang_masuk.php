<?php 
	
	include 'koneksi.php';

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Riwayat Barang Masuk</h4>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barcode</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Oprator</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>

        <?php 

            $no =1;
            $sql = $koneksi->query("SELECT * FROM barang_masuk 
            						JOIN barang ON barang_masuk.kode_barcode=barang.kode_barcode
            						WHERE status ='masuk'");
            while($data = $sql->fetch_assoc()){

         ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['kode_barcode'] ?></td>
            <td><?php echo $data['nama_barang'] ?></td>
            <td><?php echo $data['jumlah'] ?></td>
            <td><?php echo $data['kasir'] ?></td>
            <td><?php echo $data['tanggal_masuk'] ?></td>
        </tr>

        <?php } ?>

    </tbody>
</table>
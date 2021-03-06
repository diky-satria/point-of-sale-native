<?php 
    
    include 'koneksi.php';

 ?>
<div class="row">
    <div class="col-md-6">
        <!-- Page Heading -->
        <h4 class="mb-4 text-gray-800 float-left">Barang Masuk</h4>
    </div>
    <div class="col-md-6">
        <a href="index.php?halaman=dashboard" class="btn btn-sm btn-dark mb-3 float-right">Kembali</a>
    </div>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Barcode</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Oprator</th>
            <th>Tanggal</th>
            <th>Opsi</th>
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
            <td>
                <a href="index.php?halaman=ubah_barang_masuk&id=<?php echo $data['id_barang_masuk'] ?>" class="btn btn-sm btn-success">Ubah</a>
                <a onclick="return confirm('Lanjutkan >>>')" href="index.php?halaman=konfirmasi_barang_masuk&id=<?php echo $data['id_barang_masuk'] ?>&jumlah=<?php echo $data['jumlah'] ?>&kode=<?php echo $data['kode_barcode'] ?>" class="btn btn-sm btn-primary">Konfirmasi</a>
            </td>
        </tr>

        <?php } ?>

    </tbody>
</table>
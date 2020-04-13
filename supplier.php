<?php 
	
	include 'koneksi.php';


 ?><div class="row">
    <div class="col-md-6">
        <!-- Page Heading -->
        <h4 class="mb-4 text-gray-800 float-left">Data Supplier</h4>
    </div>
    <div class="col-md-6">
        <a href="index.php?halaman=dashboard" class="btn btn-sm btn-dark mb-3 float-right">Kembali</a>
    </div>
</div>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>

        <?php 

            $no =1;
            $sql = $koneksi->query("SELECT * FROM supplier");
            while($data = $sql->fetch_assoc()){

         ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['nama_supplier'] ?></td>
            <td><?php echo $data['email_supplier'] ?></td>
            <td><?php echo $data['telepon_supplier'] ?></td>
            <td><?php echo $data['alamat_supplier'] ?></td>
            <td>
                <a href="index.php?halaman=ubah_supplier&id=<?php echo $data['id_supplier'] ?>" class="btn btn-sm btn-success">edit</a>
            	<a onclick="return confirm('lanjutkan >>>')" href="index.php?halaman=hapus_supplier&id=<?php echo $data['id_supplier'] ?>" class="btn btn-sm btn-danger">hapus</a>
            </td>
        </tr>

        <?php } ?>

    </tbody>
</table>

<a href="index.php?halaman=tambah_supplier" class="btn btn-sm btn-primary">Tambah</a>
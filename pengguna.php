<?php 
	
	include 'koneksi.php';

 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Data Pengguna</h4>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Foto</th>
            <th>Tanggal Daftar</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>

        <?php 

            $no =1;
            $sql = $koneksi->query("SELECT * FROM pengguna");
            while($data = $sql->fetch_assoc()){

         ?>

        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['email'] ?></td>
            <td><?php echo $data['role'] ?></td>
            <td><?php echo $data['foto'] ?></td>
            <td>
                <a href="" class="btn btn-sm btn-success">Ubah</a>
                <a href="" class="btn btn-sm btn-warning">Hapus</a>
            </td>
        </tr>

        <?php } ?>

    </tbody>
</table>

<a href="index.php?halaman=tambahPengguna" class="btn btn-sm btn-primary">Tambah</a>
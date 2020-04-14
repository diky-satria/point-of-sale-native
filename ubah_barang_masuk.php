<?php 

	$id = $_GET['id'];
	$sql = $koneksi->query("SELECT * FROM barang_masuk
							JOIN barang ON barang_masuk.kode_barcode=barang.kode_barcode WHERE barang_masuk.id_barang_masuk = '$id'");
	$data = $sql->fetch_assoc();

 ?>
<div class="row">
        <div class="col-md">
            <div class="card bg-gray mb-3">
                <div class="card-body">
                    <h4 class="mb-4 text-gray-800">Data Barang Masuk</h4>
                    <a href="index.php?halaman=admin_barang_masuk" class="btn btn-sm btn-dark mb-3">Kembali</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Barcode</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        <form method="post">
                            <tr>
                                <td><input type="text" class="form-control" style="border:0px solid;" name="kode" value="<?php echo $data['kode_barcode'] ?>"></td>
                                <td><?php echo $data['nama_barang'] ?></td>
                                <td><input type="number" min="1" style="width:80px;" value="<?php echo $data['jumlah'] ?>" class="form-control" name="jumlah" required></td>
                                <td>
                                    <button type="submit" name="ubah" class="btn btn-sm btn-success">Ubah</button>
                                </td>
                            </tr>
                        </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php 

    	if(isset($_POST['ubah'])){

    		$jumlah = $_POST['jumlah'];

    		$sql2 = $koneksi->query("UPDATE barang_masuk SET jumlah = '$jumlah' WHERE id_barang_masuk='$id'");
    		if($sql2){
    			?>

    			<script type="text/javascript">
    			alert('jumlah barang masuk berhasil diubah');
    			window.location.href="index.php?halaman=admin_barang_masuk";
    			</script>

    			<?php
    		}

    	}

     ?>
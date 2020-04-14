<?php 

    $pengguna = $_SESSION['pengguna'];

 ?>
<div class="container">
<!-- <pre>
    <?php //print_r($pengguna) ?>
</pre> -->
    <form method="post">
        <div class="row">
            
            <div class="col-md-2">
                <div class="form-group">
                    <input type="text" name="barcode" class="form-control" autofocus="" required>
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" name="cek" class="btn btn-primary">cek</button>
            </div>
            <div class="col-md-8">
                
            </div>
        </div>
    </form>

    <?php 

    	$kode_barcode = '';

        if(isset($_POST['cek'])){
            
            $barcode = $_POST['barcode'];

            $sql = $koneksi->query("SELECT * FROM barang
            						JOIN supplier ON barang.supplier=supplier.id_supplier WHERE barang.kode_barcode = '$barcode'");

            $data = $sql->fetch_assoc();
            $kode_barcode = $data['kode_barcode'];

            if($barcode != $kode_barcode){
            	?>
            	<script type="text/javascript">
            	alert('Barang tidak terdaftar');
            	</script>
            	<?php
            }

        }
     ?>

    <!-- <pre>
       <?php //print_r($barcode); ?>
    </pre> -->
    
    <div class="row">
        <div class="col-md">
            <div class="card bg-gray mb-3">
                <div class="card-body">
                    <h4 class="mb-4 text-gray-800">Cari Data Barang</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Barcode</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Supplier</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>

	                	<?php 

	                		if($kode_barcode){
	                			?>
                            <tr>
                                <td><?php echo $data['kode_barcode'] ?></td>
                                <td><?php echo $data['nama_barang'] ?></td>
                                <td><?php echo $data['satuan'] ?></td>
                                <td><?php echo $data['stok'] ?></td>
                                <td><?php echo $data['nama_supplier'] ?></td>
                                <td><?php echo $data['harga_jual'] ?></td>
                            </tr>

                        	 <?php }else{ ?>

                        	<tr>
                                <td colspan="6"><center><h4>Kosong</h4></center></td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


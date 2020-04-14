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
                <button type="submit" name="tambahkan" class="btn btn-primary">Tambahkan</button>
            </div>
            <div class="col-md-8">
                
            </div>
        </div>
    </form>

    <?php 

        $kode_barcode = '';
        $nama = '';

        if(isset($_POST['tambahkan'])){
            
            $barcode = $_POST['barcode'];

            $sql = $koneksi->query("SELECT * FROM barang WHERE kode_barcode = '$barcode'");

            $data = $sql->fetch_assoc();
            $kode_barcode = $data['kode_barcode'];
            $nama = $data['nama_barang'];
            
        }

     ?>

    <pre>
        <?php //print_r($data); ?>
    </pre>
    
    <div class="row">
        <div class="col-md">
            <div class="card bg-gray mb-3">
                <div class="card-body">
                    <h4 class="mb-4 text-gray-800">Data Barang Masuk</h4>
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
                        <?php 

                            if($kode_barcode == ''){ ?>
                               <tr>
                               <td colspan="4"><center><h4>Kosong</h4></center></td>
                            </tr> 

                         <?php }else{ ?>
                            <tr>
                                <td><input type="text" class="form-control" style="border:0px solid;" name="kode" value="<?php echo $kode_barcode ?>"></td>
                                <td><?php echo $nama ?></td>
                                <td><input type="number" min="1" style="width:80px;" class="form-control" name="jumlah" required></td>
                                <td>
                                    <button type="submit" name="konfirmasi" class="btn btn-sm btn-success">Konfirmasi</button>
                                </td>
                            </tr>
                        <?php } ?>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 

    if(isset($_POST['konfirmasi'])){

        $jumlah = $_POST['jumlah'];
        $kasir = $pengguna['nama'];
        $kode = $_POST['kode'];

        $sql2 = $koneksi->query("INSERT INTO barang_masuk (kode_barcode, jumlah, kasir) VALUES ('$kode', '$jumlah', '$kasir')");

        if($sql2){
            ?>

            <script type="text/javascript">
            alert('barang berhasil ditambahkan');
            </script>

            <?php
        }

    }

 ?>
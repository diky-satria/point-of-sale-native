	<!-- Modal logout -->
	<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Lanjutkan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
	        <a href="logout.php" class="btn btn-primary">Logout</a>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Modal laporan-->
	<div class="modal fade" id="laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Laporan Penjualan</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        
	      	<form action="index.php?halaman=laporan" method="post">
	      		<div class="form-group">
	      			<label>Tanggal Mulai</label>
	      			<input type="date" name="tglm" class="form-control" required>
	      		</div>
	      		<div class="form-group">
	      			<label>Tanggal Akhir</label>
	      			<input type="date" name="tgla" class="form-control" required>
	      		</div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
	        <button type="submit" name="cari" class="btn btn-primary">Cari</button>
	      	</form>
	      </div>
	    </div>
	  </div>
	</div>

<!-- Bootstrap core JavaScript-->
  <script src="sbadmin2/vendor/jquery/jquery.min.js"></script>
  <script src="sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="sbadmin2/js/sb-admin-2.min.js"></script>

  <!-- dataTables -->
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <script type="text/javascript">
	  	$(document).ready(function() {
	    $('#example').DataTable();
	} );

  </script>

  <script type="text/javascript">

  	function sum(){

	  		var harga_beli = document.getElementById('harga_beli').value;
	  		var harga_jual = document.getElementById('harga_jual').value;
	  		var result = parseInt(harga_jual) - parseInt(harga_beli);

	  		if(!isNaN(result)){
	  			document.getElementById('untung').value = result;
	  		}

	  	}

	function hitung(){

		var bayar = document.getElementById('bayar').value;
		var sub_total = document.getElementById('sub_total').value;

		var hasil = parseInt(bayar) - parseInt(sub_total);

		if(!isNaN(hasil)){
			document.getElementById('kembali').value = hasil;
		}
	}

  </script>

</body>

</html>

<?php 

  session_start();
  include 'koneksi.php';

  if(isset($_SESSION['pengguna'])){
    header('location:index.php?halaman=penjualan');
  }

 ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>login</title>

  <!-- Custom fonts for this template-->
  <link href="sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row  justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5  col-md-6 mx-auto">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="email" placeholder="Email....">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>
                    
                    <button type="submit" name="login" class="btn btn-dark btn-user btn-block">
                      Login
                    </button>
                    
                    
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Lupa Password ?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

</body>

</html>

<?php 

  if(isset($_POST['login'])){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = $koneksi->query("SELECT * FROM pengguna WHERE email='$email' AND password='$password'");
    $data = $sql->fetch_assoc();

    $email2 = $data['email'];
    $password2 = $data['password'];

    if($email == $email2 AND $password == $password2){

      $_SESSION['pengguna'] = $data;
      if($_SESSION['pengguna']['role'] == 'admin'){
        header('location:index.php?halaman=dashboard');  
      }else{
        header('location:index.php?halaman=penjualan');
      }

    }else{
      ?>

      <script type="text/javascript">
      alert('email dan password tidak sesuai !');
      window.location.href="login.php";
      </script>

      <?php
    }

  }

 ?>
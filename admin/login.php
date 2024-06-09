<?php
session_start();
require('includes/db.php');
error_reporting(0);

if(isset($_SESSION['isAdminLoggedIn']) AND $_SESSION['isAdminLoggedIn']){
  header('Location:index.php');
  exit;

} 

    
if(isset($_POST['login']))
{
 
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    //   echo $username;
    //   echo $password;

    $query="SELECT * FROM `admin` WHERE `username` = '$username' && `password` = '$password' ";
    $run = mysqli_query($db,$query);
    
    $num = mysqli_num_rows($run);
    if($num>0)
    {
        $_SESSION['isAdminLoggedIn']=true;
        // $_SESSION['username']=$username; 
        header('Location: index.php');
        // if($_SESSION['isUserLoggedIn'])
        // {
        //   echo "<script>alert('Session set');</script>";
        // }
    }

    else
    {
    echo "<script>alert('Incorrect email or password !');
                window.location.href = 'login.php';
            </script>";
    }
    

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">  
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login JLO</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
    <link rel="icon" href="../img/fav.jpeg" type="image/png" />


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head> 

<body class="login" style=" background-image: url('assets/img/login.png'); background-size: cover; background-position: bottom; background-repeat: no-repeat; ">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-5 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/jlo-logo.png" alt="">
                </a>
              </div><!-- End Logo -->
 
              <div class="card mb-3 shadow">
 
                <div class="card-body">

                  <div class="pt-4 pb-2 text-center"> 
                    <h5 class="card-title pb-3 fs-2">Login</h5>
                                 
                  </div>
 
                  <form class="row g-3 needs-validation" method="post" >

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group "> 
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-lock"></i></span>
                        <input type="username" name="username" class="form-control"  id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <div class="input-group ">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-key"></i></span>  
                        <input type="password" name="password" class="form-control"  id="yourPassword" required>
                        <div class="invalid-feedback">Please enter your password!</div>
                      </div>
                    </div>
 
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn site_btn w-100" type="submit" name="login">Login</button>
                    </div>
                    <br>
                    <div class="col-12 text-center ">
                      <!-- <p class="small mb-0">Don't have account? <a href="#">Create an account</a></p> -->
                    </div>

                    
                  <!--<div class="col-6">-->
                  <!--    <button class="btn btn-danger w-100">Google</button>-->
                  <!--</div>-->
                  <!--<div class="col-6">-->
                  <!--    <button class="btn btn-primary w-100">Facebook</button>-->
                  <!--</div>-->
                  </form>


                </div>
              </div>


            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
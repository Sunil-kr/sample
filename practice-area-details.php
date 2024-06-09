<?php 
  include ("admin/includes/db.php");
  include ("admin/includes/function.php");
  error_reporting(0);



  
  if(!empty($_GET['area']))
  {
  
    $area = $_GET['area'];
  
    $sql = "SELECT * FROM `practice_area` WHERE `slug` = '$area' ";
    $output = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($output);
  
      // IF MEMBER not found --IMP
      $num = mysqli_num_rows($output);
      if($num<1)
      {
        echo "
                <script>
                      history.back();
                </script>
            ";
            die();
      }
  
  }
  else
  {
    echo "
              <script>
                  history.back();
              </script>
          ";
  }
  

  ?>


<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
  <title>Home</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport"
    content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta charset="utf-8">
  <link rel="icon" href="images/Jus/fav-icon.png" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/mains.scss">
  <!-- Link Swiper's CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <style>
    .ie-panel {
      display: none;
      background: #212121;
      padding: 10px 0;
      box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
      clear: both;
      text-align: center;
      position: relative;
      z-index: 1;
    }

    html.ie-10 .ie-panel,
    html.lt-ie-10 .ie-panel {
      display: block;
    }
  </style>
</head>

<body>
  <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img
        src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820"
        alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a>
  </div>
  <!-- Preloader -->

<?php include("include/pre-loader.php") ?>
  <div class="page">
    <!--===================================== Header Section Start===================================== -->
    <?php include("include/header.php") ?>
    <!--===================================== Header Section Ends===================================== -->

     <!-- Breadcrumbs -->
     <ul class="breadcrumbs-custom-path breadcrumbs-ul">
              <li><a href="index.php">Home</a></li>
              <li class="active">Family-Law</li>
            </ul>
     

      <?php
        $sql = "SELECT * FROM `practice_area` WHERE `slug` = '$area' ";
        $output = mysqli_query($db, $sql);
        $row = mysqli_fetch_assoc($output);
      ?>

      <section class="section section-relative law-container ">
        <div class="container">
         <div class="">
            <div class="new-law-img">
                <img src="admin/uploaded_practice_area/<?= $row['cover_image']?>" alt="<?=$row['title']?>">
            </div>
            <div class="new-law-dec shadow-sm">
              <h3 class="blue-title"><?=$row['title']?></h3>
                <!-- <h3 class="text-spacing-25 font-weight-normal title-opacity-9">Family-Law</h3> -->
                <p class="blue-para"><?=$row['content']?></p>
                        <!-- <p class="blue-para">In addition to our services in family disputes, we also assist clients in the area of:</p>
                        <ul class="cust-list">
                            <li class="cust-list-item"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Mutual Consent Divorce
                            </li>
                            <li class="cust-list-item"><i class="fa fa-dot-circle-o" aria-hidden="true"></i>Domestic Violence
                            </li>
                          </ul> -->
            </div>
         </div>
        </div>
      </section>
      <!--=====================================Family-Law Section End =====================================-->



    <?php include("include/practice-area-carousel.php") ?>
      

    <!--=====================================Footer Section Start =====================================-->
    <?php include("include/footer.php") ?>
      <!--=====================================Footer Section Ends=====================================-->
    </div>
    <!--===================================== Global Mailform Output=====================================-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/main.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  </body>
  
  </html>
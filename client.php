<?php 
include ("admin/includes/db.php");
include ("admin/includes/function.php");
error_reporting(0);
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
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">
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
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
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



   



    <!--===================================== client Hero Section Start ===================================== -->

     <!-- Breadcrumbs -->
     <ul class="breadcrumbs-custom-path breadcrumbs-ul">
              <li><a href="index.php">Home</a></li>
              <li class="active">Clientele</li>
            </ul>
    

    <!--===================================== Client Hero Section Ends ===================================== -->


     <!--===================================== client Section Start ===================================== -->
     <section class="section section-sm section-top-0 section-fluid section-relative  ">
        <div class="container">
          <!-- <h6 class="special">Our Client's</h6>
          <div class="line"></div> -->
          <div class="row">

          <?php
             $data = getClient($db); 
             foreach($data as $row)
             {
          ?>
            <div class="col-md-2">
                <article class="thumbnail thumbnail-mary shadow-sm">
                    <div class="thumbnail-mary-figure"><img src="admin/cms/uploaded_clients/<?=$row['client_logo']?>" alt="<?=$row['client_logo']?>" width="270" height="195" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="admin/cms/uploaded_clients/<?=$row['client_logo']?>"
                        data-lightgallery="item"><img src="admin/cms/uploaded_clients/<?=$row['client_logo']?>" alt="<?=$row['client_logo']?>" width="270" height="195" /></a>
                    </div>
                  </article>
            </div>
            <?php
             }
          ?>
            <!-- <div class="col-md-2 col-sm-6">
                <article class="thumbnail thumbnail-mary shadow-sm">
                    <div class="thumbnail-mary-figure"><img src="images/client/2.png" alt="" width="270" height="195" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="images/client/2.png"
                        data-lightgallery="item"><img src="images/client/2.png" alt="" width="270" height="195" /></a>
                    </div>
                  </article>

            </div> -->
            
          
          </div>
        </div>
     </section>

     

    <!--===================================== Client Section Ends ===================================== -->


     


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
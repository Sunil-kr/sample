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


    .else_content{
      position: relative; left: -50px;
    }

    @media (max-width: 768px)
    {
      .else_content{
        position: relative; left: 0px;
      }
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
    <!--===================================== Practice  Hero Section Start ===================================== -->
    <!-- Breadcrumbs -->
    <ul class="breadcrumbs-custom-path breadcrumbs-ul">
      <li><a href="index.php">Home</a></li>
      <li class="active">Practice Area</li>
    </ul>
    <section class="section section-r practice-area">
    <!-- Family Law -->
   

    <?php
        $data = getAllPracticeArea($db); 
        $count=1;
        foreach($data as $row)
        {
          if($count % 2 !== 0)
          {
    ?>
            <section class="bg-default prac-area">
              <div class="container">
                <div class="row d-flex align-items-center">
                  <div class="col-md-6 practice-card shadow-sm">
                    <div class="practice-area-info ">
                      <h5 class="box-icon-classic-title blue-title "><a href="practice-area-details.php?area=<?=$row['slug']?>"><?=$row['title']?></a></h5>
                      <p class="practice-info entry-title truncate">
                        <?php echo strip_tags($row['content']);?>
                         
                      </p>
                      <p class="read-more">
                        <a href="practice-area-details.php?area=<?=$row['slug']?>">Read More</a>
                      </p>
                    </div>
                  </div>
                  <div class="col-md-6 practice-card-img first">
                    <div class="practice-img ">
                      <img src="admin/uploaded_practice_area/<?= $row['cover_image']?>" alt="<?=$row['title']?>">
                    </div>
                  </div>
                </div>
              </div>
            </section>
    <?php
          }
          else
          {
            ?>
              <section class="bg-default prac-area">
                <div class="container">
                  <div class="row d-flex align-items-center">
                    <div class="col-md-6 practice-card-img first">
                      <div class="practice-img ">
                        <img src="admin/uploaded_practice_area/<?= $row['cover_image']?>" alt="<?=$row['title']?>">
                      </div>
                    </div>

                    <div class="col-md-6 practice-card else_content shadow-sm" style="">
                      <div class="practice-area-info ">
                        <h5 class="box-icon-classic-title blue-title "><a href="practice-area-details.php?area=<?=$row['slug']?>"><?=$row['title']?></a></h5>
                        <p class="practice-info entry-title truncate">
                          <?php echo strip_tags($row['content']);?>
                          
                        </p>
                        <p class="read-more">
                          <a href="practice-area-details.php?area=<?=$row['slug']?>">Read More</a>
                        </p>
                      </div>
                    </div>
                 
                  </div>
                </div>
              </section>
      <?php
          }
      $count++;
      }
    ?>
  <!-- Criminal Law -->
    <!-- <section class="bg-gray-4 prac-area">
      <div class="container">
        <div class="row d-flex align-items-center practice-rows">
          <div class="col-md-6 practice-card-img">
            <div class="practice-img">
              <img src="images/practice/cri-law.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6 practice-card-right shadow-sm">
            <div class="practice-area-info">
              <h5 class="box-icon-classic-title blue-title"><a href="criminal-law.php">CRIMINAL-LAW</a></h5>
              <p class="practice-info">
                Criminal law in India means offenses against the state, it includes felonies and misdemeanors. The
                standard of proof for crimes is beyond a reasonable doubt....
              </p>
              <p class="read-more">
                <a href="criminal-law.php">Read More</a>
              </p>
            </div>
          </div>
        </div>
    </section> -->
  <!-- Arbitration Law -->
  

  </section>
  <!--===================================== Practice  Section Ends ===================================== -->
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
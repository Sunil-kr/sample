<!-- <br><br> -->
<?php 
  include ("admin/includes/db.php");
  include ("admin/includes/function.php");
  error_reporting(0);


  
if(!empty($_GET['member']))
{

  $member_slug = $_GET['member'];

  $sql = "SELECT * FROM `team` WHERE `slug` = '$member_slug' ";
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

    






       <!--=====================================Team Section Start =====================================-->

       <?php
          $sql = "SELECT * FROM `team` WHERE `slug` = '$member_slug' ";
          $output = mysqli_query($db, $sql);
          $row = mysqli_fetch_assoc($output);

        ?>

       <section class="team-intro section-relative">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                   <div class=" image-card">
                    
                        <img src="admin/uploaded_team/<?=$row['main_image']?>" alt="<?=$row['member_name']?>">
                    
                   </div>
                </div>
                <div class="col-md-6 team-info">
                   <div class="info-card ">
                    <div class="info-card-bg-border">
                        <h3><?=$row['member_name']?></h3>
                    <span class="team-role"><?=$row['desg']?></span>
                    <div class="contact-det">
                        <span class="span-icon"><i class="fa fa-phone-square" aria-hidden="true"></i> <span class="span-text"><?=$row['mobile']?></span></span>
                        <span class="span-icon"><i class="fa fa-envelope" aria-hidden="true"></i> <span class="span-text"><?=$row['email']?></span></span>
                       <a href="<?=$row['linkedin_link']?>"> <span class="span-icon"><i class="fa fa-linkedin-square" aria-hidden="true"></i> <span class="span-text"><?=$row['linkedin']?></span></span></a>
                    </div>
                    </div>
                    <div class="team-bio">
                        <p><?=$row['about']?></p>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </section>


       <section class="section-relative-team team-intro mb-5">
        <div class="container">
        

          <!-- Other Details -->
          <div class="row other-details">
            <div class="col-md-12">

            

              <div class="team-wrapper">
                <div class="team-title-label">
                  <h2>Profile</h2>
                </div>

                <div class="team-wrapper-content">
                  <div class="team-profile">
                    <p><?=$row['profile']?></p>
                  </div>
                </div>
              </div>

              <div class="team-wrapper mt-5">
                <div class="team-title-label">
                  <h2>EXPERIENCE</h2>
                </div>

                <div class="team-wrapper-content">
                  <div class="team-profile">
                    <p><?=$row['experience']?></p>
                  </div>
                </div>
              </div>

              <div class="team-wrapper mt-5">
                <div class="team-title-label">
                  <h2>QUALIFICATIONS</h2>
                </div>

                <div class="team-wrapper-content">
                  <div class="team-profile">
                    <p><?=$row['qualification']?></p>
                  </div>
                </div>
              </div>


            <!-- <ul class="detail-list">
              <li>
                <i class="fa fa-check-square-o" aria-hidden="true"></i><span>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi enim voluptates rem sequi quos quas culpa repellat impedit iure cupiditate doloribus asperiores explicabo, ea ex? Delectus veritatis fugiat optio eveniet?
                </span>
              </li>
              <li>
                <i class="fa fa-check-square-o" aria-hidden="true"></i><span>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi enim voluptates rem sequi quos quas culpa repellat impedit iure cupiditate doloribus asperiores explicabo, ea ex? Delectus veritatis fugiat optio eveniet?
                </span>
              </li>
              <li>
                <i class="fa fa-check-square-o" aria-hidden="true"></i><span>
                  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi enim voluptates rem sequi quos quas culpa repellat impedit iure cupiditate doloribus asperiores explicabo, ea ex? Delectus veritatis fugiat optio eveniet?
                </span>
              </li>
              
            </ul> -->
           
         
            </div>

            <!-- <div class="col-md-12 p-4 mb-5">
              <h5 class="title-heading">Professional Qualifications</h5>

              <ul class="detail-list">
                <li>
                  <i class="fa fa-check-square-o" aria-hidden="true"></i><span>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi enim voluptates rem sequi quos quas culpa repellat impedit iure cupiditate doloribus asperiores explicabo, ea ex? Delectus veritatis fugiat optio eveniet?
                  </span>
                </li>
                <li>
                  <i class="fa fa-check-square-o" aria-hidden="true"></i><span>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi enim voluptates rem sequi quos quas culpa repellat impedit iure cupiditate doloribus asperiores explicabo, ea ex? Delectus veritatis fugiat optio eveniet?
                  </span>
                </li>
                
              </ul>
            </div> -->
          </div>
        </div>
       </section>
       <!--=====================================Team Section Start =====================================-->



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
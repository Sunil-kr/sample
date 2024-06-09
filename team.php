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
  <!-- Breadcrumbs -->
  <ul class="breadcrumbs-custom-path breadcrumbs-ul">
              <li><a href="index.php">Home</a></li>
              <li class="active">People</li>
            </ul>


    <section class="ourTeam section section-sm section-top-0 section-fluid section-relative section-relative-team ">
        <div class="container">
            <div class="row">
            <?php
                 $query="SELECT * FROM team ORDER BY `sequence`  ";
 
                 $run=mysqli_query($db,$query);
                 
                 $data = array();
         
                 while($row = mysqli_fetch_assoc($run))
                {
                  // echo $row['name'];
            ?>
                <!-- team-1 -->
                <div class="col-md-4">
                    <div class="cust-container">
                        <div class="box" onclick="window.location.href='team-member.php?member=<?=$row['slug']?>'" style="cursor: pointer;">
                            <img src="admin/uploaded_team/<?=$row['thumb_image']?>" >
                            <div class="content">
                                <div class="wrap">
                                    <!-- <h1>Image Hover Effects</h1> -->
                                    <p>
                                        <?php echo strip_tags($row['about']);?> 
                                    </p>
                                </div> 
                            </div>
                        </div>
                        <div class="content-box">
                            <a href="team-member.php?member=<?=$row['slug']?>"><h4><?=$row['member_name']?></h4></a>
                            <p><?=$row['desg']?></p>
                            <a href="<?=$row['linkedin_link']?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                </div>
            </div>
            <?php
                }
            ?>
            <!-- team-2 -->
                <!-- <div class="col-md-4">
                    <div class="cust-container">
                        <div class="box">
                            <img src="https://www.azbpartners.com/wp-content/uploads/2021/09/Anand-Shah.png">
                            <div class="content">
                                <div class="wrap">
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem 
                                        Ipsum has been the industry's standard dummy text ever since the 1500s .
                                    </p> 
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <a href="single-team-1.php"><h4>Lorem Gypsum</h4></a>
                            <p>MANAGING PARTNER</p>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div> -->

        </div>
    </section>


   



    

    
  
   

    


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
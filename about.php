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

   <!-- Preloader -->

<?php include("include/pre-loader.php") ?>
  <div class="page">
    <!--===================================== Header Section Start===================================== -->
    <?php include("include/header.php") ?>
    <!--===================================== Header Section Ends===================================== -->
    <ul class="breadcrumbs-custom-path breadcrumbs-ul">
      <li><a href="index.php">Home</a></li>
      <li class="active">About</li>
    </ul>
 <!--===================================== About Us Section Start ===================================== -->

     <section class="section section-relative law-container ">
        <div class="container">
         <div class="">
            <div class="new-law-img">
            <?php
                  $data = getAbout_us_cover($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                 
              ?>
                <img src="admin/cms/uploaded_about_us/<?=$row['cover_image']?>" alt="<?=$row['heading']?>">
              <?php
                  }
              ?>
            </div>
            <div class="new-law-dec shadow-sm">
                <!-- <h3 class="text-spacing-25 font-weight-normal title-opacity-9">About JUS Law Offices</h3> -->
                <?php
                        $sql = "SELECT * FROM `cms_about_us` WHERE `about_us_content_seq` = 'Primary' ";
        
                        $output = mysqli_query($db, $sql);
                            
                        while($res = mysqli_fetch_assoc($output))
                        { 
                        
                    ?>
                  <h3 class="blue-title"><?=$res['heading']?></h3>
                  <p> <?=$res['content']?> </p>
                  <!-- <p>Jus Law Offices is an ultramodern full legal service firm based in New Delhi, India. Associates
                      of the firm are organized in accordance with the principles of team management so as to ensure and
                      render composite and integrated professional service. The firm has alliances with associate
                      lawyers in various states of India. This network of alliances gives the benefit to the clients of
                      a single window service provider, to deal with all kind of matters across the country under one
                      umbrella.</p>
                  <p>We at Jus Law Offices put the quality of service that we offer our clients above all else. We know that, what is important to our clients and that knowledge and execution is what sets us apart from our competition. Our clients acknowledge and recognize Jus Law Offices for the professionalism and commercial perspective that we bring to transactions, our strong commercial acumen, our ability to manage transactions in an efficient and cost effective manner and our ability to address and resolve demanding transactional and legal issues. The firm's expertise coupled with effective, timely and practical solutions are the factors which are predominant in choosing the firm by the clients.</p>
                  <p>The firm represents a law number of business houses across the country, banking & financial institutions, Multinational Corporation and State and Central Government Authorities, NGOs as well as individuals.</p>
                  <p>Jus Law Offices provide services diligently and with the highest level of professional integrity and we also ensure that our clients are satisfied with our services by treating them in a proper, fair, impartial and courteous manner; aiming, where possible to meet any exceptional needs for our clients; enhance speed, quality of our services, accuracy, efficiency and flexibility in provision of our services to our clients.</p>
                  -->
                <?php
                      $count++;
                      }
                  ?> 


                <?php
                  $count=1;

                    $sql1 = "SELECT * FROM `cms_about_us` WHERE `about_us_content_seq` = 'Secondary' ";
    
                    $output1 = mysqli_query($db, $sql1);
                         
                    while($res1 = mysqli_fetch_assoc($output1))
                    { 
                      if($count % 2 !== 0)
                      {   
                    ?> 
                        <div class="row">
                          
                            <div class="col-md-6">
                                <div class="law-img">
                                    <img src="admin/cms/uploaded_about_us/<?=$res1['cover_image']?>" alt="<?=$res1['heading']?>">
            
                                </div>
                            </div>
                            
                            <div class="col-md-6 d-flex align-items-center">
                                    <div class="law-dec">
                                        <h4 class="blue-title"><?=$res1['heading']?></h4>
                                        <p><?php echo nl2br($res1['content']);?> </p>
                                    </div>
                            </div>

                        </div>
                  <?php
                      }
                      else
                      {
                        ?> 
                            <div class="row">

                                <div class="col-md-6 d-flex align-items-center">
                                        <div class="law-dec">
                                            <h4 class="blue-title"><?=$res1['heading']?></h4>
                                          
                                            <p><?=$res1['content']?> </p>
                                        </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="law-img">
                                        <img src="admin/cms/uploaded_about_us/<?=$res1['cover_image']?>" alt="<?=$res1['heading']?>">
                
                                    </div>
                                </div>

                            </div>
                        <?php
                      }
                  $count++;
                  }
                  ?>
    
                <!-- <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="law-dec">
                            <h4 class="blue-title">Our Vision</h4>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa aliquid dolores mollitia labore maiores unde necessitatibus esse, ratione cupiditate asperiores, doloremque a modi accusantium. Pariatur, labore aperiam voluptas inventore ipsam commodi deserunt quod ab non, quasi nisi suscipit, ut aliquam iste illum magni. Enim omnis consequuntur laudantium! Quia odit cum veritatis accusantium dolores dolor, magnam odio sunt modi fugit aspernatur in ad provident. Ad natus cum et pariatur inventore similique, qui, iure fuga eveniet ducimus hic tenetur excepturi? Totam, voluptatibus? Cupiditate quibusdam nisi expedita consequuntur vitae magni reprehenderit, facilis tempore ipsum quaerat velit sit iste esse optio ex recusandae harum.</p>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="law-img">
                            <img src="images/Jus/vision.jpg" class="shadow-sm" alt="">
    
                        </div>
                    </div>
                </div> -->

                       
            </div>

            
          
         </div>
        </div>
      </section>
      <!--===================================== About Us Section Ends ===================================== -->

      



   


    <?php include("include/meet-people.php") ?>
    <?php include("include/client-inc.php") ?>




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
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
  <link rel="icon" href="images/Logo/fav-icon.png" type="image/x-icon">
  <!-- Stylesheets-->
  <link rel="stylesheet" type="text/css"
    href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/main.css">
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
  <!-- Preloader -->

<?php include("include/pre-loader.php") ?>

  <div class="page">

    <!-- Cookies Start -->

    <!-- <div class="disclaimer-page">
      <div id="cookieAcceptBar" class="cookieAcceptBar">

        <div class="container">
      <div class="disclaimer-wrapper">
       <div class="disclaimer-title">
         <h2>DISCLAIMER</h2>
       </div>
       <div class="disclaimer-content">
         <p>
         In compliance with the norms laid down by the Bar Council of India we are providing only basic information. Any user of this website is warned that the contents stated herein are not guaranteed to be accurate, up-to-date or complete. JUS LAW OFFICES disclaims all responsibilities and liabilities for interpretation or use of information contained on this website nor does it offers any warranty expressed or implied. The contents of this website shall not be construed as legal advise. The uses of the content of this site other than personal use are prohibited. The contents of the website is not an offer to represent you.
         </p>
         <p>
         The Website is neither intended to be nor is, a source or form of publicity, advertisement or solicitation of work and any contract herein should not be considered as an invitation to establish Lawyer client relationship.
         </p>
         <p>By seeking information about the firm and its practice through the link displayed below, you acknowledge that the same has been sought of your own accord.</p>
       </div>
      
      </div>
      <div class="disclaimer-btn">
       <button id="cookieAcceptBarConfirm" class="btn btn-success">Agree</button>
       <button id="cookieAcceptBarConfirm" class="btn btn-success btn-dis">Disagree</button>
       </div>
        </div>
     </div>
    </div> -->

    <!-- Cookies End -->


    <!--===================================== Header Section Start===================================== -->
    <?php include("include/header.php") ?>
    <!--===================================== Header Section Ends===================================== -->
    <!--===================================== Hero Section Start=====================================-->
    <section
      class="section swiper-container swiper-slider swiper-slider-corporate swiper-pagination-style-2 overlay-container over-lay-sn-2"
      data-loop="true" data-autoplay="3000" data-simulate-touch="true" data-nav="false">
      <div class="swiper-wrapper text-left ">
      <?php
          $data = getCarousel($db);
          $count=1;
          foreach($data as $row)
          {  
          
      ?>

        <div class="swiper-slide context-dark" data-slide-bg="admin/cms/top-carousel/<?=$row['banner']?>">
          <div class="swiper-slide-caption section-md  ">
            <div class="container">
              <div class="banner-overlay"></div>
              <div class="row"> 
                <div class="col-md-8">


                  <div class="banner-content">
                    <h3 data-caption-animate="fadeInRight" data-caption-delay="0"><?=$row['banner_title_small']?></h3>
                    <div class="banner-desc">
                      <p class="content-title" data-caption-animate="slideInUp" data-caption-delay="100"><span><?=$row['banner_title_main']?></span></p>

                    </div>
                    <a href="<?=$row['redirect_link']?>" data-caption-animate="fadeInLeft" data-caption-delay="0">know More...</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
            $count++;
            }
        ?>  

        
        
      </div>
      <!-- Swiper Pagination-->
      <div class="swiper-pagination"></div>
    </section>
            


    



    <!--===================================== News & Insight Start ===================================== -->
    <section class=" section section-sm section-top-0 section-fluid bg-gray-4 teamSection">
      <div class="fluid-container">
        <h3 class="special p-5">Knowledge Centre</h3>
        <div class="pagecontent">
          <div class="owl-carousel owl-theme" id="pageContent" data-center="true" data-animation-in="fadeIn"
            data-animation-out="fadeOut">

            <?php
                $query="SELECT * FROM `blogs` WHERE `status` = '1' ORDER BY id DESC ";
                $run=mysqli_query($db,$query);

                while($row = mysqli_fetch_assoc($run))
                {
 
              ?>
                <div class="item">
                  <div class="slider-img-pro">
                    <div class="slider-img">
                      <img src="admin/uploaded_images/<?=$row['blog_cover_image']?>" alt="<?=$row['blog_name']?>">
                    </div>
                    <div class="slider-content">
                      <h3 class="kccatlist-1"><?=$row['blog_name']?></h3>
                      <div class="inner-content">
                        <!-- <span class="inner-text"><?=$row['blog_description']?></span> -->
                        <span class="inner-text" id="blog_page_description"><?php echo strip_tags($row['blog_description']);?></span>

                        <span class="read-more">
                          <a href="blog-detail.php?blog_code=<?=$row['blog_code']?>">Read More</a>
                        </span>
                      </div>
                    </div>
                    <div class="slider-overlay"></div>
                  </div>
                </div>
            <?php
                }
              ?>


          
          </div>
        </div>
      </div>
    </section>



    <!-- circle rounded -->
    <section class="circle section-relative">
      <div class="container">
        <div class="row">
          <div class="col-lg-8"></div>
          <div class="col-lg-4">
            <div class="main-circle">
              <div class="circle__inner">
                <div class="circle__wrapper">
                  <div class="circle__content">
                    <h4>Meet our people</h4>
                    <div class="circle__content__rte">


                      <a href="team.php">View all</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end circle rounded -->


    <!--===================================== News & Insight End ===================================== -->

    
    <!--===================================== Our Practices Area Start===================================== -->
    <section class="section section-sm section-relative bg-gray-4">
      <div class="container">
        <h3 class="special">Practice Area</h3>
        <!-- <div class="line"></div> -->
        <div class="row row-30">
          <?php
              $data = getAllPracticeArea($db); 
              $count=1;
              foreach($data as $row)
              {
          ?>
              <div class="col-sm-6 col-lg-4">
                <article class="box-icon-classic">
                  <div class="unit box-icon-classic-body">
                    <div class="unit-img unit-img-modify">
                        <img src="admin/uploaded_practice_area/<?= $row['cover_image']?>" alt="<?=$row['title']?>">
                    </div>

                    <div class="unit-body">
                      <h5 class="box-icon-classic-title blue-title"><a href="famil-law.php"><?=$row['title']?></a></h5>
                      <p class="box-icon-classic-text truncate">  <?php echo strip_tags($row['content']);?> </p>
                      <p class="read-more">
                          <a href="practice-area-details.php?area=<?=$row['slug']?>">Read More</a>
                      </p>
                    </div>
                  </div>
                </article>
              </div>
          <?php
              }
          ?>


          <!-- <div class="col-sm-6 col-lg-4">
            <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img unit-img-modify">
                  <img src="images/practice/cri-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title blue-title"><a href="criminal-law.php">CRIMINAL-LAW</a></h5>
                  <p class="box-icon-classic-text">Criminal law in India means offenses against the state, it includes
                    felonies and misdemeanors. The standard of proof for crimes is "beyond a reasonable doubt</p>
                  <p class="read-more">
                    <a href="criminal-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article>
          </div> -->
         
        </div>
        <!-- btn -->
      </div>
      <div class="margin custom-margin"><a href="practice-area.php"
          class="btn-double-border-left cust-btn-color border-gold bg-gold-on-hover color-gold"> View All Practice's
          Area... </a></div>
    </section>
    <!--===================================== Our Practices Area Ends ===================================== -->








    <!--===================================== Testimonial Section Start===================================== -->
    <section class="section section-sm section-last bg-gray-4">
      <div class="container">
        <h3 class="special">What People Say</h3>
        <!-- <div class="line"></div> -->
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="20" data-margin="30" data-dots="true"
          data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">

          <?php
             $data = getTestimonials($db); 
             foreach($data as $row)
             {
          ?>
          <!-- Quote Lisa-->
          <article class="quote-lisa">
            <div class="quote-lisa-body">
              <a class="quote-lisa-figure" href="#"><img class="img-circles" src="admin/cms/uploaded_testimonials/<?=$row['image']?>" alt=""
                  width="100" height="100" /></a>
              <div class="quote-lisa-text">
                <p class="q"><?=$row['feedback']?></p>
              </div>
              <h5 class="quote-lisa-cite"><a href="#"><?=$row['name']?></a></h5>
              <!-- <p class="quote-lisa-status">Regular Client</p> -->
            </div>
          </article>
          <?php
             }
          ?>

 

          <!-- Quote Lisa-->
          <!-- <article class="quote-lisa">
            <div class="quote-lisa-body">
              <a class="quote-lisa-figure" href="#"><img class="img-circles" src="images/Logo/user-1.png" alt=""
                  width="100" height="100" /></a>
              <div class="quote-lisa-text">
                <p class="q">Sodales ut etiam sit amet nisl purus. Maecenas accumsan lacus vel facilisis volutpat est.
                  Suscipit adipiscing bibendum est ultricies integer quis auctor. Viverra aliquet eget sit amet tellus
                  cras adipiscing. Posuere ac
                  ut consequat semper viverra nam libero justo laoreet. Iaculis eu non diam phasellus vestibulum lorem
                  sed risus ultricies.</p>
              </div>
              <h5 class="quote-lisa-cite"><a href="#">Rupert Wood</a></h5>
              <p class="quote-lisa-status">Regular Client</p> 
            </div>
          </article> -->
          
        </div>
      </div>
    </section>
    <!--===================================== Testimonial Section End===================================== -->

    <!--===================================== Our Clients Section Start===================================== -->
    <section class="section section-sm section-top-0 section-fluid  bg-default">
      <div class="container-fluid">
        <h6 class="special">Our Client's</h6>
        <!-- <div class="line"></div> -->
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-classic owl-dots-secondary" data-items="2" data-sm-items="2" data-md-items="5"
          data-lg-items="6" data-xl-items="8" data-xxl-items="10" data-stage-padding="15" data-xxl-stage-padding="20"
          data-margin="30" data-autoplay="true" data-nav="true" data-dots="false">
          <!-- Thumbnail Classic-->
          <?php
             $data = getClient($db); 
             foreach($data as $row)
             {
          ?>
          <article class="thumbnail thumbnail-mary">
            <div class="thumbnail-mary-figure"><img src="admin/cms/uploaded_clients/<?=$row['client_logo']?>" alt="<?=$row['client_logo']?>" width="270" height="195" />
            </div>
            <div class="thumbnail-mary-caption">
              <a class="icon fl-bigmug-line-zoom60" href="admin/cms/uploaded_clients/<?=$row['client_logo']?>" data-lightgallery="item"><img
                  src="images/client/1.png" alt="" width="270" height="195" /></a>
            </div>
          </article>
          <?php
             } 
          ?>

        </div>
      </div>
    </section>
    <!--===================================== Our Clients Section End===================================== -->


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
<script>
  $('#pageContent').owlCarousel({
    center: true,
    autoplay: false,
    autoplayTimeout: 3000,
    // autoplayHoverPause:true,
    dots: false,
    items: 2,
    loop: true,
    margin: 20,

    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      }

    }
  });
</script>
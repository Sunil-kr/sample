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







    <!--===================================== contact Hero Section Start ===================================== -->

    <!-- Breadcrumbs -->
    <!-- <ul class="breadcrumbs-custom-path breadcrumbs-ul">
              <li><a href="index.php">Home</a></li>
              <li class="active">Contact</li>
    </ul> -->

    <section class="contact_banner">
      <div class="contact_bn_info">
        <h2>Contact Us</h2>
        <ul class="breadcrumbs-custom-path breadcrumbs-ul contact_breadcrumbs">
          <li><a href="index.php">Home</a></li>
          <li class="active">Contact</li>
        </ul>
        <div class="contact_opacity"></div>
      </div>

    </section>

    <!--===================================== Contact Hero Section Ends ===================================== -->



    <!-- Contact information-->


    <section class="section section-sm new_contact">
      <div class="container-fluid col-10">
        <div class="row">
          <div class="col-md-6">
            <div class="new-law-img">
              <?php
                  $data = getContact_us_cover($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                 
              ?>
              <!--<img src="admin/cms/uploaded_contact_us/contact-us.webp" alt="">-->
              <img src="admin/cms/uploaded_contact_us/<?=$row['content']?>" alt="">
              <?php
                  }
              ?>
            </div>
          </div>
          <div class="col-md-6">


            <div class="row contact_info ">
              <div class="col-3"> 
                <div class="contact_icon p-2  ">
                  <span><i class="fa fa-phone-square" aria-hidden="true"></i></span>
                </div>
              </div>

              <div class="col-9">
                <div class="contact_detail">
                  <span class="span_1">Mobile :</span>
                  <?php
                  $data = getContact_us_mobile($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                  ?>
                    <!-- <span class="span_2">+91-9811267045</span> -->
                    <span><a  class="span_2" href="tel:<?=$row['content']?>">+91-<?=$row['content']?></a></span>
                  <?php
                  }
                  ?>
                </div>
              </div>

            </div>

            <div class="row contact_info ">
              <div class="col-3">
                <div class="contact_icon p-2  ">
                <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                </div>
              </div>

              <div class="col-9">
                <div class="contact_detail">
                  <span class="span_1">Email :</span>
                  <?php
                  $data = getContact_us_email($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                  ?>
                    <!-- <span class="span_2">info@juslawoffices.com</span> -->
                    <span ><a class="span_2" href="mailto:<?=$row['content']?>"><?=$row['content']?></a></span>
                 <?php
                  }
                  ?>
                </div>
              </div>

            </div>

            <div class="row contact_info ">
              <div class="col-3">
                <div class="contact_icon p-2  ">
                <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                </div>
              </div>

              <div class="col-9">
                <div class="contact_detail">
                    <span class="span_1">Address :</span>
                    <?php
                  $data = getContact_us_address($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                  ?>
                    <!-- <span class="span_2"> KD-113, Near Kohat Enclave Metro  <br> Station, Pitampura, Delhi-110034</span> -->
                    <span> <a href="#" class="span_2"><?=$row['content']?></a></span>
                    <?php
                  }
                  ?>
                </div>
              </div>

            </div>




          </div>
        </div>
      </div>
    </section>




    <!-- Google Map -->
    <section class="section mt-5 mb-5">
      <div class="container-fluid col-10">
        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d91733.34064431701!2d77.11673065258368!3d28.724505111192062!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd0adc0307e50bbe1!2sJUS%20LAW%20OFFICES!5e0!3m2!1sen!2sca!4v1673434803379!5m2!1sen!2sca" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
        <div class="row">
          <div class="col-md-6">
            <article class="title-classic">
              <div class="title-classic-title">
                <h3 class="blue-title">Get in touch</h3>
              </div>
              <!--<div class="title-classic-text">-->
              <!--  <p class="blue-para">If you have any questions, just fill in the contact form, and we will answer you shortly.</p>-->
              <!--</div>-->
            </article>
            <form class=" g-3 pt-3" action="email.php" method="post">

              <div class="row row-14 gutters-14">
                <div class="col-md-4">
                  <div class="form-wrap">
                    <input class="form-input" id="contact-your-name-2" type="text" name="name" required>
                    <label class="form-label" for="contact-your-name-2">Your Name</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-wrap">
                    <input class="form-input" id="contact-email-2" type="email" name="email" required>
                    <label class="form-label" for="contact-email-2">E-mail</label>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-wrap">
                    <input class="form-input" id="contact-phone-2" type="tel" name="phone" required>
                    <label class="form-label" for="contact-phone-2">Phone</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-wrap">
                    <label class="form-label" for="contact-message-2">Message</label>
                    <textarea class="form-input textarea-lg" id="contact-message-2" name="message" required></textarea>
                    <!-- <textarea class="form-input textarea-lg" id="contact-message-2" name="message" required data-constraints="@Required"></textarea> -->
                  </div>
                </div>
              </div>
              <button class="button button-primary button-pipaluk" name="Send_mail" type="submit">Send Message</button>
            </form>
          </div>
          <div class="col-md-6">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d91733.34064431701!2d77.11673065258368!3d28.724505111192062!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xd0adc0307e50bbe1!2sJUS%20LAW%20OFFICES!5e0!3m2!1sen!2sca!4v1673434803379!5m2!1sen!2sca"
              width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>

        </div>

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
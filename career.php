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


    <!--===================================== Career Section Ends===================================== -->
     <!-- Breadcrumbs -->
     <ul class="breadcrumbs-custom-path breadcrumbs-ul">
              <li><a href="index.php">Home</a></li>
              <li class="active">Career</li>
            </ul>
    
 

      <!-- ! -->
      <section class="section section-relative law-container ">
        <div class="container">
         <div class="">
            <div class="new-law-img">
            <?php
                  $data = getCareer_cover($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                 
                     
              ?>
                      <img src="admin/cms/uploaded_career/<?=$row['cover_image']?>" alt="<?=$row['heading']?>">
                <?php
                }
              ?>
            </div>
            <?php
                  $data = getCareer_content($db);
                  $count=1;
                  foreach($data as $row1)
                  { 
                 
                     
              ?>
                  <div class="new-law-dec shadow-sm">
                  <h3 class="blue-title"><?=$row1['heading']?></h3>
                  <!-- <h3 class="text-spacing-25 font-weight-normal title-opacity-9">Family-Law</h3> -->
                  <p class="blue-para"><?=$row1['content']?></p>
                
            </div>
            <?php
                  }
            ?>
         </div>
        </div>
      </section> 


        <!-- Contact Form-->
        <section class="section section-sm section-last bg-default text-left">
            <div class="container">
              <article class="title-classic">
                <div class="title-classic-title">
                  <h3 class="blue-title">Apply Here</h3>
                </div>
                <div class="title-classic-text">
                  <p class="blue-para">If you have any questions, just fill in the contact form, and we will answer you shortly.</p>
                </div>
              </article>
              <!-- <form class="rd-form"  method="post" action="career-query.php"> -->
              <form class="rd-form"  method="post" action="https://formsubmit.co/info@juslawoffices.com" enctype="multipart/form-data">
                <div class="row row-14 gutters-14">

                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-your-name-2" type="text" name="Name" data-constraints="@Required" required>
                      <label class="form-label" for="contact-your-name-2">Your Name</label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email-2" type="tel" pattern="[6-9]{1}[0-9]{1}[0-9]{4}[0-9]{4}" maxlength="10" name="Mobile no." data-constraints=" @Required" required>
                      <label class="form-label" for="contact-email-2">Mobile Number</label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email-2" type="email" name="Email" required>
                      <label class="form-label" for="contact-email-2">E-mail</label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="graduation-year" type="text" name="Year Of Graduation" data-constraints="@text" required>
                      <label class="form-label" for="graduation-year">Year Of Graduation</label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="university-name" type="text" name="University Name" data-constraints="@text" required>
                      <label class="form-label" for="university-name">University Name</label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-wrap">
                      <input class="form-input" id="current-position" type="text" name="Present Company / Law Firm" data-constraints="@text" required>
                      <label class="form-label" for="current-position">Present Company / Law Firm</label>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-wrap">
                      <input class="form-input" id="interested-position" type="text" name="Interested Practice Area" data-constraints="@text" required>
                      <label class="form-label" for="interested-position">Interested Practice Area</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                          <!-- <div class="selectBtn" data-type="firstOption">Preferred Location</div> -->
                          <select name="Preferred Location" id="status" class="form-control" required>
                              <option value="" >Preferred Location...</option>
                              <option value="Delhi">Delhi</option>
                              <option value="Mumbai">Mumbai</option>
                              <option value="Lucknow">Lucknow</option>
                              
                          </select>
                  </div>

                  <div class="col-md-6">
                  
                      <!-- <label for="inputName5" class="form-label">Choose Your Preferred Role </label>    -->
                      <select name="Preferred Role" id="status" class="form-control" required>
                          <option value="" >Choose Your Preferred Role...</option>
                          <option value="Internship">Internship</option>
                          <option value="Associates">Associates</option>
                      </select>
                  </div>

                  <div class="col-md-12">
                        <div class="file-upload">
                            <!-- <div class="file-select">
                              <div class="file-select-button" id="fileName">Choose File</div>
                              <div class="file-select-name" id="noFile">No file chosen...</div> 
                            </div> -->
                            <input type="file" id="resume" name="Attachment" accept="application/pdf">

                          </div>
                          <!-- <label for="inputName5" class="form-label">Choose File<small class="text-danger fw-bold">(Max. size 500kb png/jpg/jpeg, Diemension 1920x600px) </small></label>
                          <input type="file" class="form-control" required name="resume"> -->
                    </div>



                  <div class="col-md-12">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-message-2">Message</label>
                      <textarea class="form-input textarea-lg" id="contact-message-2" name="message" data-constraints="@Required" required></textarea>
                    </div>
                  </div>
                    
                 
                 
                    <div class="sumbit_btn">
                      <button class="button button-black-outline button-md" name="career_mail" type="submit">Submit</button>
                    </div>
                 
                  
                </div>
              </form> 
            </div>
          </section>

        
    <!--===================================== Career Section Ends===================================== -->



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


  
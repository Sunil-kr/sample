<?php 
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

     <!-- Breadcrumbs -->
     <ul class="breadcrumbs-custom-path breadcrumbs-ul">
              <li><a href="index.php">Home</a></li>
              <li class="active">Criminal-Law</li>
            </ul>
     

     


      <section class="section section-relative law-container ">
        <div class="container">
         <div class="">
            <div class="new-law-img">
                <img src="images/practice/cri-law.jpg" alt="">
            </div>
            <div class="new-law-dec shadow-sm">
              <h3 class="blue-title">Criminal-Law</h3>
                <!-- <h3 class="text-spacing-25 font-weight-normal title-opacity-9">Criminal-Law</h3> -->
                <p class="blue-para">Criminal law in India means offenses against the state, it includes felonies and misdemeanors. The standard of proof for crimes is "beyond a reasonable doubt." Indian Criminal Laws are divided into three major acts i.e. Indian Penal Code, 1860, Code of Criminal Procedure, 1973 and Indian Evidence Act, 1872. Besides these major acts, special Criminal Laws are also passed by Indian Parliament i.e. NDPS, Prevention of Corruption Act, Food Adulteration Act, Dowry Prevention Act, etc. thousands of minor laws are made in India. A body of rules and statutes that defines conduct prohibited by the government because it threatens and harms public safety and welfare and that establishes punishment to be imposed for the commission of such acts.</p>
                <p class="blue-para">The term criminal law means crimes that may establish punishments. In contrast, Criminal Procedure describes the process through which the criminal laws are enforced. For example, the law prohibiting murder is a substantive criminal law. The manner in which government enforces this substantive law through the gathering of evidence and prosecution is generally considered a procedural matter. Indian legal system considers a person "innocent until proven guilty" and therefore the arrest of a person will be a violation of citizen’s fundamental right of Article 21 of Constitution "No person shall be deprived of his life or personal liberty except according to the procedure established by law." Arrest of an accused is not a punishment as mob opinion dictates but it’s merely done in order to ensure the presence of the accused in trial in connection with any offence to which he is directly or indirectly connected or to prevent the commission of a criminal offence. In a free society the personal liberty of a person is of utmost importance and even the sovereign is also not allowed to take it away without any reasonable reason and strictly according to the procedure established by law.</p>
                        
            </div>
         </div>
        </div>
      </section>
      <!--=====================================Family-Law Section End =====================================-->





        <!-- ! Major Practice Area Carousel -->
        <section class="section section-sm section-top-0 section-fluid section-relative bg-gray-4">
          <div class="container-fluid">
              <h3 class="special">Practice Area</h3>
            <!-- <div class="line"></div> -->
            <div class="row">
              <div class="col-md-12">
                <div id="news-slider" class="owl-carousel customCarousel" data-items="1" data-sm-items="1" data-md-items="2"
                  data-lg-items="3" data-xl-items="3" data-xxl-items="3" data-stage-padding="0" data-xxl-stage-padding="0"
                  data-margin="10" data-autoplay="true" data-nav="true" data-dots="false" data-animation-in="fadeIn"
                  data-animation-out="fadeOut" data-autoplay="true">
                  <!-- Family-law -->
                  <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/fam-law.jpg" alt="">
                </div>

                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="famil-law.php">FAMILY-LAW</a></h5>
                  <p class="box-icon-classic-text">Marriages are made in heaven, or so it is said. But we are more often
                    than not made to wonder what happens to them by the time they descend to earth. Due to the emo </p>
                  <p class="read-more">
                    <a href="famil-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article>
                    <!-- Criminal-law -->
                    <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/cri-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="criminal-law.php">CRIMINAL-LAW</a></h5>
                  <p class="box-icon-classic-text">Criminal law in India means offenses against the state, it includes
                    felonies and misdemeanors. The standard of proof for crimes is "beyond a reasonable doubt</p>
                  <p class="read-more">
                    <a href="criminal-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article>
                    <!-- Arbitration-law  -->
                    <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/att-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="arbitration-law.php">ARBITRATION LAW</a></h5>
                  <p class="box-icon-classic-text">The Indian law of arbitration is contained in the Arbitration and
                    Conciliation Act 1996 (Act). The Act is based on the 1985 UNCITRAL Model Law on International
                    Commercial.
                  </p>
                  <p class="read-more">
                    <a href="arbitration-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article>
                    <!-- Corporate-law -->
                    <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/cop-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="corporate-law.php">CORPORATE LAW</a></h5>
                  <p class="box-icon-classic-text">Corporate Law deals with the formation and operations of corporations
                    and is related to commercial and contract law. A corporation is a legal entity created under the
                    laws.
                  </p>
                  <p class="read-more">
                    <a href="corporate-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article>
                    <!-- Civil-law -->
                    <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/civ-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="civil-law.php">CIVIL LAW</a></h5>
                  <p class="box-icon-classic-text">Civil law deals with the disputes between individuals, organizations,
                    or between the two, in which compensation is awarded to the victim. A defendant in civil litigation
                    is nev.</p>
                  <p class="read-more">
                    <a href="civil-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article>
                    <!-- labour-law -->
                    <article class="box-icon-classic">
              <div class="unit box-icon-classic-body">
                <div class="unit-img">
                  <img src="images/practice/lab-law.jpg" alt="">
                </div>
                <div class="unit-body">
                  <h5 class="box-icon-classic-title"><a href="labour-law.php">LABOUR LAWS</a></h5>
                  <p class="box-icon-classic-text">The constitution of India confers innumerable rights for the
                    protection of labour. Indian constitution through various articles protects, supports, and acts as a
                    guidel.
                  </p>
                  <p class="read-more">
                    <a href="labour-law.php">Read More</a>
                  </p>
                </div>
              </div>
            </article>
                </div>
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
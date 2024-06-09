<!-- <br><br> -->
<?php 
include ("admin/includes/db.php");
include ("admin/includes/function.php");
error_reporting(0);

if(!empty($_GET['blog_code']))
{
  $blog_code = $_GET['blog_code'];

  $sql = "SELECT * FROM `blogs` WHERE `blog_code` = '$blog_code' ";
  $output = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($output);

  // $row['blog_name'];


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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
        <li class="active">Blog</li>
      </ul>


      <div class="col-md-4" id="success_alert" style="display:none; position: fixed; right: 0; top: 110px; z-index:9999">
          <div class="alert text-left alert-success alert-dismissible fade show" role="alert">
            <strong>Thanks</strong> for adding your review.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      </div>

      <div class="col-md-4" id="failed"  style="display:none; position: fixed; right: 0; top: 110px">
          <div class="alert text-left alert-danger alert-dismissible fade show" role="alert">
            <strong>Something</strong> went wrong!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
      </div>



    <!--===================================== Blog Section Ends ===================================== -->

    <section class="blog-posts grid-system section-relative">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="all-blog-posts">
                <div class="row">
                <?php
                  $sql = "SELECT * FROM `blogs` WHERE `blog_code` = '$blog_code' ";
                  $output = mysqli_query($db, $sql);
                  $row = mysqli_fetch_assoc($output);

                ?>

                  <div class="col-lg-12">
                    <div class="blog-post ">
                      <div class="blog-thumb">
                        <img src="admin/uploaded_images/<?=$row['blog_cover_image']?>" alt="<?=$row['blog_name']?>">
                      </div>
                      <div class="down-content shadow-sm">
                      <span class="kccatlist"><a href="#"><?=$row['blog_category_name']?></a></span>
                        <a href="#"><h4><?=$row['blog_name']?></h4></a>
                        <ul class="post-info">
                          <li><a href="#"><?=$row['author']?></a></li>
                          <li><a href="#">
                              <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00">
                                  <?= date('F jS, Y',strtotime($row['created_at']))?>
                              </time>
                            </a>
                          </li>
                          <!-- <li><a href="#">10 Comments</a></li> -->
                        </ul>
                        <p> <?php echo $row['blog_description'];?></p>

                        <div class="post-options">
                          <div class="row">
                            <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <!-- <li><a href="#">Trending Topic</a>,</li> -->
                              <li><a href="#">By JLO Editorial</a></li>
                            </ul>
                            </div>
                            <div class="col-6">
                              <ul class="post-share">
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><a href="#">Facebook</a>,</li>
                                <li><a href="#"> Twitter</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-12">
                    <div class="sidebar-item comments" id="comment_section"> 
                      <?php
                            $blog_code = $row['blog_code'];

                            $query="SELECT * FROM `blog_comments` WHERE `blog_code` = '$blog_code' ORDER BY id DESC ";
  
                            $run=mysqli_query($db,$query);

                            $num = mysqli_num_rows($run);
                            
                            if($num>0)
                            {
                      ?>
                            <div class="sidebar-heading">
                              <h2><?=$num?> comments</h2>
                            </div>
                            <?php
                            }
                            ?>


                      <div class="content">
                        <ul>
                          
                          <?php
                            while($fetch = mysqli_fetch_assoc($run))
                            {
                              // echo $row['name'];

                          ?>
                                <li>
                                  <div class="author-thumb">
                                    <img src="admin/user.jpg" alt="">
                                  </div>
                                  <div class="right-content">
                                    <h4><?=$fetch['name']?>
                                      <span>
                                          <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00">
                                              <?= date('F jS, Y',strtotime($fetch['created_at']))?>
                                          </time>
                                      </span>
                                    </h4>
                                    <p><?=$fetch['comment']?></p>
                                  </div>
                                </li><br>
                            <?php 
                                $count++;
                                }
                            ?>  

                          <!-- <li class="replied">
                            <div class="author-thumb">
                              <img src="images/Jus/2.png" alt="">
                            </div>
                            <div class="right-content">
                              <h4>TechBinge<span>Jan 14, 2023</span></h4>
                              <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore ab ut deserunt ipsa maiores nam.</p>
                            </div>
                          </li>
                           -->


                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12" >
                    <div class="sidebar-item submit-comment" >
                      <div class="sidebar-heading">
                        <h2>Your comment</h2>
                      </div>
                      <div class="content">
                        <!-- <form id="comment_form" action="admin/includes/function.php" method="post"> -->
                        <form id="comment_form">
                          <div class="row">

                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your name" required>
                              </fieldset>
                            </div>

                            <div class="col-md-6 col-sm-12 d-none">
                              <fieldset>
                                <input name="blog_code" value="<?=$row['blog_code']?>" type="text" id="blog_code" placeholder="Your name" required>
                              </fieldset>
                            </div>

                            <div class="col-md-6 col-sm-12 d-none">
                              <fieldset>
                                <input name="blog_name" value="<?=$row['blog_name']?>" type="text" id="blog_name" placeholder="Your name" required>
                              </fieldset>
                            </div>

                            <div class="col-md-6 col-sm-12 d-none">
                              <fieldset>
                                <input name="blog_category_code" value="<?=$row['blog_category_code']?>" type="text" id="blog_category_code" placeholder="Your name" required>
                              </fieldset>
                            </div>

                            <div class="col-md-6 col-sm-12 d-none">
                              <fieldset>
                                <input name="blog_category_name" value="<?=$row['blog_category_name']?>" type="text" id="blog_category_name" placeholder="Your name" required>
                              </fieldset>
                            </div>

                            <div class="col-md-6 col-sm-12">
                              <fieldset>
                                <input name="email" type="email" id="email" placeholder="Your email" required>
                              </fieldset>
                            </div>
                    
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message"  rows="6" id="message" placeholder="Type your comment" required></textarea>
                              </fieldset>
                            </div>

                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" name="blog_comment" class="main-button">Submit</button>
                              </fieldset>
                            </div>

                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <!-- Sidebar -->
           <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">


                    <!-- Dynamic Search bar -->
                    <form class="form-search" >
                      <input type="text" class="text-lowercase" placeholder="search here.." id="myInput_header" onkeyup="filterFunction_header(this.value)" >
                      
                      <ul class="list datatable dropdown_content_header shadow"  id="myDropdown_header" >
                              <!-- <li> li tag with data dynamically coming from backend </li> -->
                      </ul>
                    </form>
                     <!-- Dynamic Search bar -->


                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item recent-posts">
                    <div class="sidebar-heading">
                      <h2>Recent Posts</h2>
                    </div>
                    <div class="content">
                      <ul>
                      <?php

                        $data = getAllBlogs($db); 
                        $count=1;
                        foreach($data as $row)
                        {
                          $blog_code = $row['blog_code'];
                      ?>
                          <li><a href="blog-detail.php?blog_code=<?=$blog_code?>">
                          <h5><?=$row['blog_name']?></h5>
                          <span>
                            <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00">
                                <?= date('F jS, Y',strtotime($row['created_at']))?>
                            </time>
                          </span>
                        </a></li>
                  
                        <!-- <li><a href="post-details.php">
                          <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, esse!</h5>
                          <span>Jan 14, 2023</span>
                        </a></li> -->
                      <?php 
                        
                        $count++;
                        }
                        ?>
                       
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item categories">
                    <div class="sidebar-heading">
                      <h2>Categories</h2>
                    </div>
                    <div class="content">
                      <ul>
                      <?php

                      $data = getBlogCateg($db); 
                      $count=1;
                      foreach($data as $row_cat)
                      {
                      ?>
                        <li><a href="blog.php?blog_categ=<?=$row_cat['blog_categ_code']?>">- <?=$row_cat['blog_categ']?></a></li>
                        <!-- <li><a href="#">- Criminal Law</a></li>
                        <li><a href="#">- Arbitration Law </a></li>
                        <li><a href="#">- Corporate Law</a></li>
                        <li><a href="#">- Civil Law</a></li>
                        <li><a href="#">- Labour Law</a></li> -->
                      <?php 
                        $count++;
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                      <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                      <ul>
                      <?php

                        $data = getBlogCateg($db); 
                        $count=1;
                        foreach($data as $row_cat)
                        {
                        ?>
                          <li><a href="blog.php?blog_categ=<?=$row_cat['blog_categ_code']?>">- <?=$row_cat['blog_categ']?></a></li>
                          <!-- <li><a href="#">- Criminal Law</a></li>
                          <li><a href="#">- Arbitration Law </a></li>
                          <li><a href="#">- Corporate Law</a></li>
                          <li><a href="#">- Civil Law</a></li>
                          <li><a href="#">- Labour Law</a></li> -->
                        <?php 
                          $count++;
                          }
                          ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
      </section>
    <!--===================================== Blog Section Ends ===================================== -->


  
    


     <!--=====================================Footer Section Start =====================================-->
     <footer>
      <div class="content">
        <div class="top">
          <div class="logo-details">
            <!-- <i class="fab fa-slack"></i> -->
            <span class="logo_name">JUS OFFICE'S</span>
            <!-- <span class="logo_name"><img src="images/Jus/logo.png" alt=""></span> -->
          </div>
          <div class="media-icons">
            <!-- <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a> -->
            <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
              <li><a class="icon fa fa-facebook" href="#"></a></li>
              <li><a class="icon fa fa-twitter" href="#"></a></li>
              <li><a class="icon fa fa-google-plus" href="#"></a></li>
              <li><a class="icon fa fa-instagram" href="#"></a></li>
            </ul>
          </div>
        </div>
        <div class="link-boxes">
          <ul class="box">
            <li class="link_name">About Us</li>
            <div class="about_des">
              <p>
                Jus Law Offices is an ultramodern full legal service firm based in New Delhi, India. Associates of the
                firm are organized in accordance with the principles of team management so as to ensure and render
                composite and integrated professional service.
              </p>
            </div>
          </ul>
          <ul class="box">
            <li class="link_name">Useful Links</li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="team.php">Our Dedicated Team</a></li>
            <li><a href="client.php">Clientele</a></li>
            <li><a href="career.php">Internships</a></li>
            <li><a href="practice.php">Practice Area's</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
          </ul>
          <ul class="box">
            <li class="link_name">Contact Info</li>
            <li><a href="#">
                <span>Address : </span>
                <span>KD-113, Near Kohat Enclave Metro Station, Pitampura, Delhi-110034</span>
              </a></li>
            <li><a href="#">
                <span>Office Timeing : </span>
                <span>09:00 AM - 08:00 PM</span>
              </a></li>
            <li><a href="#">
                <span>Mobile : </span>
                <span>+91-9811267045 | +91 11-47504672</span>
              </a></li>
            <li><a href="#">
                <span>Email : </span>
                <span>info@juslawoffices.com</span>
              </a></li>
          </ul>
          <!-- <ul class="box">
              <li class="link_name">Courses</li>
              <li><a href="#">HTML & CSS</a></li>
              <li><a href="#">JavaScript</a></li>
              <li><a href="#">Photography</a></li>
              <li><a href="#">Photoshop</a></li>
            </ul> -->
          <ul class="box input-box">
            <li class="link_name">Get in Touch</li>
            <li><input type="text" placeholder="Enter your email"></li>
            <li><input type="button" value="Get in Touch"></li>
          </ul>
        </div>
      </div>
      <div class="bottom-details">
        <div class="bottom_text">
          <span class="copyright_text">Copyright © 2023 <a href="#">TechBinge.</a>All rights reserved</span>
          <span class="policy_terms">
            <a href="#">Privacy policy</a>
            <a href="#">Terms & condition</a>
          </span>
        </div>
      </div>
    </footer>
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

// Check if jquery is loaeded
// window.onload = function() {
//     if (window.jQuery) {  
//         // jQuery is loaded  
//         alert("Yeah!");
//     } else {
//         // jQuery is not loaded
//         alert("Doesn't Work");
//     }
// }

// ------------------------------------------------------
// Browse categories search filter starts here 
// ------------------------------------------------------


function filterFunction_header(value) {

// document.getElementById("myDropdown").classList.toggle("show");
myInput = value;

// alert(value);

document.getElementById("myDropdown_header").style.display ="block";

if(myInput !='')
{
  $.ajax({
      url:'admin/includes/get-search-suggestion.php',
      method:'POST',
      data: {

          myInput : myInput,
  
  },
  success: function (response) {

      // document.getElementById("myDropdown").innerHTML=response; 
      // alert(response);
      // $('#myDropdown').fadeIn();
      $('#myDropdown_header').slideDown();
      $('#myDropdown_header').html(response);
  }
  });

}
else
{
  $('#myDropdown_header').fadeOut();
  $('#myDropdown_header').html("");
}

}



// Function add comment using ajax


$(document).ready(function(){


    $("#comment_form").submit(function(){

      event.preventDefault();

        var name = $('#name').val();
        var email = $('#email').val();
        var blog_code = $('#blog_code').val();
        var blog_name = $('#blog_name').val();
        var blog_category_code = $('#blog_category_code').val();
        var blog_category_name = $('#blog_category_name').val();
        var message = $('#message').val();

        // alert(blog_category_name); 

        $.ajax({
          method:'POST',
          url: 'ajax-comment.php',
          data: {
                name: name,
                email: email,
                blog_code: blog_code,
                blog_name: blog_name,
                blog_category_code: blog_category_code,
                blog_category_name: blog_category_name, 
                message: message
          },
          success: function(response){
        
                // alert(response); 
                // document.getElementById("response").innerHTML=response; 
                // $("#response").html(response);


                if(response > 0)
                {
                    $("#success_alert").show();
                    $("#comment_section").load(window.location + " #comment_section");
                    // $("#comment_form").load(window.location + " #comment_form");
                }
                else
                {
                    $("#failed").show();
                    $("#comment_section").load(window.location + " #comment_section");
                }

          }

        });
    });

});




</script>

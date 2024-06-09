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



   



    <!--===================================== About Hero Section Start ===================================== -->

     <!-- Breadcrumbs -->

     <ul class="breadcrumbs-custom-path breadcrumbs-ul">
              <li><a href="index.php">Home</a></li>
              <li class="active">Blog</li>
            </ul>
     



    <section class="blog-posts section-relative grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                

              <?php
              
              $blog_categ_code = $_GET['blog_categ'];

              if(empty($blog_categ_code))
              {

                $data = getAllBlogs($db); 
                $count=1;
                foreach($data as $row)
                {

              ?>

                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <!-- <img src="images/Blog/blog-1.jpg" alt=""> -->
                      <img src="admin/uploaded_images/<?=$row['blog_cover_image']?>" alt="<?=$row['blog_name']?>">
                    </div>
                    <div class="down-content shadow-sm">
                      <span class="kccatlist"><a href="#"><?=$row['blog_category_name']?></a></span>
                      <a href="blog-detail.php"><h4><?=$row['blog_name']?></h4></a>
                      <ul class="post-info">
                        <!-- <li><a href="#">JLO</a></li> -->

                        <li><a href="#">
                            <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00">
                                <?= date('F jS, Y',strtotime($row['created_at']))?>
                            </time>
                        </a></li>
                        <!-- <li><a href="#">12 Comments</a></li> -->
                      </ul>
                      <p> <p id="blog_page_description"><?php echo strip_tags($row['blog_description']);?></p>
                        <span class="read-more">
                          <a href="blog-detail.php?blog_code=<?=$row['blog_code']?>">Read More</a>
                        </span>
                      </p>
                      
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-12">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <!-- <li><a href="#">Trending Topic</a>,</li> -->
                              <li><a href="#">By JLO Editorial</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              <?php 
                }
                $count++;
                }
                else
                {
                                   
                //  echo $blog_categ_code = $_GET['blog_categ'];

                  $query="SELECT * FROM `blogs` WHERE `blog_category_code` = '$blog_categ_code' ";

                  $run=mysqli_query($db,$query);

                  while($row = mysqli_fetch_assoc($run))
                  {
                  
                  ?>
                  <div class="col-lg-12">
                    <div class="blog-post">
                      <div class="blog-thumb">
                        <!-- <img src="images/Blog/blog-1.jpg" alt=""> -->
                        <img src="admin/uploaded_images/<?=$row['blog_cover_image']?>" alt="<?=$row['blog_name']?>">
                      </div>
                      <div class="down-content shadow-sm">
                        <span class="kccatlist"><a href="#"><?=$row['blog_category_name']?></a></span>
                        <a href="blog-detail.php"><h4><?=$row['blog_name']?></h4></a>
                        <ul class="post-info">
                          <!-- <li><a href="#">JLO</a></li> -->

                          <li><a href="#">
                              <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00">
                                  <?= date('F jS, Y',strtotime($row['created_at']))?>
                              </time>
                          </a></li>
                          <!-- <li><a href="#">12 Comments</a></li> -->
                        </ul>
                        <p> <p id="blog_page_description"><?php echo strip_tags($row['blog_description']);?></p>
                          <span class="read-more">
                            <a href="blog-detail.php?blog_code=<?=$row['blog_code']?>">Read More</a>
                          </span>
                        </p>
                        
                        <div class="post-options">
                          <div class="row">
                            <div class="col-lg-12">
                              <ul class="post-tags">
                                <li><i class="fa fa-tags"></i></li>
                                <!-- <li><a href="#">Trending Topic</a>,</li> -->
                                <li><a href="#">By JLO Editorial</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              }

              ?>  

                

                <!-- <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                      <img src="images/Blog/blog-2.jpg" alt="">
                    </div>
                    <div class="down-content shadow-sm">
                      <span class="kccatlist"><a href="#">Stock Market</a></span>
                      <a href="blog-detail.php"><h4>Lawyer's Blog Title</h4></a>
                      <ul class="post-info">
                        <li><a href="#">Admin</a></li>
                        <li><a href="#">Jan 14, 2023</a></li>
                        <li><a href="#">12 Comments</a></li>
                      </ul>
                      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque omnis magni quasi? Voluptas mollitia impedit hic corrupti aliquid dicta maxime vero expedita officia ad, minima labore architecto, reiciendis sint, eveniet omnis ut tenetur numquam nobis at placeat et tempore consequuntur? <span class="read-more">
                        <a href="blog-detail.php">Read More</a>
                      </span></p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-lg-12">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#">Trending Topic</a>,</li>
                              <li><a href="#">By JLO Editorial</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->


                <!-- Pagination -->
                <div class="col-lg-12">
                  <ul class="page-numbers">
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- Sidebar -->
          <div class="col-lg-4 mt-5">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                  <div class="sidebar-item search">
          
                    <form class="form-search" >
                      <input type="text" class="text-lowercase" placeholder="search here.." id="myInput_header" onkeyup="filterFunction_header(this.value)" >
                      
                      <ul class="list datatable dropdown_content_header shadow"  id="myDropdown_header" >
                              <!-- <li> li tag with data dynamically coming from backend </li> -->
                      </ul>
                    </form>
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


</script>

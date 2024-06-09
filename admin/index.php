
<?php
session_start();
require('includes/db.php');
include('includes/function.php');
error_reporting(0);
if(!isset($_SESSION['isAdminLoggedIn'])){
  header('Location: login.php'); 

} 

?> 
 
<!DOCTYPE html> 
<html lang="en"> 

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
 
  <title>JLO Admin</title>
  <meta content="" name="description">
  <meta content="" name="keywords"> 

  <!-- Favicons -->
    <link rel="icon" href="../img/fav.jpeg" type="image/png" />
 

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
 
   Export TABLE to Excell or CSV  -->
    <script type="text/javascript" src="includes/xlsx.full.min.js"></script>
  <!-- Export TABLE to Excell or CSV 

  ======================================================== -->


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="./index.php?dashboard" class="logo d-flex align-items-center">
        <img src="assets/img/jlo-logo.png" alt="" style="height: 80px">
     
      </a>
      <i class="bi bi-list toggle-sidebar-btn" id="linkid"></i>
    </div><!-- End Logo -->

    <div class="search-bar d-none">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto"> 
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Admin</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <hr class="dropdown-divider"> 
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

  </header>
  <!-- End Header -->



  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav"> 

      <li class="nav-item rounded-pill">
        <a class="nav-link " href="index.php?dashboard">
          <i class="bi bi-house-door-fill"></i> 
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-item rounded">
        <a class="nav-link collapsed nav-item" data-bs-target="#product" data-bs-toggle="collapse" href="index.php?manage-blogs">
          <i class="bi bi-pencil-fill"></i><span>Blogs</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="product" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?manage-blogs">
              <i class="bi bi-chevron-right fs-6"></i><span>Manage Blogs</span>
            </a>
          </li>
          <li>
            <a href="index.php?add-blog">
              <i class="bi bi-chevron-right fs-6"></i><span>Publish</span>
            </a>
          </li>
          <li>
            <a href="index.php?manage-category">
              <i class="bi bi-chevron-right fs-6"></i><span>Manage Category</span>
            </a>
          </li>
          <!-- <li>
            <a href="index.php?add-category">
              <i class="bi bi-chevron-right fs-6"></i><span>Create new </span>
            </a>
          </li> -->
          
          </li>
        </ul>
      </li><!-- End Blogs Nav -->



      <li class="nav-item rounded">
        <a class="nav-link collapsed nav-item" data-bs-target="#team" data-bs-toggle="collapse" href="index.php?manage-blogs">
          <i class="bi bi-people-fill"></i><span>Team</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="team" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?manage-team">
              <i class="bi bi-chevron-right fs-6"></i><span>Manage Team</span>
            </a>
          </li>
          <li>
            <a href="index.php?add-member">
              <i class="bi bi-chevron-right fs-6"></i><span>Add New</span>
            </a>
          </li>
  
          </li>
        </ul>
      </li><!-- End Blogs Nav -->



      <li class="nav-item rounded">
        <a class="nav-link collapsed nav-item" data-bs-target="#practice_area" data-bs-toggle="collapse" href="index.php?manage-blogs">
          <i class="bi bi-list-check"></i><span>Practice Area</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="practice_area" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="index.php?manage_practice_area">
              <i class="bi bi-chevron-right fs-6"></i><span>Manage Practice Area</span>
            </a>
          </li>
          <li>
            <a href="index.php?add_practice_area">
              <i class="bi bi-chevron-right fs-6"></i><span>Add New</span>
            </a>
          </li>
  
          </li>
        </ul>
      </li><!-- End Blogs Nav -->




      <li class="nav-item rounded">
        <a class="nav-link collapsed nav-item" data-bs-target="#cms" data-bs-toggle="collapse" href="#">
          <i class="bi bi-brush"></i><span>CMS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="cms" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      
          <li>
            <a href="index.php?cms-carousel">
              <i class="bi bi-chevron-right fs-6"></i><span>Top Banner</span>
            </a>
          </li>
          <li>
            <a href="index.php?cms-our-clients"> 
              <i class="bi bi-chevron-right fs-6"></i><span>Our Client</span>
            </a>
          </li>

          <li>
            <a href="index.php?cms-testimonials">
              <i class="bi bi-chevron-right fs-6"></i><span>Testimonials</span>
              
            </a>
          </li>

          <li>
            <a href="index.php?cms-logo">
              <i class="bi bi-chevron-right fs-6"></i><span>Logo</span>
              
            </a>
          </li>

          <li>
            <a href="index.php?cms-aboutus">
              <i class="bi bi-chevron-right fs-6"></i><span>About us</span>
              
            </a>
          </li>

          <li>
            <a href="index.php?cms-contactus">
              <i class="bi bi-chevron-right fs-6"></i><span>Contact us</span>
              
            </a>
          </li>

          <li>
            <a href="index.php?cms-career">
              <i class="bi bi-chevron-right fs-6"></i><span>Career</span>
            </a>
          </li>

          <li>
            <a href="index.php?disclaimer">
              <i class="bi bi-chevron-right fs-6"></i><span>Disclaimer</span>
            </a>
          </li>
          
          </li>
        </ul>
      </li><!-- End CMS Nav -->


 
      


      <li class="nav-item rounded-pill">
        <a class="nav-link collapsed" href="index.php?view-quiries">
          <i class="bi bi-people-fill"></i>
          <span>Quries</span>
        </a>
      </li>

      <li class="nav-item rounded-pill">
        <a class="nav-link collapsed" href="index.php?manage-comments">
          <i class="bi bi-chat-right-text-fill"></i>
          <span>Blog Comments</span>
        </a>
      </li>

      <li class="nav-item rounded-pill">
        <a class="nav-link collapsed" href="index.php?setting">
          <i class="bi bi-gear-fill"></i>
          <span>Setting</span>
        </a>
      </li>


      <li class="nav-item rounded-pill" style="position:absolute; bottom:10px; width: 86%">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li><!-- End Logout Page Nav -->


      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  


<?php


////////////////////////////////////////////////////////////////////////////////////////////
  /* dashboard */

  if(isset($_GET['dashboard']))
  {

    include('includes/dashboard.php');

  }




////////////////////////////////////////////////////////////////////////////////////////////
/* All-product */

  elseif(isset($_GET['manage-blogs']))
  {

    include('includes/manage-blogs.php');

  }



////////////////////////////////////////////////////////////////////////////////////////////
/* Manage Team */

  elseif(isset($_GET['manage-team']))
  {

    include('includes/manage-team.php');

  }



////////////////////////////////////////////////////////////////////////////////////////////
/* Manage Comment */

  elseif(isset($_GET['manage-comments']))
  {

    include('includes/manage-comments.php');

  }


  


////////////////////////////////////////////////////////////////////////////////////////////
/* Manage Team */

  elseif(isset($_GET['manage_practice_area']))
  {

    include('includes/manage-practice-area.php');

  }


  


////////////////////////////////////////////////////////////////////////////////////////////
/* Add-Team Member */

  elseif(isset($_GET['add-member']))
  { 

    include('includes/add-member.php');

  }


    
  
  


////////////////////////////////////////////////////////////////////////////////////////////
/* Add-Team Member */

  elseif(isset($_GET['add_practice_area']))
  { 

    include('includes/add-practice-area.php');

  }


    
  
 

////////////////////////////////////////////////////////////////////////////////////////////
/* Add-product */

  elseif(isset($_GET['add-blog']))
  {

    include('includes/add-blog.php');

  }


    
  
 

////////////////////////////////////////////////////////////////////////////////////////////
/* Add-product */

  elseif(isset($_GET['disclaimer']))
  {

    include('includes/cms-disclaimer.php');

  }


    


////////////////////////////////////////////////////////////////////////////////////////////
/* edit-product */

elseif(isset($_GET['edit_member']))
{

  include('includes/edit-member.php');
  
}


    


////////////////////////////////////////////////////////////////////////////////////////////
/* edit-product */

elseif(isset($_GET['edit_practice_area']))
{

  include('includes/edit-practice-area.php');
  
}


    


////////////////////////////////////////////////////////////////////////////////////////////
/* edit-product */

elseif(isset($_GET['edit_blog_code']))
{

  include('includes/edit-blog.php');
  
}



    


////////////////////////////////////////////////////////////////////////////////////////////
/* edit-product */

elseif(isset($_GET['Category_edit_unique_code']))
{

  include('includes/edit-category.php');
  
}




////////////////////////////////////////////////////////////////////////////////////////////
/* Add-category */

  elseif(isset($_GET['add-category']))
  {

    include('includes/add-category.php');

  }


  

  


////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-category */

  elseif(isset($_GET['manage-category']))
  {

    include('includes/manage-category.php');

  }


  


////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-category */

  elseif(isset($_GET['cms']))
  {

    include('includes/cms.php');

  }




////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-featured-product */

  elseif(isset($_GET['featured-product']))
  {

    include('includes/featured-product.php');

  }




////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-cms-carousel */

  elseif(isset($_GET['cms-carousel']))
  {

    include('includes/cms-carousel.php');

  }



 




////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-Our Clients */

  elseif(isset($_GET['cms-our-clients']))
  {

    include('includes/cms-our-clients.php');

  }



 




////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-Our Clients */

  elseif(isset($_GET['cms-testimonials']))
  {

    include('includes/cms-testimonials.php');

  }




////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-About us */

  elseif(isset($_GET['cms-aboutus']))
  {

    include('includes/cms-aboutus.php');

  }





////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-Career*/

  elseif(isset($_GET['cms-career']))
  {

    include('includes/cms-career.php');

  }





////////////////////////////////////////////////////////////////////////////////////////////
/* Manage- logo*/

  elseif(isset($_GET['cms-logo']))
  {

    include('includes/cms-logo.php');

  }



 


////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-Contact us */

  elseif(isset($_GET['cms-contactus']))
  {

    include('includes/cms-contact-us.php');

  }



 

////////////////////////////////////////////////////////////////////////////////////////////
/* Setting*/

elseif(isset($_GET['setting']))
{

  include('includes/setting.php');

}



 


////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-category */

  elseif(isset($_GET['new-arrivals']))
  {

    include('includes/cms-new-arrivals.php');

  }





////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-category */

  elseif(isset($_GET['best-selling']))
  {

    include('includes/cms-best-selling.php');

  }







////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-category */

  elseif(isset($_GET['top-rated']))
  {

    include('includes/cms-top-rated.php');

  }









////////////////////////////////////////////////////////////////////////////////////////////
/* INventory Quantity Update*/

  elseif(isset($_GET['product_qty_update_id'])) 
  { 

    include('includes/product-qty-update.php');

  }






////////////////////////////////////////////////////////////////////////////////////////////
/* Manage-category */

  elseif(isset($_GET['view-quiries']))
  {

    include('includes/view-quiries.php');

  }



////////////////////////////////////////////////////////////////////////////////////////////

else
{
  include('includes/dashboard.php');
}

?>
    

  <!-- ======= Footer ======= --> 
  <footer id="footer" class="footer">
    <div class="copyright">
      <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Website is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://techbinge.org" target="_blank">TechBinge</a></p>
    </div>
 
  </footer>
  <!-- End Footer -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

  
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 
  <!-- jquery ofline file  -->
  <script src="assets/js/jquery-3.6.0.js"></script>

  <script src="assets/js/bootstrap.min.js"></script>


  

</body>

</html>


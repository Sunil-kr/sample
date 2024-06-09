

<?php 
// include ("./admin/includes/db.php");
include ("cookie-consent.php");
error_reporting(0);
?>

<header class="section  page-header">
      <!-- RD Navbar-->
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
          data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
          data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static"
          data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static"
          data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px"
          data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">


          <!-- <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse">
            <span></span>
          </div> -->

          <!-- Mobile Menu -->
          <div class="rd-navbar-panel">
 
          <div class="rd-navbar-brand">
      
      <a class="brand" href="index.php"><img src="images/Logo/jlo-logo.png" alt="" width="225"
          height="18" /></a>
    </div>
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>


           
          </div>



          <div class="rd-navbar-main-outer">
            <div class="rd-navbar-main">
 
              <div class="rd-navbar-nav-wrap">

                <ul class="rd-navbar-nav navbar-links ul-display-none">
                  <li>
                    <?php
                      $sql = mysqli_query($db, "SELECT * FROM `cms_logo` WHERE `image_type` = 'Site Logo' ");

                      $row = mysqli_fetch_assoc($sql);
                    ?>
                    <a class="brand" href="index.php"><img src="./admin/cms/uploaded_logo/<?=$row['logo']?>" alt="" width="225"
                        height="18" /></a>
                  </li>
                </ul>
                 

                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav navbar-links">
                  <li class="rd-nav-item "><a class="rd-nav-link" href="team.php">People</a>
                  </li>
                  <li class="rd-nav-item navbar-dropdown rd-nav-link"><a class="text-dark" href="practice-area.php">Practice Area</a>
                    <div class="dropdown">
                      <?php
                          $data = getAllPracticeArea($db); 
                          $count=1;
                          foreach($data as $row)
                          {
                      ?>
                            <a href="practice-area-details.php?area=<?=$row['slug']?>"><?=$row['title']?></a>
                            
                            <!-- <a href="criminal-law.php">Criminal-Law</a>
                            <a href="arbitration-law.php">Arbitration-Law</a>
                            <a href="corporate-law.php">Corporate-Law</a>
                            <a href="civil-law.php">Civil-Law</a>
                            <a href="labour-law.php">Labour-Law</a> -->
                      <?php
                          }
                      ?>
                    </div>
                    <!-- <div class="dropdown">
                      <a href="about.php">About</a>
                      <a href="team.php">Our Dedicated Team</a>
                      <a href="client.php">Clientele</a>
                    </div> -->
                  </li>

                  <li class="rd-nav-item navbar-dropdown"><a class="rd-nav-link" href="career.php">Career</a>

                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="client.php">clientele</a>

                  </li>
                  <li class="rd-nav-item navbar-dropdown"><a class="rd-nav-link" href="blog.php">Knowledge Centre</a>

                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.php">Contact Us</a>
                  </li>
                </ul>
                <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                <?php
                    $data = getSocialIcons($db);
                    $count=1;
                    foreach($data as $row)
                    { 
                      ?>
                        <li> <a class="icon fa fa-<?=$row['icon']?>" href="<?=$row['social_media_link']?>"></a> </li>
                  <?php
                    }
                    ?>
                  <!-- <li>
                    <a class="icon fa fa-linkedin" href="#"></a>
                  </li> -->
                </ul>


              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
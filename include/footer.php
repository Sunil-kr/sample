


<footer>
      <div class="content">
        <div class="top">
          <div class="logo-details">
            <!-- <i class="fab fa-slack"></i> -->
            <!-- <span class="logo_name"><img src="images/jlo-logo.png" alt=""></span> -->
            <!-- <span class="logo_name"><img src="images/Logo/jlo-logo.png" alt=""></span> -->
          </div>
          <div class="media-icons">
            <!-- <a href="#"><i class="fab fa-facebook-f"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin-in"></i></a>
              <a href="#"><i class="fab fa-youtube"></i></a> -->
            <!-- <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
              <li>
                <a class="icon fa fa-facebook" href="#"></a>
              </li>
              <li>
                <a class="icon fa fa-twitter" href="#"></a> 
              </li>
              <li>
                <a class="icon fa fa-google-plus" href="#"></a>
              </li>
              <li>
                <a class="icon fa fa-instagram" href="#"></a>
              </li>
            </ul> -->
          </div>
        </div>
        <div class="link-boxes">
          <ul class="box">
            <li class="link_name">About Us</li>
            <div class="about_des">
            <?php
                     $sql = "SELECT * FROM `cms_about_us` WHERE `about_us_content_seq` = 'Primary' ";
        
                     $output = mysqli_query($db, $sql);
                         
                     while($res = mysqli_fetch_assoc($output))
                     { 
                     
                 ?>
              <p class="truncate-footer">
                   <?php echo strip_tags($res['content']);?> 
              </p>
              <?php
                  }
              ?>
            </div>
          </ul>
          <ul class="box box-2">
            <li class="link_name">Useful Links</li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="practice.php">Practice Area</a></li>
            <li><a href="team-section.php">People</a></li>
            <li><a href="client.php">Clientele</a></li>
            <li><a href="career.php">Career</a></li>
            <li><a href="contact-us.php">Contact Us</a></li>
          </ul>
          <ul class="box">
            <li class="link_name">Contact Info</li>
            <?php
                $data = getContact_us_address($db);
                $count=1;
                foreach($data as $row)
                { 
                ?>
                  <li>
                    <a href="#">
                      <span>Address : </span>
                      <span><?=$row['content']?></span>
                    </a>
                  </li>
            <?php
                }
                ?>
            <li>
              <a href="#">
                <span>Office Timeing : </span>
                <span>09:00 AM - 08:00 PM</span>
              </a>
            </li>

            <?php
                $data = getContact_us_mobile($db);
                $count=1;
                foreach($data as $row)
                { 
                ?>
                <li>
                  <a href="#">
                    <span>Mobile : </span>
                    <span><?=$row['content']?></span>
                  </a>
                </li>
            <?php
              }
              ?>

            <?php
              $data = getContact_us_email($db);
              $count=1;
              foreach($data as $row)
              { 
              ?>
            <li>
              <a href="#">
                <span>Email : </span>
                <span><?=$row['content']?></span>
              </a>
            </li>
            <?php
              }
              ?>
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
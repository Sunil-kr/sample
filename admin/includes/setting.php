
<!-- generating Randum alfanumeric digit -->
<?php

if(!isset($_SESSION['isAdminLoggedIn'])){
  header('Location: ../login.php'); 
  
}
  
?>

<style>
    .image-upload>input {
        display: none;
    }
</style> 


<main id="main" class="main">

<!-- <div class="card"> -->
    <!-- <div class="card-body"> --> 
        <!-- <div class="card-title ">
            <h3>Setting</h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?setting">Change Password</a></li>
                </ol>
            </nav> 
        </div> -->
    <!-- </div> -->



<section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            <?php
                  $data = getAdmin($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                    $profile_image = $row['profile_image'];
                     
                ?>
                    <?php
                    if(empty($profile_image))
                    {
                    ?>
                        <img src="./cms/uploaded_admin/profile.jpg" class="rounded-circle border shadow-sm" style="height: 100px; width: 100px; " alt="Profile" >

                    <?php
                    }
                    else
                    {
                    ?>
                        <img src="./cms/uploaded_admin/<?=$row['profile_image']?>" class="rounded-circle border shadow-sm" style="height: 100px; width: 100px; " alt="Profile">      <!--  Important....-->       

                    <?php
                    }
                    ?>
                        <h2 class="mt-3"><?=$row['name'];?></h2>
                        <h6 class="mt-2">Admin</h6>
                        <!-- <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div> -->
            <?php
                }
            ?>

            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">


                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

            
                <div class="tab-pane fade profile-edit active show pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="post" action="./includes/function.php" enctype="multipart/form-data">

                <?php
                  $data = getAdmin($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                    $profile_image = $row['profile_image'];
                     
                ?>

                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                 
                        <div class="d-flex justify-space-around">

                            <!-- <img src="assets/img/profile-img.jpg" > -->
                            <?php
                            if(empty($profile_image))
                            {
                            ?>
                                <img src="./cms/uploaded_admin/profile.jpg" class="rounded-circle border shadow-sm" style="height: 50px; width: 50px; " alt="Profile" >

                            <?php
                            }
                            else
                            {
                            ?>
                                <img src="./cms/uploaded_admin/<?=$row['profile_image']?>" class="rounded-circle border shadow-sm" style="height: 50px; width: 50px;" alt="Profile">      <!--  Important....-->       

                            <?php
                            }
                            ?>                           
                            &nbsp &nbsp

                            <div class="image-upload">
                                <label for="file-input" class="bg-secondary rounded text-light p-1 px-3 mt-2">
                                    <i class="bi bi-upload"></i>
                                </label>
                                <!-- <input id="file-input" type="file" /> -->
                                <input type="file" id="file-input" name="uploadbanner" class="form-control mt-3" >

                            </div> &nbsp &nbsp



                            <?php
                            if(empty($profile_image))
                            {
                            ?>
                                <div class="image-upload">
                                    <label for="" class="bg-danger rounded text-light px-3 p-1 mt-2">
                                        <a href="#" onclick="return  alert('No Profile image Found!')"> <i class="bi bi-trash text-light"></i></a>
                                        <!-- <i class="bi bi-trash"></i> -->
                                    </label>
                                </div>
                            <?php
                            }
                            else
                            {
                            ?>
                                <div class="image-upload">
                                    <label for="" class="bg-danger rounded text-light px-3 p-1 mt-2">
                                        <a href="includes/function.php?delete_profile_image=<?=$row['profile_image']?>" onclick="return  confirm('Are you sure, You want to delete profile image ? ')"> <i class="bi bi-trash text-light"></i></a>
                                        <!-- <i class="bi bi-trash"></i> -->
                                    </label>
                                </div>
                            <?php
                            }
                            ?>  
                           
                        </div>

                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control"  id="fullName" value="<?=$row['name']?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Comment</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea class="form-control mt-2" name="comment" required style="height: 100px"  placeholder="Write here.."  spellcheck="false"><?=$row['comment']?></textarea>
                      </div>
                    </div>

                    <?php
                  $count++;
                  }
                ?>  


                   

                    <div class="d-grid pt-2">
                        <button type="submit" name="save_profile" class="btn site_btn shadow">Save</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                  
                </div>

             


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <!-- <h4 class="card-title">Change Password</h4> -->

                    <!-- Multi Columns Form -->
                    <form class="row g-3 pt-3" action="includes/function.php" enctype="multipart/form-data" method="post">

                        <!-- <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="password" class="form-control" name="current_pass" id="inputName5" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="password" class="form-control" name="new_pass" id="inputName5" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Confirm New Password</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="password" class="form-control" name="confirm_pass" id="inputName5" required>
                            </div>
                        </div> -->


                        <div class="col-md-12 ">
                            <label for="inputName5" class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_pass" id="inputName5" required>
                        </div>


                        <div class="col-md-12 ">
                            <label for="inputName5" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="new_pass" id="inputName5" required>
                        </div>


                        <div class="col-md-12 ">
                            <label for="inputName5" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" name="confirm_pass" id="inputName5" required>
                        </div>

                        <div class="d-grid pt-2">
                          <button type="submit" name="change_password" class="btn site_btn shadow">Change</button>
                        </div>

                        <div class="pt-3 text-start">
                          <button type="reset" class="btn new-btn">Discard</button>
                        </div>
                    </form>
                    <!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

</main>



<script type="text/javascript">

    // window.onload = function() {
    //     if (window.jQuery) {  
    //         // jQuery is loaded  
    //         alert("Yeah!");
    //     } else {
    //         // jQuery is not loaded
    //         alert("Doesn't Work");
    //     }
    // }

</script>
<?php
  include("db.php");
?>

<main id="main" class="main">
  
  <div class="card-title">
    <h3>View All Registered Users</h3>

  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">


      <div class="col-md-10">
        <div class="card">
          <div class="card-body pt-3">
            <!-- <h5 class="card-title">Main Category</h5> -->
 
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th> 
                  <th scope="col">Profile</th> 
                  <th scope="col">User Name</th>
                  <th scope="col">Registered By</th>
                  <th scope="col">Mobile No</th>
                  <th scope="col">Email</th>
                  <th scope="col">Registered on</th>
                  <!-- <th scope="col">Edit</th> -->
                </tr>
              </thead>

              <tbody>
              <?php
                  $data = ViewAllUser($db);
                  $count=1;
                  foreach($data as $row)
                  {
                    // echo $row['name'];
                    // $valid_date = date( "Y-m-d H:i:s",strtotime(str_replace('/','-',$row['created_at'])));
              ?>
                    <tr>
                    <td scope="row"><?=$count?></td>
                    <td>
                        <?php 

                          if(!empty($row['profile_img'])) 
                          {
                            ?>

                                <img class="card-img" src="./uploaded_user_images/<?= $row['profile_img']?>" style="width: 50px; height: 50px; border-radius: 50%"  >

                            <?php
                            }

                            else
                            {
                            ?>
                              <img class="card-img" src="./uploaded_user_images/user.png" style="width: 50px; height: 50px; border-radius: 50%"  >

                              <!-- <img src="admin/uploaded_user_images/user.png" id="product-img" class="" alt="user.png"> -->

                            <?php
                            }
                          ?>
                        <!-- <img class="card-img" src="./uploaded_user_images/<?= $row['profile_img']?>" style="width: 50px; height: 50px; border-radius: 50%"  > -->
                    </td>

                    <td><?= $row['name']?></td>
                    <td><?= $row['registered_with']?></td>
                    <td><?= $row['mobile']?></td> 
                    <td><?= $row['email']?></td>

                    

                    <td>
                        <time class="post-item__meta post-item__meta--date" datetime="2022-02-14T20:24:54+00:00">
                            <?= date('F jS, Y',strtotime($row['created_at']))?>
                        </time>
                    </td>

                    <!-- <td>
                    <a class="btn btn-success" href="../includes/editdata.php?id=<?=$d['id']?>"> <i class="bi bi-pencil-square"></i></a>
                    </td> -->

                    </tr>
              <?php
                  $count++;
                  }
              ?>  

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>
      </div>




    </div>
  </section>

</main><!-- End #main -->

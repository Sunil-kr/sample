 

<?php 
if(!isset($_SESSION['isAdminLoggedIn'])){
      header('Location: ../login.php'); 
      
    }
include("db.php");

?>


<style> 
  th{
      font-size: 14px; 
  }
   
  .width{
      min-width: 100px;
  }

  ul{ 
      list-style-type:none;
  }

  td{
    font-size: 13px;
  }


  /* MULTI-LINE */
      .text-truncated {
        /* overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;   */
    }



</style>








 


 <!-- ************************************* -->
<!-- Modal to edit Member Sequence -->
<!-- ************************************ -->
<div class="modal fade bd-example-modal-lg" id="edit_banner_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Edit Banner</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-2">Team Member name</label>
                    <input type="text" name="edit_title" class="form-control mt-2" id="edit_title" placeholder="Banner title ">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-4">Banner Updating</label><br>
                    <!-- <input type="file" name="uploadbanner" class="form-control mt-2" > -->
                    <img id="banner_image" class="form-control mt-2"  style="height: 50px; width: 50px;" >      <!--  Important....-->  
                </div>



                <!-- Banner Id --> 
                <div class="form-group d-none">
                    <input type="text" name="banner_id" class="form-control mt-4" id="banner_id" placeholder="Banner id">
                </div>
     

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-4"> Redirecting URL</label>
                    <textarea class="form-control mt-2" name="edit_url" required style="height: 100px" id="edit_url" placeholder="Banner will reirect to this URL "  spellcheck="false"></textarea>
                </div>

                
            
            
                <button type="submit" name="updateCarousel_content" class="btn site_btn mt-4 w-100">Update</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>









<main id="main" class="main">

        <div class="card-title ">
            <h3>Manage Team</h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?manage-team">Manage Team</a></li>
                <!-- <li class="breadcrumb-item"><a href="index.php?add-team"> Add New Memeber</a></li>                </ol> -->
            </nav>
        </div>


  
<!-- End Page Title -->

<section class="section">
  <div class="row">
      
      

    <div class="col-lg-12">

      <div class="card pt-4" style="overflow-y:scroll;">
        <div class="card-body" >
          <!-- <h5 class="card-title">Datatables</h5> -->

          <p class="text-end" id="export" > 
              <a class="btn rounded-pill spl-btn px-4 shadow " href="./index.php?add-member"> Add New</a>
              <!-- <button class="btn rounded-pill px-4 new-btn shadow" onclick="ExportToExcel('xlsx')">Export &nbsp<i class="bi bi-arrow-down-circle"></i> </button> -->
          </p>

          <!-- Table with stripped rows -->
          <table class="table datatable table-striped"  id="all_products">
            <thead >
              <tr>
                <th scope="col" width="5%" >#</th> 
                <th scope="col" width="10%" >Main Image</th>
                <th scope="col" width="10%" >Thumb Image</th>
                <th scope="col" width="15%" >Name</th>
                <th scope="col" width="15%" >Designation</th>
                <th scope="col" width="10%" >Linked</th>
                <th scope="col" width="15%" >Number Sequence</th>
                
                <th scope="col" width="10%">Edit</th> 
                <th scope="col" width="10%">Remove</th>
              </tr>
            </thead>

            <tbody>
            <?php
                $query="SELECT * FROM `team` ORDER BY id DESC ";

                $run = mysqli_query($db, $query);

                $num = mysqli_num_rows($run);

                while($row = mysqli_fetch_assoc($run))
                {
                  // echo $row['name'];
                  
            ?>
                  <tr>
                  <td class="align-middle" scope="row"><?=$count?></td>

                  <td class="align-middle">
                        <img src="uploaded_team/<?= $row['main_image']?>" id="product-img" class="" style="height:40px; width:40px" alt="<?php
                        $alt= str_replace(' ', '-', ( $row['main_image']));
                        echo $alt?>">     
                  </td> 

                  <td class="align-middle">
                        <img src="uploaded_team/<?= $row['thumb_image']?>" id="product-img" class="" style="height:40px; width:40px" alt="<?php
                        $alt= str_replace(' ', '-', ( $row['thumb_image']));
                        echo $alt?>">     
                  </td> 
 
                  <td class="text-truncate align-middle" style="max-width: 150px;" > <a href="../product-details.php?Product_detail_Unique_Code=<?=$product_unique_code?>" target=”_blank”>
                        <?= $row['member_name']?></a>
                  </td>
                  
                  <td class="text-truncate align-middle" style="max-width: 150px;" > <a href="../product-details.php?Product_detail_Unique_Code=<?=$product_unique_code?>" target=”_blank”>
                        <?= $row['desg']?></a>
                  </td>
                  
                
                   
                  <td class="align-middle" > 
                        <?= $row['mobile']?></a> 
                  </td>

                  <!-- <td class="align-middle text-center"><?= $row['email']?></td>

                  <td class="align-middle text-center"><?= $row['linkedin']?></td> -->

                  <?php 
                      $slug = $row['slug'];     // Converting " " = space to # 
                      $member_id =  $row['id']; 
                      $sequence =  $row['sequence']; 
                    ?>


                  <td class="align-middle ">
                    <!-- <a class="btn btn-sm btn-primary" href="./index.php?edit_member=<?=$member_id?>"> <i class="bi bi-123"></i></a> -->
                    <!-- <a class="btn btn-sm site_btn" onclick="edit_member_seq('<?=$slug?>','<?=$member_id?>')"> <i class="bi bi-pencil-square"></i></a> -->
                    

                    <div id="click_to_view_seq_btn<?=$member_id?>">
                      <a class="btn btn-sm site_btn" onclick="myFunction('<?=$member_id?>')"> <i class="bi bi-pencil-square"></i></a>
                    </div>


                    <div id="<?=$member_id?>" style="display: none;">
                      <form class="form-inline mt-3" role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">

                        <div class="input-group mb-3">
                          
                            <select name="seq" id="seq" class="form-control" required>
                                <!-- <option value="">Select...</option> -->

                                <?php
                                  if($sequence==99999)
                                  {

                                    ?>
                                      <option value="<?=$sequence?>" disabled>No Sequence</option>                                      
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                      <option value="<?=$sequence?>" disabled><?=$sequence?></option>
                                    <?php
                                  }
                                ?>
                                
                                <option value="99999">No Sequence</option>
                                <?php
                                  for($i=1; $i<=$num; $i++)
                                  {
                                    $query1 = "SELECT * FROM `team` WHERE `sequence` = '$i' ";

                                    $run1 = mysqli_query($db, $query1);

                                    $num1 = mysqli_num_rows($run1);

                                    if($num1>0)
                                    {

                                      ?>
                                          <option value="<?=$i?>" disabled class=" text-dark " style="background-color: #f6f7f6; border-bottom: 2px solid white;"><?=$i?></option>
                                        
                                      <?php
                                    }
                                    else
                                    {
                                      ?>
                                          <option value="<?=$i?>"><?=$i?></option>
                                      <?php
                                    }

                                  }
                                ?>
                                  
                            </select>
                            
                            <!-- Banner Id --> 
                            <div class="form-group d-none">
                                <input type="text" name="member_id" class="form-control mt-4" value="<?=$member_id?>" id="member_id" placeholder="Banner id">
                            </div>
                

                            <button class="input-group-text btn btn-sm site_btn" id="basic-addon2" type="submit" name="add_team_seq" ><i class="bi bi-arrow-right-square"></i></button>
                      
                        </div>

                      </form>
                    </div>


                  </td>

 
                  <td class="align-middle">
                        <a class="btn btn-sm site_btn" href="./index.php?edit_member=<?=$member_id?>"> <i class="bi bi-pencil-square"></i></a>
                  </td>
                  
                  <td class="align-middle">
                      <div class="btn-group">
                 
                      <a class="btn btn-sm btn-danger" href="includes/function.php?delete_team_member=<?=$member_id?>" onclick="return confirm('Are you sure, You want to Delete this Member? ')">
                       <i class="bi bi-x-lg"></i></a>
                      </div>
                  </td>

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



<script>




  function edit_member_seq(val, val1)
  {
    var slug = val;
    var member_id = val1;
  


    // alert("hello"); 
    // edit_banner_model

    $('#edit_banner_model').modal('show');
    
    document.getElementById('').value = slug;
    document.getElementById('member_id').value = member_id;
  
    // document.getElementById('banner_image').src = "./cms/top-carousel/"+banner_image;


  }


  function myFunction(value) {

    // alert('click_to_view_seq_btn'+value);

    var x = document.getElementById(value);
    var y = document.getElementById('click_to_view_seq_btn'+value);
    if (x.style.display === "none") {
      x.style.display = "flex";
      // y.style.display = "none";
    } else {
      x.style.display = "none";
    }

  }

  </script>
<?php
  include("db.php");
?>

<main id="main" class="main">
  
  <div class="card-title">
      <h3>Manage About us</h3>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php?dashboard">About us</a></li>
            <!-- <li class="breadcrumb-item"><a href="#"> Add New</a></li> -->
            </ol>
        </nav>
 
  </div><!-- End Page Title -->


 
 
 <!-- ************************************* -->
<!-- Modal to add Cover Image -->
<!-- ************************************ -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Add Cover Image</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">
                <div class="form-group">
                    <!-- <label for="exampleInputEmail1"> </label> -->
                    <input type="file" name="uploadbanner" required class="form-control mt-3 mb-2" >
                </div>
            
                <button type="submit" name="add_aboutus_cover_image" class="btn site_btn mt-4 w-100">Add</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <small class="text-danger fw-bold ">Please note Image size should below 500kb, Dimention 1920x600px and should be in png/jpg/jpeg format*</small>

      </div>
    </div>
  </div>
</div>









 
 
 <!-- ************************************* -->
<!-- Modal to add new content-->
<!-- ************************************ -->

<div class="modal fade bd-example-modal-lg" id="modal_carousel_content" tabindex="-1" role="dialog" aria-labelledby="modal_carousel_content" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Add New Content</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --> 
      </div>
      <div class="modal-body" id="cms_aboutus">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-2"> Heading</label>
                    <input type="text" name="heading" class="form-control mt-2" required placeholder="Heading here.. ">
                </div>

                <div class="form-group ">
                    <label for="exampleInputEmail1" class="mt-4">Content</label>
                    <textarea class="form-control  mt-3" name="content"  style="height: 10px" spellcheck="false"></textarea>
                    <!-- <textarea class="form-control tinymce-editor mt-3" name="content" required style="height: 10px" spellcheck="false"></textarea> -->
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1"  class="mt-4">Content Image </label>
                    <input type="file" name="uploadbanner" required class="form-control mt-2 mb-2" >
                </div>
            
                <button type="submit" name="add_aboutus_content" class="btn site_btn mt-4 w-100">Add</button><br><br>
            </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>





 
 
 <!-- ************************************* -->
<!-- Modal to add Table factsheet cotent-->
<!-- ************************************ -->

<div class="modal fade bd-example-modal-lg" id="modal_aboutus_table" tabindex="-1" role="dialog" aria-labelledby="modal_carousel_content" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Factsheet</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --> 
      </div>
      <div class="modal-body" id="cms_aboutus">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-2"> Title</label>
                    <input type="text" name="heading" class="form-control mt-2" required placeholder="Title here.. ">
                </div>

                <div class="form-group ">
                    <label for="exampleInputEmail1" class="mt-4">Value</label>
                    <input type="text" name="content" class="form-control mt-2" required placeholder="Value here ">
                </div>

                <div class="form-group ">
                    <label for="exampleInputEmail1" class="mt-4"> Category / Data Type</label>
                    <input type="text" name="category" class="form-control mt-2" required placeholder=" Basic Information / Statutory Profile / Packaging/Payment and Shipment Details.. ">
                </div>
            
                <button type="submit" name="add_aboutus_table" class="btn site_btn mt-4 w-100">Add</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <small class="text-danger fw-bold"> *Please note, In the "Data type" field copy and Paste one of these categories <strong class="text-secondary"> [Basic Information / Statutory Profile / Packaging/Payment and Shipment Details] </strong> and if you want create a new category Just enter it (A new Data type/ category will be created and your data will be get stored in that.) </small>
      </div>
    </div>
  </div>
</div>







 <!-- ************************************* -->
<!-- Modal to edit existing about us content -->
<!-- ************************************ -->
<div class="modal fade bd-example-modal-lg" id="edit_aboutus_content_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn"> 
        <h5 class="modal-t text-center" id="exampleModalLabel">Edit About us Content</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body"> 
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-2"> Heading</label>
                    <input type="text" name="update_heading" class="form-control mt-2" id="update_heading" required placeholder="Heading here.. ">
                </div>


                <div class="form-group ">
                    <label for="exampleInputEmail1" class="mt-4"> Content</label>
                    <textarea class="form-control tinymce-editor mt-3" name="update_content" id="update_content"  spellcheck="false"> </textarea>
                </div>

                <div class="form-group d-none">
                    <input type="text" name="update_content_id" class="form-control mt-4" id="update_content_id" placeholder="">
                </div>
     
                <button type="submit" name="update_aboutus_content" class="btn site_btn mt-4 w-100">Update</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <!-- <small class="text-danger fw-bold ">Please note Image size should below 500kb, Dimention 1920x600px and should be in png/jpg/jpeg format*</small> -->

      </div>
    </div>
  </div>
</div>






 <!-- ************************************* -->
<!-- Modal to edit about us Table Content -->
<!-- ************************************ -->
<div class="modal fade bd-example-modal-lg" id="edit_aboutus_table_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Edit Factsheet</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-2"> Title</label>
                    <input type="text" name="table_heading" id="table_heading" class="form-control mt-2" required placeholder="Title here.. ">
                </div>

                <div class="form-group ">
                    <label for="exampleInputEmail1" class="mt-4">Value</label>
                    <input type="text" name="table_content" id="table_content" class="form-control mt-2" required placeholder="Value here ">
                </div>

                <div class="form-group ">
                    <label for="exampleInputEmail1" class="mt-4"> Category / Data Type</label>
                    <input type="text" name="table_content_type" id="table_content_type" class="form-control mt-2" required placeholder="Basic Information / Statutory Profile / Packaging/Payment and Shipment Details... ">
                </div>

                <div class="form-group d-none">
                    <input type="text" name="table_content_id" class="form-control mt-4" id="table_content_id">
                </div>
            
                <button type="submit" name="update_aboutus_table" class="btn site_btn mt-4 w-100">Update</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <small class="text-danger fw-bold"> *Please note, In the "Data type" field copy and Paste one of these categories <strong class="text-secondary"> [Basic Information / Statutory Profile / Packaging/Payment and Shipment Details] </strong> and if you want create a new category Just enter it (A new Data type/ category will be created and your data will be get stored in that.) </small>

      </div>
    </div>
  </div>
</div>







  <!-- ***************************** -->
  <!-- About us Cover -->
  <!-- ***************************** -->

  <section class="section">
    <div class="row">


      <div class="col-md-12">
        <!-- Button trigger modal -->

        <div class="card">
          <div class="card-body pt-3">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Cover Image</h3>
              <button type="button" class="btn  rounded-pill shadow px-5 mb-3 spl-btn float-right" data-toggle="modal" data-target="#exampleModal">
                Add About us Cover  
              </button>
            </div>
            
   
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" width="10%">#</th> 
                  <th scope="col" width="80%">Cover Image </th>
                  <th scope="col" width="10%">Remove</th>
                </tr>
              </thead>

              <tbody>
              <?php
                  $data = getAbout_us_cover($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                 
                     
              ?>
                    <tr>
                    <td scope="row" class="align-middle"><?=$count?></td>
                    <td class="align-middle">
                        <img src="./cms/uploaded_about_us/<?=$row['cover_image']?>" class="" style="height: 50px; width: 150px;" >      <!--  Important....-->       
                     
                    </td>                  
                     
                    <?php 
                        $cover_id = $row['id'];     // Converting " " = space to # 
                    ?>
                    <td class="align-middle">
                      <a class="btn btn-sm btn-danger " href="includes/function.php?delete_about_cover_image=<?=$cover_id ?>" onclick="return  confirm('Are you sure, You want to delete this Cover image ? ')"> <i class="bi bi-trash"></i></a>
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





  <!-- ***************************** -->
  <!-- About us Table -->
  <!-- ***************************** -->

  <section class="section d-none">
    <div class="row">


      <div class="col-md-12">
        <!-- Button trigger modal -->

        <div class="card">
          <div class="card-body pt-3">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Factsheet</h3>
              <button type="button" class="btn rounded-pill shadow px-5 mb-3 spl-btn float-right" data-toggle="modal" data-target="#modal_aboutus_table">
                Add into Factsheet
              </button> 
            </div>   
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th> 
  
                  <th scope="col">Title</th>
                  <th scope="col">Value</th>
                  <th scope="col">Category/ Data Type</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Remove</th> 
                </tr>
              </thead>

              <tbody>
              <?php
                  $data = getAboutus_table_content($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                     $banner_id = $row['id'];
                     
                ?>
                    <tr>
                    <td scope="row" class="align-middle"><?=$count?></td>
                  
                    <td class="align-middle"><?= $row['heading']?></td>
                    <td class="align-middle"><?= $row['content']?></td>
                    <td class="align-middle"><?= $row['table_content_type']?></td>
                    
                    <?php
                      $table_id = $row['id'];
                      $table_heading = $row['heading'];
                      $table_content = $row['content'];
                      $table_content_type = $row['table_content_type'];
                    ?>


                    <td class="align-middle">                      
                      <a class="btn btn-sm site_btn" onclick="edit_aboutus_table_fun('<?=$table_heading?>','<?=$table_content?>','<?=$table_id?>','<?=$table_content_type?>')"> <i class="bi bi-pencil-square"></i></a>
                    </td>

                    <td class="align-middle">
                      <a class="btn btn-sm btn-danger " href="includes/function.php?delete_aboutus_table_row=<?= $table_id ?>" onclick="return  confirm('Are you sure, You want to remove this product ? ')"> <i class="bi bi-trash"></i></a>
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




  <!-- ***************************** -->
  <!-- About us Content -->
  <!-- ***************************** -->

  <section class="section">
    <div class="row">


      <div class="col-md-12">
        <!-- Button trigger modal -->

        <div class="card"> 
          <div class="card-body pt-3">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">About us Content</h3>
              <button type="button" class="btn rounded-pill shadow px-5 mb-3 spl-btn float-right" data-toggle="modal" data-target="#modal_carousel_content">
                Add About us Content
              </button>
            </div>   
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th> 
  
                  <th scope="col">Preview</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Content</th>
                  <th scope="col">Sequence</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Remove</th> 
                </tr>
              </thead>

              <tbody>
              <?php 
                  $data = getAboutus_content($db);
                  $count=1;
                  foreach($data as $row1)
                  { 
                    $update_content_id = $row1['id'];
                      $update_heading = $row1['heading'];
                      $about_us_content_seq = $row1['about_us_content_seq'];
                      // $update_content = $row1['content'];
                      $up_content = strip_tags($row1['content'],"<br>");
                      $update_content = str_replace(array('\'', '"'), '', $up_content); 
                     
              ?>
                    <tr>
                      <td scope="row" class="align-middle"><?=$count?></td>
                    
                      <td class="align-middle">
                      <?php
                          if($about_us_content_seq == "Secondary")
                          {
                          ?>
                            <img src="./cms/uploaded_about_us/<?=$row1['cover_image']?>" class="" style="height: 50px; width: 50px;" >      <!--  Important....-->       
                          <?php
                          }
                          ?>
                      </td>
                      <td class="align-middle"><?= $row1['heading']?></td>
                      <td class="align-middle truncate" ><?= $update_content?></td>
                      <td class="align-middle"><?= $row1['about_us_content_seq']?></td>
    
                      <td class="align-middle">                     
                        <a class="btn btn-sm site_btn" onclick="edit_about_us_content_fun('<?=$update_heading?>','<?=$update_content_id?>')"> <i class="bi bi-pencil-square"></i></a>
                      </td>

                      <td class="align-middle">
                        <?php
                          if($about_us_content_seq == "Primary")
                          {
                          ?>
                              <a class="btn btn-sm btn-secondary " href="#" onclick="return  alert('Action not allowed for Primary content!')"> <i class="bi bi-trash"></i></a>
                          <?php
                          }
                          else
                          {
                            ?>
                                <a class="btn btn-sm btn-danger " href="includes/function.php?delete_aboutus_content=<?=$update_content_id ?>" onclick="return  confirm('Are you sure, You want to remove this product ? ')"> <i class="bi bi-trash"></i></a>
                            <?php
                          }
                          ?>
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
  function edit_about_us_content_fun(val, val1, val2)
  {
    var update_heading = val;
    // var update_content = val1;
    var update_content_id = val1;
 

    // alert(update_heading); 

    $('#edit_aboutus_content_model').modal('show');
    document.getElementById('update_heading').value = update_heading;
    // document.getElementById('update_content').value = update_content;
    document.getElementById('update_content_id').value = update_content_id;

  }


  function edit_aboutus_table_fun(val, val1, val2, val3)
  {
    var table_heading = val;
    var table_content = val1;
    var table_content_id = val2;
    var table_content_type = val3;
 
    // alert(table_content_type)
    // edit_banner_model

    $('#edit_aboutus_table_model').modal('show');
    document.getElementById('table_heading').value = table_heading;
    document.getElementById('table_content').value = table_content;
    document.getElementById('table_content_id').value = table_content_id;
    document.getElementById('table_content_type').value = table_content_type;

  }
</script>


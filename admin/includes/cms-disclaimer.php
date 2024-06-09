<?php
  include("db.php");
?>

<main id="main" class="main">
  
  <div class="card-title">
      <h3>Manage Disclaimer</h3>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php?disclaimer">manage Disclaimer</a></li>
            <!-- <li class="breadcrumb-item"><a href="#"> Add New</a></li> -->
            </ol>
        </nav>
 
  </div><!-- End Page Title --> 


 
 <style>
    .truncate {
    display: -webkit-box;
    max-width: 100%;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    /* height: 100px!important; */
}
 </style>









 <!-- ************************************* -->
<!-- Modal to edit existing Disclaimer content -->
<!-- ************************************ -->
<div class="modal fade bd-example-modal-lg" id="edit_career_content_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Edit Career Content</h5>
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
                    <textarea class="form-control ckeditor mt-3" name="update_content" id="update_content"  spellcheck="false"> </textarea>
                </div>

                <div class="form-group d-none">
                    <input type="text" name="update_content_id" class="form-control mt-4" id="update_content_id" placeholder="">
                </div>
     
                <button type="submit" name="update_disclaimer" class="btn site_btn mt-4 w-100">Update</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <!-- <small class="text-danger fw-bold ">Please note Image size should below 500kb, Dimention 1920x600px and should be in png/jpg/jpeg format*</small> -->

      </div>
    </div>
  </div>
</div>






  <!-- ***************************** -->
  <!-- Disclaimer us Content -->
  <!-- ***************************** -->

  <section class="section">
    <div class="row">


      <div class="col-md-12">
        <!-- Button trigger modal -->

        <div class="card"> 
          <div class="card-body pt-3">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Disclaimer</h3>
              <!-- <button type="button" class="btn rounded-pill shadow px-5 mb-3 spl-btn float-right" data-toggle="modal" data-target="#modal_carousel_content">
                Add Content
              </button> -->
            </div>   
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th> 
  
                  <th scope="col">Heading</th>
                  <th scope="col">Disclaimer</th>
                  <th scope="col">Edit</th>
                  <!-- <th scope="col">Remove</th>  -->
                </tr>
              </thead>

              <tbody>
              <?php
                  $data = getDisclaimer($db);
                  $count=1;
                  foreach($data as $row1)
                  { 
                    $update_content_id = $row1['id'];
                      $update_heading = $row1['heading'];
                      $update_content = $row1['content'];
                      // $up_content = strip_tags($row1['content'],"<br>");
                      // $update_content = str_replace(array('\'', '"'), '', $up_content); 
                     
              ?>
                    <tr>
                      <td scope="row" class="align-middle"><?=$count?></td>
                    
                      <td class="align-middle"><?= $row1['heading']?></td>
                      <td class="align-middle truncate" ><?php echo strip_tags($row1['content']);?> </td>
    
                      <td class="align-middle">                     
                          <a class="btn btn-sm site_btn" onclick="edit_career_content_fun('<?=$update_heading?>','<?=$update_content_id?>')"> <i class="bi bi-pencil-square"></i></a>
                      </td>

                      <!-- <td class="align-middle"> 
                          <a class="btn btn-sm btn-danger " href="includes/function.php?delete_aboutus_content=<?=$update_content_id ?>" onclick="return  confirm('Are you sure, You want to remove this product ? ')"> <i class="bi bi-trash"></i></a>
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




<script>
  function edit_career_content_fun(val, val1, val2)
  // function edit_career_content_fun(val, val1)
  {
    var update_heading = val;
    var update_content_id = val1;
    // var update_content = val2;
 

    // alert(update_content); 

    $('#edit_career_content_model').modal('show');
    document.getElementById('update_heading').value = update_heading;
    // document.getElementById('update_content').innerHTML = update_content;
    document.getElementById('update_content_id').value = update_content_id;

  }


</script>


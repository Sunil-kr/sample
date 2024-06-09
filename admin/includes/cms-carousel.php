<?php
  include("db.php");
?>

<main id="main" class="main">
  
  <div class="card-title">
    <h3>Manage Banner</h3>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php?dashboard">Manage Banner</a></li>
            <!-- <li class="breadcrumb-item"><a href="#"> Add New</a></li> -->
            </ol>
        </nav>

  </div><!-- End Page Title -->

<style>
  .truncate{
  width: 350px; 
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  display: block;

}

  </style>
 
 
 <!-- ************************************* -->
<!-- Modal to add new -->
<!-- ************************************ -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Add New Banner</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">
            
                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-3"> Small Heading</label>
                    <input type="text" name="title" class="form-control mt-2" placeholder="Banner small heading here.. " required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-4"> Main Heading</label>
                    <input type="text" name="title_main" class="form-control mt-2" placeholder="Banner main heading here. " required>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-4"> Redirecting URL</label>
                    <textarea class="form-control mt-2" name="url" required style="height: 100px"  placeholder="Banner will reirect to this URL "  spellcheck="false"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-4">Upload Banner <small class="text-danger fw-bold">(Max. size 400kb, Dimension 1920x960px)</small></label>
                    <input type="file" name="uploadbanner" required class="form-control mt-2" >
                </div>

              
            
                <button type="submit" name="addCarousel" class="btn site_btn mt-4 w-100">Add</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>

















 <!-- ************************************* -->
<!-- Modal to edit existing banner -->
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
                    <label for="exampleInputEmail1" class="mt-2"> Small Title</label>
                    <input type="text" name="edit_title" class="form-control mt-2" id="edit_title" placeholder="Banner title ">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-4"> Main Title</label>
                    <input type="text" name="edit_title_main" class="form-control mt-2" id="edit_title_main" placeholder="Banner main title ">
                </div>

                <!-- Banner Id -->
                <div class="form-group d-none">
                    <input type="text" name="banner_id" class="form-control mt-4" id="banner_id" placeholder="Banner id">
                </div>
     

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-4"> Redirecting URL</label>
                    <textarea class="form-control mt-2" name="edit_url" required style="height: 100px" id="edit_url" placeholder="Banner will reirect to this URL "  spellcheck="false"></textarea>
                </div>

                <div class="form-group">
                    <!-- <label for="exampleInputEmail1" class="mt-4">Upload Banner <small class="text-danger fw-bold">(Max. size 400kb, Dimension 1920x960px)</small></label> -->
                    <input type="file" name="uploadbanner"  class="form-control mt-4" >
                </div>

                
                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-4">Replace with below banner</label><br>
                    <img id="banner_image" class="form-control mt-2"  style="height: 80px; width: 200px;" >      <!--  Important....-->  
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









  <section class="section">
    <div class="row">


      <div class="col-md-12">
        <!-- Button trigger modal -->
           

      

        <div class="card">
          <div class="card-body pt-3" style="overflow-x: auto;">
            <!-- <h5 class="card-title">Main Category</h5> -->
            <p class="text-end">
              <button type="button" class="btn rounded-pill shadow px-5 spl-btn float-right" data-toggle="modal" data-target="#exampleModal">
              Add new Banner 
              </button>
            </p>
   
            <!-- Table with stripped rows -->
            <table class="table datatable" >
              <thead>
                <tr>
                  <th scope="col">#</th> 
                  <th scope="col" colspan="10">Banner </th>
                  <th scope="col">Small Heading</th>
                  <th scope="col">Main Heading</th>
                  <th scope="col">Redirecting URl</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Remove</th>
                </tr>
              </thead>

              <tbody>
              <?php
                  $data = getCarousel($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                 
              ?>
                    <tr>
                    <td scope="row" class="align-middle"><?=$count?></td>
                    <td class="align-middle" colspan="10">
                        <img src="./cms/top-carousel/<?= $row['banner']?>" class="" style="height: 50px; width: 150px;" >      <!--  Important....-->       
                     
                    </td>
                    <td class="align-middle"><?= $row['banner_title_small']?></td>
                    <td class="align-middle"><?= $row['banner_title_main']?></td>
                    <td class="align-middle truncate"><?= $row['redirect_link']?></td>
                    
                    
                    <?php
                      // $banner_id = $row['id'];
                      $banner_title_small = $row['banner_title_small'];
                      $banner_title_main = $row['banner_title_main'];
                      $banner_image = $row['banner'];
                      $redirect_link = $row['redirect_link'];
                    ?>


                    <?php 
                        $banner_id = str_replace('#', ' ', ( $row['id']));     // Converting " " = space to # 
                    ?>

                    <td class="align-middle">
                      <a class="btn btn-sm site_btn" onclick="edit_banner('<?=$banner_title_small?>','<?=$banner_title_main?>','<?=$banner_image?>','<?=$redirect_link?>','<?=$banner_id?>')"> <i class="bi bi-pencil-square"></i></a>
                    </td>

                    <td class="align-middle">
                    <a class="btn btn-sm btn-danger " href="includes/function.php?delete_banner_image=<?=$banner_id ?>" onclick="return  confirm('Are you sure, You want to delete this Banner? ')"> <i class="bi bi-trash"></i></a>
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
  function edit_banner(val, val1, val2, val3, val4)
  {
    var banner_title_small = val;
    var banner_title_main = val1;
    var banner_image = val2;
    var redirect_link = val3;
    var banner_id = val4;


    // alert(banner_title_main); 
    // edit_banner_model

    $('#edit_banner_model').modal('show');
    document.getElementById('edit_title').value = banner_title_small;
    document.getElementById('edit_title_main').value = banner_title_main;
    document.getElementById('banner_id').value = banner_id;
    document.getElementById('edit_url').value = redirect_link;  
    document.getElementById('banner_image').src = "./cms/top-carousel/"+banner_image;


  }
</script>


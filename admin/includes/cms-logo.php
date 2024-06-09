<?php
  include("db.php");
?>

<main id="main" class="main">
  
  <div class="card-title">
    <h3>Manage Logo</h3>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php?dashboard">Manage Logo</a></li>
            <!-- <li class="breadcrumb-item"><a href="#"> Add New</a></li> -->
            </ol>
        </nav>

  </div><!-- End Page Title -->
 


 
 <!-- ************************************* -->
<!-- Modal to add new Logo -->
<!-- ************************************ -->
 
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Add New Logo</h5>

      </div>
      <div class="modal-body">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">
                
                <div class="form-group">
                    <!-- <label for="exampleInputEmail1"> </label> -->
                    <input type="file" name="uploadbanner" required class="form-control mt-3" >
                </div>

                <div class="col-md-12 pt-3"> 
                    <label for="inputName5" class="form-label">Logo Type </label>   
                    <select name="image_type" id="image_type" required class="form-control" required>
                        <option value="">Select...</option>
                        <option value="Site Logo">Site Logo</option>
                        <option value="Favicon">Favicon</option>
                        
                    </select>
                </div>
            
                <button type="submit" name="addLogo" class="btn site_btn mt-4 w-100">Add</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <small class="text-danger fw-bold ">Please note Image size should below 150kb, Dimention 270x195px and should be in png/jpg/jpeg format*</small>

      </div>
    </div>
  </div>
</div>
 


 <!-- ************************************* -->
<!-- Modal to add Social Media links -->
<!-- ************************************ -->
 
<div class="modal fade bd-example-modal-lg" id="social_media_links" tabindex="-1" role="dialog" aria-labelledby="social_media_links" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Add Social Media links</h5>

      </div>
      <div class="modal-body">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">
                
                <!-- <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-2"> Icon</label>
                    <input type="text" name="icon" id="icon" class="form-control mt-2" required placeholder="bi bi-facebook.. ">
                </div> --> 

                <div class="col-md-12 pt-3"> 
                    <label for="inputName5" class="form-label">Icon</label>   
                    <select name="icon" id="icon" required class="form-control" required>
                        <option value="">Select...</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="linkedin">Linkedin</option>
                        <option value="twitter">Twitter</option>
                        <option value="youtube-play">Youtube</option>
                        <option value="tumblr">Tumbler</option>
                        
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-3"> Social Media Link</label>
                    <textarea class="form-control mt-2" name="url" id="url" placeholder="https:/_______" spellcheck="false"> </textarea>
                </div>
            
                <button type="submit" name="add_social_media_icons" class="btn site_btn mt-3 w-100">Add</button><br><br>
            </form>
      </div>
      
    </div>
  </div>
</div>










<!-- Logo -->

  <section class="section">
    <div class="row">


      <div class="col-md-12">
        <!-- Button trigger modal -->

        <div class="card">
          <div class="card-body pt-3">
           
            <div class="d-flex justify-content-between">
                <h3 class="card-title pt-2"> Logo</h3>
                <button type="button" class="btn rounded-pill shadow px-5 mb-4 spl-btn float-right"
                    data-toggle="modal" data-target="#exampleModal">Add new </button>
            </div>
   
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" width="10%">#</th> 
                  <th scope="col" width="20%" colspan="10">Preview </th>
                  <th scope="col" width="10%" >Logo</th>
                  <th scope="col" width="50%">Logo type</th>
                  <th scope="col" class="text-center" width="10%">Remove</th>
                </tr>
              </thead>

              <tbody >
              <?php
                  $data = getLogo($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                 
                     
              ?>
                    <tr >
                    <td scope="row" class="align-middle"><?=$count?></td>
                    <td class="align-middle" colspan="10">
                        <?php
                         $image_type = $row['image_type'];
                         if($image_type == "Favicon")
                         {
                        ?>
                                <img src="./cms/uploaded_logo/<?= $row['logo']?>" class="" style="height: 35px; width: 35px;" >      <!--  Important....-->       
                        <?php
                         }
                         else
                         {
                            ?>
                                <img src="./cms/uploaded_logo/<?= $row['logo']?>" class="" style="height: 50px; width: 120px;" >      <!--  Important....-->       
                            <?php
                        
                         }
                        ?>
                    </td>
                    <td class="align-middle"><?= $row['logo']?></td>   

                    <td class="align-middle"><?= $row['image_type']?></td>                  


                    <?php 
                        $logo_id =  $row['id'];     // Converting " " = space to # 
                    ?>
                    <td class="align-middle text-center">
                        <a class="btn btn-sm btn-danger " href="includes/function.php?delete_logo=<?=$logo_id?>" onclick="return  confirm('Are you sure, You want to delete current <?= $row['image_type']?>? ')"> <i class="bi bi-trash"></i></a>
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






<!-- Social Media Links -->

<section class="section">
    <div class="row">


      <div class="col-md-12">
        <!-- Button trigger modal -->

        <div class="card">
          <div class="card-body pt-3">
            
            <div class="d-flex justify-content-between">
                <h3 class="card-title pt-2"> Social Media Icon</h3>
                <button type="button" class="btn rounded-pill shadow px-5 mb-4 spl-btn float-right"
                    data-toggle="modal" data-target="#social_media_links">Add new </button>
            </div>
   
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" width="10%">#</th> 
                  <th scope="col" width="10%" colspan="10">Preview </th>
                  <th scope="col" width="20%" >Icon </th>
                  <th scope="col" width="50%">Social Media Link </th>
                  <th scope="col" class="text-center" width="10%">Remove</th>
                </tr>
              </thead>

              <tbody >
              <?php
                  $data = getSocialIcons($db);  
                  $count=1;
                  foreach($data as $row)
                  { 
                 
                     
              ?>
                    <tr >
                    <td scope="row" class="align-middle"><?=$count?></td>
                    <td class="align-middle" colspan="10">
                        <span class=" bi bi-<?=$row['icon']?>"> </span>
                    </td>
                    <td class="align-middle"><?= $row['icon']?></td>   

                    <td class="align-middle"><?= $row['social_media_link']?></td>                  


                    <?php 
                        $icon_id =  $row['id'];     // Converting " " = space to # 
                    ?>
                    <td class="align-middle text-center">
                        <a class="btn btn-sm btn-danger " href="includes/function.php?delete_social_icon=<?=$icon_id?>" onclick="return  confirm('Are you sure, You want to delete current <?= $row['image_type']?>? ')"> <i class="bi bi-trash"></i></a>
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






<script>
  function edit_banner(val, val1, val2, val3, val4)
  {
    var banner_title_small = val;
    var banner_title_main = val1;
    var banner_for = val2;
    var redirect_link = val3;
    var banner_id = val4;


    // alert(banner_title_main); 
    // edit_banner_model

    $('#edit_banner_model').modal('show');
    document.getElementById('edit_title').value = banner_title_small;
    document.getElementById('edit_title_main').value = banner_title_main;
    document.getElementById('banner_id').value = banner_id;
    document.getElementById('edit_url').value = redirect_link;


  }
</script>


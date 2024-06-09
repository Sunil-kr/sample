<?php
  include("db.php");
?>
 
<main id="main" class="main">
  
  <div class="card-title">
    <h3>Manage Clients</h3>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="index.php?dashboard">Manage Clients</a></li>
            <!-- <li class="breadcrumb-item"><a href="#"> Add New</a></li> -->
            </ol>
        </nav>

  </div><!-- End Page Title -->



 
 <!-- ************************************* -->
<!-- Modal to add new -->
<!-- ************************************ -->
 
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Add New Client</h5>

      </div>
      <div class="modal-body">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">
                
                <div class="form-group">
                    <!-- <label for="exampleInputEmail1"> </label> -->
                    <input type="file" name="uploadbanner" required class="form-control mt-3" >
                </div>

                <div class="form-group">
                    <!-- <label for="exampleInputEmail1" class="mt-4"> Client Name</label> -->
                    <input type="text" name="client_name" class="form-control mt-4" required placeholder="Client Name here..">
                </div>

            
                <button type="submit" name="addClient" class="btn site_btn mt-4 w-100">Add</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <small class="text-danger fw-bold ">Please note Image size should below 150kb, Dimention 270x195px and should be in png/jpg/jpeg format*</small>

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
                    <!-- <label for="exampleInputEmail1"> </label> -->
                    <input type="file" name="uploadbanner" required class="form-control mt-3" >
                </div>

                <div class="form-group">
                    <!-- <label for="exampleInputEmail1" class="mt-4"> Client Name</label> -->
                    <input type="text" name="client_name" id="edit_name" class="form-control mt-4" required placeholder="Client Name here..">
                </div>
                     
                <div class="form-group d-none">
                    <input type="text" name="client_id" class="form-control mt-4" id="client_id" placeholder="Banner id">
                </div>
     
                <div class="form-group">
                    <label for="exampleInputEmail1" class="mt-4">Replace with below Logo</label><br>
                    <!-- <input type="file" name="uploadbanner" class="form-control mt-2" > -->
                    <img id="client_image" class="mt-2"  style="height:100px; width: 200px;" >      <!--  Important....-->  
                </div>

            
                <button type="submit" name="UpdateClient" class="btn site_btn mt-4 w-100">Add</button><br><br>
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
            <p class="text-end">
              <button type="button" class="btn rounded-pill shadow px-5 mb-3 spl-btn float-right" data-toggle="modal" data-target="#exampleModal">
              Add new 
              </button>
            </p>

      

        <div class="card">
          <div class="card-body pt-3">
            <!-- <h5 class="card-title">Main Category</h5> -->
   
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col" width="10%">#</th> 
                  <th scope="col" width="20%" colspan="10">Preview </th>
                  <th scope="col" width="10%" >Client </th>
                  <th scope="col" width="40%">Logo </th>
                  <th scope="col" width="10%">Edit </th>
                  <th scope="col" class="text-center" width="10%">Remove</th>
                </tr>
              </thead>

              <tbody >
              <?php
                  $data = getClient($db);
                  $count=1;
                  foreach($data as $row)
                  { 
                 
                     
              ?>
                    <tr >
                    <td scope="row" class="align-middle"><?=$count?></td>
                    <td class="align-middle" colspan="10">
                        <img src="./cms/uploaded_clients/<?= $row['client_logo']?>" class="" style="height: 80px; width: 80px;" >      <!--  Important....-->       
                     
                    </td>
                    <td class="align-middle"><?= $row['client_name']?></td>            

                    <td class="align-middle"><?= $row['client_logo']?></td>                  


                    <?php 
                        $client_id = str_replace('#', ' ', ( $row['id']));     // Converting " " = space to # 
                        $client_name = str_replace('#', ' ', ( $row['client_name']));   
                        $client_logo = str_replace('#', ' ', ( $row['client_logo']));   
                    ?>

                    <td class="align-middle">
                      <a class="btn btn-sm site_btn" onclick="edit_banner('<?=$client_name?>','<?=$client_logo?>','<?=$client_id?>')"> <i class="bi bi-pencil-square"></i></a>
                    </td>


                    <td class="align-middle text-center">
                        <a class="btn btn-sm btn-danger " href="includes/function.php?delete_client=<?=$client_id ?>" onclick="return  confirm('Are you sure, You want to delete this Client? ')"> <i class="bi bi-trash"></i></a>
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
  function edit_banner(val, val1, val2)
  {
    var client_name = val;
    var client_logo = val1;
    var client_id = val2;


    // alert(client_logo); 
    // edit_banner_model

    $('#edit_banner_model').modal('show');
    document.getElementById('edit_name').value = client_name;
    document.getElementById('client_id').value = client_id;
    document.getElementById('client_image').src = "./cms/uploaded_clients/"+client_logo;


  }
</script>


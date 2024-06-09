<!-- generating Randum alfanumeric digit -->
<?php

if(!isset($_SESSION['isAdminLoggedIn'])){
  header('Location: ../login.php'); 
  
}
 
?>


<main id="main" class="main">

    <!-- <div class="card"> -->
    <!-- <div class="card-body"> --> 
    <div class="card-title ">
        <h3>Manage Contact us</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?dashboard">Contact us</a></li>
            </ol>
        </nav>
    </div> 
    <!-- </div> --> 
    <!-- </div>End Page Title -->





 

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
            
                <button type="submit" name="add_contact_cover_image" class="btn site_btn mt-4 w-100">Add</button><br><br>
            </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <small class="text-danger fw-bold ">Please note Image size should below 200kb, Dimention 1920x600px and should be in webp format*</small>

      </div>
    </div>
  </div>
</div>






    <!-- ************************************* -->
    <!-- Modal to add new Address-->
    <!-- ************************************ -->

    <div class="modal fade bd-example-modal-lg" id="address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center site_btn">
                    <h5 class="modal-t text-center" id="exampleModalLabel">Add New Address</h5>

                </div>
                <div class="modal-body">
                    <form class="row g-3 pt-3" action="includes/function.php" enctype="multipart/form-data"
                        method="post">

                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">State or City</label>
                            <input type="text" class="form-control" name="state_city" id="inputName5" placeholder="Enter state or City Here." required>
                        </div>


                        <div class="col-md-12 pt-4">
                            <label for="inputName5" class="form-label">Address</label>
                            <textarea class="form-control" name="address" style="height: 100px" placeholder="full address here.." required spellcheck="false"></textarea>
                        </div>


                        <div class="d-grid pt-3">
                            <button type="submit" name="addAddress" class="btn site_btn shadow">Add</button>
                        </div>
                        <div class="pt-3 text-start">
                            <button type="reset" class="btn new-btn">Reset</button>
                        </div>
                    </form><!-- End Multi Columns Form -->
                </div>
                <div class="modal-footer text-start">

                </div>
            </div>
        </div>
    </div>

    <!-- ************************************* -->
    <!-- Modal to add new ends here-->
    <!-- ************************************ -->



    <!-- ************************************* -->
    <!-- Modal to add new Mobile-->
    <!-- ************************************ -->

    <div class="modal fade bd-example-modal-lg" id="Mobile_no" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header text-center site_btn">
                    <h5 class="modal-t text-center" id="exampleModalLabel">Add Mobile Number</h5>

                </div>
                <div class="modal-body">
                    <form class="row g-3 pt-3" action="includes/function.php" enctype="multipart/form-data" method="post">

                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Mobile Number</label>
                            <!-- <input type="text" class="form-control" name="mobile_no" pattern="[6-9]{1}[0-9]{1}[0-9]{4}[0-9]{4}" maxlength="10"  id="inputName5" placeholder="+91 xxx xxx xxxx" required> -->
                            <input type="text" class="form-control" name="mobile_no"  id="inputName5" placeholder="+91 xxx xxx xxxx" required>
                        </div>

                        <div class="d-grid pt-3">
                            <button type="submit" name="addMobile" class="btn site_btn shadow">Add</button>
                        </div>
                        <div class="pt-3 text-start">
                            <button type="reset" class="btn new-btn">Reset</button>
                        </div>
                    </form><!-- End Multi Columns Form --> 
                </div>
                <div class="modal-footer text-start">

                </div>
            </div>
        </div>
    </div>

    <!-- ************************************* -->
    <!-- Modal to add Mobile Number ends here-->
    <!-- ************************************ -->




    <!-- ************************************* -->
    <!-- Modal to add new Email Number-->
    <!-- ************************************ -->

    <div class="modal fade bd-example-modal-lg" id="email" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header text-center site_btn">
                    <h5 class="modal-t text-center" id="exampleModalLabel">Add Email</h5>

                </div>
                <div class="modal-body">
                    <form class="row g-3 pt-3" action="includes/function.php" enctype="multipart/form-data" method="post">

                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="example@gmail.com" id="inputName5"  required>
                        </div>

                        <div class="d-grid pt-3">
                            <button type="submit" name="addEmail" class="btn site_btn shadow">Add</button>
                        </div>
                        <div class="pt-3 text-start">
                            <button type="reset" class="btn new-btn">Reset</button>
                        </div>
                    </form><!-- End Multi Columns Form -->
                </div>
                <div class="modal-footer text-start">

                </div>
            </div>
        </div>
    </div>

    <!-- ************************************* -->
    <!-- Modal to add Email ends here-->
    <!-- ************************************ -->





    


    

  <!-- ***************************** -->
  <!-- Contant us Cover -->
  <!-- ***************************** -->

  <section class="section">
    <div class="row">



    </div>
  </section>



    

    <section class="section">
        <div class="row">

            
    <!-- ************************************* -->
    <!-- Section Mobile -->
    <!-- ************************************ -->
    


            
            <div class="col-md-7">
                <!-- Button trigger modal -->

                <div class="card">
                <div class="card-body pt-3">
                    <div class="d-flex justify-content-between">
                    <h3 class="card-title">Cover Image</h3>
                    <!-- <button type="button" class="btn  rounded-pill shadow px-5 mb-3 spl-btn float-right" data-toggle="modal" data-target="#exampleModal">
                        Add Cover  
                    </button> -->
                    <button type="button" class="btn btn-sm rounded-pill shadow px-5 mb-4 spl-btn float-right"
                    data-toggle="modal" data-target="#exampleModal">  Add news   </button>
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
                        $data = getContact_us_cover($db);
                        $count=1;
                        foreach($data as $row)
                        { 
                        
                            
                    ?>
                            <tr>
                            <td scope="row" class="align-middle"><?=$count?></td>
                            <td class="align-middle">
                                <img src="./cms/uploaded_contact_us/<?=$row['content']?>" class="" style="height: 50px; width: 100px;" >      <!--  Important....-->       
                            
                            </td>                  
                            
                            <?php 
                                $cover_id = $row['id'];     // Converting " " = space to # 
                            ?>
                            <td class="align-middle">
                            <a class="btn btn-sm btn-danger " href="includes/function.php?delete_contact_cover_image=<?=$cover_id ?>" onclick="return  confirm('Are you sure, You want to delete this Cover image ? ')"> <i class="bi bi-trash"></i></a>
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



            <div class="col-md-5">
                <!-- Button trigger modal -->
                <p class="text-end">
                   
                </p>

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title pt-2"> Mobile Number</h3>
                            <button type="button" class="btn rounded-pill shadow px-5 mb-4 spl-btn float-right"
                                data-toggle="modal" data-target="#Mobile_no">Add new </button>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">#</th>
                                    <th scope="col" width="80%">Mobile Number </th>
                                    <th scope="col" class="text-center" width="10%">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $data = getContact_us_mobile($db);
                                $count=1;
                                foreach($data as $row)
                                { 
                                
                                    
                            ?>
                                <tr>
                                    <td scope="row" class="align-middle"><?=$count?></td>
                          
                                    <td class="align-middle"><?= $row['content']?></td>

                                    <?php 
                                    $content_id = $row['id'];    // Converting " " = space to # 
                                ?>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-sm btn-danger "
                                            href="includes/function.php?delete_mobile=<?=$content_id ?>"
                                            onclick="return  confirm('Are you sure, You want to delete this Mobile Number? ')">
                                            <i class="bi bi-trash"></i></a>
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



            

    <!-- ************************************* -->
    <!-- Section Address-->
    <!-- ************************************ -->
    <div class="col-md-7">
                <!-- Button trigger modal -->
                <p class="text-end">
                   
                </p>

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title pt-2"> Address</h3>
                            <button type="button" class="btn rounded-pill shadow px-5 mb-3 spl-btn float-right"
                                data-toggle="modal" data-target="#address">Add new </button>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">#</th>
                                    <th scope="col" width="20%">State Or City </th>
                                    <th scope="col" width="65%">Feedback </th>
                                    <th scope="col" class="text-center" width="10%">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $data = getContact_us_address($db);
                                $count=1;
                                foreach($data as $row)
                                { 
                                
                                    
                            ?>
                                <tr>
                                    <td scope="row" class="align-middle"><?=$count?></td>
                         
                                    <td class="align-middle"><?= $row['title']?></td>
                                    <td class="align-middle"><?= $row['content']?></td>


                                    <?php 
                                    $content_id = $row['id'];    // Converting " " = space to # 
                                ?>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-sm btn-danger "
                                            href="includes/function.php?delete_address=<?=$content_id ?>"
                                            onclick="return  confirm('Are you sure, You want to delete this Address? ')">
                                            <i class="bi bi-trash"></i></a>
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






    <!-- ************************************* -->
    <!-- Section Email -->
    <!-- ************************************ -->
            <div class="col-md-5">
                <!-- Button trigger modal -->
                <p class="text-end">
                   
                </p>

                <div class="card">
                    <div class="card-body pt-3">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title pt-2"> Email</h3>
                            <button type="button" class="btn rounded-pill shadow px-5 mb-4 spl-btn float-right"
                                data-toggle="modal" data-target="#email">Add new </button>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">#</th>
                                    <th scope="col" width="80%">Email </th>
                                    <th scope="col" class="text-center" width="10%">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $data = getContact_us_email($db);
                                $count=1;
                                foreach($data as $row)
                                { 
                                
                                    
                            ?>
                                <tr>
                                    <td scope="row" class="align-middle"><?=$count?></td>
                          
                                    <td class="align-middle"><?= $row['content']?></td>

                                    <?php 
                                    $content_id = $row['id'];    // Converting " " = space to # 
                                ?>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-sm btn-danger "
                                            href="includes/function.php?delete_email=<?=$content_id ?>"
                                            onclick="return  confirm('Are you sure, You want to delete this Email? ')">
                                            <i class="bi bi-trash"></i></a>
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


    function myFunction() {
        var selected_option = document.getElementById("mySelect").value;
        // console.log(selected_option);

        $.ajax({
            url: 'includes/get-submenu.php',
            method: 'POST',
            data: {
                // get_option:val
                selected_option: selected_option,

            },
            success: function (response) {

                document.getElementById("new_select_div").innerHTML = response;
                // alert(response);
            }
        });
    }


    function myFunction_sub() {
        var selected_option = document.getElementById("new_select").value;
        // document.getElementById("select_label").style.display = 'none';;

        console.log(selected_option);
        if (!selected_option) {
            return false;
        } else {

            $.ajax({
                url: 'includes/get-submenu.php',
                method: 'POST',
                data: {
                    // get_option:val
                    selected_option: selected_option,

                },
                success: function (response) {

                    document.getElementById("mySelect").setAttribute("disabled", "disabled");
                    document.getElementById("new_select_div").innerHTML = response;
                    // alert(response);
                    // console.log(response);
                }
            });

        }

    }
</script>
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
        <h3>Testimonials</h3>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?dashboard">Testimonials</a></li>
                <li class="breadcrumb-item">Add New </li>
            </ol>
        </nav>
    </div>
    <!-- </div> -->
    <!-- </div>End Page Title -->









    <!-- ************************************* -->
    <!-- Modal to add new -->
    <!-- ************************************ -->

    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center site_btn">
                    <h5 class="modal-t text-center" id="exampleModalLabel">Add New Testimonials</h5>

                </div>
                <div class="modal-body">
                    <form class="row g-3 pt-3" action="includes/function.php" enctype="multipart/form-data"
                        method="post">

                        <div class="col-md-12">
                            <label for="inputName5" class="form-label">Name</label>
                            <input type="text" class="form-control" name="user_name" id="inputName5" required>
                        </div>

                        <!-- <div class="col-md-6">
                    <label for="inputName5" class="form-label">Status </label>   
                    <select name="status" id="status" class="form-control" required>
                        <option value="" >Select...</option>
                        <option value="1">1</option>
                        <option value="0">2</option>
                        <option value="0">3</option>
                        <option value="0">4</option>
                        <option value="0">5</option>
                        
                    </select>
                </div> -->


                        <div class="col-md-12 pt-4">
                            <label for="inputName5" class="form-label">Feedback (Under 30-40 words)</label>
                            <textarea class="form-control" name="feedback" style="height: 100px"
                                spellcheck="false"></textarea>
                        </div>


                        <div class="col-md-12 pt-3">
                            <label for="inputName5" class="form-label">Image (Max. size 200kb png/jpg)</label>
                            <input type="file" class="form-control" name="upload_cat_image">
                        </div>




                        <div class="d-grid pt-3">
                            <button type="submit" name="addTestimonials" class="btn site_btn shadow">Add</button>
                        </div>
                        <div class="pt-3 text-start">
                            <button type="reset" class="btn new-btn">Reset</button>
                        </div>
                    </form><!-- End Multi Columns Form -->
                </div>
                <div class="modal-footer text-start">
                    <small class="text-danger  fw-bold ">Please note Image size should below 150kb, Dimention 270x195px
                        and should be in png/jpg/jpeg format*</small>

                </div>
            </div>
        </div>
    </div>

    <!-- ************************************* -->
    <!-- Modal to add new ends here-->
    <!-- ************************************ -->






    

    <section class="section">
        <div class="row">


            <div class="col-md-12">
                <!-- Button trigger modal -->
                <p class="text-end">
                   
                </p>



                <div class="card">
                    <div class="card-body pt-3">
                        <div class=" text-end">
                            <!-- <h5 class="card-title">Main Category</h5> -->
                            <button type="button" class="btn rounded-pill shadow px-5 mb-3 spl-btn float-right"
                                data-toggle="modal" data-target="#exampleModal">
                                Add new
                            </button>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">#</th>
                                    <th scope="col" width="20%" colspan="10">Preview </th>
                                    <th scope="col" width="10%">Name </th>
                                    <th scope="col" width="50%">Feedback </th>
                                    <th scope="col" class="text-center" width="10%">Remove</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $data = getTestimonials($db);
                                $count=1;
                                foreach($data as $row)
                                { 
                                
                                    
                            ?>
                                <tr>
                                    <td scope="row" class="align-middle"><?=$count?></td>
                                    <td class="align-middle" colspan="10">
                                        <img src="./cms/uploaded_testimonials/<?= $row['image']?>" class=""
                                            style="height: 80px; width: 80px;"> <!--  Important....-->

                                    </td>
                                    <td class="align-middle"><?= $row['name']?></td>
                                    <td class="align-middle"><?= $row['feedback']?></td>


                                    <?php 
                                    $testim_id = $row['id'];    // Converting " " = space to # 
                                ?>
                                    <td class="align-middle text-center">
                                        <a class="btn btn-sm btn-danger "
                                            href="includes/function.php?delete_testimonials=<?=$testim_id ?>"
                                            onclick="return  confirm('Are you sure, You want to delete this testimonial? ')">
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
<?php 
session_start();
error_reporting(0);
include("admin/includes/db.php");
include("admin/includes/function.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
     <link rel="icon" href="img/fav.jpeg" type="image/png" />
    <title>Sajsajawat</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="vendors/linericon/style.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <link rel="stylesheet" href="vendors/animate-css/animate.css" />
    <link rel="stylesheet" href="vendors/jquery-ui/jquery-ui.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />

    <link rel="stylesheet" href="css/responsive.css" />

    <link rel="stylesheet" href="css/ranjan.css">

    <link href="css/jquery-ui.css" rel="stylesheet">


    <!-- Price filter from both ends startes here -->
    <script src="js/jquery-ui.js"></script>

    <script src="js/jquery-1.10.2.min.js"></script>
    <!-- Price filter from both ends startes here -->



    <style>
    .sticky-top{
        top:13%;
        z-index:1;
        background:#fff;
    }
        #shop {
            margin-top: 30px;
        }
        
        #alert {
            margin-left: auto;
            margin-right: 20px;
            margin-top: 20px;
        }
        
        #shop .dropdown-content {
            max-height: 32vh;
            overflow-y: scroll;
        }
        
        #shop .dropdown-content li {
            font-size: 14px;
            color: black;
            text-decoration: none;
            display: block;
            text-align: left;
            border-bottom: 1px solid rgb(233, 233, 233);
        }
        /* .dropdown a:hover {background-color: #ddd;} */
        
        #shop .dropdown-content li:hover {
            background-color: #ddd;
        }
        /* Loading gif */
        
        #loading {
            text-align: center;
            background: url('img/icon/loading.gif') no-repeat center;
            height: 150px;
        }
    </style>
</head>

<body>
    <!--================Header Menu Area =================-->
    <?php include("include-front/header.php"); ?>
    <!--================Header Menu Area =================-->


    <!--================Pop-up alert on add to cart and wishlist =================-->

    <span id="response"></span>

    <!--================Pop-up Modal on add to cart and wishlist ends here =================-->



    <!--================Category Product Area =================-->
    <section class="cat_product_area section_gap" id="shop">


        <?php
    if(isset($_GET['product_category_id']))
    {
      $product_category_id = $_GET['product_category_id'];

      ?>
            <div class="container-fluid col-12">
                <!-- ============================================================ -->
                <!-- If received product category id below will run -->
                <!-- ============================================================ -->

                <input type="hidden" value="<?php echo $product_category_id; ?>" name="product_category_id" id="product_category_id">

                <div class="row">
                    
                     <div class="shoe">
                        <div class="filter-menu" onclick="filterByCategory()">
                            <span><i class="fa fa-filter" aria-hidden="true"></i> &nbspfilter</span>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>

                   

                    <div class="col-md-3">
                        <div class="left_sidebar_area mt-3 sticky-top" id="filter">
<div style="padding:0 30px">
<h3>Filter</h3>
<hr>
</div>

                            <aside>
                                <div class="widgets_inner">
                                    <input type="text" class="form-control form-input" id="myInput" onkeydown="hide_search_dropdown()" onkeyup="filterFunction()" placeholder="Search here...">
                                    <ul class="list datatable dropdown-content" id="myDropdown">
                                        <!-- li tag with data dynamically coming from backend -->
                                    </ul>

                                </div>
                            </aside>



                            <aside>
                                <div class="l_w_title">
                                    <h3>Price</h3>
                                </div>

                                <div class="widgets_inner">

                                    <input type="hidden" id="hidden_minimum_price" value="0" />
                                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                                    <p id="price_show">0 - 10000</p>
                                    <div id="price_range"></div>
                                </div>
                            </aside>



                            <aside>
                                <div class="l_w_title " data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">

                                    <h3 class="w-100 d-flex justify-content-between">Color <i class="ti ti-angle-down pt-2"></i> </h3>

                                </div>

                                <div class="widgets_inner">

                                    <div class="accordion" id="accordionExample">

                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                                            <?php

                              $query = "SELECT DISTINCT(color) FROM products WHERE `product_category` = '$product_category_id' ORDER BY id DESC";

                              $run = mysqli_query($db,$query);

                              // $num = mysqli_num_rows($run);


                                  while($row = mysqli_fetch_assoc($run))
                                  {
                                    // echo $row['material'];
                                    
                                    if($row['color'] !== "")
                                    {
                                  ?>
                                                <div class="list-group-item checkbox">
                                                    <label><input type="checkbox" class="common_selector color" value="<?php echo $row['color']; ?>" > &nbsp &nbsp <?php echo $row['color']; ?></label>
                                                </div>
                                                <?php
                                    }
                                  }
                              

                            ?>

                                        </div>
                                    </div>
                                </div>
                            </aside>

                            <aside>
                                <div class="l_w_title " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                    <h3 class="w-100 d-flex justify-content-between">Material <i class="ti ti-angle-down pt-2"></i> </h3>

                                </div>

                                <div class="widgets_inner">

                                    <div class="accordion" id="accordionExample">

                                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                                            <?php

                              $query = "SELECT DISTINCT(material) FROM products WHERE `product_category` = '$product_category_id' ORDER BY id DESC";

                              $run = mysqli_query($db,$query);

                              // $num = mysqli_num_rows($run);


                                  while($row = mysqli_fetch_assoc($run))
                                  {
                                    // echo $row['material'];
                                    
                                    if($row['material'] !== "")
                                    {
                                  ?>
                                                <div class="list-group-item checkbox">
                                                    <label><input type="checkbox" class="common_selector material" value="<?php echo $row['material']; ?>" > &nbsp &nbsp <?php echo $row['material']; ?></label>
                                                </div>
                                                <?php
                                    }
                                  }
                              

                            ?>

                                        </div>
                                    </div>
                                </div>

                        </div>
                        </aside>

                    </div>
                    
                    
                    
                    

                    <div class="col-lg-9">

                        <div class="latest_product_inner">
                            <div class="row filter_data">

                            </div>
                        </div>

                    </div>
                    
                    
                        <!--Left Side bar filter in mobile view-->

                        <script>
                            //  Filter Toggle
                            let filter = document.querySelector('#filter');

                            function filterByCategory() {
                                console.log("filter_work")
                                filter.classList.toggle("filter_menu_show")
                            }
                        </script>
                        
                        <!--Left Side bar filter in mobile view-->
                    
                    
                </div>

            </div>
            </div>

            <?php
  // $count++;
  } 








  

// =======================================================================
// Else part starting from here -->
// =======================================================================


  else
  {  
?>

                <div class="container-fluid">
                    <!-- ============================================================ -->
                    <!-- Else product category id not receieved below will run -->
                    <!-- ============================================================ -->

                    <div class="row">
                        <div class="shoe">
                            <div class="filter-menu" onclick="filterByCategory()">
                                <span><i class="fa fa-filter" aria-hidden="true"></i> &nbspfilter</span>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="left_sidebar_area sticky-top" id="filter" >
                                                      <div style="padding:0 30px">
<h3>Filter</h3>
<hr>
</div>
                                <aside>
                                    <div class="widgets_inner">
                                        <input type="text" class="form-control form-input" id="myInput" onkeydown="hide_search_dropdown()" onkeyup="filterFunction()" placeholder="Search here...">
                                        <ul class="list datatable dropdown-content" id="myDropdown">
                                            <!-- li tag with data dynamically coming from backend -->
                                        </ul>

                                    </div>
                                </aside>

                                <aside>
                                    <div class="l_w_title">
                                        <h3>Price</h3>
                                    </div>

                                    <div class="widgets_inner">

                                        <input type="hidden" id="hidden_minimum_price" value="0" />
                                        <input type="hidden" id="hidden_maximum_price" value="65000" />
                                        <p id="price_show">0 - 10000</p>
                                        <div id="price_range"></div>
                                    </div>
                                </aside>

                                <aside>
                                    <div class="l_w_title " data-toggle="collapse" data-target="#collapseone" aria-expanded="false" aria-controls="collapseone">
                                        <h3 class="w-100 d-flex justify-content-between">Color <i class="ti ti-angle-down pt-2"></i> </h3>
                                    </div>

                                    <div class="widgets_inner">

                                        <div class="accordion" id="accordionExample">

                                            <div id="collapseone" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                                                <?php

                              $query = "SELECT DISTINCT(color) FROM products ORDER BY id DESC";

                              $run = mysqli_query($db,$query);

                              // $num = mysqli_num_rows($run);

                                while($row = mysqli_fetch_assoc($run))
                                {
                                  // echo $row['color'];
                                  if($row['color'] !== "")
                                  {
                                ?>
                                                    <div class="list-group-item checkbox">
                                                        <label><input type="checkbox" class="common_selector color" value="<?php echo $row['color']; ?>" > &nbsp &nbsp <?php echo $row['color']; ?></label>
                                                    </div>
                                                    <?php
                                  }
                                }

                            ?>

                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <aside>
                                    <div class="l_w_title " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">

                                        <h3 class="w-100 d-flex justify-content-between">Material <i class="ti ti-angle-down pt-2"></i> </h3>

                                    </div>

                                    <div class="widgets_inner">

                                        <div class="accordion" id="accordionExample">

                                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">

                                                <?php

                              $query = "SELECT DISTINCT(material) FROM products  ORDER BY id DESC";

                              $run = mysqli_query($db,$query);

                              // $num = mysqli_num_rows($run);


                                  while($row = mysqli_fetch_assoc($run))
                                  {
                                    // echo $row['material'];
                                    
                                    if($row['material'] !== "")
                                    {
                                  ?>
                                                    <div class="list-group-item checkbox">
                                                        <label><input type="checkbox" class="common_selector material" value="<?php echo $row['material']; ?>" > &nbsp &nbsp <?php echo $row['material']; ?></label>
                                                    </div>
                                                    <?php
                                    }
                                  }
                              

                            ?>

                                                        <!-- ===========================
                        below code Not in use 
                      ============================== -->

                                                        <!-- <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                      <?php

                              $query = "SELECT DISTINCT(material) FROM products  ORDER BY id DESC";

                              $run = mysqli_query($db,$query);

                              // $num = mysqli_num_rows($run);


                                  while($row = mysqli_fetch_assoc($run))
                                  {
                                    // echo $row['material'];
                                    
                                    if($row['material'] !== "")
                                    {
                                  ?>
                                              <div class="list-group-item checkbox">
                                                  <label><input type="checkbox" class="common_selector material" value="<?php echo $row['material']; ?>" > &nbsp &nbsp <?php echo $row['material']; ?></label>
                                              </div>
                                  <?php
                                    }
                                  }


                              ?>
                              </div> -->
                                                        <!-- ===========================
                      below code Not in use 
                      ============================== -->

                                            </div>
                                        </div>
                                    </div>


                                </aside>



                            </div>
                        </div>

                        <!--Left Side bar filter in mobile view-->

                        <script>
                            //  Filter Toggle
                            let filter = document.querySelector('#filter');

                            function filterByCategory() {
                                console.log("filter_work")
                                filter.classList.toggle("filter_menu_show")
                            }
                        </script>
                        
                        <!--Left Side bar filter in mobile view-->


                        <div class="col-lg-9">
                            <div class="latest_product_inner">
                                <div class="row filter_data">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
                <?php
  }
  ?>
    </section>



    <!--================End Category Product Area =================-->

    <!--================ start footer Area  =================-->
    <?php include("include-front/footer.php"); ?>
    <!--================ End footer Area  =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/lightbox/simpleLightbox.min.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/isotope/isotope-min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="vendors/jquery-ui/jquery-ui.js"></script>
    <script src="vendors/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendors/counter-up/jquery.counterup.js"></script>
    <script src="js/theme.js"></script>


    <script>
        // ------------------------------------------------------
        // Browse categories search filter starts here 
        // ------------------------------------------------------

        function filterFunction() {


            var myInput = document.getElementById("myInput").value;
            // console.log(selected_option);
            // alert(myInput);
            if (myInput != '') {
                $.ajax({
                    url: 'admin/includes/get-search-suggestion.php',
                    method: 'POST',
                    data: {

                        myInput: myInput,

                    },
                    success: function(response) {

                        $('#myDropdown').slideDown();
                        $('#myDropdown').html(response);
                    }
                });

            } else {
                $('#myDropdown').fadeOut();
                $('#myDropdown').html("");
            }

        }


        // ------------------------------------------------------
        // Browse categories search filter ends here 
        // ------------------------------------------------------



        // ------------------------------------------------------
        // Price Filter
        // ------------------------------------------------------

        $(document).ready(function() {

            filter_data();

            function filter_data() {
                $('.filter_data').html('<div id="loading" style="" ></div>');
                var action = 'shop-page-fetch-data';
                var product_category_id = $('#product_category_id').val();

                // alert(product_category_id);


                var minimum_price = $('#hidden_minimum_price').val();
                var maximum_price = $('#hidden_maximum_price').val();

                var color = get_filter('color');
                var material = get_filter('material');

                // alert(color);

                $.ajax({
                    url: "admin/includes/shop-page-fetch-data.php",
                    method: "POST",
                    data: {
                        action: action,
                        minimum_price: minimum_price,
                        maximum_price: maximum_price,
                        color: color,
                        material: material,
                        product_category_id: product_category_id
                    },
                    // data:{action: action, product_category_id: product_category_id},
                    success: function(data) {
                        $('.filter_data').html(data);
                    }
                });
            }



            function get_filter(class_name) {
                var filter = [];
                $('.' + class_name + ':checked').each(function() {
                    filter.push($(this).val());
                });

                return filter;
            }



            $('.common_selector').click(function() {
                filter_data();
            });


            $('#price_range').slider({
                range: true,
                min: 0,
                max: 10000,
                values: [0, 10000],
                step: 200,
                stop: function(event, ui) {
                    $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                    $('#hidden_minimum_price').val(ui.values[0]);
                    $('#hidden_maximum_price').val(ui.values[1]);
                    filter_data();
                }
            });

        });
    </script>


</body>

</html>

<!-- generating Randum alfanumeric digit -->
<?php

    $main_category_id = 98765;
    $main_category_name = 98765;

    function random_strings($length_of_string)
    {

        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';         // String of all alphanumeric character
        
        return substr(str_shuffle($str_result),0, $length_of_string);       // Shuffle the $str_result and returns substring of specified length

    }

    $randum_code =  "#Saj".random_strings(12);         // This function will generate Random string of length 8

?>

<style>
  


</style>

<main id="main" class="main">

<!-- <div class="card"> -->
    <!-- <div class="card-body"> --> 
        <div class="card-title ">
            <h3>Add New Product here</h3>
            <!-- <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?add-product"> Add New Product</a></li>
                </ol>
            </nav> -->
        </div>
    <!-- </div> -->
<!-- </div>End Page Title -->
 
<div class="container-fluid">
    <div class="row">


  <div class="col-md-12 card"> 
    <div class="card-body">
      <h4 class="card-title"></h4>

      <!-- Multi Columns Form -->
      <form class="row g-3" action="includes/function.php" enctype="multipart/form-data" method="post">
        <div class="col-md-6 pt-4">
          <label for="inputName5" class="form-label">Product Name</label>
          <input type="text" class="form-control" name="product_name" id="inputName5" required>
        </div>

        <!-- Random code generate for product unique Code -->
        <div class="col-md-3 pt-4">
          <label for="inputName5" class="form-label">Unique Code</label>
          <input type="text" class="form-control" value="<?php echo $randum_code ?>" readonly name="product_unique_code" id="inputName5" required>
        </div>

        <div class="col-md-3 pt-4">
          <label for="inputName5" class="form-label">HSN Code</label>
          <input type="number" min="0" class="form-control" name="hsn_code" id="inputName5" required>
        </div>

        <div class="col-md-12 pt-4">  <!-- category is same using in addcategory page -->
          <label for="inputName5" class="form-label">Product Category</label>
            <select name="parent_category_id" id="mySelect" onchange="myFunction()" class="form-control">
                <option selected="" disabled>Select...</option>                                  
                <?php
                    // $main_categ = getProductMainCateg($db);
                    // foreach($main_categ as $ct)
                    
                    $sql="SELECT * FROM `main_category` WHERE `parent_category_id` = '$main_category_id'";

                    $run = mysqli_query($db,$sql);  

                    while($ct = mysqli_fetch_assoc($run))
                    {
                    ?>
                        <option value="<?= $ct['id']?>"> <?= $ct['category_name']?> </option>

                    <?php
                    } 
                    ?>
            </select>
        </div>
<!-- ------------------------------------------------- -->
<!-- Important Sub categories will show belo input tag -->
<!-- ------------------------------------------------- -->

        <div class="col-md-12 " id="new_select_div" >
              <!-- <label for="inputName5" class="form-label">Sub Category</label>    -->
            <!--<select  name="parent_category_id" id="new_select" onchange='myFunction_sub()' class="form-control" >
                
                
            </select> -->
        </div>
        
<!-- ------------------------------------------------- -->
<!-- Important Sub categories will show belo input tag -->
<!-- ------------------------------------------------- -->


        <div class="col-md-5 pt-4" >
          <div class="fluid-container ">
            <div class="row">
              <label for="inputName5" class="form-label text-success">Product Dimesion*</label>
              <div class="col-md-4 pt-2">
                <label for="inputName5" class="form-label">Length</label>
                <input type="number" min="0" class="form-control" name="product_length" id="product_length" required>
              </div>  
              <div class="col-md-4 pt-2">
                <label for="inputName5" class="form-label">Breadth</label>
                <input type="number" min="0" class="form-control" name="product_breadth" id="product_breadth" required>
              </div>  
              <div class="col-md-4 pt-2">
                <label for="inputName5" class="form-label">Height</label>
                <input type="number" min="0" class="form-control" name="product_height" id="product_height" required>
              </div> 
            </div> 
          </div>
        </div>

        <div class="col-md-7 pt-4" >
          <div class="fluid-container ">
            <div class="row">
              <label for="inputName5" class="form-label text-success">Package Dimesion*</label>
              <div class="col-md-3 pt-2">
                <label for="inputName5" class="form-label">Length</label>
                <input type="number" min="0" class="form-control" name="package_length" id="package_length" required>
              </div>  
              <div class="col-md-3 pt-2">
                <label for="inputName5" class="form-label">Breadth</label>
                <input type="number" min="0" class="form-control" name="package_breadth" id="package_breadth" required>
              </div>  
              <div class="col-md-3 pt-2">
                <label for="inputName5" class="form-label">Height</label>
                <input type="number" min="0" class="form-control" name="package_height" id="package_height" required>
              </div> 
              <div class="col-md-3 pt-2">
              <label for="inputName5" class="form-label">Total Weight</label>
                  <div class="input-group">
                    <input type="number" min="0" class="form-control" id="validationDefaultUsername" name="total_weight" aria-describedby="inputGroupPrepend2" required>
                    <span class="input-group-text" id="inputGroupPrepend2">gms</span>
                  </div>
                </div>
            </div> 
          </div>
        </div>

        <!-- <div class="col-md-2 pt-4" >
          <div class="fluid-container ">
            <div class="row">
              <label for="inputName5" class="form-label text-success"> </label> 
              <div class="col-md-12 pt-2">
                <label for="inputName5" class="form-label">Weight*</label>
                <input type="number" min="0" class="form-control" name="product_cost" id="inputName5" required>
              </div>  
  
            </div> 
          </div>
        </div> -->

        <div class="col-md-3 pt-4">
          <label for="inputName5" class="form-label"> ₹ Selling Cost (Inclusive GST)</label>
          <input type="number" min="0" class="form-control" name="product_selling_cost" id="product_selling_cost" required>
        </div>  


        <div class="col-md-3 pt-4">
          <label for="inputName5" class="form-label">GST </label>   
            <select name="gst" id="gst" onchange="price_calculation()" class="form-control" required>
                <!-- <option selected="" disabled>Select...</option>                                   -->
                <option value="5">5%</option>
                <option value="12">12%</option>
                <option value="18">18%</option>
                <option value="22">22%</option>
                <option value="0">Nill</option>
            </select>
        </div>


        <div class="col-md-3 pt-4" >
          <label for="inputName5" class="form-label"> ₹ MRP </label>
          <input type="number" class="form-control" name="product_price" id="price" required>
        </div>

        <div class="col-md-3 pt-4">
          <label for="inputName5" class="form-label">Extra Discount %</label>
          <input type="number" class="form-control" name="discount" onchange="price_calculation_after_discount()" id="discount" required>
        </div>

        <div class="col-md-6 pt-4">
          <label for="inputName5" class="form-label">₹ Final Price </label>
          <input type="tel" class="form-control" name="final_price" readonly id="final_price" required>
        </div>
                    
        <div class="col-md-4 pt-4">
          <label for="inputName5" class="form-label">Available Quantity</label>
          <input type="number" class="form-control" name="available_quantity" id="qty" required>
        </div>

        <div class="col-md-2 pt-4">
          <label for="inputName5" class="form-label">Unit</label>   
            <select name="product_unit" class="form-control" required>
                <option selected="" disabled>Select...</option>                                  
                <option value="ps">ps.</option>
                <!-- <option value="gm">gm</option>
                <option value="kg">kg</option>
                <option value="ltr">ltr</option>
                <option value="dozen">dozen</option>
                <option value="pkt">pkt</option> -->
                <option value="">..</option>
            </select>
        </div>
 



        <div class="col-md-12 pt-4">
          <label for="inputName5" class="form-label">Alert Quantity</label>
          <input type="number" class="form-control" name="alert_quantity" id="inputName5" required>
        </div>

        <div class="col-md-12 pt-4">
          <label for="inputName5" class="form-label">Product Description</label>
          <textarea class="form-control" name="product_description" required style="height: 80px" spellcheck="false"></textarea>
        </div>

        <div class="col-md-12 pt-4">
          <label for="inputName5" class="form-label">A+ Content</label>
          <textarea class="form-control" name="product_A_plus_content" required style="height: 100px" spellcheck="false"></textarea>
        </div>

        <div class="form-group col-sm-12 pt-4"> 
          <div class="col-sm-12">
            <!-- <label for="inputName5" class="form-label">Upload Product Ima ge(max 1MB)</label> -->
            <!-- <input type="file" class="form-control" name="uploadfile" accept="image/*"  > -->
            <input type="file" class="form-control" name="files[]" multiple>
          </div>
        </div>

        <!-- <div class="col-12 pt-4">  
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div> -->
 
        
        <div class="col-12 d-grid pt-4">
          <button type="submit" name="addProduct" class="btn btn-success">Add</button>
        </div>
        <br>
        <div class="pt-4">
          <button type="reset" class="btn btn-secondary">Discard</button>
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>

</div>

</main>


<!-- ---------------------------------------------------------------------------------- -->
<!-- Add Category and Subcategory dynamically -->
<!-- ---------------------------------------------------------------------------------- -->

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


    function myFunction()
    {
    var selected_option = document.getElementById("mySelect").value;
        // console.log(selected_option);

    $.ajax({
        url:'includes/get-submenu.php',
        method:'POST',
        data: {
            // get_option:val
            selected_option : selected_option,
      
    },
    success: function (response) {

        // document.getElementById("mySelect").disabled = trues; 
        // document.getElementById("my_select").innerHTML=response; 
        document.getElementById("new_select_div").innerHTML=response; 
        // alert(response);
    }
    });
    }


    function myFunction_sub()
    {
    var selected_option = document.getElementById("new_select").value;
    // document.getElementById("select_label").style.display = 'none';;

        console.log(selected_option);
        if(!selected_option )
        {
            return false;
        }

        else
        {

            $.ajax({
                url:'includes/get-submenu.php',
                method:'POST',
                data: {
                    // get_option:val
                    selected_option : selected_option,
            
            },
            success: function (response) {

                document.getElementById("mySelect").setAttribute("disabled", "disabled");
                document.getElementById("new_select_div").innerHTML=response; 
                // alert(response);
                // console.log(response);
            }
            });

    }
 
}

</script>
<!-- ---------------------------------------------------------------------------------- -->
<!-- Add Category and Subcategory dynamically ends here-->
<!-- ---------------------------------------------------------------------------------- -->

<script>
    window.onload=function(){
      document.getElementById("linkid").click();
    };
</script>





<!-- ---------------------------------------------------------------------------------- -->
<!-- Price Calculation Before discount-->
<!-- ---------------------------------------------------------------------------------- -->

<script>
    function price_calculation()

      {
        var gst = document.getElementById("gst").value;
        var product_selling_cost = document.getElementById("product_selling_cost").value;
        // var product_length = document.getElementById("product_length").value;
        // var product_breadth = document.getElementById("product_breadth").value;
        // var product_height = document.getElementById("product_length").value;

        // var package_length = document.getElementById("package_length").value;
        // var package_breadth = document.getElementById("package_breadth").value;
        // var package_height = document.getElementById("package_height").value;

            // console.log(selected_option);
            // alert(package_height);

        $.ajax({
            url:'includes/price-calculation.php',
            method:'POST',
            data: {
                // get_option:val
                gst : gst,
                product_selling_cost : product_selling_cost,
          
        },
        success: function (response) {

            $('#price').attr('value',response); 
            $('#price').attr('readonly','true'); 
            // document.getElementById("price").innerHTML=response; 
            // alert(response);
        }
        });
    }
</script>

<!-- ---------------------------------------------------------------------------------- -->
<!-- Price Calculation Before discount ends here -->
<!-- ---------------------------------------------------------------------------------- -->



<!-- ---------------------------------------------------------------------------------- -->
<!-- Price Calculation After discount-->
<!-- ---------------------------------------------------------------------------------- -->

<script>
    function price_calculation_after_discount()

      {
        var price = document.getElementById("price").value;
        var discount = document.getElementById("discount").value;

            // console.log(selected_option);
            // alert(package_height);

        $.ajax({
            url:'includes/price-calculation.php',
            method:'POST',
            data: {
                // get_option:val
                price : price,
                discount : discount,
          
        },
        success: function (response) {

            $('#final_price').attr('value',response); 
            $('#final_price').attr('readonly','true'); 
            // document.getElementById("price").innerHTML=response; 
            // alert(response);
        }
        });
    }
</script>

<!-- ---------------------------------------------------------------------------------- -->
<!-- Price Calculation After discount ends here -->
<!-- ---------------------------------------------------------------------------------- -->

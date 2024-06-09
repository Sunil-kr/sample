
<!-- generating Randum alfanumeric digit -->
<?php

if(!isset($_SESSION['isAdminLoggedIn'])){
  header('Location: ../login.php'); 
  
}
    // include("function.php");

    $main_category_id = 98765; 
    $main_category_name = 'Top Main'; 

    function random_strings($length_of_string)
    {
 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';         // String of all alphanumeric character
        
        return substr(str_shuffle($str_result),0, $length_of_string);       // Shuffle the $str_result and returns substring of specified length

    }

    $randum_code =  "#VinCat".random_strings(12);         // This function will generate Random string of length 8

?>


<main id="main" class="main">

<!-- <div class="card"> -->
    <!-- <div class="card-body"> -->
        <div class="card-title ">
            <h3>Add New Category </h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?dashboard">Category</a></li>
                <li class="breadcrumb-item">Add New </li>
                </ol>
            </nav> 
        </div>
    <!-- </div> -->
<!-- </div>End Page Title -->
<section class="section">
    <div class="row"> 

      
      <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Create Category</h4>

                    <!-- Multi Columns Form -->
                    <form class="row g-3 pt-3" action="includes/function.php" enctype="multipart/form-data" method="post">

                        <div class="col-md-6 ">
                            <label for="inputName5" class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="product_categ_name" id="inputName5" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputName5" class="form-label">Unique Code</label>
                            <input type="text" class="form-control" value="<?php echo $randum_code; ?>" readonly="readonly"  name="product_categ_code"  id="inputName5" required>
                        </div>


                        <div class="col-md-12 pt-3">
                            <label for="inputName5" class="form-label">Parent category</label>   
                            <select name="parent_category_code" id="mySelect" onchange="myFunction()" class="form-control" required>
                                <option selected="" disabled>Select...</option>                                  
                                <option value="<?=$main_category_id ?>">Top Main</option>                                  
                                    <?php
                                
                                    
                                    $sql="SELECT * FROM `product_category` WHERE `parent_categ_code` = '98765'";

                                    $run = mysqli_query($db,$sql);  


                                        while($ct = mysqli_fetch_assoc($run))
                                        {
                                            // Top Main Categories
                                            ?>
                                                <option class="fw-bold" style="color: var(--main)" value="<?= $ct['product_categ_code']?>"> <?= $ct['product_categ']?> </option>

                                            <?php
                                    
                                            $catcode = $ct['product_categ_code'];

                                            $sql1="SELECT * FROM `product_category` WHERE `parent_categ_code` = '$catcode'";

                                            $run1 = mysqli_query($db, $sql1);  
        
                                               
                                                while($ct1 = mysqli_fetch_assoc($run1))
                                                {
                                                    // Sub Categories
                                                    ?>
                                                        <option class="px-3" value="<?= $ct1['product_categ_code']?>"> <?= $ct1['product_categ']?> </option>
                                                    
                                                    <?php
                                                } 
                                        } 
                                        ?>
                                       
                            </select> 
                        </div>
 
                        <div class="col-md-12 pt-4">
                            <label for="inputName5" class="form-label">Description</label>
                            <textarea class="form-control" name="categ_description"  style="height: 80px" spellcheck="false"></textarea>
                        </div>

                        
                        <div class="col-md-12 pt-3">
                            <label for="inputName5" class="form-label">Image (Max. size 500kb png/jpg)</label>
                            <input type="file" class="form-control" name="upload_cat_image" >
                        </div>

                        <div class="col-md-12 pt-3">
                            <label for="inputName5" class="form-label">Status </label>   
                            <select name="status" id="status" class="form-control" required>
                                <!-- <option selected="" disabled>Select...</option> -->
                                <option value="1">Public</option>
                                <option value="0">Draft</option>
                                
                            </select>
                        </div>


                        <div class="d-grid pt-2">
                        <button type="submit" name="addProductCateg" class="btn site_btn shadow">Add</button>
                        </div>
                        <div class="pt-3 text-start">
                        <button type="reset" class="btn new-btn">Reset</button>
                        </div>
                    </form><!-- End Multi Columns Form -->

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
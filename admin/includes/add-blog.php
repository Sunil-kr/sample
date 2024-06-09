
<!-- generating Randum alfanumeric digit -->
<?php

    if(!isset($_SESSION['isAdminLoggedIn'])){
          header('Location: ../login.php'); 
      
    }


    function random_strings($length_of_string)
    {
 
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';         // String of all alphanumeric character
        
        return substr(str_shuffle($str_result),0, $length_of_string);       // Shuffle the $str_result and returns substring of specified length

    }

    $randum_code =  "BLOG".random_strings(12);         // This function will generate Random string of length 8

?>

<style>  
  


</style>

<main id="main" class="main">

<!-- <div class="card"> -->
    <!-- <div class="card-body"> --> 
        <div class="card-title ">
            <h3>Publish &nbsp<i class="bi bi-pencil fs-5" ></i></h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?add-blog">Blog</a></li>
                <li class="breadcrumb-item"><a href="index.php?add-blog"> Add New</a></li>
                </ol>
            </nav>
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
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Title</label>
          <input type="text" class="form-control" name="blog_name" id="inputName5" required>
        </div>

        <!-- Random code generate for product unique Code -->
        <div class="col-md-6 pt-2 d-none" >
          <label for="inputName5" class="form-label">Unique Code</label>
          <input type="text" min="0" class="form-control"  value="<?php echo $randum_code; ?>" name="blog_unique_code" id="inputName5" readonly="readonly" required  >

        </div>  
 

        <div class="col-md-6 pt-2">
            <label for="inputName5" class="form-label">Category</label>   
            <select name="blog_category_code" id="mySelect" class="form-control" required>
                <option value="">Select...</option>                                  
                    <?php
                
                    
                    $sql="SELECT * FROM `blog_category` ORDER BY id DESC ";

                    $run = mysqli_query($db,$sql);  


                        while($ct = mysqli_fetch_assoc($run))
                        {
                            ?>
                                <option value="<?= $ct['blog_categ_code']?>"> <?= $ct['blog_categ']?> </option>

                            <?php
                    
                        } 
                        ?>
                        
            </select> 
        </div>

        
        <div class="form-group col-sm-12 pt-3"> 
          <div class="col-sm-12">
            <label for="inputName5" class="form-label">Blog Cover Image <small class="text-danger fw-bold">(Max. size 500kb png/jpg/jpeg, Diemension 1920x600px) </small></label>
            <input type="file" class="form-control" required name="upload_main_image">
          </div>
        </div>


        <div class="col-md-12 pt-3">
          <label for="inputName5" class="form-label"></label> 
          <textarea class="form-control ckeditor" name="blog_description" required> </textarea>
        </div>

        <div class="col-md-6 pt-2 " >
          <label for="inputName5" class="form-label">Author</label>
          <input type="text" class="form-control"  name="author" id="inputName5" required  >

        </div>  

        
        <div class="col-md-6 pt-3"> 
          <label for="inputName5" class="form-label">Status </label>   
            <select name="status" id="status" class="form-control" required>
                <!-- <option selected="" disabled>Select...</option> -->
                <option value="profile_img">Profile Image</option>
                <option value="brand_logo">Brand Logo</option>
                <option value="qr_code">QR Code</option>
                <option value="digital_card_doc">Digital Card</option>
                
            </select>
        </div>

        
        <div class="col-12 d-grid pt-4">
          <button type="submit" name="addBlog" class="btn site_btn">Add</button>
        </div>
        <br>
        <div class="pt-4">
          <button type="reset" class="btn new-btn">Discard</button>
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


</script>
<!-- ---------------------------------------------------------------------------------- -->
<!-- Add Category and Subcategory dynamically ends here-->
<!-- ---------------------------------------------------------------------------------- -->

<script>
    // window.onload=function(){
    //   document.getElementById("linkid").click();
    // };
</script>




<!-- <br><br> -->
<?php

include("db.php");

if($_GET['edit_blog_code'])
{
  
  $blog_code = $_GET['edit_blog_code'];

  $sql = "SELECT * FROM `blogs` WHERE `blog_code` = '$blog_code' ";
  $output = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($output);

  // echo $row['blog_name'];

}

?>
 

 
<style>
  .image{
    display: inline;
    position: relative;
 
  }    

  .bi-x-circle-fill{
    position: absolute;
    right: 0;
    top: 0;
    height: 21px;
    width: 21px;
  }

</style>



<main id="main" class="main">

<!-- <div class="card"> -->
    <!-- <div class="card-body"> -->
        <div class="card-title ">
            <h3>Edit Blog </h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item">Edit</li>
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

        <!-- Sending id with url in function page --> 


      <form class="row g-3" action="includes/function.php?blog_update_unique_code=<?= $blog_update_unique_code;?>&&blog_edit_category_code=<?=$blog_category_id;?>" enctype="multipart/form-data" method="post">
      <div class="col-md-6 pt-4">
          <label for="inputName5" class="form-label">Blog Title</label>
          <input type="text" class="form-control" value="<?php echo $row['blog_name']; ?>" name="blog_name" id="inputName5" required>
        </div>

        <!-- Random code generate for blog unique Code -->
        <div class="col-md-6 pt-4 d-none">
          <label for="inputName5" class="form-label">Unique Code</label>
                    <input type="text" min="0" class="form-control"  value="<?php echo $row['blog_code']; ?>" name="blog_unique_code" id="inputName5" readonly="readonly" required style="text-transform:uppercase" >

        </div>  
 

        <div class="col-md-6 pt-4">
            <label for="inputName5" class="form-label">Category</label>   
            <select name="blog_category_code" id="mySelect" class="form-control" required>
                <option value="<?=$row['blog_category_code']?>"><?=$row['blog_category_name']?></option>                                  
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


        <div class="col-md-12 pt-4">
          <label for="inputName5" class="form-label">blog Description</label>
          <textarea class="form-control ckeditor" name="blog_description" required style="height: 80px" spellcheck="false"><?php echo $row['blog_description'];?></textarea>
        </div>

  
        <?php
            if(empty($row['main_image']))
            {
            ?>
              <div class="form-group col-sm-12 pt-3"> 
                <div class="col-sm-12">
                  <!-- <label for="inputName5" class="form-label">Blog Cover Image <small class="text-dark fw-bold">(Max. size 500kb png/jpg/jpeg, Diemension 1920x600px) </small></label> -->
                  <small class="text-danger fw-bold">To add new Cover Image, delete existing below image first.</small>
                </div>
              </div>
        <?php
            }
            else
            {
              ?>
                <div class="form-group col-sm-12 pt-3"> 
                <div class="col-sm-12">
                  <label for="inputName5" class="form-label">Blog Cover Image <small class="text-dark fw-bold">(Max. size 500kb png/jpg/jpeg, Diemension 1920x600px) </small></label>
                  <input type="file" class="form-control" name="upload_main_image">
                  <small class="text-danger fw-bold">To add new Cover Image, delete existing below image first.</small>
                </div>
              </div>
              <?php
            }
        ?>


        <?php
        $blog_cover_image = $row['blog_cover_image'];
        if(!empty($blog_cover_image))
        {
        ?>
          <div class="col-md-12 container pt-3"> 
            <label for="inputName5" class="form-label">Uploaded Blog Cover Image</label>

            <div class="row">
                  
                  <div class="col-md-2 image col-sm-12 col-6 p-2 mb-3 text-center shadow-sm">
                      <a onclick="myFunction('<?=$row['blog_code']?>')"><i class="bi bi-x-circle-fill text-danger"></i></a>
                      <img src="uploaded_images/<?= $row['blog_cover_image']?>" id="blog-img" class="container-fluid" style="width: 100px; height:60px" alt="<?php
                      $alt= str_replace(' ', '-', ( $row['blog_cover_image'])); echo$alt ?>">      <!--  Important....-->       
                      <br><sub class="fw-bold p-2"><?= $row['blog_cover_image']?> <sub>  
                    
                  </div>
          
              </div> 
          </div>
        <?php
        }
        ?>


        <div class="col-md-6 pt-2 " >
          <label for="inputName5" class="form-label">Author</label>
          <input type="text" class="form-control" value="<?=$row['author']?>" name="author" id="inputName5" required  >

        </div>  
        
        <div class="col-md-6 pt-3"> 
          <label for="inputName5" class="form-label">Status </label>   
            <select name="status" id="status" class="form-control" required>
            <option value="<?=$row['status']?>"><?php if($row['status'] ==1) { echo "Public"; } else { echo "Draft"; } ?></option>
                <option value="1">Public</option>
                <option value="0">Draft</option>
                
            </select>
        </div>

        
        <div class="col-12 d-grid pt-4">
          <button type="submit" name="editblog" class="btn site_btn">Update</button>
        </div>
        <br>
        <div class="pt-4">
          <!-- <button type="reset" class="btn new-btn">Discard</button> -->
        </div>
      </form><!-- End Multi Columns Form -->

    </div>
  </div>

</div>

</main>

<?php //echo $blog_edit_unique_code; ?>

<!-- <button onclick="myFunction()">Try it</button> -->




<script>
    // window.onload=function(){
    //   document.getElementById("linkid").click();
    // };
</script> 




<script>
    function myFunction(value) 
    {
        var blog_code = value;

      // alert(blog_id);
      
        let text = "Are you sure, you want to delete this Image?";
        if (confirm(text) == true) 
        {
          // text = "You pressed OK!";
          window.location.href = 'includes/function.php?blog_image_delete_id='+blog_code;
        } 

        else 
        {
          text = "You canceled!";
        }
        // document.getElementById("demo").innerHTML = text;
    }


    
</script>

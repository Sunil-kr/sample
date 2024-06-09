<!-- <br><br> -->
<?php

include("db.php");

if($_GET['edit_practice_area'])
{
  
  $id = $_GET['edit_practice_area'];

  $sql = "SELECT * FROM `practice_area` WHERE `id` = '$id' ";
  $output = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($output);

//   echo $row['title'];

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
            <h3>Edit Practice Area</h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?manage_practice_area">Practice Area</a></li>
                <li class="breadcrumb-item"><a href="index.php?manage_practice_area"> Edit</a></li>
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
        <div class="col-md-12 pt-3">
          <label for="inputName5" class="form-label">Title</label>
          <input type="text" class="form-control" value="<?php echo $row['title']; ?>" name="title" id="inputName5" required>
        </div>


        <div class="col-md-12 pt-3 d-none">
          <label for="inputName5" class="form-label"></label>
          <input type="text" class="form-control" value="<?php echo $row['id']; ?>" name="id" id="inputName5" required>
        </div>


        <div class="col-md-12 pt-3">
          <label for="inputName5" class="form-label"></label>
          <textarea class="form-control ckeditor" name="content" required><?php echo $row['content'];?> </textarea>
        </div>

  
        <?php
        if(empty($row['cover_image']))
        {
        ?>
            <div class="form-group col-sm-12 pt-3"> 
                <div class="col-sm-12">
                    <label for="inputName5" class="form-label">Cover Image <small class="text-dark fw-bold">(Max. size 500kb png/jpg/jpeg, Diemension 1920x600px) </small></label>
                    <input type="file" class="form-control" name="upload_main_image">
                    <!-- <small class="text-danger fw-bold">To add new Cover Image, delete existing below image first.</small> -->
                </div>
            </div>
        <?php
        }
        else
        {
            ?>
                <div class="form-group col-sm-12 pt-3"> 
                    <div class="col-sm-12">
                        <!-- <label for="inputName5" class="form-label">Cover Image <small class="text-dark fw-bold">(Max. size 500kb png/jpg/jpeg, Diemension 1920x600px) </small></label>
                        <input type="file" class="form-control" name="upload_main_image"> -->
                        <small class="text-danger fw-bold">To add new Cover Image, delete existing below image first.</small>
                    </div>
                </div>
            <?php
        }
        ?>



        <?php
        $cover_image = $row['cover_image'];
        if(!empty($cover_image))
        {
        ?>
          <div class="col-md-12 container pt-3"> 
            <label for="inputName5" class="form-label">Uploaded Cover Image</label>

            <div class="row">
                  
                  <div class="col-md-2 image col-sm-12 col-6 p-2 mb-3 text-center shadow-sm">
                      <a onclick="myFunction('<?=$row['id']?>')"><i class="bi bi-x-circle-fill text-danger"></i></a>
                      <img src="uploaded_practice_area/<?= $row['cover_image']?>" id="blog-img" class="container-fluid" style="width: 100px; height:60px" alt="<?php
                      $alt= str_replace(' ', '-', ( $row['cover_image'])); echo$alt ?>">      <!--  Important....-->       
                      <br><sub class="fw-bold p-2"><?= $row['cover_image']?> <sub>  
                    
                  </div>
          
              </div> 
          </div>
        <?php
        }
        ?>

        
        <div class="col-12 d-grid pt-4">
          <button type="submit" name="editPracticeArea" class="btn site_btn">Update</button>
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
        var id = value;

      // alert(blog_id);
      
        let text = "Are you sure, you want to delete current Cover Image?";
        if (confirm(text) == true) 
        {
          // text = "You pressed OK!";
          window.location.href = 'includes/function.php?practice_area_cover_image='+id;
        } 

        else 
        {
          text = "You canceled!";
        }
        // document.getElementById("demo").innerHTML = text;
    }


    
</script>

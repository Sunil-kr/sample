<!-- <br><br> -->
<?php
if(isset($_GET['edit_member']))
{
   $edit_member_id= $_GET['edit_member'];

   $query="SELECT * FROM team  WHERE id = '$edit_member_id' ORDER BY id DESC ";
 
   $run=mysqli_query($db,$query);

   $row = mysqli_fetch_assoc($run);
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
            <h3>Edit Member <i class="bi bi-pencil fs-5" ></i></h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?dashboard">Team</a></li>
                <li class="breadcrumb-item"><a href="index.php?edit-member"> Edit Memeber</a></li>
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
          <label for="inputName5" class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="<?=$row['member_name']?>" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2 d-none">
          <label for="inputName5" class="form-label">id</label>
          <input type="text" class="form-control" name="id" value="<?=$row['id']?>" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2 d-none">
          <label for="inputName5" class="form-label">slug</label>
          <input type="text" class="form-control" name="slug" value="<?=$row['slug']?>" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Designation</label>
          <input type="text" class="form-control" name="desg" value="<?=$row['desg']?>" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Mobile number</label>
          <input type="tel" class="form-control" name="mobile" value="<?=$row['mobile']?>" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="<?=$row['email']?>" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Linkedin Name or Id</label>
          <input type="text" class="form-control" name="linkedin" value="<?=$row['linkedin']?>" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Linkedin Link</label>
          <textarea class="form-control" name="linkedin_link" required style="height: 40px" spellcheck="false"><?=$row['linkedin_link']?> </textarea>
        </div>
        
        <div class="col-md-12 pt-2">
          <label for="inputName5" class="form-label">About Member</label>
          <textarea class="form-control" name="about" required style="height: 60px" spellcheck="false"><?=$row['about']?>  </textarea>
        </div>

        <div class="col-md-12 pt-2">
          <label for="inputName5" class="form-label">Profile</label>
          <textarea class="form-control" name="profile" required style="height: 80px" spellcheck="false"> <?=$row['profile']?> </textarea>
        </div>

        <div class="col-md-12 pt-2">
          <label for="inputName5" class="form-label">Experience</label>
          <textarea class="form-control" name="experience" style="height: 80px" spellcheck="false"> <?=$row['experience']?>  </textarea>
        </div>

        <div class="col-md-12 pt-2">
          <label for="inputName5" class="form-label">Qualification</label>
          <textarea class="form-control" name="qualification" style="height: 80px" spellcheck="false"> <?=$row['qualification']?> </textarea>
        </div>
        
        <?php
            if(empty($row['main_image']))
            {
            ?>
              <div class="form-group col-sm-6 pt-2"> 
                <div class="col-sm-12">
                  <label for="inputName5" class="form-label">Main Image (Max. size 500kb png/jpg)</label>
                  <input type="file" class="form-control" name="upload_main_image">
               
                </div>
              </div> 
        <?php 
            }
        ?>


        <?php
            if(empty($row['thumb_image']))
            {
            ?>

              <div class="form-group col-sm-6 pt-2"> 
                <div class="col-sm-12">
                  <label for="inputName5" class="form-label">Thumb Image (Max. size 500kb png/jpg)</label>
                  <input type="file" class="form-control" name="upload_thumb_image" multiple>
                
                </div>
              </div>
        <?php
            }
        ?>



        <?php
        if(!empty($row['main_image']))
        {
        ?>
        <div class="col-md-6 container pt-2"> 
          <label for="inputName5" class="form-label">Uploaded Main Image <small class="text-danger fw-bold">(To add new Main Image, Please delete below given existing image)</small></label>

          <div class="row">
            <?php
                $member_id = $row['id'];
            ?>
                  
                <div class="col-md-3 image col-sm-12 col-6 p-2 mb-3 text-center shadow-sm">
                    <a onclick="myFunction_main('<?=$member_id?>')"><i class="bi bi-x-circle-fill text-danger"></i></a>
                    <img src="uploaded_team/<?= $row['main_image']?>" id="blog-img" class="container-fluid" style="width: 100px; height:60px" alt="<?php
                    $alt= str_replace(' ', '-', ( $row['main_image'])); echo$alt ?>">      <!--  Important....-->       
                    <br><sub class="fw-bold p-2"><?= $row['main_image']?> <sub>  
                
                </div>
        
            </div>
        </div>
        <?php
        }
     
        ?>

        <?php
        if(!empty($row['thumb_image']))
        {
        ?>
        <div class="col-md-6 container pt-2"> 
          <label for="inputName5" class="form-label">Uploaded Thumb Image <small class="text-danger fw-bold">(To add new Thumb Image, Please delete below given existing image)</small></label>

          <div class="row">
            <?php
                $member_id = $row['id'];
            ?>
                <div class="col-md-3 image col-sm-12 col-6 p-2 mb-3 text-center shadow-sm">
                    <a onclick="myFunction_thumb('<?=$member_id?>')"><i class="bi bi-x-circle-fill text-danger"></i></a>
                    <img src="uploaded_team/<?= $row['thumb_image']?>" id="blog-img" class="container-fluid" style="width: 100px; height:60px" alt="<?php
                    $alt= str_replace(' ', '-', ( $row['thumb_image'])); echo$alt ?>">      <!--  Important....-->       
                    <br><sub class="fw-bold p-2"><?= $row['thumb_image']?> <sub>  
                
                </div>

            </div>
        </div>
        <?php
        }
        ?>
        
        
        <div class="col-12 d-grid pt-2">
          <button type="submit" name="updateTeam_member" class="btn site_btn">Update</button>
        </div>
        <br>
        <div class="pt-2">
          <button type="rowet" class="btn new-btn">Discard</button>
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

    function myFunction_main(value) 
    {
        var member_id = value;

      // alert(product_id);
      
        let text = "Are you sure, you want to delete current Main Image?";
        if (confirm(text) == true) 
        {
          // text = "You pressed OK!";
          window.location.href = 'includes/function.php?team_member_main_img='+member_id;
        } 

        else 
        {
          text = "You canceled!";
        }
        // document.getElementById("demo").innerHTML = text;
    }

    function myFunction_thumb(value) 
    {
        var member_id = value;

      // alert(product_id);
      
        let text = "Are you sure, you want to delete current Thumb Image?";
        if (confirm(text) == true) 
        {
          // text = "You pressed OK!";
          window.location.href = 'includes/function.php?team_member_thumb_img='+member_id;
        } 

        else 
        {
          text = "You canceled!";
        }
        // document.getElementById("demo").innerHTML = text;
    }

</script>
<!-- ---------------------------------------------------------------------------------- -->
<!-- Add Category and Subcategory dynamically ends here-->
<!-- ---------------------------------------------------------------------------------- -->

<script>
    // window.onload=function(){
    //   document.getElementById("linkid").click();
    // };
</script>




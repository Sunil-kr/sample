

<main id="main" class="main">

<!-- <div class="card"> -->
    <!-- <div class="card-body"> --> 
        <div class="card-title ">
            <h3>Add New Member &nbsp</h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?add-team">Team</a></li>
                <li class="breadcrumb-item"><a href="index.php?add-team"> Add New Memeber</a></li>
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
          <input type="text" class="form-control" name="name" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Designation</label>
          <input type="text" class="form-control" name="desg" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Mobile number</label>
          <input type="tel" class="form-control" name="mobile" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Linkedin Name or Id</label>
          <input type="text" class="form-control" name="linkedin" id="inputName5" required>
        </div>
        
        <div class="col-md-6 pt-2">
          <label for="inputName5" class="form-label">Linkedin Link</label>
          <textarea class="form-control" name="linkedin_link" required style="height: 40px" spellcheck="false"></textarea>
        </div>
        
        <div class="col-md-12 pt-2">
          <label for="inputName5" class="form-label">About Member</label>
          <textarea class="form-control" name="about" required style="height: 60px" spellcheck="false"></textarea>
        </div>

        <div class="col-md-12 pt-4">
          <label for="inputName5" class="form-label">Profile</label>
          <textarea class="form-control" name="profile" required style="height: 80px" spellcheck="false"></textarea>
        </div>

        <div class="col-md-12 pt-4">
          <label for="inputName5" class="form-label">Experience</label>
          <textarea class="form-control" name="experience" style="height: 80px" spellcheck="false"></textarea>
        </div>

        <div class="col-md-12 pt-4">
          <label for="inputName5" class="form-label">Qualification</label>
          <textarea class="form-control" name="qualification" style="height: 80px" spellcheck="false"></textarea>
        </div>

        <div class="form-group col-sm-6 pt-5"> 
          <div class="col-sm-12">
            <label for="inputName5" class="form-label">Main Image (Max. size 500kb png/jpg)</label>
            <input type="file" class="form-control" name="upload_main_image" required>
          </div>
        </div>

        <div class="form-group col-sm-6 pt-5"> 
          <div class="col-sm-12">
            <label for="inputName5" class="form-label">Thumb Image (Max. size 500kb png/jpg)</label>
            <input type="file" class="form-control" name="upload_thumb_image" required >
          </div>
        </div>
        
        
        <div class="col-12 d-grid pt-4">
          <button type="submit" name="addTeam_member" class="btn site_btn">Add</button>
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




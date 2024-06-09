



<main id="main" class="main">

<!-- <div class="card"> -->
    <!-- <div class="card-body"> --> 
        <div class="card-title ">
            <h3>Practice Area</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="index.php?manage_practice_area">Practice Area</a></li>
                    <li class="breadcrumb-item"><a href="index.php?add_practice_area"> Add New</a></li>
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
        <div class="col-md-12 pt-2">
          <label for="inputName5" class="form-label">Title</label>
          <input type="text" class="form-control" name="title" id="inputName5" required>
        </div>

        
        <div class="form-group col-sm-12 pt-3"> 
          <div class="col-sm-12">
            <label for="inputName5" class="form-label">Cover Image <small class="text-danger fw-bold">(Max. size 500kb png/jpg/jpeg, Diemension 1920x600px) </small></label>
            <input type="file" class="form-control" required name="upload_main_image">
          </div>
        </div>


        <div class="col-md-12 pt-3">
          <label for="inputName5" class="form-label"></label>
          <textarea class="form-control ckeditor" name="content" required> </textarea>
        </div>

          
        <div class="col-12 d-grid pt-4">
          <button type="submit" name="addPracticeArea" class="btn site_btn">Add</button>
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




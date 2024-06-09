<?php
  include("db.php");

  $main_category_id = 98765; 
  $main_category_name = 'Top Main'; 

  function random_strings($length_of_string)
  {

      $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';         // String of all alphanumeric character
      
      return substr(str_shuffle($str_result),0, $length_of_string);       // Shuffle the $str_result and returns substring of specified length

  }

  $randum_code =  "BLOGCAT".random_strings(12);         // This function will generate Random string of length 8

?>





 <!-- ************************************* -->
<!-- Modal to add new Category -->
<!-- ************************************ -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Add New Category</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">
            
                <div class="col-md-12 ">
                    <label for="inputName5" class="form-label mt-2">Category Name</label>
                    <input type="text" class="form-control" name="blog_categ_name" id="inputName5" required>
                </div>

                <div class="col-md-12 d-none">
                    <label for="inputName5" class="form-label">Unique Code</label>
                    <input type="text" class="form-control" value="<?php echo $randum_code; ?>" readonly="readonly"  name="blog_categ_code"  id="inputName5" required>
                </div>
            
                <div class="col-md-12 pt-3">
                    <label for="inputName5" class="form-label mt-2">Image (Max. size 500kb png/jpg)</label>
                    <input type="file" class="form-control" required name="upload_cat_image" >
                </div>

                <div class="d-grid pt-2 mt-3">
                  <button type="submit" name="addBlogCateg" class="btn site_btn shadow">Add</button>
                </div>    

            </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>




 <!-- ************************************* -->
<!-- Modal to Edit Category -->
<!-- ************************************ -->
<div class="modal fade bd-example-modal-lg" id="edit_blog_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-center site_btn">
        <h5 class="modal-t text-center" id="exampleModalLabel">Edit Category Name</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
            <form role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">
            
                <div class="col-md-12 ">
                    <label for="inputName5" class="form-label mt-2">Category Name</label>
                    <input type="text" class="form-control" name="blog_categ_name" id="edit_blog_categ_name" required>
                </div>

                <div class="col-md-12 d-none">
                    <label for="inputName5" class="form-label">Unique Code</label>
                    <input type="text" class="form-control" value="<?php echo $randum_code; ?>" readonly="readonly"  name="blog_categ_code"  id="edit_blog_categ_code" required>
                </div>
            
                <!-- <div class="col-md-12 pt-3">
                    <label for="inputName5" class="form-label mt-2">Image (Max. size 500kb png/jpg)</label>
                    <input type="file" class="form-control" name="upload_cat_image" >
                </div> -->

                <div class="d-grid pt-2 mt-3">
                  <button type="submit" name="editBlogCateg" class="btn site_btn shadow">Update</button>
                </div>    

            </form>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>








<main id="main" class="main">
  
  <div class="card-title">
    <h3>Manage Blog categories</h3>
        <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?dashboard">Blog Category</a></li>
                <!-- <li class="breadcrumb-item"><a href="#"> Add New</a></li> -->
                </ol>
            </nav> 

  </div><!-- End Page Title -->

  <section class="section">
      

    <div class="row">  

      <div class="col-md-12">
        <div class="card">
          <div class="card-body pt-3">
            <!-- <h5 class="card-title">Main Category</h5> -->
            
            <p class="text-end" id="export" > 
                <!-- <a class="btn rounded-pill spl-btn px-4 shadow " href="./index.php?add-category"> Add New</a> -->
                <button type="button" class="btn rounded-pill shadow px-5 spl-btn float-right" data-toggle="modal" data-target="#exampleModal">
                  Add new  
                </button>
            </p>  
    
            <!-- Table with stripped rows -->
            <table class="table datatable" id="category">
              <thead>
                <tr>
                  <th scope="col" width="5%">#</th> 
                  <th scope="col" width="15%">Preview</th>
                  <th scope="col" width="60%">Category Name</th>
                  <!-- <th scope="col">Status</th> -->
                  <th scope="col" width="10%">Edit</th>
                  <th scope="col" width="10%">Delete</th>
                </tr>
              </thead>

              <tbody>
              <?php
                  $data = getBlogCateg($db);
                  $count=1;
                  foreach($data as $row)
                  {

                      // echo $row['product_categ'];
                      $category_unique_code = str_replace('#', ' ', ( $row['blog_categ_code']));

              ?>
                    <tr>
                    <td class="align-middle" scope="row"><?=$count?></td>
                     <td class="align-middle" >
                        <img src="./uploaded_category_images/<?= $row['image']?>" id="product-img" class="" style="height: 40px; width: 40px" alt="<?php
                        $alt= str_replace(' ', '-', ( $row['image']));
                        echo$alt?>">   
                    </td> 

                    <td class="align-middle"><?= $row['blog_categ']?></td>
                    
                    <?php
                      $blog_categ = $row['blog_categ'];
                      // $blog_categ_code = str_replace('#', ' ', ( $row['blog_categ_code']));     // Converting " " = space to # 

                      $blog_categ_code = $row['blog_categ_code'];
                      $image = $row['image'];
                    ?>

                    <td class="align-middle">
                      <a class="btn btn-sm site_btn" onclick="edit_blog_category('<?=$blog_categ?>','<?=$blog_categ_code?>','<?=$image?>')"> <i class="bi bi-pencil-square"></i></a>
                    </td>
      
                    <td class="align-middle">
                      <a class="btn btn-sm btn-danger " href="includes/function.php?delete_blog_category=<?=$blog_categ_code ?>" onclick="return  confirm('Are you sure, You want to delete this Category? ')"> <i class="bi bi-trash"></i></a>
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

</main><!-- End #main -->




<script>

    // <!-- Export table to Excell or CSV -->
    function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('category_export');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('All Categories.' + (type || 'xlsx')));
    }



</script>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



<script>
  function edit_blog_category(val, val1, val2)
  {
    var blog_categ = val;
    var blog_categ_code = val1;
    var image = val2;

    // alert(blog_categ); 
    // edit_banner_model

    $('#edit_blog_model').modal('show');
    document.getElementById('edit_blog_categ_name').value = blog_categ;
    document.getElementById('edit_blog_categ_code').value = blog_categ_code;
    // document.getElementById('banner_id').value = banner_id;
    // document.getElementById('edit_url').value = redirect_link;  
    // document.getElementById('banner_image').src = "./cms/top-carousel/"+banner_image;


  }
</script>
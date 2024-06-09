

<?php 
if(!isset($_SESSION['isAdminLoggedIn'])){
      header('Location: ../login.php'); 
      
    }
include("db.php");

?>


<style> 
  th{
      font-size: 14px; 
  }
   
  .width{
      min-width: 100px;
  }

  ul{ 
      list-style-type:none;
  }

  td{
    font-size: 13px;
  }


  /* MULTI-LINE */
      .text-truncated {
        /* overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;   */
    }



</style>


<main id="main" class="main">

        <div class="card-title ">
            <h3>Manage Blogs</h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?manage-blog">Blog</a></li>
                </ol>
            </nav>
        </div>

  <!-- <div class="d-grid gap-2 justify-content-md-end d-md-block">
      <h1 class="btn text-start" >Product List</h1>
      <a href="index.php?add-inventory" class="btn text-end"><button class="btn btn-sm btn-success">Add New Product</button></a>
  </div> -->
  
<!-- End Page Title -->

<section class="section">
  <div class="row">
      
      

    <div class="col-lg-12">

      <div class="card pt-4" style="overflow-y:scroll;">
        <div class="card-body" >
          <!-- <h5 class="card-title">Datatables</h5> -->

          <p class="text-end" id="export" > 
              <a class="btn rounded-pill spl-btn px-4 shadow " href="./index.php?add-blog"> Add New</a>
              <!-- <button class="btn rounded-pill px-4 new-btn shadow" onclick="ExportToExcel('xlsx')">Export &nbsp<i class="bi bi-arrow-down-circle"></i> </button> -->
          </p>

          <!-- Table with stripped rows -->
          <table class="table datatable table-striped"  id="all_products">
            <thead >
              <tr>
                <th scope="col">#</th> 
                <th scope="col" width="5%">Preview</th>
                <th scope="col" width="25%">Title</th>
                <!-- <th scope="col">Unique Code</th> -->
                <th scope="col" width="40%">Blog Content</th>

                <th scope="col" width="5%">Category</th>
                <th scope="col" width="5%">Author</th>

                <th scope="col" width="10%" class="text-center">Status</th>
                

                <th scope="col" width="5%">Edit</th> 
                <th scope="col" width="5%">Remove</th>
              </tr>
            </thead>

            <tbody>
            <?php
                $data = getAllBlogs($db); 
                $count=1;
                foreach($data as $row)
                {
                  // echo $row['name'];
                  

            ?>
                  <tr>
                  <td class="align-middle" scope="row"><?=$count?></td>

                  <td class="align-middle">
                    <?php

                    ?>
                    <a href="../product-details.php?Product_detail_Unique_Code=<?=$product_unique_code?>" target=”_blank”>
                        <img src="uploaded_images/<?= $row['blog_cover_image']?>" id="product-img" class="" style="height:40px; width:120px" alt="<?php
                        $alt= str_replace(' ', '-', ( $row['image']));
                        echo $alt?>">     
                    </a>
                    
                  </td> 
 
                  <td class="text-truncate align-middle" style="max-width: 150px;" > <a href="../product-details.php?Product_detail_Unique_Code=<?=$product_unique_code?>" target=”_blank”>
                        <?= $row['blog_name']?></a>
                  </td>
                  
                  <td class="text-truncate align-middle" style="max-width: 120px; max-height: 20px;" ><?php echo strip_tags($row['blog_description'])?></td>
                
                   
                  <td class="align-middle" > 
                        <?= $row['blog_category_name']?></a>
                  </td>

                  <td class="align-middle"><?= $row['author']?></td>

                  <td class="align-middle text-center"><?= $row['status']?></td>


                  <td class="align-middle">
                    <?php $blog_unique_code = $row['blog_code'];     // Converting " " = space to # 
                    ?>
                  <a class="btn btn-sm site_btn" href="./index.php?edit_blog_code=<?=$blog_unique_code?>"> <i class="bi bi-pencil-square"></i></a>
                  </td>
                  
                  <td class="align-middle">
                      <div class="btn-group">
                      <?php $blog_unique_code =  $row['blog_code'];     // Converting " " = space to #  ?>
                      <a class="btn btn-sm btn-danger" href="includes/function.php?remove_blog_unique_code=<?=$blog_unique_code?>" onclick="return  confirm('Are you sure, You want to remove this Blog? ')">
                       <i class="bi bi-x-lg"></i></a>
                      </div>
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
    // window.onload=function(){
    //   document.getElementById("linkid").click();
    // };
</script> 



<script>

    // <!-- Export table to Excell or CSV -->
    function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('all_products_export');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('All Products.' + (type || 'xlsx')));
    }



</script>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>



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
            <h3>Practice Area</h3>
            <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="index.php?manage_practice_area"> Manage Practice Area</a></li>
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
              <a class="btn rounded-pill spl-btn px-4 shadow " href="./index.php?add_practice_area"> Add New</a>
              <!-- <button class="btn rounded-pill px-4 new-btn shadow" onclick="ExportToExcel('xlsx')">Export &nbsp<i class="bi bi-arrow-down-circle"></i> </button> -->
          </p>

          <!-- Table with stripped rows -->
          <table class="table datatable table-striped"  id="all_products">
            <thead >
              <tr>
                <th scope="col" width="5%">#</th> 
                <th scope="col" width="5%">Preview</th>
                <th scope="col" width="20%">Title</th>
                <th scope="col" width="35%">Blog Content</th>     
                <th scope="col" width="15%" >Number Sequence</th>


                <th scope="col" width="5%">Edit</th> 
                <th scope="col" width="5%">Remove</th>
              </tr>
            </thead>

            <tbody>
            <?php
                $query="SELECT * FROM `practice_area` ORDER BY `sequence`  ";

                $run = mysqli_query($db, $query);

                $num = mysqli_num_rows($run);

                $count = 1;

                while($row = mysqli_fetch_assoc($run))
                {
                  // echo $row['name'];

            ?>
                  <tr>
                  <td class="align-middle" scope="row"><?=$count?></td>

                  <td class="align-middle">
                    <?php

                    ?>
                    <a href="../product-details.php?Product_detail_Unique_Code=<?=$product_unique_code?>" target=”_blank”>
                        <img src="uploaded_practice_area/<?= $row['cover_image']?>" id="product-img" class="" style="height:40px; width:120px" alt="<?php
                        $alt= str_replace(' ', '-', ( $row['image']));
                        echo $alt?>">     
                    </a>
                    
                  </td> 
 
                  <td class="text-truncate align-middle" style="max-width: 150px;" > 
                        <?= $row['title']?></a>
                  </td>
                  
                  <td class="text-truncate align-middle" style="max-width: 120px; max-height: 20px;" ><?php echo strip_tags($row['content'])?></td>
   
   
                    <?php 
                      $slug = $row['slug'];     // Converting " " = space to # 
                      $member_id =  $row['id']; 
                      $sequence =  $row['sequence']; 
                    ?>

                  <td class="align-middle ">
                    <!-- <a class="btn btn-sm btn-primary" href="./index.php?edit_member=<?=$member_id?>"> <i class="bi bi-123"></i></a> -->
                    <!-- <a class="btn btn-sm site_btn" onclick="edit_member_seq('<?=$slug?>','<?=$member_id?>')"> <i class="bi bi-pencil-square"></i></a> -->
                    

                    <div id="click_to_view_seq_btn<?=$member_id?>">
                      <a class="btn btn-sm site_btn" onclick="myFunction('<?=$member_id?>')"> 
                       <?php
                                  if($sequence==99999)
                                  {

                                    ?>
                                        No Sequence &nbsp <i class="bi bi-pencil-square">                                    
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                       <?=$sequence?> &nbsp <i class="bi bi-pencil-square"> 
                                    <?php
                                  }
                                ?>
                      </i></a>
                    </div>


                    <div id="<?=$member_id?>" style="display: none;">
                      <form class="form-inline mt-3" role="form" method="post" action="./includes/function.php" enctype="multipart/form-data">

                        <div class="input-group mb-3">
                          
                            <select name="seq" id="seq" class="form-control" required>
                                <!-- <option value="">Select...</option> -->

                                <?php
                                  if($sequence==99999)
                                  {

                                    ?>
                                      <!-- <option value="<?=$sequence?>" class="bg-success" disabled>No Sequence</option>                                       -->
                                      <option value="" class="bg-secondary text-light">Select..</option>                                      
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                      <!-- <option value="<?=$sequence?>" class="bg-success" disabled><?=$sequence?></option> -->
                                      <option value="" class="bg-secondary text-light">Select..</option>  
                                    <?php
                                  }
                                ?>
                                
                                <option value="99999">No Sequence</option>
                                <?php
                                  for($i=1; $i<=$num; $i++)
                                  {
                                    $query1 = "SELECT * FROM `practice_area` WHERE `sequence` = '$i' ";

                                    $run1 = mysqli_query($db, $query1);

                                    $num1 = mysqli_num_rows($run1);

                                    if($num1>0)
                                    {

                                      ?>
                                          <option value="<?=$i?>" disabled  style="background-color: gray; color: #fff; border-bottom: 2px solid white;"><?=$i?></option>
                                        
                                      <?php
                                    }
                                    else
                                    {
                                      ?>
                                          <option value="<?=$i?>"><?=$i?></option>
                                      <?php
                                    }

                                  }
                                ?>
                                  
                            </select>
                            
                            <!-- Banner Id --> 
                            <div class="form-group d-none">
                                <input type="text" name="member_id" class="form-control mt-4" readonly value="<?=$member_id?>" id="member_id" placeholder="Banner id">
                            </div>
                

                            <button class="input-group-text btn btn-sm site_btn" id="basic-addon2" type="submit" name="add_practice_area_seq" ><i class="bi bi-arrow-right-square"></i></button>
                      
                        </div>

                      </form>
                    </div>


                  </td>

   

                  <td class="align-middle">
                    <?php $id = $row['id'];     // Converting " " = space to # 
                    ?>
                  <a class="btn btn-sm site_btn" href="./index.php?edit_practice_area=<?=$id?>"> <i class="bi bi-pencil-square"></i></a>
                  </td>
                  
                  <td class="align-middle">
                      <div class="btn-group">
                      <a class="btn btn-sm btn-danger" href="includes/function.php?remove_practice_area=<?=$id?>" onclick="return  confirm('Are you sure, You want to delete this Practice Area? ')">
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




  function myFunction(value) {

    // alert('click_to_view_seq_btn'+value);

    var x = document.getElementById(value);
    var y = document.getElementById('click_to_view_seq_btn'+value);
    if (x.style.display === "none") {
      x.style.display = "flex";
      // y.style.display = "none";
    } else {
      x.style.display = "none";
    }

  }



</script>  

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->

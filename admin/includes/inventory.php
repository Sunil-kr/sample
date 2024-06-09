<?php
  include("db.php");
  error_reporting(0);
if(!isset($_SESSION['isAdminLoggedIn'])){
  header('Location: ../login.php'); 
  // echo"<script>
  //         window.history.back();
  //     </script>";
} 
?>

<style>
table {
  border-collapse: collapse;
  width: 100%;
}
thead{
  /* background-color:var(--ocean); */
  /* color: #fff; */
}
td, th {
  /* border: 1px solid var(--ocean); */
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  /* background-color: #0449546b;  */
}
  .btn-view{ 
    background: var(--ocean-orange);
    color: var(--white);
    font-weight: normal;
  }

  .btn-view i{
    color: #fff;
  }

  .btn-view:hover{
    background: #fff;
    color: var(--ocean-orange);
    border: 1px solid var(--ocean-orange);
    font-weight: bold;
  } 

  .btn-view:hover i{
    color: var(--ocean);
    
  }
</style>

<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.table2excel.min.js"></script>


<script>
// Code goes here

$(function() {
        $("#btn-export").click(function(e){ 
          var table = $("#inventory");
          if(table && table.length){
            $(table).table2excel({
              exclude: ".noExl",
              name: "Excel Document Name",
              filename: "BBBootstrap" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
              fileext: ".xls",
              exclude_img: true,
              exclude_links: true,
              exclude_inputs: true,
              preserveColors: false
            });
          }
        });
        
      });

</script>

<main id="main" class="main">
  
  <div class="card-title">
    <h3>Inventory</h3>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Inventory</li>
        </ol>
    </nav>

  </div><!-- End Page Title -->
  
  <section class="section">
    <div class="row">

    <p class="text-end">
      <!-- <button class="btn btn-sm btn-primary text-light shadow" onclick="ExportToExcel('xlsx')">Export &nbsp<i class="bi bi-arrow-down-circle"></i> </button> -->
      <button class="btn btn-sm btn-primary text-light shadow" onclick="ExportToExcel('xlsx')">Export &nbsp<i class="bi bi-arrow-down-circle"></i> </button>
    </p>
 

      <div class="col-md-12">
        <div class="card">
  

          <div class="card-body pt-3">
            <!-- <h5 class="card-title">Main Category</h5> -->

            <!-- Table with stripped rows -->
            <table class="table datatable table-striped" id="inventory" style="width: 100%">

                      
                <!-- ********************************************************** -->
                <!-- Filter -->
                <!-- ********************************************************** -->

                <div class="filter text-end ">
                        <a class="icon" href="#" data-bs-toggle="dropdown">
                            <span>Filter<i class="bi bi-three-dots fw-bold"></i></span>
                            <!-- <button class="btn btn-light text-dark shadow-sm">Filter</button> -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                            
                        </li>

                        <form method="post">
                            <li><input class="dropdown-item" type="submit" name="lastly_updated" value="By Lastly Updated"> </li>
                            <li><input class="dropdown-item" type="submit" name="reaching_alert" value="By Reaching Alert Qty"> </li>
                            <!-- <li><input class="dropdown-item" type="submit" name="this_year" value="This Year"> </li> -->
                        </form>
                        </ul>
                    </div>

                <!-- ********************************************************** -->
                <!-- Filter ends here -->
                <!-- ********************************************************** -->


              <thead>
                <tr>
                  <th scope="col">#</th> 
                  <th scope="col">Preview </th> 
                  <th scope="col">SKU </th> 
                  <th scope="col"> Product Name</th>
                  <th scope="col" class="text-start">Selling Price</th>
                  <th scope="col"> Last Stock Added at </th>
                  <!--<th scope="col" class="text-start">Alert Quantity</th>-->
                  <!--<th scope="col" class="text-start">Available Quantity</th>-->
                  
                  <th scope="col" class="text-start text-danger">Quantity Left</th>
                  
                  <th scope="col" class="text-center">Update</th>
                </tr>
              </thead>

              <tbody>
              <?php
                  $count=1;
                // ***********************************************
                // Filter Content
                // ***********************************************

                    if(isset($_POST['lastly_updated']))
                    {
                        
                        $run_get_all_products = mysqli_query($db,"SELECT * FROM `products` ORDER BY quantity_updated_at DESC");
                        
                      
                    }
                    else
                    {
                        $run_get_all_products = mysqli_query($db,"SELECT * FROM products ORDER BY available_quantity - alert_quantity  ");

                    }

                // ***********************************************
                // Filter Content ends here
                // ***********************************************
            
                  while($row = mysqli_fetch_assoc($run_get_all_products))
                  {

                    $product_qty_update_id = str_replace('#', ' ', ( $row['product_code']));     // Converting " " = space to # 

                    
              ?>
                    <tr>
                        <td class="align-middle p-3" scope="row"><?=$count?></td>

                        <td>
                            <?php

                                $query="SELECT * FROM `images` WHERE `product_code` = '$product_qty_update_id' ";

                                $run=mysqli_query($db,$query);

                                $res = mysqli_fetch_assoc($run); 

                            ?>

                            <img src="uploaded_images/<?= $res['image']?>" id="product-img" class="" style="height:60px; width:60px" alt="<?= $row['product_code'];?>">      <!--  Important....-->       
                        </td> 
 
                        <td class="align-middle p-3"><?= $row['product_code'];?></td>
                        <?php

                        //   $input = $row['created_at'];

                        //   $date= strtotime($input. '+ 750 minute');     // Converting Default timezone to USA to india i.e, 12hrs 30 min.

                        //   $order_date = date('d/M/Y h:i:s', $date);

                        ?>
                        <td class="align-middle p-3"><?= $row['product_name'];?></td>

                        <td class="align-middle p-3 text-start">₹ <?= $row['final_selling_price']?></td>


                        <td class="align-middle p-3"><?= $row['created_at'];?></td>
                        
                        <td class="align-middle text-center fw-bold p-3">
                            <?php
                                
                                 // $left_qty = $row['available_quantity'] - $row['alert_quantity'];

                                $available_quantity = $row['available_quantity'];

                                $alert_quantity = $row['alert_quantity'];

                            
                                // if($left_qty < 0)
                                // {
                                   
                                //     ?> 
                                <!-- <h6 class="card-title text-danger fw-bold"> <?php echo 0;?> Ps  <i class="bi bi-exclamation-triangle-fill"></i></h6>   -->
                                      <?php
                                // }
                                // else
                                // {
                                //     $row['available_quantity'] - $row['alert_quantity'];
                                //     if($row['available_quantity'] - $row['alert_quantity'] <= 0)
                                //     {
                                    
                                //         ?> 
                                         <!-- <h6 class="card-title text-danger fw-bold"> <?php echo 0; ?> Ps  <i class="bi bi-exclamation-triangle-fill"></i></h6>  -->
                                          <?php
                                //     }
                                    
                                //     else
                                //     {
                                        
                                //         ?> 
                                        <!-- <h6 class="card-title text-success fw-bold"> <?php echo $left_qty; ?> Ps </h6>  -->
                                       <?php
                                //     }
                                // }

                                if($available_quantity <= $alert_quantity)
                                {
                                    ?> 
                                      <h6 class="card-title text-danger fw-bold"> <?php echo $available_quantity." ".$row['unit'].".";?> <i class="bi bi-exclamation-triangle-fill"></i></h6>  
                                    <?php
                                }
                                else
                                {
                                    ?> 
                                      <h6 class="card-title text-success fw-bold"> <?php echo $available_quantity." ".$row['unit']."."; ?> </h6> 
                                  <?php
                                }
                                
                            ?>
                        </td>

                    
                        <!--<td class="align-middle text-start p-3"><?= $row['alert_quantity']." ".$row['unit']?>. </td>-->

                        <!--<td class="align-middle text-start fw-bold p-3"><?= $row['available_quantity']." ".$row['unit']?>. </td>-->

                      <?php 
                        //   $order_id = $row['order_id'];
                        //   $num_get_all_products = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `inventory` WHERE `order_id` = '$order_id' "));

                        //   $sum_query = "SELECT SUM(final_selling_price) as 'sum' FROM `inventory` WHERE `order_id` = '$order_id'  ";
                          
                        //   $result_sum_query = mysqli_query($db, $sum_query);

                        //   $data = mysqli_fetch_array($result_sum_query);

                        //   $sum = $data['sum'];
                      
                      ?>  

                
                    <td class="align-middle p-3 text-center">
                      <a class="btn btn-view" href="./index.php?product_qty_update_id=<?=$product_qty_update_id ;?>"> Update </a>
                    </td>
 
                    </tr>
              <?php
                  $count++;
                  }
              ?>  

              </tbody>
            </table>
            <!-- End Table with stripped rows -->


<!--Below table is d-none using for Export only -->
            <!-- Table with stripped rows -->
            <table class="table d-none table-striped" id="inventory_export" style="width: 100%">

                      
                <!-- ********************************************************** -->
                <!-- Filter -->
                <!-- ********************************************************** -->

                <div class="filter text-end ">
                        <a class="icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots fw-bold"></i>
                            <!-- <button class="btn btn-light text-dark shadow-sm">Filter</button> -->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                            
                        </li>

                        <form method="post">
                            <li><input class="dropdown-item" type="submit" name="lastly_updated" value="By Lastly Updated"> </li>
                            <li><input class="dropdown-item" type="submit" name="reaching_alert" value="By Reaching Alert Qty"> </li>
                            <!-- <li><input class="dropdown-item" type="submit" name="this_year" value="This Year"> </li> -->
                        </form>
                        </ul>
                    </div>

                <!-- ********************************************************** -->
                <!-- Filter ends here -->
                <!-- ********************************************************** -->


              <thead>
                <tr>
                  <th scope="col">#</th> 
                  <th scope="col">Preview </th> 
                  <th scope="col">SKU </th> 
                  <th scope="col"> Product Name</th>
                  <th scope="col" class="text-start">Selling Price</th>
                  <th scope="col"> Last Stock Added at </th>
                  <!--<th scope="col" class="text-start">Alert Quantity</th>-->
                  <!--<th scope="col" class="text-start">Available Quantity</th>-->
                  
                  <th scope="col" class="text-start text-danger">Quantity Left</th>
                  
                  <th scope="col" class="text-center">Update</th>
                </tr>
              </thead>

              <tbody>
              <?php
                  $count=1;
                // ***********************************************
                // Filter Content
                // ***********************************************

                    if(isset($_POST['lastly_updated']))
                    {
                        
                        $run_get_all_products = mysqli_query($db,"SELECT * FROM `products` ORDER BY quantity_updated_at DESC");
                        
                      
                    }
                    else
                    {
                        $run_get_all_products = mysqli_query($db,"SELECT * FROM products ORDER BY available_quantity - alert_quantity  ");

                    }

                // ***********************************************
                // Filter Content ends here
                // ***********************************************
            
                  while($row = mysqli_fetch_assoc($run_get_all_products))
                  {

                    $product_qty_update_id = str_replace('#', ' ', ( $row['product_code']));     // Converting " " = space to # 

                    
              ?>
                    <tr>
                        <td class="align-middle p-3" scope="row"><?=$count?></td>

                        <td>
                            <?php

                                $query="SELECT * FROM `images` WHERE `product_code` = '$product_qty_update_id' ";

                                $run=mysqli_query($db,$query);

                                $res = mysqli_fetch_assoc($run); 

                            ?>

                            <img src="uploaded_images/<?= $res['image']?>" id="product-img" class="" style="height:60px; width:60px" alt="<?= $row['product_code'];?>">      <!--  Important....-->       
                        </td> 
 
                        <td class="align-middle p-3"><?= $row['product_code'];?></td>
                        <?php

                        //   $input = $row['created_at'];

                        //   $date= strtotime($input. '+ 750 minute');     // Converting Default timezone to USA to india i.e, 12hrs 30 min.

                        //   $order_date = date('d/M/Y h:i:s', $date);

                        ?>
                        <td class="align-middle p-3"><?= $row['product_name'];?></td>

                        <td class="align-middle p-3 text-start">₹ <?= $row['final_selling_price']?></td>


                        <td class="align-middle p-3"><?= $row['created_at'];?></td>
                        
                        <td class="align-middle text-center fw-bold p-3">
                            <?php
                                
                                 // $left_qty = $row['available_quantity'] - $row['alert_quantity'];

                                $available_quantity = $row['available_quantity'];

                                $alert_quantity = $row['alert_quantity'];

                            
                                // if($left_qty < 0)
                                // {
                                   
                                //     ?> 
                                <!-- <h6 class="card-title text-danger fw-bold"> <?php echo 0;?> Ps  <i class="bi bi-exclamation-triangle-fill"></i></h6>   -->
                                      <?php
                                // }
                                // else
                                // {
                                //     $row['available_quantity'] - $row['alert_quantity'];
                                //     if($row['available_quantity'] - $row['alert_quantity'] <= 0)
                                //     {
                                    
                                //         ?> 
                                         <!-- <h6 class="card-title text-danger fw-bold"> <?php echo 0; ?> Ps  <i class="bi bi-exclamation-triangle-fill"></i></h6>  -->
                                          <?php
                                //     }
                                    
                                //     else
                                //     {
                                        
                                //         ?> 
                                        <!-- <h6 class="card-title text-success fw-bold"> <?php echo $left_qty; ?> Ps </h6>  -->
                                       <?php
                                //     }
                                // }

                                if($available_quantity <= $alert_quantity)
                                {
                                    ?> 
                                      <h6 class="card-title text-danger fw-bold"> <?php echo $available_quantity." ".$row['unit'].".";?> <i class="bi bi-exclamation-triangle-fill"></i></h6>  
                                    <?php
                                }
                                else
                                {
                                    ?> 
                                      <h6 class="card-title text-success fw-bold"> <?php echo $available_quantity." ".$row['unit']."."; ?> </h6> 
                                  <?php
                                }
                                
                            ?>
                        </td>

                    
                        <!--<td class="align-middle text-start p-3"><?= $row['alert_quantity']." ".$row['unit']?>. </td>-->

                        <!--<td class="align-middle text-start fw-bold p-3"><?= $row['available_quantity']." ".$row['unit']?>. </td>-->

                      <?php 
                        //   $order_id = $row['order_id'];
                        //   $num_get_all_products = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `inventory` WHERE `order_id` = '$order_id' "));

                        //   $sum_query = "SELECT SUM(final_selling_price) as 'sum' FROM `inventory` WHERE `order_id` = '$order_id'  ";
                          
                        //   $result_sum_query = mysqli_query($db, $sum_query);

                        //   $data = mysqli_fetch_array($result_sum_query);

                        //   $sum = $data['sum'];
                      
                      ?>  

                
                    <td class="align-middle p-3 text-center">
                      <a class="btn btn-view" href="./index.php?product_qty_update_id=< ?=$product_qty_update_id ;?>"> Update </a>
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

// *********************************************
//Confirm form resubmission restrict 
// ********************************************
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
// *********************************************
//Confirm form resubmission restrict 
// ********************************************




// <!-- Export table to Excell or CSV -->

 
    function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('inventory_export');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('Inventory.' + (type || 'xlsx')));
    }


// Onclick show filter_section
function Show_filter_section()
{
  // document.getElementById("filter_section").style.display = "block";
  var x = document.getElementById("filter_section");
  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }

}

</script> 

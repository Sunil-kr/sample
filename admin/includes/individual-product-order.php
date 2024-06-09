<?php
  include("db.php");

  $individual_product_order_id = $_GET['individual_product_order_id'];

  $run = mysqli_query($db,"SELECT * FROM `orders` WHERE `order_id` = '$individual_product_order_id' ORDER BY id DESC");

  $row_0 = mysqli_fetch_assoc($run);
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
th {
  font-size: 15px;
}

td{
  font-size: 15px;
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
          var table = $("#orders");
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
    <h3>Orders</h3>
    <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Orders</li>
        </ol>
    </nav>

  </div><!-- End Page Title -->
  
  <section class="section">
    <div class="row">

    <p><button id="btn-export" class="btn btn-success">Export</button></p>


      <div class="col-md-12">
        <div class="card" style="overflow-x:scroll;">
          <div class="card-body pt-3">

            <h3 class="card-title text-center bg-light fw-light text-dark mt-0 p-4 mt-3 ">Inside &nbsp &nbsp Order ID : <?php echo $individual_product_order_id; ?>  &nbsp &nbsp |  &nbsp &nbsp  Payment ID : <?php echo $row_0['payment_id']; ?> </h3>

            <!-- Table with stripped rows -->
            <table class="table  table-striped" id="orders" style="width: 100%">
              <thead>
                <tr>
                  <th scope="col">#</th> 
                  <th scope="col"><i class="bi bi-pin-fill text-success "></i> Product Order ID </th> 
                  <th scope="col"> Order Date</th>
                  <th scope="col">Shipment ID</th>
                  <th scope="col">Shipment Order ID</th>

                  <th scope="col">Preview</th>
                  <th scope="col">SKU</th>
                  <th scope="col">Product</th>
                  <th scope="col" class="text-center">Quantity</th>
                  <th scope="col" class="text-center">Total Price</th>
                  <th scope="col" class="text-center">Status</th>
                  
                  <th scope="col" class="text-center">Action</th>
                </tr>
              </thead>

              <tbody>
              <?php
                  $count=1;
                  $run_get_all_products = mysqli_query($db,"SELECT * FROM `orders` WHERE `order_id` = '$individual_product_order_id' ORDER BY id DESC");

                  while($row = mysqli_fetch_assoc($run_get_all_products))
                  {
                    $product_order_id = $row['product_order_id'];

              ?>
                    <tr>
                    <td class="align-middle p-3" scope="row"><?=$count?></td>
                    <td class="align-middle p-3"><?= $row['product_order_id']?></td>
                    <?php

                      $input = $row['created_at'];

                      $date= strtotime($input. '+ 750 minute');     // Converting Default timezone to USA to india i.e, 12hrs 30 min.

                      $order_date = date('d/M/Y h:i:s', $date);

                      ?>

                      <td class="align-middle p-3"><?= $order_date;?></td>

                  
                    <td class="align-middle p-3"><?= $row['shipment_id']?></td>

                    <td class="align-middle p-3"><?= $row['ship_order_id']?></td>

                  
                    <td class="align-middle p-3">
                            <?php

                                $product_code =  $row['product_code'];
                                
                                $query="SELECT * FROM `images` WHERE `product_code` = '$product_code' ";

                                $run=mysqli_query($db,$query);

                                $res = mysqli_fetch_assoc($run); 

                            ?>

                            <img src="uploaded_images/<?= $res['image']?>" id="product-img" class="" style="height:60px; width:60px" alt="<?= $row['product_code'];?>">      <!--  Important....-->       
                    </td> 

                    <td class="align-middle p-3"><?= $row['product_code']?></td>
                    
                    <td class="align-middle p-3"><?= $row['product_name']?></td>


                      <?php 
                          $order_id = $row['order_id'];
                          $num_get_all_products = mysqli_num_rows(mysqli_query($db,"SELECT * FROM `orders` WHERE `order_id` = '$order_id' "));

                          $sum_query = "SELECT SUM(final_selling_price) as 'sum' FROM `orders` WHERE `order_id` = '$order_id'  ";
                          
                          $result_sum_query = mysqli_query($db, $sum_query);

                          $data = mysqli_fetch_array($result_sum_query);

                          $sum = $data['sum'];
                      
                      ?>  

                    <td class="align-middle p-3 text-center">X <?= $row['quantity']; ?></td>
                    <td class="align-middle p-3 text-center">₹ <?= $row['final_selling_price'];?></td>

                    <td class="align-middle p-3 text-center"> <?= $row['status'];?></td>
                
                    <td class="align-middle p-3 text-center">
                      <a class="btn btn-sm btn-success mb-1" href="./index.php?order_edit_status_id=<?=$product_order_id ;?>"> Update </a>
                      <a class="btn btn-sm btn-view" href="./index.php?order_id_invoice=<?=$product_order_id ;?>"> Invoice </a>
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


<!-- TO auto close the left side bar -->
<script>
    window.onload=function(){
      document.getElementById("linkid").click();
    };
</script> 
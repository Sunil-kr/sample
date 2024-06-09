
<?php
    // =================================================
    // Get Difference in Date and Time in minutes
    // ================================================

    // date_default_timezone_set('Asia/Kolkata');

    date_default_timezone_set('America/Los_Angeles');

    $current_date_time = date('Y-m-d H:i:s');

    $date_time_one_mon_ago = date("d-m-Y H:i:s", strtotime("-1 months")); 



            
?>

<style>
  table tr{
       /* text-align: center: */
  }
  table td{

  }
  table tr:hover{
    background: #ddd;
  }
  .post-item:hover{ 
    background: #ddd;
  }
</style>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Reports</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Reports</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">



            <!-- Orders Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <form method="post">
                      <li><input class="dropdown-item" type="submit" name="today_order" value="Today"> </li>
                      <li><input class="dropdown-item" type="submit" name="this_month" value="This Month"> </li>
                      <li><input class="dropdown-item" type="submit" name="this_year" value="This Year"> </li>
                    </form>
                  </ul>
                </div>

                <?php
                if(isset($_POST['this_month']))
                {
                  // 

                   date_default_timezone_set('America/Los_Angeles');

                //   date_default_timezone_set('Asia/kolkata');
                    
                  $current_time =   date('Y-m');                  

                  $query="SELECT * FROM `orders` WHERE DATE_FORMAT(`created_at`, '%Y-%m') = '$current_time' ";

                  $run=mysqli_query($db,$query);
                              
                  $num = mysqli_num_rows($run);
                  

                ?>
                <div class="card-body">
                  <h5 class="card-title">Orders <span>| This Month</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon bg-success rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart text-light"></i>
                    </div>

                    <div class="ps-3">
                      <h6><?php echo $num ?></h6>
                      <span class="text-success small pt-1 fw-bold">order</span> <span class="text-muted small pt-2 ps-1">received</span>

                    </div>
                  </div>
                </div>
                <?php
                }
   
                elseif(isset($_POST['this_year']))
                {
                   date_default_timezone_set('America/Los_Angeles');
                  
                //   date_default_timezone_set('Asia/kolkata');
                    
                  $current_time =   date('Y');                  

                  $query="SELECT * FROM `orders` WHERE DATE_FORMAT(`created_at`, '%Y') = '$current_time' ";

                  $run=mysqli_query($db,$query);
                              
                  $num = mysqli_num_rows($run);
                  
                ?>
                <div class="card-body">
                  <h5 class="card-title">Orders <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon bg-success rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart text-light"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $num ?></h6>
                      <span class="text-success small pt-1 fw-bold">order</span> <span class="text-muted small pt-2 ps-1">received</span>

                    </div>
                  </div>
                </div>
                <?php
                }
   

                else
                {
                   date_default_timezone_set('America/Los_Angeles');

                //   date_default_timezone_set('Asia/kolkata');
  
                  $current_time =   date('Y-m-d');                  

                  $query="SELECT * FROM `orders` WHERE date(`created_at`) = '$current_time' ";

                  $run=mysqli_query($db,$query);
                              
                  $num = mysqli_num_rows($run);

                ?>
                <div class="card-body">
                  <h5 class="card-title">Orders <span>| Today</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon bg-success rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart text-light"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $num ?></h6>
                      <span class="text-success small pt-1 fw-bold">order</span> <span class="text-muted small pt-2 ps-1">received</span>

                    </div>
                  </div>
                </div>
                <?php
                }
                ?>


              </div>
            </div><!-- End Orders Card -->






            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <form method="post">
                    <li><input class="dropdown-item" type="submit" name="today_revenue" value="Today "> </li>
                    <li><input class="dropdown-item" type="submit" name="this_month_revenue" value="This Month "> </li>
                    <li><input class="dropdown-item" type="submit" name="this_year_revenue" value="This Year "> </li>
                  </form>
                </ul>
              </div>

              <?php
              if(isset($_POST['this_month_revenue']))
              {
                // 

                date_default_timezone_set('America/Los_Angeles');

                // date_default_timezone_set('Asia/kolkata');
                  
                $current_time =   date('Y-m');                  

                // $query="SELECT * FROM `orders` WHERE DATE_FORMAT(`created_at`, '%Y-%m') = '$current_time' ";
                $query = "SELECT SUM(final_selling_price) as 'sum' FROM `orders` WHERE DATE_FORMAT(`created_at`, '%Y-%m') = '$current_time'  ";

                $result = mysqli_query($db, $query);

                $data = mysqli_fetch_array($result);

                $sum = $data['sum'];
                

              ?>
              <div class="card-body"  onclick="location.href = 'index.php?orders'" style="cursor: pointer;">
              <h5 class="card-title">Revenue <span>| This Month</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon bg-info rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency- text-light">₹</i>
                    <!-- <i class="bi bi-currency-rupee"></i> -->
                    <!-- <i class="fa fa-inr" aria-hidden="true"></i> -->

                    
                  </div>

                  <div class="ps-3">
                    <h6>₹ <?php echo $sum ?></h6>
                    <span class="text-info small pt-1 fw-bold">Revenue</span> <span class="text-muted small pt-2 ps-1">this year</span>

                  </div>
                </div>
              </div>
              <?php
              }

              elseif(isset($_POST['this_year_revenue']))
              {
                date_default_timezone_set('America/Los_Angeles');
                
                // date_default_timezone_set('Asia/kolkata');
                  
                $current_time =   date('Y');                  

                $query="SELECT SUM(final_selling_price) as 'sum' FROM `orders` WHERE DATE_FORMAT(`created_at`, '%Y') = '$current_time' ";

                $result = mysqli_query($db, $query);

                $data = mysqli_fetch_array($result);

                $sum = $data['sum'];
                
              ?>
              <div class="card-body"  onclick="location.href = 'index.php?orders'" style="cursor: pointer;">
                <h5 class="card-title">Revenue <span>| This Year</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon bg-info rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-inr text-light">₹ </i>
                  </div>
                  <div class="ps-3">
                    <h6>₹  <?php echo $sum ?></h6>
                    <span class="text-info small pt-1 fw-bold">Revenue</span> <span class="text-muted small pt-2 ps-1">this year</span>

                  </div>
                </div>
              </div>
              <?php
              }


              else
              {
                date_default_timezone_set('America/Los_Angeles');

                // date_default_timezone_set('Asia/kolkata');

                $current_time =   date('Y-m-d');                  

                $query="SELECT SUM(final_selling_price) as 'sum' FROM `orders`  WHERE date(`created_at`) = '$current_time' ";

                $result = mysqli_query($db, $query);

                $data = mysqli_fetch_array($result);

                $sum = $data['sum'];

              ?>
              <div class="card-body"  onclick="location.href = 'index.php?orders'" style="cursor: pointer;">
                <h5 class="card-title">Revenue <span>| Today</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon bg-info rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-currency-inr text-light"> ₹ </i>
                  </div>
                  <div class="ps-3">
                    <h6>₹  <?php if($sum == 0) echo 0; else $sum;  ?></h6>
                    <span class="text-info small pt-1 fw-bold">Revenue</span> <span class="text-muted small pt-2 ps-1">this year</span>

                  </div>
                </div>
              </div>
              <?php
              }
              ?>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Registered Users Card -->
            <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <?php $total_users = mysqli_num_rows(mysqli_query($db, "SELECT * FROM `users`")) ?>

                  <form method="post">
                    <li><input class="dropdown-item" type="submit" name="total" value="Total"> </li>
                    <li><input class="dropdown-item" type="submit" name="mobile_number" value="Mobile Number"> </li>
                    <li><input class="dropdown-item" type="submit" name="facebook" value="Facebook"> </li>
                    <li><input class="dropdown-item" type="submit" name="google" value="Google"> </li>
                  </form>
                </ul>
              </div>

              <?php
              if(isset($_POST['google']))
              {
                // 

                $query="SELECT * FROM `users` WHERE `registered_with` = 'google' ";

                $run=mysqli_query($db,$query);
                            
                $num = mysqli_num_rows($run);
                

              ?>
              <div class="card-body"  onclick="location.href = 'index.php?view-user'" style="cursor: pointer;">
                <h5 class="card-title">Registered <span>| with Google</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>

                  <div class="ps-3">
                    <h6><?php echo $num ?>  / <?php echo $total_users ?></h6>
                    <span class="text-danger small pt-1 fw-bold">User</span> <span class="text-muted small pt-2 ps-1">Registered</span>

                  </div>
                </div>
              </div>
              <?php
              }

              elseif(isset($_POST['facebook']))
              {
                
                $query="SELECT * FROM `users` WHERE `registered_with` = 'facebook' ";

                $run=mysqli_query($db,$query);
                            
                $num = mysqli_num_rows($run);
                
              ?>
              <div class="card-body"  onclick="location.href = 'index.php?view-user'" style="cursor: pointer;">
                <h5 class="card-title">Registered <span>| with Facebook</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo $num ?>   / <?php echo $total_users ?></h6>
                    <span class="text-danger small pt-1 fw-bold">User</span> <span class="text-muted small pt-2 ps-1">Registered</span>

                  </div>
                </div>
              </div>
              <?php
              }


              elseif(isset($_POST['mobile_number']))
              {
                
                $query="SELECT * FROM `users` WHERE `registered_with` = 'mobile number' ";

                $run=mysqli_query($db,$query);
                            
                $num = mysqli_num_rows($run);
                
              ?>
               <div class="card-body"  onclick="location.href = 'index.php?view-user'" style="cursor: pointer;">
                <h5 class="card-title">Registered <span>| with Mobile Number</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo $num; ?>   / <?php echo $total_users ?></h6>
                    <span class="text-danger small pt-1 fw-bold">User</span> <span class="text-muted small pt-2 ps-1">Registered</span>

                  </div>
                </div>
              </div>
              <?php
              }


              else
              {              

                $query="SELECT * FROM `users` ";

                $run=mysqli_query($db,$query);
                            
                $num = mysqli_num_rows($run);

              ?>
              <div class="card-body"  onclick="location.href = 'index.php?view-user'" style="cursor: pointer;">
                <h5 class="card-title">Total <span>| Users</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6><?php echo $num; ?></h6>
                    <span class="text-danger small pt-1 fw-bold">User</span> <span class="text-muted small pt-2 ps-1">Registered</span>

                  </div>
                </div>
              </div>
              <?php
              }
              ?>


              </div>
            </div><!-- End Registered Users  Card -->
















            <!-- Bar Graph -->

            <!-- Bar Graph ends here -->














<!-- -------------------------------------------------------------- -->
            <!-- Recent Sales -->
<!-- -------------------------------------------------------------- -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Recently Sold <span>| Products</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">SKU Code</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Dated</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 

                    $recent_sales = " SELECT * FROM `orders` ORDER BY id DESC LIMIT 12" ;

                    $run_recent_sales = mysqli_query($db, $recent_sales);

                    $count=1;

                    while($row_recent_sales = mysqli_fetch_assoc($run_recent_sales))
                    {
                    ?>
                      <tr>
                        <td class="align-middle"><?=$count ?></td>
                      <?php
                          $product_code = $row_recent_sales['product_code'];
                                                  
                          $query_get_image = "SELECT * FROM `images` WHERE `product_code` = '$product_code' ";
                          $run_get_image = mysqli_query($db,$query_get_image);
                          $res_get_image = mysqli_fetch_assoc($run_get_image);
                          ?>

                          <th scope="row"><a href="#"><img src="uploaded_images/<?= $res_get_image['image']?>" class="rounded" style="width:60px; height: 60px;" alt=""></a></th>

                        <td class="w-50 text-truncate align-middle" style="max-width: 120px;"><?= $row_recent_sales['product_name'] ?></td>
                        <td class="align-middle"><a href="#" class="text-dark"><?= $row_recent_sales['product_code'] ?></a></td>
                        <td class="fw-bold align-middle">0<?= $row_recent_sales['quantity'] ?></td>


                        <?php
                          // For Live Server

                          $input = $row_recent_sales['created_at'];

                          $date= strtotime($input. '+ 750 minute');     // Converting Default timezone to USA to india i.e, 12hrs 30 min.

                          $order_date = date('d/M/Y h:i:s', $date);

                          //For LOcal Server
  
                          // $input = $row_recent_sales['created_at'];
                          // $date = strtotime($input);
                          // $order_date =  date('d/M/Y h:i:s', $date);

                          ?> 

                       <td class=" text-dark fw-bold mt-1 align-middle" ><?= $order_date ?></td>
                      </tr>
                      <?php
                        $count++;
                    }
                    ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->






<!-- ------------------------------------------------------------------ -->
            <!-- Top Selling -->
<!-- ------------------------------------------------------------------ -->
            <div class="col-12">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" dat    a-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Products</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">SKU Code</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Price</th>
                      </tr>
                    </thead>
                    <tbody> 
                    <?php
                    
                        $current_date_time = 
                        $query = " SELECT * FROM `orders`  GROUP BY `product_code`  HAVING COUNT(`product_code`) > 1 ORDER BY id DESC LIMIT 10" ;
                        $run = mysqli_query($db, $query);

                        $count=1;
                        
                        while($row = mysqli_fetch_assoc($run))
                        {
                    ?>
                      <tr>
                      <td><?=$count ?></td>
                      <?php
                        $product_code = $row['product_code'];
                        
                        $query_get_image = "SELECT * FROM `images` WHERE `product_code` = '$product_code' ";
                        $run_get_image = mysqli_query($db,$query_get_image);
                        $res_get_image = mysqli_fetch_assoc($run_get_image);
                        ?>

                        <th scope="row"><a href="#"><img src="uploaded_images/<?= $res_get_image['image']?>" alt=""></a></th>
                        <td class="w-50 text-truncate" style="max-width: 120px;"><?= $row['product_name'] ?></td>
                        <td><?= $row['product_code'] ?></td>

                        <?php
                        $product_code = $row['product_code'];
                        
                        $query_count = "SELECT * FROM `orders` WHERE `product_code` = '$product_code'   ";
                        $run_count = mysqli_query($db, $query_count);
                        $num_count = mysqli_num_rows($run_count);
                        ?>

                        <td class="fw-bold"> 0<?= $num_count ?></td>
                        <td>₹ <?= $row['final_selling_price'] ?></td>
                      </tr>
                      <?php
                        $count++;
                        }
                      ?>
                     
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling -->

          </div>
        </div><!-- End Left side columns -->









        <!-- Right side columns -->
        <div class="col-lg-4">


         
          <!-- Website Traffic -->
          <!-- <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Website Traffic <span>| Today</span></h5>

              <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  echarts.init(document.querySelector("#trafficChart")).setOption({
                    tooltip: {
                      trigger: 'item'
                    },
                    legend: {
                      top: '5%',
                      left: 'center'
                    },
                    series: [{
                      name: 'Access From',
                      type: 'pie',
                      radius: ['40%', '70%'],
                      avoidLabelOverlap: false,
                      label: {
                        show: false,
                        position: 'center'
                      },
                      emphasis: {
                        label: {
                          show: true,
                          fontSize: '18',
                          fontWeight: 'bold'
                        }
                      },
                      labelLine: {
                        show: false
                      },
                      data: [{
                          value: 1048,
                          name: 'Search Engine'
                        },
                        {
                          value: 735,
                          name: 'Direct'
                        },
                        {
                          value: 580,
                          name: 'Email'
                        },
                        {
                          value: 484,
                          name: 'Union Ads'
                        },
                        {
                          value: 300,
                          name: 'Video Ads'
                        }
                      ]
                    }]
                  });
                });
              </script>

            </div>
          </div>End Website Traffic --> 



<!-- ------------------------------------------------------------- -->
          <!-- Recently Added | Products -->
<!-- ------------------------------------------------------------- -->

          <div class="card pb-2" style="height:800px; overflow-y: scroll">
            <!-- <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div> -->

            <div class="card-body pb-0">
              <h5 class="card-title">Recently  Added <span>| Products</span></h5>

              <div class="news">

              <?php 

            //   date_default_timezone_set('Asia/Kolkata');

               date_default_timezone_set('America/Los_Angeles');

              $current_time = date('Y-m-d h:i:s');

              $fifteen_days_ago = date('Y-m-d h:i:s', strtotime('-5 days', strtotime($current_time)));    // Last 15 days

              $query_product = " SELECT * FROM `products` WHERE `created_at` <= '$current_time' AND `created_at` >= '$fifteen_days_ago' ORDER BY id DESC " ;
              $run_product = mysqli_query($db, $query_product);
              
              while($row_product = mysqli_fetch_assoc($run_product))
              {
              ?>

                  <?php
                    $product_code = $row_product['product_code'];
                                            
                    $query_get_image = "SELECT * FROM `images` WHERE `product_code` = '$product_code' ";
                    $run_get_image = mysqli_query($db,$query_get_image);
                    $res_get_image = mysqli_fetch_assoc($run_get_image);
                  ?>

                <div class="post-item clearfix p-2 align-items-center">
                  <img src="uploaded_images/<?= $res_get_image['image']?>"  style="height: 60px; width: 60px; border-radius: 5px;" alt="<?=$row_product['product_name'] ?>">
                  <h4 class="text-dark text-truncate"><?php echo $row_product['product_name'] ?></h4>
                  <p><?php echo "SKU ".$row_product['product_code']."| Qty. ".$row_product['available_quantity']."| Price  ₹ ".$row_product['final_selling_price'] ?></p>
                </div>

              <?php
              }
              ?>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- Recently Added | Products ends here -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


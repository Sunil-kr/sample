<?php 
if(!isset($_SESSION['isAdminLoggedIn'])){
      header('Location: ../login.php'); 
      
    }
?>

      <h4 class="w-100 pt-2" id="heading">Other Products</h4><hr>
      
              <div class="row">
              <?php
                $data = getAllProduct($db);
                // $count=1; 
                foreach($data as $row)
                {
                  // echo $row['name'];
                  $Product_unique_code = str_replace('#', ' ', ( $row['product_code']));
                  // echo $Product_unique_code;
                ?>
                
                <!-- <div class="col-md-3 col-sm-3 col-6" onclick="location.href = 'product-details.php?Product_detail_Unique_Code=<?= $Product_unique_code ?>';"> -->
                <div class="col-md-3 col-sm-3 col-6">
                <!-- <div class="col-md-4 col-sm-3 col-6" > -->
                  
                  <div class="single-product shadow-sm p-0">
                    
                    <div class="product-img ">
                    <?php
                        $product_id = $row['id'];
                        // echo $product_id; 

                        $query="SELECT * FROM `images` WHERE `product_id` = $product_id ";

                        $run=mysqli_query($db,$query);

                        $res = mysqli_fetch_assoc($run);

                        // $ssfullname = $row 'ssfullname'];
                        // $ssemail    = $row['ssemail'];
                        // echo $res['image']; 

                    ?>
                      <img class="card-img" onclick="location.href = 'product-details.php?Product_detail_Unique_Code=<?= $Product_unique_code ?>';"
                        src="admin/uploaded_images/<?= $res['image']?>" class="container-fluid " style=""  alt="<?php
                        $alt= str_replace(' ', '-', ( $res['image'])); echo $alt ?>">

                      <div class="p_icon">
                        <a href="product-details.php?Product_detail_Unique_Code=<?= $Product_unique_code ?>" >
                          <i class="ti-eye"></i>
                        </a>

                        <?php
                          $logged_in_user = $_SESSION['username'];

                          if($logged_in_user)
                          {
                        ?>                        
                              <a onclick="add_to_wishlist('<?php echo $Product_unique_code ?>')">
                                <i class="ti-heart"></i>
                              </a>
                              <!-- <a href="admin/includes/function.php?addToCartProduct_Unique_Code=<?= $Product_unique_code ?>" onclick="add_to_cart()"> -->
                              <a onclick="add_to_cart('<?php echo $Product_unique_code ?>')">
                                <i class="ti-shopping-cart"></i>
                              </a>
                        <?php
                          }
                          else
                          {
                        ?>
                              <a href="login.php" >
                                <i class="ti-heart"></i>
                              </a>

                              <a href="login.php" >
                                <i class="ti-shopping-cart"></i>
                              </a>
                        <?php
                          }
                        ?>


                      </div>
                    </div>
                    <div class="product-btm">
                    <?php 

                      $discount = $row['discount'];

                      if($discount == 0)
                      {
                        // ----------------------------------------------
                        // Discount in percentage calculation
                        // ----------------------------------------------

                        $price_before_discount = $row['mrp'];

                        $price_after_discount = $row['product_selling_price'];
        
                        $discount =  $price_before_discount - $price_after_discount ;
        
                        $process = $discount / $price_before_discount;
        
                        $discount_in_percent = round($process * 100);
                        
                    ?>
                      <a href="#" class="d-block">
                        <h4 class="text-truncate"><?= $row['product_name']?></h4>
                      </a>
                      <div class="mt-2">
                        <span class="mr-2">₹ <?= $row['product_selling_price']?></span>
                        <del class="mr-2">₹ <?= $row['mrp']?></del>
                        <sub class="text-danger font-weight-bold"><?php echo $discount_in_percent?>% Off </sub>
                      </div>

                    <?php
                      }
                      else 
                      {
                        
                        $price_before_discount = $row['product_selling_price'];

                        $price_after_discount = $row['final_selling_price'];
        
                        $discount =  $price_before_discount - $price_after_discount ;
        
                        $process = $discount / $price_before_discount;
        
                        $discount_in_percent = round($process * 100);
                        
                    ?>
                      <a href="#" class="d-block">
                        <h4 class="text-truncate"><?= $row['product_name']?></h4>
                      </a>
                      <div class="mt-2">
                        <span class="mr-2">₹ <?= $row['final_selling_price']?></span>
                        <del class="mr-2">₹ <?= $row['product_selling_price']?></del>
                        <sub class="text-danger font-weight-bold"><?php echo $discount_in_percent?>% Off </sub>
                      </div>
                    <?php
                      }
                    ?>  
                    </div>
                  </div>
                </div>

                <?php
                // $count++;
                } 
            ?>  


          </div>

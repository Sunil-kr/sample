<?php
session_start();
//fetch_data.php
include("db.php");
include("function.php");

// $db = new PDO("mysql:host=localhost;dbname=sajsajawat_com", "root", "");
// $db = new PDO("mysql:host=localhost;dbname=sajsajawat.com", "root", "");


if(isset($_POST["action"]))
{


$run = mysqli_query($db,"SELECT * FROM `products` WHERE `product_category` = '$product_category_id' ");


    if(isset($_POST["product_category_id"]) )   //---IMP from .htaccss product_category_id has been changes to categry slug    >> product_category_id = category_slug >>
	{ 
    	    
    	   // Getting Category ID from slug
    	   
    		$product_category_slug = $_POST["product_category_id"];
    		
    		$get_categ_id = mysqli_query($db,"SELECT * FROM `main_category` WHERE `category_slug` = '$product_category_slug' ");
    		
    		$row_categ_id = mysqli_fetch_assoc($get_categ_id);
    		
    		$product_category_id = $row_categ_id['id'];
    
    	   // Getting Category ID from slug



			$run = mysqli_query($db,"SELECT * FROM `products` WHERE `product_category` = '$product_category_id' ");

			$num = mysqli_num_rows( $run);

			if(!$num > 0)
			{
				// echo "no product!";
					$run1 = mysqli_query($db,"SELECT * FROM `main_category` WHERE `parent_category_id` = '$product_category_id' ORDER BY RAND()");
					
					while($row_subcat = mysqli_fetch_assoc($run1))
					{
						$data= $row_subcat['id'];

						$fetch[] = $data;
					}
				
					$query .= "SELECT * FROM `products` WHERE `status` = '1' AND `product_category` IN(".implode(',',$fetch).")  ";
					
				    // $query .= "SELECT * FROM `products` WHERE `product_category` IN (17, 19)";
		
					if(isset($_POST["minimum_price"], $_POST["maximum_price"]) )
					{
						$query .= "AND product_selling_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' 
						";
					}  

					if(isset($_POST["color"]))
					{
						$color_filter = implode("','", $_POST["color"]);
						$query .= " AND color IN('".$color_filter."') 
						";
					} 

					if(isset($_POST["material"]))
					{
						$material_filter = implode("','", $_POST["material"]);
						$query .= " AND material IN('".$material_filter."') 
						";
					}
				
			}
			
			else
			{

				$query .= "SELECT * FROM `products` WHERE `product_category` = '$product_category_id' AND `status` = '1' ";
				// $query .= "SELECT * FROM `products` WHERE `product_category` IN (17, 19)";

				if(isset($_POST["minimum_price"], $_POST["maximum_price"]) )
				{
					$query .= "AND product_selling_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' 
					";
				}  

				if(isset($_POST["color"]))
				{
					$color_filter = implode("','", $_POST["color"]);
					$query .= " AND color IN('".$color_filter."') 
					";
				} 

				if(isset($_POST["material"]))
				{
					$material_filter = implode("','", $_POST["material"]);
					$query .= " AND material IN('".$material_filter."') 
					";
				}
			}
	}


	else
	{
		// echo "yha tak theek hai";

// 			$query .= "SELECT * FROM `products` WHERE `status` = '1' ";
			$query .= "SELECT * FROM `products` GROUP BY `product_code` HAVING COUNT(*) >=1 AND `status` = '1' ";

			if(isset($_POST["minimum_price"], $_POST["maximum_price"]) )
			{
				$query .= "AND product_selling_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."' 
				";
			}  

			if(isset($_POST["color"]))
			{
				$color_filter = implode("','", $_POST["color"]);
				$query .= " AND color IN('".$color_filter."') 
				";
			}

			if(isset($_POST["material"]))
			{
				$material_filter = implode("','", $_POST["material"]);
				$query .= " AND material IN('".$material_filter."') 
				";
			}
	
    }
	// $output .=$_POST["product_category_id"];
	// if(isset($_POST["minimum_price"], $_POST["maximum_price"]) )
	// {
	// 	$query .= "
    //         SELECT * FROM products WHERE product_selling_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
	// 	";
	// }

  
	// $statement = $db->prepare($query);
	// $statement->execute();
	// $result = $statement->fetchAll();
	// $total_row = $statement->rowCount(); 


	$run = mysqli_query($db,$query);

	$total_row = mysqli_num_rows($run);

	$output = '';
	if($total_row > 0)
	{
		// foreach($result as $row)
		while($row = mysqli_fetch_assoc($run))
		{

			// $output .= '
			// <div class="col-sm-4 col-lg-3 col-md-3">
			// 	<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
				
			// 		<p align="center"><strong><a href="#">'. $row['product_name'] .'</a></strong></p>
			// 		<h4 style="text-align:center;" class="text-danger" >'. $row['product_selling_price'] .'</h4>
			// 		<p>Code : '. $row['product_code'].' <br />
			// 		Hsn Code : '. $row['hsn_code'] .' <br />
			// 		category : '. $row['product_category'] .' <br />
			// 		Weight : '. $row['total_weight'] .'  </p>
			// 	</div>

			// </div>
			// ';


			// $output = $row_img['image'];



			$output .='
				<div class="col-lg-3 col-6">

					<div class="single-product shadow-sm p-0">
					';

						$product_code = $row['product_code'];

						$product_id = $row['id'];
			
						$query_img = "SELECT * FROM `images` WHERE `product_code` = '$product_code' ";
			
						$run_img = mysqli_query($db,$query_img);
			
						$row_img = mysqli_fetch_assoc($run_img);

						$alt= str_replace(' ', '-', ( $row_img['image'])); 

						$Product_unique_code = str_replace('#', ' ', ( $row['product_code']));
						
						$product_slug = $row['slug'];      // Slug ----IMP.
						

						$product_details_url = "product-details.php?Product_detail_Unique_Code="."$Product_unique_code";

						$discount = $row['discount'];


						$output .=' <div class="product-img ">
										<a href="product/'.$product_slug.'">
											<img class="card-img" src="admin/uploaded_images/'.$row_img['image'].'" class="container-fluid"
											alt="'.$alt.'">
										<div class="p_icon">

												<i class="ti-eye"></i>
											
										';
										
												$logged_in_user = $_SESSION['username'];
				  
												if($logged_in_user)
												{
											  
								// 	$output .=' 
								// 					<a onclick="add_to_wishlist() ">
								// 						<i class="ti-heart"></i>
								// 					</a>
								// 					<a onclick="add_to_cart('.$Product_unique_code .') ">
								// 						<i class="ti-shopping-cart"></i>
								// 					</a>
								// 					';
										
												}
												else
												{
									$output .='
													<a href="login.php">
														<i class="ti-heart"></i>
													</a>
							
													<a href="login.php">
														<i class="ti-shopping-cart"></i>
													</a>
													';
												}
										
						$output .='
									  </div>
									</div>
						
						';
										
						$output .='
							<div class="product-btm" >

						';

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

									$output .='	
											
										
													<a href="" class="d-block">
														<h4 class="text-truncate">'.$row['product_name'].'</h4>
													</a>

													<div class="mt-2">
														<span class="mr-2">₹ '.$row['product_selling_price'].'</span>
														<del class="mr-2">₹ '.$row['mrp'].'</del>
														<sub class="text-danger font-weight-bold">'. $discount_in_percent.'% Off </sub>
													</div>
										
											';
								}

								else 
								{
									
									$price_before_discount = $row['product_selling_price'];

									$price_after_discount = $row['final_selling_price'];
					
									$discount =  $price_before_discount - $price_after_discount ;
					
									$process = $discount / $price_before_discount;
					
									$discount_in_percent = round($process * 100);
									
									$output .='	
											
										
													<a href="#" class="d-block">
														<h4 class="text-truncate d-flex justify-content-start">'.$row['product_name'].'</h4>
													</a>

													<div class="mt-2">
														<span class="mr-2">₹ '.$row['product_selling_price'].'</span>
														<del class="mr-2">₹ '.$row['mrp'].'</del>
														<sub class="text-danger font-weight-bold">'. $discount_in_percent.'% Off </sub>
													</div>
										
											';
								}

						$output .='
										</div>
																			
									</div> 
								</div>

						';
                    

                
            
        
			
		}
	}
	else
	{
		$output = '<div class="text-center">
		                <h2>No products available..</h2>
		           </div>';
		        
	}

    // $output = $_POST["minimum_price"].$_POST["maximum_price"];
    // $output = $_POST["product_category_id"];
	echo $output;
}

?>
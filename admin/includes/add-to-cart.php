 

 <?php
 if(!isset($_SESSION['isAdminLoggedIn'])){
      header('Location: ../login.php'); 
      
    }
 // NOT IN USE USING THE SAME BELOW CODE IN FUNCTION PAGE

include("db.php");

    $product_id = $_GET['id'];

    // echo $product_id;

    $query="SELECT * FROM products WHERE id = $product_id";

    $run=mysqli_query($db,$query);

    $row = mysqli_fetch_assoc($run);

    // echo $row['product_name'];

    echo $product_name = mysqli_real_escape_string($db, $row['product_name']);
    echo $product_unique_code = mysqli_real_escape_string($db, $row['product_code']);
    echo $product_category = mysqli_real_escape_string($db, $row['product_category']);
    echo $product_price = mysqli_real_escape_string($db, $row['product_price']);
    echo $product_tax = mysqli_real_escape_string($db, $row['product_tax']);

    echo $discount = mysqli_real_escape_string($db, $row['discount']);
    echo $final_price = mysqli_real_escape_string($db, $row['total_price']);
    echo $available_quantity = mysqli_real_escape_string($db, $row['available_quantity']);
    echo $product_unit = mysqli_real_escape_string($db, $row['unit']);

 
    // echo $product_unique_code;

    

   	$query="INSERT INTO `cart`(`product_name`, `product_code`, `product_category`, `product_price`, `product_tax`, `discount`, `total_price`, 
    `available_quantity`, `unit`) VALUES ('$product_name','$product_unique_code','$product_category','$product_price', '$product_tax', 
    '$discount', '$final_price', '$available_quantity', '$product_unit') ";

        $run=mysqli_query($db,$query);

       
        if($run)
        {
            // header('location:../index.php?all-staff');
            echo"<script>
                        window.history.back();
                </script>";
    
        }

        else
        {
            echo"<script>
                    alert('Processing failed!');
                    window.history.back();
                </script>";
        }
        
	

 ?>
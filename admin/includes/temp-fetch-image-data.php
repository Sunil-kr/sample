<?php
include("db.php");

$query="SELECT * FROM products ";
 
$run = mysqli_query($db,$query);

while($row = mysqli_fetch_assoc($run) )
{
    $slug = str_replace([' ', '(', ')','&'],'-', $row['product_name']);

    $product_code = $row['product_code'];

    echo $product_code."<br>";

    // $update = "UPDATE `products` SET `slug` = ('$slug') WHERE `product_code` = '$product_code' ";

    // // echo $query."<br>"; 

    // $run1 = mysqli_query($db, $update);

    // if($run1)
    // {
    //   // echo "<script>alert('Slug Insterted Successfully') </script>";
    //   echo $slug."<br>"; 
    // }
    
    // else
    // {
    //   // echo "<script>alert('Slug Insterted Successfully')</script>";
    //   echo "not working ! <br>";
    // }
}
?>
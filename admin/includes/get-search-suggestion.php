<?php 

include("db.php");
include("function.php");


$myInput = $_POST['myInput'];


$blog = "SELECT * FROM blogs WHERE `blog_name` LIKE '%".$myInput."%' ";

$run_blog = mysqli_query($db,$blog);  

$num_blog = mysqli_num_rows($run_blog);


if($num_blog > 0) 
{

    // while($row = mysqli_fetch_assoc($run)) 
    // {
    //     // $product_code = $row['product_code'] ;

    //     echo "  <a href='product-details.php?Product_detail_Unique_Code=".$row['product_code']."'> 

    //                 <li class='text-truncate pt-2'> 
                        
    //                         ". $category_name."
                        
    //                 </li> 
    //             </a>  
    //         ";
    //     echo "  <a href='product-details.php?Product_detail_Unique_Code=".$Product_unique_code."'> 
        
    //         <li class='text-truncate pt-2'> 
    //             <img class='card-img' src='admin/uploaded_images/". $res_query['image']."' style='height:40px; width:40px; padding: 5px' >

    //                 ".  $row['product_name']."
                
    //         </li> 
    //     </a>  
    // ";
    // }
    
    
    while($row = mysqli_fetch_assoc($run_blog)) 
    {

          // Get product_ slug
             $slug = $row['slug'];
             $blog_code = $row['blog_code'];


        // echo "  <a href='product/".$product_slug."'> 
        // echo "  <a href='product-details.php?Product_detail_Unique_Code=".$Product_unique_code."'> 
        echo "  <a href='blog-detail.php?blog_code=".$blog_code."'> 
        
                    <li class='text-truncate mt-1' style='background-color:#f6f7f6 '> 
                        <img class='card-img' src='admin/uploaded_images/".$row['blog_cover_image']."' style='height:40px; width:80px; padding: 5px' >

                            ".  $row['blog_name']."
                        
                    </li> 
                </a>  
            ";
    }
    
    
    
    
}
    
else
{
    
    echo " 
            <li class='text-dark p-2' style='background-color:#f6f7f6 '> 
                   No Match Found!
            </li> 
            ";

}   

exit;

    // All echo will combinely returns as response on success


?>
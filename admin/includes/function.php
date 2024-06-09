
<?php 
error_reporting(0);
include("db.php");
include('../../php-mail-verification/index.php');

  /*-------------------------------------------------------------------------- 
        Login  -- Not in use currently, function working as internal
    --------------------------------------------------------------------------*/
    
       

 

 
  
 

  

  /*-------------------------------------------------------------------------- 
        Clint side product Insert into Cart
    --------------------------------------------------------------------------*/
    
    if($_GET['addToCartProduct_Unique_Code'])
    {
        session_start();
        error_reporting(0);

 
        $logged_in_user = $_SESSION['username']; 
        if($logged_in_user)
        {

                
                // echo $logged_in_user;

                // echo $product_unique_code = $_GET['addToCartProduct_Unique_Code'];

                $product_unique_code = str_replace(' ', '#', ( $_GET['addToCartProduct_Unique_Code']));     // Converting " " = space to # 

                // echo $product_unique_code;
            
                $query="SELECT * FROM `products` WHERE `product_code` =  '$product_unique_code' ";
            
                $run=mysqli_query($db,$query);
             
                $row = mysqli_fetch_assoc($run);
            
                
                $product_name = mysqli_real_escape_string($db, $row['product_name']);
                $product_unique_code = mysqli_real_escape_string($db, $row['product_code']);

                $cart_product_owner = mysqli_real_escape_string($db, $logged_in_user );

                $selected_quantity = mysqli_real_escape_string($db, $row['selected_quantity'] );
                
                $product_category = mysqli_real_escape_string($db, $row['product_category']);


                $discount = $row_product_table['discount'];
            
                    if($discount == 0)
                    {

                        $product_price = mysqli_real_escape_string($db, $row['product_selling_price']);
            
                // echo $product_unique_code;

                        $query1="SELECT * FROM `cart` WHERE `product_code` = '$product_unique_code' && `cart_product_owner` = '$cart_product_owner'  ";
                    
                        $check=mysqli_query($db,$query1);

                        $num = mysqli_num_rows($check);

                        if($num > 0)
                        {
                            // echo "This Product is already exist in your Cart";
                            
                            // echo"<script>
                            //             alert('This Product is already exist in your Cart!');
                            //             window.location.href = '../../cart.php';
                            //     </script>";
                            echo "
                                    <div class='container-fluid col-4  alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                        <strong>This Product </strong> is already exist in your Cart!
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                ";
                            
                        }
                    
                        else
                        {
                        $query="INSERT INTO `cart`(`product_name`, `product_code`, `cart_product_owner`, `selected_quantity`, `subtotal`) VALUES 
                        ('$product_name','$product_unique_code','$cart_product_owner','1', '$product_price') ";
                        
                            $run=mysqli_query($db,$query);
                    
                        
                            if($run)
                            {
                                // header('location:../index.php?all-staff');
                                echo "
                                <div class='container-fluid col-4  alert alert-success alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                    <strong>Product </strong> added in your Cart.
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                                ";
                        
                            }
                    
                            else
                            {
                                echo "
                                <div class='container-fluid col-4  alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                    <strong>Processing </strong> Failed!
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>
                            ";
                            }
                        }

                    }

                    else
                    {

                        $product_price = mysqli_real_escape_string($db, $row['final_selling_price']);

                            $query1="SELECT * FROM `cart` WHERE `product_code` = '$product_unique_code' && `cart_product_owner` = '$cart_product_owner'  ";
                        
                            $check=mysqli_query($db,$query1);

                            $num = mysqli_num_rows($check);

                            if($num > 0)
                            {
                                // echo "This Product is already exist in your Cart";
                                
                                // echo"<script>
                                //             alert('This Product is already exist in your Cart!');
                                //             window.location.href = '../../cart.php';
                                //     </script>";
                                echo "
                                        <div class='container-fluid col-4  alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                            <strong>This Product </strong> is already exist in your Cart!
                                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                <span aria-hidden='true'>&times;</span>
                                            </button>
                                        </div>
                                    ";
                                
                            }
                        
                            else
                            {
                            $query="INSERT INTO `cart`(`product_name`, `product_code`, `cart_product_owner`, `selected_quantity`, `subtotal`) VALUES 
                            ('$product_name','$product_unique_code','$cart_product_owner','1', '$product_price') ";
                            
                                $run=mysqli_query($db,$query);
                        
                            
                                if($run)
                                {
                                    // header('location:../index.php?all-staff');
                                    echo "
                                    <div class='container-fluid col-4  alert alert-success alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                        <strong>Product </strong> added in your Cart.
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                    ";
                            
                                }
                        
                                else
                                {
                                    echo "
                                    <div class='container-fluid col-4  alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                        <strong>Processing </strong> Failed!
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                            <span aria-hidden='true'>&times;</span>
                                        </button>
                                    </div>
                                ";
                                }
                            }

                    }

            }

            else
            {
                echo "
                        <div class='container-fluid col-4  alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                            <strong>Please </strong> Login first!
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                    ";
            }
        
            
    }
















  /*-------------------------------------------------------------------------- 
        Clint side product details review form
    --------------------------------------------------------------------------*/
    
    if(isset($_POST['addReview']))
        {
            session_start();

            $logged_in_user = $_SESSION['username'];

            if($logged_in_user)
            {
        
                if(empty($_POST['message']) )
                {
                    echo"<script>
                                alert('Feedback column is empty!');
                                window.history.back();
                        </script>";
                }
                else
                {   
                    $message =  $_POST['message'];
                    $rating =  $_POST['rating'];
                    $product_unique_code = $_POST['product_unique_code'];


                    // Query to limit the user to add one review only on one product
                    $reveiws = "SELECT * FROM `product_review` WHERE `product_unique_code` =  '$product_unique_code' && `email` = '$logged_in_user' ";

                    $review_run = mysqli_query($db,$reveiws);

                    $review_num = mysqli_num_rows($review_run);

                    if($review_num > 0)
                    {
                        echo"<script>
                                alert('You\'ve already added your feedback for this product.');
                                window.history.back();
                            </script>";
                    }

                    else
                    {
                    
                            $select_user = "SELECT * FROM `users` WHERE `email` = '$logged_in_user' ";

                            $select_run = mysqli_query($db, $select_user);

                            if($select_run)
                            {
                                $row = mysqli_fetch_assoc($select_run);
                                
                                $user_name = $row['name']; 

                                // echo $product_unique_code;

                                // $query="INSERT INTO `product_review`(`review`, `rating`, `name`, `email`, `product_unique_code`) VALUES 
                                //         ('$message','$rating ','$user_name','$logged_in_user','$product_unique_code') ";


                                $query="INSERT INTO `product_review`( `review`, `rating`, `name`, `email`, `product_unique_code`) VALUES 
                                ('$message','$rating','$user_name','$logged_in_user','$product_unique_code')";
                            
                                $run = mysqli_query($db,$query);

                                if($run)
                                {
                                    echo"<script>
                                                alert('Thankyou for your Feedback.');
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
                            }
                    }

                
                }
            }
            else
            {
                echo"<script>
                            alert('Please Login with your account first!');
                            window.history.back();
                    </script>";
            }
        
        }



 

 


       



  /*-------------------------------------------------------------------------- 
        Clint side Remove Top Banner
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['removeCmsTopSlider_id']))
    {
 
        $removeCmsTopSlider_id =  $_GET['removeCmsTopSlider_id'];     // Converting " " = space to # 

        // echo $product_unique_code ;
        $get_banner_image_id="SELECT * FROM `cms_top_slider` WHERE `id` = '$removeCmsTopSlider_id' ";
    
        $get_banner_image_run = mysqli_query($db, $get_banner_image_id);

        $get_banner_image_row = mysqli_fetch_assoc($get_banner_image_run);

        unlink('../cms/top-slider/'.$get_banner_image_row['banner']);  // To delete image from server or folder


        $query = "DELETE FROM `cms_top_slider` WHERE `id` = '$removeCmsTopSlider_id' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Banner removed successfully! ');
                    window.location.href = '../index.php?cms';
                </script>";
        }
        else
        { 
            echo"<script>
                alert('Request Processing Failed!');
                window.location.href = '../index.php?cms';
            </script>";
        }

        

    }






  /*-------------------------------------------------------------------------- 
        Clint side Remove Top Default 1st slide banner
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['removeCmsTopDefaultSlider_id']))
    {
 
        $removeCmsTopDefaultSlider_id =  $_GET['removeCmsTopDefaultSlider_id'];     // Converting " " = space to # 

        // echo $product_unique_code ;
        $get_banner_image_id="SELECT * FROM `cms_top_default_slider` WHERE `id` = '$removeCmsTopDefaultSlider_id' ";
    
        $get_banner_image_run = mysqli_query($db, $get_banner_image_id);

        $get_banner_image_row = mysqli_fetch_assoc($get_banner_image_run);

        unlink('../cms/top-slider/'.$get_banner_image_row['banner']);  // To delete image from server or folder

        $query = "DELETE FROM `cms_top_default_slider` WHERE `id` = '$removeCmsTopDefaultSlider_id' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Current Default Banner removed successfully! ');
                    window.location.href = '../index.php?cms';
                </script>";
        }
        else
        { 
            echo"<script>
                alert('Request Processing Failed!');
                window.location.href = '../index.php?cms';
            </script>";
        }

        

    }








  /*-------------------------------------------------------------------------- 
        Clint side Remove product from Feature product
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['remove_Featured_Product_code']))
    {

        $product_unique_code = str_replace(' ', '#', ( $_GET['remove_Featured_Product_code']));     // Converting " " = space to # 

        // echo $product_unique_code ;

        $query="DELETE FROM `cms_featured_products` WHERE `product_code` = '$product_unique_code' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Product removed successfully! ');
                    window.history.back();
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";
        }

        

    }







  /*-------------------------------------------------------------------------- 
        Clint side Remove product from Feature product
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['remove_Best_selling_Product_code']))
    {

        $product_unique_code = str_replace(' ', '#', ( $_GET['remove_Best_selling_Product_code']));     // Converting " " = space to # 

        // echo $product_unique_code ;

        $query="DELETE FROM `cms_best_selling` WHERE `product_code` = '$product_unique_code' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Product removed successfully! ');
                    window.history.back();
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";
        }

        

    }









  /*-------------------------------------------------------------------------- 
       Delete about us cover image
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_about_cover_image']))
    {

        $testim_id =  $_GET['delete_about_cover_image'];     // Converting " " = space to # 

        // echo $product_unique_code ;
        // die();

    
        $sql = mysqli_query($db, "SELECT * FROM `cms_about_us` WHERE `row_type` = 'Cover' ");

        $row = mysqli_fetch_assoc($sql);

        // echo $row['banner'];

        unlink('../cms/uploaded_about_us/'.$row['cover_image']); 


        $query="DELETE FROM `cms_about_us` WHERE `row_type` = 'Cover' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Cover Image deleted successfully. ');
                    window.location.href='../index.php?cms-aboutus';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }









  /*-------------------------------------------------------------------------- 
       Delete Contact us cover image
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_contact_cover_image']))
    {

        $image_id =  $_GET['delete_contact_cover_image'];     // Converting " " = space to # 

        // echo $product_unique_code ;
        // die();

    
        $sql = mysqli_query($db, "SELECT * FROM `cms_contact_us` WHERE `row_type` = 'Cover' ");

        $row = mysqli_fetch_assoc($sql);

        // echo $row['content'];

        // die();

        unlink('../cms/uploaded_contact_us/'.$row['content']); 


        $query="DELETE FROM `cms_contact_us` WHERE `row_type` = 'Cover' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Cover Image deleted successfully. ');
                    window.location.href='../index.php?cms-contactus';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }









  /*-------------------------------------------------------------------------- 
       Delete Career us cover image
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_career_cover_image']))
    {

        $testim_id =  $_GET['delete_career_cover_image'];     // Converting " " = space to # 

        // echo $product_unique_code ;
        // die();

    
        $sql = mysqli_query($db, "SELECT * FROM `cms_career` WHERE `row_type` = 'Cover' ");

        $row = mysqli_fetch_assoc($sql);

        // echo $row['banner'];

        unlink('../cms/uploaded_career/'.$row['cover_image']); 


        $query="DELETE FROM `cms_career` WHERE `row_type` = 'Cover' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Cover Image deleted successfully. ');
                    window.location.href='../index.php?cms-career';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }










  /*-------------------------------------------------------------------------- 
       Delete Testimonials
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_blog_category']))
    {

        $blog_category_code =  $_GET['delete_blog_category'];     // Converting " " = space to # 


        // Restrict deletion if the Category has blogs 
        $sql = mysqli_query($db, "SELECT * FROM `blogs` WHERE `blog_category_code` = '$blog_category_code' ");

        $row = mysqli_num_rows($sql);

        if($row>=1)
        {
            echo"<script>
                    alert('Category can't be deleted! \nThis Category has blogs live, delete them first.');
                    window.location.href='../index.php?manage-category';
                </script>";
        }
        else
        {
        
            $sql1 = mysqli_query($db, "SELECT * FROM `blog_category` WHERE `blog_categ_code` = '$blog_category_code' ");

            $row1 = mysqli_fetch_assoc($sql1);

            $categ_image = $row1['image'];
            // die();

            unlink('../uploaded_category_images/'.$categ_image); 
        

            $query="DELETE FROM `blog_category` WHERE `blog_categ_code` = '$blog_category_code'";
            
            $run = mysqli_query($db, $query);

            if($run)
            {
                echo"<script>
                        alert('Category deleted successfully. ');
                        window.location.href='../index.php?manage-category';
                    </script>";
            }
            else
            {
                echo"<script>
                    alert('Request Processing Failed!');
                    window.history.back();
                </script>";

            }
        }

    }






  /*-------------------------------------------------------------------------- 
       Delete Testimonials
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_testimonials']))
    {

        $testim_id =  $_GET['delete_testimonials'];     // Converting " " = space to # 

        // echo $product_unique_code ;
        // die();

    
        $sql = mysqli_query($db, "SELECT * FROM `cms_testimonials` WHERE `id` = '$testim_id' ");

        $row = mysqli_fetch_assoc($sql);

        // echo $row['banner'];

        unlink('../cms/uploaded_testimonials/'.$row['image']); 


        $query="DELETE FROM `cms_testimonials` WHERE `id` = '$testim_id' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Testimonial deleted successfully. ');
                    window.location.href='../index.php?cms-testimonials';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }









  /*-------------------------------------------------------------------------- 
       Delete Client
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_client']))
    {

        $client_id = str_replace(' ', '#', ( $_GET['delete_client']));     // Converting " " = space to # 

        // echo $product_unique_code ;
        // die();

    
        $sql = mysqli_query($db, "SELECT * FROM `cms_our_client` WHERE `id` = '$client_id' ");

        $row = mysqli_fetch_assoc($sql);

        // echo $row['banner'];

        unlink('../cms/uploaded_clients/'.$row['client_logo']); 


        $query="DELETE FROM `cms_our_client` WHERE `id` = '$client_id' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Client deleted successfully. ');
                    window.location.href='../index.php?cms-our-clients';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }






  /*-------------------------------------------------------------------------- 
       Delete Client
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_logo']))
    {

        $logo_id = $_GET['delete_logo'];     // Converting " " = space to # 

        // echo $product_unique_code ;
        // die();

    
        $sql = mysqli_query($db, "SELECT * FROM `cms_logo` WHERE `id` = '$logo_id' ");

        $row = mysqli_fetch_assoc($sql);

        // echo $row['banner'];

        unlink('../cms/uploaded_logo/'.$row['logo']); 


        $query="DELETE FROM `cms_logo` WHERE `id` = '$logo_id' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Logo deleted successfully.');
                    window.location.href='../index.php?cms-logo';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }







  /*-------------------------------------------------------------------------- 
       Delete Socoial Media icon
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_social_icon']))
    {

        $icon_id = $_GET['delete_social_icon'];     // Converting " " = space to # 

        // die();

        $query="DELETE FROM `cms_social_media_links` WHERE `id` = '$icon_id'  ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Social icon deleted successfully. ');
                    window.location.href='../index.php?cms-logo';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }








  /*-------------------------------------------------------------------------- 
       Delete Carousel Image
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_banner_image']))
    {

        $banner_id =  $_GET['delete_banner_image'];     // Converting " " = space to # 

        // echo $product_unique_code ;
        // die();

    
        $sql = mysqli_query($db, "SELECT * FROM `cms_slider_banner` WHERE `id` = '$banner_id' ");

        $row = mysqli_fetch_assoc($sql);

        // echo $row['banner'];
 
        unlink('../cms/top-carousel/'.$row['banner']); 



        $query="DELETE FROM `cms_slider_banner` WHERE `id` = '$banner_id' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Banner deleted successfully. ');
                    window.location.href='../index.php?cms-carousel';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }





  /*-------------------------------------------------------------------------- 
       Delete Carousel Content
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_banner_content']))
    {

        $banner_id = str_replace(' ', '#', ( $_GET['delete_banner_content']));     // Converting " " = space to # 

        // echo $product_unique_code ;
        // die();


        $query="DELETE FROM `cms_slider_banner` WHERE `id` = '$banner_id' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Banner Content deleted successfully. ');
                    window.location.href='../index.php?cms-carousel';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }






  /*-------------------------------------------------------------------------- 
       Delete Contact us Mobile no.
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_mobile']))
    {

        $content_id = $_GET['delete_mobile'];     // Converting " " = space to # 

        // die();


        $query="DELETE FROM `cms_contact_us` WHERE `id` = '$content_id' AND `row_type` = 'Mobile' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Mobile Number deleted successfully. ');
                    window.location.href='../index.php?cms-contactus';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }






  /*-------------------------------------------------------------------------- 
       Delete Contact us Email
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_email']))
    {

        $content_id = $_GET['delete_email'];     // Converting " " = space to # 

        // die();


        $query="DELETE FROM `cms_contact_us` WHERE `id` = '$content_id' AND `row_type` = 'Email' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Email deleted successfully. ');
                    window.location.href='../index.php?cms-contactus';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }





  /*-------------------------------------------------------------------------- 
       Delete Contact us Address
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_address']))
    {

        $content_id = $_GET['delete_address'];     // Converting " " = space to # 

        // die();


        $query="DELETE FROM `cms_contact_us` WHERE `id` = '$content_id' AND `row_type` = 'Address' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Address deleted successfully. ');
                    window.location.href='../index.php?cms-contactus';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }






  /*-------------------------------------------------------------------------- 
       Delete Carousel Content
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_aboutus_content']))
    {

        $content_id = $_GET['delete_aboutus_content'];     

        // echo $product_unique_code ;
        // die();
        $sql = "SELECT * FROM `cms_about_us` WHERE `id` = '$content_id' ";
        
        $output = mysqli_query($db, $sql);
            
        $res = mysqli_fetch_assoc($output);

        $about_us_content_seq = $res['about_us_content_seq'];

        if($about_us_content_seq === "Primary")
        {
            echo"<script>
                    alert('Priamry Content can\'t be deleted!');
                    window.location.href='../index.php?cms-aboutus';
                </script>";
        }
        else
        {
            $query="DELETE FROM `cms_about_us` WHERE `id` = '$content_id' ";
            
            $run = mysqli_query($db,$query);

            if($run)
            {
                echo"<script>
                        alert('About us Content deleted successfully. ');
                        window.location.href='../index.php?cms-aboutus';
                    </script>";
            }
            else
            {
                echo"<script>
                    alert('Request Processing Failed!');
                    window.history.back();
                </script>";

            }
        }

    }





  /*-------------------------------------------------------------------------- 
       Delete Carousel Content
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_aboutus_table_row']))
    {

        $table_id = $_GET['delete_aboutus_table_row'];     

        // echo $product_unique_code ;
        // die();


        $query="DELETE FROM `cms_about_us` WHERE `id` = '$table_id' ";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('One row deleted from Factsheet successfully. ');
                    window.location.href='../index.php?cms-aboutus';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }





    


  /*-------------------------------------------------------------------------- 
       Delete Carousel Content
    --------------------------------------------------------------------------*/
    
    if(isset($_GET['delete_profile_image']))
    {

        $banner_image =  $_GET['delete_profile_image'];     // Converting " " = space to # 

        // echo $product_unique_code ;
        // die();

        unlink('../cms/uploaded_admin/'.$banner_image);  // To delete image from server or folder


        $query="UPDATE `admin` SET`profile_image`= '' WHERE  `id`='1'";
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo"<script>
                    alert('Profile Image deleted successfully. ');
                    window.location.href='../index.php?setting';
                </script>";
        }
        else
        {
            echo"<script>
                alert('Request Processing Failed!');
                window.history.back();
            </script>";

        }

    }








//-------------------------------------------------------------------
// Add Team Member ...

if(isset($_POST['addTeam_member'])) 
{
 
      $name = mysqli_real_escape_string($db, $_POST['name']);

      $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $name);

      $desg = mysqli_real_escape_string($db, $_POST['desg']);

      $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

        
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);
      $linkedin_link = mysqli_real_escape_string($db, $_POST['linkedin_link']);
      $about = mysqli_real_escape_string($db, $_POST['about']);
      $profile = mysqli_real_escape_string($db, $_POST['profile']);
      $experience = mysqli_real_escape_string($db, $_POST['experience']);
      $qualification = mysqli_real_escape_string($db, $_POST['qualification']);
      $experience = mysqli_real_escape_string($db, $_POST['experience']);


      
// ******************************
// Main Image
// ******************************

        // echo "Working..";
        $filename = $_FILES["upload_main_image"]["name"];
        $tempname = $_FILES["upload_main_image"]["tmp_name"];
        $upload_dir = "../uploaded_team/";
        $filepath = $upload_dir.$filename;
            

        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="INSERT INTO `team`( `sequence`,`member_name`, `slug`, `desg`, `mobile`, `email`, `linkedin`, `linkedin_link`, `about`, `profile`, `experience`, `qualification`, `main_image`) VALUES
                ('99999','$name','$slug','$desg', '$mobile','$email','$linkedin','$linkedin_link','$about','$profile','$experience','$qualification','$file_name')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    // echo"<script>
                    //         alert('Blog Published successfully.');
                    //         window.location.href = '../index.php?manage-blogs';
                    //     </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                        </script>"; 
                        die();
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                        </script>"; 
                        die();
                
            }

        }

        else
        {
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="INSERT INTO `team`( `sequence`,`member_name`, `slug`, `desg`, `mobile`, `email`, `linkedin`, `linkedin_link`, `about`, `profile`, `experience`, `qualification`, `main_image`) VALUES
                ('99999','$name','$slug','$desg', '$mobile','$email','$linkedin','$linkedin_link','$about','$profile','$experience','$qualification','$filename')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    // echo"<script>
                    //         alert('Blog Published successfully.');
                    //         window.location.href = '../index.php?manage-blogs';
                    //     </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                            </script>"; 
                            die(); 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                        </script>"; 
                        die();
                
            }
        }
    

	

// ******************************
// Thumb Image
// ******************************

        // echo "Working..";
        $filename = $_FILES["upload_thumb_image"]["name"];
        $tempname = $_FILES["upload_thumb_image"]["tmp_name"];
        $upload_dir = "../uploaded_team/";
        $filepath = $upload_dir.$filename;
            

        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query1="UPDATE `team` SET `thumb_image`='$file_name' WHERE `slug` = '$slug'";
            
                $run1=mysqli_query($db,$query1);
        
                if($run1)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Team Member added successfully.');
                            window.location.href = '../index.php?manage-blogs';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                            </script>"; 
                            die();
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                        </script>"; 
                        die();
                
            }

        }

        else
        {
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $filepath)) 
             {
 
                 $query1="UPDATE `team` SET `thumb_image`='$filename' WHERE `slug` = '$slug'";
             
                 $run1=mysqli_query($db,$query1);
         
                 if($run1)
                 {
                     // header('location:../index.php?all-staff');
                     echo"<script>
                             alert('Team Member added successfully.');
                             window.location.href = '../index.php?manage-team';
                         </script>";
         
                 }
                 else
                 {
                     echo"<script>
                             alert('Processing failed!');
                             window.history.back();
                        </script>"; 
                        die();
                 }
                 
 
             }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                     </script>"; 
                        die();
                
            }
        }
    

}




//-------------------------------------------------------------------
// Edit Team Member ...

if(isset($_POST['updateTeam_member'])) 
{
 
      $name = mysqli_real_escape_string($db, $_POST['name']);

      $id = mysqli_real_escape_string($db, $_POST['id']);

      $slug = mysqli_real_escape_string($db, $_POST['slug']);

      $desg = mysqli_real_escape_string($db, $_POST['desg']);

      $mobile = mysqli_real_escape_string($db, $_POST['mobile']);

        
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);
      $linkedin_link = mysqli_real_escape_string($db, $_POST['linkedin_link']);
      $about = mysqli_real_escape_string($db, $_POST['about']);
      $profile = mysqli_real_escape_string($db, $_POST['profile']);
      $experience = mysqli_real_escape_string($db, $_POST['experience']);
      $qualification = mysqli_real_escape_string($db, $_POST['qualification']);
// die();


// ******************************
// Main Image
// ******************************

    // echo "Working..";
    $filename = $_FILES["upload_main_image"]["name"];
    $tempname = $_FILES["upload_main_image"]["tmp_name"];
    $upload_dir = "../uploaded_team/";
    $filepath = $upload_dir.$filename;
            

    if(empty($filename))
    {
        $query="UPDATE `team` SET `member_name`='$name',`desg`='$desg',
        `mobile`='$mobile',`email`='$email',`linkedin`='$linkedin',`linkedin_link`='$linkedin_link',
        `about`='$about',`profile`='$profile',`experience`='$experience',`qualification`='$qualification'
        WHERE `id`='$id' ";
        
        // $query="INSERT INTO `team`( `member_name`, `slug`, `desg`, `mobile`, `email`, `linkedin`, `linkedin_link`, `about`, `profile`, `experience`, `qualification`, `main_image`) VALUES
        // ('$name','$slug','$desg', '$mobile','$email','$linkedin','$linkedin_link','$about','$profile','$experience','$qualification','$file_name')";
    
        $run=mysqli_query($db,$query);

        if($run)
        {
            // header('location:../index.php?all-staff');
            // echo"<script>
            //         alert('Blog Published successfully.');
            //         window.location.href = '../index.php?manage-blogs';
            //     </script>";

        }
        else
        {
            echo"<script>
                    alert('Processing failed!');
                    window.history.back();
                </script>"; 
                die();
        }
    }
    else
    {
        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="UPDATE `team` SET `member_name`='$name',`desg`='$desg',
                `mobile`='$mobile',`email`='$email',`linkedin`='$linkedin',`linkedin_link`='$linkedin_link',
                `about`='$about',`profile`='$profile',`experience`='$experience',`qualification`='$qualification',
                `main_image`='$file_name' WHERE `id`='$id' ";
                
                // $query="INSERT INTO `team`( `member_name`, `slug`, `desg`, `mobile`, `email`, `linkedin`, `linkedin_link`, `about`, `profile`, `experience`, `qualification`, `main_image`) VALUES
                // ('$name','$slug','$desg', '$mobile','$email','$linkedin','$linkedin_link','$about','$profile','$experience','$qualification','$file_name')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    // echo"<script>
                    //         alert('Blog Published successfully.');
                    //         window.location.href = '../index.php?manage-blogs';
                    //     </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                        </script>"; 
                        die();
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                        </script>"; 
                        die();
                
            }

        }

        else
        {
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="UPDATE `team` SET `member_name`='$name',`desg`='$desg',
                `mobile`='$mobile',`email`='$email',`linkedin`='$linkedin',`linkedin_link`='$linkedin_link',
                `about`='$about',`profile`='$profile',`experience`='$experience',`qualification`='$qualification',
                `main_image`='$filename' WHERE `id`='$id' ";

                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    // echo"<script>
                    //         alert('Blog Published successfully.');
                    //         window.location.href = '../index.php?manage-blogs';
                    //     </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                            </script>"; 
                            die(); 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                        </script>"; 
                        die();
                
            }
        }

    }
    

	

// ******************************
// Thumb Image
// ******************************


    // echo "Working..";
    $filename_thumb = $_FILES["upload_thumb_image"]["name"];
    $tempname = $_FILES["upload_thumb_image"]["tmp_name"];
    $upload_dir = "../uploaded_team/";
    $filepath = $upload_dir.$filename_thumb;
        

    if(empty($filename_thumb))
    {
 
            // header('location:../index.php?all-staff');
            echo"<script>
                    alert('Team Member updated successfully.');
                    window.location.href = '../index.php?manage-team';
                </script>";

    }
    else
    {

    
        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename_thumb;
            
            $file_name_thumb = time().$filename_thumb;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query1="UPDATE `team` SET `thumb_image`='$file_name_thumb' WHERE `id`='$id' ";
            
                $run1=mysqli_query($db,$query1);
        
                if($run1)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Team Member updated successfully.');
                            window.location.href = '../index.php?manage-team';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                            </script>"; 
                            die();
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                        </script>"; 
                        die();
                
            }

        }

        else
        {
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $filepath)) 
             {
 
                 $query1="UPDATE `team` SET `thumb_image`='$filename_thumb' WHERE `id`='$id' ";
             
                 $run1=mysqli_query($db,$query1);
         
                 if($run1)
                 {
                     // header('location:../index.php?all-staff');
                     echo"<script>
                             alert('Team Member updated successfully.');
                             window.location.href = '../index.php?manage-team';
                         </script>";
         
                 }
                 else
                 {
                     echo"<script>
                             alert('Processing failed!');
                             window.history.back();
                        </script>"; 
                        die();
                 }
                 
 
             }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                     </script>"; 
                        die();
                
            }
        }

    }
    

}





//-------------------------------------------------------------------
// Add Blog ...

if(isset($_POST['addPracticeArea'])) 
{
 
      $title = mysqli_real_escape_string($db, $_POST['title']);

      $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
    
      $content = mysqli_real_escape_string($db, $_POST['content']);


        // echo "Working..";
        $filename = $_FILES["upload_main_image"]["name"];
        $tempname = $_FILES["upload_main_image"]["tmp_name"];
        $upload_dir = "../uploaded_practice_area/";
        $filepath = $upload_dir.$filename;
            

        //   die();
        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="INSERT INTO `practice_area`( `sequence`,`title`, `slug`, `content`, `cover_image`) VALUES ('99999','$title','$slug','$content', '$file_name')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Practice Area Added successfully.');
                            window.location.href = '../index.php?manage_practice_area';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                    </script>";
                
            }

        }
 
        else
        {
             // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="INSERT INTO `practice_area`( `sequence`,`title`, `slug`, `content`, `cover_image`) VALUES ('99999','$title','$slug','$content', '$filename')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Practice Area Added successfully.');
                            window.location.href = '../index.php?manage_practice_area';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                    </script>";
                
            }
        }
    

	

}








//-------------------------------------------------------------------
// Edit Blog...

if(isset($_POST['editPracticeArea'])) 
{
 
    $id = mysqli_real_escape_string($db, $_POST['id']);

    $title = mysqli_real_escape_string($db, $_POST['title']);

    $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $title);
  
    $content = mysqli_real_escape_string($db, $_POST['content']);


      // echo "Working..";
      $filename = $_FILES["upload_main_image"]["name"];
      $tempname = $_FILES["upload_main_image"]["tmp_name"];
      $upload_dir = "../uploaded_practice_area/";
      $filepath = $upload_dir.$filename;
            

    if(!empty($filename))
    {
        //   die();
        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="UPDATE `practice_area` SET `title`='$title',`slug`='$slug',`content`='$content',`cover_image`='$file_name' WHERE `id` = '$id' ";

                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Practice Area Added successfully.');
                            window.location.href = '../index.php?manage_practice_area';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                    </script>";
                
            }

        }

        else
        {
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $filepath)) 
            {

               
                $query="UPDATE `practice_area` SET `title`='$title',`slug`='$slug',`content`='$content',`cover_image`='$filename' WHERE `id` = '$id' ";

                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Practice Area Added successfully.');
                            window.location.href = '../index.php?manage_practice_area';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.history.back();
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.history.back();
                    </script>";
                
            }
        }
    
    }
    else
    {
       
        $query="UPDATE `practice_area` SET `title`='$title',`slug`='$slug',`content`='$content' WHERE `id` = '$id' ";

        $run=mysqli_query($db,$query);

        if($run)
        {
            // header('location:../index.php?all-staff');
            echo"<script>
                    alert('Practice Area updated successfully.');
                    window.location.href = '../index.php?manage_practice_area';
                </script>";

        }
        else
        {
            echo"<script>
                    alert('Processing failed!');
                    window.history.back();
                </script>"; 
        }
                
    }

}










//-------------------------------------------------------------------
// Add Blog ...

if(isset($_POST['addBlog'])) 
{
 
      $blog_name = mysqli_real_escape_string($db, $_POST['blog_name']);

      $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $blog_name);

      $blog_unique_code = mysqli_real_escape_string($db, $_POST['blog_unique_code']);

      $blog_category_code = mysqli_real_escape_string($db, $_POST['blog_category_code']);

        // fetching category name

        $sql = "SELECT * FROM `blog_category` WHERE `blog_categ_code` = '$blog_category_code' ";
        $output = mysqli_query($db, $sql);
        $res = mysqli_fetch_assoc($output);
        
        $blog_category_name = $res['blog_categ'];

    
        $blog_description = mysqli_real_escape_string($db, $_POST['blog_description']);
        $author = mysqli_real_escape_string($db, $_POST['author']);
        $status = mysqli_real_escape_string($db, $_POST['status']);


        // echo "Working..";
        $filename = $_FILES["upload_main_image"]["name"];
        $tempname = $_FILES["upload_main_image"]["tmp_name"];
        $upload_dir = "../uploaded_images/";
        $filepath = $upload_dir.$filename;
            

    //   die();
    // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
             
            $file_name = time().$filename;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="INSERT INTO `blogs`( `blog_name`, `slug`, `author`, `blog_cover_image`, `blog_code`, `blog_category_name`, `blog_category_code`, `blog_description`, `status`) VALUES
                ('$blog_name','$slug','$author','$file_name', '$blog_unique_code','$blog_category_name','$blog_category_code','$blog_description','$status')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Blog Published successfully.');
                            window.location.href = '../index.php?manage-blogs';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.location.href = '../index.php?manage-blogs';
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.location.href = '../index.php?manage-blogs';
                    </script>";
                
            }

        }

        else
        {
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="INSERT INTO `blogs`( `blog_name`, `slug`, `author`, `blog_cover_image`, `blog_code`, `blog_category_name`, `blog_category_code`, `blog_description`, `status`) VALUES
                ('$blog_name','$slug','$author','$file_name', '$blog_unique_code','$blog_category_name','$blog_category_code','$blog_description','$status')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Blog Published successfully.');
                            window.location.href = '../index.php?manage-blogs';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.location.href = '../index.php?add-blog';
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.location.href = '../index.php?manage-blogs';
                    </script>";
                
            }
        }
    

	

}







//-------------------------------------------------------------------
// Edit Blog...

if(isset($_POST['editblog'])) 
{
 
      $blog_name = mysqli_real_escape_string($db, $_POST['blog_name']);

      $slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $blog_name);

      $blog_unique_code = mysqli_real_escape_string($db, $_POST['blog_unique_code']);

      $blog_category_code = mysqli_real_escape_string($db, $_POST['blog_category_code']);

        // fetching category name
        $sql = "SELECT * FROM `blog_category` WHERE `blog_categ_code` = '$blog_category_code' ";
        $output = mysqli_query($db, $sql);
        $res = mysqli_fetch_assoc($output);
        
        $blog_category_name = $res['blog_categ'];

        $blog_description = mysqli_real_escape_string($db, $_POST['blog_description']);
        $status = mysqli_real_escape_string($db, $_POST['status']);


        // echo "Working..";
        $filename = $_FILES["upload_main_image"]["name"];
        $tempname = $_FILES["upload_main_image"]["tmp_name"];
        $upload_dir = "../uploaded_images/";
        $filepath = $upload_dir.$filename;
            

    if(!empty($filename))
    {
        //   die();
        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="UPDATE `blogs` SET `blog_name`='$blog_name',`slug`='$slug',`blog_cover_image`='$file_name',
                `blog_category_name`='$blog_category_name',`blog_category_code`='$blog_category_code',`blog_description`='$blog_description',
                `status`='$status' WHERE `blog_code`='$blog_unique_code' ";

                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Blog Published successfully.');
                            window.location.href = '../index.php?manage-blogs';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.location.href = '../index.php?add-blog';
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.location.href = '../index.php?manage-blogs';
                    </script>";
            }

        }

        else
        {
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $filepath)) 
            {

               
                $query="UPDATE `blogs` SET `blog_name`='$blog_name',`slug`='$slug',`blog_cover_image`='$filename',
                `blog_category_name`='$blog_category_name',`blog_category_code`='$blog_category_code',`blog_description`='$blog_description',
                `status`='$status' WHERE `blog_code`='$blog_unique_code' ";
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Blog updated successfully.');
                            window.location.href = '../index.php?manage-blogs';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.location.href = '../index.php?add-blog';
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.location.href = '../index.php?manage-blogs';
                    </script>";
                
            }
        }
    
    }
    else
    {

           
        $query="UPDATE `blogs` SET `blog_name`='$blog_name',`slug`='$slug', `blog_category_name`='$blog_category_name',
        `blog_category_code`='$blog_category_code',`blog_description`='$blog_description',
        `status`='$status' WHERE `blog_code`='$blog_unique_code' ";
            $run=mysqli_query($db,$query);
    
            if($run)
            {
                // header('location:../index.php?all-staff');
                echo"<script>
                        alert('Blog Updated successfully.');
                        window.location.href = '../index.php?manage-blogs';
                    </script>";
            }
            else
            {
                echo"<script>
                        alert('Processing failed!');
                        window.history.back();
                    </script>"; 
            }
                
    }

}





//-------------------------------------------------------------------
// Remove / Delete Product  ...

if(isset($_GET['remove_blog_unique_code']))     // getting id from edit-product page for updation
{

    $blog_code =  $_GET['remove_blog_unique_code'];

   
    $get_image="SELECT * FROM `blogs` WHERE `blog_code` = '$blog_code' "; 

    $get_image_run = mysqli_query($db, $get_image);

    $get_image_row = mysqli_fetch_assoc($get_image_run);

    // echo $get_image_row['blog_cover_image'];

    // die();

    unlink('../uploaded_images/'.$get_image_row['blog_cover_image']);  // To delete image from server or folder


    $query="DELETE FROM `blogs` WHERE `blog_code`= '$blog_code' ";

    $run = mysqli_query($db,$query);

    if($run)
    {
        echo "
                <script>
                    history.back();
                </script>
            ";
    }
    else
    {
        echo "
                <script>
                    alert'Blog Deletion Failed';
                    history.back();
                </script>
            ";
    }



}



 


//-------------------------------------------------------------------
// Remove / Delete Comment  ...

if(isset($_GET['remove_comment']))     // getting id from edit-product page for updation
{

    $comment_id =  $_GET['remove_comment'];

    $query="DELETE FROM `blog_comments` WHERE `id`= '$comment_id' ";

    $run = mysqli_query($db,$query);

    if($run)
    {
        echo "
                <script>
                    alert('Comment Deleted Successfully!');
                    history.back();
                </script>
            ";
    }
    else
    {
        echo "
                <script>
                    alert('Blog Deletion Failed');
                    history.back();
                </script>
            ";
    }



}



 







//-------------------------------------------------------------------
// edit Category ...

if(isset($_GET['category_update_unique_code']))     // getting id from edit-product page for updation
{

    $product_categ_name = mysqli_real_escape_string($db, $_POST['product_categ_name']);
    $product_categ_code = mysqli_real_escape_string($db, $_POST['product_categ_code']);
    $parent_category_code = mysqli_real_escape_string($db, $_POST['parent_category_code']);
    $categ_description = mysqli_real_escape_string($db, $_POST['categ_description']);
    $status = mysqli_real_escape_string($db, $_POST['status']);


    // Check if creating Top main and assigning "Top Main" as a category name

    if($parent_category_code == 98765)
    {
        $parent_category_name = "Top Main";
    }

    else
    {
        $sql = "SELECT * FROM `product_category` WHERE `product_categ_code` = '$parent_category_code' ";
    
        $output = mysqli_query($db, $sql);
            
        $res = mysqli_fetch_assoc($output);
        
        $parent_category_name = $res['product_categ'];

    }

            
        // echo "Working..";
        $filename = $_FILES["upload_cat_image"]["name"];
        $tempname = $_FILES["upload_cat_image"]["tmp_name"];
        $upload_dir = "../uploaded_category_images/";
        $filepath = $upload_dir.$filename;
            
        
    

        if(!empty($filename))
        {
            // If file with name already exist then append time in
            // front of name of the file to avoid overwriting of file
            if(file_exists($filepath)) 
            {
                $filepath = $upload_dir.time().$filename;
                
                $file_name = time().$filename;
                    
                // Now let's move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $filepath)) 
                {
                    $query = "UPDATE `product_category` SET `product_categ`='$product_categ_name',
                        `description`='$categ_description',`parent_categ_code`='$parent_category_code',`parent_categ_name`='$parent_category_name',`image`='$file_name',`status`='$status' 
                        WHERE `product_categ_code` =  '$product_categ_code' ";

                    $run=mysqli_query($db,$query);
            
                    if($run)
                    {
                        // header('location:../index.php?all-staff');
                        echo"<script>
                                alert('Product Category updated successfully.');
                                window.location.href = '../index.php?manage-category';
                            </script>";
            
                    }
                    else
                    {
                        echo"<script>
                                alert('Processing failed!');
                                window.location.href = '../index.php?add-category';
                            </script>"; 
                    }
                    

                }
                else
                {
                     
                    echo"<script>
                            alert('Image Processing failed!');
                            window.location.href = '../index.php?add-category';
                        </script>"; 
                    
                }

            }

            else
            {
                // Now let's move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $filepath)) 
                {
                    $query = "UPDATE `product_category` SET `product_categ`='$product_categ_name',
                    `description`='$categ_description',`parent_categ_code`='$parent_category_code',`parent_categ_name`='$parent_category_name',`image`='$filename',`status`='$status' 
                    WHERE `product_categ_code` =  '$product_categ_code' ";

                    $run=mysqli_query($db,$query);
            
                    if($run)
                    {
                        // header('location:../index.php?all-staff');
                        echo"<script>
                                alert('Product Category updated successfully.');
                                window.location.href = '../index.php?manage-category';
                            </script>";
            
                    }
                    else
                    {
                        echo"<script>
                                alert('Processing failed!');
                                window.location.href = '../index.php?add-category';
                            </script>"; 
                    }
                    

                }
                else
                {
        
                    echo"<script>
                            alert('Processing failed!');
                            window.location.href = '../index.php?add-category';
                        </script>"; 
                    
                }
            }

        }
        else
        {
            $query = "UPDATE `product_category` SET `product_categ`='$product_categ_name',
            `description`='$categ_description',`parent_categ_code`='$parent_category_code',`parent_categ_name`='$parent_category_name',`status`='$status' 
            WHERE `product_categ_code` =  '$product_categ_code' ";

            $run=mysqli_query($db,$query);
    
            if($run)
            {
                // header('location:../index.php?all-staff');
                echo"<script>
                        alert('Product Category updated successfully.');
                        window.location.href = '../index.php?manage-category';
                    </script>";
    
            }
            else
            {
                echo"<script>
                        alert('Processing failed!');
                        window.location.href = '../index.php?add-category';
                    </script>"; 
            }
        }
    
    

}






//-------------------------------------------------------------------
// Remove / Delete Product image ...

if(isset($_GET['product_image_delete_']))     // getting id from edit-product page for updation
{
    // echo $product_image_code = $_GET['product_image_delete_code'];

    $image = $_GET['product_image_delete_'];


    unlink('../uploaded_category_images/'.$image);  // To delete image from server or folder

    echo "
        <script>
            alert('Image Deleted Successfully');
            history.back(1);
        </script>
    ";

}






//-------------------------------------------------------------------
// Add Category ...

if (isset($_POST['addBlogCateg'])) 
{
 
    $blog_categ_name = mysqli_real_escape_string($db, $_POST['blog_categ_name']);
    $blog_categ_code = mysqli_real_escape_string($db, $_POST['blog_categ_code']);
   



    // Check If the category is already presentin db
    
    $sql1 = mysqli_query($db, "SELECT * FROM `blog_category` WHERE `blog_categ` = '$blog_categ_name' ");
    
    $res1 = mysqli_num_rows($sql1);


    if($res1 == 1)
    {
        echo"<script>
                alert('Category is already created with this Name!');
                window.location.href = '../index.php?add-category';
            </script>";
    }
    else
    {

            
        // echo "Working..";
        $filename = $_FILES["upload_cat_image"]["name"];
        $tempname = $_FILES["upload_cat_image"]["tmp_name"];
        $upload_dir = "../uploaded_category_images/";
        $filepath = $upload_dir.$filename;
            
        
    

        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="INSERT INTO `blog_category`( `blog_categ`, `blog_categ_code`, `image`) VALUES
                ('$blog_categ_name','$blog_categ_code', '$file_name')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Blog Category added successfully.');
                            window.location.href = '../index.php?manage-category';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.location.href = '../index.php?manage-category';
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.location.href = '../index.php?manage-category';
                    </script>";
                
            }

        }

        else
        {
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="INSERT INTO `blog_category`( `blog_categ`, `blog_categ_code`, `image`) VALUES
                ('$blog_categ_name','$blog_categ_code', '$filename')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Blog Category added successfully.');
                            window.location.href = '../index.php?manage-category';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.location.href = '../index.php?manage-category';
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed to Upload Image, Please try again!');
                        window.location.href = '../index.php?manage-category';
                    </script>";
                
            }
        }

    }
    
    



}








//-------------------------------------------------------------------
// Add Testimonials ...

if (isset($_POST['addTestimonials'])) 
{
 
    $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
    $feedback = mysqli_real_escape_string($db, $_POST['feedback']);


    // die();
            
        // echo "Working..";
        $filename = $_FILES["upload_cat_image"]["name"];
        $tempname = $_FILES["upload_cat_image"]["tmp_name"];
        $upload_dir = "../cms/uploaded_testimonials/";
        $filepath = $upload_dir.$filename;
            
        

        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file
        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {

                $query="INSERT INTO `cms_testimonials`(`name`, `feedback`, `image`) VALUES ('$user_name','$feedback','$file_name')";
            
                $run=mysqli_query($db,$query);
        
                if($run)
                {
                    // header('location:../index.php?all-staff');
                    echo"<script>
                            alert('Testimonial added successfully.');
                            window.location.href = '../index.php?cms-testimonials';
                        </script>";
        
                }
                else
                {
                    echo"<script>
                            alert('Processing failed!');
                            window.location.href = '../index.php?cms-testimonials';
                        </script>"; 
                }
                

            }
            else
            {
                echo"<script>
                        alert('Failed! to Upload Image');
                        window.location.href = '../index.php?cms-testimonials';
                    </script>";
                
            }

        }

        else
        {
             // Now let's move the uploaded image into the folder: image
             if (move_uploaded_file($tempname, $filepath)) 
             {
 
                 $query="INSERT INTO `cms_testimonials`(`name`, `feedback`, `image`) VALUES ('$user_name','$feedback','$filename')";
             
                 $run=mysqli_query($db,$query);
         
                 if($run)
                 {
                     // header('location:../index.php?all-staff');
                     echo"<script>
                             alert('Testimonial added successfully.');
                             window.location.href = '../index.php?cms-testimonials';
                         </script>";
         
                 }
                 else
                 {
                     echo"<script>
                             alert('Processing failed!');
                             window.location.href = '../index.php?cms-testimonials';
                         </script>"; 
                 }
                 
 
             }
             else
             {
                 echo"<script>
                         alert('Failed! to Upload Image');
                         window.location.href = '../index.php?cms-testimonials';
                     </script>";
                 
             }

        }
 
    



}










//-------------------------------------------------------------------
// Add Default Banner slider...
//-------------------------------------------------------------------

if (isset($_POST['addDefaultBannerSlider'])) 
{
 
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $url = mysqli_real_escape_string($db, $_POST['url']);
    
    
        // echo $title;
        $query="SELECT * FROM `cms_top_default_slider` ";

        $run=mysqli_query($db,$query);
        
        $num = mysqli_num_rows($run);

        if($num > 0)
        {   
            echo "<script>
                        alert('Please remove the Existing Default Banner first!.');
                        window.history.back();
                </script>";
        }
         
        else
        {
            // echo "Working..";
            $filename = $_FILES["uploadbanner"]["name"];
            $tempname = $_FILES["uploadbanner"]["tmp_name"];
            $folder = "../cms/top-slider/".$filename;
                
    
                // Now let's move the uploaded image into the folder: image
                if (move_uploaded_file($tempname, $folder)) 
                {
                    // echo "uploaded success";

                    $sql = "INSERT INTO `cms_top_default_slider`(`banner`, `banner_title`, `redirect_link`) VALUES ('$filename','$title','$url ')";

                    // Execute query
                    $run =  mysqli_query($db, $sql);

                    if($run)
                    {
                        echo "<script>
                                    alert('Banner Added to your Slider Successfuly .');
                                    window.history.back();
                                    
                            </script>";

                    }
                    

                }
                else
                {
                    $msg = "Failed to upload image";
                    
                }

        }


}







//-------------------------------------------------------------------
// Send_enquiry_mail ---IMP
//-------------------------------------------------------------------

// It has a sepearate page email.php


//-------------------------------------------------------------------
// Send_enquiry_mail
//-------------------------------------------------------------------











//-------------------------------------------------------------------
// Add Top Banner slider...
//-------------------------------------------------------------------

if (isset($_POST['addBannerSlider'])) 
{
 
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $url = mysqli_real_escape_string($db, $_POST['url']);
    
    
        // echo $title;

    
            
        // echo "Working..";
        $filename = $_FILES["uploadbanner"]["name"];
        $tempname = $_FILES["uploadbanner"]["tmp_name"];
        $folder = "../cms/top-slider/".$filename;
            
 
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder)) 
            {
                // echo "uploaded success";

                $sql = "INSERT INTO `cms_top_slider`(`banner`, `banner_title`, `redirect_link`) VALUES ('$filename','$title','$url ')";

                // Execute query
                $run =  mysqli_query($db, $sql);

                if($run)
                {
                    echo "<script>
                                alert('Banner Added to your Slider Successfuly .');
                                window.history.back();
                                
                        </script>";

                }
                

            }
            else
            {
                $msg = "Failed to upload image";
                
            }


}









//-------------------------------------------------------------------
// Add Top Banner slider...
//-------------------------------------------------------------------

if (isset($_POST['addCarousel'])) 
{
 

    $title = mysqli_real_escape_string($db, $_POST['title']); 
    $title_main = mysqli_real_escape_string($db, $_POST['title_main']); 
    $url = mysqli_real_escape_string($db, $_POST['url']); 

    // die();

            $query = mysqli_query($db, "SELECT * FROM `cms_slider_banner` ");
        
            $num = mysqli_num_rows($query);

            if($num>= 4)
            {
                echo "<script>
                            alert('Only 4 Banners are allowed.');
                            window.history.back();
                    </script>";
            }
            else
            {
                
    
                // echo "Working..";
                $filename = $_FILES["uploadbanner"]["name"];
                $tempname = $_FILES["uploadbanner"]["tmp_name"];
                $upload_dir = "../cms/top-carousel/";
                $filepath = $upload_dir.$filename;

                // $filename = $_FILES["upload_main_image"]["name"];
                // $tempname = $_FILES["upload_main_image"]["tmp_name"];
                // $upload_dir = "../uploaded_images/";
                // $filepath = $upload_dir.$filename;


                if(file_exists($filepath)) 
                {
                    $filepath = $upload_dir.time().$filename;
                    
                    $file_name = time().$filename;
                        
        
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_slider_banner`(`banner`, `banner_title_small`, `banner_title_main`, `redirect_link`) VALUES ('$file_name','$title','$title_main','$url')";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Banner Added Successfuly.');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
                else
                {
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_slider_banner`(`banner`, `banner_title_small`, `banner_title_main`, `redirect_link`) VALUES ('$filename','$title','$title_main','$url')";


                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Banner Added Successfuly.');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
            
            }
       

        
  

}









//-------------------------------------------------------------------
// Update Carousel content...
//-------------------------------------------------------------------

if (isset($_POST['updateCarousel_content'])) 
{
 
    $title = mysqli_real_escape_string($db, $_POST['edit_title']); 
    $title_main = mysqli_real_escape_string($db, $_POST['edit_title_main']); 
    $banner_id = mysqli_real_escape_string($db, $_POST['banner_id']); 
    $url = mysqli_real_escape_string($db, $_POST['edit_url']); 

    // die();

    // echo "Working..";
    $filename = $_FILES["uploadbanner"]["name"];
    $tempname = $_FILES["uploadbanner"]["tmp_name"];
    $upload_dir = "../cms/uploaded_clients/";
    $filepath = $upload_dir.$filename;

    if(empty($filename))
    {
        $sql= mysqli_query($db, "UPDATE `cms_slider_banner` SET `banner_title_small`='$title',`banner_title_main`='$title_main',`redirect_link`='$url' WHERE `id` = '$banner_id'");
        
        if($sql)
        {
            echo "<script>
                        alert('Banner Updated Successfuly.');
                            window.location.href='../index.php?cms-carousel'; 
                        </script>";
        }
        else
        {
            echo "<script>
                        alert('Processing failed!');
                        window.history.back();
                </script>";
        }
    }
    else
    {

        $query1 = mysqli_query($db, "SELECT * FROM `cms_slider_banner` WHERE `id` = '$banner_id' ");

        $row1 = mysqli_fetch_assoc($query1);

        // echo $row1['banner'];
        // echo $banner_id;

        // die();

        unlink('../cms/top-carousel/'.$row1['banner']);  // To delete image from server or folder

        // echo "Working..";
        $filename = $_FILES["uploadbanner"]["name"];
        $tempname = $_FILES["uploadbanner"]["tmp_name"];
        $upload_dir = "../cms/top-carousel/";
        $filepath = $upload_dir.$filename;


        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                

            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {
                // echo "uploaded success";

                $sql = "UPDATE `cms_slider_banner` SET `banner`='$file_name', `banner_title_small`='$title',`banner_title_main`='$title_main',`redirect_link`='$url' WHERE `id` = '$banner_id'";

                // Execute query
                $run =  mysqli_query($db, $sql);

                if($run)
                {
                    echo "<script>
                                alert('Banner Updated Successfuly.');
                                window.history.back();
                        </script>";

                }
                

            }
            else
            {
                echo "<script>
                                alert('Failed to upload Image!');
                                window.history.back();
                        </script>";
                
            }
        }
        else
        {
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {
                // echo "uploaded success";

                $sql = "UPDATE `cms_slider_banner` SET `banner`='$filename', `banner_title_small`='$title',`banner_title_main`='$title_main',`redirect_link`='$url' WHERE `id` = '$banner_id'";


                // Execute query
                $run =  mysqli_query($db, $sql);

                if($run)
                {
                    echo "<script>
                                alert('Banner Updated Successfuly.');
                                window.history.back();
                        </script>";

                }
                

            }
            else
            {
                echo "<script>
                                alert('Failed to upload Image!');
                                window.history.back();
                        </script>";
                
            }
        }
    
    

    }
        

}








//-------------------------------------------------------------------
// Add Clients...
//-------------------------------------------------------------------

if (isset($_POST['addClient'])) 
{
 

    $client_name = mysqli_real_escape_string($db, $_POST['client_name']); 

    // die();
    // echo $title;


            $query = mysqli_query($db, "SELECT * FROM `cms_our_client` WHERE `client_name` = '$client_name' ");
        
            $num = mysqli_num_rows($query);

            if($num>= 1)
            {
                echo "<script>
                            alert('Client is already exist!');
                            window.history.back();
                    </script>";
            }
            else
            {
                
    
                // echo "Working..";
                $filename = $_FILES["uploadbanner"]["name"];
                $tempname = $_FILES["uploadbanner"]["tmp_name"];
                $upload_dir = "../cms/uploaded_clients/";
                $filepath = $upload_dir.$filename;


                if(file_exists($filepath)) 
                {
                    $filepath = $upload_dir.time().$filename;
                    
                    $file_name = time().$filename;
                        
        
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_our_client` (`client_name`, `client_logo`) VALUES  ('$client_name','$file_name')";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Client Added Successfuly .');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
                else
                {
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_our_client` (`client_name`, `client_logo`) VALUES  ('$client_name','$filename')";


                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Client Added Successfuly .');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
            
            }
        


}












//-------------------------------------------------------------------
// SAve Profile...
//-------------------------------------------------------------------

if (isset($_POST['save_profile'])) 
{
 

    $fullName = mysqli_real_escape_string($db, $_POST['fullName']);
    $comment = mysqli_real_escape_string($db, $_POST['comment']);
    

        // If file with name already exist then append time in
        // front of name of the file to avoid overwriting of file

       $filename = $_FILES["uploadbanner"]["name"];
       $tempname = $_FILES["uploadbanner"]["tmp_name"];
       $upload_dir = "../cms/uploaded_admin/";
       $filepath = $upload_dir.$filename;
   
       if(empty($filename))
       {
           $sql= mysqli_query($db, "UPDATE `admin` SET `name`='$fullName',`comment`='$comment' WHERE `id`='1' ");
           
           if($sql)
           {
               echo "<script>
                           alert('Profile Saved Successfuly.');
                               window.location.href='../index.php?setting';
                           </script>";
           }
           else
           {
               echo "<script>
                           alert('Processing failed!');
                           window.history.back();
                   </script>";
           }
       }
       else
       {
   
           $query1 = mysqli_query($db, "SELECT * FROM `admin` WHERE `id` = '1' ");
   
           $row1 = mysqli_fetch_assoc($query1);
   
           // echo $row1['banner'];
           // echo $banner_id;
   
           // die();
   
           unlink('../cms/uploaded_admin/'.$row1['profile_image']);  // To delete image from server or folder
   
           // echo "Working..";
           $filename = $_FILES["uploadbanner"]["name"];
           $tempname = $_FILES["uploadbanner"]["tmp_name"];
           $upload_dir = "../cms/uploaded_admin/";
           $filepath = $upload_dir.$filename;
   
   
           if(file_exists($filepath)) 
           {
               $filepath = $upload_dir.time().$filename;
               
               $file_name = time().$filename;
                   
   
               // Now let's move the uploaded image into the folder: image
               if (move_uploaded_file($tempname, $filepath)) 
               {
                   // echo "uploaded success";
   
                   $sql= mysqli_query($db, "UPDATE `admin` SET `name`='$fullName',`comment`='$comment',`profile_image`='$file_name' WHERE `id`='1' ");
   
                   // Execute query
   
                   if($sql)
                   {
                       echo "<script>
                                   alert('Profile Saved Successfuly.');
                                   window.location.href='../index.php?setting';
                           </script>";
   
                   }
                   
   
               }
               else
               {
                   echo "<script>
                                   alert('Failed to upload Image!');
                                   window.history.back();
                           </script>";
                   
               }
           }
           else
           {
               // Now let's move the uploaded image into the folder: image
               if (move_uploaded_file($tempname, $filepath)) 
               {
                    //  echo "uploaded success";
   
                   $sql= mysqli_query($db, "UPDATE `admin` SET `name`= '$fullName', `comment`= '$comment', `profile_image`= '$filename' WHERE `id` = '1' ");
   
                   // Execute query
    
                   if($sql)
                   {
                       echo "<script>
                                   alert('Profile Saved Successfuly.');
                                       window.location.href='../index.php?setting';
                                   </script>";
                   }

                   else
                   {
                       echo "<script>
                                   alert('Processing failed!');
                                   window.history.back();
                           </script>";
                   }
                   
   
               }
               else
               {
                   echo "<script>
                                   alert('Failed to upload Image!');
                                   window.history.back();
                           </script>";
                   
               }
           }
       
       
   
       }
    

}












//-------------------------------------------------------------------
// Change Password ...
//-------------------------------------------------------------------

if (isset($_POST['change_password'])) 
{
 

     $current_pass = mysqli_real_escape_string($db, $_POST['current_pass']);
     $new_pass = mysqli_real_escape_string($db, $_POST['new_pass']);
     $confirm_pass = mysqli_real_escape_string($db, $_POST['confirm_pass']);

     $query = mysqli_query($db, "SELECT * FROM `admin` WHERE `password` = '$current_pass' ");
    
     $num = mysqli_num_rows($query);


     if($num == 1)
     {
        
        if($new_pass == $confirm_pass)
        {

            $row = mysqli_fetch_Assoc($query);

            $id = $row['id'];

            // die();

            $sql= "UPDATE `admin` SET `password`='$confirm_pass' WHERE `id` = '$id'";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('Password updated successfuly.');
                              window.location.href='../index.php?setting';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }
        }
        else
        {
            echo "<script>
                    alert('Confirm Password do not match!');
                        window.history.back();
                </script>";
                    die();
        }

     }

     else
     {
        
        echo "<script>
                        alert('Current Password is not Correct!');
                        window.history.back();
                </script>";
                die();

            
    }

        // die();

}














//-------------------------------------------------------------------
// Update Clients...
//-------------------------------------------------------------------

if (isset($_POST['UpdateClient'])) 
{
 

    $client_name = mysqli_real_escape_string($db, $_POST['client_name']); 
    $client_id = mysqli_real_escape_string($db, $_POST['client_id']); 

    // die();
    // echo $title;



                $query1 = mysqli_query($db, "SELECT * FROM `cms_our_client` WHERE `id` = '$client_id' ");

                $row1 = mysqli_fetch_assoc($query1);
    
                // echo $row1['client_logo'];
                // echo $client_id;
    
                // die();

                unlink('../cms/uploaded_clients/'.$row1['client_logo']);  // To delete image from server or folder
    
                // echo "Working..";
                $filename = $_FILES["uploadbanner"]["name"];
                $tempname = $_FILES["uploadbanner"]["tmp_name"];
                $upload_dir = "../cms/uploaded_clients/";
                $filepath = $upload_dir.$filename;


                if(file_exists($filepath)) 
                {
                    $filepath = $upload_dir.time().$filename;
                    
                    $file_name = time().$filename;
                        
        
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "UPDATE `cms_our_client` SET `client_name`='$client_name',`client_logo`='$file_name' WHERE `id`='$client_id'";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Client Updated Successfuly .');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
                else
                {
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "UPDATE `cms_our_client` SET `client_name`='$client_name',`client_logo`='$filename' WHERE `id`='$client_id'";


                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Client Updated Successfuly .');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
            
            
        


}






//-------------------------------------------------------------------
// Add Site Logo...
//-------------------------------------------------------------------

if (isset($_POST['addLogo'])) 
{
 

    $image_type = mysqli_real_escape_string($db, $_POST['image_type']); 

    // die();
    // echo $title;


            $query = mysqli_query($db, "SELECT * FROM `cms_logo` WHERE `image_type` = '$image_type' ");
        
            $num = mysqli_num_rows($query);

            if($num>= 1)
            {
             
                ?>
                    <script>
                        alert('Only one <?=$image_type?> is allowed!');
                        window.history.back();
                    </script>;
                <?php
            }
            else
            {
                
    
                // echo "Working..";
                $filename = $_FILES["uploadbanner"]["name"];
                $tempname = $_FILES["uploadbanner"]["tmp_name"];
                $upload_dir = "../cms/uploaded_logo/";
                $filepath = $upload_dir.$filename;


                if(file_exists($filepath)) 
                {
                    $filepath = $upload_dir.time().$filename;
                    
                    $file_name = time().$filename;
                        
        
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_logo`( `logo`, `image_type`) VALUES ('$file_name','$image_type')";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            ?>
                                <script>
                                    alert('<?=$image_type?> Added Successfuly .');
                                    window.history.back();
                                </script>;
                            <?php

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
                else
                {
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_logo`( `logo`, `image_type`) VALUES ('$filename','$image_type')";


                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            ?>
                                <script>
                                    alert('<?=$image_type?> Added Successfuly .');
                                    window.history.back();
                                </script>;
                            <?php

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
            
            }
        


}









//-------------------------------------------------------------------
// add Team Seq ...
//-------------------------------------------------------------------

if (isset($_POST['add_team_seq'])) 
{
 

     $seq = mysqli_real_escape_string($db, $_POST['seq']);
     $member_id = mysqli_real_escape_string($db, $_POST['member_id']);

    
    // die();

        $sql= "UPDATE `team` SET `sequence`='$seq' WHERE `id`='$member_id' ";

        $run = mysqli_query($db, $sql);
        
        if($run)
        {
            echo "<script>
                        alert('Sequence updated successfuly.');
                        window.location.href='../index.php?manage-team';
                    </script>";
        }
        
        else
        {
            echo "<script>
                        alert('Processing failed!');
                        window.history.back();
                </script>";
        }

 
}








//-------------------------------------------------------------------
// add Team Seq ...
//-------------------------------------------------------------------

if (isset($_POST['add_practice_area_seq'])) 
{
 

     $seq = mysqli_real_escape_string($db, $_POST['seq']);
     $practice_area_id = mysqli_real_escape_string($db, $_POST['member_id']);

    
    // die();

        $sql= "UPDATE `practice_area` SET `sequence` = '$seq' WHERE `id` = '$practice_area_id' ";

        $run = mysqli_query($db, $sql);
        
        if($run)
        {
            echo "<script>
                        alert('Sequence updated successfuly.');
                        window.location.href='../index.php?manage_practice_area';
                    </script>";
        }
        
        else
        {
            echo "<script>
                        alert('Processing failed!');
                        window.history.back();
                </script>";
        }


}








//-------------------------------------------------------------------
// Add Social media icons ...
//-------------------------------------------------------------------

if (isset($_POST['add_social_media_icons'])) 
{
 

     $icon = mysqli_real_escape_string($db, $_POST['icon']);
     $url = mysqli_real_escape_string($db, $_POST['url']);

     $query = mysqli_query($db, "SELECT * FROM `cms_social_media_links` WHERE `icon` = '$icon' ");
        
     $num = mysqli_num_rows($query);

     if($num>= 1)
     {
         echo "<script>
                     alert('Icon already exist!');
                     window.history.back();
             </script>";
             die();
     }
    
    // die();
        // echo $title;

            $sql= "INSERT INTO `cms_social_media_links`(`icon`, `social_media_link`) VALUES  ('$icon', '$url')";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('Social Media Icon added successfuly.');
                            window.location.href='../index.php?cms-logo';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }


}
 












//-------------------------------------------------------------------
// Add About us cover image...
//-------------------------------------------------------------------

if (isset($_POST['add_aboutus_cover_image'])) 
{
 

        // $client_name = mysqli_real_escape_string($db, $_POST['add_aboutus_cover_image']); 


            $query = mysqli_query($db, "SELECT * FROM `cms_about_us` WHERE `row_type` = 'Cover' ");
        
            $num = mysqli_num_rows($query);

            if($num>= 1)
            {
                echo "<script>
                            alert('Cover Image is already exist!');
                            window.history.back();
                    </script>";
            }
            else
            {
                
    
                // echo "Working..";
                $filename = $_FILES["uploadbanner"]["name"];
                $tempname = $_FILES["uploadbanner"]["tmp_name"];
                $upload_dir = "../cms/uploaded_about_us/";
                $filepath = $upload_dir.$filename;


                if(file_exists($filepath)) 
                {
                    $filepath = $upload_dir.time().$filename;
                    
                    $file_name = time().$filename;
                        
        
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_about_us` (`cover_image`, `row_type`) VALUES   ('$file_name','Cover')";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('About us Cover Added Successfuly .');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
                else
                {
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_about_us` (`cover_image`, `row_type`) VALUES   ('$filename','Cover')";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('About us Cover Added Successfuly .');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
            
            }
        


}






//-------------------------------------------------------------------
// Add About us cover image...
//-------------------------------------------------------------------

if (isset($_POST['add_contact_cover_image'])) 
{
 

        // $client_name = mysqli_real_escape_string($db, $_POST['add_aboutus_cover_image']); 


            $query = mysqli_query($db, "SELECT * FROM `cms_contact_us` WHERE `row_type` = 'Cover' ");
        
            $num = mysqli_num_rows($query);

            if($num>= 1)
            {
                echo "<script>
                            alert('Cover Image is already exist!');
                            window.history.back();
                    </script>";
            }
            else
            {
                
    
                // echo "Working..";
                $filename = $_FILES["uploadbanner"]["name"];
                $tempname = $_FILES["uploadbanner"]["tmp_name"];
                $upload_dir = "../cms/uploaded_contact_us/";
                $filepath = $upload_dir.$filename;


                if(file_exists($filepath)) 
                {
                    $filepath = $upload_dir.time().$filename;
                    
                    $file_name = time().$filename;
                        
        
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_contact_us` ( `title`, `content`, `row_type`) VALUES   ('Cover','$file_name','Cover')";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Contact us Cover Added Successfuly .');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
                else
                {
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_contact_us` ( `title`, `content`, `row_type`) VALUES   ('Cover','$filename','Cover')";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Contact us Cover Added Successfuly .');
                                        window.history.back();
                                </script>";

                        }

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
            
            }
        


}





//-------------------------------------------------------------------
// Add About us cover image...
//-------------------------------------------------------------------

if (isset($_POST['add_career_cover_image'])) 
{
 
        // $client_name = mysqli_real_escape_string($db, $_POST['add_aboutus_cover_image']); 

            $query = mysqli_query($db, "SELECT * FROM `cms_career` WHERE `row_type` = 'Cover' ");
        
            $num = mysqli_num_rows($query);

            if($num>= 1)
            {
                echo "<script>
                            alert('Cover Image is already exist!');
                            window.history.back();
                    </script>";
            }
            else
            {
                
    
                // echo "Working..";
                $filename = $_FILES["uploadbanner"]["name"];
                $tempname = $_FILES["uploadbanner"]["tmp_name"];
                $upload_dir = "../cms/uploaded_career/";
                $filepath = $upload_dir.$filename;


                if(file_exists($filepath)) 
                {
                    $filepath = $upload_dir.time().$filename;
                    
                    $file_name = time().$filename;
                        
        
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_career` (`cover_image`, `row_type`) VALUES   ('$file_name','Cover')";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Career Cover Added Successfuly.');
                                        window.history.back();
                                </script>";

                        }
                        

                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                                </script>";
                        
                    }
                }
                else
                {
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $filepath)) 
                    {
                        // echo "uploaded success";

                        $sql = "INSERT INTO `cms_career` (`cover_image`, `row_type`) VALUES ('$filename','Cover')";

                        // Execute query
                        $run =  mysqli_query($db, $sql);

                        if($run)
                        {
                            echo "<script>
                                        alert('Career Cover Cover Added Successfuly .');
                                        window.history.back();
                                </script>";

                        }
                        
                    }
                    else
                    {
                        echo "<script>
                                        alert('Failed to upload Image!');
                                        window.history.back();
                              </script>";
                        
                    }
                }
            
            }
        
}







//-------------------------------------------------------------------
// Add About us content...
//-------------------------------------------------------------------

if (isset($_POST['add_aboutus_content'])) 
{
 

     $heading = mysqli_real_escape_string($db, $_POST['heading']);
     $content = mysqli_real_escape_string($db, $_POST['content']);
    
    // die();
        // echo $title;

          


    
        // echo "Working..";
        $filename = $_FILES["uploadbanner"]["name"];
        $tempname = $_FILES["uploadbanner"]["tmp_name"];
        $upload_dir = "../cms/uploaded_about_us/";
        $filepath = $upload_dir.$filename;


        if(file_exists($filepath)) 
        {
            $filepath = $upload_dir.time().$filename;
            
            $file_name = time().$filename;
                

            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {
                // echo "uploaded success";

                $sql= "INSERT INTO `cms_about_us`( `cover_image`, `heading`, `content`,`about_us_content_seq`, `row_type`) VALUES ('$file_name', '$heading', '$content','Secondary', 'Content' )";

                $run = mysqli_query($db, $sql);
                
                if($run)
                {
                    echo "<script>
                                alert('About us Content added successfuly.');
                                window.location.href='../index.php?cms-aboutus';
                          </script>";
                }
                else
                {
                    echo "<script>
                                alert('Processing failed!');
                                window.history.back();
                        </script>";
                }
                

            }
            else
            {
                echo "<script>
                                alert('Failed to upload Image!');
                                window.history.back();
                        </script>";
                
            }
        }
        else
        {
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $filepath)) 
            {
                // echo "uploaded success";

                $sql= "INSERT INTO `cms_about_us`( `cover_image`, `heading`, `content`,`about_us_content_seq`, `row_type`) VALUES ('$filename', '$heading', '$content','Secondary', 'Content' )";

                $run = mysqli_query($db, $sql);
                
                if($run)
                {
                    echo "<script>
                                alert('About us Content added successfuly.');
                                window.location.href='../index.php?cms-aboutus';
                          </script>";
                }
                else
                {
                    echo "<script>
                                alert('Processing failed!');
                                window.history.back();
                        </script>";
                }
                

            }
            else
            {
                echo "<script>
                                alert('Failed to upload Image!');
                                window.history.back();
                        </script>";
                
            }
        }


}




//-------------------------------------------------------------------
// Add About us content...
//-------------------------------------------------------------------

if (isset($_POST['add_Career_content'])) 
{
 

    $heading = mysqli_real_escape_string($db, $_POST['heading']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    
    // die();
    // echo $title;

    $query = mysqli_query($db, "SELECT * FROM `cms_career` WHERE `row_type` = 'Content' ");
        
    $num = mysqli_num_rows($query);

    if($num>= 1)
    {
        echo "<script>
                    alert('Content already exist!');
                    window.history.back();
            </script>";
    }

    else
    {

        $sql= "INSERT INTO `cms_career`( `cover_image`, `heading`, `content`, `row_type`) VALUES 
        ('$file_name', '$heading', '$content', 'Content')";

        $run = mysqli_query($db, $sql);
        
        if($run)
        {
            echo "<script>
                        alert('Career Content added successfuly.');
                        window.location.href='../index.php?cms-career';
                    </script>";
        }
        else
        {
            echo "<script>
                        alert('Processing failed!');
                        window.history.back();
                </script>";
        }
    }



}






//-------------------------------------------------------------------
// Add About us factsheet / table ...
//-------------------------------------------------------------------

if (isset($_POST['add_aboutus_table'])) 
{
 

     $heading = mysqli_real_escape_string($db, $_POST['heading']);
     $content = mysqli_real_escape_string($db, $_POST['content']);
     $category = mysqli_real_escape_string($db, $_POST['category']);
    
    // die();
        // echo $title;

            $sql= "INSERT INTO `cms_about_us`( `heading`, `content`, `table_content_type`, `row_type`) VALUES ('$heading', '$content', '$category', 'table' )";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('New Date added into Factsheet successfuly.');
                            window.location.href='../index.php?cms-aboutus';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }


}







//-------------------------------------------------------------------
// Add Address ...
//-------------------------------------------------------------------

if (isset($_POST['addAddress'])) 
{
 

     $state_city = mysqli_real_escape_string($db, $_POST['state_city']);
     $address = mysqli_real_escape_string($db, $_POST['address']);
    
    // die();
        // echo $title;

        

        $query = mysqli_query($db, "SELECT * FROM `cms_contact_us` WHERE `row_type` = 'Address' ");
        
        $num = mysqli_num_rows($query);
 
        if($num>= 2)
        {
            echo "<script>
                        alert('Only 2 Addresses are allowed!');
                        window.history.back();
                </script>";
        }
        else
        {

            $sql= "INSERT INTO `cms_contact_us`(`title`, `content`, `row_type`) VALUES ('$state_city', '$address', 'Address' )";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('Addresss Saved successfuly.');
                            window.location.href='../index.php?cms-contactus';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }
        }


}





//-------------------------------------------------------------------
// Add Address ...
//-------------------------------------------------------------------

if (isset($_POST['addMobile'])) 
{
 

     $mobile_no = mysqli_real_escape_string($db, $_POST['mobile_no']);
    
    // die();
        

        $query = mysqli_query($db, "SELECT * FROM `cms_contact_us` WHERE `row_type` = 'Mobile' ");
        
        $num = mysqli_num_rows($query);

        if($num>= 2)
        {
            echo "<script>
                        alert('Only 2 Mobile Numbers are allowed!');
                        window.history.back();
                </script>";
        }
        else
        {

            $sql= "INSERT INTO `cms_contact_us`(`title`, `content`, `row_type`) VALUES ('Mobile_no', '$mobile_no', 'Mobile' )";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('Mobile Number Saved successfuly.');
                            window.location.href='../index.php?cms-contactus';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }
        }


}






//-------------------------------------------------------------------
// Add Address ...
//-------------------------------------------------------------------

if (isset($_POST['addEmail'])) 
{
 

     $email = mysqli_real_escape_string($db, $_POST['email']);
    
    // die();
        

        $query = mysqli_query($db, "SELECT * FROM `cms_contact_us` WHERE `row_type` = 'Email' ");
        
        $num = mysqli_num_rows($query);

        if($num>= 2)
        {
            echo "<script>
                        alert('Only 2 Emails are allowed!');
                        window.history.back();
                </script>";
        }
        else
        {

            $sql= "INSERT INTO `cms_contact_us`(`title`, `content`, `row_type`) VALUES ('Email', '$email', 'Email' )";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('Email Saved successfuly.');
                            window.location.href='../index.php?cms-contactus';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }
        }


}







//-------------------------------------------------------------------
// Update About us factsheet / table ...
//-------------------------------------------------------------------

if (isset($_POST['update_aboutus_table'])) 
{
 

     $table_heading = mysqli_real_escape_string($db, $_POST['table_heading']);
     $table_content = mysqli_real_escape_string($db, $_POST['table_content']);
     $table_content_type = mysqli_real_escape_string($db, $_POST['table_content_type']);
     $table_content_id = mysqli_real_escape_string($db, $_POST['table_content_id']);
    
    // die();

            $sql= "UPDATE `cms_about_us` SET `heading`='$table_heading',`content`='$table_content',`table_content_type`='$table_content_type' WHERE `id` = '$table_content_id' ";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('Factsheet updated successfuly.');
                            window.location.href='../index.php?cms-aboutus';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }


}






//-------------------------------------------------------------------
// Update About us factsheet / table ...
//-------------------------------------------------------------------

if (isset($_POST['update_aboutus_content'])) 
{
 

    $update_heading = mysqli_real_escape_string($db, $_POST['update_heading']);
    $update_content = mysqli_real_escape_string($db, $_POST['update_content']);
    $update_content_id = mysqli_real_escape_string($db, $_POST['update_content_id']);
    
    // die();

        if(!empty($update_content))
        {

            $sql= "UPDATE `cms_about_us` SET `heading`='$update_heading',`content`='$update_content' WHERE `id` = '$update_content_id' ";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('About us Content updated successfuly.');
                            window.location.href='../index.php?cms-aboutus';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }
    }
    else
    {

        $sql= "UPDATE `cms_about_us` SET `heading`='$update_heading' WHERE `id` = '$update_content_id' ";

        $run = mysqli_query($db, $sql);
        
        if($run)
        {
            echo "<script>
                        alert('About us Content updated successfuly.');
                        window.location.href='../index.php?cms-aboutus';
                  </script>";
        }
        else
        {
            echo "<script>
                        alert('Processing failed!');
                        window.history.back();
                </script>";
        }

    }

}





//-------------------------------------------------------------------
// Update About us factsheet / table ...
//-------------------------------------------------------------------

if (isset($_POST['update_career_content'])) 
{
 

    $update_heading = mysqli_real_escape_string($db, $_POST['update_heading']);
    $update_content = mysqli_real_escape_string($db, $_POST['update_content']);
    $update_content_id = mysqli_real_escape_string($db, $_POST['update_content_id']);
    
    // die();

        if(!empty($update_content))
        {

            $sql= "UPDATE `cms_career` SET `heading`='$update_heading',`content`='$update_content' WHERE `id` = '$update_content_id' ";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('Career Content updated successfuly.');
                            window.location.href='../index.php?cms-career';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }
    }
    else
    {

        $sql= "UPDATE `cms_career` SET `heading`='$update_heading' WHERE `id` = '$update_content_id' ";

        $run = mysqli_query($db, $sql);
        
        if($run)
        {
            echo "<script>
                        alert('Career Content updated successfuly.');
                        window.location.href='../index.php?cms-career';
                  </script>";
        }
        else
        {
            echo "<script>
                        alert('Processing failed!');
                        window.history.back();
                </script>";
        }

    }

}








//-------------------------------------------------------------------
// Update About us factsheet / table ...
//-------------------------------------------------------------------

if (isset($_POST['update_disclaimer'])) 
{
 

    $update_heading = mysqli_real_escape_string($db, $_POST['update_heading']);
    $update_content = mysqli_real_escape_string($db, $_POST['update_content']);
    $update_content_id = mysqli_real_escape_string($db, $_POST['update_content_id']);
    
    // die();

        if(!empty($update_content))
        {

            $sql= "UPDATE `cms_disclaimer` SET `heading`='$update_heading',`content`='$update_content' WHERE `id` = '$update_content_id' ";

            $run = mysqli_query($db, $sql);
            
            if($run)
            {
                echo "<script>
                            alert('Disclaimer updated successfuly.');
                            window.location.href='../index.php?disclaimer';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }
    }
    else
    {

        $sql= "UPDATE `cms_disclaimer` SET `heading`='$update_heading' WHERE `id` = '$update_content_id' ";

        $run = mysqli_query($db, $sql);
        
        if($run)
        {
            echo "<script>
                        alert('Disclaimer updated successfuly.');
                        window.location.href='../index.php?disclaimer';
                  </script>";
        }
        else
        {
            echo "<script>
                        alert('Processing failed!');
                        window.history.back();
                </script>";
        }

    }

}








//-------------------------------------------------------------------
// Update Category...
//-------------------------------------------------------------------

if (isset($_POST['editBlogCateg'])) 
{
 
    $blog_categ_name = mysqli_real_escape_string($db, $_POST['blog_categ_name']); 
    $blog_categ_code = mysqli_real_escape_string($db, $_POST['blog_categ_code']);            
    
    // die();

            $sql= mysqli_query($db, "UPDATE `blog_category` SET `blog_categ`='$blog_categ_name' WHERE `blog_categ_code` = '$blog_categ_code' ");
            
            if($sql)
            {
                echo "<script>
                            alert('Blog Category Updated Successfuly.');
                            window.location.href='../index.php?manage-category';
                      </script>";
            }
            else
            {
                echo "<script>
                            alert('Processing failed!');
                            window.history.back();
                    </script>";
            }
        

}













//-------------------------------------------------------------------
// Add to Best selling products ...

if($_GET['add_to_Best_selling_Unique_Code'])
{
  
    $product_unique_code = str_replace(' ', '#', ( $_GET['add_to_Best_selling_Unique_Code']));     // Converting " " = space to # 


    $query_count_rows="SELECT * FROM `cms_best_selling` ";
            
    $check_count_rows=mysqli_query($db,$query_count_rows);

    $num_count_rows = mysqli_num_rows($check_count_rows);
    
    // Limit to set no. of products in this section

    // if($num_count_rows == 6)
    // {

    //     echo "
    //     <div class='container-fluid col-2 d-flex justify-content-between alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
    //         <p class='pt-3'><strong>Only 6 Products</strong> are allowed in this section.<br> Kindy removea any existing product to add new.</p>
    //         <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    //             <span aria-hidden='true'>&times;</span>
    //         </button>
    //     </div>
    //     ";
    // }

    // else
    // {
       
            $query1="SELECT * FROM `cms_best_selling` WHERE `product_code` = '$product_unique_code' ";
                    
            $check=mysqli_query($db,$query1);

            $num = mysqli_num_rows($check);

            if($num > 0)
            {

                echo "
                <div class='container-fluid col-2 d-flex justify-content-between alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                    <p class='pt-3'><strong>Product </strong> Already Exist in your List</p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                ";
                
            }

            // echo $product_unique_code;

            else
            {

                    $sql="SELECT * FROM `products` WHERE `product_code` =  '$product_unique_code' ";

                    $res=mysqli_query($db, $sql);

                    $row = mysqli_fetch_assoc($res); 

                    // echo $row['product_name'];

                    $product_name = mysqli_real_escape_string($db, $row['product_name']);
                    $product_unique_code = mysqli_real_escape_string($db, $row['product_code']);
                    
                    $product_category = mysqli_real_escape_string($db, $row['product_category']);
               
                    
                    $query="INSERT INTO `cms_best_selling`(`product_name`, `product_code`) VALUES ('$product_name','$product_unique_code') ";
                

                    $run = mysqli_query($db,$query);

                    if($run)
                    {

                        echo "
                        <div class='container-fluid col-2 d-flex justify-content-between alert alert-success alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                            <p class='pt-3'><strong>Product </strong> Added in the List Now.</p>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";


                    }
                    else
                    {
                        echo"<script>
                                alert('Processing failed!');
                                window.history.back();
                            </script>";
                    }
            }        

// }

}







//-------------------------------------------------------------------
// Add to Best selling products ...

if($_GET['add_to_Top_rated_Unique_Code'])
{
  
    $product_unique_code = str_replace(' ', '#', ( $_GET['add_to_Top_rated_Unique_Code']));     // Converting " " = space to # 


    $query_count_rows="SELECT * FROM `cms_top_rated`";
            
    $check_count_rows=mysqli_query($db,$query_count_rows);

    $num_count_rows = mysqli_num_rows($check_count_rows);

    if($num_count_rows == 10)
    {
        echo "
        <div class='container-fluid col-2 d-flex justify-content-between alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
            <p class='pt-3'><strong>Only 6 Products</strong> are allowed in this section.<br> Kindy removea any existing product to add new.</p>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }

    else
    {


            $query1="SELECT * FROM `cms_top_rated` WHERE `product_code` = '$product_unique_code' ";
                    
            $check=mysqli_query($db,$query1);

            $num = mysqli_num_rows($check);

            if($num > 0)
            {

                echo "
                <div class='container-fluid col-2 d-flex justify-content-between alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                    <p class='pt-3'><strong>Product </strong> Already Exist in your List</p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                ";
                
            }

            // echo $product_unique_code;

            else
            {

                    $sql="SELECT * FROM `products` WHERE `product_code` =  '$product_unique_code' ";

                    $res=mysqli_query($db, $sql);

                    $row = mysqli_fetch_assoc($res);

                    // echo $row['product_name'];

                    $product_name = mysqli_real_escape_string($db, $row['product_name']);
                    $product_unique_code = mysqli_real_escape_string($db, $row['product_code']);
                    
                    
                
                    
                    
                    $query="INSERT INTO `cms_top_rated`(`product_name`, `product_code`) VALUES ('$product_name','$product_unique_code')  ";
                

                    $run = mysqli_query($db,$query);

                    if($run)
                    {

                        echo "
                        <div class='container-fluid col-2 d-flex justify-content-between alert alert-success alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                            <p class='pt-3'><strong>Product </strong> Added in the List Now.</p>
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        ";


                    }
                    else
                    {
                        echo"<script>
                                alert('Processing failed!');
                                window.history.back();
                            </script>";
                    }
            }        

    }

}







//-------------------------------------------------------------------
// Add to Best selling products ...

if($_GET['add_to_New_Arrivals_category_Code'])
{
    
    $category_unique_code = str_replace(' ', '#', ( $_GET['add_to_New_Arrivals_category_Code']));     // Converting " " = space to # 


    $query1="SELECT * FROM `cms_new_arrivals` WHERE `category_unique_code` = '$category_unique_code' ";
            
    $check=mysqli_query($db,$query1);

    $num = mysqli_num_rows($check);

    if($num > 0)
    {

        echo "
        <div class='container-fluid col-2 d-flex justify-content-between alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
            <p class='pt-3'><strong>Product </strong> Already Exist in your List</p>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
        
    }

    // echo $product_unique_code;

    else
    {

            $sql="SELECT * FROM `main_category` WHERE `category_unique_code` =  '$category_unique_code' ";

            $res=mysqli_query($db, $sql);

            $row = mysqli_fetch_assoc($res);

            // echo $row['product_name'];

            $category_name = mysqli_real_escape_string($db, $row['category_name']);
            $category_unique_code = mysqli_real_escape_string($db, $row['category_unique_code']);
            
            $parent_category_id = mysqli_real_escape_string($db, $row['parent_category_id']);
            $category_image = mysqli_real_escape_string($db, $row['category_image']);           
            

            $query="INSERT INTO `cms_new_arrivals`(`category_name`, `category_unique_code`, `parent_category_id`, `category_image`) 
            VALUES ('$category_name','$category_unique_code','$parent_category_id','$category_image')";
        

            $run = mysqli_query($db,$query);

            if($run)
            {

                echo "
                <div class='container-fluid col-2 d-flex justify-content-between alert alert-success alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                    <p class='pt-3'><strong>Product </strong> Added in the List Now.</p>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                ";


            }
            else
            {
                echo"<script>
                        alert('Processing failed!');
                        window.history.back();
                    </script>";
            }
    }        


}









//-------------------------------------------------------------------
// Add to Best selling products ...

if($_GET['Product_unique_code_qty'])
{

    session_start();
    error_reporting(0);


    $logged_in_user = $_SESSION['username']; 
    if($logged_in_user)
    {

        $Product_unique_code_qty = str_replace(' ', '#', ( $_GET['Product_unique_code_qty']));     
        // $product_input_value_qty = str_replace(' ', '#', ( $_GET['product_input_value_qty']));     
        $product_input_value_qty =  $_GET['product_input_value_qty'];    


            // $get_row_query="SELECT * FROM `cart` WHERE `product_code` =  '$Product_unique_code_qty' ";
            $get_row_query="SELECT * FROM `products` WHERE `product_code` =  '$Product_unique_code_qty' ";
                
            $get_row_run=mysqli_query($db, $get_row_query);
        
            $row = mysqli_fetch_assoc($get_row_run);

            $discount = $row['discount'];

            $discount = $row['discount'];
            
            
             // Check if the selected qty. exceeding the available Qty.

            $available_quantity =  $row['available_quantity'];

            $alert_quantity =  $row['alert_quantity'];

            $qty_left = $available_quantity - $alert_quantity;

            if($product_input_value_qty > $qty_left)
            {
                
                echo "
                    <div class='container-fluid col-4  alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                        <strong>Only ".$qty_left." Qty.</strong> is available of this Product in Stock.
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>
                    ";

            }
            else
            {

                 
            
            

                    if($discount == 0)
                    {
        
        
                        $final_price = mysqli_real_escape_string($db, $row['product_selling_price']);
        
                        // Caculating final price after quantity
        
                        $subtotal = $final_price * $product_input_value_qty;
        
                        $query="UPDATE `cart` SET `selected_quantity` = '$product_input_value_qty', `subtotal` = '$subtotal' WHERE `product_code` = '$Product_unique_code_qty' 
                                AND `cart_product_owner` = '$logged_in_user' ";
                    
        
                        $run = mysqli_query($db, $query);
        
                        if($run)
                        {
        
                            echo "
                            <div class='container-fluid col-4  alert alert-success alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                <strong>Quantity </strong> Updatated Successful.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            ";
        
        
                        }
                        else
                        {
                            echo "
                            <div class='container-fluid col-4  alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                <strong>Quantity </strong> Updatation Failed!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            ";
                        }
                    }
        
                    else
                    {
                        $final_price = mysqli_real_escape_string($db, $row['final_selling_price']);
        
                        // Caculating final price after quantity
        
                        $subtotal = $final_price * $product_input_value_qty;
        
                        $query="UPDATE `cart` SET `selected_quantity` ='$product_input_value_qty', `subtotal` = '$subtotal' WHERE `product_code` = '$Product_unique_code_qty' 
                                AND `cart_product_owner` = '$logged_in_user' ";
                    
        
                        $run = mysqli_query($db, $query);
        
                        if($run)
                        {
        
                            echo "
                            <div class='container-fluid col-4  alert alert-success alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                <strong>Quantity </strong> Updatated Successful.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            ";
        
        
                        }
                        else
                        {
                            echo "
                            <div class='container-fluid col-4  alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
                                <strong>Quantity </strong> Updatation Failed!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            ";
                        }
                    }
                    
            }

    }

    else
    {
        echo "
        <div class='container-fluid col-4  alert alert-danger alert-dismissible fade show fixed-top' id='alert' onshow='myalertFunction()' role='alert'>
            <strong>Processing </strong> Failed!
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }
  

 
}







//-------------------------------------------------------------------
// Remove / Delete Product image ...

if(isset($_GET['blog_image_delete_id']))     // getting id from edit-product page for updation
{
    // echo $product_image_code = $_GET['product_image_delete_code'];

    $image_id = $_GET['blog_image_delete_id'];

    // die();

    $get_image="SELECT * FROM `blogs` WHERE `blog_code` = '$image_id' "; 

    $get_image_run = mysqli_query($db, $get_image);

    $get_image_row = mysqli_fetch_assoc($get_image_run);

    // echo $get_image_row['blog_cover_image'];

    // die();

    unlink('../uploaded_images/'.$get_image_row['blog_cover_image']);  // To delete image from server or folder


    $query="UPDATE `blogs` SET `blog_cover_image`='' WHERE `blog_code`= '$image_id' ";

    $run = mysqli_query($db,$query);

    if($run)
    {
        echo "
                <script>
                    history.back();
                </script>
            ";
    }
    else
    {
        echo "
                <script>
                    alert'Image Deletion Failed';
                    history.back();
                </script>
            ";
    }


}





//-------------------------------------------------------------------
// Remove / Delete Practice Aea Cover image ...

if(isset($_GET['practice_area_cover_image']))     // getting id from edit-product page for updation
{

    $image_id = $_GET['practice_area_cover_image'];


    $get_image="SELECT * FROM `practice_area` WHERE `id` = '$image_id' "; 

    $get_image_run = mysqli_query($db, $get_image);

    $get_image_row = mysqli_fetch_assoc($get_image_run);

    // echo $get_image_row['cover_image'];

    // die();

    unlink('../uploaded_practice_area/'.$get_image_row['cover_image']);  // To delete image from server or folder


    $query="UPDATE `practice_area` SET `cover_image`='' WHERE `id`= '$image_id' ";

    $run = mysqli_query($db,$query);

    if($run)
    {
        echo "
                <script>
                    history.back();
                </script>
            ";
    }
    else
    {
        echo "
                <script>
                    alert'Image Deletion Failed';
                    history.back();
                </script>
            ";
    }


}





//-------------------------------------------------------------------
// Remove / Delete Practice Aea ...

if(isset($_GET['remove_practice_area']))     // getting id from edit-product page for updation
{

    $id = $_GET['remove_practice_area'];


    $get_image="SELECT * FROM `practice_area` WHERE `id` = '$id' "; 

    $get_image_run = mysqli_query($db, $get_image);

    $get_image_row = mysqli_fetch_assoc($get_image_run);

    // echo $get_image_row['cover_image'];

    // die();

    unlink('../uploaded_practice_area/'.$get_image_row['cover_image']);  // To delete image from server or folder


    $query="DELETE FROM `practice_area` WHERE `id`= '$id' ";

    $run = mysqli_query($db,$query);

    if($run)
    {
        echo "
                <script>
                    history.back();
                </script>
            ";
    }
    else
    {
        echo "
                <script>
                    alert('Processing Failed');
                    history.back();
                </script>
            ";
    }


}






//-------------------------------------------------------------------
// Remove / Delete Team member image ...

if(isset($_GET['team_member_main_img']))     // getting id from edit-product page for updation
{
    // echo $product_image_code = $_GET['product_image_delete_code'];

    $id = $_GET['team_member_main_img'];

    // die();

    $get_image="SELECT * FROM `team` WHERE `id` = '$id' "; 

    $get_image_run = mysqli_query($db, $get_image);

    $get_image_row = mysqli_fetch_assoc($get_image_run);


    unlink('../uploaded_images/'.$get_image_row['main_image']);  // To delete image from server or folder


    $query="UPDATE `team` SET `main_image`='' WHERE `id`= '$id' ";

    $run = mysqli_query($db,$query);

    if($run)
    {
        echo "
                <script>
                    history.back();
                </script>
            ";
    }
    else
    {
        echo "
                <script>
                    alert('Image Deletion Failed');
                    history.back();
                </script>
            ";
    }


}




//-------------------------------------------------------------------
// Remove / Delete Team member thumb image ...

if(isset($_GET['team_member_thumb_img']))     // getting id from edit-product page for updation
{
    // echo $product_image_code = $_GET['product_image_delete_code'];

    $id = $_GET['team_member_thumb_img'];

    // die();

    $get_image="SELECT * FROM `team` WHERE `id` = '$id' "; 

    $get_image_run = mysqli_query($db, $get_image);

    $get_image_row = mysqli_fetch_assoc($get_image_run);


    unlink('../uploaded_images/'.$get_image_row['thumb_image']);  // To delete image from server or folder


    $query="UPDATE `team` SET `thumb_image`='' WHERE `id`= '$id' ";

    $run = mysqli_query($db,$query);

    if($run)
    {
        echo "
                <script>
                    history.back();
                </script>
            ";
    }
    else
    {
        echo "
                <script>
                    alert('Image Deletion Failed');
                    history.back();
                </script>
            ";
    }


}




//-------------------------------------------------------------------
// Remove / Delete Team member  ...

if(isset($_GET['delete_team_member']))     // getting id from edit-product page for updation
{
    // echo $product_image_code = $_GET['product_image_delete_code'];

    $id = $_GET['delete_team_member'];

    // die();

    $get_image="SELECT * FROM `team` WHERE `id` = '$id' "; 

    $get_image_run = mysqli_query($db, $get_image);

    $get_image_row = mysqli_fetch_assoc($get_image_run);


    unlink('../uploaded_images/'.$get_image_row['main_image']);  // To delete image from server or folder

    unlink('../uploaded_images/'.$get_image_row['thumb_image']);  // To delete image from server or folder


    $query="DELETE FROM `team` WHERE `id`= '$id' ";

    $run = mysqli_query($db,$query);

    if($run)
    {
        echo "
                <script>
                    alert('Team Member Deleted Successfully.');
                    history.back();
                </script>
            ";
    }
    else
    {
        echo "
                <script>
                    alert('Image Deletion Failed');
                    history.back();
                </script>
            ";
    }


}




 


  //-------------------------------------------------------------------
    function getAllBlogs($db)
    {
        $query="SELECT * FROM blogs ORDER BY id DESC ";
 
        $run=mysqli_query($db,$query);
        
        $data = array();

        while($fetch = mysqli_fetch_assoc($run))
        {   
            // echo $fetch['name'];
            $data[] = $fetch;
        }   
        
        return $data;
    }



 


  //-------------------------------------------------------------------
    function getAllComments($db)
    {
        $query="SELECT * FROM blog_comments ORDER BY id DESC ";
 
        $run=mysqli_query($db,$query);
        
        $data = array();

        while($fetch = mysqli_fetch_assoc($run))
        {    
            // echo $fetch['name'];
            $data[] = $fetch;
        }   
        
        return $data;
    }






  //-------------------------------------------------------------------
    function getAllPracticeArea($db)
    {
        $query="SELECT * FROM practice_area ORDER BY id DESC ";
 
        $run=mysqli_query($db,$query);
        
        $data = array();

        while($fetch = mysqli_fetch_assoc($run))
        {   
            // echo $fetch['name'];
            $data[] = $fetch;
        }   
        
        return $data;
    }





  //------------------------------------------------------------------- Team Members
    function getAllMembers($db)
    {
        $query="SELECT * FROM team ORDER BY id DESC ";
 
        $run=mysqli_query($db,$query);
        
        $data = array();

        while($fetch = mysqli_fetch_assoc($run))
        {   
            // echo $fetch['name'];
            $data[] = $fetch;
        }   
        
        return $data;
    }



//-------------------------------------------------------------------
function getProductMainCateg($db)
{
    $query="SELECT * FROM main_category ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}




//-------------------------------------------------------------------
function getBlogCateg($db)
{
    $query="SELECT * FROM `blog_category` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
} 




//-------------------------------------------------------------------
function getAllImages($db)
{
    $query="SELECT * FROM `images` WHERE ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data; 
}



//-------------------------------------------------------------------
function getAllTopSliderBanners($db)
{
    $query="SELECT * FROM `cms_top_slider` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}




//-------------------------------------------------------------------
function getAllTopSliderDefaultBanner($db)
{
    $query="SELECT * FROM `cms_top_default_slider` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}




//-------------------------------------------------------------------
function getTestimonials($db)
{
    $query="SELECT * FROM `cms_testimonials` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}








//-------------------------------------------------------------------
function getAdmin($db)
{
    $query="SELECT * FROM `admin` ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        $data[] = $fetch;
    }   
    
    return $data;

}




//-------------------------------------------------------------------
function getClient($db)
{
    $query="SELECT * FROM `cms_our_client` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}



//-------------------------------------------------------------------
function getLogo($db)
{
    $query="SELECT * FROM `cms_logo` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}


//-------------------------------------------------------------------
function getSocialIcons($db)
{
    $query="SELECT * FROM `cms_social_media_links`   ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}



//-------------------------------------------------------------------
function getCarousel($db)
{
    $query="SELECT * FROM `cms_slider_banner` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}



//-------------------------------------------------------------------
function getCareer_cover($db)
{
    $query="SELECT * FROM `cms_career` WHERE `row_type` = 'Cover' ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}



//-------------------------------------------------------------------
function getAbout_us_cover($db)
{
    $query="SELECT * FROM `cms_about_us` WHERE `row_type` = 'Cover' ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}



//-------------------------------------------------------------------
function getContact_us_cover($db)
{
    $query="SELECT * FROM `cms_contact_us` WHERE `row_type` = 'Cover' ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}



//-------------------------------------------------------------------
function getContact_us_mobile($db)
{
    $query="SELECT * FROM `cms_contact_us` WHERE `row_type` = 'Mobile' ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}




//-------------------------------------------------------------------
function getContact_us_email($db)
{
    $query="SELECT * FROM `cms_contact_us` WHERE `row_type` = 'Email' ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}





//-------------------------------------------------------------------
function getContact_us_address($db)
{
    $query="SELECT * FROM `cms_contact_us` WHERE `row_type` = 'Address' ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}




//-------------------------------------------------------------------
function getAboutus_table_content($db)
{
    $query="SELECT * FROM `cms_about_us` WHERE `row_type` = 'table' ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}




//-------------------------------------------------------------------
function getAboutus_content($db)
{
    $query="SELECT * FROM `cms_about_us` WHERE `row_type` = 'Content' ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}



//-------------------------------------------------------------------
function getCareer_content($db)
{
    $query="SELECT * FROM `cms_career` WHERE `row_type` = 'Content' ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}


//-------------------------------------------------------------------
function getDisclaimer($db)
{
    $query="SELECT * FROM `cms_disclaimer` ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}



//-------------------------------------------------------------------
function getCarousel_content($db)
{
    $query="SELECT * FROM `cms_slider_banner` WHERE `row_type` = 'Content' ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}





//-------------------------------------------------------------------
function getOfferbanner2($db)
{
    $query="SELECT * FROM `cms_offer_banner2` ORDER BY RAND() ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}






//-------------------------------------------------------------------
function getAllFeaturedProducts($db)
{
    $query="SELECT * FROM `cms_featured_products` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}


function getAllFeaturedProductsClint($db)
{
    $query="SELECT * FROM `cms_featured_products` ORDER BY RAND() ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}





//-------------------------------------------------------------------
function getBestSelling($db)
{
    $query="SELECT * FROM `cms_best_selling` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}


function getBestSellingClint($db)
{
    $query="SELECT * FROM `cms_best_selling` ORDER BY RAND()  ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}




//-------------------------------------------------------------------
function getAllTopRated($db)
{
    $query="SELECT * FROM `cms_top_rated` ORDER BY RAND() ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}




//-------------------------------------------------------------------
function ViewAllQuiries($db)
{
    $query="SELECT * FROM `quiries` ORDER BY id DESC ";

    $run=mysqli_query($db,$query);
    
    $data = array();

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}



//-------------------------------------------------------------------
function getAllMainCateg($db)
{
    $query="SELECT * FROM `product_category` WHERE `parent_categ_code` = '98765' ORDER BY RAND() ";

    // $query="SELECT * FROM `main_category`";

    // $query="SELECT * FROM `main_category` ORDER BY RAND() ";

    $run=mysqli_query($db,$query);
     
    $data = array(); 

    while($fetch = mysqli_fetch_assoc($run))
    {   
        // echo $fetch['name'];
        $data[] = $fetch;
    }   
    
    return $data;
}
 



?>
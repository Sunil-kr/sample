<?php
     include ("admin/includes/db.php");


  /*-------------------------------------------------------------------------- 
        Blog Comments Store
    --------------------------------------------------------------------------*/
    
    if(isset($_POST['blog_code']))
    {

      

        $name = mysqli_real_escape_string($db, $_POST['name']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $message = mysqli_real_escape_string($db, $_POST['message']);

        $blog_code = mysqli_real_escape_string($db, $_POST['blog_code']);
        $blog_name = mysqli_real_escape_string($db, $_POST['blog_name']);
        $blog_category_code = mysqli_real_escape_string($db, $_POST['blog_category_code']);

        $blog_category_name = mysqli_real_escape_string($db, $_POST['blog_category_name']);

        
        $query="INSERT INTO `blog_comments`( `name`, `email`, `comment`, `blog_code`, `blog_name`, `blog_categ_name`, `blog_categ_code`) VALUES 
        ('$name','$email','$message', '$blog_code','$blog_name','$blog_category_name','$blog_category_code')"; 
        
        $run = mysqli_query($db,$query);

        if($run)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
        

    }



?>
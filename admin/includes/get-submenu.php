<?php

include("db.php");



$selected_option_id = $_POST['selected_option'];





?>
<!-- <script>
    comsol.log($selected_option_id);
</script> -->
<?php



    // echo "<label for='inputName5' class='form-label'>Select Sub Category Inside ' ".$selected_option_id." '</label> ";



$sql="SELECT * FROM `main_category` WHERE `parent_category_id` = '$selected_option_id' ";

$run = mysqli_query($db,$sql);  

$num = mysqli_num_rows($run);


if($num > 0)
{

    $query = "SELECT * FROM `main_category` WHERE `id` = '$selected_option_id'";

    $res=mysqli_query($db,$query);


    
    while($row = mysqli_fetch_assoc($res)) 
    {
        $parent_cat_name = $row['category_name'];
        echo "   <label for='inputName5' id='select_label' class='form-label'>Select Sub Category Inside ' ".$parent_cat_name." '</label> 
        ";

    }
    

    echo" 
                <select name='parent_category_id' id='new_select' onchange='myFunction_sub()' class='form-control' required>                                                  
                <option value=".$selected_option_id."> New Sub Category </option>     
    ";


    while($row = mysqli_fetch_assoc($run))
    {   
        echo "
                                                         
                <option value=".$row['id']."> ".$row['category_name']. "</option>            
             ";
    }
    echo "
            </select>
        
        ";

}
    
else
{
    $query = "SELECT * FROM `main_category` WHERE `id` = '$selected_option_id'";

    $res=mysqli_query($db,$query);


    
    while($row = mysqli_fetch_assoc($res)) 
    {
        $parent_cat_name = $row['category_name'];
        echo "   <label for='inputName5' id='select_label' class='form-label'>Select Sub Category Inside ' ".$parent_cat_name." '</label> 
        ";


    }


    echo" 
    <select name='parent_category_id' id='new_select' class='form-control' required>
    ";

        echo "                                                 
                <option value=".$selected_option_id."> New Sub Category </option>            
        ";


    echo "
    </select>

    ";

}   

exit;

    // All echo will combinely returns as response on success


?>
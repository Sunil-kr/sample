
<?php
include "admin/includes/db.php";
// include "admin/includes/function.php";

?>


 
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinayak</title>
</head>


<?php 
//-------------------------------------------------------------------
// Send_enquiry_mail ---IMP
//-------------------------------------------------------------------


if(isset($_POST['Send_mail'])) 
{

    $name = mysqli_real_escape_string($db, $_POST['name']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $message = mysqli_real_escape_string($db, $_POST['message']);



    // $date= strtotime($input. '+ 750 minute');       // Converting Default timezone to USA to india i.e, 12hrs 30 min.

    // $query_date = date('d/M/Y h:i:s', $date);


    $sql = "INSERT INTO `quiries`( `name`, `mobile`, `email`, `message`) VALUES  ('$name','$phone',
    '$email','$message')";





//-------------------------------------------------------------------
// Send_enquiry_mail
//-------------------------------------------------------------------

?>


<body>
    <!-- <form action="https://formsubmit.co/<?php// if($branch == "Haryana") { echo"vinayaklaces2023@gmail.com"; } else { echo "Vinayaklaces@gmail.com"; }?>" method="POST"> -->
    <form action="https://formsubmit.co/info@juslawoffices.com" method="POST">
    <!-- <form action="https://formsubmit.co/techbingework@gmail.com" method="POST"> -->
        <input type="text"  style="display: none" name="name" value="<?=$name?>" required>
        <input type="email" style="display: none"  name="email" value="<?=$email?>" required>
        <input type="tel" style="display: none"  name="mobile" value="<?=$phone?>" required>
        <input type="text" style="display: none"  name="message" value="<?=$message?>" requirsed>

        <button type="submit" id="send_email">Send</button>
    </form>
</body>


<?php
    // Execute query
    $run =  mysqli_query($db, $sql);

    if($run) 
    {
        echo "
            <script>   document.getElementById('send_email').click(); </script>
        ";
    }
    else
    {
        echo "<script>
                    alert('Something went wrong!');
                    window.history.back();
            </script>";
    }
   
}
?>


</html>

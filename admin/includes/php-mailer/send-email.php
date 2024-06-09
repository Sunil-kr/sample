
<?php

// echo "heloo world";

// PHP Mailer: A mail sent to clints after successfull payment
// Below no need to use indentation, bcs <pre> tag used for email.

require 'PHPMailerAutoload.php';

if(isset($_POST['notify_user_on_email']))
{

    echo $user_emails = $_POST['emails'];
    
    echo $email_content = $_POST['email_content'];

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                                 // Enable verbose debug output

    $mail->isSMTP();                                        // Set mailer to use SMTP
    // $mail -> SMTPDebug = 3;
    $mail->Host = 'localhost';               // Specify main and backup SMTP servers
    $mail->SMTPAuth = false;                                // Enable SMTP authentication
    // $mail->Username = 'info@sajsajawat.com';                  // SMTP username
    // $mail->Password = 'SAjsajsawat-MAin@515';                      // SMTP password
    $mail->Username = 'sunilkumar.pahwa@gmail.com';                  // SMTP username
    $mail->Password = 'devprachi';                      // SMTP password
    $mail->SMTPAutoTLS = false;                               // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    $mail->setFrom('sunilkumar.pahwa@gmail.com','Sajsajawat.com, Sanjoy apno ki Muskaan ');
    $mail->addAddress($user_emails);                               // Add a recipient      ---------------------> IMP.
    //$mail->addAddress('receiver2@gfg.com', 'Name');          // Name is optional
    $mail->addReplyTo('sunilkumar.pahwa@gmail.com');
    $mail->addCC('techbingework@gmail.com'); 
    //$mail->addBCC('bcc@example.com');
     
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    $mail->isHTML(true);                                     // Set email format to HTML

    // To get current Date ad time ...........

    $today = date("F j, Y"); 
    //echo "Created date is " . $today;

    // To get current Date ad time .........

    $mail->Subject = 'Testing';
    $mail->Body    = $email_content;

    $mail->AltBody = 'Mail-error, Please ignore this mail.. ';

    if(!$mail->send()) {
    echo 'Email could not be sent.';
    echo 'Email Error: ' . $mail->ErrorInfo;
    } 
    else {
        echo 'Message has been sent';
    }

    // PHP Mailer ends here..

}
?>
<?php
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$subject = $_POST['subject'];
$message1 = $_POST['message'];

if(filter_var($email , FILTER_VALIDATE_EMAIL))
{
    require "PHPMailer-master/src/Exception.php";
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";

echo $email , $name;

$mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'malikkashif272272@gmail.com';                     //SMTP username
        $mail->Password   = 'egvhdzyzesyagbeg';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('malikkashif272272@gmail.com', 'NewsFeed');
        $mail->addAddress("malikkashif272272@gmail.com"); 
        
        // $message = "Name : ".$name." Email : ".$email.
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'NewsFeed';
        $mail->Body = $message . "<br>" .  "Name"."<h2>$name</h2>". "<br>" .  "Email"."<h2>$email</h2>". "<br>" . "Subject". "<h2>$subject</h2>". "<br>" .  "Message"."<h2>$message1</h2>". "<br>" . "Phone"."<h2>$phone</h2>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        header("location:index.php");
        $_SESSION['send'] = "Message has been SuccessFully sent";
    } catch (Exception $e) {
        $_SESSION['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}else{
    $_SESSION['error'] = "Email Method is Incorrect";
}
header("location:contact.php");
?>
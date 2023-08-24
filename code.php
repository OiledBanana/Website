<?php
session_start();
include('dbcon.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($username,$email,$verify_token){
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through                                 //Enable SMTP authentication
    $mail->Username   = 'capacilloferdinand13@gmail.com';  
    $mail->SMTPAuth   = true;                    //SMTP username
    $mail->Password   = 'jakolit0411';                               //SMTP password
    $mail->SMTPSecure ="tls";
    $mail->Port       = 25;      
    $mail->setFrom('capacilloferdinand13@gmail.com', $username);
    $mail->addAddress($email);     //Add a recipient
   
    $mail->isHTML(true);
    $mail->Subject ="Email Verification from ferdinand";

    $email_template = "
    <h2>You Have been registered to our Website</h2>
    <h5>Verifiy your email adress to login with the below given link</h5>
    <br></br>
    
    <a href='http://localhost/project%203/verify-email.php? token=$verify_token'> Click me </a>
    ";
    $mail->Body = $email_template;
    $mail->send();
    echo 'Message has been sent';

}

if(isset($_POST['register_btn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_token = md5(rand());
    
    sendemail_verify("$username","$email","$verify_token");
    echo "Sent or not";

    // 
    // $check_email_query = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    // $check_email_query_run = mysqli_query($con,$check_email_query);

    // if (mysqli_num_rows($check_email_query) > 0)
    // {
    //     $_SESSION['status'] ='Email already exists';
    //     header('Location: register.php')
    // }
    // else 
    // {
    //     //Insert User
    //     $query = 'INSERT INTO users(username,	email,	password,	verify_token) VALUES('$username', '$_email', '$password', '$verify_token')';
    //     $query_run =(mysqli_query($con,$query));

    //     if($query_run)
    //     {   
    //         sendemail_verify("$username","$email","$verify_token");
    //         $_SESSION['status'] ='Registration Sucessful! Verify Email Adress';
    //          header('Location: register.php');

    //     }
    //     else()
    //     {
    //         $_SESSION['status'] ='Registration Failed';
    //         header('Location: register.php')
    //     }
    // }
    
}   
?>
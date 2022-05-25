<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// email Or Phone validation

if(!empty($_POST['email'])) {

if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
    echo "Please provide a valid email-id";
    return;
}
$name = $_POST['name'];
$sub = $_POST['subject'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$msg = $_POST['message'];
$phone = isset($_POST['phone']) ? $_POST['phone'] : 'The TSK Legal.';



    
    
/********************Sending Email******************************************/

$mail = new PHPMailer(true);  // Passing `true` enables exceptions
try {
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();    
                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'mailsendingemail@gmail.com';                 // SMTP username
    $mail->Password = '#54321*6565#';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                     // TCP port to connect to
    //Recipientsalokverma.ued@gmail.com
    // enquiry@connectinfosys.commailsendingemail@gmail.com', 'Contact Queries'
    $mail->setFrom('mailsendingemail@gmail.com', 'Contact Queries');
    $mail->addAddress('akashtripathi439@gmail.com');     // Add a recipient
    $mail->isHTML(true); 
    $mail->Body.='<html lang="en">';
    $mail->Body.='<head>';
    $mail->Body.='<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">';
    $mail->Body.='</head>';
    $mail->Body.='<body style="   font-family: ABeeZee, sans-serif;height:auto;">';    
    $mail->Body.='<div style="background-color:#fe9d01; padding:1%;margin:0;border-radius:2px">';
    $mail->Body.='<p style="color: white; text-align: center; font-size: 52px;margin:0">Welcome to <br><span style="font-size:35px;font-weight:800;">The TSK Legal & Law Firm</span></p>';
    $mail->Body.='</div>';
    $mail->Body.='<div style="border: 5px solid #fe9d01; border-top: none;">';
    $mail->Body.='<div style="padding: 1% 3%;margin: 0 0 1% 0">';
    $mail->Body.='<p style="font-size: 25px;text-align: center;text-transform:capitalize;font-weight: 800;margin:0;color:#051c2c;">Contact Form</p>';
    $mail->Body.='<p style="font-size: 16px;"><strong>Hello </strong>The TSK Legal,</p>';
    $mail->Body.='<p style="font-size: 16px;">Someone has tried to contact The TSK Legal</p>';
 
     $mail->Body.='<p style="font-size: 16px;"><strong>Last Name:</strong>&nbsp;&nbsp;'.@$name.'</span></p>';
    $mail->Body.='<p style="font-size: 16px;"><strong>Email:</strong>&nbsp;&nbsp;'.@$email.'</p>';
    $mail->Body.='<p style="font-size: 16px;"><strong>Phone:</strong>&nbsp;&nbsp;'.@$phone.'</p>';
      $mail->Body.='<p style="font-size: 16px;"><strong>Subject:</strong>&nbsp;&nbsp;'.@$sub.'</p>';
    $mail->Body.='<p style="font-size: 16px;"><strong>Message:</strong>&nbsp;&nbsp;'.@$msg.'</p>';    
//    $mail->Body.='<p style="font-size: 16px;">Training: '.@$service.'</p>';
//     $mail->Body.='<p style="font-size: 16px;">Plan: '.@$product.'</p>';

    $mail->Body.='<p style="font-size: 16px;">Cheers!</p>';
    $mail->Body.='<p style="font-size: 16px;">The TSK Legal.</p>';
    $mail->Body.='</div>';
    $mail->Body.='</div>';
    $mail->Body.='</body>';
    $mail->Body.='</html>';
    $mail->Subject = 'The TSK Legal.';
    $mail->send();
    echo '1';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}else{
    echo "mail not provide";
}
?>
<?php

/**
 * download PHPMailer first
 * https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "./assets/vendor/PHPMailer/src/Exception.php";
require "./assets/vendor/PHPMailer/src/PHPMailer.php";
require "./assets/vendor/PHPMailer/src/SMTP.php";
 
$mail = new PHPMailer();
$mail->isSMTP(); 					// SMTP service
$mail->CharSet = "UTF-8";			
$mail->Host = "smtp.gmail.com";     // Sender's SMTP server address
$mail->SMTPAuth = true;				// Whether to use authentication
$mail->Username = "**@gmail.com";   // sender's email address
$mail->Password = ""; 	// Sender's email authorization code : wsferxhqdfkuimon
$mail->SMTPSecure = "ssl";			// Use ssl protocol mode
$mail->Port = 465;   				// ssl port 465

$mail->setFrom("**@**.com","");;     // Set sender information
$mail->addAddress("**@**.com","");; // Set the recipient information
$mail->addAddress("**@**.com",""); //  you can set multiple, copy and paste this line to modify the email address
$mail->addReplyTo("**@**.com","Reply");   // Set the reply person information, which refers to the email address to which the reply email will be sent if the recipient wants to reply after receiving the email
//$mail->addCC("**@**.com");    // To set up email cc, you can only write the address, and the above settings can also only write the address
//$mail->addBCC("**@**.com");         // Set Bcc
//$mail->addAttachment("bug0.jpg");      // Set attachment
 
//details data to sent recipient
$mail->Subject = "You have new message~~";  // email title
$mail->Body = 
"username: ".$_POST['name']."
email: ".$_POST['email']."
subject: ".$_POST['subject']."
message: ".$_POST['message'];

//variable for sent successful!
$falied = "Message could not be sent!";

$succeed = "Message has been sent!";

//variable for sent fail!

if(!$mail->send()){
    echo "<script language=javascript>alert('$falied');</script>";    
}
else{
    echo "<script language=javascript>alert('$succeed');</script>";
    header("refresh:0;url=contact.html");
}
?>

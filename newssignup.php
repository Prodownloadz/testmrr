<?php

require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';  //mail.medicalrecordsreform.com
$mail->Port = 587; //465
$mail->SMTPSecure = 'tls'; //ssl
$mail->SMTPAuth = true;
$mail->Username = "mrr@medicalrecordsreform.com"; //noreply@medicalrecordsreform.com
$mail->Password = "RecordsM22Mrr#";  //RepNMedREC@2021

$mail->setFrom('mrr@medicalrecordsreform.com','Medical Records Reform');
$mail->addAddress('support@medicalrecordsreform.com'); 


$email=$_POST['email'];
$message = "You have received a Message. ".

"Newsletter signed up member details:\n Email: $email \n"; 

if(($email==""))
{ 
    
	echo "All fields are required, Please fill the form again.";
}
else
{
	$mail->Subject = "New message from MRR Newsletter Form";
	$mail->Body = $message;
	$mail->AddReplyTo($email);
	$mail->send();
	header("Location: http://medicalrecordsreform.com/index.html");
	exit;
}
	
?>
<?php

require 'PHPMailer-master/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com'; 
$mail->Port = 587; //587
$mail->SMTPSecure = 'tls'; //tls
$mail->SMTPAuth = true;
$mail->Username = "mrr@medicalrecordsreform.com";
$mail->Password = "RecordsM22Mrr#";

$mail->setFrom('mrr@medicalrecordsreform.com','Medical Records Reform');
$mail->addAddress('support@medicalrecordsreform.com');

$recaptcha = $_POST['g-recaptcha-response'];
$secret_key = '6LeslIogAAAAAHrw1g4lCkvkGJ-39-I03sMw1Uia';

$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
  . $secret_key . '&response=' . $recaptcha;

$response = file_get_contents($url);

$response = json_decode($response);

if($response->success) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$question=$_POST['question'];
	$message = "You have received a Message. ".

	" Here are the details:\n Name: $name \n Email: $email \n Question: $question \n"; 
	
	$mail->Subject = "New question from MRR FAQ Form";
	$mail->Body = $message;
	$mail->AddReplyTo($email);
	if($mail->send()) {
		?>
		<script type="text/javascript">
			alert("Message Successfully Sent...!");
			window.location.href="https://medicalrecordsreform.com/index.html";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Problem to Sent Mail...!");
			window.location.href="https://medicalrecordsreform.com/index.html";
		</script>
		<?php
	}
	//header("Location: http://medicalrecordsreform.com/index.html");
	//exit;
}
else
{
?>
	<script type="text/javascript">
	    alert("Invalid Captcha, Something went wrong, Please try again");
	    window.location.href="https://medicalrecordsreform.com/index.html";
	</script>	
	<?php
}
	
?>
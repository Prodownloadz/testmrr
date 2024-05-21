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

	$attachment=$_FILES["proof"]["tmp_name"];
	$folder="pricing_proof/";
	$file_name=$_FILES["proof"]["name"];
	move_uploaded_file($_FILES["proof"]["tmp_name"], "$folder".$_FILES["proof"]["name"]);

	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$message = "You have received a Message. ".

	" Here are the details:\n Name: $name \n Email: $email \n Phone: $phone \n"; 

	$mail->Subject = "New message from MRR Pricing Form";
	$mail->Body = $message;
	//$mail->AddAttachment($file_tmp, $file_name);
	$proof = $folder."".$file_name;
    $mail->AddAttachment($proof);
	$mail->AddReplyTo($email);
	if($mail->send()) {
		?>
		<script type="text/javascript">
			alert("Attachment Submitted Successfully...!");
			window.location.href="https://medicalrecordsreform.com/our-pricing.html";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Problem to Sent Mail...!");
			window.location.href="https://medicalrecordsreform.com/our-pricing.html";
		</script>
		<?php
	}
	//header("Location: https://medicalrecordsreform.com/our-pricing.html");
	//exit;
}
else
{
?>
	<script type="text/javascript">
	    alert("Invalid Captcha, Something went wrong, Please try again");
	    window.location.href="https://medicalrecordsreform.com/our-pricing.html";
	</script>	
	<?php
}
	
?>
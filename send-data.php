<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
//if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $message = "You have received a Message. ".
    " Here are the details:\n Name: $name \n Email: $email \n Phone: $phone \n";
   
    //if (array_key_exists('proof', $_FILES)) {

        $img_name = $_FILES['proof']['name'];
        $upload = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['proof']['name']));
        
        //to sure image upload goes to root directory add a link in my own case my project folder is Mail
        
        $uploadfile = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$img_name;
        
        //if (move_uploaded_file($_FILES['proof']['tmp_name'], $uploadfile)) {
                move_uploaded_file($_FILES['proof']['tmp_name'], $uploadfile);
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                // SMTPDebug turns on error display mssg 
                 $mail->SMTPDebug = 3;
                $mail->SMTPSecure = 'tls';
                $mail->Host = 'smtp.gmail.com';
                // set a port
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                // set login detail for gmail account
                $mail->Username = 'mrr@medicalrecordsreform.com';
                $mail->Password = 'RecordsM22Mrr#';
                $mail->CharSet = 'utf-8';
                // set subject
                $mail->setFrom($email, $name);
                $mail->addAddress('support@medicalrecordsreform.com');
                $mail->addAttachment($uploadfile, 'My uploaded image');
                $mail->IsHTML(true);
                $mail->Subject = 'Contact form: Feedback form';
                $mail->Body = $reason;
                if (!$mail->send()) {
                    $msg .= "Mailer Error: " . $mail->ErrorInfo;
                } else {
                    $msg .= "Message sent!";
                }
           
        //} else {
           // $msg .= 'Failed to move file to ' . $uploadfile;
        //}
    //}

//}
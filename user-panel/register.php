<?php

session_start();
include('include/config.php');
if (isset($_POST['register']) && $_POST['g-recaptcha-response']) {
	
	$recaptcha = $_POST['g-recaptcha-response'];
	$secret_key = '6LeslIogAAAAAHrw1g4lCkvkGJ-39-I03sMw1Uia';
	$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
	. $secret_key . '&response=' . $recaptcha;

	$response = file_get_contents($url);

	$response = json_decode($response);
	
	if($response->success) {

    $user_name = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $company_name = $_POST['company_name'];
    $password = md5($_POST['password']);
    $state = $_POST['state'];
    $status = '1';
    $query = "SELECT * FROM `customers` WHERE email='$email'";
    $execute = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($execute);
    if ($num_rows == 0) {
        $created_on = date("Y-m-d H:i:s");
        $query2 = "INSERT INTO `customers` (name, email, company_name, state, username, password, otp, status, created_on) VALUES ('$name', '$email', '$company_name', '$state', '$user_name', '$password', NULL, '$status', '$created_on')";
        $execute2 = mysqli_query($conn, $query2);
        $to = $email;
        if ($to) {
            $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td style="padding: 10px; text-align: center;">
                                <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">
                                <p>Hi, ' . $name . '</p>
                                <p>Your Account have been successfully registered in Medical Records Reform LLC. Your Username is : ' . $user_name . '</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">
                                <table style="width: 100%; border-collapse: collapse;">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 10px;">
                                                <p>Please visit : <a href="https://medicalrecordsreform.com/user-panel/" target="_blank">www.medicalrecordsreform.com/user-panel/</a></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td style="padding: 10px;">
                                                <p style="margin-bottom: 8px; margin-top: 0px;">Thank You!</p>
                                                <p style="margin-bottom: 8px; margin-top: 25px;">Regards, </p>
                                                <p style="margin-bottom: 8px; margin-top: 0px;"><strong>Case Admin Team,</strong> </p>
                                                <p style="margin-bottom: 8px; margin-top: 0px;"><b>Medical Records Reform LLC.</b></p>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>';

            $subject = "Account have been Registered";
            $name = "Medical Records Reform LLC";
            $reply = "support@medicalrecordsreform.com";
            $headers = "From: " . strip_tags($name) . " <" . strip_tags($reply) . ">\r\n";
            $headers .= "Reply-To: " . strip_tags($reply) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $html = utf8_decode($html);
            mail($to, $subject, $html, $headers);
        }

        $to = "support@medicalrecordsreform.com.test-google-a.com, Medicalrecordsreformmrr@gmail.com";
        if ($to) {
            $html = '<div style="width: 70%; margin: 0 auto; position: relative; background: #f3f3f3; padding: 20px 15px; font-family: Arial, Verdana, sans-serif;">
                <table style="width: 100%; background: #fff; border-radius: 5px; border-collapse: collapse;">
                    <tbody>
                        <tr>
                            <td style="padding: 10px; text-align: center;">
                                <img src="https://medicalrecordsreform.com/img/logo.png" style="width: auto;">
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">
                                <p>Hi, Admin</p>
                                <p>One New Customer is Registered.</p>
                            </td>
                        </tr>
                        <tr style="padding: 10px;">
                            <td>Name : ' . $_POST['name'] . '</td>
                        </tr>
                        <tr style="padding: 10px;">
                            <td>Email : ' . $_POST['email'] . '</td>
                        </tr>
                        <tr style="padding: 10px;">
                            <td>Company Name : ' . $company_name . '</td>
                        </tr>
                        <tr style="padding: 10px;">
                            <td>State : ' . $state . '</td>
                        </tr>
                        <tr>
                            <td style="padding: 10px;">
                                <table style="width: 100%; border-collapse: collapse;">
                                    <tbody>
                                        <tr>
                                            <td style="padding: 10px;">
                                                <p>Please visit : <a href="https://medicalrecordsreform.com/admin/" target="_blank">www.medicalrecordsreform.com/admin/</a></p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>';
            $subject = "New Customer is Registered";
            $headers = "From: " . strip_tags($_POST['name']) . " <" . strip_tags($email) . ">\r\n";
            $headers .= "Reply-To: " . strip_tags($email) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $html = utf8_decode($html);
            mail($to, $subject, $html, $headers);
        }
        ?>
        <script type="text/javascript">
            alert('Successfully Registered!');
            window.location.href = './';
        </script>
    <?php } else { ?>
        <script type="text/javascript">
            alert('Your Already Registered!');
            window.location.href = 'register.php';
        </script>
        <?php

    }
	}
}
include("include/topscript.php");
?>

<head>
<link rel="canonical" href="https://medicalrecordsreform.com/contact-us.html" />

<meta name="description" content="Register for a free account on Medical Records Reform LLC for managing your review records and status with more security.">
</head>

<style type="text/css">
    body {
        overflow: hidden;
    }

    .container {
        background-color: #f1f1f1;
        padding: 20px;
    }

    #message {
        display:none;
        background: #f1f1f1;
        color: #000;
        position: relative;
        padding: 20px;
        margin-top: 10px;
    }

    #message p {
        padding: 10px 35px;
        font-size: 12px;
    }

    .valid {
        color: green;
    }

    .valid:before {
        position: relative;
        left: -35px;
        content: "✔";
    }

    .invalid {
        color: red;
    }

    .invalid:before {
        position: relative;
        left: -35px;
        content: "✖";
    }
</style>
<body>
    <div class="container-fluid login-wapper">
        <div class="col-lg-8">
            <form action="#" name="formregister"  method="POST" onsubmit="return validateregisterform();">
                <div class="row">
                    <div class="col-lg-7 ">
                        <div class="containers left-con">
                            <div class="logo-header">
                                <img src="./image/logo.png">
                            </div>
                            <div class="form-container">
                                <div class="form-login form-regiser">
                                    <h5 class="title">Create your account free !</h5>
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <div class="form-icon-group">
                                            <span><i class="far fa-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Enter full name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Firm Name</label>
                                        <div class="form-icon-group">
                                            <span><i class="fal fa-building"></i></span>
                                            <input type="text" class="form-control" placeholder="Enter company name" name="company_name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <div class="form-icon-group">
                                            <span><i class="fal fa-envelope-open"></i></span>
                                            <input type="email" class="form-control" placeholder="Enter email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <div class="form-icon-group">
                                            <span><i class="fal fa-map-marker-alt"></i></span>
                                            <select class="form-control" name="state">
                                                <option value="">Select State</option>
                                                <option value="Alabama">Alabama</option>
                                                <option value="Alaska">Alaska</option>
                                                <option value="Arizona">Arizona</option>
                                                <option value="Arkansas">Arkansas</option>
                                                <option value="California">California</option>
                                                <option value="Colorado">Colorado</option>
                                                <option value="Connecticut">Connecticut</option>
                                                <option value="Delaware">Delaware</option>
                                                <option value="Florida">Florida</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Hawaii">Hawaii</option>
                                                <option value="Idaho">Idaho</option>
                                                <option value="Illinois">Illinois</option>
                                                <option value="Indiana">Indiana</option>
                                                <option value="Iowa">Iowa</option>
                                                <option value="Kansas">Kansas</option>
                                                <option value="Kentucky">Kentucky</option>
                                                <option value="Louisiana">Louisiana</option>
                                                <option value="Maine">Maine</option>
                                                <option value="Maryland">Maryland</option>
                                                <option value="Massachusetts">Massachusetts</option>
                                                <option value="Michigan">Michigan</option>
                                                <option value="Minnesota">Minnesota</option>
                                                <option value="Mississippi">Mississippi</option>
                                                <option value="Missouri">Missouri</option>
                                                <option value="Montana">Montana</option>
                                                <option value="Nebraska">Nebraska</option>
                                                <option value="Nevada">Nevada</option>
                                                <option value="New Hampshire">New Hampshire</option>
                                                <option value="New Jersey">New Jersey</option>
                                                <option value="New Mexico">New Mexico</option>
                                                <option value="New York">New York</option>
                                                <option value="North Carolina">North Carolina</option>
                                                <option value="North Dakota">North Dakota</option>
                                                <option value="Ohio">Ohio</option>
                                                <option value="Oklahoma">Oklahoma</option>
                                                <option value="Oregon">Oregon</option>
                                                <option value="Pennsylvania">Pennsylvania</option>
                                                <option value="Rhode Island">Rhode Island</option>
                                                <option value="South Carolina">South Carolina</option>
                                                <option value="South Dakota">South Dakota</option>
                                                <option value="Tennessee">Tennessee</option>
                                                <option value="Texas">Texas</option>
                                                <option value="Utah">Utah</option>
                                                <option value="Vermont">Vermont</option>
                                                <option value="Virginia">Virginia</option>
                                                <option value="Washington">Washington</option>
                                                <option value="West Virginia">West Virginia</option>
                                                <option value="Wisconsin">Wisconsin</option>
                                                <option value="Wyoming">Wyoming</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="form-icon-group">
                                            <span><i class="far fa-user"></i></span>
                                            <input type="text" class="form-control" placeholder="Enter username" name="username" required>
                                        </div>
                                        <span class="username_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Username should be more than 6 digit *</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="form-icon-group">
                                            <span class="show_password" onclick="showPassword('password', 'show_password')"><i class="far fa-eye-slash"></i></span>
                                            <input type="password" class="password form-control" placeholder="Enter password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                        </div>
                                        <div id="message">
                                            <span style="font-size: 12px; margin-top: 5px;">Password must contain the following:</span>
                                            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                            <p id="number" class="invalid">A <b>number</b></p>
                                            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <div class="form-icon-group">
                                            <span class="show_confirm_password" onclick="showPassword('confirm_password', 'show_confirm_password')"><i class="far fa-eye-slash"></i></span>
                                            <input type="password" name="confirm_password" class="confirm_password form-control" id="confirm_password" placeholder="Enter Confirm password" required readonly>
                                        </div>
                                    </div>
                                    <span class="password_error_msg" style="font-size: 12px; margin-top: 5px; color: red; display: none;">Password are not match *</span>
									
									<div class="form-group">
										<div class="g-recaptcha" data-sitekey="6LeslIogAAAAAGDemWFuHlcquAMuwf39LFRL3d4b"></div>
									</div>
                                    <div class="form-group">
                                        <button type="submit" name="register" class="btn btn-md btn-primary btn-custom">Sign Up</button>
                                    </div>
                                </div>
                                <div class="form-footer-1">
                                    <p>I have a account <a href="./">Sign In?</a></p>
                                </div>
                                <div class="form-footer-2">
                                    <p> <font size = '2.5px'>Medical Records Reform LLC </font> <font size = '2px'> | copyrights © reserved by </font> <br> <font size = '2.5px'>Medical Records Reform MRR Private Limited  <br> 2017 - 2022 </font><br> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="containers right-con">
                            <div class="img-holder">
                                <img src="./image/right-image.jpg" width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script language="javascript">
//        populateCountries("country", "state");

        function showPassword(id, class_attr) {
            var x = document.getElementById(id);
            if (x.type === "password") {
                x.type = "text";
                $('.' + class_attr).html('<i class="far fa-eye"></i>');
            } else {
                x.type = "password";
                $('.' + class_attr).html('<i class="far fa-eye-slash"></i>');
            }
        }

        $('.password, .confirm_password').keyup(function () {
            var password1 = $('.password').val();
            var password2 = $('.confirm_password').val();
            if (password1 !== password2) {
                $('.password_error_msg').css("display", "block");
                $("button[name='register']").css('display', 'none');
            } else {
                $('.password_error_msg').css("display", "none");
                $("button[name='register']").css('display', 'block');
            }
        });

        $("input[name='username']").keyup(function () {
            if ($(this).val().length > 6) {
                $('.username_error').css('display', 'none');
                $("button[name='register']").css('display', 'block');
            } else {
                $('.username_error').css('display', 'block');
                $("button[name='register']").css('display', 'none');
            }
        });
        var myInput = document.getElementById("password");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");
        myInput.onkeyup = function () {
            var error = [];
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
                error.push('1');
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
                error.push('1');
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
                error.push('1');
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
                error.push('1');
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
            if (error.length === 4) {
                document.getElementById("message").style.display = "none";
                $("button[name='register']").css('display', 'block');
                $('.confirm_password').removeAttr('readonly', 'readonly');
            } else {
                document.getElementById("message").style.display = "block";
                $("button[name='register']").css('display', 'none');
                $('.confirm_password').attr('readonly');
            }
        };
    </script>
    <?php include("include/bottomscript.php"); ?>
	
	<script src="js/ctvld.js"></script>
	
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
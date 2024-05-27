<?php include("include/topscript.php"); ?>
<style type="text/css">
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
            <div class="row">
                <div class="col-lg-7 ">
                    <div class="containers left-con">
                        <div class="logo-header">
                            <img src="./image/logo.png" alt="MRR LLC Logo" loading="lazy" decoding="async">
                        </div>
                        <div class="form-container">
                            <div class="form-login">
                                <h5 class="title">Forgot Password</h5>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <div class="form-icon-group">
                                        <span class="show_password" onclick="showPassword('password', 'show_password')"><i class="far fa-eye-slash"></i></span>
                                        <input type="password" class="password form-control" id="password" placeholder="Enter new password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                                    </div>
                                    <div id="message">
                                        <span style="font-size: 12px; margin-top: 5px;">Password must contain the following:</span>
                                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                        <p id="number" class="invalid">A <b>number</b></p>
                                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                    </div>
                                    <span class="password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter your new password *</span>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <div class="form-icon-group">
                                        <span class="show_confirm_password" onclick="showPassword('confirm_password', 'show_confirm_password')"><i class="far fa-eye-slash"></i></span>
                                        <input type="password" class="confirm_password form-control" id="confirm_password" placeholder="Enter Confirm password" readonly>
                                    </div>
                                    <span class="confirm_password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter your confirm password *</span>
                                </div>
                                <span class="password_error_msg" style="font-size: 12px; margin-top: 5px; color: red; display: none;">Password are not match *</span>
                                <div class="form-group btn-groups">
                                    <button class="reset-pass-btn btn btn-md btn-custom">Reset</button>
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
                            <img src="./image/right-image.jpg" width="100%" alt="Born Baby" loading="lazy" decoding="async">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
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
                $('.reset-pass-btn').css("display", "none");
            } else {
                $('.password_error_msg').css("display", "none");
                $('.reset-pass-btn').css("display", "block");
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
                $('.reset-pass-btn').css("display", "block");
                $('.confirm_password').removeAttr('readonly', 'readonly');
            } else {
                document.getElementById("message").style.display = "block";
                $('.reset-pass-btn').css("display", "none");
                $('.confirm_password').attr('readonly');
            }
        };

        $('.reset-pass-btn').click(function () {
            var Data = [];
            var Error = [];

            if (!$.trim($('.password').val())) {
                Error.push('');
                $('.password_error').css("display", "block");
            } else {
                Data.push($.trim($('.password').val()));
                $('.password_error').css("display", "none");
            }

            if (!$.trim($('.confirm_password').val())) {
                Error.push('');
                $('.confirm_password_error').css("display", "block");
            } else {
                $('.confirm_password_error').css("display", "none");
            }

            Data.push(localStorage.getItem("email"));

            if (Error.length === 0) {
                $.ajax({
                    type: 'POST',
                    url: './trans.php',
                    data: {'Id': 'reset-password', 'Data': Data},
                    success: function (data) {
                        if (data === '1') {
                            alert('Your Password Successfully Reseted');
                            window.location.href = "./";
                        } else {
                            alert('Failed to Reset Password *');
                        }
                    }
                });
            }
        });
    </script>
    <?php include("include/bottomscript.php"); ?>
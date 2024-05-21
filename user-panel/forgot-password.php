<?php include("include/topscript.php"); ?>
<body>
    <div class="container-fluid login-wapper">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-7">
                    <div class="containers left-con">
                        <div class="logo-header">
                            <img src="./image/logo.png">
                        </div>
                        <div class="form-container">
                            <div class="form-login">
                                <h5 class="title">Forgot Password</h5>
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="form-icon-group">
                                        <span><i class="far fa-user"></i></span>
                                        <input type="text" class="email form-control" placeholder="Enter your email">
                                    </div>
                                    <span class="email_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter your email address *</span>
                                    <span class="email_valid_error" style="font-size: 12px; margin-top: 5px; color: red; display: none;">Please enter your valid email address</span>
                                </div>
                                <div class="form-group btn-groups">
                                    <button class="forgot-pass-btn btn btn-md btn-custom">Send OTP</button>
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
        </div>
    </div>
    <script type="text/javascript">
        $('.forgot-pass-btn').click(function () {
            var Data = [];
            var Error = [];

            if (!$.trim($('.email').val())) {
                Error.push('');
                $('.email_error').css("display", "block");
            } else {
                Data.push($.trim($('.email').val()));
                $('.email_error').css("display", "none");
            }

            if (!$.trim($('.email').val())) {
                $('.email_valid_error').css("display", "none");
            } else {
                var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
                if (testEmail.test($.trim($('.email').val()))) {
                    $('.email_valid_error').css("display", "none");
                } else {
                    Error.push('');
                    $('.email_valid_error').css("display", "block");
                }
            }

            if (Error.length === 0) {
                $.ajax({
                    type: 'POST',
                    url: './trans.php',
                    data: {'Id': 'forgot-password', 'Data': Data},
                    success: function (data) {
                        if (data === '1') {
                            localStorage.setItem("email", Data[0]);
                            window.location.href = "otp-verify.php";
                        } else {
                            alert('Invalid Email Address *');
                        }
                    }
                });
            }
        });
    </script>
    <?php include("include/bottomscript.php"); ?>
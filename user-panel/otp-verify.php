<?php include("include/topscript.php"); ?>
<body>
    <div class="container-fluid login-wapper">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-7">
                    <div class="containers left-con">
                        <div class="logo-header">
                            <img src="./image/logo.png" alt="MRR LLC Logo" loading="lazy" decoding="async">
                        </div>
                        <div class="form-container">
                            <div class="form-login">
                                <h5 class="title">OTP Confirmation</h5>
                                <div class="form-group">
                                    <label>OTP</label>
                                    <div class="form-icon-group">
                                        <span><i class="far fa-user"></i></span>
                                        <input type="text" class="otp text form-control" placeholder="Enter your OTP">
                                    </div>
                                    <span class="otp_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter your OTP *</span>
                                </div>
                                <div class="form-group btn-groups">
                                    <button class="otp-verify-btn btn btn-md btn-custom">Submit</button>
                                </div>
                            </div>
                            <div class="form-footer-1">
                                <p>I have a account <a href="./">Sign In?</a></p>
                            </div>
                            <div class="form-footer-2">
                                <p>© 2021 MMR LCC Legal, all rights reserved.</p>
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
        $('.otp-verify-btn').click(function () {
            var Data = [];
            var Error = [];

            if (!$.trim($('.otp').val())) {
                Error.push('');
                $('.otp_error').css("display", "block");
            } else {
                Data.push($.trim($('.otp').val()));
                $('.otp_error').css("display", "none");
            }

            Data.push(localStorage.getItem("email"));

            if (Error.length === 0) {
                $.ajax({
                    type: 'POST',
                    url: './trans.php',
                    data: {'Id': 'verify-otp', 'Data': Data},
                    success: function (data) {
                        if (data === '1') {
                            window.location.href = "reset-password.php";
                        } else {
                            alert('Invalid OTP *');
                        }
                    }
                });
            }
        });
    </script>
    <?php include("include/bottomscript.php"); ?>
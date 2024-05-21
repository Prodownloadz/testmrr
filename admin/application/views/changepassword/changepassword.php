<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('topscript') ?>
    <style type="text/css">
        form .form-footer {
            border-top: 0px solid #d3dce9;
            padding: 20px 0 10px 0;
            margin-top: 20px;
        }
        .form-control {
            display: block;
            width: 100%;
            height: calc(2.6rem + 2px);
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
    </style>
    <body>
        <div id="wrapper">
            <?php
            $this->load->view('leftmenu');
            $this->load->view('header');
            ?>    
            <div class="clearfix"></div>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="<?php echo BEGIN_PATH; ?>/changepassword/edit" method="POST" enctype="multipart/form-data" autocomplete="off">
                                        <h4 class="form-header text-uppercase"><i class="fa fa-user-circle-o"></i>Change Password</h4>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="input-8" class="col-form-label">Old Password :</label>
                                                <input type="password" class="old_password form-control">
                                                <span class="old_password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter old password *</span>
                                                <span class="invalid_old_password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Invalid old password *</span>
                                                <span class="valid_old_password_msg" style="font-size: 12px; color: green; margin-top: 5px; display: none;">Valid old password</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="input-8" class="col-form-label">New Password :</label>
                                                <input type="password" class="password form-control">
                                                <span class="password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter new password *</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <label for="input-8" class="col-form-label">Confirm Password :</label>
                                                <input type="password" class="confirm_password form-control">
                                                <span class="confirm_password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter confirm password *</span>
                                                <span class="password_error_msg" style="font-size: 12px; margin-top: 5px; color: red; display: none;">Password are not match *</span>
                                            </div>
                                        </div>
                                        <div class="form-footer">
                                            <button type="button" class="change-password-btn btn btn-success" value="<?php echo $content[0]['id'] ?>">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
        <?php $this->load->view('bottomscript'); ?>
        <!--Form Validatin Script-->
        <script src="<?php echo BEGIN_PATH; ?>/assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $('.old_password').keyup(function () {
                var old_password = $(this).val();
                if (old_password) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo BEGIN_PATH; ?>/changepassword/oldpasswordcheck',
                        data: {'Data': old_password},
                        success: function (data) {
                            if (data === '1') {
                                $('.invalid_old_password_error').css("display", "none");
                                $('.valid_old_password_msg').css("display", "block");
                            } else {
                                $('.invalid_old_password_error').css("display", "block");
                                $('.valid_old_password_msg').css("display", "none");
                            }
                        }
                    });
                }
            });

            $('.password, .confirm_password').keyup(function () {
                var password1 = $('.password').val();
                var password2 = $('.confirm_password').val();
                if (password1 !== password2) {
                    $('.password_error_msg').css("display", "block");
                    $('.change-password-btn').css("display", "none");
                } else {
                    $('.password_error_msg').css("display", "none");
                    $('.change-password-btn').css("display", "block");
                }
            });

            $('.change-password-btn').click(function () {
                var Data = [];
                var Error = [];

                if (!$.trim($('.old_password').val())) {
                    Error.push('');
                    $('.old_password_error').css("display", "block");
                } else {
                    Data.push($.trim($('.old_password').val()));
                    $('.old_password_error').css("display", "none");
                }

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

                if (Error.length === 0) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo BEGIN_PATH; ?>/changepassword/edit',
                        data: {'Data': Data},
                        success: function (data) {
                            if (data === '1') {
                                alert("Password Successfully Changed!");
                                window.location.href = "<?php echo BEGIN_PATH; ?>/login/logout";
                            } else {
                                alert("Problem to Change Password *");
                            }
                        }
                    });
                }
            });
        </script>
    </body>
</html>
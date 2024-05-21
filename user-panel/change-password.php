<?php
session_start();
if (!isset($_SESSION['mrr-user-loggedin'])) {
    header('location: ./');
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
include("include/topscript.php");
include('include/config.php');
?>
<body>
    <style type="text/css">
        .home {
            background: #06B7C2;
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
    <div class="container-fluid" id="dashboard wrapper">
        <div class="row top-flex">
            <?php
            include("include/header.php");
            include("include/side-menu.php");
            ?>
            <div class="col-lg-10" id="main-page-wapper">
                <div class="col-lg-12 breadcrumb-holder p-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Change Password</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 page-padding card p-4">
                    <form>
                        <div class="row">
                            <div class="col-lg-6 page-padding">
                                <div class="form-group">
                                    <label>Old Password <span class="error">*</span></label>
                                    <div class="form-icon-group">
                                        <span><i class="far fa-lock-alt"></i></span>
                                        <input type="password" class="old_password form-control" placeholder="Enter old password">
                                    </div>
                                    <span class="old_password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter old password *</span>
                                    <span class="invalid_old_password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Invalid old password *</span>
                                    <span class="valid_old_password_msg" style="font-size: 12px; color: green; margin-top: 5px; display: none;">Valid old password</span>
                                </div>
                                <div class="form-group">
                                    <label>New Password <span class="error">*</span></label>
                                    <div class="form-icon-group">
                                        <span><i class="far fa-user"></i></span>
                                        <input type="password" class="password form-control" id="password" placeholder="Enter new password">
                                    </div>
                                    <span class="password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter new password *</span>
                                    <div id="message">
                                        <span style="font-size: 12px; margin-top: 5px;">Password must contain the following:</span>
                                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                                        <p id="number" class="invalid">A <b>number</b></p>
                                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password <span class="error">*</span></label>
                                    <div class="form-icon-group">
                                        <span><i class="far fa-user"></i></span>
                                        <input type="password" class="confirm_password form-control" placeholder="Enter confirm password" readonly>
                                    </div>
                                    <span class="confirm_password_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter confirm password *</span>
                                </div>
                                <span class="password_error_msg" style="font-size: 12px; margin-top: 5px; color: red; display: none;">Password are not match *</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 page-padding">
                                <div class="btn-group" style="float: right;">
                                    <button class="change-password-btn btn btn-primary" type="button"><i class="fal fa-save"></i> Save</button>
                                    <button class="btn btn-danger" type="reset"><i class="fal fa-times"></i> Cancel</button>
                                </div>
                                <br>
                            </div>
                        </div>
                    </form>
                </div>
<!--                <div class="col-lg-12">
                    <p class="text-center" style="font-size: 14px;">© 2021 MRR LCC Legal, all rights reserved. Designed by <a  href="#" style="text-decoration: none;">Timeminsolutions.com</a></p>
                </div>-->
            </div>
        </div>
    </div>
    <script src="js/change-password.js?ver=1.4" type="text/javascript"></script>
    <?php include("include/bottomscript.php"); ?>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>MRR - ADMIN</title>
        <!--favicon-->
        <!--<link rel="icon" href="assets/images/fav.png" type="image/x-icon">-->
        <!-- Bootstrap core CSS-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- animate CSS-->
        <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
        <!-- Icons CSS-->
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
        <!-- Custom Style-->
        <link href="assets/css/app-style.css" rel="stylesheet"/>
        <style type="text/css">
            img {
                width: 200px;
            }
            .login_window{
                background-size:cover;
            }
            .card-authentication1{
                margin:auto;
                height: 550px;
                background:#fff;
                border-radius:15px;
            }
            .car-img{
                position:absolute;
                top:10%;
                right:20px;
                width:50%;
            }
            .input-shadow{
                background:#f9f9f9;
            }
            input{
                color:#000 !important;
            }
            input:focus{
                background:#f9f9f9 !important;
            }
            input::placeholder{
                color:#000 !important;
            }
            .form-group label, .form-control-position{
                color:#000;
            }
            .btn-danger {
                color: #fff;
                background-color: #0e2f56;
                border-color: #0e2f56;
            </style>
        </head>
        <body class="login_window">
            <div id="wrapper">
                <div class="card card-authentication1 my-5">
                    <div class="card-body">
                        <div class="card-content p-2">
                            <div class="card-title text-uppercase text-center">
                                <img src="assets/images/logo.png">
                                <br>
                                <h5 class="text-dark">Admin Login</h5>
                            </div>
                            <form action="<?php echo BEGIN_PATH; ?>/login" method="post">
                                <div class="form-group">
                                    <label for="exampleInputUsername" class="">Username</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="text" id="exampleInputUsername" class="form-control input-shadow" placeholder="Enter Username" name="username">
                                        <div class="form-control-position">
                                            <i class="icon-user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword" class="">Password</label>
                                    <div class="position-relative has-icon-right">
                                        <input type="password" id="exampleInputPassword" class="form-control input-shadow" placeholder="Enter Password" name="password">
                                        <div class="form-control-position">
                                            <i class="icon-lock"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <div class="icheck-material-primary">
                                            <input type="checkbox" id="user-checkbox" onclick="myFunction()" />
                                            <label for="user-checkbox">Show Password</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger btn-block waves-effect waves-light" name="submit">Sign In</button>
                            </form>
                            <br>
                            <div class="col-lg-12 text-center">
                                <a class="btn btn-danger" href="http://medicalrecordsreform.com/">Back to website</a>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
            </div>
            <script type="text/javascript">
                function myFunction() {
                    var x = document.getElementById("exampleInputPassword");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                }
            </script>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/popper.min.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
        </body>
    </html>
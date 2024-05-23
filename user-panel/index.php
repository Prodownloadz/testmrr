<?php

include('include/config.php');

if (isset($_POST['login'])) {

    $username = $_POST['username'];

    $password = md5($_POST['password']);

    $query = "SELECT * FROM `customers` WHERE (username='$username' OR email='$username') AND password='$password'";

    $execute = mysqli_query($conn, $query);

    $num_rows = mysqli_num_rows($execute);

    if ($num_rows > 0) {

        $Data = mysqli_fetch_array($execute);

        if ($Data['status'] === '1') {

            session_start();

            $_SESSION['mrr-user-loggedin'] = true;

            $_SESSION['user_id'] = $Data['id'];

            $_SESSION['name'] = $Data['name'];

            ?>

            <script type="text/javascript">window.location.href = 'dashboard.php';</script>

            <?php

        } else {

            ?>

            <script type="text/javascript">alert('Your Account is In Active / Please Contact Admin');</script>

            <?php

        }

    } else {

        ?>

        <script type="text/javascript">alert('Wrong Username / Email or Password');</script>  

        <?php

    }

}

include("include/topscript.php");

?>

<head>
  <link rel="canonical" href="https://www.medicalrecordsreform.com/contact-us.html" />
<meta name="description" content="Manage your medical records and easily access your reviewed files with meta data.">
</head>

<body>

    <div class="container-fluid login-wapper">

        <div class="col-lg-8">

            <form action="#" method="POST">

                <div class="row">

                    <div class="col-lg-7 ">

                        <div class="containers left-con">

                            <div class="logo-header">

                                <img src="./image/logo.png">

                            </div>

                            <div class="form-container">

                                <div class="form-login">

                                    <h5 class="title">Client Login</h5>



                                    <div class="form-group">

                                        <label>Username / Email</label>

                                        <div class="form-icon-group">

                                            <span><i class="far fa-user"></i></span>

                                            <input type="text" class="form-control" placeholder="Enter username" id="username" name="username" required>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label>Password</label>

                                        <div class="form-icon-group">

                                            <span class="show_password" onclick="showPassword('password', 'show_password')"><i class="far fa-eye-slash"></i></span>

                                            <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" required>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <button type="submit" name="login" class="btn btn-md btn-primary btn-custom">Sign in</button>

                                    </div>

                                </div>

                                <div class="form-footer-1">

                                    <p><a href="forgot-password.php">Forgot password ?</a></p>

                                    <p>I'dont have an account <a href="register.php">Sign Up?</a></p>

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

                                <img src="./image/right-image1.jpg" width="100%">

                            </div>

                        </div>

                    </div>

                </div>

            </form>

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

    </script>

    <?php include("include/bottomscript.php"); ?>
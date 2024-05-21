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
    </style>
    <div class="container-fluid" id="dashboard wrapper">
        <div class="row top-flex">
            <?php
            include("include/header.php");
            include("include/side-menu.php");
            $query = "SELECT * FROM `cases` WHERE `created_by`='$user_id' AND `status`='0'";
            $execute = mysqli_query($conn, $query);
            $Data = mysqli_num_rows($execute);
            ?>
            <div class="col-lg-10" id="main-page-wapper">
                <div class="col-lg-12 breadcrumb-holder p-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 page-padding card p-4">
                    <div class="row">
                        <div class="col-lg-3 case_status" id="0" style="cursor: pointer;">
                            <div class="d-flex p-3 bg-primary text-white" style="display: flex;">
                                <div class="box icons-home">
                                    <h4><i class="far fa-list-alt"></i></h4>

                                </div>
                                <div class="box num-ber">
                                    <h3><?php echo $Data; ?></h3>
                                    <h6>New Case</h6>
                                </div>
                            </div>
                        </div>
                        <?php
                        $query2 = "SELECT * FROM `cases` WHERE `created_by`='$user_id' AND `status`='1'";
                        $execute2 = mysqli_query($conn, $query2);
                        $Data2 = mysqli_num_rows($execute2);
                        ?>
                        <div class="col-lg-3 case_status" id="1" style="cursor: pointer;">
                            <div class="d-flex p-3 bg-warning text-white" style="display: flex;">
                                <div class="box icons-home">
                                    <h4><i class="far fa-list-alt"></i></h4>

                                </div>
                                <div class="box num-ber">
                                    <h3><?php echo $Data2; ?></h3>
                                    <h6>Open Case</h6>
                                </div>
                            </div>
                        </div>
                        <?php
                        $query3 = "SELECT * FROM `cases` WHERE `created_by`='$user_id' AND `status`='2'";
                        $execute3 = mysqli_query($conn, $query3);
                        $Data3 = mysqli_num_rows($execute3);
                        ?>
                        <div class="col-lg-3 case_status" id="2" style="cursor: pointer;">
                            <div class="d-flex p-3 bg-info text-white" style="display: flex;">
                                <div class="box icons-home">
                                    <h4><i class="far fa-list-alt"></i></h4>

                                </div>
                                <div class="box num-ber">
                                    <h3><?php echo $Data3; ?></h3>
                                    <h6>Processing Case</h6>
                                </div>
                            </div>
                        </div>
                        <?php
                        $query4 = "SELECT * FROM `cases` WHERE `created_by`='$user_id' AND `status`='3'";
                        $execute4 = mysqli_query($conn, $query4);
                        $Data4 = mysqli_num_rows($execute4);
                        ?>
                        <div class="col-lg-3 case_status" id="3" style="cursor: pointer;">
                            <div class="d-flex p-3 bg-success text-white" style="display: flex;">
                                <div class="box icons-home">
                                    <h4><i class="far fa-list-alt"></i></h4>
                                </div>
                                <div class="box num-ber">
                                    <h3><?php echo $Data4; ?></h3>
                                    <h6>Completed Case</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<!--                <div class="col-lg-12">
                    <p class="text-center" style="font-size: 14px;">© 2021 MRR LCC Legal, all rights reserved. Designed by <a  href="#" style="text-decoration: none;">Timeminsolutions.com</a></p>
                </div>-->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#01').addClass('active');

        $('.case_status').click(function () {
            var case_status = $(this).attr('id');
            window.location.href = "case-management.php?status=" + case_status;
        });
    </script>
    <?php include("include/bottomscript.php"); ?>
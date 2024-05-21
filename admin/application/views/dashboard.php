<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('topscript'); ?>
    <style type="text/css">
        body{
            overflow:hidden;
            height:100vh;
            background:#000;
        }
        #wrapper{

            height:100vh;
            position:relative;
        }
        #wrapper:before{
            background:#03234C !important;
            width:100%;
            height:100%;
            position:absolute;
            top:0px;
            left:0px;
            content:'';
            opacity:.8;
        }
        .gradient-bloody{
            background:linear-gradient(45deg, #ffbd04, #fedc35)!important;
            box-shadow:  20px 20px 60px #080808, -20px -20px 60px #2b2b2b
        }
        #txt{
            color:#fff;
            font-weight:bold;
            font-size:20px;
        }
        h3,h5{
            color:#fff;
            font-weight:bold;
            text-transform:uppercase;
        }
        hr{
            border-top:1px solid #282a2b;
        }
        .source{
            position: absolute;
            bottom: 0px;
            left: 240px;
            width: 83%;
            padding: 15px;
            text-align: right;
        }
        .source p{
            color:#ddd;
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
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5>Welcome back</h5>
                            <h3><i class="fas fa-tachometer-alt"></i> Dashboard</h3>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="container-fluid">
                    <?php
                    $query = $this->db->get('customers');
                    $total_customers = $query->num_rows();

                    $query2 = $this->db->get('cases');
                    $cases = $query2->result_array();
                    $new_cases = [];
                    $open_cases = [];
                    $processing_cases = [];
                    $completed_cases = [];
                    for ($index = 0; $index < count($cases); $index++) {
                        if ($cases[$index]['status'] === '0') {
                            $new_cases[] = $cases[$index]['status'];
                        } elseif ($cases[$index]['status'] === '1') {
                            $open_cases[] = $cases[$index]['status'];
                        } elseif ($cases[$index]['status'] === '2') {
                            $processing_cases[] = $cases[$index]['status'];
                        } elseif ($cases[$index]['status'] === '3') {
                            $completed_cases[] = $cases[$index]['status'];
                        }
                    }
                    ?>
                    <div class="row">
                        <!--<div class="col-12 col-lg-6 col-xl-3"></div>-->
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card gradient-scooter">
                                <a href="<?php echo BEGIN_PATH; ?>/customers">  
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="text-white">Customers</p>
                                                <h4 class="text-white line-height-5"><?php echo $total_customers; ?></h4>
                                            </div>
                                            <div class="w-circle-icon rounded-circle border border-white">
                                                <i class="zmdi zmdi-accounts-alt text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card gradient-scooter">
                                <a href="<?php echo BEGIN_PATH; ?>/cases">  
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="text-white">Cases</p>
                                                <h4 class="text-white line-height-5"><?php echo count($cases); ?></h4>
                                            </div>
                                            <div class="w-circle-icon rounded-circle border border-white">
                                                <i class="zmdi zmdi-accounts-alt text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                        </div>
                        <!--<div class="col-12 col-lg-6 col-xl-3"></div>-->
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card gradient-scooter" style="background: linear-gradient(45deg, #fe4ff1 0%, #4a00fe 100%) !important;">
                                <a href="<?php echo BEGIN_PATH; ?>/cases/casestatus?status=0">  
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="text-white">New Cases</p>
                                                <h4 class="text-white line-height-5"><?php echo count($new_cases); ?></h4>
                                            </div>
                                            <div class="w-circle-icon rounded-circle border border-white">
                                                <i class="fas fa-folder-plus text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card gradient-scooter" style="background: linear-gradient(45deg, #fec04f 0%, #fe5200 100%) !important;">
                                <a href="<?php echo BEGIN_PATH; ?>/cases/casestatus?status=1">  
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="text-white">Open Cases</p>
                                                <h4 class="text-white line-height-5"><?php echo count($open_cases); ?></h4>
                                            </div>
                                            <div class="w-circle-icon rounded-circle border border-white">
                                                <i class="fas fa-folder-open text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card gradient-scooter" style="background: linear-gradient(45deg, #0e1296 0%, #11035d 100%) !important;">
                                <a href="<?php echo BEGIN_PATH; ?>/cases/casestatus?status=2">  
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="text-white">Processing Cases</p>
                                                <h4 class="text-white line-height-5"><?php echo count($processing_cases); ?></h4>
                                            </div>
                                            <div class="w-circle-icon rounded-circle border border-white">
                                                <i class="far fa-edit text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card gradient-scooter" style="background: linear-gradient(45deg, #02a964 0%, #22da01 100%) !important;">
                                <a href="<?php echo BEGIN_PATH; ?>/cases/casestatus?status=3">  
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <p class="text-white">Completed Cases</p>
                                                <h4 class="text-white line-height-5"><?php echo count($completed_cases); ?></h4>
                                            </div>
                                            <div class="w-circle-icon rounded-circle border border-white">
                                                <i class="fas fa-clipboard-check text-white"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 source">
                    
                </div>
            </div>
        </div>
        <script src="<?php echo BEGIN_PATH; ?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo BEGIN_PATH; ?>/assets/js/popper.min.js"></script>
        <script src="<?php echo BEGIN_PATH; ?>/assets/js/bootstrap.min.js"></script>
        <!-- simplebar js -->
        <script src="<?php echo BEGIN_PATH; ?>/assets/plugins/simplebar/js/simplebar.js"></script>
        <!-- waves effect js -->
        <script src="<?php echo BEGIN_PATH; ?>/assets/js/waves.js"></script>
        <!-- sidebar-menu js -->
        <script src="<?php echo BEGIN_PATH; ?>/assets/js/sidebar-menu.js"></script>
        <!-- Custom scripts -->
        <script src="<?php echo BEGIN_PATH; ?>/assets/js/app-script.js"></script>
    </body>
</html>
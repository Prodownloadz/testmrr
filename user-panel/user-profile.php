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
<style type="text/css">
    td {
        position: relative;
    }
    .viewpopup {
        color: #ffffff;
        background: #0d6efd;
        position: absolute;
        top: 0px;
        right: 0px;
        font-size: 10px;
        text-decoration: none;
        padding: 3px 4px;
    }
    th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }
    div.container {
        width: 80%;
    }
</style>
<body>
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
                            <li class="breadcrumb-item">Profile Management</li>
                        </ol>
                    </nav>
                </div>
                                                                                                                                    
                <div class="col-lg-12 page-padding card p-4 user_profile_info">
                    <?php
                        
                        /*$query= "SELECT * FROM `customers` WHERE `id` = '".$_SESSION['user_id']."'";
                        $retval = mysqli_query( $conn, $query );
                        while ($arr = mysqli_fetch_array($retval)) {
                            echo $arr['id'];
                        }*/
                        
                    ?>
                    
                    <div class="col-lg-12 mt-2 table-responsive">
                        <table class="table table-striped table-bordered" style="width: 100%">
                            <tbody>
                                <?php
                                    $query= "SELECT * FROM `customers` WHERE `id` = '".$_SESSION['user_id']."'";
                                    $retval = mysqli_query( $conn, $query );
                                    while ($arr = mysqli_fetch_array($retval)) {
                                ?>    
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $arr['name'];?></td>
                                    </tr> 
                                    <tr>
                                        <td>Email</td>
                                        <td><?php echo $arr['email'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Company Name</td>
                                        <td><?php echo $arr['company_name'];?></td>
                                    </tr>
                                    <tr>
                                        <td>State</td>
                                        <td><?php echo $arr['state'];?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><?php echo $arr['username'];?></td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                        
                        
                        <div class="btn-group" style="float: right;">
                            <a href="edit-profile.php" class="btn btn-primary"><i class="fal fa-edit"></i> Edit Profile</a>
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
                
                
            </div>
        </div>
    </div>
    <script src="js/edit-profile.js?ver=1.4" type="text/javascript"></script>
    <?php include("include/bottomscript.php"); ?>
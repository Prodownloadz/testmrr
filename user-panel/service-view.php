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
    body{
        background:#03234C;
    }
    h4{
        color:#fff;
    }
    h5,h4{
        text-align:center;
        font-weight:bold;
    }
    h5{
        margin-top:20px;
        border-bottom:1px solid #ddd;
        padding-bottom:15px;
    }
    ul{
        list-style-type:none;
        margin:0px;
        padding:0px;
    }
    ul li{
        text-align:center;
    }
    .card{
        margin-top:15px;
        margin-bottom:15px;
        background:#fff;
    }
</style>
<div class="container">
    <div class="col-lg-12 p-4">
        <h4 class="text-center">Requested Service</h4>
        <br>
        <?php
        $case_id = $_GET['cid'];
        $query = "SELECT * FROM `cases` WHERE id='$case_id'";
        $execute = mysqli_query($conn, $query);
        $Data = mysqli_fetch_array($execute);
        $review_services = json_decode($Data['review_services']);
        $add_on_services = json_decode($Data['add_on_services']);
        $medical_charts = json_decode($Data['medical_charts']);
        ?>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card p-3">
                    <h5>Review Services</h5>
                    <ul>
                        <?php for ($index = 0; $index < count($review_services); $index++) { ?>
                            <li><?php echo $review_services[$index]; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card p-3">
                    <h5>Add on Services</h5>
                    <ul>
                        <?php for ($index = 0; $index < count($add_on_services); $index++) { ?>
                            <li><?php echo $add_on_services[$index]; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card p-3">
                    <h5>Medical Charts</h5>
                    <ul>
                        <?php for ($index = 0; $index < count($medical_charts); $index++) { ?>
                            <li><?php echo $medical_charts[$index]; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
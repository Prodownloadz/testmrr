<?php
session_start();
if (!isset($_SESSION['mrr-user-loggedin'])) {
    header('location: ./');
}
$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['name'];
include("include/topscript.php");
include('include/config.php');
$status = [['New', 'primary'], ['Open', 'warning'], ['Processing', 'info'], ['Completed', 'success']];
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
            if (isset($_GET['status'])) {
                $case_status = $_GET['status'];
                $query = "SELECT * FROM `cases` WHERE `created_by`='$user_id' AND `status`='$case_status'";
            } else {
                $query = "SELECT * FROM `cases` WHERE `created_by`='$user_id'";
            }
            $execute = mysqli_query($conn, $query);
            ?>
            <div class="col-lg-10" id="main-page-wapper">
                <div class="col-lg-12 breadcrumb-holder p-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Case Management</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-12 page-padding card pb-4">
                    <form>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Case Type</label>
                                    <div class="form-icon-group">
                                        <span><i class="fal fa-layer-group"></i></span>
                                        <select class="case_type form-control">
                                            <option value="">Choose any one</option>
                                            <option value="Personal Injury">Personal Injury</option>
                                            <option value="Mass Tort">Mass Tort</option>
                                            <option value="Class Actions">Class Actions</option>
                                            <option value="Medical Malpractice">Medical Malpractice</option>
                                            <option value="Workers Compensation">Workers Compensation</option>
                                            <option value="Nursing Home Abuse">Nursing Home Abuse</option>
                                            <option value="Product Liability and Others">Product Liability and Others</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <i class="fal fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Case Name</label>
                                    <div class="form-icon-group">
                                        <span><i class="fal fa-layer-group"></i></span>
                                        <select class="case_name form-control">
                                            <option value="">Choose case name</option>
                                            <?php while ($Data = mysqli_fetch_array($execute)) { ?>
                                                <option value="<?php echo $Data['case_name']; ?>"><?php echo $Data['case_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                        <i class="fal fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="status">Case Status</label>
                                    <div class="form-icon-group">
                                        <span><i class="fal fa-layer-group"></i></span>
                                        <select class="case_status form-control">
                                            <option value="">Choose any one</option>
                                            <option value="0">New</option>
                                            <option value="1">Open</option>
                                            <option value="2">Processing</option>
                                            <option value="3">Completed</option>
                                        </select>
                                        <i class="fal fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="Sort By">Sort by</label>
                                    <div class="form-icon-group">
                                        <span><i class="fal fa-layer-group"></i></span>
                                        <select class="sort_by form-control">
                                            <option value="ASC">Ascending</option>
                                            <option value="DESC">Descending</option>
                                        </select>
                                        <i class="fal fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="text-align: right;">
                                <div class="btn-group">
                                    <button class="case-filter-btn btn btn-primary" type="button" value="<?php echo $user_id; ?>"><i class="far fa-search"></i> Search</button>
                                    <button class="cancel-btn btn btn-danger" type="reset"><i class="fal fa-times"></i> Cancel</button>
                                </div>
                                <button class="new-case-manage btn btn-primary" style="margin-left: 10px;"><a href="add-new-case.php" style="text-decoration: none; color: white;">Add New Case</a></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-12 mt-2 table-responsive">
                    <table class="table table-striped table-bordered casesTable" style="width: 100%">
                        <thead>
                            <tr>
                                <td>S.No</td>
                                <th>Contact Person</th>
                                <th>Contact Number</th>
                                <th>Case Name</th>
                                <th>Case Type</th>
                                <th>Status</th>
                                <th>Delivery File</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="case-details">
                            <?php
                            if (isset($_GET['status'])) {
                                $case_status = $_GET['status'];
                                $query = "SELECT * FROM `cases` WHERE `created_by`='$user_id' AND `status`='$case_status'";
                            } else {
                                $query = "SELECT * FROM `cases` WHERE `created_by`='$user_id'";
                            }
                            $execute = mysqli_query($conn, $query);
                            $count = 0;
                            while ($Data = mysqli_fetch_array($execute)) {
                                ?>
                                <tr>
                                    <td><?php echo ($count + 1); ?></td>
                                    <td><?php echo $Data['contact_person']; ?></td>
                                    <td><?php echo $Data['contact_number']; ?></td>
                                    <td><?php echo $Data['case_name']; ?></td>
                                    <td><?php echo $Data['case_type']; ?></td>
                                    <td><span class="badge <?php echo 'bg-' . $status[$Data['status']][1]; ?>"><?php echo $status[$Data['status']][0]; ?></span></td>
                                    <td>
                                        <?php
                                        $case_id = $Data['id'];
                                        $query3 = "SELECT * FROM `output_files` WHERE `case_id`='$case_id'";
                                        $execute3 = mysqli_query($conn, $query3);
                                        $count_3 = 0;
                                        while ($Data3 = mysqli_fetch_array($execute3)) {
                                            ?>
                                            <a href="<?php echo $Data3['share_link']; ?>" target="_blank"><?php echo $Data3['output_files']; ?></a><br />
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="case-details.php?cid=<?php echo $Data['id']; ?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                        <?php // if ($Data['status'] === '0' || $Data['status'] === '1') { ?>
                                        <!--<button class="case-remove-btn btn btn-danger" id="<?php echo $Data['id']; ?>"><i class="far fa-trash"></i></button>-->
                                            <?php // } ?>
                                    </td>
                                </tr>
                                <?php
                                $count++;
                            }
                            ?>
                        </tbody>
                    </table> 
                </div>
                <!--                <div class="col-lg-12">
                                    <p class="text-center" style="font-size: 14px;">© 2021 MRR LCC Legal, all rights reserved. Designed by <a  href="#" style="text-decoration: none;">Timeminsolutions.com</a></p>
                                </div>-->
            </div>
        </div>
    </div>
    <script src="js/case-management.js?ver=1.2" type="text/javascript"></script>
    <?php include("include/bottomscript.php"); ?>
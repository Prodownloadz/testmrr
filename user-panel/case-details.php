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
<!--<link href="css/dropzone.css" rel="stylesheet" type="text/css"/>-->
<style type="text/css">
    .mt-20 {
        margin-top: 10px;
    }

    .progress {
        position: relative;
        height: 20px;
        margin-bottom: 20px;
    }

    .progress-bar-striped.bg-success {
        background-color: #28a745 !important
    }

    .progress-bar {
        display: block;
        font-size: 12px;
        line-height: 20px;
    }

    .addcase {
        background: #06B7C2;
    }

    .dropzone {
        border: 2px dashed #0b91af;
        /*#377dff*/
        border-radius: 5px;
        background: #f8fafd;
        min-height: 150px;
        padding: 20px 20px;
    }

    .dropzone i {
        font-size: 3rem;
    }

    .dropzone .dz-message {
        color: rgba(0, 0, 0, .54);
        font-weight: 500;
        font-size: initial;
        text-transform: capitalize;
    }

    .badge-class {
        cursor: pointer;
        padding: 6px 10px;
        font-size: 14px;
        background-color: #0f3057;
        font-weight: 500;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .upload-case-files-btn+.upload_files_02_error {
        clear: both;
        width: 100%;
        float: left;
        position: relative;
    }

    .dz-preview {
        min-width: 130px !important;
        height: 120px;
        border: 1px solid #e7e7e7;
        padding: 5px;
        border-radius: 20px;
        margin: 10px;
        background: #dbdbdb;
        max-width: 130px;
    }

    .progress-bar {
        background-color: #007bff;
    }

    .dz-image {
        position: absolute;
        width: 120px;
        height: 120px;
    }

    .dz-details {
        max-width: 120px;
        overflow: hidden;
        text-align: center;
    }

    .dz-success-mark {
        font-size: 25px;
        color: #4CAF50;
        text-align: center;
    }

    .dz-error-mark {
        font-size: 25px;
        color: #F44336;
        text-align: center;
    }

    .dz-filename {
        overflow: hidden;
        height: 25px;
        display: inline-block;
    }

    .dz-error-mark,
    .dz-success-mark {
        width: 50%;
        float: left;
        margin-top: 10px;
    }

    .dz-error-mark i,
    .dz-success-mark i {
        font-size: 1.5rem;
    }

    .dz-details {
        margin-top: 10px;
    }

    .dz-preview .dz-details span {
        color: #377dff;
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
                            <li class="breadcrumb-item"><a href="case-management.php">Case Management</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Case Details</li>
                        </ol>
                    </nav>
                </div>
                <?php
                $case_id = $_GET['cid'];
                $query = "SELECT * FROM `cases` WHERE id='$case_id'";
                $execute = mysqli_query($conn, $query);
                $Data = mysqli_fetch_array($execute);
                $review_services = json_decode($Data['review_services']);
                $add_on_services = json_decode($Data['add_on_services']);
                $medical_charts = json_decode($Data['medical_charts']);
                ?>
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <h5 class="text-dark">Case Name : <?php echo $Data['case_name'] ?></h5>
                    </div>
                    <div class="row mt-4">
                        <div class="tab">
                            <button class="tablinks" onclick="openCity(event, 'casedetails')" id="defaultOpen">Case Details</button>
                            <button class="tablinks" onclick="openCity(event, 'casefiles')">Case Files</button>
                            <button class="tablinks" onclick="openCity(event, 'service')">Service Requested</button>
                            <button class="tablinks" onclick="openCity(event, 'outputdelivery')">Delivery Files</button>
                        </div>
                        <div id="casedetails" class="tabcontent">
                            <div class="col-lg-12 page-padding">
                                <div class="add-record mt-5 mb-5" style="border: 1px solid #ddd; padding: 20px;">
                                    <div class="row">
                                        <div class="col-lg-6 page-padding">
                                            <h4>Case Requestor Details</h4>
                                            <div class="form-group">
                                                <label>Attorney or Requestor Name <span class="error">*</span></label>
                                                <div class="form-icon-group">
                                                    <span><i class="fas fa-user-tie"></i></span>
                                                    <input type="text" class="attorney_name form-control" placeholder="Enter attorney name" value="<?php echo $Data['attorney_name']; ?>">
                                                </div>
                                                <span class="attorney_name_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter attorney / requestor name *</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Contact Person Name <span class="error">*</span></label>
                                                <div class="form-icon-group">
                                                    <span><i class="far fa-user"></i></span>
                                                    <input type="text" class="contact_person form-control" placeholder="Enter contact person name" value="<?php echo $Data['contact_person']; ?>">
                                                </div>
                                                <span class="contact_person_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter contact person name *</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 page-padding">
                                            <br>
                                            <div class="form-group">
                                                <label>Law Firm Name</label>
                                                <div class="form-icon-group">
                                                    <span><i class="fas fa-user-tie"></i></span>
                                                    <input type="text" class="law_firm_name form-control" placeholder="Enter law firm name" value="<?php echo $Data['law_firm_name']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Contact Number <span class="error">*</span></label>
                                                <div class="form-icon-group">
                                                    <span><i class="far fa-user"></i></span>
                                                    <input type="text" class="contact_number form-control" placeholder="Enter contact number" value="<?php echo $Data['contact_number']; ?>">
                                                </div>
                                                <span class="contact_number_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter contact number *</span>
                                                <span class="contact_number_invalid_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter valid contact number *</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 page-padding">
                                            <div class="form-group">
                                                <label>Email
                                                    <!--<span class="error">*</span>-->
                                                </label>
                                                <div class="form-icon-group">
                                                    <span><i class="far fa-user"></i></span>
                                                    <input type="email" class="email form-control" placeholder="Enter Email Address" value="<?php echo $Data['email']; ?>">
                                                </div>
                                                <span class="email_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter your email address *</span>
                                                <span class="email_valid_error" style="font-size: 12px; margin-top: 5px; color: red; display: none;">Please enter your valid email address</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 page-padding">
                                            <h4>Case Details</h4>
                                            <div class="form-group">
                                                <label>Case Name <span class="error">*</span> </label>
                                                <div class="form-icon-group">
                                                    <span><i class="far fa-user"></i></span>
                                                    <input type="text" class="case_name form-control" placeholder="Enter case name" value="<?php echo $Data['case_name']; ?>">
                                                </div>
                                                <span class="case_name_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter case name *</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Case Type <span class="error">*</span> </label>
                                                <div class="form-icon-group">
                                                    <span><i class="fal fa-layer-group"></i></span>
                                                    <select class="case_type form-control">
                                                        <option value="">Choose any one</option>
                                                        <option value="Personal Injury" <?php echo $Data['case_type'] === 'Personal Injury' ? 'selected' : ''; ?>>Personal Injury</option>
                                                        <option value="Mass Tort" <?php echo $Data['case_type'] === 'Mass Tort' ? 'selected' : ''; ?>>Mass Tort</option>
                                                        <option value="Class Actions" <?php echo $Data['case_type'] === 'Class Actions' ? 'selected' : ''; ?>>Class Actions</option>
                                                        <option value="Medical Malpractice" <?php echo $Data['case_type'] === 'Medical Malpractice' ? 'selected' : ''; ?>>Medical Malpractice</option>
                                                        <option value="Workers Compensation" <?php echo $Data['case_type'] === 'Workers Compensation' ? 'selected' : ''; ?>>Workers Compensation</option>
                                                        <option value="Nursing Home Abuse" <?php echo $Data['case_type'] === 'Nursing Home Abuse' ? 'selected' : ''; ?>>Nursing Home Abuse</option>
                                                        <option value="Product Liability and Others" <?php echo $Data['case_type'] === 'Product Liability and Others' ? 'selected' : ''; ?>>Product Liability and Others</option>
                                                        <option value="Others" <?php echo $Data['case_type'] === 'Others' ? 'selected' : ''; ?>>Others</option>
                                                    </select>
                                                    <i class="fal fa-angle-down"></i>
                                                </div>
                                                <span class="case_type_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please select case type *</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 page-padding">
                                            <br>
                                            <div class="form-group">
                                                <label>Case Description <span class="error">*</span> </label>
                                                <div class="form-icon-group">
                                                    <span><i class="fal fa-sticky-note"></i></span>
                                                    <textarea class="case_description form-control" rows="2" placeholder="Enter case overview"><?php echo $Data['case_description']; ?></textarea>
                                                </div>
                                                <span class="case_description_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please enter case description *</span>
                                            </div>
                                            <div class="form-group">
                                                <label>Expected Delivery Date</label>
                                                <div class="form-icon-group">
                                                    <span><i class="fal fa-calendar-alt"></i></span>
                                                    <input class="expected_delivery_date form-control" id="datepicker" value="<?php echo $Data['expected_delivery_date']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($Data['status'] === '0' || $Data['status'] === '1') { ?>
                                        <div class="row">
                                            <div class="col-lg-12 page-padding">
                                                <div class="btn-group" style="float: right;">
                                                    <button class="update-case-detail-1 btn btn-primary" type="button" value="<?php echo $case_id; ?>"><i class="fal fa-save"></i> Save</button>
                                                    <button class="cancel-btn btn btn-danger" type="reset"><i class="fal fa-times"></i> Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div id="casefiles" class="tabcontent">
                            <div class="col-lg-12">
                                <div class="add-records">
                                    <?php if ($Data['status'] !== '3') { ?>
                                        <div class="row">
                                            <div class="col-lg-6  mt-3">
                                                <button class="btn btn-primary" id="add-btn">Add Additional Records</button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="file-upload mt-3 mb-3 card p-4">
                                        <div class="form-group">
                                            <label>Additional Information</label>
                                            <div class="form-icon-group">
                                                <textarea class="additional_info form-control" placeholder="Enter additional info" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <ul>
                                                <li>1. Hey! You are here for uploading your files.</li>
                                                <li>2. Use this widget! The files can be browsed or dropped. Please select the files if you have bunch of files when you are try browsing.</li>
                                                <li>3. Then, Click upload.</li>
                                                <li>4. Do you have any trouble in uploading the files below?</li>
                                                <li>
                                                    5. You can upload files using few more options as follows : <br />
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://workdrive.zohopublic.in/collection/th23wbb05a91450c84e66877666f7bcbda5bc/external" style="color: #47b050; text-decoration: underline;" target="_blank">MRR Client Space A - Upload Your Files</a>
                                                    <br />
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://www.dropbox.com/request/0OfBN1E1CVHnni2kVpJ1" style="color: #47b050; text-decoration: underline; line-height: 40px;" target="_blank">MRR Client Space B  - Upload Your Files </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Additional File</label>
                                            <!--<div class="form-icon-group">
                                                <input type="file" class="additional_files form-control" name="additional_files[]" id="additional_files" multiple>
                                            </div>-->
                                            <!--                                            <div class="additional_files dropzone dropzone-area" id="additional_files">
                                                                                            <form action="#">
                                                                                                <div class="dz-message">
                                                                                                    <i class="fas fa-cloud-upload" style="color: #0b91af;"></i><br>#377dff
                                                                                                    Drop Images Here Or Click To Upload <br />
                                                                                                    <small>Maximum file upload size 1.5GB / 1536MB</small>
                                                                                                </div>
                                                                                                <div class="fallback">
                                                                                                    <input name="additional_files" type="file" />
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        <span class="upload_files_error collapse clearfix" style="font-size: 12px; color: red; margin-top: 5px;">Please upload files *</span>
                                                                                        <span class="upload-case-files-btn badge badge-class" style="cursor: pointer; padding: 6px 10px; font-size: 14px;"><i class="fa fa-cloud-upload"></i> Upload Case Files</span>
                                                                                        <span class="upload_files_02_error collapse clearfix" style="font-size: 12px; color: red;">Please upload case files after you've submit your case additional records *</span>
                                                                                        <div class="progress mt-20" style="display: none;">
                                                                                            <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                                                                                        </div>-->
                                            <div class="form-group">
                                              <iframe src="https://rrrhealthtechllc.sharefile.com/remoteupload/2ff1311b-097d-4662-9b98-4e251c6ac10a" frameborder="0" width="1000px" height="500px" ></iframe>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-3">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>File Name</th>
                                            <th>Additional Info</th>
                                            <th>Uploaded On</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query2 = "SELECT * FROM `case_files` WHERE `case_id`='$case_id'";
                                        $execute2 = mysqli_query($conn, $query2);
                                        $count = 0;
                                        while ($Data2 = mysqli_fetch_array($execute2)) {
                                        ?>
                                            <tr>
                                                <td><?php echo ($count + 1); ?></td>
                                                <td><a href="<?php echo $Data2['share_link']; ?>" target="_blank"><?php echo $Data2['case_files']; ?></a></td>
                                                <td><?php echo $Data2['additional_info']; ?></td>
                                                <td><?php echo $Data2['created_on']; ?></td>
                                                <td>
                                                    <a class="btn btn-success" href="<?php echo $Data2['share_link']; ?>" target="_blank"><i class="far fa-arrow-alt-to-bottom"></i></a>
                                                    <?php if ($Data['status'] === '0' || $Data['status'] === '1') { ?>
                                                        <button class="case-file-remove-btn btn btn-danger" id="<?php echo $Data2['case_id'] ?>" value="<?php echo $Data2['id']; ?>"><i class="far fa-trash-alt"></i></button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $count++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="service" class="tabcontent">
                            <div class="col-lg-12 page-padding">
                                <div class="row" style="margin-top: 30px;">
                                    <div class="col-lg-12">
                                        <span class="service_request_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please select atleast one services *</span>
                                    </div>
                                    <div class="col-lg-4">
                                        <b>Review Services</b>
                                        <span class="review_services_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please select atleast one review services *</span>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="review_services form-check-input" type="checkbox" value="Medical Chronology" name="review_services" id="check-11" <?php echo in_array("Medical Chronology", $review_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-11">Medical Chronology</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="review_services form-check-input" type="checkbox" value="Narrative Summary" name="review_services" id="check-12" <?php echo in_array("Narrative Summary", $review_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-12">Narrative Summary</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="review_services form-check-input" type="checkbox" value="Demand Letter" name="review_services" id="check-13" <?php echo in_array("Demand Letter", $review_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-13">Demand Letter</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="review_services form-check-input" type="checkbox" value="Deposition Summary" name="review_services" id="check-14" <?php echo in_array("Deposition Summary", $review_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-14">Deposition Summary</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="review_services form-check-input" type="checkbox" value="Expert Medical Opinion" name="review_services" id="check-15" <?php echo in_array("Expert Medical Opinion", $review_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-15">Expert Medical Opinion</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="review_services form-check-input" type="checkbox" value="Billing Summary" name="review_services" id="check-16" <?php echo in_array("Billing Summary", $review_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-16">Billing Summary</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <b>Add on Services</b>
                                        <span class="add_on_services_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please select atleast one add on services *</span>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="add_on_services form-check-input" type="checkbox" value="Bookmarks" name="add_on_services" id="check-21" <?php echo in_array("Bookmarks", $add_on_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-21">Bookmarks</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="add_on_services form-check-input" type="checkbox" value="Hyperlink" name="add_on_services" id="check-22" <?php echo in_array("Hyperlink", $add_on_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-22">Hyperlink</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="add_on_services form-check-input" type="checkbox" value="PDF Sorting and Merging" name="add_on_services" id="check-23" <?php echo in_array("PDF Sorting and Merging", $add_on_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-23">PDF Sorting and Merging</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="add_on_services form-check-input" type="checkbox" value="Med Interpretation" name="add_on_services" id="check-24" <?php echo in_array("Med Interpretation", $add_on_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-24">Med Interpretation</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="add_on_services form-check-input" type="checkbox" value="Missing Records Identification" name="add_on_services" id="check-25" <?php echo in_array("Missing Records Identification", $add_on_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-25">Missing Records Identification</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="add_on_services form-check-input" type="checkbox" value="Jury Questionnaire" name="add_on_services" id="check-26" <?php echo in_array("Jury Questionnaire", $add_on_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-26">Jury Questionnaire</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="add_on_services form-check-input" type="checkbox" value="Plaintiff Fact Sheet" name="add_on_services" id="check-27" <?php echo in_array("Plaintiff Fact Sheet", $add_on_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-27">Plaintiff Fact Sheet</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="add_on_services form-check-input" type="checkbox" value="Provider List" name="add_on_services" id="check-28" <?php echo in_array("Provider List", $add_on_services) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-28">Provider List</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <b>Medical Charts</b>
                                        <span class="medical_charts_error" style="font-size: 12px; color: red; margin-top: 5px; display: none;">Please select atleast one medical charts *</span>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="medical_charts form-check-input" type="checkbox" value="Comparative Chart" name="medical_charts" id="check-31" <?php echo in_array("Comparative Chart", $medical_charts) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-31">Comparative Chart</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="medical_charts form-check-input" type="checkbox" value="Treatment Chart" name="medical_charts" id="check-32" <?php echo in_array("Treatment Chart", $medical_charts) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-32">Treatment Chart</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="medical_charts form-check-input" type="checkbox" value="Pain & Suffering Chart" name="medical_charts" id="check-33" <?php echo in_array("Pain & Suffering Chart", $medical_charts) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-33">Pain & Suffering Chart</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="medical_charts form-check-input" type="checkbox" value="Pain & Medication Graph" name="medical_charts" id="check-34" <?php echo in_array("Pain & Medication Graph", $medical_charts) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-34">Pain & Medication Graph</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="medical_charts form-check-input" type="checkbox" value="Accident Timeline" name="medical_charts" id="check-35" <?php echo in_array("Accident Timeline", $medical_charts) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-35">Accident Timeline</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="medical_charts form-check-input" type="checkbox" value="List of injuries" name="medical_charts" id="check-36" <?php echo in_array("List of injuries", $medical_charts) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-36">List of injuries</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="medical_charts form-check-input" type="checkbox" value="Pre-existing injuries" name="medical_charts" id="check-37" <?php echo in_array("Pre-existing injuries", $medical_charts) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-37">Pre-existing injuries</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="medical_charts form-check-input" type="checkbox" value="Pain Score Chart" name="medical_charts" id="check-38" <?php echo in_array("Pain Score Chart", $medical_charts) ? 'checked' : ''; ?>>
                                                <label class="form-check-label" for="check-38">Pain Score Chart</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($Data['status'] === '0' || $Data['status'] === '1') { ?>
                                        <div class="col-lg-12 page-padding">
                                            <div class="btn-group" style="float: right;">
                                                <button class="update-case-detail-3 btn btn-primary" type="button" value="<?php echo $case_id; ?>"><i class="fal fa-save"></i> Save</button>
                                                <button class="cancel-btn btn btn-danger" type="reset"><i class="fal fa-times"></i> Cancel</button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="outputdelivery" class="tabcontent">
                        <div class="col-lg-12" style="margin-top: 30px;">
                            <div class="add-records">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Delivery date</th>
                                                <th>Delivery Files</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query3 = "SELECT * FROM `output_files` WHERE `case_id`='$case_id'";
                                            $execute3 = mysqli_query($conn, $query3);
                                            $count_3 = 0;
                                            while ($Data3 = mysqli_fetch_array($execute3)) {
                                            ?>
                                                <tr>
                                                    <td><?php ($count_3 + 1) ?></td>
                                                    <td><?php echo date("d-m-Y", strtotime($Data3['created_on'])); ?></td>
                                                    <td><?php echo $Data3['output_files']; ?></td>
                                                    <td>
                                                        <a class="btn btn-success" href="<?php echo $Data3['share_link']; ?>" target="_blank"><i class="far fa-arrow-alt-to-bottom"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    <div class="col-lg-12">
            <p class="text-center" style="font-size: 14px;">© 2021 MRR LCC Legal, all rights reserved. Designed by <a  href="#" style="text-decoration: none;">Timeminsolutions.com</a></p>
        </div>-->
    <script src="js/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="js/jquery.blockUI.js" type="text/javascript"></script>
    <!--<script src="js/dropzone.js" type="text/javascript"></script>-->
    <script src="../js/dropbox-api/Dropbox-sdk.js" type="text/javascript"></script>
    <script src="js/case-details.js?version=<?php echo uniqid(); ?>" type="text/javascript"></script>
    <script type="text/javascript">
        /* Dropbox File Upload */

        var dropZone = document.getElementById('dropzone');

        dropZone.addEventListener('dragover', function(e) {
            e.stopPropagation();
            e.preventDefault();
            e.dataTransfer.dropEffect = 'copy';
        });

        dropZone.addEventListener('drop', function(e) {
            e.stopPropagation();
            e.preventDefault();
            var files = e.dataTransfer.files;
            upload(files);
        });

        $('#dropzone').click(function(e) {
            e.preventDefault();
            if (!$(e.target).hasClass('cancel-upload')) {
                $('#upload_files').trigger('click');
            }
        });

        $('#upload_files').change(function(e) {
            var files = e.target.files;
            upload(files);
        });

        var dropboxToken = "3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT";
        var listupload = [];
        var filenames = [];
        var droppedfiles = 0;
        var uploadedfiles = 0;
        var cancelled = 0;

        function upload(files) {
            if (files.length) {
                $('.update-case-detail-2').attr('disabled', true);
                $('.dz-message').addClass('collapse');
            } else {
                $('.dz-message').removeClass('collapse');
            }

            droppedfiles = (droppedfiles * 1) + files.length;

            $.each(files, function(key, value) {
                $('.update-case-detail-2').attr('disabled', true);

                var file = value;

                var key_val = Math.floor(1000 + Math.random() * 9000);

                var _size = file.size;
                var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
                    i = 0;
                while (_size > 900) {
                    _size /= 1024;
                    i++;
                }
                var exactSize = (Math.round(_size * 100) / 100) + ' ' + fSExt[i];

                var preview = ' <div class="dz-preview" style="z-index:1" id="preview_' + key_val + '">\
        <div class="dz-image" style="z-index:-1"><img data-dz-thumbnail="" alt="" ></div>\
        <div class="dz-details">\
          <div class="dz-size"><span data-dz-size=""><strong>' + exactSize + '</strong> </span></div>\
          <div class="dz-filename"><span data-dz-name="">' + file.name + '</span></div>\
        </div>\
        <div class="dz-progress progress">\
          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" id="progressbar' + key_val + '" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">Uploading...</div>\
        </div>\
        <div class="dz-error-message"  style="display: none;"><span data-dz-errormessage=""></span></div>\
        <div class="dz-success-mark" id="success' + key_val + '" style="display: none;">\
         <i class="fa fa-check" aria-hidden="true"></i>\
        </div>\
        <div class="dz-error-mark dz-remove-btn-' + key_val + '" data-id="' + key_val + '" style="z-index: 999; display: none;">\
         <i class="fa fa-times-circle cancel-upload" aria-hidden="true" data-id="' + key_val + '" id="error' + key_val + '"></i>\
        </div>\
      </div>';

                $('.dropped-files').append(preview);

                const UPLOAD_FILE_SIZE_LIMIT = 150 * 1024 * 1024;
                var ACCESS_TOKEN = dropboxToken;
                var dbx = new Dropbox.Dropbox({
                    accessToken: ACCESS_TOKEN
                });

                if (file.size < UPLOAD_FILE_SIZE_LIMIT) { // File is smaller than 150 Mb - use filesUpload API
                    dbx.filesUpload({
                        path: '/Case-Files/' + file.name,
                        contents: file
                    }).then(function(response) {
                        $('.update-case-detail-2').attr('disabled', true);
                        if (response.status === 200) {
                            $('#progressbar' + key_val).closest('.progress').hide();
                            $('.dz-remove-btn-' + key_val).css('display', 'block');
                            $('#success' + key_val).show();

                            $('#error' + key_val).attr('data-filename', file.name);
                            $('.update-case-detail-2').attr('disabled', false);
                        }
                    });
                } else { // File is bigger than 150 Mb - use filesUploadSession* API
                    const maxBlob = 128 * 1000 * 1000; // 128Mb - Dropbox JavaScript API suggested max file / chunk size
                    var workItems = [];
                    var offset = 0;
                    while (offset < file.size) {
                        var chunkSize = Math.min(maxBlob, file.size - offset);
                        workItems.push(file.slice(offset, offset + chunkSize));
                        offset += chunkSize;
                    }
                    const task = workItems.reduce((acc, blob, idx, items) => {
                        if (idx === 0) {
                            // Starting multipart upload of file
                            return acc.then(function() {
                                return dbx.filesUploadSessionStart({
                                        close: false,
                                        contents: blob
                                    })
                                    .then(response => response.result.session_id);
                            });
                        } else if (idx < items.length - 1) {
                            // Append part to the upload session
                            return acc.then(function(sessionId) {
                                var cursor = {
                                    session_id: sessionId,
                                    offset: idx * maxBlob
                                };
                                return dbx.filesUploadSessionAppendV2({
                                    cursor: cursor,
                                    close: false,
                                    contents: blob
                                }).then(() => sessionId);
                            });
                        } else {
                            // Last chunk of data, close session
                            return acc.then(function(sessionId) {
                                var cursor = {
                                    session_id: sessionId,
                                    offset: file.size - blob.size
                                };
                                var commit = {
                                    path: '/Case-Files/' + file.name,
                                    mode: 'add',
                                    autorename: true,
                                    mute: false
                                };
                                return dbx.filesUploadSessionFinish({
                                    cursor: cursor,
                                    commit: commit,
                                    contents: blob
                                });
                            });
                        }
                    }, Promise.resolve());
                    task.then(function(result) {
                        $('.update-case-detail-2').attr('disabled', true);
                        if (result.status === 200) {
                            $('#progressbar' + key_val).closest('.progress').hide();
                            $('.dz-remove-btn-' + key_val).css('display', 'block');
                            $('#success' + key_val).show();

                            $('#error' + key_val).attr('data-filename', file.name);
                            $('.update-case-detail-2').attr('disabled', false);
                        }
                    });
                }
            });
        }

        $(document).on('click', '.cancel-upload', function(e) {
            var key = $(this).data('id');
            var file_name = $('#error' + key).attr('data-filename');

            if (file_name !== 'undefined') {
                var fileData = {
                    path: '/Case-Files/' + file_name
                };

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'https://api.dropboxapi.com/2/files/delete_v2');
                xhr.setRequestHeader('Authorization', 'Bearer ' + dropboxToken);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.send(JSON.stringify(fileData));

                $("#preview_" + key).remove();
            }
            if ($.trim($('.dropped-files').html()) === '') {
                $('.dz-message').removeClass('collapse');
            } else {
                $('.dz-message').addClass('collapse');
            }
        });

        // function progressBarLoop(arr) {
        //     var result = true;
        //     $.each(arr, function (key, value) {
        //         $('.progress').show();
        //         $('.progress-bar').addClass('progress-bar-animated');
        //         $('.progress-bar').width(value + '%');
        //         $('.progress-bar').attr("aria-valuenow", value);
        //         $('.progress-bar').html('Uploading...');
        //         if (value === 100) {
        //             $('.progress-bar').removeClass('progress-bar-animated');
        //             $('.progress-bar').addClass('bg-success');
        //             $('.progress-bar').html('<i class="fa fa-check"></i> Uploaded!');
        //             result = false;
        //         }
        //     });
        //     return result;
        // }

        // function TimerFunc(Timings, arr) {
        //     var Dates = new Date();
        //     const deadline = Dates.setMinutes(Dates.getMinutes() + Timings);
        //     var result = true;
        //     var x = setInterval(function () {
        //         var now = new Date().getTime();
        //         var t = deadline - now;
        //         var progressbar = progressBarLoop(arr);
        //         clearInterval(x);
        //         if (t < 0) {
        //             if (!progressbar) {
        //                 result = false;
        //             }
        //         }
        //     }, 1000);
        //     return result;
        // }

        // function uploadFile(Files) {
        //     var Timings = 5;
        //     var arr = [10, 20, 30, 40, 50, 60, 70];
        //     $('.update-case-detail-2').attr("disabled", 'disabled');
        //     $('.upload-case-files-btn').attr('id', '0');
        //     TimerFunc(Timings, arr);

        //     const UPLOAD_FILE_SIZE_LIMIT = 150 * 1024 * 1024;
        //     var ACCESS_TOKEN = "3pjQy4AhXFgAAAAAAAAAAbqm_Asfzq-_mAJti6v3qr93uBydG6xQuJXMDgaNzzcT";
        //     var dbx = new Dropbox.Dropbox({accessToken: ACCESS_TOKEN});
        //     var file = Files;
        //     if (file.size < UPLOAD_FILE_SIZE_LIMIT) { // File is smaller than 150 Mb - use filesUpload API
        //         dbx.filesUpload({path: '/Case-Files/' + file.name, contents: file}).then(function (response) {
        //             if (response.status === 200) {
        //                 console.log('file uploaded!');
        //                 var Timings = 0;
        //                 var arr = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
        //                 TimerFunc(Timings, arr);
        //                 $('.update-case-detail-2').removeAttr("disabled");
        //                 $('.upload-case-files-btn').attr('id', '1');
        //             }
        //         });
        //     } else { // File is bigger than 150 Mb - use filesUploadSession* API
        //         const maxBlob = 128 * 1000 * 1000; // 128Mb - Dropbox JavaScript API suggested max file / chunk size
        //         var workItems = [];
        //         var offset = 0;
        //         while (offset < file.size) {
        //             var chunkSize = Math.min(maxBlob, file.size - offset);
        //             workItems.push(file.slice(offset, offset + chunkSize));
        //             offset += chunkSize;
        //         }
        //         const task = workItems.reduce((acc, blob, idx, items) => {
        //             if (idx === 0) {
        //                 // Starting multipart upload of file
        //                 return acc.then(function () {
        //                     return dbx.filesUploadSessionStart({close: false, contents: blob})
        //                             .then(response => response.result.session_id);
        //                 });
        //             } else if (idx < items.length - 1) {
        //                 // Append part to the upload session
        //                 return acc.then(function (sessionId) {
        //                     var cursor = {session_id: sessionId, offset: idx * maxBlob};
        //                     return dbx.filesUploadSessionAppendV2({cursor: cursor, close: false, contents: blob}).then(() => sessionId);
        //                 });
        //             } else {
        //                 // Last chunk of data, close session
        //                 return acc.then(function (sessionId) {
        //                     var cursor = {session_id: sessionId, offset: file.size - blob.size};
        //                     var commit = {path: '/Case-Files/' + file.name, mode: 'add', autorename: true, mute: false};
        //                     return dbx.filesUploadSessionFinish({cursor: cursor, commit: commit, contents: blob});
        //                 });
        //             }
        //         }, Promise.resolve());
        //         task.then(function (result) {
        //             if (result.status === 200) {
        //                 console.log('file uploaded!');
        //                 var Timings = 0;
        //                 var arr = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
        //                 TimerFunc(Timings, arr);
        //                 $('.update-case-detail-2').removeAttr("disabled");
        //                 $('.upload-case-files-btn').attr('id', '1');
        //             }
        //         });
        //     }
        //     return false;
        // }
    </script>
    <?php include("include/bottomscript.php"); ?>
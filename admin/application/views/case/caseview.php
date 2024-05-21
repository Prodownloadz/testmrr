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
        .table thead th{
            text-transform:capitalize;
            font-size:13px !important;
        }
        .upload_files{
            list-style-type:none;
            padding:0px;
            margin:0px;
        }
        .upload_files li{
            position:relative;
            padding:10px 5px;
            border-bottom: 1px solid #eee;
        }
        .upload_files li span{
            position:absolute;
            right:10px;
        }
        .listempty{
            list-style-type:none;
            padding:0px;
        }
        .bulk-download, .bulk-downloads{
            text-decoration:none;
            background:#042d5f;
            padding: 5px;
            color: #fff;
            text-align: right;
            float: right;
            font-size: 11px;
            border-radius: 5px;
            cursor:pointer;
        }
        .bulk-download:hover, .bulk-download:hover{
            color:#fff;
        }
        .upload_files li span+span {
            right: 40px;
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
                                    <h4 class="form-header"><i class="fa fa-user"></i> Case Details</h4>
                                    <div class="table-responsive">
                                        <table class="table  table-striped table-bordered">
                                            <thead>
                                                <tr>

                                                    <th>Attorney Name</th>
                                                    <th>Contact Person</th>
                                                    <th>Contact Number</th>
                                                    <th>Case Name</th>
                                                    <th>Case Type</th>
                                                    <th>Created On</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $content[0]['attorney_name']; ?></td>
                                                    <td><?= $content[0]['contact_person']; ?></td>
                                                    <td><?= $content[0]['contact_number']; ?></td>
                                                    <td><?= $content[0]['case_name']; ?></td>
                                                    <td><?= $content[0]['case_type']; ?></td>
                                                    <td><?= $content[0]['created_on']; ?></td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $review_services = json_decode($content[0]['review_services']);
                                                    $add_on_services = json_decode($content[0]['add_on_services']);
                                                    $medical_charts = json_decode($content[0]['medical_charts']);
                                                    ?>
                                                    <td colspan="2">
                                                        <b>Review Services</b><br><br>
                                                        <ul class="listempty">
                                                            <?php for ($index = 0; $index < count($review_services); $index++) { ?>
                                                                <li><?= $review_services[$index]; ?></li>
                                                            <?php } ?>
                                                        </ul>
                                                    </td>
                                                    <td colspan="2">
                                                        <b>Add on Services</b><br><br>
                                                        <ul class="listempty">
                                                            <?php for ($index = 0; $index < count($add_on_services); $index++) { ?>
                                                                <li><?= $add_on_services[$index]; ?></li>
                                                            <?php } ?>
                                                        </ul>
                                                    </td>
                                                    <td colspan="2">
                                                        <b>Medical Charts</b><br><br>
                                                        <ul class="listempty">
                                                            <?php for ($index = 0; $index < count($medical_charts); $index++) { ?>
                                                                <li><?= $medical_charts[$index]; ?></li>
                                                            <?php } ?>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><b>Law Firm Name</b></td>
                                                    <td colspan="4"><b>Case Description</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><?= $content[0]['law_firm_name'] ?></td>
                                                    <td colspan="5"><p><?= $content[0]['case_description']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><b>Expected Delivery Date</b></td>
                                                    <td colspan="4"><?= $content[0]['expected_delivery_date']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><b>Status</b></td>
                                                    <td colspan="2">
                                                        <select class="case_status form-control" id="<?php echo $content[0]['id']; ?>">
                                                            <?php
                                                            if ($content[0]['status'] === '0') {
                                                                ?>
                                                                <option value="0" <?php echo $content[0]['status'] === '0' ? 'selected' : ''; ?>>New</option>
                                                                <option value="1" <?php echo $content[0]['status'] === '1' ? 'selected' : ''; ?>>Open</option>
                                                                <option value="2" <?php echo $content[0]['status'] === '2' ? 'selected' : ''; ?>>Processing</option>
                                                                <option value="3" <?php echo $content[0]['status'] === '3' ? 'selected' : ''; ?>>Completed</option>
                                                                <?php
                                                            } elseif ($content[0]['status'] === '1') {
                                                                ?>
                                                                <option value="1" <?php echo $content[0]['status'] === '1' ? 'selected' : ''; ?>>Open</option>
                                                                <option value="2" <?php echo $content[0]['status'] === '2' ? 'selected' : ''; ?>>Processing</option>
                                                                <option value="3" <?php echo $content[0]['status'] === '3' ? 'selected' : ''; ?>>Completed</option>
                                                                <?php
                                                            } elseif ($content[0]['status'] === '2') {
                                                                ?>
                                                                <option value="2" <?php echo $content[0]['status'] === '2' ? 'selected' : ''; ?>>Processing</option>
                                                                <option value="3" <?php echo $content[0]['status'] === '3' ? 'selected' : ''; ?>>Completed</option>
                                                                <?php
                                                            } elseif ($content[0]['status'] === '3') {
                                                                ?>
                                                                <option value="3" <?php echo $content[0]['status'] === '3' ? 'selected' : ''; ?>>Completed</option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </td>
                                                    <td colspan="2"></td>
                                                </tr>
                                                <tr>
                                                    <?php
                                                    $this->db->where('case_id', $content[0]['id']);
                                                    $query = $this->db->get('case_files');
                                                    $case_files = $query->result_array();
                                                    ?>
                                                    <td colspan="6" style="padding: 0;">
                                                        <table style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th><b>Uploaded Files</b> <p class="bulk-downloads bulk-download-btn" id="<?php echo $content[0]['id']; ?>"><i class="fa fa-download"></i> Bulk Download</p></th>
                                                                    <th><b>Additional Information</b></th>
                                                                    <th><b>Uploaded On</b></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php for ($index1 = 0; $index1 < count($case_files); $index1++) { ?>
                                                                    <tr>
                                                                        <td>
                                                                            <a class="thumbChecked" href="https://www.dropbox.com/home/Case-Files?preview=<?= $case_files[$index1]['case_files']; ?>" target="_blank" style="width: 300px; height:100px;" border="0"><?= $case_files[$index1]['case_files']; ?></a>
                                                                            <span><a href="https://www.dropbox.com/home/Case-Files?preview=<?= $case_files[$index1]['case_files']; ?>" target="_blank"><i class="fas fa-cloud-download-alt"></i></a></span>
                                                                        </td>
                                                                        <td>
                                                                            <p><?= $case_files[$index1]['additional_info']; ?></p>
                                                                        </td>
                                                                        <td>
                                                                            <p><?= $case_files[$index1]['created_on']; ?></p>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <?php if ($content[0]['status'] !== '3') { ?>
                                                            <b>Output File</b> <a href="<?php echo BEGIN_PATH; ?>/cases/casesedit?cid=<?php echo $content[0]['id']; ?>"><p class="bulk-downloads"><i class="fa fa-plus"></i> Add Output File</p></a><br><br>
                                                        <?php } ?>
                                                        <ul class="upload_files">
                                                            <?php
                                                            $this->db->where('case_id', $content[0]['id']);
                                                            $query2 = $this->db->get('output_files');
                                                            $output_files = $query2->result_array();
                                                            if ($output_files) {
                                                                foreach ($output_files as $output_file) {
                                                                    ?>
                                                                    <li>
                                                                        <a class="thumbChecked" href="https://www.dropbox.com/home/Output-Files?preview=<?= $output_file['output_files']; ?>" target="_blank" style="width: 300px; height:100px;" border="0"><?= $output_file['output_files']; ?></a>
                                                                        <span class="remove_output_file" id="<?= $output_file['id']; ?>" style="cursor: pointer; color: red;"><i class="fa fa-trash"></i></span>
                                                                        <span><a href="https://www.dropbox.com/home/Output-Files?preview=<?= $output_file['output_files']; ?>" target="_blank"><i class="fas fa-cloud-download-alt"></i></a></span>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </td>
                                                    <td colspan="3">
                                                        <?php if ($content[0]['status'] !== '3') { ?>
                                                            <b>Uploaded On</b><br><br>
                                                        <?php } ?>
                                                        <ul class="upload_files">
                                                            <?php
                                                            if ($output_files) {
                                                                foreach ($output_files as $output_file) {
                                                                    ?>
                                                                    <li>
                                                                        <a class="thumbChecked" href="javascript:void(0);" style="width: 300px; height:100px; color: #000;" border="0"><?= $output_file['created_on']; ?></a>
                                                                    </li>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-footer mt-2 text-right">
                                        <a href="<?php echo BEGIN_PATH . '/' . (isset($content[0]['created_by']) ? 'cases' : 'cases/just_submitted_cases'); ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
        <?php $this->load->view('bottomscript'); ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $("li:empty").css("display", "none");

                $('.case_status').change(function () {
                    if (confirm("Are sure want to change status of the case ?")) {
                        var case_id = $(this).attr('id');
                        var case_status = $(this).val();
                        window.location.href = "<?php echo BEGIN_PATH; ?>/cases/update?cid=" + case_id + "&case_status=" + case_status;
                    }
                });

                $('.bulk-download-btn').click(function () {
                    var case_id = $(this).attr('id');
                    window.location.href = "<?php echo BEGIN_PATH; ?>/cases/bulkDownload?case_id=" + case_id;
                });

                $('.remove_output_file').click(function () {
                    var output_file_id = $(this).attr('id');
                    var case_id = '<?php echo $content[0]['id']; ?>';
                    if (confirm('Are you sure want to remove this output file ?')) {
                        window.location.href = "<?php echo BEGIN_PATH; ?>/cases/remove_output_file?id=" + output_file_id + '&case_id=' + case_id;
                    }
                });
            });
        </script>
    </body>
</html>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('topscript') ?>
    <style type="text/css">
        .listempty{
            margin:0px;
            padding:0px;
            height:25px;
            overflow:hidden;
        }
        .view{
            position:absolute;
            right:5px;
            cursor:pointer;
        }
        td{
            position:relative
        }
    </style>
    <body>
        <div id="wrapper">
            <?php
            $this->load->view('leftmenu');
            $this->load->view('header');
            $status = [['New', 'primary'], ['Open', 'warning'], ['Processing', 'info'], ['Completed', 'success']];
            ?>    
            <div class="clearfix"></div>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row pt-2 pb-2">
                        <div class="col-sm-9">
                            <h4 class="page-title">Cases</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered">
                                            <thead style="background-color: #88a8b1;color: white;">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Contact Person</th>
                                                    <th>Contact Number</th>
                                                    <th>Case Name</th>
                                                    <th>Case Type</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($content as $key => $value) { ?>
                                                    <tr>
                                                        <td><?= ($key + 1); ?></td>
                                                        <td><?= $value['contact_person']; ?></td>
                                                        <td><?= $value['contact_number']; ?></td>
                                                        <td><?= $value['case_name']; ?> </td>
                                                        <td><?= $value['case_type']; ?> </td>
                                                        <td><span class="badge <?php echo 'badge-' . $status[$value['status']][1]; ?>"><?php echo $status[$value['status']][0]; ?></span></td>
                                                        <td>
                                                            <a class="btn btn-warning waves-effect waves-light" href="<?php echo BEGIN_PATH; ?>/cases/caseview?cid=<?= $value['id']; ?>">
                                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                                            </a>
                                                            <button class="case-delete-btn btn btn-danger waves-effect waves-light" value="<?= $value['id']; ?>">
                                                                <i class="far fa-trash-alt"></i>
                                                            </button>
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
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
        <?php $this->load->view('bottomscript'); ?>
        <script type="text/javascript">
            $("li:empty").css("display", "none");

            $(document).ready(function () {
                var table = $('#example').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });
                table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

                $('#example').on('click', '.case-delete-btn', function () {
                    var case_id = $(this).val();
                    if (confirm("Are sure want to remove this case ?")) {
                        window.location.href = "<?php echo BEGIN_PATH; ?>/cases/delete?id=" + case_id;
                    }
                });
            });
        </script>
    </body>
</html>
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('topscript'); ?>
    <body>
        <div id="wrapper">
            <?php
            $this->load->view('leftmenu');
            $this->load->view('header');
            $status = [['In Active', 'danger'], ['Active', 'success']];
            ?>    
            <div class="clearfix"></div>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row pt-2 pb-2">
                        <div class="col-sm-9">
                            <h4 class="page-title">Customers</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered">
                                            <thead style="background-color: #88a8b1; color: white;">
                                                <tr>
                                                    <th>S.No</th>
                                                    <th>Name</th>
                                                    <th>Username</th>
                                                    <th>Email</th>   
                                                    <th>Company Name</th>  
                                                    <th>State</th>   
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($content as $key => $value) { ?>
                                                    <tr>
                                                        <td style="width:40px;"><?= ($key + 1); ?></td>
                                                        <td><?= $value['name']; ?></td>
                                                        <td><?= $value['username']; ?></td>
                                                        <td><?= $value['email'] ?></td>
                                                        <td><?= $value['company_name'] ?></td>
                                                        <td><?= $value['state']; ?></td>
                                                        <td><span class="badge <?= 'badge-' . $status[$value['status']][1]; ?>"><?= $status[$value['status']][0]; ?></span></td>
                                                        <td>
                                                            <button class="customer-edit-btn btn btn-warning waves-effect waves-light" value="<?= $value['id']; ?>">
                                                                <i class="far fa-edit"></i>
                                                            </button>
                                                            <button class="customer-delete-btn btn btn-danger waves-effect waves-light" value="<?= $value['id']; ?>">
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
        <!-- Modal -->
        <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel">Status Changes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="status-update-btn btn btn-primary">Change</button>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('bottomscript'); ?>
        <script type="text/javascript">
            $(document).ready(function () {
                var table = $('#example').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'print']
                });
                table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

                $('#example').on('click', '.customer-delete-btn', function () {
                    var customer_id = $(this).val();
                    if (confirm("Are sure want to remove this customer ?")) {
                        window.location.href = "<?php echo BEGIN_PATH; ?>/customers/delete?id=" + customer_id;
                    }
                });

                $('#example').on('click', '.customer-edit-btn', function () {
                    var customer_id = $(this).val();
                    if (customer_id) {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo BEGIN_PATH; ?>/customers/statusModal',
                            data: {'Data': customer_id},
                            success: function (data) {
                                $('.modal-body').html(data);
                                $('#statusModal').modal('show');
                            }
                        });
                    }
                });

                $('.status-update-btn').click(function () {
                    var Data = [];
                    var Error = [];

                    if (!$.trim($('.customer_status').val())) {
                        Error.push('');
                        $('.customer_status_error').css("display", "block");
                    } else {
                        Data.push($.trim($('.customer_status').val()));
                        $('.customer_status_error').css("display", "none");
                    }

                    Data.push($('.customer_status').attr('id'));

                    if (Error.length === 0) {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo BEGIN_PATH; ?>/customers/statusUpdate',
                            data: {'Data': Data},
                            success: function (data) {
                                if (data === '1') {
                                    $('#statusModal').modal('hide');
                                    alert("Status Successfully Updated!");
                                    location.reload();
                                } else {
                                    alert("Problem to Update Status *");
                                }
                            }
                        });
                    }
                });
            });
        </script>
    </body>
</html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('topscript') ?>
<script>
function confirmDelete(){ 
  { 
    answer = confirm("Do you want to delete this item?")

    if (answer ==0) 
    { 
      return false;
    } 

  }
}
</script>
<body>

<!-- Start wrapper-->
 <div id="wrapper">
 
        <!--Start sidebar-wrapper-->
   <?php $this->load->view('leftmenu') ?>
         <!--End sidebar-wrapper-->

          <!--Start topbar header-->
      <?php $this->load->view('header') ?>    
           <!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Customer List</h4>
		   
	   </div>
	   
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><span> Customer</span>
            <a href="<?php echo BEGIN_PATH ?>/customer/customeradd" class="btn btn-success btn-sm waves-effect waves-light m-1" style="float:right;">ADD</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead style="background-color: #88a8b1;color: white;">
                    <tr>
                        <th>Sl.No</th>
                        <th>Customer Name</th>
                    
                        <th>Total Debit Amount</th>     
                        <th>Total Credit Amount</th>   
                        <th>Balance Amount</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $i=1;
                    foreach($content as $key => $value)
                    {
                           $this->db->select('*');
        $this->db->from("web_customer");
        $this->db->where("id",$value['customer_id']);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content1'] =$query->result_array();
        $customer_name=$arr['content1'][0]['customer_name'];
        $balance_amount=$arr['content1'][0]['balance_amount'];
        
         $this->db->select('*');
        $this->db->from("web_totalamount");
        $this->db->where("customer_id",$value['customer_id']);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content2'] =$query->result_array();
        $total_creditamount	=$arr['content2'][0]['total_creditamount'];
                  ?>
                    <tr>
                        <td style="width:40px;"><?=$i?></td>
                        <td><?=$customer_name?></td>
                       
                        <td><?=$value['total_debitamount']?></td>  
                        <td><?=$total_creditamount?></td> 
                        <td><?=$balance_amount?></td>
                       
                      
                    </tr>
                  <?php
                    $i++;
                    }
                  ?> 
                    
                </tbody>
                
            </table>
            </div>
            </div>
          </div>
        </div>
      </div><!-- End Row-->


     

    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<?php $this->load->view('footer') ?>
	<!--End footer-->
   
  </div><!--End wrapper-->

<script type="text/javascript">
  function get(id)
  {
  var uid = document.getElementById('uid'+id).value;
  var accept_status = document.getElementById('accept_status'+id).value;
  document.getElementById("tval").value=10;
  window.location.href="<?php echo BEGIN_PATH?>/customer/update?uid="+uid+"&accept_status="+accept_status;
  return true;
  }
</script>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo BEGIN_PATH ?>/assets/js/jquery.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/js/popper.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/js/bootstrap.min.js"></script>
	
	<!-- simplebar js -->
	<script src="<?php echo BEGIN_PATH ?>/assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="<?php echo BEGIN_PATH ?>/assets/js/waves.js"></script>
	<!-- sidebar-menu js -->
	<script src="<?php echo BEGIN_PATH ?>/assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="<?php echo BEGIN_PATH ?>/assets/js/app-script.js"></script>

  <!--Data Tables js-->
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/dataTables.buttons.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/buttons.bootstrap4.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/jszip.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/pdfmake.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/vfs_fonts.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/buttons.html5.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/buttons.print.min.js"></script>
  <script src="<?php echo BEGIN_PATH ?>/assets/plugins/bootstrap-datatable/js/buttons.colVis.min.js"></script>

    <script>
     $(document).ready(function() {
      //Default data table
       $('#default-datatable').DataTable();


       var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'print', 'colvis' ]
      } );
 
     table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
      
      } );

    </script>
	
</body>

</html>

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
<style>
    .content-wrapper{
             background:url('https://i.pinimg.com/originals/65/3a/b9/653ab9dd1ef121f163c484d03322f1a9.jpg');
           background-size:cover;
            height:100vh;
            overflow:hidden;
            position:relative;
        }
        .content-wrapper:before{
            background:#000 !important;
            width:100%;
            height:100%;
            position:absolute;
            top:0px;
            left:0px;
            content:'';
            opacity:.8;
        }
        .source{
           position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    padding: 15px;
    text-align: center;
        }
        .source p{
            color:#ddd;
        }
        
</style>
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
		    <h4 class="page-title text-white">Customer Feedback</h4>
	   </div>
	   
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><span> Feedback</span> </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead style="background-color: #88a8b1;color: white;">
                    <tr>
                        <th>Sl.No</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th style="width:80px;text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $i=1;
                    foreach($content as $key => $value)
                    {
                  ?>
                    <tr>
                        <td style="width:40px;"><?=$i?></td>
                        <td><?=$value['name']?></td>
                        <td><?=$value['email']?> </td>
                        <td><?=$value['mobile']?> </td>
                        <td>
                          
                          <a href="<?php echo BEGIN_PATH ?>/feedback/feedbackview?cid=<?=$value['id']?>">
                            <button class="btn btn-warning waves-effect waves-light m-1">
                            <i class="fa fa-eye" aria-hidden="true"></i></button>
                          </a>
                           <a href="<?php echo BEGIN_PATH?>/feedback/del?did=<?=$value['id']?>" 
                            onClick="return confirmDelete();">
                            <button class="btn btn-danger waves-effect waves-light m-1"><i class="far fa-trash-alt"></i></button></a>
                        </td>
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
    <div class="col-lg-12 source">
                <p>Designed By <i class="fas fa-heart text-danger"></i> <a href="#">Timesolutions.com</a></p>
            </div>
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<?php // $this->load->view('footer') ?>
	<!--End footer-->
   
  </div><!--End wrapper-->


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

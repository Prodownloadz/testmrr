<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('topscript') ?>
<style>
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
     
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form  action="<?php echo BEGIN_PATH ?>/customer/index" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <h4 class="form-header text-uppercase"><i class="fa fa-user-circle-o"></i>Return Policy - View</h4>

                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">User Name :</label>
                     <div class="col-sm-10"><?=$content[0]['user_name']?></div>
                </div>
                <div class="form-group row">
                    <label for="input-8" class="col-sm-2 col-form-label">Mobile :</label>
                      <div class="col-sm-10"><?=$content[0]['user_mobile']?></div>
                </div>
                 <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">order_id :</label>
                     <div class="col-sm-10"><?=$content[0]['order_id']?></div>
                </div>
                 <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Address :</label>
                     <div class="col-sm-10"><?=$content[0]['user_address']?></div>
                </div>
                 
                 <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Message :</label>
                     <div class="col-sm-10"><?=$content[0]['message']?></div>
                </div>
                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Date :</label>
                     <div class="col-sm-10"><?=$content[0]['date']?></div>
                </div>
                
                 
                  <input type="hidden" name="enq_id" value="<?=$content[0]['enq_id']?>">
                  <div class="form-footer">
                    <a href="<?php echo BEGIN_PATH?>/returnpolicy" class="btn btn-danger">Back</a>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    
    </div>

   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	 <!--Start footer-->
  <?php $this->load->view('footer') ?>
  <!--End footer-->
   
   
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="<? echo BEGIN_PATH ?>/assets/js/jquery.min.js"></script>
  <script src="<? echo BEGIN_PATH ?>/assets/js/popper.min.js"></script>
  <script src="<? echo BEGIN_PATH ?>/assets/js/bootstrap.min.js"></script>
	
	<!-- simplebar js -->
	<script src="<? echo BEGIN_PATH ?>/assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- waves effect js -->
  <script src="<? echo BEGIN_PATH ?>/assets/js/waves.js"></script>
	<!-- sidebar-menu js -->
	<script src="<? echo BEGIN_PATH ?>/assets/js/sidebar-menu.js"></script>
  <!-- Custom scripts -->
  <script src="<? echo BEGIN_PATH ?>/assets/js/app-script.js"></script>

  <!--Form Validatin Script-->
  <script src="<? echo BEGIN_PATH ?>/assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
   
</body>

</html>

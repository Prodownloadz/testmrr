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
        <div class="col-lg-10">
          <div class="card">
            <div class="card-body">
              <form  action="<?php echo BEGIN_PATH ?>/banner/add" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <h4 class="form-header text-uppercase"><i class="fa fa-user-circle-o"></i>Brand</h4>
               <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Title Name :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="web_title" name="web_title">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Image :</label>
                  <div class="col-sm-6">
                    <input type="file" class="form-control" id="web_image" name="web_image"   required>
                  </div>
                </div>
                
                <div class="form-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button>
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

  <!--Form Validatin Script-->
    <script src="<?php echo BEGIN_PATH ?>/assets/plugins/jquery-validation/js/jquery.validate.min.js"></script>
    <script>

    $().ready(function() {

    $("#personal-info").validate();

   // validate signup form on keyup and submit
    $("#signupForm").validate({
        rules: {
            firstname: "required",
            lastname: "required",
            username: {
                required: true,
                minlength: 2
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
             contactnumber: {
                required: true,
                minlength: 10
            },
            topic: {
                required: "#newsletter:checked",
                minlength: 2
            },
            agree: "required"
        },
        messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            username: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 2 characters"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            confirm_password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            contactnumber: "Please enter your 10 digit number",
            agree: "Please accept our policy",
            topic: "Please select at least 2 topics"
        }
    });

});

    </script>
	
</body>

</html>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//error_reporting(0);
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
              <form  action="<? echo BEGIN_PATH ?>/contact/edit" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <h4 class="form-header text-uppercase"><i class="fa fa-user-circle-o"></i>Contact - Edit</h4>

                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Username :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username"  style="width:500px;"
                    value="<?=$content[0]['username']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Email :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" style="width:500px;" 
                    tabindex="1" value="<?=$content[0]['email']?>" >
                  </div>
                </div>
                <!-- <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Re Email :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email1" name="email1" style="width:500px;" 
                    tabindex="1" value="<?=$content[0]['email1']?>" >
                  </div>
                </div>-->
                 <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Mobile :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="mobile" name="mobile" style="width:500px;" 
                    tabindex="1" value="<?=$content[0]['mobile']?>" >
                  </div>
                </div>
                 <!--<div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Re Mobile :</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="mobile1" name="mobile1" style="width:500px;" 
                    tabindex="1" value="<?=$content[0]['mobile1']?>" >
                  </div>
                </div>-->
                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Address :</label>
                  <div class="col-sm-10">
                     <textarea class="form-control" rows="4" id="address" name="address" required="" 
                     style="width:500px;"><?=$content[0]['address']?></textarea>
                    
                  </div>
                </div> 
                <!--<div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Re Address :</label>
                  <div class="col-sm-10">
                     <textarea class="form-control" rows="4" id="address1" name="address1" required="" 
                     style="width:500px;"><?=$content[0]['address1']?></textarea>
                    
                  </div>
                </div> -->

                
                <input type="hidden" name="id" value="<?=$content[0]['id']?>">
                <div class="form-footer">
                  <input type="submit" class="btn btn-success" name="register-submit" 
                  value="Submit" onclick="return validate();">
                    <!-- <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button> -->
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

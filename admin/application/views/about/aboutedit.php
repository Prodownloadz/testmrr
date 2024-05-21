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
              <form  action="<?php echo BEGIN_PATH ?>/about/edit" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <h4 class="form-header text-uppercase"><i class="fa fa-user-circle-o"></i>About - Edit</h4>

                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Title :</label>
                  <div class="col-sm-5">
                    <input type="text" class="form-control" id="web_title" name="web_title"  
                    value="<?=$content[0]['web_title']?>">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Image :</label>
                  <div class="col-sm-4">
                    <input type="file" class="form-control" id="web_image" name="web_image" style="float: left;" 
                    tabindex="1">
                    <input type="hidden"  id="web_image" name="web_image" value="<?=$content[0]['web_image']?>">
                    <br>
                    <?php
                      if($content[0]['web_image']!="")
                      {
                    ?> 
                      <img src="<?php echo BEGIN_PATH ?>/webupload/original/<?=$content[0]['web_image']?>" 
                      style="width:100px;height: 50px;margin-top:-26px;margin-left:20px;"  border="0"/>
                    <?php
                      } 
                    ?>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Description :</label>
                  <div class="col-sm-6">
                     <textarea class="form-control" rows="4" id="web_content" name="web_content" required="" ><?=$content[0]['web_content']?></textarea>
                    
                  </div>
                </div> 
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
   
</body>

</html>

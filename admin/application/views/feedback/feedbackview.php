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
        .card{
            background:#222 !important;
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
     
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form  action="<?php echo BEGIN_PATH ?>/services/index" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <h4 class="form-header text-uppercase text-white"><i class="fa fa-user-circle-o"></i>Feedback - <?=$content[0]['name']?> </h4>
                    
                    <table class="table table-bordered text-white table-striped table-hover ">
                  <thead>
                      <tr>
                          <th width="25%">Name</th>
                          <td><?=$content[0]['name']?></td>
                      </tr>
                      <tr>
                          <th width="25%">Email</th>
                          <td><?=$content[0]['email']?></td>
                      </tr>
                      <tr>
                          <th width="25%">Mobile</th>
                          <td><?=$content[0]['mobile']?></td>
                      </tr>
                      <tr>
                          <th width="25%">Customer Message</th>
                          <td><?=$content[0]['content']?></td>
                      </tr>
                  </thead>
              </table>
              <input type="hidden" name="enq_id" value="<?=$content[0]['enq_id']?>">
                  <div class="form-footer">
                    <a href="<?php echo BEGIN_PATH?>/feedback" class="btn btn-danger">Back</a>
                  </div>
              
                <!--<div class="form-group row">-->
                <!--  <label for="input-8" class="col-sm-2 col-form-label">User Name</label>-->
                <!--     <div class="col-sm-10">: <?=$content[0]['name']?></div>-->
                <!--</div>-->
                <!--<div class="form-group row">-->
                <!--    <label for="input-8" class="col-sm-2 col-form-label">Email</label>-->
                <!--      <div class="col-sm-10">: <?=$content[0]['email']?></div>-->
                <!--</div>-->
                <!--<div class="form-group row">-->
                <!--    <label for="input-8" class="col-sm-2 col-form-label">Mobile</label>-->
                <!--      <div class="col-sm-10">: <?=$content[0]['mobile']?></div>-->
                <!--</div>-->
                
                <!--<div class="form-group row">-->
                <!--  <label for="input-8" class="col-sm-2 col-form-label">Message</label>-->
                <!--     <div class="col-sm-10">: <?=$content[0]['content']?></div>-->
                <!--</div>-->
                 
                  
              </form>
              
              
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="col-lg-12 source">
                <p>Designed By <i class="fas fa-heart text-danger"></i> <a href="#">Timesolutions.com</a></p>
            </div>
    </div>

   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	 <!--Start footer-->
  <?php // $this->load->view('footer') ?>
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

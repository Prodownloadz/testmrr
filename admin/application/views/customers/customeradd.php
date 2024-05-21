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
.footer{
    position:fixed; 
    bottom:0px;
    left:0px;
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
            <form  action="<?php echo BEGIN_PATH ?>/customer/add" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                <h4 class="form-header text-uppercase"><i class="fa fa-user-circle-o"></i>Customer</h4>
                
                
                <div class="col-lg-12">
                    <div class="row">
                         <div class="form-group  col-lg-6">
                  <label for="input-8" class="">Customer Name:</label>
                  <div class="">
                    <input type="text" class="form-control" id="customer_name" name="customer_name"  
                    required="">
                  </div>
                </div>
                 <div class="form-group  col-lg-6">
                  <label for="input-8">Sales Person Name :</label>
                  <div class="">
                     <select class="form-control" id="salesperson_name" name="salesperson_name"  required="">
                        <option value="">Select salesperson</option>
                        <?php 
                           foreach($content1 as $key => $row)

                            {
                        ?>               
                        <option value="<?php echo $row['id'] ?>">
                          <?php echo $row['salesperson_name'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
                </div>
                <div class="form-group col-lg-6">
                  <label for="input-8" class="">Customer Mobile:</label>
                  <div class="">
                    <input type="text" class="form-control" id="customer_mobile" name="customer_mobile"  
                    required="">
                  </div>
                </div>
                
                    </div>
                </div>
                
                <div class="col-lg-12 ">
                    <div class="row">
                        <div class="form-group col-lg-6">
                  <label for="input-8" class="">Customer Address:</label>
                  <div class="">
                    <input type="text" class="form-control" id="customer_address" name="customer_address"  
                    required="">
                  </div>
                </div>
                
                <div class="form-group col-lg-6">
               
                       <label for="input-8" class="">EB Number:</label>
                 <div class="">
                    <input type="text" class="form-control" id="eb_number" name="eb_number"  
                    required="">
                  </div>
                </div> 
                
                    </div>
                </div>
                
                
                <div class="col-lg-12">
                    <div class="row">
                        
                        <div class="form-group col-lg-6">
               
                       <label for="input-8" class=" col-form-label">DTH Number:</label>
                 <div class="">
                    <input type="text" class="form-control" id="dth_number" name="dth_number"  
                    required="">
                  </div>
                </div>
                
                 <div class="form-group col-lg-6">
               
                       <label for="input-8" class=" col-form-label">Bank Name:</label>
                 <div class="">
                    <input type="text" class="form-control" id="bank_name" name="bank_name"  
                    required="">
                  </div>
                </div>
                
                
                    </div>
                </div>
              
              
              <div class="col-lg-12">
                  <div class="row">
                      
                      <div class="form-group col-lg-6">
               
                       <label for="input-8" class=" col-form-label">IFSC Code:</label>
                 <div class="">
                    <input type="text" class="form-control" id="ifsc_code" name="ifsc_code"  
                    required="">
                  </div>
                </div>
                
                
                <div class="form-group col-lg-6">
               
                       <label for="input-8" class=" col-form-label">Account Number:</label>
                 <div class="">
                    <input type="text" class="form-control" id="account_number" name="account_number"  
                    required="">
                  </div>
                </div>
                
                
                      
                  </div>
              </div>
              
              
              <div class="col-lg-12">
                  <div class="row">
                      
                      <div class="form-group col-lg-6">
               
                       <label for="input-8" class=" col-form-label">Id Proofs: Adhar/Voter/</label>
                 <div class="">
                    <input type="file" class="form-control" id="idproof" name="idproof"  
                    required="">
                  </div>
                </div>
                
                <div class="form-group col-lg-6">
               
                       <label for="input-8" class=" col-form-label">Gentrate QR Code</label>
                 <div class="">
                    <img src="" id="qrcode" name="qrcode" width="50%">
                  </div>
                </div>
                
                  </div>
              </div>
                  
              
               
  <input type="text" name="url" id="url">          
                  
                 
                    </div>
                <div class="form-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Submit</button>
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
    let qrcode = select("img");
    let qrtext = select("#customer_mobile");
    let qrbtn = select("button");

    qrbtn.addEventListener("click", genQR);

    function genQR(){
        let size = "1000x1000";
        let data = qrtext.value;
        let baseURL = "https://api.qrserver.com/v1/create-qr-code/";

        let url = `${baseURL}?data=${data}`;
        
        
            document.getElementById("url").value=url;
        qrcode.src = url;


    }

    function select(el){
        return document.querySelector(el);
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
</body>

</html>

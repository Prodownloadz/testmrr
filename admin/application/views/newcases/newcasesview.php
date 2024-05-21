<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.5/jszip.min.js"></script>
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip-utils/0.0.2/jszip-utils.min.js"></script>
	<script defer src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.min.js"></script>
	
	<script>
  var links = [];
  
        $(document).ready(function(){
            $('.thumb').click(function(){
   
    });
    setTimeout(function(){
        $('.thumb').trigger('click');
    }, 100);
$('.upload_files').on('click', '.thumb', function () {

  $(this).removeClass().addClass('thumbChecked');
  links.push($(this).attr('href'));
  console.log(links);
 
  
  if (links.length != 0) {
    $('.bulk-download').css("display", "block");
  }

});


$('.upload_files').on('click', '.thumbChecked', function () {

  $(this).removeClass().addClass('thumb');
  var itemtoRemove = $(this).attr('href');
  links.splice($.inArray(itemtoRemove, links));
  console.log(links);
  
  if (links.length == 0) {
    $('.bulk-download').css("display", "none");
  }

});
        });


function generateZIP(){
    
  console.log('TEST');
  var zip = new JSZip();
  var count = 0;
  var zipFilename = "Addtional Documents.zip";

  links.forEach(function (url, i) {
    var filename = links[i];
    filename = filename.replace(/[\/\*\|\:\<\>\?\"\\]/gi, '').replace("httpsi.imgur.com","");
    // loading a file and add it in a zip file
    JSZipUtils.getBinaryContent(url, function (err, data) {
      if (err) {
        throw err; // or handle the error
      }
      zip.file(filename, data, { binary: true });
      count++;
      if (count == links.length) {
        zip.generateAsync({ type: 'blob' }).then(function (content) {
          saveAs(content, zipFilename);
        });
      }
    });
  });
}
  
</script>



	<script>
  var links = [];
  
        $(document).ready(function(){
            $('.thumbOrg').click(function(){
   
    });
    setTimeout(function(){
        $('.thumbOrg').trigger('click');
    }, 100);
$('.upload_filesOrg').on('click', '.thumbOrg', function () {

  $(this).removeClass().addClass('thumbChecked');
  links.push($(this).attr('href'));
  console.log(links);
 
  
  if (links.length != 0) {
    $('.bulk-downloads').css("display", "block");
  }

});


$('.upload_filesOrg').on('click', '.thumbChecked', function () {

  $(this).removeClass().addClass('thumb');

  var itemtoRemove = $(this).attr('href');
  links.splice($.inArray(itemtoRemove, links));
  console.log(links);
  
  if (links.length == 0) {
    $('.bulk-downloads').css("display", "none");
  }

});
        });


function generateZIPS(){
    
  console.log('TEST');
  var zip = new JSZip();
  var count = 0;
  var zipFilename = "OrgDocuments.zip";

  links.forEach(function (url, i) {
    var filename = links[i];
    filename = filename.replace(/[\/\*\|\:\<\>\?\"\\]/gi, '').replace("httpsi.imgur.com","");
    // loading a file and add it in a zip file
    JSZipUtils.getBinaryContent(url, function (err, data) {
      if (err) {
        throw err; // or handle the error
      }
      zip.file(filename, data, { binary: true });
      count++;
      if (count == links.length) {
        zip.generateAsync({ type: 'blob' }).then(function (content) {
          saveAs(content, zipFilename);
        });
      }
    });
  });
}
  
</script>


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
.table thead th{
    text-transform:capitalize;
    font-size:13px !important;
}
.upload_files{
    list-style-type:none;
    padding:0px;
    margin:0px;
}
.upload_files li{
    position:relative;
    padding:10px 5px;
    border-bottom: 1px solid #eee;
}
.upload_files li span{
    position:absolute;
    right:10px;
}
.listempty{
     list-style-type:none;
     padding:0px;
    }
    .bulk-download, .bulk-downloads{
        text-decoration:none;
            background:#042d5f;
    padding: 5px;
    color: #fff;
    text-align: right;
    float: right;
    font-size: 11px;
    border-radius: 5px;
    cursor:pointer;
    }
    .bulk-download:hover, .bulk-download:hover{
        color:#fff;
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
                <h4 class="form-header text-uppercase"><i class="fa fa-user-circle-o"></i>Cases - View</h4>
               <?php  
              
                 $this->db->select('*');
        $this->db->from("web_customer");
        $this->db->where("id",$content[0]['user_id']);
       // $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content1'] =$query->result_array();
        $name=$arr['content1'][0]['name']; ?>
        <div class="table-responsive">
            <table class="table  table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>User Name</th>
                        <th>Contact Name</th>
                        <th>Case Name</th>
                        <th>Case type</th>
                        <th>Attorney Name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$content[0]['date']?></td>
                        <td><?=$name?></td>
                        <td><?=$content[0]['contactname']?></td>
                        <td><?=$content[0]['casename']?></td>
                        <td><?=$content[0]['casetype']?></td>
                        <td><?=$content[0]['requestorname']?></td>
                        
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b>Main Service</b>
                            <br>
                           <!-- <ul class="listempty">
                                <li><?=$content[0]['artical_research']?></li>
                                <li><?=$content[0]['chronologies']?></li>
                                <li><?=$content[0]['demand_letter']?></li>
                                <li><?=$content[0]['deposition_summary']?></li>
                                <li><?=$content[0]['medical_opinion']?></li>
                                <li><?=$content[0]['medical_synopsis']?></li>
                                <li><?=$content[0]['nagative_summary']?></li>
                                <li><?=$content[0]['plaintiff_fact_sness']?></li>
                            </ul>
                            -->
                        </td>
                        <td colspan="3">
                            <b>Special Reports Services</b>
                            <br>
                           <!-- <ul class="listempty">
                                <li><?=$content[0]['billing_summery']?></li>
                                <li><?=$content[0]['case_screening_spreed_sheets']?></li>
                                <li><?=$content[0]['graphical_timeline']?></li>
                                <li><?=$content[0]['masstort_matrix']?></li>
                                <li><?=$content[0]['med_a_word']?></li>
                                <li><?=$content[0]['pain_and_suffering_chart']?></li>
                                <li><?=$content[0]['pain_mediction_chart']?></li>
                                <li><?=$content[0]['pressure_ruler_mattrix	']?></li>
                            </ul>-->
                            
                        </td>
                        <td colspan="2">
                            <b>Technical Services</b>
                            <br>
                           <!-- <ul class="listempty">
                                <li><?=$content[0]['bates_stamping']?></li>
                                <li><?=$content[0]['bookmarks']?></li>
                                <li><?=$content[0]['hot_links']?></li>
                                <li><?=$content[0]['jury_questionaire']?></li>
                                <li><?=$content[0]['pdf_sorting']?></li>
                                <li><?=$content[0]['list_of_injuries']?></li>
                                <li><?=$content[0]['pre_existing']?></li>
                                <li><?=$content[0]['pain_score_chart']?></li>
                            </ul>-->
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="1"><b>Law Firm Name</b></td>
                        
                        <td colspan="5">
                            <b>Case Overview</b><br>
                        </td>
                        
                        
                    </tr>
                    <tr>
                        <td colspan="1"><?=$content[0]['firmname']?></td>
                        <td colspan="5">
                            <p>
                                <?=$content[0]['casedescription']?>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1"><b>E-Delivery Date</b></td>
                        <td colspan="6"><?=$content[0]['date']?></td>
                    </tr>
                    <tr>
                        <td colspan="1"><b>Review Services</b></td>
                        <td colspan="6"><?=$content[0]['review_services']?></td>
                    </tr>
                    <tr>
                        <td colspan="1"><b>Add on Services</b></td>
                        <td colspan="6"><?=$content[0]['add_on_services']?></td>
                    </tr><tr>
                        <td colspan="1"><b>Medical Charts</b></td>
                        <td colspan="6"><?=$content[0]['medical_charts']?></td>
                    </tr>
                    <tr>
                        <td colspan="3"><b>Upload Files</b> <p class="bulk-downloads"  onclick="generateZIPS();">Bulk Download</p>
                                                  
                                <?php 
                          $this->db->select('*');
        $this->db->from("web_newcasefiles");
        $this->db->where("cid",$content[0]['id']);
       // $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content1'] =$query->result_array();
         foreach($arr['content1'] as $key => $value)
                    { ?>
                    
                        
                        <ul class="upload_files">
                            <li  ><a class="thumb" href="<?php echo BEGIN_PATH ?>/webupload/original/<?=$value['uploadcase']?>"  style="width:300px; height:100px;"  border="0"/><?=$value['uploadcase']?></a>
                                <span><a  href="<?php echo BEGIN_PATH ?>/webupload/original/<?=$value['uploadcase']?>" target="_blank"><i class="fas fa-cloud-download-alt"></i></a></span>
                            </li>
                        </ul>
                    <?php } ?>

                        </td>
                     </tr>
                    <tr>
                        <td colspan="3">
                            
                        
                      
  
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
            
            
            
            
            
                <!--<div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">User Name :</label>
                     <div class="col-sm-10"><?=$name?></div>
                </div>
                <div class="form-group row">
                        <label for="input-8" class="col-sm-2 col-form-label">Contact Name</label>
                      <div class="col-sm-10"><?=$content[0]['contact_name']?></div>
                </div><div class="form-group row">
                        <label for="input-8" class="col-sm-2 col-form-label">Case Name</label>
                      <div class="col-sm-10"><?=$content[0]['case_name']?></div>
                </div>
                <div class="form-group row">
                    <label for="input-8" class="col-sm-2 col-form-label">Case type :</label>
                      <div class="col-sm-10"><?=$content[0]['case_type']?></div>
                </div>-->
               <!-- <div class="form-group row">
                    <label for="input-8" class="col-sm-2 col-form-label">Case sub type</label>
                      <div class="col-sm-10"><?=$content[0]['case_sub_type']?></div>
                </div>-->
                <!--<div class="form-group row">-->
                <!--    <label for="input-8" class="col-sm-2 col-form-label">Case overview</label>-->
                <!--      <div class="col-sm-10"><?=$content[0]['case_overview']?></div>-->
                <!--</div>-->
                <!--<div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">Bates Referance :</label>
                     <div class="col-sm-10"><?=$content[0]['bates_referance']?></div>
                </div>--> 
               <!-- <div class="form-group row">
                  <label for="input-8" class="col-sm-2 col-form-label">PDF Referance :</label>
                     <div class="col-sm-10"><?=$content[0]['pdf_referance']?></div>
                </div> -->
                <!--<div class="form-group row">-->
                <!--  <label for="input-8" class="col-sm-2 col-form-label">Information :</label>-->
                <!--     <div class="col-sm-10"><?=$content[0]['information']?></div>-->
                <!--</div> <div class="form-group row">-->
                <!--  <label for="input-8" class="col-sm-2 col-form-label">Attorney Name :</label>-->
                <!--     <div class="col-sm-10"><?=$content[0]['attorney_name']?></div>-->
                <!--</div> <!--<div class="form-group row">-->
                <!--  <label for="input-8" class="col-sm-2 col-form-label">Estimate Request :</label>-->
                <!--     <div class="col-sm-10"><?=$content[0]['estimate_request']?></div>-->
                <!--</div> <div class="form-group row">-->
                <!--  <label for="input-8" class="col-sm-2 col-form-label">Expedite :</label>-->
                <!--     <div class="col-sm-10"><?=$content[0]['expedite']?></div>-->
                <!--</div><div class="form-group row">-->
                <!--  <label for="input-8" class="col-sm-2 col-form-label">Expected Delivery Date :</label>-->
                <!--     <div class="col-sm-10"><?=$content[0]['expected_delivery_date']?></div>-->
                <!--</div>-->
                
                <!--<div class="form-group row">-->
                <!--  <label for="input-8" class="col-sm-2 col-form-label">Date</label>-->
                <!--     <div class="col-sm-10"><?=$content[0]['date']?></div>-->
                <!--</div>-->
                <!--<div class="form-group row">-->
                <!--  <label for="input-8" class="col-sm-2 col-form-label">End date</label>-->
                <!--     <div class="col-sm-10"><?=$content[0]['enddate']?></div>-->
                <!--</div>-->
                
                
            <div class="form-group row">
                    <!--<label for="input-8" class="col-sm-2 col-form-label">Uploaded Files :</label>-->
                      <div class="col-sm-10">
                          
                          <?php 
                          $this->db->select('*');
        $this->db->from("web_casefiles");
        $this->db->where("cid",$content[0]['id']);
       // $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content1'] =$query->result_array();
         foreach($arr['content1'] as $key => $value)
                    { ?>
                          <!--<a href="<?php echo BEGIN_PATH ?>/webupload/original/<?=$value['uploaded_files']?>" style="width:300px; height:100px;"  border="0"/><?=$value['uploaded_files']?></a><br>-->
                          
                      <?php    }?>
                      
                          <!--<a href="<?php echo BEGIN_PATH ?>/webupload/original/<?=$content[0]['upload_files']?>" style="width:300px; height:100px;"  border="0"/><?=$content[0]['upload_files']?></a>-->
                       
                      </div>
                  </div>
                  <input type="hidden" name="enq_id" value="<?=$content[0]['enq_id']?>">
                  <div class="form-footer">
                    <a href="<?php echo BEGIN_PATH?>/cases" class="btn btn-danger">Back</a>
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
  
  <script>
    $(document).ready(function(){
        $( "li:empty" ).css( "display","none" );
        
        // $(".view").one('click',function(){
        //     var index = $( "ul" ).index(this);
        //         $("ul").css({
        //             height: "auto",
        //         });
        // })
    })
</script>

<!-- script bulk downloa -->




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

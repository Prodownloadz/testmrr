<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
    .listempty{
        margin:0px;
        padding:0px;
        height:25px;
        overflow:hidden;
    }
    .view{
        position:absolute;
        right:5px;
        cursor:pointer;
    }
    td{
        position:relative
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
		    <h4 class="page-title">Completed Cases</h4>
		   
	   </div>
	   
     </div>
    <!-- End Breadcrumb-->
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><span> Cases</span>
            <!--<a href="<?php echo BEGIN_PATH ?>/customer/customeradd" class="btn btn-success btn-sm waves-effect waves-light m-1" style="float:right;">ADD</a>-->
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="example" class="table table-bordered">
                <thead style="background-color: #88a8b1;color: white;">
                    <tr>
                        <th>S.No</th>
                         <th>User Name</th>
                         <th>Contact Name</th>
                         <th>Contact Number</th>
                        <th>Case Name</th>
                        <th>Case type</th>
<!--                        <th>Case sub type</th>
-->                        <th>Case overview</th>
                       
                        <th>Information</th>
                        <th>Attorney Name</th>
                      
                        <th>Expected Delivery Date</th>
                        <th>Main Services</th>
                        <th>Special Reports Services</th>
                        <th>Technical Services</th>
                       <!-- <th>Other service</th>
                        <th>Specific Instructions</th>-->
<!--                        <th>Upload Files</th>
-->                        <th>Upload Output File</th>
                        <th>Output File</th>
                        <th>Status</th>
                        <th style="width:80px;text-align:center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $i=1;
                    foreach($content as $key => $value)
                    {
                           $this->db->select('*');
        $this->db->from("web_customer");
        $this->db->where("id",$value['user_id']);
       // $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content1'] =$query->result_array();
        $name=$arr['content1'][0]['name'];
                  ?>
                    <tr>
                        <td style="width:40px;"><?=$i?></td>
                        <td><?=$name?></td>
                        <td><?=$value['contact_name']?></td>
                        <td><?=$value['contact_number']?></td>
                        <td><?=$value['case_name']?> </td>
                        <td><?=$value['case_type']?> </td>
                        <td><?=$value['case_overview']?> </td>
                        
                        <td><?=$value['information']?> </td>
                        <td><?=$value['attorney_name']?> </td>
<!--                        <td><?=$value['estimate_request']?> </td> -->
                        <td><?=$value['expected_delivery_date']?></td>
                        <td>
                            <!--<small class="view">View</small>-->
                            <ul class="listempty">
                                <li><?=$value['artical_research']?></li>
                                <li><?=$value['chronologies']?></li>
                                <li><?=$value['demand_letter']?></li>
                                <li><?=$value['deposition_summary']?></li>
                                <li><?=$value['medical_opinion']?></li>
                                <li><?=$value['medical_synopsis']?></li>
                                <li><?=$value['nagative_summary']?></li>
                                <li><?=$value['plaintiff_fact_sness']?></li>
                            </ul>
                            </td>
                        
                        <td>
                           <!--<small class="view">View</small>-->
                            <ul class="listempty">
                                <li><?=$value['billing_summery']?></li>
                                <li><?=$value['case_screening_spreed_sheets']?></li>
                                <li><?=$value['graphical_timeline']?></li>
                                <li><?=$value['masstort_matrix']?></li>
                                <li><?=$value['med_a_word']?></li>
                                <li><?=$value['pain_and_suffering_chart']?></li>
                                <li><?=$value['pain_mediction_chart']?></li>
                                <li><?=$value['pressure_ruler_mattrix	']?></li>
                            </ul>
                            
                            
                          </td>
                        <td>
                            <!--<small class="view">View</small>-->
                             <ul class="listempty">
                                <li><?=$value['bates_stamping']?></li>
                                <li><?=$value['bookmarks']?></li>
                                <li><?=$value['hot_links']?></li>
                                <li><?=$value['jury_questionaire']?></li>
                                <li><?=$value['pdf_sorting']?></li>
                                <li><?=$value['list_of_injuries']?></li>
                                <li><?=$value['pre_existing']?></li>
                                <li><?=$value['pain_score_chart']?></li>
                            </ul>
                        
                                <!-- <td><?=$value['other_service']?> </td>
                                <td><?=$value['specific_instructions']?> </td>-->
                               <!-- <td><a href="<?php echo BEGIN_PATH ?>/webupload/original/<?=$value['upload_files']?>" target="_blank"><?=$value['upload_files']?></a></td> -->
                                <td>
                                    
                                     <a href="<?php echo BEGIN_PATH ?>/cases/casesedit?cid=<?=$value['id']?>"><button class="btn btn-info waves-effect waves-light m-1"><i class="fa fa-edit"></i>
                          </button></a>
                                </td>
                                <td><a href="<?php echo BEGIN_PATH ?>/webupload/original/<?=$value['upload_files']?>" target="_blank"><?=$value['output_file']?></a><br>
                 <?php   if($value['delivery_date']!=''){ ?>
                                Date: <?=$value['delivery_date']?>
                                <?php } ?>
                                </td>

                        <td>
                            <input type="hidden" name="uid" id="uid<?=$i?>"  value="<?=$value['id']?>" />
                             <input type="hidden" name="tval" id="tval"  value="" />
                            <select class="form-control" name="accept_status" id="accept_status<?=$i?>"  onChange="return get(<?=$i?>);">

                                <option value="<?php if($value['status']==""){ echo 'selected';} ?>">Selected</option>
                                <option <?php if($value['status']=="Open"){ echo 'selected';} ?>  value="Open">Open</option><option <?php if($value['status']=="Processing"){ echo 'selected';} ?>  value="Processing">Processing</option>
                                <option <?php if($value['status']=="Completed"){ echo 'selected';} ?> 
                                value="Completed">Completed</option>
                            </select>
                        </td>
                        <td>
                           
                          <a href="<?php echo BEGIN_PATH ?>/cases/caseview?cid=<?=$value['id']?>">
                            <button class="btn btn-warning waves-effect waves-light m-1">
                            <i class="fa fa-eye" aria-hidden="true"></i></button>
                          </a>
                           <a href="<?php echo BEGIN_PATH?>/cases/del?did=<?=$value['id']?>" 
                            onClick="return confirmDelete();">
                            <button class="btn btn-danger waves-effect waves-light m-1"><i class="far fa-trash-alt"></i>
                          </button></a>
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
  window.location.href="<?php echo BEGIN_PATH?>/cases/update?uid="+uid+"&accept_status="+accept_status;
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

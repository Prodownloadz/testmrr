<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Member extends CI_Controller {
    
    var $site_title;
    var $css;
    var $base_url;
    var $data = array();

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
	{
        parent::__construct();

        $this->load->library('my_session');
        $this->load->library('auth');
	}


	public function index()
	{
		$data['logged']  = false;
		$arr['admin_id'] = $this->my_session->get("admin_id");
		$arr['username'] = $this->my_session->get("username");
        $id = $this->input->get('id' ,TRUE);
        $this->db->select('*');
        $this->db->from("web_member");
        //$this->db->where("salesperson_id",$id);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content'] =$query->result_array();
//print_r($arr['content']);die;
        if($arr['admin_id'])
        {
          $this->load->view('membership/member',$arr);	
        }
        else
        {
          $this->load->view('welcome_message',$arr);	
        }
	}

 public function memberadd()
    {
	      $data['logged']  = false;
	      $arr['admin_id'] = $this->my_session->get('admin_id');
	      $arr['username'] = $this->my_session->get('username');
	     
	       $this->db->select('*');
        $this->db->from('web_member');
       // $this->db->where('id',$salespersonid);
        $query = $this->db->get();
        $arr['content1'] = $query->result_array();
	      if($arr['admin_id'])
	      {
	      	 $this->load->view('member/memberadd' ,$arr);
	      }
	      else
	      {
	      	$this->load->view('welcome_message',$arr);
	      }
    }

	   public function memberedit()
    {
    	  $data['logged']  = false;
          $arr['admin_id'] = $this->my_session->get("admin_id");
          $arr['username'] = $this->my_session->get("username");

    	  $id = $this->input->get('id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_member');
    	  $this->db->where('id',$id);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();

    	  if($arr['admin_id'])
    	  {
    	  	 $this->load->view('member/memberedit',$arr);
    	  }
    	  else
    	  {
    	  	$this->load->view('welcome_message',$arr);
    	  }
    }
     public function add()
    {
    	$data['logged']  = false;
    	$arr['admin_id'] = $this->my_session->get('admin_id');
    	$arr['username'] = $this->my_session->get('username');

    	$member_name  = $this->input->post('member_name');
    	$member_mobile   = $this->input->post('member_mobile');	
    	$member_address   = $this->input->post('member_address');
    	$eb_number   = $this->input->post('eb_number');
    	$dth_number   = $this->input->post('dth_number');
    	$bank_name   = $this->input->post('bank_name');
    	$ifsc_code   = $this->input->post('ifsc_code');
    	$account_number   = $this->input->post('account_number');
    	$idproof   = $this->input->post('idproof');	
    	$salesperson_name   = $this->input->post('salesperson_name');
    //	$qrcode  = $this->input->post('qrcode');
    	$url = $this->input->post('url');
   // echo $url;die;

    	include("resize-class.php");
				if($_FILES['idproof']['name'] != "")
		{
			$path_parts = pathinfo($_FILES['idproof']['name']);
            $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
			$imgname=$image_path;

			$source =  $_FILES['idproof']['tmp_name'];	    
			$originalpath  = "webupload/original/".$imgname;
			$thumbnailpath = "webupload/thumb/".$imgname;
			move_uploaded_file($source,$originalpath);		
			$resizeObj = new resize($originalpath);		
			$resizeObj -> resizeImage(350, 350, 'crop');
			$resizeObj -> saveImage($thumbnailpath, 100);
		}	
	/*	if($_FILES['url']['name'] != "")
		{
			$path_parts = pathinfo($_FILES['url']['name']);
            $image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension'];
			$qrcodeimg=$image_path;

			$source =  $_FILES['url']['tmp_name'];	    
			$originalpath  = "webupload/original/".$qrcodeimg;
			$thumbnailpath = "webupload/thumb/".$qrcodeimg;
			move_uploaded_file($source,$originalpath);		
			$resizeObj = new resize($originalpath);		
			$resizeObj -> resizeImage(350, 350, 'crop');
			$resizeObj -> saveImage($thumbnailpath, 100);
		}*/
	
		$date           = date('Y-m-d');
        $status ="Enable";
		$data = array(
          'member_name'=> $member_name,
          'member_mobile'  => $member_mobile,
          'member_address'  => $member_address,
          'eb_number'=>$eb_number,
          'bank_name'=>$bank_name,
          'ifsc_code'=>$ifsc_code,
          'account_number'=>$account_number,
          'salesperson_id'=>$salesperson_name,
          'idproof'=>$imgname,
          'qrcode'=>$url,
          'status'=>$status,
          'date' => $date,
          'update_date'=> $date 
		);

		$this->db->insert('web_member', $data);
		header('Location:'.BEGIN_PATH.'/member');

    }


    public function edit()
    {
    	$data['logged']  = false;
    	$arr['admin_id'] = $this->my_session->get('admin_id');
    	$arr['username'] = $this->my_session->get('username');

        $id = $this->input->post('id');
    	$member_name  = $this->input->post('member_name');
    	$member_mobile   = $this->input->post('member_mobile');	
    	$member_address   = $this->input->post('member_address');
    	$eb_number   = $this->input->post('eb_number');
    	$dth_number   = $this->input->post('dth_number');
    	$bank_name   = $this->input->post('bank_name');
    	$ifsc_code   = $this->input->post('ifsc_code');
    	$account_number   = $this->input->post('account_number');
    	include("resize-class.php");
		
		
		$date           = date('Y-m-d');
        $status ="Enable";
		$update = array(
         'member_name'=> $member_name,
          'member_mobile'  => $member_mobile,
          'member_address'  => $member_address,
          'eb_number'=>$eb_number,
          'bank_name'=>$bank_name,
          'ifsc_code'=>$ifsc_code,
          'account_number'=>$account_number,
          'status'=>$status,
          'update_date'=> $date 
		);
        
        $this->db->where('id',$id); 
		$this->db->update('web_member', $update);
		header('Location:'.BEGIN_PATH.'/member');
    }
    public function memberview()
    {
        $data['logged']  = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $cid = $this->input->get('cid');

        $this->db->select('*');
        $this->db->from('web_member');
        $this->db->where('id',$cid);
        $query = $this->db->get();
        $arr['content'] = $query->result_array();

          $this->db->select('*');
        $this->db->from('web_member');
        $query = $this->db->get();
        $arr['content1'] = $query->result_array();
        if($arr['admin_id'])
        {
          $this->load->view('membership/memberview',$arr);
        }
        else
        {
          $this->load->view('welcome_message',$arr);
        }
      
    }
    
    public function update()
    {
        $data['logged']  = false;
        $arr['admin_id'] = $this->my_session->get("admin_id");
        $arr['username'] = $this->my_session->get("username");

        $uid             = $_REQUEST['uid'];
        $accept_status   = $_REQUEST['accept_status'];

       $update = array(
        'accept_status'  => $accept_status
        );

        $this->db->where('id',$uid);
        $this->db->update('web_member',$update);
        
    header('Location:'.BEGIN_PATH.'/member');
      
    }

 
    public function del()
    {
      $data['logged']  = false;
      $arr['admin_id'] = $this->input->post('admin_id');
      $arr['username'] = $this->input->post('username');

      $did = $this->input->get('did',TRUE);
      
      $this->db->where('id',$did);
      $this->db->limit(1);
      $this->db->delete('web_member');

      header('Location:'.BEGIN_PATH.'/member'); 

    } 
    public function delpayment()
    {
      $data['logged']  = false;
      $arr['admin_id'] = $this->input->post('admin_id');
      $arr['username'] = $this->input->post('username');

      $did = $this->input->get('did',TRUE);
      
      $this->db->where('id',$did);
      $this->db->limit(1);
      $this->db->delete('web_amount');

      header('Location:'.BEGIN_PATH.'/member/memberPaymentlist'); 

    }
    
    public function memberPaymentlist()
    {
        	$data['logged']  = false;
		$arr['admin_id'] = $this->my_session->get("admin_id");
		$arr['username'] = $this->my_session->get("username");

        $this->db->select('*');
        $this->db->from("web_amount");
        //$this->db->where("status","1");
        $this->db->order_by("id", "DESC");
        $query = $this->db->get();
        $arr['content'] =$query->result_array();
//print_r($arr['content']);die;
        if($arr['admin_id'])
        {
          $this->load->view('member/memberpaymentlist',$arr);	
        }
        else
        {
          $this->load->view('welcome_message',$arr);	
        }
    }

}

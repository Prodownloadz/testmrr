<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Pincode extends CI_Controller {
    
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

        $this->db->select('*');
        $this->db->from("web_pincode");
        $this->db->order_by("pin_id", "ASC");
        $query = $this->db->get();
        $arr['content'] = $query->result_array();

	    if($arr['admin_id'])
	    {
           $this->load->view('pincode/pincode',$arr);
	    }     
        else
        {
           $this->load->view('welcome_message', $arr);	
        }
    }

    public function pincodeadd()
    {
	      $data['logged']  = false;
	      $arr['admin_id'] = $this->my_session->get('admin_id');
	      $arr['username'] = $this->my_session->get('username');
	     
	      if($arr['admin_id'])
	      {
	      	 $this->load->view('pincode/pincodeadd' ,$arr);
	      }
	      else
	      {
	      	$this->load->view('welcome_message',$arr);
	      }
    }

    public function pincodeedit()
    {
    	  $data['logged']  = false;
          $arr['admin_id'] = $this->my_session->get("admin_id");
          $arr['username'] = $this->my_session->get("username");

    	  $pin_id = $this->input->get('pin_id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_pincode');
    	  $this->db->where('pin_id',$pin_id);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();

    	  if($arr['admin_id'])
    	  {
    	  	 $this->load->view('pincode/pincodeedit',$arr);
    	  }
    	  else
    	  {
    	  	$this->load->view('welcome_message',$arr);
    	  }
    }

    public function pincodeview()
    {
	      $data['logged']  = false;
	      $arr['admin_id'] = $this->my_session->get('admin_id');
	      $arr['username'] = $this->my_session->get('username');
	     
          $pin_id = $this->input->get('pin_id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_pincode');
    	  $this->db->where('pin_id',$pin_id);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();


	      if($arr['admin_id'])
	      {
	      	 $this->load->view('pincode/pincodeview' ,$arr);
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

    	$web_pincode   = $this->input->post('web_pincode');
    	$web_price = $this->input->post('web_price');

    	include("resize-class.php");
		
	
		$date           = date('Y-m-d');
        $status ="Enable";
		$data = array(
          'web_pincode'=> $web_pincode,
          'web_price'  => $web_price,
          'start_date' => $date,
          'update_date'=> $date 
		);

		$this->db->insert('web_pincode', $data);
		header('Location:'.BEGIN_PATH.'/pincode');

    }


    public function edit()
    {
    	$data['logged']  = false;
    	$arr['admin_id'] = $this->my_session->get('admin_id');
    	$arr['username'] = $this->my_session->get('username');

        $pin_id = $this->input->post('pin_id');
    	$web_pincode   = $this->input->post('web_pincode');
    	$web_price = $this->input->post('web_price'); 

    	include("resize-class.php");
		
		
		$date           = date('Y-m-d');

		$update = array(

          'web_pincode'=> $web_pincode,
          'web_price'  => $web_price,
          'update_date'=> $date 
		);
        
        $this->db->where('pin_id',$pin_id); 
		$this->db->update('web_pincode', $update);
		header('Location:'.BEGIN_PATH.'/pincode');
    }

    public function del()
    {
    	$data['logged']  = false;
        $arr['admin_id'] = $this->input->post('admin_id');
        $arr['username'] = $this->input->post('username');

        $did = $this->input->get('did',TRUE);

        $this->db->where('pin_id', $did);
        $this->db->limit(1);
        $this->db->delete('web_pincode');
        header('Location:'.BEGIN_PATH.'/pincode');
    } 
    

}

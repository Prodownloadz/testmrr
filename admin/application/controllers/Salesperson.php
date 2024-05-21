<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Salesperson extends CI_Controller {
    
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
            $this->db->from("web_salesperson");
            $this->db->order_by("id", "ASC");
            $query = $this->db->get();
            $arr['content'] = $query->result_array();
    
    	    if($arr['admin_id'])
    	    {
               $this->load->view('salesperson/salesperson',$arr);
    	    }     
            else
            {
               $this->load->view('welcome_message', $arr);	
            } 
       }
       
       
       
    public function salespersonadd()
    {
	      $data['logged']  = false;
	      $arr['admin_id'] = $this->my_session->get('admin_id');
	      $arr['username'] = $this->my_session->get('username');
	     
	      if($arr['admin_id'])
	      {
	      	 $this->load->view('salesperson/salespersonadd' ,$arr);
	      }
	      else
	      {
	      	$this->load->view('welcome_message',$arr);
	      }
    }

	   public function salespersonedit()
    {
    	  $data['logged']  = false;
          $arr['admin_id'] = $this->my_session->get("admin_id");
          $arr['username'] = $this->my_session->get("username");

    	  $id = $this->input->get('id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_salesperson');
    	  $this->db->where('id',$id);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();

    	  if($arr['admin_id'])
    	  {
    	  	 $this->load->view('salesperson/salespersonedit',$arr);
    	  }
    	  else
    	  {
    	  	$this->load->view('welcome_message',$arr);
    	  }
    }

    public function salespersonview()
    {
	      $data['logged']  = false;
	      $arr['admin_id'] = $this->my_session->get('admin_id');
	      $arr['username'] = $this->my_session->get('username');
	     
          $id = $this->input->get('id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_salesperson');
    	  $this->db->where('id',$id);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();


	      if($arr['admin_id'])
	      {
	      	 $this->load->view('salesperson/salespersonview' ,$arr);
	      }
	      else
	      {
	      	$this->load->view('welcome_message',$arr);
	      }
    } 
    public function totalamounts()
    {
	      $data['logged']  = false;
	      $arr['admin_id'] = $this->my_session->get('admin_id');
	      $arr['username'] = $this->my_session->get('username');
	     
          $id = $this->input->get('id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_debittotalamount');
    	  $this->db->where('salesperson_id',$id);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();


	      if($arr['admin_id'])
	      {
	      	 $this->load->view('salesperson/debittotalamount' ,$arr);
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

    	$salesperson_name  = $this->input->post('salesperson_name');
    	$salesperson_lastname  = $this->input->post('salesperson_lastname');
    	$salesperson_mobile   = $this->input->post('salesperson_mobile');
    	$salesperson_email   = $this->input->post('salesperson_email');
    	$salesperson_password   = $this->input->post('salesperson_password');
    

    	include("resize-class.php");
		
	
		$date           = date('Y-m-d');
        $status ="Enable";
		$data = array(
          'salesperson_name'=> $salesperson_name, 
          'salesperson_lastname'=> $salesperson_lastname,
          'salesperson_mobile'  => $salesperson_mobile,
          'salesperson_email'  => $salesperson_email,
          'salesperson_password'=>$salesperson_password,
          'status'=>$status,
          'date' => $date,
          'update_date'=> $date 
		);

		$this->db->insert('web_salesperson', $data);
		header('Location:'.BEGIN_PATH.'/salesperson');

    }


    public function edit()
    {
    	$data['logged']  = false;
    	$arr['admin_id'] = $this->my_session->get('admin_id');
    	$arr['username'] = $this->my_session->get('username');

        $id = $this->input->post('id');
    	$salesperson_name  = $this->input->post('salesperson_name');
    	$salesperson_lastname = $this->input->post('salesperson_lastname');
    	$salesperson_mobile   = $this->input->post('salesperson_mobile');
    	$salesperson_email   = $this->input->post('salesperson_email');
    	$salesperson_password   = $this->input->post('salesperson_password');
    	include("resize-class.php");
		
		
		$date           = date('Y-m-d');
        $status ="Enable";
		$update = array(
        'salesperson_name'=> $salesperson_name, 
        'salesperson_lastname'=> $salesperson_lastname,
          'salesperson_mobile'  => $salesperson_mobile,
          'salesperson_email'  => $salesperson_email,
          'salesperson_password'=>$salesperson_password,
          'status'=>$status,
         // 'date' => $date,
          'update_date'=> $date  
		);
        
        $this->db->where('id',$id); 
		$this->db->update('web_salesperson', $update);
		header('Location:'.BEGIN_PATH.'/salesperson');
    }

    public function del()
    {
    	$data['logged']  = false;
        $arr['admin_id'] = $this->input->post('admin_id');
        $arr['username'] = $this->input->post('username');

        $did = $this->input->get('did',TRUE);

        $this->db->where('id', $did);
        $this->db->limit(1);
        $this->db->delete('web_salesperson');
        header('Location:'.BEGIN_PATH.'/salesperson');
    } 
    public function update()
       {
            $arr['admin_id'] = $this->my_session->get('admin_id');
            $uid = $this->input->get('uid',TRUE);
            $status = $this->input->get('status',TRUE);
            $data = array(
              'status'=>$status
    		);
    		  $this->db->where('id',$uid);
            $this->db->update('web_salesperson',$data);
    		header('Location:'.BEGIN_PATH.'/salesperson');  
    	} 
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
error_reporting(0);
class Student extends CI_Controller {
    
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
            $this->db->from("web_student");
            $this->db->order_by("id", "ASC");
            $query = $this->db->get();
            $arr['content'] = $query->result_array();
    
    	    if($arr['admin_id'])
    	    {
               $this->load->view('student/student',$arr);
    	    }     
            else
            {
               $this->load->view('welcome_message', $arr);	
            } 
       }
       
       
       
    public function studentadd()
    {
	      $data['logged']  = false;
	      $arr['admin_id'] = $this->my_session->get('admin_id');
	      $arr['username'] = $this->my_session->get('username');
	     
	      if($arr['admin_id'])
	      {
	      	 $this->load->view('student/studentadd' ,$arr);
	      }
	      else
	      {
	      	$this->load->view('welcome_message',$arr);
	      }
    }

	   public function studentedit()
    {
    	  $data['logged']  = false;
          $arr['admin_id'] = $this->my_session->get("admin_id");
          $arr['username'] = $this->my_session->get("username");

    	  $id = $this->input->get('id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_student');
    	  $this->db->where('id',$id);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();

    	  if($arr['admin_id'])
    	  {
    	  	 $this->load->view('student/studentedit',$arr);
    	  }
    	  else
    	  {
    	  	$this->load->view('welcome_message',$arr);
    	  }
    }

    public function studentview()
    {
	      $data['logged']  = false;
	      $arr['admin_id'] = $this->my_session->get('admin_id');
	      $arr['username'] = $this->my_session->get('username');
	     
          $id = $this->input->get('id' ,TRUE);

    	  $this->db->select('*');
    	  $this->db->from('web_student');
    	  $this->db->where('id',$id);
    	  $query = $this->db->get();
    	  $arr['content'] = $query->result_array();


	      if($arr['admin_id'])
	      {
	      	 $this->load->view('student/studentview' ,$arr);
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

    	$student_name   = $this->input->post('student_name');
    	$mobile_number   = $this->input->post('mobile_number');
    	$email   = $this->input->post('email');
    //	$student_name   = $this->input->post('student_name');
    

    	include("resize-class.php");
		
	
		$date           = date('Y-m-d');
        $status ="Enable";
		$data = array(
          'student_name'=> $student_name,
          'mobile_number'  => $mobile_number,
          'email'  => $email,
          'date' => $date,
          'update_date'=> $date 
		);

		$this->db->insert('web_student', $data);
		header('Location:'.BEGIN_PATH.'/student');

    }


    public function edit()
    {
    	$data['logged']  = false;
    	$arr['admin_id'] = $this->my_session->get('admin_id');
    	$arr['username'] = $this->my_session->get('username');

        $id = $this->input->post('id');
    	$student_name   = $this->input->post('student_name');
    	$mobile_number   = $this->input->post('mobile_number');
    	$email   = $this->input->post('email');

    	include("resize-class.php");
		
		
		$date           = date('Y-m-d');

		$update = array(
          'student_name'=> $student_name,
          'mobile_number'  => $mobile_number,
          'email'  => $email,
          'update_date'=> $date 
		);
        
        $this->db->where('id',$id); 
		$this->db->update('web_student', $update);
		header('Location:'.BEGIN_PATH.'/student');
    }

    public function del()
    {
    	$data['logged']  = false;
        $arr['admin_id'] = $this->input->post('admin_id');
        $arr['username'] = $this->input->post('username');

        $did = $this->input->get('did',TRUE);

        $this->db->where('id', $did);
        $this->db->limit(1);
        $this->db->delete('web_student');
        header('Location:'.BEGIN_PATH.'/student');
    } 
}